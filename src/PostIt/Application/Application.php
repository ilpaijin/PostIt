<?php

namespace PostIt\Application;

use \Exception;

use PostIt\Application\Contracts\Containerable;
use PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  2015 Ilpaijin
 * @license
 * @version    Release: @package_version@
 */
class Application
{
    /**
     * @var PostIt\Contracts\Containerable
     */
    protected $container;

    /**
     * @var Symfony\Component\Routing\RouteCollection
     */
    protected $routes;

    /**
     * @param Containerable $container
     */
    public function __construct(Containerable $container, \IteratorAggregate $routes)
    {
        $this->container = $container;
        $this->routes = $routes;
    }

    /**
     * soLid Liskov principle, useful for testing
     *
     * @param string $name
     */
    public function containerGet($name)
    {
        return $this->container->get($name);
    }

    /**
    * soLid Liskov principle, useful for testing
    *
    * @param string $name
    * @param mixed $value $name
    *
    * @return mixed
    */
    public function containerSet($name, $value)
    {
        return $this->container->set($name, $value);
    }

    /**
     * Debug checking
     *
     * @return bool
     */
    public function isInDebug()
    {
        return $this->containerGet('debug') === true;
    }

    /**
     * handle the request, call a controller and send its response
     */
    public function handle(Request $request)
    {
        $context = new RequestContext();
        $context->fromRequest($request);

        try {

            $matched = $this->matchRequest($context);

            $request->attributes->add($matched, EXTR_SKIP);

            list($controller, $action) = array_shift($matched);

            unset($matched['_route']);

            $controller = new $controller($this->container);

            return call_user_func(array($controller,$action), $request, $matched);

        } catch (ResourceNotFoundException $e) {
            //log error
            return call_user_func(array(new Controllers\ErrorController($this->container), 'notFound'), $request, $e->getMessage());
        } catch (Exception $e) {
            //log error
            return call_user_func(array(new Controllers\ErrorController($this->container), 'server'), $request, $e->getMessage());
        }
    }

    /**
     * Look for a match between the declared routes and the request
     *
     * @param Symfony\Component\Routing\RequestContext $context
     */
    private function matchRequest(RequestContext $context)
    {
        $matcher = new UrlMatcher($this->routes, $context);

        return $matcher->match($context->getPathInfo());
    }
}

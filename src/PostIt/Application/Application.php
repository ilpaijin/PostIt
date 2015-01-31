<?php

namespace PostIt\Application;

use \Exception;

use PostIt\Application\Contracts\Containerable;
use PostIt\Application\Controllers;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  Ilpaijin
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
    public function __construct(Containerable $container, RouteCollection $routes)
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

        $matcher = new UrlMatcher($this->routes, $context);

        try {

            $matched = $matcher->match($request->getPathInfo());

            $request->attributes->add($matched, EXTR_SKIP);

            list($controller, $action) = $matched['_controller'];

            $controller = new $controller($this->container);

            return call_user_func(array($controller,$action), $request);
        } catch (ResourceNotFoundException $e) {
            return call_user_func(array(new Controllers\ErrorController, 'notFound'), $request);
        } catch (Exception $e) {
            return call_user_func(array(new Controllers\ErrorController, 'server'), $request);
        }
    }
}

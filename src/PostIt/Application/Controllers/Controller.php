<?php

namespace PostIt\Application\Controllers;

use PostIt\Application\Contracts\Containerable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  2015 Ilpaijin
 * @license
 * @version    Release: @package_version@
 */
abstract class Controller
{
    /**
     * Service Container
     *
     * @var PostIt\Application\Contracts\Containerable
     */
    protected $container;

    /**
     * Dependencies
     *
     * @var array
     */
    protected $dependencies = array(
        'paginator' => 'PostIt\\Application\\Paginator'
    );

    /**
     * [__construct description]
     *
     * @param Containerable $container
     */
    public function __construct(Containerable $container)
    {
        $this->container = $container;
    }

    /**
     * Proxy to Twig render method and return a new Response.
     *
     * @param  string  $view
     * @param  array   $parameters
     * @param  integer $status
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function render($view, $parameters = array(), $status = 200)
    {
        return new Response($this->container->get('twig')->render($view.'.php', $parameters), $status);
    }

    /**
     * Dependencies getter
     *
     * @return array
     */
    public function __call($method, $attr)
    {
        $prefix = substr($method, 0, 3);
        $deps = strtolower(substr($method, 3));

        if ($prefix === 'get') {

            if (!isset($this->dependencies[$deps])) {
                return false;
            }

            if (!$this->container->getService($deps)) {
                $this->container->setService($deps, new $this->dependencies[$deps]);
            }

            return $this->container->getService($deps);
        }
    }
}

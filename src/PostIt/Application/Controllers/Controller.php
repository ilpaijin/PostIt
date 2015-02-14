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
    * Class dependencies
    *
    * @var array
    */
    protected $dependencies = array();

    /**
     * Dependencies
     *
     * @var array
     */
    protected $commonDependencies = array(
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

        $this->mergeDependencies();
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
     * Merge the common and the class dependencies
     *
     * @return array
     */
    public function mergeDependencies()
    {
        $this->dependencies = array_merge($this->dependencies, $this->commonDependencies);
    }

    /**
     * Dependencies getter
     *
     * @return mixed
     */
    public function __call($method, $attr)
    {
        $deps = strtolower(substr($method, 3));

        if (substr($method, 0, 3) === 'get') {

            if (!isset($this->dependencies[$deps])) {
                return false;
            }

            if (!$this->container->getService($deps)) {
                $this->container->setService($deps, new $this->dependencies[$deps](reset($attr)));
            }

            return $this->container->getService($deps);
        }
    }
}

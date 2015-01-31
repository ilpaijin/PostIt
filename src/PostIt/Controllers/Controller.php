<?php

namespace PostIt\Controllers;

use PostIt\Contracts\Containerable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  Ilpaijin
 * @license
 * @version    Release: @package_version@
 */
abstract class Controller
{
    protected $container;

    public function __construct(Containerable $container)
    {
        $this->container = $container;
    }

    public function render($view, $parameters = array())
    {
        return new Response($this->container->get('twig')->render($view.'.php', $parameters));
    }
}

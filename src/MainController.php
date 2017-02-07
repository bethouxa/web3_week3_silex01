<?php

namespace Itb;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    private $app;

    public function __construct(WebApplication $app)
    {
        $this->app = $app;
    }

    public function indexAction()
    {
        $argsArray = [];
        $template = 'index';
        return $this->app['twig']->render($template . '.html.twig', $argsArray);
    }

    public function aboutAction()
    {
        $argsArray = [];
        $template = 'about';
        return $this->app['twig']->render($template . '.html.twig', $argsArray);
    }


}
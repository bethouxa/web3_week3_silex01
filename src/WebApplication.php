<?php
/**
 * Created by PhpStorm.
 * User: matt
 * Date: 07/02/2017
 * Time: 12:39
 */

namespace Itb;

use Silex\Application;
use Silex\Provider;

class WebApplication extends Application
{
    // location of Twig templates
    private $myTemplatesPath = __DIR__ . '/../templates';

    public function __construct()
    {
        parent::__construct();
        $this['debug'] = true;

        // setup Service controller provider
        $this->register(new Provider\ServiceControllerServiceProvider());

        $this->setupTwig();
        $this->setupRoutes();
    }

    public function setupRoutes()
    {
        //==============================
        // controllers as a service
        //==============================
        $this['main.controller'] = function() { return new MainController($this);   };

        //==============================
        // now define the routes
        //==============================
        // -- main --
        $this->get('/', 'main.controller:indexAction');
        $this->get('/about','main.controller:aboutAction');
    }

    public function setupTwig()
    {
        // register Twig with Silex
        // ------------
        $this->register(new Provider\TwigServiceProvider(),
            [
                'twig.path' => $this->myTemplatesPath
            ]
        );
    }

}
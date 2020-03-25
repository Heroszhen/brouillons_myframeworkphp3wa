<?php

namespace Frameworkphp3wa;

require_once Dirname(Dirname(__DIR__))."/vendor/autoload.php";

use Frameworkphp3wa\Router;
use Twig;

class Kernel{
    public function path(){
        echo Dirname(Dirname(__DIR__));
    }

    public function run(){
        $loader = new Twig\Loader\FilesystemLoader(Dirname(Dirname(__DIR__)).'/templates'); 
        $twig = new Twig\Environment($loader, [
            'cache' => false,
        ]);
        
        $router = new Router();
        $dispatcher = $router->setRoutes($twig);
        $router->getRouter($twig,$dispatcher);
    }
}
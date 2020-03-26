<?php

    require_once "../vendor/autoload.php";

    use Frameworkphp3wa\Kernel;
    if($_SESSION == null)session_start();
    
    $kernel = new Kernel();
    $kernel->run();


    /*
    $loader = new \Twig\Loader\FilesystemLoader(Dirname(__DIR__).'/templates'); 
    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

    $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) use ($twig) {
        $r->addRoute('GET', '/',array(new Home($twig), "index",[]));

        $r->addRoute('GET', '/contact', function() {
            echo 'Page de contact  <br /><a href="/myform">Remplir le formulaire</a>';
        });
        $r->addRoute('GET', '/myform', function() {
            $home = new Home();
            $home->myForm();
        });
        $r->addRoute('POST', '/getmyform', function() {
            echo "<h2>name : ".$_POST["name"]."</h2>";
        });
        $r->addRoute('GET', '/accueil', array(new Home($twig), "index",[]));
    });

    // Strip query string (?foo=bar) and decode URI
    $uri = $_SERVER['REQUEST_URI'];
    if (false !== $pos = strpos($uri, '?')) {
        $uri = substr($uri, 0, $pos);
    }
    
    $routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], rawurldecode($uri));
    if($routeInfo[0] == FastRoute\Dispatcher::FOUND) {
        //var_dump($routeInfo[1]);
        if(is_array($routeInfo[1])){
            //$response = call_user_func_array(array($routeInfo[1][0], $routeInfo[1][1]),$routeInfo[1][2]);
            //echo $twig->render($response[0], ["parameters"=>$response[1]]); 
            call_user_func_array(array($routeInfo[1][0], $routeInfo[1][1]),$routeInfo[1][2]);
        }
        else call_user_func_array($routeInfo[1], $routeInfo[2]); 
    } elseif ($routeInfo[0] == FastRoute\Dispatcher::NOT_FOUND) {
        header('HTTP/1.0 404 Not Found');
        $security = new Security();
        $response = $security->index();
        echo $twig->render($response[0], ["parameters"=>$response[1]]); 
    }*/


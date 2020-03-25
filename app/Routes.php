<?php

use App\Controller\Home;
use App\Controller\Article;
use App\Controller\Security;
use FastRoute\RouteCollector;


return function(RouteCollector $r) {
    $r->addRoute('GET', '/',array(new Home($_GET["twig"]), "index",[]));
    $r->addRoute('GET', '/contact', function() {
        echo 'Page de contact  <br /><a href="/myform">Remplir le formulaire</a>';
    });
    $r->addRoute('GET', '/introduction',array(new Home($_GET["twig"]), "introduction",[]));
    $r->addRoute('GET', '/articles',array(new Article($_GET["twig"]), "index",[]));
    $r->addRoute('GET', '/creer_un_article',array(new Article($_GET["twig"]), "createArticle",[]));
    $r->addRoute('POST', '/creer_un_article',array(new Article($_GET["twig"]), "createArticle",[$_POST]));
};
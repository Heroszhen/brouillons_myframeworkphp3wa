<?php

use App\Controller\Home;
use App\Controller\ArticleController;
use App\Controller\UserController;
use App\Controller\CategoryController;
use App\Controller\Security;
use FastRoute\RouteCollector;


return function(RouteCollector $r) {
    $r->addRoute('GET', '/',array(new Home($_GET["twig"]), "index",[]));
    $r->addRoute('GET', '/contact', function() {
        echo 'Page de contact  <br /><a href="/myform">Remplir le formulaire</a>';
    });
    $r->addRoute('GET', '/introduction',array(new Home($_GET["twig"]), "introduction",[]));
    $r->addRoute('GET', '/articles',array(new ArticleController($_GET["twig"]), "index",[]));
    $r->addRoute('GET', '/creer_un_article',array(new ArticleController($_GET["twig"]), "createArticle",[]));
    $r->addRoute('POST', '/creer_un_article',array(new ArticleController($_GET["twig"]), "createArticle",[$_POST]));
    $r->addRoute('GET','/inscription',array(new UserController($_GET["twig"]), "logup",[]));
    $r->addRoute('POST','/inscription',array(new UserController($_GET["twig"]), "logup",[$_POST]));
    $r->addRoute('GET','/connexion',array(new UserController($_GET["twig"]), "login",[]));
    $r->addRoute('POST','/connexion',array(new UserController($_GET["twig"]), "login",[$_POST]));
    $r->addRoute('GET','/deconnexion',array(new UserController($_GET["twig"]), "logout",[]));
};
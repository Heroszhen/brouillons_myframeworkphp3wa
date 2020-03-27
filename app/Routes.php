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
    $r->addRoute('GET', '/deleteonearticle/{id:\d+}',array(new ArticleController($_GET["twig"]), "deleteOneArticle",[$_SERVER['REQUEST_URI']]));
    $r->addRoute('GET', '/modifierunarticle/{id:\d+}',array(new ArticleController($_GET["twig"]), "modifyOneArticle",[$_SERVER['REQUEST_URI']]));
    $r->addRoute('POST', '/modifierunarticle/{id:\d+}',array(new ArticleController($_GET["twig"]), "modifyOneArticle",[$_SERVER['REQUEST_URI'],$_POST]));
    $r->addRoute('GET', '/creerunecategory',array(new CategoryController($_GET["twig"]), "index",[]));
    $r->addRoute('POST', '/creerunecategory',array(new CategoryController($_GET["twig"]), "index",[$_POST]));
    $r->addRoute('GET', '/deleteonecategory/{id:\d+}',array(new CategoryController($_GET["twig"]), "deleteOneCategory",[$_SERVER['REQUEST_URI']]));
    $r->addRoute('GET', '/modifierunecategorie/{id:\d+}',array(new CategoryController($_GET["twig"]), "modifyOneCategory",[$_SERVER['REQUEST_URI']]));
    $r->addRoute('POST', '/modifierunecategorie/{id:\d+}',array(new CategoryController($_GET["twig"]), "modifyOneCategory",[$_SERVER['REQUEST_URI'],$_POST]));
};
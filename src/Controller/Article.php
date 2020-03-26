<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\Lock\Store\PdoStore;

class Article extends AbstractController{
    public function index(){
        $this->render("article.index.twig",["nav"=>"articles"]);
    }

    public function createArticle($post=null){
        if($post == null){
            $post["title"] = "";
            $post["content"] = "";
            $msgalert = "";
        }else{
            if($post["title"] == "" || $post["content"] == "")$msgalert = "<div class='alert alert-danger'>Veuillez remplir les 2 champs</div>";
            else{

                $pdo = new PDO(
                    'mysql:host=127.0.0.1:8889;dbname=frameworkphp3wa',
                    'root',
                    'root',
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    )
                );

                //$articlerepo = new ArticleRepository();
                //$article->persist();
                $msgalert = "<div class='alert alert-success'>Vous avez ajouté un article avec succès</div>";
            } 
        }
        $this->render("article.createarticle.twig",["nav"=>"create","post"=>$post,"msgalert"=>$msgalert]);
    }
}
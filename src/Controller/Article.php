<?php

namespace App\Controller;

use App\Repository\ArticleRepository;

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
            else $msgalert = "<div class='alert alert-success'>Vous avez ajouté un article avec succès</div>";
        }
        $this->render("article.createarticle.twig",["nav"=>"create","post"=>$post,"msgalert"=>$msgalert]);
    }
}
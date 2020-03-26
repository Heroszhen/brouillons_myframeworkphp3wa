<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use APP\Service\Service1 as s1;

class ArticleController extends AbstractController{
    public function index(){
        $rp = new ArticleRepository("article");
        $articles = $rp->findAll(["id"=>"desc"]);
        //var_dump($articles);
        $this->render("article.index.twig",["nav"=>"articles","articles"=>$articles,"session"=>$_SESSION]);
    }

    public function createArticle($post=null){
        $s1 = new S1();
        if($s1::isAdmin() == false)$this->Toredirect("");
        if($post == null){
            $post["articletitle"] = "";
            $post["articlecontent"] = "";
            $msgalert = "";
        }else{
            if($post["articletitle"] == "" || $post["articlecontent"] == "")$msgalert = "<div class='alert alert-danger'>Veuillez remplir les 2 champs</div>";
            else{
                $rp = new ArticleRepository("article");
                $article = new Article();
                $article->setTitle($post["articletitle"]);
                $article->setContent($post["articlecontent"]);
                $rp->persist($article);
                //$articlerepo = new ArticleRepository();
                //$article->persist();
                $post["articletitle"] = "";
                $post["articlecontent"] = "";
                $msgalert = "<div class='alert alert-success'>Vous avez ajouté un article avec succès</div>";
            } 
        }
        $this->render("article.createarticle.twig",["nav"=>"create","post"=>$post,"msgalert"=>$msgalert,"session"=>$_SESSION]);
    }
}
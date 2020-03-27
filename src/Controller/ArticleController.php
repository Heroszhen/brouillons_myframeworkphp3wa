<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Frameworkphp3wa\Controller\AbstractController;
use App\Service\Service1 as s1;

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

        $rp = new ArticleRepository("article");
        $rp2 = new CategoryRepository("category");
        $allcategory = $rp2->findAll();
        if($post == null){
            $post["articletitle"] = "";
            $post["articlecontent"] = "";
            $post["articlecategoryid"] = "";
            $msgalert = "";
        }else{
            if($post["articletitle"] == "" || $post["articlecontent"] == "")$msgalert = "<div class='alert alert-danger'>Veuillez remplir les 2 champs</div>";
            else{
                $article = new Article();
                $article->setId(-1);
                $article->setTitle($post["articletitle"]);
                $article->setContent($post["articlecontent"]);
                if($post["articlecategoryid"] == "")$post["articlecategoryid"] = NULL;
                $article->setCategoryid($post["articlecategoryid"]);
                $rp->persist($article);
                $post["articletitle"] = "";
                $post["articlecontent"] = "";
                $post["articlecategoryid"] = "";
                $msgalert = "<div class='alert alert-success'>Vous avez ajouté un article avec succès</div>";
            } 
        }
        $allarticles = $rp->findAll(["id"=>"desc"]);
        return $this->render("article.createarticle.twig",[
            "nav"=>"create",
            "allarticles"=>$allarticles,
            "post"=>$post,
            "allcategory" => $allcategory,
            "msgalert"=>$msgalert,
            "session"=>$_SESSION
        ]);
    }

    public function showOneArticle($uri){
        $tab = explode('/',$uri);
        $rp = new ArticleRepository("article");
        $article = $rp->findBy(["id"=>$tab[2]]);
        $this->render("article.one.twig",["nav"=>"articles","article"=>$article,"session"=>$_SESSION]);
    }

    /**
     * '/deleteonearticle/{id:\d+}'
     */
    public function deleteOneArticle($uri){
        $s1 = new S1();
        if($s1::isAdmin() != false){
            $tab = explode('/',$uri);
            $rp = new ArticleRepository("article");
            $rp->remove($tab[2]);
            echo json_encode(["response"=>1]);
        }
    }

    /**
     * '/modifierunarticle/{id:\d+}'
     */
    public function modifyOneArticle($uri,$post=null){
        $s1 = new S1();
        if($s1::isAdmin() == false)$this->Toredirect("");

        $tab = explode('/',$uri);
        $rp = new ArticleRepository("article");
        $article = $rp->findBy(["id"=>$tab[2]]);
        $rp2 = new CategoryRepository("category");
        $allcategory = $rp2->findAll();
        $msgalert = "";
        if($post == null){
            $post["articletitle"] = $article["title"];
            $post["articlecontent"] = $article["content"];
            $post["articlecategoryid"] = $article["categoryid"];
        }else{
            if($post["articletitle"] == "" || $post["articlecontent"] == "")$msgalert = "<div class='alert alert-danger'>Veuillez remplir les 2 champs</div>";
            else{
                $article = new Article();
                $article->setId($tab[2]);
                $article->setTitle($post["articletitle"]);
                $article->setContent($post["articlecontent"]);
                if($post["articlecategoryid"] == "")$post["articlecategoryid"] = NULL;
                $article->setCategoryid($post["articlecategoryid"]);
                $rp->persist($article);
    
                $msgalert = "<div class='alert alert-success'>Vos modifications ont été enregistrées avec succès</div>";
            } 
        }
        $this->render("article.modifyarticle.twig",[
            "nav"=>"create",
            "id"=>$tab[2],
            "allcategory" => $allcategory,
            "post"=>$post,
            "msgalert" => $msgalert,
            "session"=>$_SESSION
        ]);
    }
}
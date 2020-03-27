<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Frameworkphp3wa\Controller\AbstractController;
use App\Service\Service1 as s1;

class CategoryController extends AbstractController{
    /**
     * create one category
     */
    public function index($post=null){
        $s1 = new S1();
        if($s1::isAdmin() == false)$this->Toredirect("");

        $msgalert = "";
        $rp = new CategoryRepository("category");
        if($post == null){
            $post["categorytitle"] = "";
            $msgalert = "";
        }else{
            if($post["categorytitle"] == "")$msgalert = "<div class='alert alert-danger'>Veuillez remplir le champs</div>";
            else{
                $category = new Category();
                $category->setTitle($post["categorytitle"]);
                $category->setId(-1);
                $rp->persist($category);
                $post["categorytitle"] = "";
                $msgalert = "<div class='alert alert-success'>Vous avez ajouté une catégorie avec succès</div>";
            } 
        }
        $all = $rp->findAll(["id"=>"desc"]);

        $this->render("category.createcategory.twig",[
            "nav"=>"create",
            "post"=>$post,
            "all" => $all,
            "msgalert"=>$msgalert,
            "session"=>$_SESSION
        ]);
    }

    /**
     * '/deleteonecategory/{id:\d+}'
     */
    public function deleteOneCategory($uri){
        $s1 = new S1();
        if($s1::isAdmin() != false){
            $tab = explode('/',$uri);
            $rp = new CategoryRepository("category");
            $rp->remove($tab[2]);
            echo json_encode(["response"=>1]);
        }
    }

    /**
     * '/modifierunecategory/{id:\d+}'
     */
    public function modifyOneCategory($uri,$post=null){
        $s1 = new S1();
        if($s1::isAdmin() == false)$this->Toredirect("");

        $tab = explode('/',$uri);
        $rp = new CategoryRepository("article");
        $category = $rp->findBy(["id"=>$tab[2]]);
        if($post == null){
            $post["categorytitle"] = $category["title"];
            $msgalert = "";
        } elseif($post["categorytitle"] == "") {
            $msgalert = "<div class='alert alert-danger'>Veuillez remplir le champ</div>";
        }else{
            $new = new Category();
            $new->setId(intval($tab[2]));
            $new->setTitle($post["categorytitle"]);
            $rp->persist($new);

            $msgalert = "<div class='alert alert-success'>Votre modification a été enregistrée avec succès</div>";
        }
        $this->render("category.modifycategory.twig",[
            "nav"=>"create",
            "id"=>$category["id"],
            "post"=>$post,
            "session"=>$_SESSION
        ]);
    }
}
<?php


namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;

class UserController extends AbstractController{
    /**
     * logup
     */
    public function logup($post=null){
        if($post == null){
            $post["useremail"] = "";
            $post["userpassword"] = "";
            $msgalert = "";
        } elseif ($post["useremail"] == "" || $post["userpassword"] == ""){
            $msgalert = "<div class='alert alert-danger'>Veuillez remplir les 2 champs</div>";
        } else {
            $rp = new UserRepository("user");
            $user = new User();
            $user->setEmail($post["useremail"]);
            $user->setPassword($post["userpassword"]);
            $rp->persist($user);
            $post["useremail"] == "";
            $post["userpassword"] == "";
            $msgalert = "<div class='alert alert-success'>Votre inscription a été faite avec succès</div>";
        }
        $this->render("user.logup.twig",["nav"=>"logup","post"=>$post,"msgalert"=>$msgalert,"session"=>$_SESSION]);
    }

    /**
     * logup
     */
    public function login($post=null){
        if(isset($_SESSION["user"]))$this->Toredirect("");
        if($post == null){
            $post["useremail"] = "";
            $post["userpassword"] = "";
            $msgalert = "";
        } elseif ($post["useremail"] == "" || $post["userpassword"] == ""){
            $msgalert = "<div class='alert alert-danger'>Veuillez remplir les 2 champs</div>";
        } else {
            $post["useremail"] == "";
            $post["userpassword"] == "";
            $rp = new UserRepository("user");
            $result = $rp->findForLogin($post["useremail"],$post["userpassword"]);
            if($result == false){
                $msgalert = "<div class='alert alert-danger'>Le mail ou le mot de passe n'est pas correct</div>";
            }else{
                $_SESSION["user"] = $result;
                $this->Toredirect("");
            }
        }//var_dump($_SESSION);
        $this->render("user.login.twig",["nav"=>"login","post"=>$post,"msgalert"=>$msgalert,"session"=>$_SESSION]);
    }

    public function logout($post=null){
        unset($_SESSION["user"]);
        session_destroy();
        header("Location: /");
        var_dump("ok");
    }
}
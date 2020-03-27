<?php

namespace App\Controller;

use Frameworkphp3wa\Controller\AbstractController;

class Home extends AbstractController{

    public function index(){
        $this->render("home.index.twig",["nav"=>"home","session"=>$_SESSION]);
        //return ["home.index.twig",["nav"=>"home"]];
    }

    public function myForm(){
        $form = "<div class='row justify-content-center'><div class='col-12 col-md-6 col-lg-4'>";
        $form .= "<form method='POST' action='/getmyform'>";
        $form .= "<div class=\"form-group\">";
        $form .= "<label>What'is your name</label><br>";
        $form .= "<input name='name' id='name' class='form-control'  placeholder='name'><br>";
        $form .= "</div>";
        $form .= "<button type='submit' class='btn btn-primary'>Envoyer</button>";
        $form .= "</form></div></div>";
        echo $form;
    }

    public function Introduction(){
        $this->render("home.introduction.twig",["nav"=>"introduction","session"=>$_SESSION]);
    }
}

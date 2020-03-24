<?php

namespace App\Controller;

use App\Controller;

class Home{
    public function index(){
        return ["home.index.twig",[]];
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
}

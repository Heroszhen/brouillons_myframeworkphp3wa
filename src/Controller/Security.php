<?php

namespace App\Controller;

class Security{

    public function index(){
        return ["security.index.twig",["session"=>$_SESSION]];
    }
}
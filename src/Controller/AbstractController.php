<?php

namespace App\Controller;

use Twig\Environment as Twig;

abstract class AbstractController{
    protected $twig;

    public function __construct(Twig $twig) {
        $this->twig = $twig;
    }

    public function render($file,$arguments){
        echo $this->twig->render($file, ["parameters"=>$arguments]); 
    }
}
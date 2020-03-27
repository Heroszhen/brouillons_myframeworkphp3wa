<?php

namespace Frameworkphp3wa\Controller;

use App\Entity\Article;
use Twig\Environment as Twig;

abstract class AbstractController{
    protected $twig;

    public function __construct(Twig $twig) {
        $this->twig = $twig;
    }

    public function render($file,$arguments){
        echo $this->twig->render($file, ["parameters"=>$arguments]); 
    }

    public function Toredirect($url){
        header("Location: /".$url);
    }
}
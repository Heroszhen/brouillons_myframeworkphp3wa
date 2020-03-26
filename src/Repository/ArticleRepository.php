<?php

namespace App\Repository;

use\Entity\Article;

class ArticleRepository{
    private $pdo;

    public function __construct(){
        $tab = include dirname(dirname(__DIR__)).'/app/config.php';
        $this->pdo = $tab["pdo"];
        var_dump($this->pdo);
    }

    public function persist(){echo "ok";
        var_dump($this->pdo);
    }
}
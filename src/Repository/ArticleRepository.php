<?php

namespace App\Repository;

use App\Entity\Article;

class ArticleRepository extends AbstractRepository{
    /*
    public function __construct(){
        $tab = include dirname(dirname(__DIR__)).'/app/config.php';
        $this->pdo = $tab["pdo"];
    }*/

    /**
     *
     * array conditions : ["id"=>"desc"]
     * @return array
     */
    public function findAll(array $conditions = []){
        $req = "SELECT * FROM article";
        if(count($conditions) != 0){
            foreach($conditions as $k=>$v){
                $req .= " ORDER BY ".$k." ".$v;
            }
        }
        $result = $this->pdo->query($req);
        return $result->fetchAll();
    }

    /**
     *
     * array conditions : ["id"=>1]
     * @return array
     */
    public function findBy(array $conditions = []){
        $req = "SELECT * FROM article";
        foreach($conditions as $k=>$v){
            $req .= " where ".$k." = ".$v;
        }
        $result = $this->pdo->query($req);
        return $result->fetch();
    }

    public function persist(Article $article){
        $req = "INSERT INTO article (title,content) VALUES (:title,:content)";
        $params = [
            "title"=>$article->getTitle(),
            "content"=>$article->getContent()
        ];
        $r = $this->pdo->prepare($req);
        $r->execute($params);
    }
}
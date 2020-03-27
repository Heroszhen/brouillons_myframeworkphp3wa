<?php

namespace App\Repository;

use App\Entity\Category;
use Frameworkphp3wa\Repository\AbstractRepository;

class CategoryRepository extends AbstractRepository{
    /**
     *
     * array conditions : ["id"=>"desc"]
     * @return array
     */
    public function findAll(array $conditions = []){
        $req = "SELECT * FROM category";
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
        $req = "SELECT * FROM category";
        foreach($conditions as $k=>$v){
            $req .= " where ".$k." = ".$v;
        }
        $result = $this->pdo->query($req);
        return $result->fetch();
    }

    public function persist(Category $category){
        if($category->getId() == -1){
            $req = "INSERT INTO category (title) VALUES (:title)";
            $params = [
                "title"=>$category->getTitle()
            ];
        }else{
            $req = "UPDATE category SET title = :title WHERE id = :id";
            $params = [
                "title" => $category->getTitle(),
                "id" => $category->getId()
            ];
        }
        $r = $this->pdo->prepare($req);
        $r->execute($params);
    }

    public function remove($id){
        $req = "DELETE FROM category WHERE id = ".$id;
        $this->pdo->query($req);
    }
}
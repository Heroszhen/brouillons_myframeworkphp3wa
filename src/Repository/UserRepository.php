<?php

namespace App\Repository;

use App\Entity\User;
use Frameworkphp3wa\Repository\AbstractRepository;

class UserRepository extends AbstractRepository{

    public function findAll(){

    }

    public function findForLogin($email,$password){
        $req = "select * from user where email = :email";
        $params = [
            "email"=>$email
        ];
        $r = $this->pdo->prepare($req);
        $r->execute($params);
        $user = $r->fetch();
        $result = password_verify($password, $user["passeword"]);
        if($result == true){
            unset($user["passeword"]);
            $result = $user;
        }
        return $result;
    }

    public function persist(User $user){
        $req = "INSERT INTO user (email,passeword,status) VALUES (:email,:passeword , :status)";
        $params = [
            "email"=>$user->getEmail(),
            "passeword"=>password_hash($user->getPassword(),PASSWORD_DEFAULT),
            "status"=>"USER"
        ];
        $r = $this->pdo->prepare($req);
        $r->execute($params);
    }
}
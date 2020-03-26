<?php

namespace App\Service;

class Service1{

    static public function isConnected(){
        if(isset($_SESSION["user"]))return true;
        return false;
    }

    static public function isAdmin(){
        if(!isset($_SESSION["user"]))return false;
        elseif($_SESSION["user"]["status"] != "ADMIN")return false;
        return true;
    }
}


?>
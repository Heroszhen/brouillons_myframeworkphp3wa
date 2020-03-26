<?php
namespace Frameworkphp3wa;

class Databases{
    public static function getPDO(){
        $pdo = new PDO(
            'mysql:host=127.0.0.1:8889;dbname=frameworkphp3wa',
            'root',
            'root',
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            )
        );

        return $pdo;
    }
}
 
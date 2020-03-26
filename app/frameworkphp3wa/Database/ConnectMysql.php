<?php
namespace Frameworkphp3wa\Database;

use PDO;

class ConnectMysql{
    private static $pdo = null;

    private function __construct() {}

    public static function getPDO(){
        if (self::$pdo === null) {
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
        }

        return $pdo;
    }
}
 
<?php
namespace core;

use PDOException;
use \src\Config;

class Database {
    private static $_pdo;
    public static function getInstance() {
        if(!isset(self::$_pdo)) {
            try{

                self::$_pdo = new \PDO(Config::DB_DRIVER.":host=".Config::DB_HOST.";port=".Config::DB_PORT.";dbname=".Config::DB_DATABASE.", ".Config::DB_USER.", ".Config::DB_PASS);
            }catch(PDOException $e){
                echo $e->getMessage();
                phpinfo();
                exit;
            }
        }
        return self::$_pdo;
    }

    private function __construct() { }
    private function __clone() { }
    private function __wakeup() { }
}
<?php

require_once __DIR__.'/../config/config.php';

class DB{

    private $conn;

    private static $instance;

    public static function getInstance(){
        if (!isset(self::$instance)){ // Verifica se existe uma instancia, se não existir, cria uma.
            try{
                self::$instance = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . ";charset=" . CHARSET, USER, PASS);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }

    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }
}
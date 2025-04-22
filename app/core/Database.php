<?php
class Database{
    private static $pdo = null;
    
    public static function connect(){
        if(!self::$pdo){
            self::$pdo = new PDO("mysql:host=localhost;dbname=mytodo", "root", "");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}

Database::connect(); 
?>
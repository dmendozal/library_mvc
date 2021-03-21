<?php

class Connection
{
    private static $connection;

    public static function getConnection()
    {
        if (!isset(self::$connection)) {
            try {
                include_once 'config.php';
                self::$connection = new PDO('pgsql:host=' . SERVER_NAME . '; dbname=' . DATABASE, USER_NAME, PASSWORD);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->exec("SET NAMES 'UTF8'");
                return self::$connection;
            } catch (PDOException $th) {
                print "ERROR" . $th->getMessage() . "<br>";
                var_dump($th);
                die();
            }
        }
    }
    public static function closeConnection()
    {
        if (isset(self::$connection)) {
            self::$connection = null;
        }
    }
    public static function dd($object){
        var_dump($object);
        die();
    }
    
}


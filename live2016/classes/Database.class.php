<?php
/**
 * Database Connection Class
 */

class Database
{
    private static $_dbconn; //singleton connection object

    private function __construct() {} //disallow creating a new object of class with new Database()

    private function __clone() {} //disallow cloning the class

    public static function getInstance()
    {
        if (self::$_dbconn === NULL) {
            $dsn =  'mysql:host='.Config::DB_HOST.
                    ';dbname='.Config::DB_NAME.
                    ';charset=utf8';

            self::$_dbconn = new PDO($dsn,
                                Config::DB_USER,
                                Config::DB_PASS
                                );

            //Raise exceptions when a database exception occurs
            self::$_dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }

        return self::$_dbconn;
    }

}

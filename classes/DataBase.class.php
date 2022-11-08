<?php

class DataBase
{
    private $host = "localhost";
    private $db_name = "rock_stars_db";
    private $username = "root";
    private $pwd = "";
    protected function connect(){
        // dsn takes support three ways of specifiying arguments : 1) driver invocation , URI invocation , aliasing (dsn consists of a name name that maps to pdo.dsn.name in php.ini defining the DSN string.)
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name.';'; // mysql data source name : mysql is the driver name
        $pdo = new PDO($dsn,$this->username,$this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); // defining data type to be returned from each connection (associative array)
        return $pdo;
    }
}
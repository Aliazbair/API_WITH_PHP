<?php

class Database {
    // create connection props
    private $host="127.0.0.1";
    private $database_name = "";
    private $username = "root";
    private $password = "";

    // con prop
    public $con;

    // create conection method
    public function getConnection()
    {
        $this->con=null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}



?>
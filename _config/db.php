<?php

//class parents 
class database {

    protected $db;
    private $host = '';
    private $login = '';
    private $password = '';
    private $dbname = '';
//création de la fonction construct
    public function __construct() {
        $this->host = HOST;
        $this->login = LOGIN;
        $this->password = PASSWORD;
        $this->dbname = DBNAME;
    }
    //connexion a la base de données
    protected function dbConnect() {
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';port=3306;dbname=' . $this->dbname . ';charset=utf8', $this->login, $this->password);
       $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //TODO REMOVE TO AVOID DISPLAYING SQL ERROR
            } catch (Exception $e) {
            die($e->getmessage());
        }
    }

    public function __destruct() {
        $this->db = NULL;
    }

}

<?php

class power extends database {

    public $id = 0;
    public $power = '';
    
    
    

    public function __construct() {
        parent::__construct();
        $this->dbConnect();

    }
    public function getPowerList(){
        $ObjectResult = array();       
                $request = 'SELECT `id` ,`power` FROM `AZ741_power`';
        $powerResult = $this->db->query($request); 
        // Vérifie que $categoryResult est un objet
        if (is_object($powerResult)) {
           
          // Stocke la requête dans $categoryResult
          $ObjectResult = $powerResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $categoryResult
        return $ObjectResult;
    }
}

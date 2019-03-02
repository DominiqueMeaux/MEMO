<?php

class category extends database {

    public $id = 0;
    public $category = '';
    
    
    

    public function __construct() {
        parent::__construct();
        $this->dbConnect();

    }
    public function getCategoryList(){
        $ObjectResult = array();       
                $request = 'SELECT `id` ,`category` FROM `AZ741_category`';
        $categoryResult = $this->db->query($request); 
        // Vérifie que $categoryResult est un objet
        if (is_object($categoryResult)) {
           
          // Stocke la requête dans $categoryResult
          $ObjectResult = $categoryResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $categoryResult
        return $ObjectResult;
    }
}

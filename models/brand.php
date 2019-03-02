<?php

class brand extends database {

    public $id = 0;
    public $brand = '';
    
    
    

    public function __construct() {
        parent::__construct();
        $this->dbConnect();

    }
//    public function uploadFilePdf() {
//        $query = 'INSERT INTO _photo (`id`, `name`, `source`) '
//                . 'VALUES (:id, :name, :source)';
//        $result = $this->db->prepare($query);
//        $result->bindValue(':id', $this->id, PDO::PARAM_STR);
//        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
//        $result->bindValue(':source', $this->source, PDO::PARAM_STR);
//        return $result->execute();
//    }
//    
    public function getBrandList(){
        $isObjectResult = array();       
                $request = 'SELECT `id` ,`brand` FROM `AZ741_brand`';
        $brandResult = $this->db->query($request); 
        // Vérifie que $brandResult est un objet
        if (is_object($brandResult)) {
           
          // Stocke la requête dans $brandResult
          $isObjectResult = $brandResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $brandResult
        return $isObjectResult;
    }
    
    
     
    
    
    
    public function uploadFile() {
        $query = 'INSERT INTO AZ741_material (`warrantyLink`) VALUES (:warrantyLink)';
        $result = $this->db->prepare($query);
        $result->bindValue(':warrantyLink', $this->warrantyLink, PDO::PARAM_STR);

        return $result->execute();
    }
}

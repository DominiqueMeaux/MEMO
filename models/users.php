<?php

class users extends database {

    public $id = 0;
    public $login = '';
    public $password = '';
    public $mail = '';
    
    

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Méthode permettant l'enregistrement d'un utilisateur
     * redaction de la requete
     * on utilise des Marqueur nominatif pour les valeurs  
     * cela sert a recuperer les parametres d une fonction et leurs donnée une valeur
     * quand on met des bindValue on utilise prépare ( bindValue sert a protéger un minimum l injection de code sql)
     * @return boolean
     */
    public function userRegister() {
        $query = 'INSERT INTO `AZ741_users` ( `mail`, `password`, `login`, `idRole`) '
                . 'VALUES (:mail, :password, :login, 1)';
        $result = $this->db->prepare($query);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        return $result->execute();
    }
    /**
     * Méthode permettant de faire la connexion de l'utilisateur
     * on utilise des Marqueur nominatif pour les valeurs  
     * cela sert a recuperer les parametres d une fonction et leurs donnée une valeur
     * @return boolean
     */
    public function userConnection() {
        $state = false;
        $query = 'SELECT `id`, `login`, `password`, `mail` FROM `AZ741_users` WHERE `login` = :login';
        $result = $this->db->prepare($query);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        if ($result->execute()) { //On vérifie que la requête s'est bien exécutée
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            if (is_object($selectResult)) { //On vérifie que l'on a bien trouvé un utilisateur
                // On hydrate
                
                $this->login = $selectResult->login;
                $this->id = $selectResult->id;
                $this->password = $selectResult->password;              
                              
                $state = true;
            }
        }
        return $state;
    }

    /**
     * Méthode permettant de savoir si l'utilisateur existe
     * @return type
     */
    public function checkIfUserExist(){
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `AZ741_users` '
                . 'WHERE `login` = :login';
        $result = $this->db->prepare($query);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        // on attribue la valeur via bindValue et on recupère les attributs de la classe via $this
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }
    
    /**
     * Méthode qui récupère le profil d'un utilisateur
     * @return type
     */
   public function getProfilById() {


// On met notre requète dans la variable $query qui selectionne
//  tous les champs de la table users l'id est egal à :id via marqueur nominatif sur id
        $query = 'SELECT `id`, `login`, `mail` ' 
                . 'FROM `AZ741_users` ' 
                . 'WHERE `id` = :id';
// On crée un objet $Profile qui utilise la fonction prepare avec comme paramètre $query 
        $profile = $this->db->prepare($query);
        $profile->bindValue(':id', $this->id, PDO::PARAM_INT);
// on attribue la valeur via bindValue et on recupère les attributs de la classe via $this
        $profile->execute();
        if (is_object($profile)) {
            $isCorrect = $profile->fetch(PDO::FETCH_OBJ);
            
        }
        return $isCorrect;
    }
    
    
    
    /**
     * Méthode qui permet de modifer le profil par l utilisateur
     * @return type
     */
    public function updateProfilById() {
// MAJ des données de l utilisateur à l'aide d'une requête préparée avec un UPDATE et le nom des champs de la table
// Insertion des valeurs des variables via les marqueurs nominatifs.
        $query = 'UPDATE `AZ741_users` '
                . 'SET `login` = :login, `mail` = :mail '
                . 'WHERE `id` = :id';
        $updateUser = $this->db->prepare($query);
// on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $updateUser->bindValue(':login', $this->login, PDO::PARAM_STR);        
        $updateUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);        
        $updateUser->bindValue(':id', $this->id, PDO::PARAM_INT);
// on utilise la méthode execute() via un return
        return $updateUser->execute();
    }
    
    /**
     * Méthode qui permet a l utilisateur de supprimer son profil ainsi que tout les données le concernant
     * @return type
     */
    public function deleteUserAndAppareilById() {
        $query = 'DELETE FROM `AZ741_users` WHERE `id`= :id ';
        $deleteUser = $this->db->prepare($query);
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteUser->execute();
    }
}



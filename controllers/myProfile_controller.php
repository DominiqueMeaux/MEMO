<?php
include_once '_config/config.php';
include_once '_config/db.php';
include_once 'models/users.php';
include_once 'lang/FR_FR.php';
// On instancie l'objet users 
$user = new users();
//on recupère l'id par la variable de session pour l affichage
if (isset($_SESSION['id'])) {
    $user->id = $_SESSION['id'];    
}

$errorList = array();


//isset:  Détermine si une variable est définie et est différente de NULL
if (isset($_POST['submit'])) {
    //recupération du marqueur nominatif 'delete' pour l injecter dans l url
    if (isset($_GET['delete'])) {
    $profile->id = $_GET['delete'];  
    $deleteUser = $user->deleteUserAndAppareilById();
    if ($user->deleteUserAndAppareilById()) {  
        //on détruit les variables de session ainsi que la session
        // lors du delete et on redirige sur l index
        session_unset();             
        session_destroy();             
        header('Location:index.php');            
        exit;         
        
    }
    }
}

if (isset($_POST['updateSubmit'])) {
    //vérification du pseudonyme
    //!empty — Détermine si une variable n est pas vide
     if (!empty($_POST['login'])) {
        if (preg_match($regexLogin, $_POST['login'])) {
            //trim : Supprime les espaces (ou d'autres caractères) en début et fin de chaîne    
            // Variable login qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
            $login = htmlspecialchars(trim($_POST['login']));
        } else {
            // J'affiche l'erreur
            $errorList['login'] = ERROR_LOGIN;
        }
    } else {
        $errorList['login'] = ENTER_LOGIN;
    }

    //vérification du mail
    if (!empty($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        // Variable mail qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
        //strtolower permet de mettre tout les caractère en minuscule
        $mail = htmlspecialchars(strtolower(trim($_POST['mail'])));
    } else {
        // J'affiche l'erreur
        $errorList['mail'] = ERROR_MAIL;
    }



    
        
    //on vérifie que nous avons crée une entrée submit dans l'array $_POST,
    // si présent on éxécute la méthode updateProfilById()
    if (count($errorList) == 0) {
        $user->login = $login;
        //j ecrase la variable de session pour la remplacer par la nouvelle
        $_SESSION['login'] = $user->login;
        $user->mail = $mail;
        if (!$user->updateProfilById()){
             $errorList['update'] = SENDS_THE_FORM_TO_FAILED;             
        }
    }
}
//on instancie la méthode getProfilById
$profile = $user->getProfilById();

?>
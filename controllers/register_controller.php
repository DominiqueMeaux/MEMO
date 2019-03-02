<?php

//Appel AJAX
if (isset($_POST['loginCheck'])) {
    include_once '../_config/config.php';
    include_once '../_config/db.php';
    include_once '../models/users.php';
    include_once '../lang/FR_FR.php';
    $result = array();
    //si le pseudo est dispo et qu il est correct
    if (preg_match($regexLogin, $_POST['loginCheck'])) {
        //on instencie
        $user = new users();
        $user->login = $_POST['loginCheck'];
        //on execute la méthode checkIfUserExist si  
        if ($user->checkIfUserExist() == 0) {
            // le pseudo est dispo message "le pseudo est disponible"
            $result['success'] = true;
            $result['msg'] = USERNAME_AVAILABLE;
            //sinon message d erreur
        } else {
            $result['success'] = false;
            $result['msg'] = THIS_USERNAME_IS_UNAVAILABLE;
        }
    } else {
        $result['success'] = false;
        $result['msg'] = THIS_USERNAME_IS_INCORRECT;
    }
    //on convertit en json pour pouvoir l utiliser dans le retour de l ajax
    echo json_encode($result);
} else if (isset($_POST['registerSubmit'])) {

    $login = '';
    $mail = '';
    $password = '';
    $passwordVerify = '';
    $errorList = array();
    //si la variable "$post" contient des information alors on les traites sinon

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
//password_hash est une fonction php qui permet de haché le mot de passe
    if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] == $_POST['passwordVerify']) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        // J'affiche l'erreur
        $errorList['password'] = ERROR_PASSWORD;
    }

    if (!empty($_POST['password']) && !empty($_POST['passwordVerify']) && $_POST['password'] != $_POST['passwordVerify']) {
        // J'affiche l'erreur
        $errorList['passwordVerify'] = ERROR_PASSWORD_VERIFY;
    }

//si le tableau d'erreur est vide et que la méthode checkIfUserExist est executé sans trouver de login existant alors j'execute la méthode users
    if (count($errorList) == 0) {
        $user = new users();
        $user->mail = $mail;
        $user->password = $password;
        $user->login = $login;
        $state = $user->checkIfUserExist();
        //si le login est disponible alors l utilisateur est redirigé vers la page de connexion  
        if ($state == 0) {
            $user->userRegister();
            header('location:../login_view.php');
            exit();
        //sinon message d erreur  
        } else {
            $errorList['login'] = ERROR_LOGIN_EXIST;
        }
    }
}   
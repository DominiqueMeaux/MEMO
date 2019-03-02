<?php

$login = '';
$message = '';
$errorList = array();
if (isset($_POST['loginSubmit'])) {
    if (!empty($_POST['login'])) {
        if (preg_match($regexLogin, $_POST['login'])) {
        //trim : Supprime les espaces (ou d'autres caractères) en début et fin de chaîne 
        // Variable login qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
        $login = htmlspecialchars(trim($_POST['login']));
    } else {
        $errorList['login'] = ERROR_LOGIN;
    }
    } else {
        $errorList['login'] = ENTER_LOGIN;
    }
    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errorList['password'] = ERROR_PASSWORD;
    }
}

    
  if (count($errorList) == 0) {
        $user = new users();
        $user->login = $login;
        if ($user->userConnection()) {
            //on utilise la fonction php password_verify pour savoir si le password correspond au hachage ds la base de données 
            if (password_verify($password, $user->password)){
                //la connexion se fait
                $message = USER_CONNECTION_SUCCESS;
               //On rempli la session avec les attributs de l'objet issus de l'hydratation
                $_SESSION['login'] = $user->login;
                $_SESSION['id'] = $user->id;
                $_SESSION['isConnect'] = true;
                header('location:../myProfile_view.php');
            exit();
            } else {
                //la connexion échoue
                $message = USER_CONNECTION_ERROR;
            }
        }
    }


<?php

if (isset($_GET['action'])) {
    //Si on veut se déconnecter
    if ($_GET['action'] == 'disconnect') {
//        session_unset — Détruit toutes les variables d'une session
        session_unset();
        //destruction de la session
        session_destroy();
        //redirection de la page vers l'index
        header('location:index.php');
    }
}


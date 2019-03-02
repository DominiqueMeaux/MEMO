<?php
// Définition des informations de connexion à la base de données
define('HOST', 'localhost');
define('LOGIN', 'dom');
define('PASSWORD', '');
define('DBNAME', 'MEMO');


//declaration des regex
$regexLogin = '/^[a-zA-Z\-éèêëïîôöâäç0-9 ]+$/';
$regexModel = '/^[a-zA-Z\-éèêëïîôöâäç0-9_./<>"\' ]+$/';
$regexSerialNumber = '/^[a-zA-Z0-9_./-\ ]+$/';

session_start();


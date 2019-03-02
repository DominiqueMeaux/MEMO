<?php
//include_once 'includes/head.php';
include_once '_config/config.php';
include_once 'controllers/header_controller.php';
include_once 'lang/FR_FR.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <script src="../assets/js/script.js"></script>
        <link rel="stylesheet" href="../assets/css/styles.css" />
        <title><?= ucfirst($_SERVER['PHP_SELF']) == '/index.php' ? LOGIN_TITLE : '' ?></title>
    </head>
    <body>
        <header>
            <!-- HEADER -->
            <div class="logo">MEMO</div>
            <nav class="active">
                <ul>
                    <li><a href="index.php"><?= HOME ?></a></li>

                    <?php if (!isset($_SESSION['isConnect'])) { ?>
                        <li class="dropdown"><a href="#">Inscription/Connexion</a>
                            <ul>
                                <li><a href="login_view.php"><?= NAV_CONNECT ?></a></li><!--Connexion-->
                            <?php } else { ?>
                                <li class="dropdown"><a role="button" href="#"><?= sprintf(NAV_WELCOME, $_SESSION['login']) ?></a> <!--Bienvenue login-->
                                    <ul>
                                        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?action=disconnect"><?= NAV_DISCONNECT ?></a></li><!--Deconnexion-->
                                        <li><a href="myProfile_view.php"><?= MY_PROFILE ?> </a></li><!--Mon profil-->
                                    </ul>
                                </li>
                            <?php } ?> 

                            <?php if (!isset($_SESSION['isConnect'])) { ?>
                                <li><a href="register_view.php"><?= NAV_REGISTRATION ?></a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['isConnect'])) { ?>
                                <li><a href="recordingMaterial_view.php"><?= MAINTENANCE_MANAGEMENT ?></a></li>
                                <li><a href="#"><?= CONTACT ?></a></li>
                            <?php } ?>


                        </ul>
                        <?php if (!isset($_SESSION['isConnect'])) { ?>

                        <li><a href="#"><?= CONTACT ?></a></li>
                    <?php } ?>

                    </li>

                </ul>
            </nav>
            <div class="menu-toggle"> 
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>

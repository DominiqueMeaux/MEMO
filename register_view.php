
<?php
include_once '_config/config.php';
include_once '_config/db.php';
include_once 'models/users.php';
include_once 'lang/FR_FR.php';
include_once 'controllers/register_controller.php'; 
?>
<?php include_once 'includes/header.php'; ?>

<!-- Début formulaire-->
<div class="container" id="containerRegister">
    <form class="formRegister" action="#" method="POST">
        <h1 class="titleLogin"><?= REGISTER_TITLE ?></h1>
        <div id="separation"></div>
        <div class="form-group has-error">
            <i class="fa fa-user icon" aria-hidden="true"></i>
            <label class="labelConnect" for="login" class="control-label"><?= REGISTER_LOGIN ?></label>
            <!--input pseudonyme-->
            <input type="text" name="login" id="loginCheck" class="form-control" placeholder="<?= REGISTER_PLACEHOLDER_LOGIN ?>" value ="<?= isset($login) ?  $login : '' ?>"/> 
            <!-- Ternaire : si on a une valeur dans login on affiche sinon on affiche rien-->           
            <div class="msgError"></div> 
            <!--msgError est un message d erreur généré en AJAX-->
            <?php if (isset($errorList['login'])) { ?>
            <!--si login n est pas rempli alors message d erreur-->
                <div class="alert alert-danger" role="alert">
                    <p class="text-danger"><?= $errorList['login']; ?></p>
                </div>
            <?php } ?>
        </div>
        <div class="form-group has-error">
            <i class="fa fa-envelope icon" aria-hidden="true"></i>
            <label class="labelConnect" for="mail"><?= REGISTER_MAIL ?></label>
            <!--input adresse mail-->
            <input type="mail" name="mail" id="mail" class="form-control" placeholder="<?= REGISTER_PLACEHOLDER_MAIL ?>" value ="<?= isset($mail) ?  $mail : '' ?>"/> 
            <!-- Ternaire :si on a une valeur dans mail on affiche sinon on affiche rien-->
            <?php if (isset($errorList['mail'])) { ?>
            <!--si mail n est pas rempli alors message d erreur-->
                <div class="alert alert-warning" role="alert">
                    <p class="text-danger"><?= $errorList['mail']; ?></p>
                </div>
            <?php } ?>
        </div>
        <div class="form-group has-error">
            <i class="fa fa-key icon" aria-hidden="true"></i>
            <label class="labelConnect" for="password"><?= REGISTER_PASSWORD ?></label>
            <!--input mot de passe-->
            <input type="password" name="password" id="password" class="form-control" placeholder="<?= REGISTER_PLACEHOLDER_PASSWORD ?>" /> 
            <?php if (isset($errorList['password'])) { ?>
            <!--si password n est pas rempli alors message d erreur-->
                <div class="alert alert-warning" role="alert">
                    <p class="text-danger"><?= $errorList['password']; ?></p>
                </div> 
            <?php } ?>
        </div>
        <div class="form-group has-error">
            <i class="fa fa-key icon" aria-hidden="true"></i>
            <label class="labelConnect" for="passwordVerify"><?= REGISTER_PASSWORD_VERIFY ?></label>
            <!--input vérification du mot de passe-->
            <input type="password" name="passwordVerify" id="passwordVerify" class="form-control" placeholder="<?= REGISTER_PLACEHOLDER_PASSWORD_VERIFY ?>" /> 
            <?php if (isset($errorList['passwordVerify'])) { ?>
            <!--si passwordVerify n est pas rempli alors message d erreur-->
                <div class="alert alert-warning" role="alert">
                    <p class="text-danger"><?= $errorList['passwordVerify']; ?></p>
                </div>
            <?php } ?>
        </div>        
            <input type="submit" name="registerSubmit" id="registerSubmit" value="<?= REGISTER_SUBMIT ?>" />      
    </form>
</div>
<!--fin formulaire-->
</body>
</html>


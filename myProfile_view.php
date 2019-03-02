<?php
include_once '_config/config.php';
include_once '_config/db.php';
include_once 'models/users.php';
include_once 'controllers/myProfile_controller.php';
?>
    <?php include_once 'includes/header.php'; ?>
    <ul id="tabs">
        <li><a href="#" name="tab1"><?= PROFILE ?></a></li>
        <li><a href="#" name="tab2">Two</a></li>
        <li><a href="#" name="tab3">Three</a></li>
        <li><a href="#" name="tab4">Four</a></li>    
    </ul>
    <div id="content"> 
        <div id="tab1"> 
            <div class="container displayProfile">
                        <ul>
                           <!--affichage du profil--> 
                            <li>Pseudonyme : <?= $profile->login ?></li>
                            <li>Adresse E-mail : <?= $profile->mail ?></li>
                        </ul>
               <!--activation formulaire de modification-->    
            <input type="submit" name="ModifySubmit" id="ModifySubmit" value="<?= MODIFY_SUBMIT ?>" />
            <!--suppression du profil-->
            <form method="POST" action="?delete=<?= $profile->id  ?>"><input type="submit" value="Deleted" name="submit" class="btn btn-danger"/></form>
            </div>             
           <!--formulaire de modification de profil-->
            <div class="container" id="containerUpdateProfile">
                <form class="formRegister" action="#" method="POST">
                    <h1 class="titleLogin"><?= CHANGE_PROFILE ?></h1>
                    <div id="separation"></div>
                    <div class="form-group has-error">
                        <i class="fa fa-user icon" aria-hidden="true"></i>
                        <label class="labelConnect" for="login" class="control-label"><?= REGISTER_LOGIN ?></label>
                        <input type="text" name="login" id="loginChange" class="form-control" placeholder="<?= REGISTER_PLACEHOLDER_LOGIN ?>" <?= isset($profile->login) ? 'value="' . $profile->login . '"' : '' ?>/> <!--si on a une valeur dans login on affiche sinon on affiche rien-->

                        <?php if (isset($errorList['login'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <p class="text-danger"><?= $errorList['login']; ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="form-group has-error">
                        <i class="fa fa-envelope icon" aria-hidden="true"></i>
                        <label class="labelConnect" for="mail"><?= REGISTER_MAIL ?></label>
                        <input type="mail" name="mail" id="mail" class="form-control" placeholder="<?= REGISTER_PLACEHOLDER_MAIL ?>" <?= isset($profile->mail) ? 'value="' . $profile->mail . '"' : '' ?>/> <!--si on a une valeur dans mail on affiche sinon on affiche rien-->
                        <?php if (isset($errorList['mail'])) { ?>
                            <div class="alert alert-warning" role="alert">
                                <p class="text-danger"><?= $errorList['mail']; ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <!--submit modification profil-->
                        <input type="submit" name="updateSubmit" id="updateSubmit" value="<?= UPDATE_SUBMIT ?>" />
                        <p><?= isset($errorList['update']) ? $errorList['update'] : '' ?></p>                   
                </form>
            </div>           
        </div>      
    <div id="tab2">...</div>
            
        <div id="tab3">...</div>
        <div id="tab4">...</div>
    </div>
</body>
</html>
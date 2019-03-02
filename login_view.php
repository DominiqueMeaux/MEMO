

<?php
include_once '_config/config.php';
include_once '_config/db.php';
include_once 'models/users.php';
include_once 'lang/FR_FR.php';
include_once 'controllers/login_controller.php';
?>
<body>
    <?php include_once 'includes/header.php'; ?>
    <?php if (isset($_POST['loginSubmit']) && (count($errorList) === 0)) { ?>
        <?php } ?>
    <?php if ($message != '') { ?> 
            <div class="alert alert-secondary" role="alert">
                <p><?= $message ?></p>
            </div> 
<?php } else { ?>
        <div class="container" id="containerLogin">
            <form action="#" method="POST">
                <h1 class="titleLogin"><?= FORM_CONNECTION ?></h1>
                <div id="separation"></div>
                <div class="input-container">
                    <i class="fa fa-user icon" aria-hidden="true"></i>
                    <label class="labelConnect" for="login"><?= FORM_ID ?></label>
                    <input type="text" class="input-field" name="login" id="login" placeholder="<?= FORM_PLACEHOLDER_USERNAME ?>" />
                    <?php if (isset($errorList['login'])) { ?>
                        <p class="text-danger"><?= $errorList['login']; ?></p>
    <?php } ?>
                </div>
                <div class="input-container">
                    <i class="fa fa-key icon" aria-hidden="true"></i>
                    <label class="labelConnect" for="password"><?= FORM_PASSWORD ?></label>
                    <input type="password" class="input-field" name="password" id="password" placeholder="<?= FORM_PLACEHOLDER_PASSWORD ?>" />
                    <?php if (isset($errorList['password'])) { ?>
                        <p class="text-danger"><?= $errorList['password']; ?></p>
    <?php } ?>
                </div>
                <input type="submit" value="<?= FORM_LOGIN_SUBMIT ?>" name="loginSubmit" id="loginSubmit" />  
            </form>
        </div>
    <?php } ?>
   


</body>
</html>

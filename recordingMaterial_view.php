<?php
include_once '_config/config.php';
include_once '_config/db.php';
//include_once 'models/users.php';
//include_once 'models/material.php';
include_once 'lang/FR_FR.php';
include_once 'controllers/recordingMaterial_controller.php';
?>



    <?php include_once 'includes/header.php' ?>
    
        <div class="container" id="containerRecordingMaterial">
            <form class="formRegister" action="#" method="POST" enctype="multipart/form-data">
                <!--enctype est la façon dont le fichier .pdf va être encodé-->
                <h1 class="titleLogin"><?= RECORDING_MATERIAL_TITLE ?></h1>
                <div id="separation"></div>
                <div class="form-row">
                    <div class="form-group col-md-5"> 
                        <!--liste déroulante des catégories-->
                        <label class="labelRecording" for="category"><?= RECORDING_CATEGORY ?></label>
                        <select class="custom-select" id="category" name="category">
                            <option selected disabled><?= SELECT_OPTION ?></option>
                            <?php foreach ($categotyList as $listCa) { ?>
                                <option value="<?= $listCa->id ?>"><?= $listCa->category ?></option>
    <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="form-group col-md-5"> 
                        <!--liste déroulante des marques-->
                        <label for="brand"><?= BRAND ?></label>
                        <select class="custom-select" id="brand" name="brand">
                            <option selected disabled><?= SELECT_OPTION ?></option>
                            <?php foreach ($brandList as $listBr) { ?>
                                <option value="<?= $listBr->id ?>"><?= $listBr->brand ?></option>
    <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group has-error col-md-5"> 
                        <!--liste déroulante des types alimentations-->
                        <label class="labelRecording" for="power"><?= RECORDING_POWER ?></label>
                        <select class="custom-select" id="power" name="power">
                            <option selected disabled><?= SELECT_OPTION ?></option>
                            <?php foreach ($powerList as $listPo) { ?>
                                <option value="<?= $listPo->id ?>"><?= $listPo->power ?></option>
    <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="custom-file has-error col-md-5">
                        <!--téléchargement pdf-->
                        <!--    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>-->
                        <input type="file" name="warrantyPdf" >
                        <!--<div class="invalid-feedback">Example invalid custom file feedback</div>-->
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group has-error col-md-5"> 
                        <!--modele -->
                        <label class="labelRecording" for="model" class="control-label"><?= RECORDING_MODEL ?></label>
                        <input type="text" name="model" id="model" class="form-control" placeholder="<?= PLACEHOLDER_MODEL ?>" value ="<?= isset($model) ?  $model : '' ?>" />
                        <?php if (isset($errorList['model'])) { ?>
                            <p class="text-danger"><?= $errorList['model']; ?></p>
    <?php } ?>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="form-group has-error col-md-5">
                      <!--N° de série-->
                        <label class="labelRecording" for="serialNumber"><?= RECORDING_SERIAL_NUMBER ?></label>
                        <input type="text" name="serialNnumber" id="serialNumber" class="form-control" placeholder="<?= PLACEHOLDER_SERIAL_NUMBER ?>" value ="<?= isset($serialNumber) ?  $serialNumber : '' ?>" />
                        <?php if (isset($errorList['serialNnumber'])) { ?>
                            <p class="text-danger"><?= $errorList['serialNnumber']; ?></p>
    <?php } ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group has-error col-md-5">
                        <!--Date d'achat-->
                        <label class="labelRecording" for="dateOfPurchase"><?= DATE_OF_PURCHASE ?></label>
                        <input type="date" name="dateOfPurchase" id="dateOfPurchase" class="form-control" placeholder="<?= REGISTER_PLACEHOLDER_PASSWORD_VERIFY ?>" value ="<?= isset($dateOfPurchase) ?  $dateOfPurchase : '' ?>" />
                        <?php if (isset($errorList['dateOfPurchase'])) { ?>
                            <p class="text-danger"><?= $errorList['dateOfPurchase']; ?></p>
    <?php } ?>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="form-group has-error col-md-5">
                        <!--Date de fin de garantie-->
                        <label class="labelRecording" for="endOfWarranty"><?= END_OF_WARRANTY ?></label>
                        <input type="date" name="endOfWarranty" id="endOfWarranty" class="form-control" placeholder="<?= REGISTER_PLACEHOLDER_PASSWORD_VERIFY ?>" />
                        <?php if (isset($errorList['endOfWarranty'])) { ?>
                            <p class="text-danger"><?= $errorList['endOfWarranty']; ?></p>
    <?php } ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group has-error col-md-6">
                        <input type="submit" name="recordingSubmit" id="recordingSubmit" value="<?= UPLOAD_SUBMIT ?>" />
                    </div>
                    <div class="form-group has-error col-md-6">
                        <input type="submit" name="recordingSubmit" id="registerSubmit" value="<?= REGISTER_SUBMIT ?>" />
                    </div>
                </div>
            </form>
        </div>




</body>
</html>


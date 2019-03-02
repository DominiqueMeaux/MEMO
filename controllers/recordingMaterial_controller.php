<?php

include_once '_config/config.php';
include_once '_config/db.php';
//include_once 'models/users.php';
include_once 'models/brand.php';
include_once 'models/category.php';
include_once 'models/power.php';
include_once 'lang/FR_FR.php';

$category = '';
$brand = '';
$serialNnumber = '';
$login = '';



$brand = new brand();
$brandList = $brand->getBrandList();
$category = new category();
$categotyList = $category->getCategoryList();
$power = new power();
$powerList = $power->getPowerList();
$errorList = array();


if (isset($_POST['recordingSubmit'])) {

    if (!empty($_FILES['warrantyPdf'])) {
        if (is_uploaded_file($_FILES['warrantyPdf']['tmp_name'])) {
            // Tableau contenant les extensions attendues
            $authorizedExtention = array('.pdf', '.PDF');
            $pdf = $_FILES['warrantyPdf'];
            $start_path = $pdf['tmp_name'];
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $end_path = 'assets/imgs/' . $pdf['name'];
            if (!in_array($extension, $authorizedExtention)) {
                $errorList['warrantyPdf'] = 'Extension non valide (attendue pdf, PDF)';
            } else {
              
                if
                (move_uploaded_file($start_path, $end_path)) {
                    //insertion en base du nom
                    $photo = new brand();
                    $photo->name = $pdf['name'];
                    $photo->uploadFile();
                }
            }
        }
    }

    if (!empty($_POST['model'])) {
        if (preg_match($regexmodel, $_POST['model'])) {
            //trim : Supprime les espaces (ou d'autres caractères) en début et fin de chaîne    
            // Variable login qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
            $model = htmlspecialchars(trim($_POST['model']));
        } else {
            // J'affiche l'erreur
            $errorList['model'] = ERROR_MODEL;
        }
    } else {
        $errorList['model'] = ENTER_MODEL;
    }

    if (!empty($_POST['serialNnumber'])) {
        if (preg_match($regexSerialNumber, $_POST['serialNnumber'])) {
            //trim : Supprime les espaces (ou d'autres caractères) en début et fin de chaîne    
            // Variable login qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
            $serialNnumber = htmlspecialchars(trim($_POST['serialNnumber']));
        } else {
            // J'affiche l'erreur
            $errorList['serialNnumber'] = ERROR_SERIAL_NUMBER;
        }
    } else {
        $errorList['serialNnumber'] = ENTER_SERIAL_NUMBER;
    }
    
    
//        if (count($errorList) == 0) {
//        $user->login = $login;
//        //j ecrase la variable de session pour la remplacer par la nouvelle
//        $_SESSION['login'] = $user->login;
//        $user->mail = $mail;
//        if (!$user->updateProfilById()){
//             $errorList['update'] = SENDS_THE_FORM_TO_FAILED;             
//          } else {
//             $addSuccess = true;
//          }
//    }
//    $file_name = $_FILES['file']['name'];
//    //permet de chercher la dernière occurence, ici l\'entension du fichier
//    $file_extension = strrchr($file_name, ' . ');
//    
//    $file_tmp_name = $_FILES['fichier']['tmp_name'];
//    //stockage du fichier dans le dossier définitif
//    $file_dest = 'files/'.$files_name;
//    //permet de récupérer le type du fichier
//   // $file_type = $_FILES['fichier']['type'];
//    //création du tableau qui limite les extensions autorisées
//    $extensions = array('.pdf', '.PDF');
//    //in_array fonction permettant de vérifier si l extension du fichier est autorisée dans le tableau des extensions
//    if(in_array($file_extension, $extensions)){
//        //permet de déplacer le fichier du dossier temporaire au dossier définitif
//        if(move_uploaded_file($file_tmp_name, $file_dest)){
//            $equipment->uploadFilePdf();
//            echo 'Fichier envoyer avec succès';
//        }else{
//            echo 'Une erreur est survenue';
//        }
//    }else{
//        echo 'seuls les fichiers pdf sont autorisés';
//    }
//}
//
//
//    
//        if (isset($_POST['category'])){
//$category = $categoryList[$_POST['category']];}
////array_key_exists : Vérifie si une clé existe dans le tableau
//else if(isset($_POST['equipmentSubmit']) && !array_key_exists ('category', $_POST)){
//    $errorList['category'] = ERROR_SELECT_OPTION; 
//if (!empty($_POST['model'])) {
//    //trim : Supprime les espaces (ou d'autres caractères) en début et fin de chaîne 
//    // Variable login qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
//        $login = htmlspecialchars(trim($_POST['model']));
//    } else {
//        $errorList['model'] = ERROR_MODEL;
//    }
//    
//
//    if (!empty($_POST['login'])) {
//        $login = htmlspecialchars($_POST['login']);
//    } else {
//        $errorList['login'] = ERROR_LOGIN;
//    }
//
//    if (count($errorList) == 0) {
//        //$user = new users();
//        $user->mail = $mail;
//        $user->password = $password;
//        $user->login = $login;
//       // $user->userRegister();
//    }
//    }
//
}
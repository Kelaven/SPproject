<?php

// header update
$title = 'Formulaire d\'accès —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';


// to have constants
require_once __DIR__.'/../config/init.php';



// ! cleaning and validation
if ($_SERVER["REQUEST_METHOD"] == "POST") { // get the form's response
    $error = [];
    // ! loginAccess
    $loginAccess = filter_input(INPUT_POST, 'loginAccess', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
    if (empty($loginAccess)) { // to be sure it's not empty
        $error['loginAccess'] = 'L\'identifiant n\'est pas renseigné';
    } else { // validation
        $isloginAccessOk = filter_var($loginAccess, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_IDENTIFIANT.'/')));
        if (!$isloginAccessOk) { // if it's not validate with the regex
            $error['loginAccess'] = 'L\'identifiant n\'est pas correct';
        }
    }

    // ? passwordAccess
    $passwordAccess = filter_input(INPUT_POST, 'passwordAccess');

    if (empty($passwordAccess)){
        $error['passwordAccess'] = 'Le mot de passe n\'est pas renseigné';
    } else {
        $isPasswordAccessOk = filter_var($passwordAccess, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_PASSWORD.'/')));
        if (!$isPasswordAccessOk) {
            $error["passwordAccess"] = 'Le mots de passe est incorrect';
        } else {
            $passwordAccessHash = password_hash($passwordAccess, PASSWORD_DEFAULT);
        }
    }
}



// views
// include __DIR__.'/../views/templates/header__accesclientform.php';
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/accesclientform.php';
include __DIR__.'/../views/templates/footer.php';
// include __DIR__.'/../views/templates/footer__accesclientform.php';
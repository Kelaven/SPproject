<?php

// to have constants
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../models/Gallery.php';





try {
    // * recover and clean id_gallery from URL
    $id_gallery = intval(filter_input(INPUT_GET, 'id_gallery', FILTER_SANITIZE_NUMBER_INT));


    // header update
    $title = 'Formulaire d\'accès —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
    $accesclientStyle = 'accesclient.css';



    // * galleries infos
    $gallery = Gallery::get($id_gallery);
    // d($gallery);

    // ! cleaning and validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // get the form's response

        $error = [];
        // // ! loginAccess
        // $loginAccess = filter_input(INPUT_POST, 'loginAccess', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
        // if (empty($loginAccess)) { // to be sure it's not empty
        //     $error['loginAccess'] = 'L\'identifiant n\'est pas renseigné';
        // } else { // validation
        //     $isloginAccessOk = filter_var($loginAccess, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_IDENTIFIANT . '/')));
        //     if (!$isloginAccessOk) { // if it's not validate with the regex
        //         $error['loginAccess'] = 'L\'identifiant n\'est pas correct';
        //     }
        // }

        // * passwordAccess
        $passwordAccess = filter_input(INPUT_POST, 'passwordAccess');

        if (empty($passwordAccess)) {
            $error['passwordAccess'] = 'Le mot de passe n\'est pas renseigné';
        } else {
            $isOk = $passwordAccess === $gallery->password; // return true if the user's password is exactly the same than the gallery's password
            // $isOk = password_verify($passwordAccess, $gallery->password);
            // dd($isOk);
            if (!$isOk) {
                $error["passwordAccess"] = 'Le mots de passe est incorrect';
            } else {
                $passwordAccessHash = password_hash($passwordAccess, PASSWORD_DEFAULT);

                // * if password if ok, the user can access to the gallery (and not to others galleries thanks to SESSION !)
                $_SESSION['isAllow' . $id_gallery] = true; // used in gallerypictures-ctrl.php
                // unset($_SESSION['isAllow']);
                // dd($_SESSION);
                header("Location: /controllers/gallerypictures-ctrl.php?id_gallery=$gallery->id_gallery");
                die;
            }
        }
    }
} catch (\Throwable $th) {
    //throw $th;
}





// views
// include __DIR__.'/../views/templates/header__accesclientform.php';
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/accesclientform.php';
include __DIR__ . '/../views/templates/footer.php';
// include __DIR__.'/../views/templates/footer__accesclientform.php';
<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Gallery.php';
require_once __DIR__ . '/../../../helpers/connect.php';


$auth = Auth::check();


try {
    // * modification du header
    $title = 'Modifier une galerie';

    // * recover and clean id_gallery from URL
    $id_gallery = intval(filter_input(INPUT_GET, 'id_gallery', FILTER_SANITIZE_NUMBER_INT));
// dd($id_gallery);
    // * get this id_gallery informations
    $gallery = Gallery::get($id_gallery);
    d($gallery);

    // * nettoyage et validation du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = [];
        /// NAME ///
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); // nettoyage
        if (empty($name)) {
            $error['name'] = 'Le champ ne peut pas être vide';
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME_GALLERIES . '/'))); // validation
            if (!$isOk) {
                $error['name'] = 'Le nom doit s\'écrire sous la forme : Pauline | 02-2024';
            }
        }
        /// DATE ///
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
        if (!empty($date)) {
            $isOk = filter_var($date, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $error["date"] = "La date entrée n'est pas valide";
            } else {
                // the date is a string because of the filter. We need a DateTime object so :
                // $date = DateTime::createFromFormat('Y-m-d', $date);
                // dd($date);
            }
        } else {
            $error["date"] = "La date du shooting est obligatoire";
        }
        /// PASSWORD ///
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        if (empty($password)) {
            $error['password'] = 'Le champ ne peut pas être vide';
        } else {
            $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
            if (!$isOk) {
                $error['password'] = 'Le passe doit avoir au moins une majuscule, une minuscule, un chiffre, un caractère spécial (excepté "<" ou ">") et faire entre 8 et 30 caractères';
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            }
        }

// dd($name);
        // * check isExist
        // $isExistName = Gallery::isExist(name: $name, currentId_gallery: $id_gallery);
        // if ($isExistName) {
        //     $error['isExistByName'] = 'Une galerie avec le même nom existe déjà';
        // }
        
        if (Gallery::isExist(name: $name) && $name != $gallery->name) {
            $error['isExist'] = 'Une galerie avec le même nom existe déjà';
        }

        // * update
        if (empty($error)) {
            $gallery = new Gallery();
            // object hydratation
            $gallery->setName($name);
            $gallery->setDate($date);
            $gallery->setPassword($passwordHash);
            $gallery->setIdGallery($id_gallery);
            // dd($id_gallery->id_gallery);

            // call of update's method
            $isOk = $gallery->update();

            // if the method returns true
            if ($isOk) {
                $result = 'La galerie a bien été modifiée ! Vous allez être redirigé...';
                header('Refresh: 3; URL=/controllers/dashboard/galleries/list-ctrl.php');
            }
        }
    }
} catch (\Throwable $th) {
    echo "Erreur : " . $th->getMessage();
}










// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/galleries/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

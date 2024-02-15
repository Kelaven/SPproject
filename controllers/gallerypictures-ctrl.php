<?php

// to have constants
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../models/Gallery.php';
require_once __DIR__ . '/../models/Picture.php';

$accesclientStyle = 'accesclient.css';
$dNoneBall = true;
$footer = true;
$gallerypicturesScript = 'gallerypicturesScript.js';

// dd($_SESSION);



try {
    // * recover and clean id_gallery from URL
    // dd($id_gallery);
    $id_gallery = filter_input(INPUT_GET, 'id_gallery', FILTER_SANITIZE_NUMBER_INT);


    // * Exclude unauthorized user !
    if (!isset($_SESSION['isAllow' . $id_gallery]) || empty($_SESSION['isAllow' . $id_gallery]) || $_SESSION['isAllow' . $id_gallery] !== true) {
        header("Location: /controllers/accesclient-ctrl.php");
        die;
    }


    // * galleries infos
    $gallery = Gallery::get($id_gallery);


    // * pictures
    $pictures = Picture::getAll();
    // d($pictures);


    // * header update
    $title = "Galerie $gallery->name —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France";
    $pagesStyle = 'pages.css';

    // * filter form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = [];

        /// comment ///
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($comment)) {
            $error['comment'] = 'Le commentaire est vide';
        } else {
            $isOk = filter_var($comment, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_COMMENT . '/')));
            if (!$isOk) {
                $error['comment'] = 'Le texte ne peut pas contenir les symboles "<" ">" et doit faire entre 5 et 2000 caractères.';
            }
        }

        // dd($error);

        // ? registration in base
        // if (empty($error)) {
        //     // dd($name);
        //     $picture = new Picture();

        //     $picture->setIsSelection($isSelection);
        //     $picture->setName($name);
        //     $picture->setPhoto($photo);
        //     $picture->setcomment($comment);
        //     $picture->setIdGallery($id_gallery);


        //     // call of insert's method
        //     $isOk = $picture->insert();

        //     // Si the method returns true
        //     if ($isOk) {
        //         $result = 'La photo a bien été enregistrée ! Vous pouvez en ajouter une autre.';
        //     }
        // }
    }





} catch (\Throwable $th) {
    //throw $th;
}





// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/gallerypictures.php';
include __DIR__ . '/../views/templates/footer.php';

<?php

// to have constants
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../models/Gallery.php';
require_once __DIR__ . '/../models/Picture.php';
require_once __DIR__ . '/../models/Comment.php';

// $accesclientStyle = 'accesclient.css';
$styles = ['accesclient.css'];
$scripts = ['gallerypictures.js'];
$dNoneBall = true;
$footer = true;
// $gallerypicturesScript = 'gallerypicturesScript.js';



// dd($_SESSION['user']->id_user);



try {
    // * recover and clean id_gallery from URL
    $id_gallery = intval(filter_input(INPUT_GET, 'id_gallery', FILTER_SANITIZE_NUMBER_INT));
    // d($id_gallery);


    // * Exclude unauthorized user !
    if (!isset($_SESSION['isAllow' . $id_gallery]) || empty($_SESSION['isAllow' . $id_gallery]) || $_SESSION['isAllow' . $id_gallery] !== true) {
        header("Location: /controllers/accesclient-ctrl.php");
        die;
    }


    // * gallery infos
    $gallery = Gallery::get($id_gallery);
    // d($gallery);
    if ($gallery === false) { // if the gallery hasn't pictures or Cover picture
        header("Location: /controllers/accesclient-ctrl.php");
        die;
    }

    // * pictures
    $pictures = Picture::getAll(perGallery: $id_gallery); // parametre facultatif pr sortir les photos de la galerie en cours et retirer la condition dans la vue
    // d($pictures);

    // * comments
    $comments = Comment::getAll();
    // dd($comments);

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
                $error['comment'] = 'Le texte doit faire entre 5 et 2000 caractères.';
            }
        }

        // dd($error);

        // * registration in base
        if (empty($error)) {
            $commentTxt = new Comment();

            $commentTxt->setText($comment);
            $commentTxt->setIdGallery($id_gallery);
            $commentTxt->setIdUser($_SESSION['user']->id_user);

            // call of insert's method
            $isOk = $commentTxt->insert();

            // Si the method returns true
            if ($isOk) {
                $result = 'Votre commentaire a bien été envoyé ! Il sera affiché dès sa validation effectuée par l\'administrateur.';
            }
        }
    }
    // d($_SESSION);
    // ! UNSET SESSION isAllow THEN WE ARE IN ONE GALLERY SINCE 20 MINUTES
    if (time() - $_SESSION['timestamp' . $id_gallery] > 1200 ) { // 1200 is 20 mins * 60 sec
    unset($_SESSION['isAllow' . $id_gallery]);
    }
    
} catch (\Throwable $th) {
    echo ($th->getMessage());
}





// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/gallerypictures.php';
include __DIR__ . '/../views/templates/footer.php';

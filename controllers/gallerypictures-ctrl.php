<?php

// to have constants
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../models/Gallery.php';
require_once __DIR__ . '/../models/Picture.php';

$accesclientStyle = 'accesclient.css';
$dNoneBall = true;






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
} catch (\Throwable $th) {
    //throw $th;
}





// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/gallerypictures.php';
include __DIR__ . '/../views/templates/footer.php';

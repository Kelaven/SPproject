<?php

// to have constants
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../models/Gallery.php';
require_once __DIR__ . '/../models/Picture.php';

$accesclientStyle = 'accesclient.css';


try {
    // * recover and clean id_gallery from URL
    $id_gallery = intval(filter_input(INPUT_GET, 'id_gallery', FILTER_SANITIZE_NUMBER_INT));

    // * header update
    $title = "Galerie $gallery->name —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France";
    $pagesStyle = 'pages.css';


    // * galleries infos
    $gallery = Gallery::get($id_gallery);
    d($gallery);

    // * pictures
    $pictures = Picture::getAll();
    d($pictures);


} catch (\Throwable $th) {
    //throw $th;
}





// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/gallerypictures.php';
include __DIR__ . '/../views/templates/footer.php';

<?php

require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../models/Gallery.php';
require_once __DIR__ . '/../models/Picture.php';
require_once __DIR__ . '/../helpers/dd.php';




try {
    // header/footer update
    $navbar = 'header.php';
    $title = 'Galeries clients —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
    $pagesStyle = 'pages.css';
    $accesclientStyle = 'accesclient.css';
    // $footer = 'footer.php';
    $pagesScript = 'pages.js';
    $footer = true;


    
    $galleries = Gallery::getAll();
    // dd($galleries);
    // // $galleries = Gallery::getAll(id_gallery: $galleries->id_gallery);
    // foreach ($galleries as $key => $gallery) {
    //     $galleries = Gallery::getAll(id_gallery: $gallery->id_gallery);
    //     dd($galleries);
    //     $displayName = $gallery->name;
    //     // dd($displayName);
    //     $displayPhoto = $gallery->gallery_photo;
    //     // dd($displayPhoto);
    // }
    // // dd($galleries);

} catch (\Throwable $th) {
    //throw $th;
}



// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/accesclient.php';
include __DIR__ . '/../views/templates/footer.php';

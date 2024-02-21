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
    // $pagesStyle = 'pages.css';
    // $accesclientStyle = 'accesclient.css';
    $styles = ['pages.css', 'accesclient.css'];
    // $footer = 'footer.php';
    $scripts = ['pages.js'];
    // $pagesScript = 'pages.js';
    $footer = true;



    $galleries = Gallery::getAll(isCover: 1);
// dd($galleries);
    // * filter
    $search = (string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

    // * To search by keywords
    if ($search != '') {
        $galleries = Gallery::getAll(search: $search, isCover: 1);
    }

    
} catch (\Throwable $th) {
    echo($th->getMessage());
}



// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/accesclient.php';
include __DIR__ . '/../views/templates/footer.php';

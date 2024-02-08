<?php


require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Gallery.php';


try {
    // * modification du header
    $title = 'Ajouter une galerie';



} catch (\Throwable $th) {
    echo "Erreur : " . $th->getMessage();
}





// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/galleries/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

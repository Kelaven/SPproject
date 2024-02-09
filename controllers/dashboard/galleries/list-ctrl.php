<?php


require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Gallery.php';
require_once __DIR__ . '/../../../helpers/connect.php';

$auth = Auth::check();

try {
    // * modification du header
    $title = 'Liste des galeries';

    // * afficher la liste des galeries
    $galleries = Gallery::getAll();
    // dd($galleries);

} catch (\Throwable $th) {
    echo "Erreur : " . $th->getMessage();
}













// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/galleries/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

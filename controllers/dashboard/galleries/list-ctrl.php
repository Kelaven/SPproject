<?php


require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Gallery.php';
require_once __DIR__ . '/../../../helpers/connect.php';

$auth = Auth::check();

try {
    // * header's modification
    $title = 'Liste des galeries';

    // * filter
    $search = (string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
    // dd($search);

    // * display galleries list
    $galleries = Gallery::getAll(); 
    // d($galleries);

    // * To search by keywords
    if ($search != '') {
        $galleries = Gallery::getAll(search: $search);
    }

    // $galleriesDashboard = Gallery::getAllDashboard(displayWithoutDuplicate: true);
    //     if ($search != '') {
    //     $galleriesDashboard = Gallery::getAllDashboard(search: $search, displayWithoutDuplicate: true);
    // }




    // * display archive message
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS); // get the $msg from archive-ctrl.php
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']); // flash message
    }
} catch (\Throwable $th) {
    echo "Erreur : " . $th->getMessage();
}













// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/galleries/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

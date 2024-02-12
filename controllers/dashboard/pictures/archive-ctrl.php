<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Picture.php';
require_once __DIR__ . '/../../../helpers/connect.php';


$auth = Auth::check();


try {
    // * header's modification
    $title = 'Liste des photos archivées';


    // * To archive a photo when we clicks on the btn 
    $toArchive = intval(filter_input(INPUT_GET, 'id_picture', FILTER_SANITIZE_NUMBER_INT));

    if ($toArchive) {
        $archive = Picture::archive($toArchive);

        $msg = 'La donnée a bien été archivée !';
        $_SESSION['msg'] = $msg; // flash message, handle in list-ctrl.php too

        header('Location: /controllers/dashboard/pictures/list-ctrl.php');
        die;
    }


    // * To display archived galleries like a list, in archive.php
    $pictures = Picture::getAll(archive: true);

    
    // * To search by keywords
    $search = (string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($search != '') {
        $searchedPhotos = Picture::getAll(archive: true, search: $search);
        $pictures = $searchedPhotos; // use search results and not all images
    }


    // * display unarchive message
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS); // get the $msg from unarchive-ctrl.php
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']); // flash message
    }
} catch (\Throwable $th) {
    //throw $th;
}















// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/pictures/archive.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Gallery.php';
require_once __DIR__ . '/../../../helpers/connect.php';




try {
    // * header's modification
    $title = 'Liste des galeries archivées';

    // * To archive a gallery when we clicks on the btn 
    $toArchive = intval(filter_input(INPUT_GET, 'id_gallery', FILTER_SANITIZE_NUMBER_INT));

    if ($toArchive) {
        $archive = Gallery::archive($toArchive);

        $msg = 'La donnée a bien été archivée !';
        $_SESSION['msg'] = $msg; // flash message, handle in list-ctrl.php too

        header('Location: /controllers/dashboard/galleries/list-ctrl.php');
        die;
    }


    // * To display archived galleries like a list, in archive.php
    $galleries = $galleries = Gallery::getAll(archive: true);
    // dd($galleries);

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
include __DIR__ . '/../../../views/dashboard/galleries/archive.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

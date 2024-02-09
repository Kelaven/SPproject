<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Gallery.php';
require_once __DIR__ . '/../../../helpers/connect.php';




try {
    $toArchive = intval(filter_input(INPUT_GET, 'id_gallery', FILTER_SANITIZE_NUMBER_INT));
// dd($toArchive);
    if (isset($toArchive)) {
        // * archiver
        $archive = Gallery::archive($toArchive);

        // $msg = 'La donnée a bien été archivée !';
        // $_SESSION['msg'] = $msg;

        header('Location: /controllers/dashboard/galleries/list-ctrl.php');
        die;
    }
} catch (\Throwable $th) {
    //throw $th;
}















// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/galleries/archive.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
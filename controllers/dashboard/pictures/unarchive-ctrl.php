<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Picture.php';
require_once __DIR__ . '/../../../helpers/connect.php';

$auth = Auth::check();

try {
    // * catch archived's id picture
    $archive = intval(filter_input(INPUT_GET, 'id_picture', FILTER_SANITIZE_NUMBER_INT));
    $currentPage = intval(filter_input(INPUT_GET, 'currentPage', FILTER_SANITIZE_NUMBER_INT));
    
    if ($archive) {
        // * unarchive
        $archive = Picture::unarchive($archive);

        $msg = 'La donnée a bien été désarchivée !';
        $_SESSION['msg'] = $msg;

        header('Location: /controllers/dashboard/pictures/archive-ctrl.php?page=' . $currentPage);
        die;
    }

} catch (\Throwable $th) {
    //throw $th;
}






// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/galleries/archive.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

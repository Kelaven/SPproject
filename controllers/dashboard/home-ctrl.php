<?php


require_once __DIR__ . '/../../helpers/dd.php';
require_once __DIR__ . '/../../config/init.php';




try {
    // * modification du header
    $title = 'Dashboard';

} catch (\Throwable $th) {
    echo "Erreur : " . $th->getMessage();
}











// ! views

include __DIR__ . '/../../views/templates/dashboard/header.php';
include __DIR__ . '/../../views/dashboard/home.php';
include __DIR__ . '/../../views/templates/dashboard/footer.php';

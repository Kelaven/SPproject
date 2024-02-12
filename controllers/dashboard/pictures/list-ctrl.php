<?php


require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Picture.php';
require_once __DIR__ . '/../../../helpers/connect.php';


$auth = Auth::check();


try {
    // * header's modification
    $title = 'Liste des photos';

    // * display pictures list
    $pictures = Picture::getAll(); // without archived pictures (thanks to default argument)
    // dd($galleries);

    // * To search by keywords
    $search = (string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
    // dd($search);
    if ($search != '') {
        $searchedPhotos = Picture::search(search: $search);
        $pictures = $searchedPhotos; // use search results and not all images
    }

    // dd($search);


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
include __DIR__ . '/../../../views/dashboard/pictures/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

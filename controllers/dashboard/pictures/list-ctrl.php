<?php


require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Picture.php';
require_once __DIR__ . '/../../../helpers/connect.php';


$auth = Auth::check();


try {
    // * header's modification
    $title = 'Liste des photos';

    // * filter
    $search = (string) filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
    $page = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    $id_pictureCover = intval(filter_input(INPUT_GET, 'id_pictureCover', FILTER_SANITIZE_NUMBER_INT));
    $id_pictureUncover = intval(filter_input(INPUT_GET, 'id_pictureUncover', FILTER_SANITIZE_NUMBER_INT));

    // * display pictures list
    $pictures = Picture::getAll(); // without archived pictures (thanks to default argument)


    // * Change to cover
    $toCover = Picture::isCover(id_pictureCover: $id_pictureCover);
    $toUncover = Picture::isCover(id_pictureUncover: $id_pictureUncover);
    // dd($_SERVER);

    if ($toCover && $_SERVER['REQUEST_URI'] !== '/controllers/dashboard/pictures/list-ctrl.php' && $id_pictureCover != null || $toUncover && $_SERVER['REQUEST_URI'] !== '/controllers/dashboard/pictures/list-ctrl.php' && $id_pictureCover != null) { // if the url is not the same than the destination url (it's the case before clicking on icon)
        header("Location: /controllers/dashboard/pictures/list-ctrl.php");
        exit();
    } else {

        // * To search by keywords
        if ($search != '') {
            $searchedPhotos = Picture::getAll(search: $search);
            $pictures = $searchedPhotos; // use search results and not all images
        }

        // * Paginate
        $nbePictures = count($pictures);

        $nbePages = ceil($nbePictures / NB_ELEMENTS_PER_PAGE);
        if ($page <= 0 || $page > $nbePages) {
            $page = 1;
        }
        // calculate first photo of each page
        $firstPicture = ($page * NB_ELEMENTS_PER_PAGE) - NB_ELEMENTS_PER_PAGE;
        $pictures = Picture::getAll(search: $search, perPages: true, firstPicture: $firstPicture);

    }



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

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
    
    // * display pictures list
    $pictures = Picture::getAll(); // without archived pictures (thanks to default argument)
    
    
    // * To search by keywords
    if ($search != '') {
        $searchedPhotos = Picture::getAll(search: $search);
        $pictures = $searchedPhotos; // use search results and not all images
    }
    
    // dd($pictures);

    // * Paginate
    $nbePictures = count($pictures);
    
    $nbePages = ceil($nbePictures / NB_ELEMENTS_PER_PAGE);
    // dd($nbePages);
    if ($page <= 0 || $page > $nbePages) { 
        $page = 1;
    }
    // calculate first photo of each page
    $firstPicture = ($page * NB_ELEMENTS_PER_PAGE) - NB_ELEMENTS_PER_PAGE;
    $pictures = Picture::getAll(search: $search, perPages: true, firstPicture: $firstPicture);
    // dd($pictures);





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

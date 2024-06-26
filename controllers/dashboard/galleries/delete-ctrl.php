<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Gallery.php';
require_once __DIR__ . '/../../../helpers/connect.php';


$auth = Auth::check();


try {
    $error = [];

    // * get the id_gallery to delete
    $id_gallery = intval(filter_input(INPUT_GET, 'id_gallery', FILTER_SANITIZE_NUMBER_INT));

    // * get the gallery to view if it has photos
    $gallery = Gallery::get($id_gallery);
    // dd($gallery);
    if (isset($gallery->picture_photoCover) || isset($gallery->gallery_comments)) {
        $error['delete'] = true;
    }
    if ($error == []) {
        // dd($error);
        $delete = Gallery::delete($id_gallery);

        if ($delete) {
            $msg = 'La donnée a bien été supprimée !';
            $_SESSION['msg'] = $msg;


            header('Location: /controllers/dashboard/galleries/archive-ctrl.php');
            die;
        } else {
            $msg = 'La donnée n\'a pas été supprimée !';
        }
    } else {
        $msg = "La galerie ne doit plus avoir de photos ni de commentaires pour être supprimée !";
        $_SESSION['msg'] = $msg;

        header('Location: /controllers/dashboard/galleries/archive-ctrl.php');
        die;
    }
} catch (\Throwable $th) {
    //throw $th;
}



// ! views

include __DIR__ . '/../../../views/templates/dashboard/footer.php'; // to the script
<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Picture.php';
require_once __DIR__ . '/../../../helpers/connect.php';


$auth = Auth::check();


try {
    // * get the id_gallery to delete
    $id_picture = intval(filter_input(INPUT_GET, 'id_picture', FILTER_SANITIZE_NUMBER_INT));

    $delete = Picture::delete($id_picture);

    if ($delete) {

        $msg = 'La donnée a bien été supprimée';
        $_SESSION['msg'] = $msg;


        header('Location: /controllers/dashboard/pictures/archive-ctrl.php');
        die;

    } else {
        $msg = 'La donnée n\'a pas été supprimée !';
    }

} catch (\Throwable $th) {
    //throw $th;
}



// ! views

include __DIR__ . '/../../../views/templates/dashboard/footer.php'; // to the script
<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Comment.php';
require_once __DIR__ . '/../../../helpers/connect.php';


$auth = Auth::check();


try {
    // * get the id_comment to delete
    $id_comment = intval(filter_input(INPUT_GET, 'id_comment', FILTER_SANITIZE_NUMBER_INT));

    $delete = Comment::delete($id_comment);

    if ($delete) {

        $msg = 'La donnée a bien été supprimée';
        $_SESSION['msg'] = $msg;


        header('Location: /controllers/dashboard/comments/archive-ctrl.php');
        die;

    } else {
        $msg = 'La donnée n\'a pas été supprimée !';
    }

} catch (\Throwable $th) {
    //throw $th;
}



// ! views

include __DIR__ . '/../../../views/templates/dashboard/footer.php'; // to the script
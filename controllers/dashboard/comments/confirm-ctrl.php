<?php


require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Comment.php';
require_once __DIR__ . '/../../../helpers/connect.php';


$auth = Auth::check();


try {
    // * filter
    $id_comment = intval(filter_input(INPUT_GET, 'id_comment', FILTER_SANITIZE_NUMBER_INT));

    // * display comments list
    $comments = Comment::confirm($id_comment);

    if ($comments) {
        $msg = 'Le commentaire a bien été validé !';
        $_SESSION['msg'] = $msg;

        header('Location: list-ctrl.php');
        die;
    }

} catch (\Throwable $th) {
    echo "Erreur : " . $th->getMessage();
}




// ! views

// include __DIR__ . '/../../../views/templates/dashboard/header.php';
// include __DIR__ . '/../../../views/dashboard/comments/list.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

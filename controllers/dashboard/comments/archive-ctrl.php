<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Comment.php';
require_once __DIR__ . '/../../../helpers/connect.php';



$auth = Auth::check();


try {
    // * header's modification
    $title = 'Liste des commentaires archivés';

    // * filter
    $toArchive = intval(filter_input(INPUT_GET, 'id_comment', FILTER_SANITIZE_NUMBER_INT));

    // * To archive a photo when we clicks on the btn 
    if ($toArchive) {
        $archive = Comment::archive($toArchive);

        $msg = 'La donnée a bien été archivée !';
        $_SESSION['msg'] = $msg; // flash message, handle in list-ctrl.php too

        header('Location: /controllers/dashboard/comments/list-ctrl.php');
        die;
    }


    // * To display archived galleries like a list, in archive.php
    $comments = Comment::getAll(archive: true);


    // * display unarchive message
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS); // get the $msg from unarchive-ctrl.php
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']); // flash message
    }
} catch (\Throwable $th) {
    //throw $th;
}















// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/comments/archive.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

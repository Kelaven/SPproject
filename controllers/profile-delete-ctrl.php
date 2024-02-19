<?php

require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../helpers/connect.php';

$deleteScript = 'dashboard.js';


try {
    // * get the id_user to delete
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));

    $delete = User::delete($id_user);

    if ($delete) {
        $success = [];
        // dd('delete ok');
        session_destroy();

        header('Location: /controllers/home-ctrl.php');
        exit;

        $success['ok'] = 'Votre compte a bien été supprimé. Vous allez être redirigé...';
        // $_SESSION['msg'] = $msg;
// dd($msg);
        header('Refresh: 3; URL=/controllers/home-ctrl.php');

    } else {
        $msg = 'La donnée n\'a pas été supprimée !';
    }

} catch (\Throwable $th) {
    //throw $th;
}



// ! views

include __DIR__ . '/../views/templates/dashboard/footer.php'; // to the script
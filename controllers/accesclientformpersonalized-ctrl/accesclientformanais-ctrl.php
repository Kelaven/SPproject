<?php

// to have constants
require_once __DIR__.'/../../config/init.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];
    // ! cleaning and validation
    // Login :
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($login)) {
        $error['login'] = 'L\'identifiant n\'est pas renseigné';
    } else {
        $isLoginOk = filter_var($login, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_ANAIS.'/')));
        if (!$isLoginOk) {
            $error['login'] = 'L\'identifiant n\'est pas valide';
        }
    }
    // Password : 
    $password = filter_input(INPUT_POST, 'password');
}




// views
include __DIR__.'/../../views/templates/header__accesclientform.php';
include __DIR__.'/../../views/accesclientformpersonalized/accesclientformanais.html';
include __DIR__.'/../../views/accesclientform.php';
include __DIR__.'/../../views/templates/footer__accesclientform.php';
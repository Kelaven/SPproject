<?php

// to have constants
require_once __DIR__.'/../config/init.php';


// ! cleaning and validation
if ($_SERVER["REQUEST_METHOD"] == "POST") { // get the form's response
    $error = [];
    // ! signup
    $signup = filter_input(INPUT_POST, 'signup', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
    if (empty($signup)) { // to be sure it's not empty
        $error['signup'] = 'L\'identifiant n\'est pas renseigné';
    } else { // validation
        $isSignupOk = filter_var($signup, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_IDENTIFIANT.'/')));
        if (!$isSignupOk) { // if it's not validate with the regex
            $error['signup'] = 'L\'identifiant ne doit pas comporter d\'espaces vides ni de caractères accentués et doit contenir entre 10 et 30 lettres maximum.';
        }
    }
    // ! password
    $password = filter_input(INPUT_POST, 'password');
    $passwordCheck = filter_input(INPUT_POST, 'passwordCheck');

    if($password != $passwordCheck){
        $error["password"] = 'Les mots de passe ne correspondent pas';
    } elseif (empty($password) || empty($passwordCheck)) {
        $error["password"] = 'Les mots de passe ne sont pas renseignés';
    } else {
        $isPasswordOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_PASSWORD.'/')));
        if (!$isPasswordOk) {
            $error["password"] = 'Les mots de passe doivent contenir un chiffre, une majuscule, une minuscule, un caractère spécial et faire entre 8 et 16 caractères.';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        }
    }
    // ! validation msg
    if ($error == []) {
        $result = 'Votre client a bien été inscrit !';
    }
}






// views
include __DIR__.'/../views/templates/header__accesclientform.php';
include __DIR__.'/../views/dashboard/signup.php';
include __DIR__.'/../views/templates/footer__accesclientform.php';
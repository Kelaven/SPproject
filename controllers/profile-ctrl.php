<?php

// header/footer update
$navbar = 'header.php';
$title = 'Gérer mon compte —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$signupScript = 'signup.js';
$contactStyle = 'contact.css';
$pagesStyle = 'pages.css';
$pagesScript = 'pages.js';
$footer = true;


require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/User.php';

// d($_SESSION);


try {
    // ! cleaning and validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // get the form's response
        $error = [];
        // ! firstname
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
        if (empty($firstname)) {
        } else { // validation
            $isFirstnameOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isFirstnameOk) { // if it's not validate with the regex
                $error['firstname'] = 'Le prénom ne doit pas comporter d\'espaces au début ni à la fin et doit contenir entre 2 et 30 lettres maximum.';
            }
        }
        // ! lastname
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
        if (empty($lastname)) {
        } else { // validation
            $isLastnameOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isLastnameOk) { // if it's not validate with the regex
                $error['lastname'] = 'Le nom ne doit pas comporter d\'espaces vides au début ni à la fin et doit contenir entre 2 et 30 caractères maximum.';
            }
        }
        // ! email
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); // cleaning
        if (empty($email)) {
        } else { // validation
            $isEmailOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmailOk) { // if it's not validate with the regex
                $error['email'] = 'Le format de votre adresse mail n\'est pas valide';
            }
        }
        // ! mobile
        $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT); // cleaning
        if (empty($mobile)) {
        } else { // validation
            $isMobileOk = filter_var($mobile, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MOBILE . '/')));
            if (!$isMobileOk) { // if it's not validate with the regex
                $error['mobile'] = 'Le numéro de téléphone doit suivre ce format : 0X XX XX XX XX';
            }
        }
        // ! username
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
        if (empty($username)) {
        } else { // validation
            $isUsernameOk = filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_USERNAME . '/')));
            if (!$isUsernameOk) { // if it's not validate with the regex
                $error['username'] = 'Le pseudonyme ne doit pas comporter d\'espaces vides ni de caractères accentués et doit contenir entre 2 et 30 lettres maximum.';
            }
        }
        // ! password
        $password = filter_input(INPUT_POST, 'password');
        $passwordCheck = filter_input(INPUT_POST, 'passwordCheck');

        if (!empty($password) && !empty($passwordCheck)) {
            if ($password != $passwordCheck) {
                $error["password"] = 'Les mots de passe ne correspondent pas';
            } else {
                $isPasswordOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
                if (!$isPasswordOk) {
                    $error["password"] = 'Les mots de passe doivent contenir un chiffre, une majuscule, une minuscule, un caractère spécial et faire entre 8 et 30 caractères.';
                } else {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    // dd($passwordHash);
                }
            }
        }



        // ! verify if the data already exists
        if (User::isExist(email: $email) && $email != $_SESSION['user']->email) {
            $error['existEmail'] = 'Un compte avec cet email existe déjà';
        }
        if (User::isExist(username: $username) && $username != $_SESSION['user']->username) {
            $error['existUsername'] = 'Un compte avec cet email existe déjà';
        }

        if ($error == []) {
            // * update
            $user = new User();
            // object hydratation
            $user->setUsername($username);
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setMobile($mobile);
            if (!empty($password) && !empty($passwordCheck)) {
                $user->setPassword($passwordHash);
            } else {
                $user->setPassword($_SESSION['user']->password);
            }
            $user->setIdUser($_SESSION['user']->id_user);

            // call of update's method
            $isOk = $user->update();

            // if the method returns true
            if ($isOk) {
                $result = 'Votre compte a bien été modifié !';

                // * récupérer les nouvelles infos pour les afficher dans le form à la place des anciennes
                $user = User::get(id_user: $_SESSION['user']->id_user);
                $_SESSION['user'] = $user;
                // d($user);
                // d($_SESSION['user'] = $user);
                // header('Refresh: 2; URL=/controllers/profile-ctrl.php');
                // header('Location: /controllers/profile-ctrl.php');
                // die;
            }
        }
    }
} catch (\Throwable $th) {
    //throw $th;
}



// unset($_SESSION['user']);



// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/profile.php';
include __DIR__ . '/../views/templates/footer.php';

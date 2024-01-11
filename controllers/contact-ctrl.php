<?php

$navbar = 'header.php';
$title = 'Contactez-moi —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$footer = 'footer.php';

// to have constants
require_once __DIR__.'/../config/init.php';


// ! cleaning and validation
if ($_SERVER["REQUEST_METHOD"] == "POST") { // get the form's response
    $error = [];
    // ! firstname
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
    if (empty($firstname)) { // to be sure it's not empty
        $error['firstname'] = 'Le prénom n\'est pas renseigné';
    } else { // validation
        $isFirstnameOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_NAME.'/')));
        if (!$isFirstnameOk) { // if it's not validate with the regex
            $error['firstname'] = 'Le prénom ne doit pas comporter d\'espaces au début ni à la fin et doit contenir entre 2 et 30 lettres maximum.';
        }
    }
    // ! lastname
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
    if (empty($lastname)) { // to be sure it's not empty
        $error['lastname'] = 'Le nom n\'est pas renseigné';
    } else { // validation
        $isLastnameOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_NAME.'/')));
        if (!$isLastnameOk) { // if it's not validate with the regex
            $error['lastname'] = 'Le nom ne doit pas comporter d\'espaces vides au début ni à la fin et doit contenir entre 2 et 30 caractères maximum.';
        }
    }
    // ! mail
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); // cleaning
    if (empty($email)) { // to be sure it's not empty
        $error['email'] = 'Le mail n\'est pas renseigné';
    } else { // validation
        $isEmailOk = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$isEmailOk) { // if it's not validate with the regex
            $error['email'] = 'Le format de votre adresse mail n\'est pas valide';
        }
    }
    // ! mobile
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT); // cleaning
    if (empty($mobile)) { // to be sure it's not empty
        // $error['mobile'] = 'Le téléphone n\'est pas renseigné';
    } else { // validation
        $isMobileOk = filter_var($mobile, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_MOBILE.'/')));
        if (!$isMobileOk) { // if it's not validate with the regex
            $error['mobile'] = 'Le numéro de téléphone doit suivre ce format : 0X XX XX XX XX';
        }
    }
    // ! text
    $text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS)); // trim() to delete spaces before and after the message
    if (empty($text)) { // to be sure it's not empty
        $error['text'] = 'Le message n\'est pas renseigné';
    }
    // ! captcha
    $captcha = filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_NUMBER_INT); // cleaning
    if (empty($captcha)) { // to be sure it's not empty
        $error['captcha'] = 'La réponse n\'est pas renseignée';
    } else { // validation
        $isCaptchaOk = filter_var($captcha, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_CAPTCHA.'/')));
        if (!$isCaptchaOk) { // if it's not validate with the regex
            $error['captcha'] = 'Votre réponse n\'est pas valide';
        }
    }
    // ! validation msg
    if ($error == []) {
        $result = 'Votre demande a bien été envoyée !';
    }
}








// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/contact.php';
include __DIR__.'/../views/templates/footer.php';
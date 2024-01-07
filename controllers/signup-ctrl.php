<?php

// to have constants
require_once __DIR__.'/../config/init.php';


// ! cleaning and validation
if ($_SERVER["REQUEST_METHOD"] == "POST") { // get the form's response
    $error = [];
    // ! firstnameSignup
    $firstnameSignup = filter_input(INPUT_POST, 'firstnameSignup', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
    if (empty($firstnameSignup)) { // to be sure it's not empty
        $error['firstnameSignup'] = 'Le prénom n\'est pas renseigné';
    } else { // validation
        $isFirstnameSignupOk = filter_var($firstnameSignup, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_NAME.'/')));
        if (!$isFirstnameSignupOk) { // if it's not validate with the regex
            $error['firstnameSignup'] = 'Le prénom ne doit pas comporter d\'espaces au début ni à la fin et doit contenir entre 2 et 30 lettres maximum.';
        }
    }
    // ! lastnameSignup
    $lastnameSignup = filter_input(INPUT_POST, 'lastnameSignup', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
    if (empty($lastnameSignup)) { // to be sure it's not empty
        $error['lastnameSignup'] = 'Le nom n\'est pas renseigné';
    } else { // validation
        $isLastnameSignupOk = filter_var($lastnameSignup, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_NAME.'/')));
        if (!$isLastnameSignupOk) { // if it's not validate with the regex
            $error['lastnameSignup'] = 'Le nom ne doit pas comporter d\'espaces vides au début ni à la fin et doit contenir entre 2 et 30 caractères maximum.';
        }
    }
    // ! emailSignup
    $emailSignup = filter_input(INPUT_POST, 'emailSignup', FILTER_SANITIZE_EMAIL); // cleaning
    if (empty($emailSignup)) { // to be sure it's not empty
        $error['emailSignup'] = 'Le mail n\'est pas renseigné';
    } else { // validation
        $isEmailSignupOk = filter_var($emailSignup, FILTER_VALIDATE_EMAIL);
        if (!$isEmailSignupOk) { // if it's not validate with the regex
            $error['emailSignup'] = 'Le format de votre adresse mail n\'est pas valide';
        }
    }
    // ! mobileSignup
    $mobileSignup = filter_input(INPUT_POST, 'mobileSignup', FILTER_SANITIZE_NUMBER_INT); // cleaning
    if (empty($mobileSignup)) { // to be sure it's not empty
        $error['mobileSignup'] = 'Le numéro de téléphone n\'est pas renseigné';
    } else { // validation
        $isMobileSignupOk = filter_var($mobileSignup, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_MOBILE.'/')));
        if (!$isMobileSignupOk) { // if it's not validate with the regex
            $error['mobileSignup'] = 'Le numéro de téléphone doit suivre ce format : 0X XX XX XX XX';
        }
    }
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
    // ! captchaSignup
    $captchaSignup = filter_input(INPUT_POST, 'captchaSignup', FILTER_SANITIZE_NUMBER_INT); // cleaning
    if (empty($captchaSignup)) { // to be sure it's not empty
        $error['captchaSignup'] = 'La réponse n\'est pas renseignée';
    } else { // validation
        $isCaptchaSignupOk = filter_var($captchaSignup, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/'.REGEX_CAPTCHA.'/')));
        if (!$isCaptchaSignupOk) { // if it's not validate with the regex
            $error['captchaSignup'] = 'Votre réponse n\'est pas valide';
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
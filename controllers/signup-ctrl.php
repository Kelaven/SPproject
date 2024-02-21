<?php

// header/footer update
$navbar = 'header.php';
$title = 'Créer un compte —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$signupScript = 'signup.js';
$contactStyle = 'contact.css';
$pagesStyle = 'pages.css';
$pagesScript = 'pages.js';
$captchaScript = true;
$footer = true;


require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../vendor/google/recaptcha/src/autoload.php'; // for captcha



try {
    // ! cleaning and validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // get the form's response
        $error = [];
        // ! firstname
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
        if (empty($firstname)) { // to be sure it's not empty
            $error['firstname'] = 'Le prénom n\'est pas renseigné';
        } else { // validation
            $isFirstnameOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isFirstnameOk) { // if it's not validate with the regex
                $error['firstname'] = 'Le prénom ne doit pas comporter d\'espaces au début ni à la fin et doit contenir entre 2 et 30 lettres maximum.';
            }
        }
        // ! lastname
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
        if (empty($lastname)) { // to be sure it's not empty
            $error['lastname'] = 'Le nom n\'est pas renseigné';
        } else { // validation
            $isLastnameOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isLastnameOk) { // if it's not validate with the regex
                $error['lastname'] = 'Le nom ne doit pas comporter d\'espaces vides au début ni à la fin et doit contenir entre 2 et 30 caractères maximum.';
            }
        }
        // ! email
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
            $error['mobile'] = 'Le numéro de téléphone n\'est pas renseigné';
        } else { // validation
            $isMobileOk = filter_var($mobile, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MOBILE . '/')));
            if (!$isMobileOk) { // if it's not validate with the regex
                $error['mobile'] = 'Le numéro de téléphone doit suivre ce format : 0X XX XX XX XX';
            }
        }
        // ! username
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS); // cleaning
        if (empty($username)) { // to be sure it's not empty
            $error['username'] = 'Le pseudonyme n\'est pas renseigné';
        } else { // validation
            $isUsernameOk = filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_USERNAME . '/')));
            if (!$isUsernameOk) { // if it's not validate with the regex
                $error['username'] = 'Le pseudonyme ne doit pas comporter d\'espaces vides ni de caractères accentués et doit contenir entre 2 et 30 lettres maximum.';
            }
        }
        // ! password
        $password = filter_input(INPUT_POST, 'password');
        $passwordCheck = filter_input(INPUT_POST, 'passwordCheck');

        if ($password != $passwordCheck) {
            $error["password"] = 'Les mots de passe ne correspondent pas';
        } elseif (empty($password) || empty($passwordCheck)) {
            $error["password"] = 'Les mots de passe ne sont pas renseignés';
        } else {
            $isPasswordOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
            if (!$isPasswordOk) {
                $error["password"] = 'Les mots de passe doivent contenir un chiffre, une majuscule, une minuscule, un caractère spécial et faire entre 8 et 30 caractères.';
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                // dd($passwordHash);
            }
        }
        // ? captcha
        // $captcha = filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_NUMBER_INT); // cleaning
        // if (empty($captcha)) { // to be sure it's not empty
        //     $error['captcha'] = 'La réponse n\'est pas renseignée';
        // } else { // validation
        //     $isCaptchaOk = filter_var($captcha, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CAPTCHA . '/')));
        //     if (!$isCaptchaOk) { // if it's not validate with the regex
        //         $error['captcha'] = 'Votre réponse n\'est pas valide';
        //     }
        // }
        // ! google captcha
        $googlecaptcha = filter_input(INPUT_POST, 'captchaOk', FILTER_DEFAULT);
        if (isset($googlecaptcha)) {
            // if (isset($_POST['captchaOk'])) {
            $recaptcha = new \ReCaptcha\ReCaptcha('<REMOVED>');

            // $gRecaptchaResponse = $_POST['g-recaptcha-response'];
            $gRecaptchaResponse = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_DEFAULT);
            $remoteIp = $_SERVER['REMOTE_ADDR'];

            $resp = $recaptcha->setExpectedHostname('phpprojetperso.localhost')
                ->verify($gRecaptchaResponse, $remoteIp);
            if ($resp->isSuccess()) {
                // d('Ca marche');
            } else {
                $errors = $resp->getErrorCodes();
                // d($errors);
                $error['captchaGoogle'] = 'Il y a un problème avec le captcha';
            }
        }
        // ! consent
        $consent = filter_input(INPUT_POST, 'consent', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($consent)) {
            $error['consent'] = 'La case n\'est pas cochée';
        }

        // ! verify if the data already exists
        $isExist = User::isExist(email: $email);
        if ($isExist) {
            $error['existEmail'] = 'Un compte avec cet email existe déjà';
        }
        $isExist = User::isExist(username: $username);
        if ($isExist) {
            $error['existUsername'] = 'Un compte avec ce pseudo existe déjà';
        }
// dd($error);

        if ($error == []) {
            // ! insert in base
            $user = new User();

            $user->setUsername($username);
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setMobile($mobile);
            $user->setPassword($passwordHash);

            $isOk = $user->insert();

            if ($isOk) {
                $result = 'Vous êtes bien inscrit ! Vous allez être redirigé dans quelques instants...';
                header("Refresh: 4; URL=/controllers/signIn-ctrl.php");
                // die;
            }
        }
    }
} catch (\Throwable $th) {
    echo 'Erreur lors de l\'insertion : ' . $th->getMessage();
}







// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/signUp.php';
include __DIR__ . '/../views/templates/footer.php';

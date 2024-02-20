<?php

// header/footer update
$navbar = 'header.php';
$title = 'Se connecter —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$contactStyle = 'contact.css';
$pagesStyle = 'pages.css';
$signinScript = true;
$pagesScript = 'pages.js';
$captchaScript = true;
$footer = true;


require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../vendor/google/recaptcha/src/autoload.php'; // for captcha



try {
    // * cleaning and validation
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // get the form's response
        $error = [];
        // * email
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); // cleaning
        if (empty($email)) { // to be sure it's not empty
            $error['email'] = 'Le mail n\'est pas renseigné';
        } else { // validation
            $isEmailOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmailOk) { // if it's not validate with the regex
                $error['email'] = 'Le format de votre adresse mail n\'est pas valide';
            }
        }

        // ! get user's exists hached password to verify if the entered password is the same
        $user = User::get(email: $email);
        // d($user);

        // * password
        $password = filter_input(INPUT_POST, 'password');
        if (empty($password)) {
            $error['password'] = 'Le mot de passe n\'est pas renseigné';
        } else {
            // dd($user);
            if ($user) {
                $isOk = password_verify($password, $user->password);
                if (!$isOk) {
                    $error['password'] = 'Le mot de passe est incorrect';
                }
            } else {
                $error['email'] = 'L\'adresse mail renseignée n\'est pas connue';
            }
        }
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
                $error['captcha'] = 'Il y a un problème avec le captcha';
            }
        }


        if ($error == []) {
            // ! connect
            // $user = User::getByMail($email);
            // dd($user);
            if (!$user) {
                $error['connect'] = 'Nous n\'avons pas pu vous identifier';
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $isAuth = password_verify($password, $passwordHash); // to verify if password is the same than passwordHash (return bool)
                // dd($user);
                if ($isAuth) {
                    // unset($user->password); // useless to keep password into pages
                    $_SESSION['user'] = $user; // to keep connexion in session, use it in other pages with init file
                    // dd($_SESSION['user']);
                    $result = 'Vous êtes bien connecté ! Vous allez être redirigé...';
                    header('Refresh: 3; URL=/controllers/portfoliopaysages-ctrl.php');
                }
            }
        }
    }
} catch (\Throwable $th) {
    //throw $th;
}













// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/signIn.php';
include __DIR__ . '/../views/templates/footer.php';

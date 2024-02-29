<?php

// to have constants
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../helpers/dd.php';

require_once __DIR__ . '/../vendor/autoload.php'; // for php mailer
require_once __DIR__ . '/../vendor/google/recaptcha/src/autoload.php'; // for captcha

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';


$navbar = 'header.php';
$title = 'Contactez-moi —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$styles = ['pages.css', 'contact.css'];
$scripts = ['pages.js', 'contact.js'];
// $pagesStyle = 'pages.css';
// $contactStyle = 'contact.css';
// $footer = 'footer.php';
// $pagesScript = 'pages.js';
$gsapCDN = true;
$captchaScript = true;
$footer = true;

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
        // ? mobile
        // $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT); // cleaning
        // if (empty($mobile)) { // to be sure it's not empty
        //     // $error['mobile'] = 'Le téléphone n\'est pas renseigné';
        // } else { // validation
        //     $isMobileOk = filter_var($mobile, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_MOBILE . '/')));
        //     if (!$isMobileOk) { // if it's not validate with the regex
        //         $error['mobile'] = 'Le numéro de téléphone doit suivre ce format : 0X XX XX XX XX';
        //     }
        // }
        // ! text
        $text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS)); // trim() to delete spaces before and after the message
        if (empty($text)) { // to be sure it's not empty
            $error['text'] = 'Le message n\'est pas renseigné';
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
        // ? google captcha FOR LOCALHOST
        // $googlecaptcha = filter_input(INPUT_POST, 'captchaOk', FILTER_DEFAULT);
        // if (isset($googlecaptcha)) {
        // // if (isset($_POST['captchaOk'])) {
        //     $recaptcha = new \ReCaptcha\ReCaptcha('<REMOVED>');

        //     // $gRecaptchaResponse = $_POST['g-recaptcha-response'];
        //     $gRecaptchaResponse = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_DEFAULT);
        //     $remoteIp = $_SERVER['REMOTE_ADDR'];

        //     $resp = $recaptcha->setExpectedHostname('phpprojetperso.localhost')
        //         ->verify($gRecaptchaResponse, $remoteIp);
        //     if ($resp->isSuccess()) {
        //         // d('Ca marche');
        //     } else {
        //         $errors = $resp->getErrorCodes();
        //         // d($errors);
        //         $error['captcha'] = 'Il y a un problème avec le captcha';
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

            $resp = $recaptcha->setExpectedHostname('photographies.kevin-lavenant.fr')
                ->verify($gRecaptchaResponse, $remoteIp);
            if ($resp->isSuccess()) {
                // d('Ca marche');
            } else {
                $errors = $resp->getErrorCodes();
                // d($errors);
                $error['captcha'] = 'Il y a un problème avec le captcha';
            }
        }
        // ! consent
        $consent = filter_input(INPUT_POST, 'consent', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($consent)) {
            $error['consent'] = 'La case n\'est pas cochée';
        }




        // ! validation msg
        if ($error == []) {
            // ! php mailer
            $mailer = new PHPMailer(true);
            try {
                // * Server settings
                $mailer->setLanguage('fr', '/optional/path/to/language/directory/'); //To load the French version
                // $mailer->SMTPDebug  = SMTP::DEBUG_SERVER; //Enable verbose debug output
                $mailer->isSMTP(); //Send using SMTP
                $mailer->SMTPAuth   = true; //Enable SMTP authentication
                $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
                $mailer->Port       = 587;
                $mailer->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
                $mailer->Username   = 'kevin.lavenant.photographies@gmail.com';
                $mailer->Password   = '<REMOVED>';

                // * Recipients
                // dd($email);
                // $mailer->setFrom($email, $firstname, $lastname, $mobile); //Sender
                $mailer->setFrom('kevin.lavenant.photographies@gmail.com', 'Kevin Lavenant'); //Sender
                $mailer->addAddress('kevin.lavenant.photographies@gmail.com');
                $mailer->addAddress($email, $firstname . ' ' . $lastname);


                // * Content
                $mailer->Subject = 'Votre demande';
                $mailer->Body    = $text;
                // $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mailer->send();

                $result = 'Votre demande a bien été envoyée ! Vous allez en recevoir une copie.';
            } catch (\Throwable $th) {
                echo 'Message could not be sent. Mailer Error: {$mailer->ErrorInfo}';
            }
        }
    }
} catch (\Throwable $th) {
    echo 'erreur :' . $th->getMessage();
}









// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/contact.php';
include __DIR__ . '/../views/templates/footer.php';

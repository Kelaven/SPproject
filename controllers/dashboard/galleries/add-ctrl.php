<?php


require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Gallery.php';


try {
    // * modification du header
    $title = 'Ajouter une galerie';


    // * nettoyage et validation du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = [];
        /// NAME ///
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); // nettoyage
        if (empty($name)) {
            $error['name'] = 'Le champ ne peut pas être vide';
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME_GALLERIES . '/'))); // validation
            if (!$isOk) {
                $error['name'] = 'Le nom doit s\'écrire sous la forme : Pauline | 02-2024';
            }
        }
        /// DATE ///
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
        if (!empty($date)) {
            $isOk = filter_var($date, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $error["date"] = "La date entrée n'est pas valide";
            } else {
                // the date is a string because of the filter. We need a DateTime object so :
                // $date = DateTime::createFromFormat('Y-m-d', $date);
                // dd($date);
            }
        } else {
            $error["date"] = "La date du shooting est obligatoire";
        }
        /// PASSWORD ///
        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        if (empty($password)) {
            $error['password'] = 'Le champ ne peut pas être vide';
        } else {
            $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
            if (!$isOk) {
                $error['password'] = 'Le passe doit avoir au moins une majuscule, une minuscule, un chiffre, un caractère spécial (excepté "<" ou ">") et faire entre 8 et 16 caractères';
            }
        }
        /// ? PHOTO A VERIFIER UNE FOIS L ENTITE PICTURES GEREE EN BACK ///
        $photo = null;
        if (isset($_FILES['photo']) && ($_FILES['photo']['size'] != 0)) {
            try {
                // file exist ?
                if (!isset($_FILES['photo'])) {
                    throw new Exception("Le champ photo n'existe pas");
                }
                // transfer errors ? 
                if ($_FILES['photo']['error'] != 0) {
                    throw new Exception("Une erreur est survenue lors du transfert");
                }
                // file format verification
                if (!in_array($_FILES['photo']['type'], FORMAT_IMAGE)) {
                    throw new Exception("Ce fichier n'est pas au bon format");
                }
                // max size verification
                if ($_FILES['photo']['size'] > MAX_FILESIZE) {
                    throw new Exception("Ce fichier est trop volumineux");
                }
                // file's name cleaning
                $photo = filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_SPECIAL_CHARS);
                if (!$photo) {
                    throw new Exception("Il y a un problème avec le fichier");
                }

                // upload the file in the appropriate folder 
                $from = $_FILES['photo']['tmp_name'];
                $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $filename = uniqid('photoGalleryCover_') . '.' . $extension;
                $to = __DIR__ . '/../../public/assets/img/dashboard/galleries/' . $filename;
                move_uploaded_file($from, $to);
                $photo = $filename; // to send in base inly file's name and not the path (to exclude NULL in base)

            } catch (\Throwable $th) {
                $error['photo'] = $th->getMessage();
            }
        }




        // registration in base
        if (empty($error)) {
            $gallery = new Gallery();
            // object hydratation
            $gallery->setName($name);
            $gallery->setDate($date);
            $gallery->setPassword($password);

            // call of insert's method
            $isOk = $gallery->insert();

            // Si la méthode a retourné "true", alors on redirige vers la liste
            if ($isOk) {
                echo 'c\'est bon';
                // header('location: /controllers/dashboard/vehicles/list-ctrl.php');
                // die;
            }
        }
    }
} catch (\Throwable $th) {
    echo "Erreur : " . $th->getMessage();
}





// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/galleries/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

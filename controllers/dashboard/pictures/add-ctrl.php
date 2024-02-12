<?php


require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Picture.php';
require_once __DIR__ . '/../../../helpers/connect.php';

$auth = Auth::check();


try {
    // * modification du header
    $title = 'Ajouter une photo';


    // * nettoyage et validation du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = [];
        /// isSelection ///
        $isSelection = filter_input(INPUT_POST, 'isSelection', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($isSelection)) {
            $error['isSelection'] = 'Le champ ne peut pas être vide';
        } else {
            $isOk = filter_var($isSelection, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ISSELECTION . '/')));
            if (!$isOk) {
                $error['isSelection'] = 'Le résultat doit être "Non" ou "Oui"';
            } else {
                if ($isSelection == 'non') {
                    $isSelection = 0;
                    // dd($isSelection);
                } else {
                    $isSelection = 1;
                }
            }
        }

        /// NAME ///
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($name)) {
            $error['name'] = 'Le champ ne peut pas être vide';
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME_PHOTOS . '/')));
            if (!$isOk) {
                $error['name'] = 'Le nom peut contenir des majuscules, minuscules, chiffres et symboles "-" "_" uniquement. Il doit faire entre 2 et 50 caractères maximum';
            }
        }

        /// PHOTO ///
        if (!isset($_FILES['photo']) || empty($_FILES['photo']['name'])) {
            $error['photo'] = 'Vous n\'avez pas sélectionné la photo';
        } else {
            try {
                // file exist ?
                if (!isset($_FILES['photo'])) {
                    throw new Exception("Le champ photo n'existe pas");
                }
                // dd($photo);
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
                // // file's name cleaning
                // $photo = filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_SPECIAL_CHARS);
                // dd($photo);
                // if (!$photo) {
                //     throw new Exception("Il y a un problème avec le fichier");
                // }

                $from = $_FILES['photo']['tmp_name'];
                $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $filename = $name . '.' . $extension; // ? faire une condition pour vérifier si le nom n'existe pas déjà en base ? //
                $to = __DIR__ . '/../../../public/assets/img/ftp/' . $filename;
                move_uploaded_file($from, $to);
                $photo = $filename; // to send in base inly file's name and not the path (to exclude NULL in base)
                // dd($photo);

            } catch (\Throwable $th) {
                $error['photo'] = $th->getMessage();
            }
        }

        /// DESCRIPTION ///
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($description)) {
            $description = null;
        } else {
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DESCRIPTION . '/')));
            if (!$isOk) {
                $error['description'] = 'Le texte ne peut pas contenir les symboles "<" ">" et ne doit pas dépasser 1000 caractères.';
            }
        }

        // // * check isExist
        // $isExistName = Gallery::isExist(name: $name);
        // if ($isExistName) {
        //     $error['isExistByName'] = 'Ce nom est déjà utilisé';
        // }
        // $isExistPassword = Gallery::isExist(password: $password);
        // if ($isExistPassword) {
        //     $error['isExistByPassword'] = 'Ce passe est déjà utilisé';
        // }


        // * registration in base
        if (empty($error)) {
            // dd($name);
            $picture = new Picture();

            $picture->setIsSelection($isSelection);
            $picture->setName($name);
            $picture->setPhoto($photo);
            $picture->setDescription($description);


            // call of insert's method
            $isOk = $picture->insert();

            // Si the method returns true
            if ($isOk) {
                $result = 'La photo a bien été enregistrée ! Vous pouvez en ajouter une autre.';
            }
        }
        // dd('Reached after registration block');
    }
} catch (\Throwable $th) {
    echo ($th->getMessage());
}













// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/pictures/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

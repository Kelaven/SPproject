<?php

require_once __DIR__ . '/../../../helpers/dd.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Picture.php';
require_once __DIR__ . '/../../../helpers/connect.php';


$auth = Auth::check();


try {
    // * modification du header
    $title = 'Modifier une photo';

    // * recover and clean id_photo from URL
    $id_picture = intval(filter_input(INPUT_GET, 'id_picture', FILTER_SANITIZE_NUMBER_INT));

    // * get this id_picture informations
    $picture = Picture::get($id_picture);
    // dd($gallery);

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
        $photo = $picture->photo;
        if (isset($_FILES['photo']) || !empty($_FILES['photo']['name'])) {
            // $error['photo'] = 'Vous n\'avez pas sélectionné la photo';
            // si the user don't choose a new photo, no changes
        } else {
            try {
                @unlink(__DIR__ . '/../../../public/assets/img/ftp/' . $filename); // delete image from disk if we modified it
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

                $from = $_FILES['photo']['tmp_name'];
                $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $filename = $name . '.' . $extension;
                $to = __DIR__ . '/../../../public/assets/img/ftp/' . $filename;
                move_uploaded_file($from, $to);
                $photo = $filename; // to send in base inly file's name and not the path (to exclude NULL in base)

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


        // * check isExist
        $isExistName = Picture::isExist(name: $name, currentId_picture: $id_picture);
        if ($isExistName) {
            $error['isExistByName'] = 'Ce nom est déjà utilisé';
        }
        if ($description != null) {
            $isExistDescription = Picture::isExist(description: $description, currentId_picture: $id_picture);
            if ($isExistDescription) {
                $error['isExistByDescription'] = 'Cette description est déjà utilisée';
            }
        }

        // dd('test');
        // * update
        if (empty($error)) {
            $picture = new Picture();
            
            $picture->setIsSelection($isSelection);
            $picture->setName($name);
            $picture->setPhoto($photo);
            $picture->setDescription($description);
            $picture->setIdPicture($id_picture);

            // call of update's method
            $isOk = $picture->update();
            // dd($isOk);

            // if the method returns true
            if ($isOk) {
                $result = 'La photo a bien été modifiée ! Vous allez être redirigé...';
                // header('Refresh: 3; URL=/controllers/dashboard/pictures/list-ctrl.php');
            }
        }
    }
} catch (\Throwable $th) {
    echo "Erreur : " . $th->getMessage();
}










// ! views

include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/pictures/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

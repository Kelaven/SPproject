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

    // * getAll to display galleries' id in select (into the form)
    $galleries = Picture::getAll();

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

        /// id_gallery ///
        $id_gallery = intval(filter_input(INPUT_POST, 'id_gallery', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($id_gallery)) {
            $error['id_gallery'] = 'Le champ ne peut pas être vide';
        } else {
            $isOk = filter_var($id_gallery, FILTER_VALIDATE_INT);
            // dd($isOk);
            if (!$isOk) {
                $error['id_gallery'] = 'Il y\'a un problème';
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
        $photo = $picture->photo; // the old photo

        if (!isset($_FILES['photo']) || empty($_FILES['photo']['name'])) {
            $photo = $picture->photo; // If no new image is uploaded, keep the old
        } else {
            try {
                @unlink(__DIR__ . '/../../../public/assets/img/ftp/' . $photo); // delete old image from disk
                // ! new photo treatment : 
                if (!isset($_FILES['photo'])) { // file exist ?
                    throw new Exception("Le champ photo n'existe pas");
                }
                if ($_FILES['photo']['error'] != 0) { // transfer errors ? 
                    throw new Exception("Une erreur est survenue lors du transfert");
                }
                if (!in_array($_FILES['photo']['type'], FORMAT_IMAGE)) { // file format verification
                    throw new Exception("Ce fichier n'est pas au bon format");
                }
                if ($_FILES['photo']['size'] > MAX_FILESIZE) { // max size verification
                    throw new Exception("Ce fichier est trop volumineux");
                }

                $from = $_FILES['photo']['tmp_name'];
                $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $filename = $name . '.' . $extension;
                $to = __DIR__ . '/../../../public/assets/img/ftp/' . $filename;
                move_uploaded_file($from, $to);
                // dd($photo = $picture->photo);
                $photo = $filename; // update the picture in list.php with the new picture
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
        if ($isExistName && !empty($name)) {
            $error['isExistByName'] = 'Le nom que cous avez entré est déjà utilisé';
        }
        if ($description != null) {
            $isExistDescription = Picture::isExist(description: $description, currentId_picture: $id_picture);
            if ($isExistDescription) {
                $error['isExistByDescription'] = 'La description que vous avez entrée est déjà utilisée';
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
            $picture->setIdGallery($id_gallery);
            $picture->setIdPicture($id_picture);

            // call of update's method
            $isOk = $picture->update();
            // dd($isOk);

            // if the method returns true
            if ($isOk) {
                $result = 'La photo a bien été modifiée ! Vous allez être redirigé...';
                header('Refresh: 3; URL=/controllers/dashboard/pictures/list-ctrl.php');
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

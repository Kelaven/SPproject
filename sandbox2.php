<?php

class Image {
    public static function resize(){
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
            $filename = $name . '.' . $extension;
            $to = __DIR__ . '/../../../public/assets/img/ftp/' . $filename;
            move_uploaded_file($from, $to);
            $photo = $filename; // to send in base inly file's name and not the path (to exclude NULL in base)
            // dd($photo);

        } catch (\Throwable $th) {
            $error['photo'] = $th->getMessage();
        }
    }
}
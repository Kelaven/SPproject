<?php

class Image
{
    // * Method to insert or update an image with automatic resizing
    /**
     * @param bool $update is a reference to an picture updating. Don't change if it's an picture insert
     * @param null $photo is a reference to an existing photo // (if the method is used with $update = true)
     * @param null $name is the reference of the form's name, entered by the user
     * 
     * @return [type]
     */
    public static function resize(bool $update = false, $photo = null, $name = null)
    {
        if (!isset($_FILES['photo']) || empty($_FILES['photo']['name'])) {
            $error['photo'] = 'Vous n\'avez pas sélectionné la photo';
        } else {
            try {
                if ($update === true) {
                    @unlink(__DIR__ . '/../../../public/assets/img/uploads/' . $photo); // delete old image from disk
                }
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
                $to = __DIR__ . '/../public/assets/img/uploads/' . $filename;
                move_uploaded_file($from, $to);
                if ($update === true) {
                    $newPhoto = $filename;
                } else {
                    $photo = $filename; // to send in base inly file's name and not the path (to exclude NULL in base)
                }
                // dd($photo);
                // ! automatically resize
                $image = imagecreatefromjpeg($to); // use function from the library GD

                $widthOriginal = imagesx($image);
                $heightOriginal = imagesy($image);
                if ($heightOriginal > $widthOriginal) { // it's portrait
                    $height = 1280;
                    $width = ceil(($widthOriginal * $height) / $heightOriginal);
                } else {
                    $width = 1280; // max to have great quality with reduced weight
                    $height = -1;
                }

                $mode = IMG_BILINEAR_FIXED; // algo of img resizing
                $resampledObject = imagescale($image, $width, $height, $mode); // transform img in object to apply changes
                imagejpeg($resampledObject, $to, 80); // transform object in img

                if ($update === true) {
                    return $newPhoto;
                } else {
                    return $photo; // to use variable in controller
                }
            } catch (\Throwable $th) {
                $error['photo'] = $th->getMessage();
            }
        }
    }
}

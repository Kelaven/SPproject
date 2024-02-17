<?php
require_once __DIR__ . "/helpers/dd.php";

// dd($_GET);

// $indice = $_GET["indice"];
// dd($indice);
// dd($indice);

header("content-type:image/jpeg");


$pictureName= filter_input(INPUT_GET, 'picture', FILTER_SANITIZE_SPECIAL_CHARS);
// $pictureName = $_GET['image'];



echo file_get_contents(__DIR__ . "/public/assets/img/jpegpaysages/modalsize/" . $pictureName);







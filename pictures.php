<?php
require_once __DIR__ . "/helpers/dd.php";


header("content-type:image/jpeg");


$pictureName= filter_input(INPUT_GET, 'picture', FILTER_SANITIZE_SPECIAL_CHARS);

echo file_get_contents(__DIR__ . "/public/assets/img/jpegpaysages/modalsize/" . $pictureName);







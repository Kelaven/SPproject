<?php



require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../config/regex.php';
require_once __DIR__ . '/../models/User.php';




// header/footer update
$navbar = 'header.php';
$title = 'Mentions légales —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
// $style = 'style.css';
$styles = ['style.css'];








// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/mentionslegales.php';
include __DIR__ . '/../views/templates/footer.php';

<?php



require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../config/init.php';




// header/footer update
$navbar = 'header.php';
$title = 'Politique de confidentialité —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$styles = ['style.css'];








// views
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/politiqueconfidentialite.php';
include __DIR__ . '/../views/templates/footer.php';

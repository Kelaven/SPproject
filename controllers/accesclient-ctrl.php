<?php

require_once __DIR__ . '/../config/init.php';


// header/footer update
$navbar = 'header.php';
$title = 'Galeries —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$pagesStyle = 'pages.css';
$accesclientStyle = 'accesclient.css';
// $footer = 'footer.php';
$pagesScript = 'pages.js';



// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/accesclient.php';
include __DIR__.'/../views/templates/footer.php';
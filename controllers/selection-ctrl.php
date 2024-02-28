<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../helpers/dd.php';


// header/footer update
$navbar = 'header.php';
$title = 'Sélection du moment —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
// $selectionStyle = 'selection.css';
// $pagesStyle = 'pages.css';
$styles = ['selection.css', 'pages.css'];
// $footer = 'footer.php';
$scripts = ['pages.js'];
// $pagesScript = 'pages.js';
$gsapSelectionScript = 'selectiongsap.js';
$gsapCDN = true;
$footer = true;

// d($_SESSION);


// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/selection.php';
include __DIR__.'/../views/templates/footer.php';
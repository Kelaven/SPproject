<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../helpers/dd.php';


// header/footer update
$navbar = 'header.php';
$title = 'Sélection du moment —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$selectionStyle = 'selection.css';
$pagesStyle = 'pages.css';
// $footer = 'footer.php';
$pagesScript = 'pages.js';
$gsapSelectionScript = 'selectiongsap.js';
$gsapCDN = true;

// d($_SESSION);


// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/selection.php';
include __DIR__.'/../views/templates/footer.php';
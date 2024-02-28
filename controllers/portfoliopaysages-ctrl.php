<?php
require_once __DIR__ . '/../config/init.php';



// header/footer update
/**
 * @todo = mettre un bool à $navbar
 * 
 */
$navbar = 'header.php';
$title = 'Portfolio paysages —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
// $portfolioStyle = 'portfolio.css'; // $style = 'portfolio.css';
// $paysagesStyle = 'portfoliopaysages.css';
// $pagesStyle = 'pages.css';
$styles = ['portfolio.css', 'portfoliopaysages.css', 'pages.css']; // initialiser $styles à vide dans init.php
// $footer = 'footer.php';
$scripts = ['pages.js', 'portfolio.js'];
// $portfolioScript = 'portfolio.js';
// $pagesScript = 'pages.js';
$footer = true;

// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/portfoliopaysages.php';
include __DIR__.'/../views/templates/footer.php';
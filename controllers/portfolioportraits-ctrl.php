<?php
require_once __DIR__ . '/../config/init.php';



// header/footer update
$navbar = 'header.php';
$title = 'Portfolio portraits —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
// $portfolioStyle = 'portfolio.css';
// $portraitsStyle = 'portfolioportraits.css';
// $pagesStyle = 'pages.css';
// $footer = 'footer.php';
$styles = ['portfolio.css', 'portfolioportraits.css', 'pages.css'];
$scripts = ['pages.js', 'portfolio.js'];

// $portfolioScript = 'portfolio.js';
// $pagesScript = 'pages.js';



// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/portfolioportraits.php';
include __DIR__.'/../views/templates/footer.php';
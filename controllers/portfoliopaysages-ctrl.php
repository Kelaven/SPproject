<?php

// header/footer update
$navbar = 'header.php';
$title = 'Portfolio paysages —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$portfolioStyle = 'portfolio.css';
$paysagesStyle = 'portfoliopaysages.css';
$pagesStyle = 'pages.css';
// $footer = 'footer.php';
$portfolioScript = 'portfolio.js';
$pagesScript = 'pages.js';

// views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/portfoliopaysages.php';
include __DIR__.'/../views/templates/footer.php';
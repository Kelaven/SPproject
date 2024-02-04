<?php
/**
 * @todo : changer nom des controller (les nommer comme dans Symfony plutôt qu'avec -ctrl)
 * @todo : améliorer taille des images de l'animation de chargement
 */


// * header/footer update
$title = 'Accueil —— Kévin LAVENANT - Photographe de portraits et paysages - Amiens - Lille - Somme - Hauts-de-France';
$homeScript = 'script.js';
$gsapCDN = true;



// * views
include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/home.php';
include __DIR__.'/../views/templates/footer.php';
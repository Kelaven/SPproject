<?php

// ! connexion à la BDD
define('DSN', 'mysql:dbname=projetpersophotos;host=localhost');
define('USER', 'kelaven');
define('PASSWORD', '<REMOVED>');

// ! autres constantes
define('FORMAT_IMAGE', ["image/jpeg"]);
define('MAX_FILESIZE', 20 * 1024 * 1024); // 20 Mo


// ! nbe of pictures per pages

define('NB_ELEMENTS_PER_PAGE', 8);
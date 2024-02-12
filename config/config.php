<?php

// ! connexion à la BDD
define('DSN', 'mysql:dbname=projetpersophotos;host=localhost');
define('USER', 'kelaven');
define('PASSWORD', '<REMOVED>');

// ! autres constantes
define('FORMAT_IMAGE', ["image/jpeg"]);
define('MAX_FILESIZE', 10 * 1024 * 1024); // 10 Mo


// ! nbe of pictures per pages

define('NB_ELEMENTS_PER_PAGE', 8);
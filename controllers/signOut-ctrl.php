<?php

require_once __DIR__ . '/../config/init.php';



unset($_SESSION['user']);

header('location:/portfolio-paysages.html');
die;
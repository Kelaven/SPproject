<?php
require_once __DIR__ . '/../config/config.php';

class Database
{
    // * méthode qui retourne une instance de la classe PDO
    /**
     * @return object from class PDO
     */
    public static function connect()
    {
        $pdo = new PDO(DSN, USER, PASSWORD);

        return $pdo;
    }
}


class Auth
{
    // * method to check if the user is admin or not to access or not at the dashboard with URL
    public static function check()
    {
        if (empty($_SESSION['user']) || ($_SESSION['user']->isAdministrator !== 1)) {
            header('location: /../../controllers/home-ctrl.php');
            die;
        }
    }
}
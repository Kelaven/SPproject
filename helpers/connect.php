<?php
require_once __DIR__ . '/../config/config.php';

class Database
{
    // * attributs
    private static $pdo;

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

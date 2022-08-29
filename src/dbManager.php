<?php

namespace App;

use PDO;
use Exception;


class dbManager {

    public static function getpdo(){
        try {
            $host = $_ENV["DB_HOST"];
            $dbname = $_ENV["DB_PROD"] ?? $_ENV["DB_DEV"];
            $user = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASSWORD'];
            $pdo = new PDO(
                "mysql:host=$host;dbname=$dbname",
                $user,
                $password
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
<?php

namespace App\config;

require_once './../config/env.php';;

use PDO;
use PDOException;

final class MySQL
{

    public static function getConnection(): ?PDO
    {
        try {
            // Utilisation des constantes définies dans env.php
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            return new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return null;
    }

}
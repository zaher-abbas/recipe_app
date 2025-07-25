<?php

namespace App\config;

use PDO;
use PDOException;

class Database
{
    private const HOST = 'localhost';
    private const DBNAME = 'recipe-app';
    private const USER = 'zaher';
    private const PASSWORD = '6666';

    public static function getConnection(): ?PDO
    {
        try {
            return new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::USER, self::PASSWORD);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return null;
    }
}
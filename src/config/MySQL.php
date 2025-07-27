<?php

namespace App\config;

use PDO;
use PDOException;

final class MySQL
{
    private const string HOST = 'localhost';
    private const string DBNAME = 'recipe-app';
    private const string USER = 'zaher';
    private const string PASSWORD = '6666';

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
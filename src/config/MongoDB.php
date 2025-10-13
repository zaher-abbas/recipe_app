<?php

namespace App\config;
use MongoDB\Client;

require './../../vendor/autoload.php';

final class MongoDB
{

    private const string DB_NAME = 'recipe-app';
    private static function getClient(): Client
    {
        // Utilise l'URI Atlas si défini, sinon localhost pour le dev
        $uri = getenv('MONGODB_URI') ?: "mongodb://localhost:27017";
        return new Client($uri);
    }
     public static function getConnection($dbName = self::DB_NAME) {
            // Permet de surcharger le nom de DB via env si l'URI ne l'inclut pas
            $db = getenv('MONGODB_DB') ?: $dbName;
            return self::getClient()->$db;
        }

}
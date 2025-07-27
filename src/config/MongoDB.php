<?php

namespace App\config;
use MongoDB\Client;

require './../../vendor/autoload.php';

final class MongoDB
{

    private const string DB_NAME = 'recipe-app';
    private static function getClient(): Client
    {
      return new Client("mongodb://localhost:27017");
    }
    public static function getConnection($dbName = self::DB_NAME) {
        return self::getClient()->$dbName;
    }
}
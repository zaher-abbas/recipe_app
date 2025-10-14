<?php

namespace App\config;
use MongoDB\Client;

require './../../vendor/autoload.php';
require_once './../config/env.php';

final class MongoDB
{
    private static function getClient(): Client
    {
        return new Client(MONGO_URI);
    }
     public static function getConnection($dbName = MONGO_DB)
     {
            return self::getClient()->$dbName;
        }

}
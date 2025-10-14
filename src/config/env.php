<?php
// Détection automatique de l'environnement
$env = 'local';
if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'zabbas.ct.ws') {
    $env = 'production';
}

// Définition des variables pour chaque environnement
$config = [
    'local' => [
        'DB_HOST' => 'localhost',
        'DB_USER' => 'zaher',
        'DB_PASS' => '6666',
        'DB_NAME' => 'recipe-app',
        'MONGO_URI' => 'mongodb://localhost:27017',
        'MONGO_DB' => 'recipe-app'
    ],
    'production' => [
        'DB_HOST' => 'mysql-mzabbas.alwaysdata.net',
        'DB_USER' => 'mzabbas',
        'DB_PASS' => 'MyGoodfadi9@',
        'DB_NAME' => 'mzabbas_recipe',
        'MONGO_URI' => 'mongodb+srv://mzabbas:bHwjXZO8MG915ua7@mzabbas.sihqpe2.mongodb.net/?retryWrites=true&w=majority&appName=mzabbas',
        'MONGO_DB' => 'recipe_app'
    ]
];

define('DB_HOST', $config[$env]['DB_HOST']);
define('DB_USER', $config[$env]['DB_USER']);
define('DB_PASS', $config[$env]['DB_PASS']);
define('DB_NAME', $config[$env]['DB_NAME']);
define('MONGO_URI', $config[$env]['MONGO_URI']);
define('MONGO_DB', $config[$env]['MONGO_DB']);

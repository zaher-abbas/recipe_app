<?php
// Détection automatique de l'environnement
$env = 'local';
if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'zabbas.ct.ws') {
    $env = 'production';
}

// Définition des variables pour chaque environnement
$config = [
    'local' => array(
        'DB_HOST' => '',
        'DB_USER' => '',
        'DB_PASS' => '',
        'DB_NAME' => '',
        'MONGO_URI' => '',
        'MONGO_DB' => ''
    ),
    'production' => [
        'DB_HOST' => '',
        'DB_USER' => '',
        'DB_PASS' => '',
        'DB_NAME' => '',
        'MONGO_URI' => '',
        'MONGO_DB' => ''
    ]
];

define('DB_HOST', $config[$env]['DB_HOST']);
define('DB_USER', $config[$env]['DB_USER']);
define('DB_PASS', $config[$env]['DB_PASS']);
define('DB_NAME', $config[$env]['DB_NAME']);
define('MONGO_URI', $config[$env]['MONGO_URI']);
define('MONGO_DB', $config[$env]['MONGO_DB']);

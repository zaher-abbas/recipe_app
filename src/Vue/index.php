<?php
require_once './../config/Database.php';
require_once './../Controller/UserController.php';
require_once 'header.php';

use App\config\Database;
use App\Controller\UserController;

$db = Database::getConnection();
$controller = new UserController($db);

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'register':
        try {
            $controller->register();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        break;
    case 'login':
        $controller->login();
        break;
    case 'addrecipe':
        break;
    case 'home':
        require_once 'dashboard.php';
        break;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Recette</title>
</head>
<body>
</body>
</html>

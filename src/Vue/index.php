<?php
require_once './../config/MySQL.php';
require_once './../Controller/UserController.php';
require_once './../Controller/RecipeController.php';
require_once 'header.php';

use App\config\MySQL;
use App\Controller\RecipeController;
use App\Controller\UserController;

$db = MySQL::getConnection();
$userController = new UserController($db);
$recipeController = new RecipeController($db);
$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'register':
        $userController->register();
        break;
    case 'login':
        $userController->login();
        break;
    case 'addrecipe':
        $recipeController->addRecipe();
        break;
    case 'home':
        $recipeController->showAllRecipes();
        break;
    case 'recipe':
        $recipeController->showRecipeDetails();
        break;
    default:
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
    <link rel="stylesheet" href="css/style.css">
    <title>Recipe - App</title>
</head>
<body>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>

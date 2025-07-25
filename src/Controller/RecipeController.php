<?php

namespace App\Controller;
use App\Model\Recipe;

require_once './../Model/Recipe.php';

class RecipeController
{
    private Recipe $recipe;
    public array $recipes;
    public function __construct($db)
    {
        $this->recipe = new Recipe($db);
    }

    public function addRecipe(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rname = isset($_POST['rname']) ? trim($_POST['rname']) : null;
            $rimage = $_FILES['rimage'] ?? null;
            $rdescription = isset($_POST['rdescription']) ? trim($_POST['rdescription']) : null;

            if ($rname && $rimage && $rdescription) {

                $image_name = $rimage['name'];
                $image_name = time() . $image_name;
                $folderName = './../img/';
                if (!is_dir($folderName))
                    mkdir($folderName, 0777, true);
                move_uploaded_file($rimage['tmp_name'], $folderName . $image_name);
                $this->recipe->createRecipe($_SESSION['userId'], $rname, $image_name, $rdescription);
                header('Location: index.php?action=home');
            }
            else {
                setcookie("ErrorAddingRecipe", "Error; Please fill all the fields before submitting!");
                $_COOKIE["ErrorAddingRecipe"] = "Error; Please fill all the fields before submitting!";
            }

        }
        require_once './../Vue/addrecipe.php';
    }

    public function getRecipes(): void {
        $recipes = $this->recipe->getRecipes();
        require_once './../Vue/dashboard.php';
    }

    public function getRecipeById (): void
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $recipe = $this->recipe->getRecipeById($id);
            require_once './../Vue/recipe.php';
        }
    }
}
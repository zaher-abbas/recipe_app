<?php

namespace App\Controller;

use App\Model\Recipe;
use App\Model\Comment;

require_once './../Model/Recipe.php';
require_once './../Model/Comment.php';

class RecipeController
{
    private Recipe $recipe;
    private Comment $comment;

    public function __construct($db)
    {
        $this->recipe = new Recipe($db);
    }

    public function addRecipe(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $rname = isset($_POST['rname']) ? trim($_POST['rname']) : null;
            $rimage = $_FILES['rimage'] ?? null;
            $rdescription = isset($_POST['rdescription']) ? trim($_POST['rdescription']) : null;

            if ($rname && $rimage && $rdescription) {

                $image_name = $rimage['name'];
                $image_name = time() . $image_name;
                $folderName = './../View/img/';
                if (!is_dir($folderName)) {
                    mkdir($folderName, 0775, true);
                }

                move_uploaded_file($rimage['tmp_name'], $folderName . $image_name);
                $this->recipe->createRecipe($_SESSION['userId'], $rname, $image_name, $rdescription);
                header('Location: index.php?action=home');
            } else {
                setcookie("ErrorAddingRecipe", "Error; Please fill all the fields before submitting!");
                $_COOKIE["ErrorAddingRecipe"] = "Error; Please fill all the fields before submitting!";
            }

        }
        require_once './../View/addrecipe.php';
    }

    public function showAllRecipes(): void
    {
        $recipes = $this->recipe->getRecipes();
        require_once './../View/dashboard.php';
    }

    public function showRecipeDetails(): void
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->comment = new Comment();
            $recipe = $this->recipe->getRecipeById($id);
            $comments = $this->comment->getCommentsByRecipeId($id);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $comment = isset($_POST["comment"]) ? trim($_POST['comment']) : null;
                $note = isset($_POST["note"]) ? $_POST['note'] : null;
                if ($comment && $note) {
                    $this->comment->createComment($id, $_SESSION['userName'], $comment, $note);
                    header('Location: index.php?action=recipe&id=' . $id);
                }
            }
            require_once './../View/recipe.php';
        }
    }
}
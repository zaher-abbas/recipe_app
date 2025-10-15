<?php

namespace App\Model;

use PDO;

class Recipe
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    //Operation CRUD Create:
    public function createRecipe(int $userId, string $name, string $image, string $description): void
    {
        $query = "INSERT INTO recipe (user_id, name, image, description) VALUES
                                   (:user_id, :name, :image, :description)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':user_id', $userId);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':image', $image);
        $statement->bindValue(':description', $description);
        $statement->execute();
    }

    public function getRecipes(): array|null
    {
     $query = "SELECT recipe.*, firstname, lastname FROM recipe JOIN user u ON u.id = recipe.user_id";
     $statement = $this->db->query($query);
     return $statement->fetchAll() ?? null;
    }

    public function getRecipeById(int $id): array|null
    {
        $query = "SELECT recipe.*, firstname, lastname FROM recipe JOIN user u ON u.id = recipe.user_id WHERE recipe.id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch() ?? null;
    }

    public function searchRecipeByName(string $query): array|null
    {
        $sql = "SELECT recipe.*, firstname, lastname FROM recipe JOIN user u ON u.id = recipe.user_id WHERE recipe.name LIKE :query";
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':query', '%' . $query . '%');
        $statement->execute();
        return $statement->fetchAll() ?? null;
    }
}
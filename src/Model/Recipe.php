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
}
<?php

namespace App\Model;

use App\Exception\UserAlreadyExists;
use App\Exception\UserNotFound;
use App\Exception\WrongPassword;
use PDO;

require_once './../Exception/UserNotFound.php';
require_once './../Exception/WrongPassword.php';
require_once './../Exception/UserAlreadyExists.php';

class User
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    //Operation CRUD Create:
    public function createUser(string $firstName, string $lastName, string $password, string $email): void
    {
        $query = "INSERT INTO user (firstName, lastName, email, password) VALUES
                                   (:firstName, :lastName, :email, :password)";
        if (!$this->findBy($email)) {
            $statement = $this->db->prepare($query);
            $statement->bindValue(':firstName', $firstName);
            $statement->bindValue(':lastName', $lastName);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':email', $email);
            $statement->execute();
        }
        else
            throw new UserAlreadyExists("This user already exist!");
    }

    public function findBy(string $email): bool
    {
        $query = "SELECT * FROM user WHERE email = :email";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $user = $statement->fetch() ?? null;
        return $user != null;
    }

    public function getUser(string $email, string $password): array
    {
        $query = "SELECT * FROM user WHERE email = :email";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $user = $statement->fetch();
        if (!$user) {
            throw new UserNotFound("User not found");
        }
        if (!password_verify($password, $user["password"])) {
            throw new WrongPassword("Password incorrect");
        }
        return [$user["firstname"], $user["lastname"], $user["id"]];
    }
}
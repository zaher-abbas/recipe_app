<?php

namespace App\Controller;

use App\Exception\UserAlreadyExists;
use App\Exception\UserNotFound;
use App\Exception\WrongPassword;
use App\Model\User;
use Exception;

require_once './../Model/User.php';
require_once './../Exception/UserNotFound.php';
require_once './../Exception/WrongPassword.php';

class UserController
{
    private User $user;

    public function __construct($db)
    {
        $this->user = new User($db);
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $email = trim($_POST['email']);
            $password_crypted = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
            try {
                $this->user->createUser($firstname, $lastname, $password_crypted, $email);

            } catch (UserAlreadyExists $e) {
                setcookie("UserAlreadyExists", $e->getMessage());
                $_COOKIE["UserAlreadyExists"] = $e->getMessage();
            }
            header('Location: index.php?action=login');
            exit();
        }
        require_once './../Vue/register.php';
    }


    public function login(): void
    {
        unset($_COOKIE['UserNotFound']);
        unset($_COOKIE['WrongPassword']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $user = [];
            try {
                $user = $this->user->getUser($email, $password);

            } catch (UserNotFound $e) {
                setcookie("UserNotFound", $e->getMessage());
                $_COOKIE["UserNotFound"] = $e->getMessage();

            } catch (WrongPassword $e) {
                setcookie("WrongPassword", $e->getMessage());
                $_COOKIE["WrongPassword"] = $e->getMessage();

            }
            if (!empty($user)) {
                $_SESSION['userName'] = $user['firstname'];
                $_SESSION['userId'] = $user['id'];
                header('Location: index.php?action=home');
                exit();
            }
        }
        require_once './../Vue/login.php';
    }

    public function profile(): void
    {
        $user = [];
        try {
            if (isset($_SESSION['userId'])) {
                $user = $this->user->getUserById($_SESSION['userId']);
            }
            else
            {
                header('Location: index.php?action=login');
            }
        }
        catch (UserNotFound $e)
        {
            header('Location: index.php?action=login');
        }
        require_once './../Vue/profile.php';
    }
}
<?php

require_once "../app/core/Controller.php";
require_once "../app/models/User.php";

class AuthController extends Controller {

    public function login() {
        $this->view("auth/login");
    }

    public function register() {
        $this->view("auth/register");
    }

    public function loginPost() {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /login");
            exit;
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {

            if ($user['status'] !== 'active') {
                die("Account suspended.");
            }

            $_SESSION['user_id'] = $user['id'];
            header("Location: /");
            exit;
        }

        $_SESSION['error'] = "Invalid login credentials.";
        header("Location: /login");
        exit;
    }

    public function registerPost() {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /register");
            exit;
        }

        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if (strlen($password) < 6) {
            $_SESSION['error'] = "Password must be at least 6 characters.";
            header("Location: /register");
            exit;
        }

        $userModel = new User();

        if ($userModel->findByEmail($email)) {
            $_SESSION['error'] = "Email already registered.";
            header("Location: /register");
            exit;
        }

        $userModel->create($username, $email, $password);

        $_SESSION['success'] = "Registration successful. Please login.";
        header("Location: /login");
        exit;
    }

    public function logout() {
        session_destroy();
        header("Location: /login");
        exit;
    }
}

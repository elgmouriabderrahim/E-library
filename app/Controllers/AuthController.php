<?php
require_once __DIR__ . "/../helpers/Auth.php";
require_once __DIR__ . "/../helpers/helperFunctions.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Admin.php";
require_once __DIR__ . "/../models/Reader.php";
require_once __DIR__ . '/../core/Database.php';

class AuthController
{
    public function register()
    {
        Auth::guestOnly();

        $pageTitle = 'Register';
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $firstname = Helper::filterData($_POST['firstname'] ?? "");
            $lastname = Helper::filterData($_POST['lastname'] ?? "");
            $email = Helper::filterData($_POST['email'] ?? "");
            $password = $_POST['password'] ?? "";
            $cpassword = $_POST['cpassword'] ?? "";

            $errors = Helper::validateRegesterInputs($firstname, $lastname, $email, $password, $cpassword);

            if (empty($errors)) {
                $errors = User::register($firstname, $lastname, $email, $password);

                if (empty($errors)) {
                    header("Location: /login");
                    exit;
                }
            }
        }
        require_once __DIR__ . '/../Views/pages/register.php';
    }

    public function login()
    {
        Auth::guestOnly();

        $pageTitle = 'Login';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $email = Helper::filterData($_POST['email'] ?? "");
            $password = $_POST['password'] ?? "";

            $errors = Helper::validateLoginInputs($email, $password);

            if (empty($errors)) {
                $pdo = Database::getConnection();
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $userData = $stmt->fetch();

                if ($userData) {
                    if ($userData['role'] === 'admin') {
                        $user = new Admin($userData['id']);
                    } else {
                        $user = new Reader($userData['id']);
                    }

                    if ($user->login($password)) {
                        $_SESSION['id'] = $userData['id'];
                        $_SESSION['role'] = $userData['role'];
                        header("Location: /");
                        exit;
                    } else {
                        $errors['login'] = "Invalid email or password";
                    }
                } else {
                    $errors['login'] = "Invalid email or password";
                }
            }
        }

        require_once __DIR__ . '/../Views/pages/login.php';
    }
    public function logout(){
        Auth::userOnly();
        User::logout();
        header("location: /login");
        exit;
    }
}

<?php
require_once __DIR__ . "/../helpers/Auth.php";
Auth::loggedin();

require_once __DIR__ . "/../helpers/helperFunctions.php";
require_once __DIR__ . "/../Models/User.php";
require_once __DIR__ . "/../Models/Admin.php";
require_once __DIR__ . "/../Models/Reader.php";
require_once __DIR__ . '/../core/database.php';

class AuthController
{
    public function register()
    {
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
        $pageTitle = 'Login';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $email = Helper::filterData($_POST['email'] ?? "");
            $password = $_POST['password'] ?? "";

            $errors = Helper::validateLoginInputs($email, $password);

            if (empty($errors)) {
                $pdo = App\Core\Database::getConnection();
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $userData = $stmt->fetch();

                if ($userData) {
                    if ($userData['role'] === 'admin') {
                        $user = new Admin(
                            $userData['id'],
                            $userData['firstName'],
                            $userData['lastName'],
                            $userData['email'],
                            $userData['password']
                        );
                    } else {
                        $user = new Reader(
                            $userData['id'],
                            $userData['firstName'],
                            $userData['lastName'],
                            $userData['email'],
                            $userData['password']
                        );
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
}

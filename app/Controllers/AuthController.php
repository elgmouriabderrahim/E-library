<?php
require_once __DIR__ . "/../core/Auth.php";
Auth::loggedin();
class AuthController
{
    public function register(){
        $pageTitle = 'Register';
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            require_once __DIR__ . '/../helpers/helperFunctions.php';
            $errors = [];
            $firstname = filterData($_POST['firstname'] ?? "");
            $lastname = filterData($_POST['lastname'] ?? "");
            $email = filterData($_POST['email'] ?? "");
            $password = $_POST['password']?? "";
            $cpassword = $_POST['cpassword']?? "";
            
            $name_regex = "/^[a-zA-Z\s]{3,}$/";
            $password_regex = '/^[^<>\/\?\!"]{6,}$/';
            if(empty($firstname))
                $errors['firstname'] = "firstname required";
            else if(!preg_match($name_regex, $firstname))
                $errors['firstname'] = "invalid name";
            
            if(empty($lastname))
                $errors['lastname'] = "lastname required";
            else if(!preg_match($name_regex, $lastname))
                $errors['lastname'] = "invalid name";
            
            if(empty($email))
                $errors['email'] = "email required";
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                $errors['email'] = "invalid email";
            
            if(empty($password))
                $errors['password'] = "password required";
            else if(!preg_match($password_regex, $password))
                $errors['password'] = 'password must be at least 6 characters and must not contain < > / ? ! "';
            
            if(!empty($password) && empty($cpassword))
                $errors['cpassword'] = "confirm your password";
            if(!empty($cpassword) && $password !== $cpassword)
                $errors['cpassword'] = "passwords do not match";
            
            if(empty($errors)){
                require_once __DIR__ . '/../core/database.php';
                $pdo = App\Core\Database::getConnection();

                $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);

                if ($stmt->fetch()) {
                    $errors['email'] = "email already exists";
                } else {

                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $stmt = $pdo->prepare("
                        INSERT INTO users (firstname, lastname, email, password)
                        VALUES (?, ?, ?, ?)
                    ");

                    $stmt->execute([
                        $firstname,
                        $lastname,
                        $email,
                        $hashedPassword
                    ]);

                    header("Location: /login");
                    exit;
                }
                
            }
        }
        require_once __DIR__ . '/../Views/pages/register.php';
    }
    
    public function login(){
        $pageTitle = 'Login';
        $errors = [];

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            if(isset($_SESSION['id'])){
                header("Location: /");
                exit;
            }

            require_once __DIR__ . '/../helpers/helperFunctions.php';
            require_once __DIR__ . '/../core/database.php';
            $pdo = App\Core\Database::getConnection();

            $email = filterData($_POST['email'] ?? "");
            $password = $_POST['password'] ?? "";

            if(empty($email))
                $errors['email'] = "email required";
            if(empty($password))
                $errors['password'] = "password required";

            if(empty($errors)){
                $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if($user && password_verify($password, $user['password'])){
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    header("Location: /");
                    exit;
                } else {
                    $errors['login'] = "Invalid email or password";
                }
            }
        }

        require_once __DIR__ . '/../Views/pages/login.php';
    }
}

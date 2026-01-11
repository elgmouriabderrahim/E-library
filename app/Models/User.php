<?php
require_once __DIR__ . "/../core/Database.php";

abstract class User
{
    protected int $id;
    protected string $firstName;
    protected string $lastName;
    protected string $email;
    protected string $password;

    public function __construct(int $id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $userData = $stmt->fetch();

        $this->id = $userData['id'];
        $this->firstName = $userData['firstName'];
        $this->lastName = $userData['lastName'];
        $this->email = $userData['email'];
        $this->password = $userData['password'];
    }

    public function login($password): bool
    {
        return password_verify($password, $this->password);
    }
    public static function logout()
    {
        session_unset();
        session_destroy();
    }
    public static function register($firstname, $lastname, $email, $password)
    {
        $pdo = Database::getConnection();
        $errors = [];

        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            $errors['email'] = "email already exists";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("
                INSERT INTO users (firstName, lastName, email, password)
                VALUES (?, ?, ?, ?)
            ");

            $stmt->execute([$firstname ,$lastname ,$email ,$hashedPassword]);
        }
        return $errors;
    }
}

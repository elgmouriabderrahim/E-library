<?php

abstract class User
{
    protected int $id;
    protected string $firstName;
    protected string $lastName;
    protected string $email;
    protected string $password;

    public function __construct(
        int $id,
        string $firstName,
        string $lastName,
        string $email,
        string $password
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
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
        $pdo = App\Core\Database::getConnection();
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

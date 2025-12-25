<?php
class User {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function emailExists($email){
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->rowCount() > 0;
    }

    public function register($firstName, $lastName, $email, $password, $role){
        if($this->emailExists($email)){
            return "Email déjà utilisé";
        }

        $hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->pdo->prepare("INSERT INTO users (firstName, lastName, email, password, role) VALUES (?, ?, ?, ?, ?)");
        if($stmt->execute([$firstName, $lastName, $email, $hash, $role])){
            return true;
        } else {
            return "Erreur lors de l'inscription";
        }
    }
}

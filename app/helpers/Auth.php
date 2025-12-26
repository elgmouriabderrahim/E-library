<?php

class Auth {
    static public function loggedin(){
        if (isset($_SESSION['id'])) {
            header('Location: /');
            exit;
        }
    }
}
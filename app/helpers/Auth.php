<?php

class Auth {
    static public function guestOnly(){
        if (isset($_SESSION['id'])) {
            header('Location: /');
            exit;
        }
    }
    static public function userOnly(){
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            exit;
        }
    }
}
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
    static public function readerOnly(){
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            exit;
        }elseif($_SESSION['role'] !== 'reader'){
            header("location: /");
            exit;
        }
    }
    static public function adminOnly(){
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
            exit;
        }elseif($_SESSION['role'] !== 'admin'){
            header("location: /");
            exit;
        }
    }
}
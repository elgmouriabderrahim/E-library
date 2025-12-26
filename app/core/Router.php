<?php

class Router
{
    private array $routes = [];

    public function __construct()
    {
        $this->routes = [
            '/' => ['HomeController', 'index'],
            '/login' => ['AuthController', 'login'],
            '/register' => ['AuthController', 'register'],
            '/logout' => ['AuthController', 'logout'],
            '/books' => ['BookController', 'index'],
            '/books/show' => ['BookController', 'show'],
            '/my-borrows' => ['BorrowController', 'index'],
            '/admin' => ['AdminController', 'dashboard']
        ];
    }

    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];

        if (strpos($uri, '?') !== false) {
            $uri = explode('?', $uri)[0];
        }

        if (isset($this->routes[$uri])) {
            [$controllerName, $method] = $this->routes[$uri];

            require_once __DIR__ . '/../Controllers/' . $controllerName . '.php';

            $controller = new $controllerName();
            $controller->$method();
            return;
        }

        require_once __DIR__ . '/../Controllers/HomeController.php';
        (new HomeController())->notFound();
    }
}
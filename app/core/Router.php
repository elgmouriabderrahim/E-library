<?php

class Router
{
    private array $routes = [];

    public function __construct()
    {
        $this->routes = [
            '/admin/overview' => ['OverviewController', 'overview'],
            '/admin/books' => ['BooksController', 'books'],
            '/admin/books/add' => ['BooksController', 'add'],
            '/admin/books/show' => ['BooksController', 'show'],
            '/admin/books/edit' => ['BooksController', 'edit'],
            '/admin/books/delete' => ['BooksController', 'delete'],
            '/admin/users' => ['UsersController', 'users'],
            '/admin/borrows' => ['BorrowsController', 'borrows'],
            '/my-borrows' => ['BorrowController', 'my-borrow'],
            '/profile' => ['ProfileController', 'profile'],
            '/dashboard' => ['DashboardController', 'dashboard'],
            '/login' => ['AuthController', 'login'],
            '/register' => ['AuthController', 'register'],
            '/logout' => ['AuthController', 'logout'],
        ];
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if($uri === '/')
            $uri = '/admin/overview';

        if (isset($this->routes[$uri])) {
            [$controllerName, $method] = $this->routes[$uri];

            require_once __DIR__ . '/../Controllers/' . $controllerName . '.php';

            $controller = new $controllerName();
            $controller->$method();
            return;
        }

        require_once __DIR__ . '/../Controllers/NotFoundController.php';
        (new notFoundController())->notFound();
    }
}
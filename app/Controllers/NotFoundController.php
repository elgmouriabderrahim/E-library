<?php
class notFoundController
{
    public function notFound()
    {
        $pageTitle = '404 Not Fouond';
        $view = 'notFound.php';

        require_once __DIR__ . '/../Views/layouts/main.php';
    }
}

<?php
class Router
{
    public function dispatch(): void
    {
        $path = $_GET['page'] ?? 'home';

        switch ($path) {
            case 'home':
                require_once __DIR__ . '/../controllers/HomeController.php';
                $controller = new HomeController();
                $controller->index();
                break;

            case 'about':
                require_once __DIR__ . '/../controllers/HomeController.php';
                $controller = new HomeController();
                $controller->about();
                break;

            default:
                http_response_code(404);
                echo "<h2>404 – stránka nenalezena</h2>";
        }
    }
}

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

            case 'test-db':
                require_once __DIR__ . '/../controllers/TestController.php';
                $controller = new TestController();
                $controller->db();
                break;
            
            case 'login':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->loginForm();
                break;

            case 'login-post':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->login();
                break;

            case 'register':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->registerForm();
                break;

            case 'register-post':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->register();
                break;

            case 'logout':
                require_once __DIR__ . '/../controllers/AuthController.php';
                $controller = new AuthController();
                $controller->logout();
                break;

            default:
                http_response_code(404);
                echo "<h2>404 – stránka nenalezena</h2>";
        }
    }
}

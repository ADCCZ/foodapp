<?php
declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // ✅ MUSÍ BÝT TADY!

require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/View.php';
require_once __DIR__ . '/../app/core/Database.php';

$router = new Router();
$router->dispatch();

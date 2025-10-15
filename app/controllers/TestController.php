<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Database.php';

class TestController extends Controller
{
    public function db(): void
    {
        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->query("SELECT NOW() AS `current_time`");
            $result = $stmt->fetch();
            echo "<h2>Připojení k databázi funguje ✅</h2>";
            echo "<p>Aktuální čas DB: " . htmlspecialchars($result['current_time']) . "</p>";
        } catch (PDOException $e) {
            echo "<h2>Chyba připojení ❌</h2>";
            echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
        }
    }
}

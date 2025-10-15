<?php
require_once __DIR__ . '/../core/Database.php';

class User
{
    public static function findByLogin(string $login): ?array
    {
        $stmt = Database::getConnection()->prepare("SELECT * FROM users WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public static function create(string $login, string $email, string $password, string $role = 'consumer'): bool
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = Database::getConnection()->prepare(
            "INSERT INTO users (login, email, pass_hash, role) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([$login, $email, $hash, $role]);
    }
}

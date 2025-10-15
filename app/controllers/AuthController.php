<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller
{
    public function loginForm(): void
    {
        $this->view('auth/login', ['title' => 'Přihlášení']);
    }

    public function login(): void
    {
        $login = trim($_POST['login'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = User::findByLogin($login);
        if ($user && password_verify($password, $user['pass_hash']) && !$user['is_blocked']) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'login' => $user['login'],
                'role' => $user['role']
            ];
            $this->redirect('/foodapp/public/home');
        } else {
            $this->view('auth/login', ['title' => 'Přihlášení', 'error' => 'Neplatné přihlašovací údaje.']);
        }
    }

    public function registerForm(): void
    {
        $this->view('auth/register', ['title' => 'Registrace']);
    }

    public function register(): void
    {
        $login = trim($_POST['login'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';
        $role = $_POST['role'] ?? 'consumer';

        if ($password !== $password2) {
            $this->view('auth/register', ['title' => 'Registrace', 'error' => 'Hesla se neshodují.']);
            return;
        }

        if (User::findByLogin($login)) {
            $this->view('auth/register', ['title' => 'Registrace', 'error' => 'Uživatel již existuje.']);
            return;
        }

        $ok = User::create($login, $email, $password, $role);
        if ($ok) {
            $this->redirect('/foodapp/public/login');
        } else {
            $this->view('auth/register', ['title' => 'Registrace', 'error' => 'Chyba při registraci.']);
        }
    }

    public function logout(): void
    {
        session_destroy();
        $this->redirect('/foodapp/public/home');
    }
}

<?php
require_once __DIR__ . '/../core/Controller.php';

class HomeController extends Controller
{
    public function index(): void
    {
        $data = [
            'title' => 'FoodApp – Úvodní stránka',
            'welcomeText' => 'Vítejte v systému pro objednávku potravin!'
        ];
        $this->view('home/index', $data);
    }

    public function about(): void
    {
        $data = [
            'title' => 'O projektu',
            'text' => 'Tato aplikace je semestrální práce – objednávkový systém s využitím PHP MVC architektury.'
        ];
        $this->view('home/about', $data);
    }
}

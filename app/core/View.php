<?php
class View
{
    public static function render(string $template, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../views/' . $template . '.php';
    }
}

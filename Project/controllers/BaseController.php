<?php
abstract class BaseController
{
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);
        require __DIR__ . '/../views/layout/header.php';
        require __DIR__ . "/../views/$view.php";
        require __DIR__ . '/../views/layout/footer.php';
    }

    protected function redirect(string $page, string $message = ''): void
    {
        if ($message !== '') {
            $_SESSION['flash'] = $message;
        }
        header("Location: index.php?page=$page");
        exit;
    }

    protected function post(array $fields): array
    {
        $out = [];
        foreach ($fields as $f) {
            $out[$f] = trim($_POST[$f] ?? '');
        }
        return $out;
    }

    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}

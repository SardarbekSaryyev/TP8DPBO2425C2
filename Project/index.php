<?php
session_start();

function e($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$routes = [
    'lecturers'   => ['LecturerController', 'controllers/LecturerController.php'],
    'departments' => ['DepartmentController', 'controllers/DepartmentController.php'],
    'courses'     => ['CourseController', 'controllers/CourseController.php'],
];

$page = $_GET['page'] ?? 'lecturers';
$action = $_GET['action'] ?? 'index';

if (!isset($routes[$page]) || !in_array($action, ['index', 'create', 'edit', 'delete'], true)) {
    http_response_code(404);
    die('404 - Halaman tidak ditemukan');
}

[$class, $file] = $routes[$page];
require_once __DIR__ . '/' . $file;

(new $class())->$action();

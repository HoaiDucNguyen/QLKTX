<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../vendor/autoload.php';
require '../config/db.php';

use Hp\Qlktx\Controllers\PhongController;
use Hp\Qlktx\Controllers\HomeController;

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($requestUri === '/' || $requestUri === '/phong') {
    $controller = new PhongController($pdo);
    $controller->index();
} elseif ($requestUri === '/phong/create') {
    $controller = new PhongController($pdo);
    $controller->create();
} elseif (preg_match('/\/phong\/edit\/(\d+)/', $requestUri, $matches)) {
    $controller = new PhongController($pdo);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/phong\/delete\/(\d+)/', $requestUri, $matches)) {
    $controller = new PhongController($pdo);
    $controller->delete($matches[1]);
} elseif (preg_match('/\/phong\/detail\/(\d+)/', $requestUri, $matches)) {
    $controller = new PhongController($pdo);
    $controller->detail($matches[1]);
} else {
    echo "Page not found.";
}
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Bắt đầu session

require '../vendor/autoload.php';
require '../config/db.php';

use Hp\Qlktx\Controllers\PhongController;
use Hp\Qlktx\Controllers\NhanVienController;
use Hp\Qlktx\Controllers\ThuePhongController;

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Kiểm tra nếu không phải trang đăng nhập và người dùng chưa đăng nhập
if ($requestUri !== '/login' && !isset($_SESSION['nhan_vien_id'])) {
    header('Location: /login');
    exit;
}

// Kiểm tra các route và điều hướng
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
} elseif ($requestUri === '/nhanvien') {
    $controller = new NhanVienController($pdo);
    $controller->index();
} elseif ($requestUri === '/nhanvien/create') {
    $controller = new NhanVienController($pdo);
    $controller->create();
} elseif ($requestUri === '/login') {
    $controller = new NhanVienController($pdo);
    $controller->login();
} elseif (preg_match('/\/nhanvien\/edit\/(\d+)/', $requestUri, $matches)) {
    $controller = new NhanVienController($pdo);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/nhanvien\/delete\/(\d+)/', $requestUri, $matches)) {
    $controller = new NhanVienController($pdo);
    $controller->delete($matches[1]);
} elseif (preg_match('/\/nhanvien\/detail\/(\d+)/', $requestUri, $matches)) {
    $controller = new NhanVienController($pdo);
    $controller->detail($matches[1]);
} elseif ($requestUri === '/thuephong') {
    $controller = new ThuePhongController($pdo);
    $controller->index();
} elseif ($requestUri === '/thuephong/create') {
    $controller = new ThuePhongController($pdo);
    $controller->create();
} elseif (preg_match('/\/thuephong\/edit\/(\d+)/', $requestUri, $matches)) {
    $controller = new ThuePhongController($pdo);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/thuephong\/delete\/(\d+)/', $requestUri, $matches)) {
    $controller = new ThuePhongController($pdo);
    $controller->delete($matches[1]);
} elseif (preg_match('/\/thuephong\/detail\/(\d+)/', $requestUri, $matches)) {
    $controller = new ThuePhongController($pdo);
    $controller->detail($matches[1]);
} else {
    echo "Page not found.";
}
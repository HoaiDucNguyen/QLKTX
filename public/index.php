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
use Hp\Qlktx\Controllers\LopController; // Import LopController

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
    if ($_SESSION['ghi_chu'] === 'admin') {
        $controller = new NhanVienController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/nhanvien/create') {
    if ($_SESSION['ghi_chu'] === 'admin') {
        $controller = new NhanVienController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/login') {
    $controller = new NhanVienController($pdo);
    $controller->login();
} elseif (preg_match('/\/nhanvien\/edit\/(\d+)/', $requestUri, $matches)) {
    if ($_SESSION['ghi_chu'] === 'admin') {
        $controller = new NhanVienController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/nhanvien\/delete\/(\d+)/', $requestUri, $matches)) {
    if ($_SESSION['ghi_chu'] === 'admin') {
        $controller = new NhanVienController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
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
} 

// Routes cho Lop
elseif ($requestUri === '/lop') {
    $controller = new LopController($pdo);
    $controller->index();
} elseif ($requestUri === '/lop/create') {
    $controller = new LopController($pdo);
    $controller->create();
} elseif (preg_match('/\/lop\/edit\/(\w+)/', $requestUri, $matches)) {
    $controller = new LopController($pdo);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/lop\/delete\/(\w+)/', $requestUri, $matches)) {
    $controller = new LopController($pdo);
    $controller->delete($matches[1]);
} 

// Routes cho SinhVien
elseif ($requestUri === '/sinhvien') {
    $controller = new \Hp\Qlktx\Controllers\SinhVienController($pdo);
    $controller->index();
} elseif ($requestUri === '/sinhvien/create') {
    $controller = new \Hp\Qlktx\Controllers\SinhVienController($pdo);
    $controller->create();
} elseif (preg_match('/\/sinhvien\/edit\/(\w+)/', $requestUri, $matches)) {
    $controller = new \Hp\Qlktx\Controllers\SinhVienController($pdo);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/sinhvien\/delete\/(\w+)/', $requestUri, $matches)) {
    $controller = new \Hp\Qlktx\Controllers\SinhVienController($pdo);
    $controller->delete($matches[1]);
} 
 else {
    echo "Page not found.";
}
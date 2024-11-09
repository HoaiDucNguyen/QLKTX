<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Bắt đầu session

require '../vendor/autoload.php';
require '../config/db.php';
use \Hp\Qlktx\Controllers\SinhVienController;
use Hp\Qlktx\Controllers\PhongController;
use Hp\Qlktx\Controllers\NhanVienController;
use Hp\Qlktx\Controllers\ThuePhongController;
use Hp\Qlktx\Controllers\LopController; // Import LopController
use Hp\Qlktx\Controllers\TtThuePhongController;

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Kiểm tra nếu không phải trang đăng nhập và người dùng chưa đăng nhập
if ($requestUri !== '/login' && !isset($_SESSION['ma_so'])) {
    header('Location: /login');
    exit;
}

// Kiểm tra các route và điều hướng
if ($requestUri === '/' || $requestUri === '/phong') {
    if($_SESSION['ghi_chu']==='nhan vien'){
        $controller = new PhongController($pdo);
        $controller->index();
    } else {
        $controller = new PhongController($pdo);
        $controller->SVindex();
    }
} elseif ($requestUri === '/phong/create') {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new PhongController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/phong\/edit\/(\d+)/', $requestUri, $matches)) {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new PhongController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/phong\/delete\/(\d+)/', $requestUri, $matches)) {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new PhongController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}

elseif ($requestUri === '/nhanvien') {
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
}

elseif ($requestUri === '/thuephong') {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new ThuePhongController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/thuephong/create') {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new ThuePhongController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/thuephong\/edit\/(\d+)/', $requestUri, $matches)) {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new ThuePhongController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/thuephong\/delete\/(\d+)/', $requestUri, $matches)) {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new ThuePhongController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}

// Routes cho Lop
elseif ($requestUri === '/lop') {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new LopController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/lop/create') {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new LopController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/lop\/edit\/(\w+)/', $requestUri, $matches)) {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new LopController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/lop\/delete\/(\w+)/', $requestUri, $matches)) {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new LopController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}

// Routes cho SinhVien
elseif ($requestUri === '/sinhvien') {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new SinhVienController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/sinhvien/create') {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new SinhVienController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/sinhvien\/edit\/(\w+)/', $requestUri, $matches)) {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new SinhVienController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/sinhvien\/delete\/(\w+)/', $requestUri, $matches)) {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new SinhVienController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}

// Routes cho TtThuePhong
elseif ($requestUri === '/tt_thuephong') {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new TtThuePhongController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/tt_thuephong/create') {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new TtThuePhongController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/tt_thuephong\/delete\/(\d+)\/(\d{4}-\d{2})/', $requestUri, $matches)) {
    if($_SESSION['ghi_chu'] === 'nhan vien'){
        $controller = new TtThuePhongController($pdo);
        $controller->delete($matches[1], $matches[2]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} else if($requestUri === '/logout' && isset($_SESSION['ma_so'])){
    $controller = new NhanVienController($pdo);
    $controller->logout();
}else{
    echo "Page not found.";
}
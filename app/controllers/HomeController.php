<?php

namespace Hp\Qlktx\Controllers;
session_start();
$_SESSION['ho_ten'] = $username; // Lưu tên người dùng
header("Location: /phong"); // Điều hướng tới trang dashboard
// class HomeController
// {
//     public function index()
//     {
//         echo "Welcome to the Dormitory Management System!";
//     }
// }
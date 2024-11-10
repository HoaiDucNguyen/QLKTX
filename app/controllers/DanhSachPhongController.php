<?php

namespace Hp\Qlktx\Controllers;
use Hp\Qlktx\Models\Phong;

class DanhSachPhongController {
    private $phongModel;

    public function __construct($pdo)
    {
        $this->phongModel = new Phong($pdo);
    }
    public function search() {
        $criteria = [
            'ten_phong' => $_GET['ten_phong'] ?? '',
            'dien_tich' => $_GET['dien_tich'] ?? '',
            'so_giuong' => $_GET['so_giuong'] ?? ''
        ];
        $phongs = $this->phongModel->search($criteria);
        include '../app/views/danhsachphong/index.php';
    }
    public function index() {
        // Kiểm tra xem có tiêu chí tìm kiếm không
        $criteria = [
            'ten_phong' => $_GET['ten_phong'] ?? '',
            'dien_tich' => $_GET['dien_tich'] ?? '',
            'so_giuong' => $_GET['so_giuong'] ?? ''
        ];

        // Nếu có tiêu chí tìm kiếm, gọi phương thức `search`, nếu không thì lấy toàn bộ danh sách
        if (!empty($criteria['ten_phong']) || !empty($criteria['dien_tich']) || !empty($criteria['so_giuong'])) {
            $phongs = $this->phongModel->search($criteria);
        } else {
            $phongs = $this->phongModel->getAll();
        }

        // Gọi view index.php và truyền kết quả vào
        include '../app/views/danhsachphong/index.php';
    }
}
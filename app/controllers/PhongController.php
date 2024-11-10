<?php
// app/controllers/PhongController.php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\Phong;

class PhongController
{
    private $phongModel;

    public function __construct($pdo)
    {
        $this->phongModel = new Phong($pdo);
    }

    public function index()
    {
        $phongs = $this->phongModel->getAll();
        include '../app/views/phong/index.php';
    }

    public function SVindex()
    {
        $criteria = [
            'ten_phong' => $_GET['ten_phong'] ?? '',
            'dien_tich' => $_GET['dien_tich'] ?? '',
            'so_giuong' => $_GET['so_giuong'] ?? '',
            'gioi_tinh' => $_GET['gioi_tinh'] ?? ''
        ];

        // Nếu có tiêu chí tìm kiếm, gọi phương thức `search`, nếu không thì lấy toàn bộ danh sách
        if (!empty($criteria['ten_phong']) || !empty($criteria['dien_tich']) || !empty($criteria['so_giuong']) || !empty($criteria['gioi_tinh'])) {
            $phongs = $this->phongModel->search($criteria);
        } else {
            $phongs = $this->phongModel->getAll();
        }

        // Gọi view index.php và truyền kết quả vào
        include '../app/views/danhsachphong/index.php';
    }

    public function create()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phong = new Phong($this->phongModel->db);
            $phong->fill($_POST);
            if ($phong->validate() && $phong->save()) {
                header('Location: /phong');
                exit;
            }
            $errors = $phong->getValidationErrors();
        }
        include '../app/views/phong/create.php';
    }

    public function search()
    {
        $criteria = [
            'ten_phong' => $_GET['ten_phong'] ?? '',
            'dien_tich' => $_GET['dien_tich'] ?? '',
            'so_giuong' => $_GET['so_giuong'] ?? '',
            'gioi_tinh' => $_GET['gioi_tinh'] ?? ''
        ];
        $phongs = $this->phongModel->search($criteria);
        include '../app/views/danhsachphong/index.php';
    }

    public function edit($id)
    {
        $phong = $this->phongModel->find($id);
        if (!$phong) {
            header('Location: /phong');
            exit;
        }

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phong->fill($_POST);
            if ($phong->validate() && $phong->save()) {
                header('Location: /phong');
                exit;
            }
            $errors = $phong->getValidationErrors();
        }
        include '../app/views/phong/edit.php';
    }

    public function delete($id)
    {
        $phong = $this->phongModel->find($id);
        if ($phong && $phong->delete()) {
            header('Location: /phong');
            exit;
        }
    }

    public function detail($id)
    {
        $phong = $this->phongModel->find($id);
        if (!$phong) {
            header('Location: /phong');
            exit;
        }
        include '../app/views/phong/detail.php';
    }
}
<?php
// app/controllers/NhanVienController.php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\NhanVien;

class NhanVienController
{
    private $nhanVienModel;

    public function __construct($pdo)
    {
        $this->nhanVienModel = new NhanVien($pdo);
    }

    public function index()
    {
        $nhanViens = $this->nhanVienModel->getAll() ?? [];
        include '../app/views/NhanVien/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nhanVien = new NhanVien($this->nhanVienModel->db);
            $nhanVien->fill($_POST);

            // Kiểm tra và mã hóa mật khẩu nếu đã nhập
            if (!empty($_POST['password'])) {
                $nhanVien->password = md5($_POST['password']);
            }

            if ($nhanVien->validate() && $nhanVien->save()) {
                header('Location: /nhanvien');
                exit;
            }
            $errors = $nhanVien->getValidationErrors();
        }
        include '../app/views/NhanVien/create.php';
    }

    public function edit($id)
    {
        $nhanVien = $this->nhanVienModel->find($id);
        if (!$nhanVien) {
            header('Location: /nhanvien');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nhanVien->fill($_POST);

            // Cập nhật mật khẩu nếu có nhập mới
            if (!empty($_POST['password'])) {
                $nhanVien->password = md5($_POST['password']);
            }

            if ($nhanVien->validate() && $nhanVien->save()) {
                header('Location: /nhanvien');
                exit;
            }
            $errors = $nhanVien->getValidationErrors();
        }
        include '../app/views/NhanVien/edit.php';
    }

    public function delete($id)
    {
        $nhanVien = $this->nhanVienModel->find($id);
        if ($nhanVien && $nhanVien->delete()) {
            header('Location: /nhanvien');
            exit;
        }
    }

    public function detail($id)
    {
        $nhanVien = $this->nhanVienModel->find($id);
        if (!$nhanVien) {
            header('Location: /nhanvien');
            exit;
        }
        include '../app/views/NhanVien/detail.php';
    }

    public function login()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
        $password = md5($_POST['password'] ?? '');

        $nhanVien = $this->nhanVienModel->findByPhoneAndPassword($so_dien_thoai, $password);
        if ($nhanVien) {
            $_SESSION['nhan_vien_id'] = $nhanVien->ma_nhan_vien;
            header('Location: /');
            exit;
        } else {
            $error = "Số điện thoại hoặc mật khẩu không đúng.";
        }
    }
    include '../app/views/login.php';
}
}
<?php
// app/controllers/NhanVienController.php
namespace Hp\Qlktx\Controllers;


use Hp\Qlktx\Models\NhanVien;
use Hp\Qlktx\Models\SinhVien;
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
            
            $nhanVien->filledit($_POST);

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
        $so_dien_thoai = $_POST['ma_nhan_vien'] ?? '';
        $password = md5($_POST['password'] ?? '');

        $nhanVien = $this->nhanVienModel->findByPhoneAndPassword($so_dien_thoai, $password);
        if ($nhanVien) {
            $_SESSION['nhan_vien_id'] = $nhanVien->ma_nhan_vien;
            $_SESSION['ghi_chu'] = $nhanVien->ghi_chu;
            $_SESSION['ho_ten'] = $nhanVien->ho_ten;
             
            header('Location: /');
            exit;
        } else {
            $sinhvien = new SinhVien($this->nhanVienModel->db);
            $sinhvien->ma_sinh_vien = $_POST['ma_sinh_vien'];
            $sinhvien->password = md5($_POST['password']);
            if($sinhvien->findByMaAndPassword($sinhvien->ma_sinh_vien, $sinhvien->password)){
                $_SESSION['sinh_vien_id'] = $sinhvien->ma_sinh_vien;
            }
            
        }
    }
    include '../app/views/login.php';
}
public function unauthorized():void{
    include '../app/views/unauthorized.php';
}


}
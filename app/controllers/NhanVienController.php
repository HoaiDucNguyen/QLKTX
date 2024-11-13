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

    public function search()
    {
        $criteria = [
            'ho_ten' => $_GET['ho_ten'] ?? '',
            'ma_nhan_vien' => $_GET['ma_nhan_vien'] ?? '',
            'ghi_chu' => $_GET['ghi_chu'] ?? '',
        ];
        $lops = $this->nhanVienModel->search($criteria);
        include '../app/views/NhanVien/index.php';
    }
    public function index()
    {
        // Kiểm tra xem có tiêu chí tìm kiếm không
        $criteria = [
            'ma_nhan_vien' => $_GET['ma_nhan_vien'] ?? '',
            'ho_ten' => $_GET['ho_ten'] ?? '',
            'ghi_chu' => $_GET['ghi_chu'] ?? '',
        ];

        // Nếu có tiêu chí tìm kiếm, gọi phương thức `search`, nếu không thì lấy toàn bộ danh sách
        if (!empty($criteria['ma_nhan_vien']) || !empty($criteria['ho_ten']) || !empty($criteria['ghi_chu'])) {
            $nhanViens = $this->nhanVienModel->search($criteria);
        } else {
            $nhanViens = $this->nhanVienModel->getAll();
        }

        // Gọi view index.php và truyền kết quả vào
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
            $ma_nhan_vien = $_POST['ma_so'] ?? '';
            $password = md5($_POST['password'] ?? '');

            $nhanVien = $this->nhanVienModel->findByMaAndPassword($ma_nhan_vien, $password);
            if ($nhanVien) {
                $_SESSION['ma_so'] = $nhanVien->ma_nhan_vien;
                $_SESSION['ghi_chu'] = $nhanVien->ghi_chu;
                $_SESSION['ho_ten'] = $nhanVien->ho_ten;
                header('Location: /');
                exit;
            } else {
                $sinhvien = new SinhVien($this->nhanVienModel->db);
                $sinhvien->ma_sinh_vien = $_POST['ma_so'];
                $sinhvien->password = md5($_POST['password']);
                if ($sinhvien->findByMaAndPassword($sinhvien->ma_sinh_vien, $sinhvien->password)) {
                    $_SESSION['ma_so'] = $sinhvien->ma_sinh_vien;
                    $_SESSION['ghi_chu'] = 'sinh vien';
                    $_SESSION['ho_ten']=$sinhvien->ho_ten;
                    header('Location: /');
                } else {
                    $error = "Sai mã số hoặc mật khẩu";
                }
            }
        }
        include '../app/views/login.php';
    }
    public function logout(): void
    {
        header('Location: /logout');
        include '../app/views/logout.php';
    }
    public function unauthorized(): void
    {
        include '../app/views/unauthorized.php';
    }
}
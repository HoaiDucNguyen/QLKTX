<?php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\SinhVien;
use PDO;

class SinhVienController
{
    private $sinhVienModel;

    public function __construct(PDO $pdo)
    {
        $this->sinhVienModel = new SinhVien($pdo);
    }

    // Hiển thị danh sách sinh viên
    public function index()
    {
        $sinhViens = $this->sinhVienModel->getAll();
        include '../app/views/SinhVien/index.php';
    }

    // Tạo sinh viên mới
    public function create()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->sinhVienModel->fill($_POST);
            if ($this->sinhVienModel->validate()) {
                if ($this->sinhVienModel->save()) {
                    header('Location: /sinhvien');
                    exit;
                } else {
                    $errors[] = 'Lỗi khi lưu sinh viên. Vui lòng thử lại.';
                }
            } else {
                $errors = $this->sinhVienModel->getValidationErrors();
            }
        }
        include '../app/views/sinhvien/create.php';
    }

    // Chỉnh sửa sinh viên
    public function edit($id)
    {
        $errors = [];
        $sinhVien = $this->sinhVienModel->find($id);
        if (!$sinhVien) {
            die('Sinh viên không tồn tại');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->sinhVienModel->fill($_POST);
            $this->sinhVienModel->ma_sinh_vien = $id;
            if ($this->sinhVienModel->validate()) {
                if ($this->sinhVienModel->save()) {
                    header('Location: /sinhvien');
                    exit;
                } else {
                    $errors[] = 'Lỗi khi cập nhật sinh viên. Vui lòng thử lại.';
                }
            } else {
                $errors = $this->sinhVienModel->getValidationErrors();
            }
        }

        include '../app/views/sinhvien/edit.php';
    }

    // Xóa sinh viên
    public function delete($id)
    {
        $sinhVien = $this->sinhVienModel->find($id);
        if ($sinhVien && $this->sinhVienModel->delete()) {
            header('Location: /sinhvien');
            exit;
        } else {
            die('Lỗi khi xóa sinh viên.');
        }
    }
}

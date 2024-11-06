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
        $nhanViens = $this->nhanVienModel->getAll();
        include '../app/views/nhanvien/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nhanVien = new NhanVien($this->nhanVienModel->db);
            $nhanVien->fill($_POST);
            if ($nhanVien->validate() && $nhanVien->save()) {
                header('Location: /nhanvien');
                exit;
            }
            $errors = $nhanVien->getValidationErrors();
        }
        include '../app/views/nhanvien/create.php';
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
            if ($nhanVien->validate() && $nhanVien->save()) {
                header('Location: /nhanvien');
                exit;
            }
            $errors = $nhanVien->getValidationErrors();
        }
        include '../app/views/nhanvien/edit.php';
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
        include '../app/views/nhanvien/detail.php';
    }
}

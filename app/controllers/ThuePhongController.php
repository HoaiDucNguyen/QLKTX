<?php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\ThuePhong;

class ThuePhongController
{
    private $thuePhongModel;

    public function __construct($pdo)
    {
        $this->thuePhongModel = new ThuePhong($pdo);
    }

    public function index()
    {
        $thuePhongs = $this->thuePhongModel->getAll();
        include '../app/views/thuephong/index.php';
    }

    public function create()
    {
        $errors = [];
        $sinhViens = $this->getSinhViens();
        $phongs = $this->getPhongs();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $thuePhong = new ThuePhong($this->thuePhongModel->db);
            $thuePhong->fill($_POST);
            if ($thuePhong->validate() && $thuePhong->save()) {
                header('Location: /thuephong');
                exit;
            }
            $errors = $thuePhong->getValidationErrors();
        }
        include '../app/views/thuephong/create.php';
    }

    private function getSinhViens()
    {
        $stmt = $this->thuePhongModel->db->query("SELECT * FROM SinhVien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getPhongs()
    {
        $stmt = $this->thuePhongModel->db->query("SELECT * FROM Phong");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function edit($id)
    {
        $thuePhong = $this->thuePhongModel->find($id);
        if (!$thuePhong) {
            header('Location: /thuephong');
            exit;
        }

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $thuePhong->fill($_POST);
            if ($thuePhong->validate() && $thuePhong->save()) {
                header('Location: /thuephong');
                exit;
            }
            $errors = $thuePhong->getValidationErrors();
        }
        include '../app/views/thuephong/edit.php';
    }

    public function delete($id)
    {
        $thuePhong = $this->thuePhongModel->find($id);
        if ($thuePhong && $thuePhong->delete()) {
            header('Location: /thuephong');
            exit;
        }
    }

    public function detail($id)
    {
        $thuePhong = $this->thuePhongModel->find($id);
        if (!$thuePhong) {
            header('Location: /thuephong');
            exit;
        }
        include '../app/views/thuephong/detail.php';
    }
} 
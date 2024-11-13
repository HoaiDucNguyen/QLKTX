<?php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\Lop;

class LopController
{
    private $lopModel;

    public function __construct($pdo)
    {
        $this->lopModel = new Lop($pdo);
    }
    public function search() {
        $criteria = [
            'ten_lop' => $_GET['ten_lop'] ?? '',
        ];
        $lops = $this->lopModel->search($criteria);
        include '../app/views/lop/index.php';
    }
    public function index() {
        // Kiểm tra xem có tiêu chí tìm kiếm không
        $criteria = [
            'ten_lop' => $_GET['ten_lop'] ?? '',
        ];

        // Nếu có tiêu chí tìm kiếm, gọi phương thức `search`, nếu không thì lấy toàn bộ danh sách
        if (!empty($criteria['ten_lop']) || !empty($criteria['ma_lop']) ) {
            $lops = $this->lopModel->search($criteria);
        } else {
            $lops = $this->lopModel->getAll();
        }

        // Gọi view index.php và truyền kết quả vào
        include '../app/views/lop/index.php';
    }

    public function create()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lop = new Lop($this->lopModel->db);
            $lop->fill($_POST);
            if ($lop->validate() && $lop->save()) {
                header('Location: /lop');
                exit;
            }
            $errors = $lop->getValidationErrors();
        }
        include '../app/views/lop/create.php';
    }

    public function edit($id)
    {
        $lop = $this->lopModel->find($id);
        if (!$lop) {
            header('Location: /lop');
            exit;
        }

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lop->fill($_POST);
            if ($lop->validate() && $lop->save()) {
                header('Location: /lop');
                exit;
            }
            $errors = $lop->getValidationErrors();
        }
        include '../app/views/lop/edit.php';
    }

    public function delete($id)
    {
        $lop = $this->lopModel->find($id);
        if ($lop && $lop->delete()) {
            header('Location: /lop');
            exit;
        }
    }

    public function detail($id)
    {
        $lop = $this->lopModel->find($id);
        if (!$lop) {
            header('Location: /lop');
            exit;
        }
        include '../app/views/lop/detail.php';
    }

    
}

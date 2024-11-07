<?php
// app/controllers/LopController.php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\Lop;

class LopController
{
    private $lopModel;

    public function __construct($pdo)
    {
        $this->lopModel = new Lop($pdo);
    }

    public function index()
    {
        $lops = $this->lopModel->getAll();
        include '../app/views/lop/index.php';
    }

    public function create()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lop = new Lop($this->lopModel->getDb());
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

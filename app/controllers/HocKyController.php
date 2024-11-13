<?php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\HocKy;

class HocKyController
{
    private $hocKyModel;

    public function __construct($pdo)
    {
        $this->hocKyModel = new HocKy($pdo);
    }

    public function index()
    {
        $hocKys = $this->hocKyModel->getAll();
        include '../app/views/HocKy/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hocKy = new HocKy($this->hocKyModel->db);
            $hocKy->fill($_POST);

            if ($hocKy->validate() && $hocKy->save()) {
                header('Location: /hocky');
                exit;
            }
            $errors = $hocKy->getValidationErrors();
        }
        include '../app/views/HocKy/create.php';
    }

    public function edit($id)
    {
        $hocKy = $this->hocKyModel->find($id);
        if (!$hocKy) {
            header('Location: /hocky');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hocKy->fill($_POST);

            if ($hocKy->validate() && $hocKy->save()) {
                header('Location: /hocky');
                exit;
            }
            $errors = $hocKy->getValidationErrors();
        }
        include '../app/views/HocKy/edit.php';
    }

    public function delete($id)
    {
        $hocKy = $this->hocKyModel->find($id);
        if ($hocKy && $hocKy->delete()) {
            header('Location: /hocky');
            exit;
        }
    }
}
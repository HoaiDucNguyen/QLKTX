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
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hocKy = new HocKy($this->hocKyModel->db);
            $hocKy->fill($_POST);

            $stmt = $this->hocKyModel->db->prepare("SELECT checkHocKyConflict(:bat_dau, :ket_thuc, :ma_hoc_ky) AS conflict");
            $stmt->execute([
                'bat_dau' => $hocKy->bat_dau,
                'ket_thuc' => $hocKy->ket_thuc,
                'ma_hoc_ky' => $hocKy->ma_hoc_ky
            ]);
            $conflict = $stmt->fetchColumn();

            if ($conflict) {
                $errors['time_conflict'] = 'Thời gian học kỳ bị xung đột với học kỳ khác.';
            } elseif ($hocKy->exists()) {
                $errors['ma_hoc_ky'] = 'Mã học kỳ đã tồn tại.';
            } else {
                if ($hocKy->validate() && $hocKy->save()) {
                    header('Location: /hocky');
                    exit;
                }
                $errors = array_merge($errors, $hocKy->getValidationErrors());
            }
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

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hocKy->fill($_POST);

            $stmt = $this->hocKyModel->db->prepare("SELECT checkHocKyConflict(:bat_dau, :ket_thuc, :ma_hoc_ky) AS conflict");
            $stmt->execute([
                'bat_dau' => $hocKy->bat_dau,
                'ket_thuc' => $hocKy->ket_thuc,
                'ma_hoc_ky' => $hocKy->ma_hoc_ky
            ]);
            $conflict = $stmt->fetchColumn();

            if ($conflict) {
                $errors['time_conflict'] = 'Thời gian học kỳ bị xung đột với học kỳ khác.';
            } else {
                if ($hocKy->validate() && $hocKy->save()) {
                    header('Location: /hocky');
                    exit;
                }
                $errors = array_merge($errors, $hocKy->getValidationErrors());
            }
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
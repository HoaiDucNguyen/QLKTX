<?php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\TtThuePhong;
use Hp\Qlktx\Models\ThuePhong;
use PDO;

class TtThuePhongController
{
    private $ttThuePhongModel;

    public function __construct($pdo)
    {
        $this->ttThuePhongModel = new TtThuePhong($pdo);
    }

    public function index()
    {
        $ttThuePhongs = $this->ttThuePhongModel->getAll();
        include '../app/views/tt_thuephong/index.php';
    }

    public function create()
    {
        $errors = [];
        $ThuePhong = new ThuePhong($this->ttThuePhongModel->db);
        $ThuePhong->find($_GET['ma_hop_dong']);
        $ma_hop_dong = $_GET['ma_hop_dong'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ttThuePhong = new TtThuePhong($this->ttThuePhongModel->db);
            $ttThuePhong->fill($_POST);
            if ($ttThuePhong->validate() && $ttThuePhong->saveWithTransaction()) {
                header('Location: /tt_thuephong');
                exit;
            }
            $errors = $ttThuePhong->getValidationErrors();
        }
        include '../app/views/tt_thuephong/create.php';
    }

    public function delete($ma_hop_dong)
    {
        $ttThuePhong = $this->ttThuePhongModel->find($ma_hop_dong);
        if ($ttThuePhong && $ttThuePhong->delete()) {
            header('Location: /tt_thuephong');
            exit;
        }
    }
} 
<?php
// app/controllers/PhongController.php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\Phong;
use Hp\Qlktx\Models\SinhVien;
use Hp\Qlktx\Models\Lop;
use Hp\Qlktx\Models\NhanVien;


use PDO;
class ThongKeController
{
    public ?PDO $db;
    private $phongModel;
    private $svModel;
    private $totalLop;
    private $totalnv;
    public function __construct($pdo)
    {
        $this->phongModel = new Phong($pdo);
        $this->svModel = new SinhVien($pdo);
        $this->lopModel = new Lop($pdo);
        $this->nvModel = new NhanVien($pdo);
        
        
    }

    public function index()
    {
        // Lấy tổng số phòng và số phòng còn trống từ model
        $totalRooms = $this->phongModel->countAllRooms();
        // $availableRooms = $this->phongModel->countAvailableRooms();

        // tong so sinh vien
        $totalsv = $this->svModel->countAllsv();

        $totalLop = $this->lopModel->countAllLop();

        $totalnv = $this->nvModel->countAllnv();
        // Truyền dữ liệu vào view
        include '../app/views/ThongKe/index.php';
    }
    
 
}
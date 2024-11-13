<?php
// app/controllers/PhongController.php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\Phong;
use Hp\Qlktx\Models\SinhVien;
use Hp\Qlktx\Models\Lop;
use Hp\Qlktx\Models\NhanVien;
use Hp\Qlktx\Models\ThongKe;

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
        $thongKeModel = new ThongKe($this->phongModel->db);

        $totalRooms = $thongKeModel->getTotalRooms();
        $rentedRooms = $thongKeModel->getRentedRooms();
        $availableRooms = $thongKeModel->getAvailableRooms();
        $currentStudentsRenting = $thongKeModel->getCurrentStudentsRenting();
        $totalRevenue = $thongKeModel->getTotalRevenue();

        include '../app/views/ThongKe/index.php';
    }
    
 
}
<?php
namespace Hp\Qlktx\Models;

use PDO;


class Lop
{
    public $ma_lop;
    public $ten_lop;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function fill($data)
    {
        $this->ma_lop = $data['ma_lop'] ?? null;
        $this->ten_lop = $data['ten_lop'] ?? null;
    }

    public function validate()
    {
        $errors = [];
        if (empty($this->ma_lop)) {
            $errors[] = 'Mã lớp không được để trống.';
        }
        if (empty($this->ten_lop)) {
            $errors[] = 'Tên lớp không được để trống.';
        }

        return $errors;
    }

    public function getValidationErrors()
    {
        return $this->validate();
    }

    public function save()
    {
        if ($this->ma_lop) {
            // Cập nhật lớp nếu ma_lop đã tồn tại
            $stmt = $this->db->prepare("UPDATE Lop SET ten_lop = :ten_lop WHERE ma_lop = :ma_lop");
            return $stmt->execute([':ten_lop' => $this->ten_lop, ':ma_lop' => $this->ma_lop]);
        } else {
            // Chèn lớp mới, sử dụng ma_lop do người dùng nhập vào
            $stmt = $this->db->prepare("INSERT INTO Lop (ma_lop, ten_lop) VALUES (:ma_lop, :ten_lop)");
            return $stmt->execute([':ma_lop' => $this->ma_lop, ':ten_lop' => $this->ten_lop]);
        }
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM Lop WHERE ma_lop = :ma_lop");
        $stmt->execute([':ma_lop' => $id]);
        return $stmt->fetch();
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM Lop");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete()
    {
        $stmt = $this->db->prepare("DELETE FROM Lop WHERE ma_lop = :ma_lop");
        return $stmt->execute([':ma_lop' => $this->ma_lop]);
    }

    public function getDb()
    {
        return $this->db;
    }
}

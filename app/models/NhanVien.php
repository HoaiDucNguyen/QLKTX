<?php
namespace Hp\Qlktx\Models;

use PDO;

class NhanVien
{
    public ?PDO $db;
    public int $ma_nhan_vien = -1;
    public string $ho_ten;
    public string $so_dien_thoai;
    public string $ghi_chu = '';
    private array $errors = [];

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function fill(array $data): NhanVien
    {
        $this->ho_ten = $data['ho_ten'] ?? '';
        $this->so_dien_thoai = $data['so_dien_thoai'] ?? '';
        $this->ghi_chu = $data['ghi_chu'] ?? '';
        return $this;
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        if (empty($this->ho_ten)) {
            $this->errors['ho_ten'] = 'Họ tên không được để trống';
        }
        if (empty($this->so_dien_thoai) || !preg_match('/^[0-9]{10,11}$/', $this->so_dien_thoai)) {
            $this->errors['so_dien_thoai'] = 'Số điện thoại không hợp lệ';
        }
        return empty($this->errors);
    }

    public function save(): bool
    {
        if ($this->ma_nhan_vien >= 0) {
            $statement = $this->db->prepare(
                'UPDATE NhanVien SET ho_ten = :ho_ten, so_dien_thoai = :so_dien_thoai, ghi_chu = :ghi_chu WHERE ma_nhan_vien = :ma_nhan_vien'
            );
            return $statement->execute([
                'ho_ten' => $this->ho_ten,
                'so_dien_thoai' => $this->so_dien_thoai,
                'ghi_chu' => $this->ghi_chu,
                'ma_nhan_vien' => $this->ma_nhan_vien
            ]);
        } else {
            $statement = $this->db->prepare(
                'INSERT INTO NhanVien (ho_ten, so_dien_thoai, ghi_chu) VALUES (:ho_ten, :so_dien_thoai, :ghi_chu)'
            );
            $result = $statement->execute([
                'ho_ten' => $this->ho_ten,
                'so_dien_thoai' => $this->so_dien_thoai,
                'ghi_chu' => $this->ghi_chu
            ]);
            if ($result) {
                $this->ma_nhan_vien = $this->db->lastInsertId();
            }
            return $result;
        }
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('DELETE FROM NhanVien WHERE ma_nhan_vien = :ma_nhan_vien');
        return $statement->execute(['ma_nhan_vien' => $this->ma_nhan_vien]);
    }

    public function find(int $ma_nhan_vien): ?NhanVien
    {
        $statement = $this->db->prepare('SELECT * FROM NhanVien WHERE ma_nhan_vien = :ma_nhan_vien');
        $statement->execute(['ma_nhan_vien' => $ma_nhan_vien]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    protected function fillFromDB(array $row): NhanVien
    {
        [
            'ma_nhan_vien' => $this->ma_nhan_vien,
            'ho_ten' => $this->ho_ten,
            'so_dien_thoai' => $this->so_dien_thoai,
            'ghi_chu' => $this->ghi_chu
        ] = $row;
        return $this;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM NhanVien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

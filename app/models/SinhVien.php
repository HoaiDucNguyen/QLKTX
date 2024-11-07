<?php
namespace Hp\Qlktx\Models;
use PDO;

class SinhVien
{
    public ?PDO $db;
    public string $ma_sinh_vien ;
    public string $ho_ten;
    public string $so_dien_thoai;
    public string $ma_lop;
    private array $errors = [];

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function fill(array $data): SinhVien
    {
        $this->ma_sinh_vien = $data['ma_sinh_vien'] ?? '';
        $this->ho_ten = $data['ho_ten'] ?? '';
        $this->so_dien_thoai = $data['so_dien_thoai'] ?? '';
        $this->ma_lop = $data['ma_lop'] ?? '';
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
        if (empty($this->so_dien_thoai)) {
            $this->errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
        }
        if (empty($this->ma_lop)) {
            $this->errors['ma_lop'] = 'Mã lớp không được để trống';
        }
        return empty($this->errors);
    }

    public function save(): bool
    {
        if ($this->exists()) {
            $statement = $this->db->prepare(
                'UPDATE SinhVien SET ho_ten = :ho_ten, so_dien_thoai = :so_dien_thoai, ma_lop = :ma_lop WHERE ma_sinh_vien = :ma_sinh_vien'
            );
            return $statement->execute([
                'ho_ten' => $this->ho_ten,
                'so_dien_thoai' => $this->so_dien_thoai,
                'ma_lop' => $this->ma_lop,
                'ma_sinh_vien' => $this->ma_sinh_vien
            ]);
        } else {
            $statement = $this->db->prepare(
                'INSERT INTO SinhVien (ma_sinh_vien, ho_ten, so_dien_thoai, ma_lop) VALUES (:ma_sinh_vien, :ho_ten, :so_dien_thoai, :ma_lop)'
            );
            return $statement->execute([
                'ma_sinh_vien' => $this->ma_sinh_vien,
                'ho_ten' => $this->ho_ten,
                'so_dien_thoai' => $this->so_dien_thoai,
                'ma_lop' => $this->ma_lop
            ]);
        }
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('DELETE FROM SinhVien WHERE ma_sinh_vien = :ma_sinh_vien');
        return $statement->execute(['ma_sinh_vien' => $this->ma_sinh_vien]);
    }

    public function find( $ma_sinh_vien): ?SinhVien
    {
        $statement = $this->db->prepare('SELECT * FROM SinhVien WHERE ma_sinh_vien = :ma_sinh_vien');
        $statement->execute(['ma_sinh_vien' => $ma_sinh_vien]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    protected function fillFromDB(array $row): SinhVien
    {
        [
            'ma_sinh_vien' => $this->ma_sinh_vien,
            'ho_ten' => $this->ho_ten,
            'so_dien_thoai' => $this->so_dien_thoai,
            'ma_lop' => $this->ma_lop
        ] = $row;
        return $this;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM SinhVien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function exists(): bool
    {
        $statement = $this->db->prepare('SELECT COUNT(*) FROM SinhVien WHERE ma_sinh_vien = :ma_sinh_vien');
        $statement->execute(['ma_sinh_vien' => $this->ma_sinh_vien]);
        return $statement->fetchColumn() > 0;
    }
}
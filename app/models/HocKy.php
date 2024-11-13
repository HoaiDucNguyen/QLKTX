<?php
namespace Hp\Qlktx\Models;

use PDO;

class HocKy
{
    public ?PDO $db;
    public string $ma_hoc_ky;
    public string $ten_hoc_ky;
    public string $bat_dau;
    public string $ket_thuc;
    private array $errors = [];

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function fill(array $data): HocKy
    {
        $this->ma_hoc_ky = $data['ma_hoc_ky'] ?? '';
        $this->ten_hoc_ky = $data['ten_hoc_ky'] ?? '';
        $this->bat_dau = $data['bat_dau'] ?? '';
        $this->ket_thuc = $data['ket_thuc'] ?? '';
        return $this;
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        if (empty($this->ma_hoc_ky)) {
            $this->errors['ma_hoc_ky'] = 'Mã học kỳ không được để trống';
        }
        if (empty($this->ten_hoc_ky)) {
            $this->errors['ten_hoc_ky'] = 'Tên học kỳ không được để trống';
        }
        if (empty($this->bat_dau)) {
            $this->errors['bat_dau'] = 'Ngày bắt đầu không được để trống';
        }
        if (empty($this->ket_thuc)) {
            $this->errors['ket_thuc'] = 'Ngày kết thúc không được để trống';
        }
        return empty($this->errors);
    }

    public function save(): bool
    {
        if ($this->exists()) {
            $statement = $this->db->prepare(
                'UPDATE Hoc_Ky SET ten_hoc_ky = :ten_hoc_ky, bat_dau = :bat_dau, ket_thuc = :ket_thuc WHERE ma_hoc_ky = :ma_hoc_ky'
            );
            return $statement->execute([
                'ten_hoc_ky' => $this->ten_hoc_ky,
                'bat_dau' => $this->bat_dau,
                'ket_thuc' => $this->ket_thuc,
                'ma_hoc_ky' => $this->ma_hoc_ky
            ]);
        } else {
            $statement = $this->db->prepare(
                'INSERT INTO Hoc_Ky (ma_hoc_ky, ten_hoc_ky, bat_dau, ket_thuc) VALUES (:ma_hoc_ky, :ten_hoc_ky, :bat_dau, :ket_thuc)'
            );
            return $statement->execute([
                'ma_hoc_ky' => $this->ma_hoc_ky,
                'ten_hoc_ky' => $this->ten_hoc_ky,
                'bat_dau' => $this->bat_dau,
                'ket_thuc' => $this->ket_thuc
            ]);
        }
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('DELETE FROM Hoc_Ky WHERE ma_hoc_ky = :ma_hoc_ky');
        return $statement->execute(['ma_hoc_ky' => $this->ma_hoc_ky]);
    }

    public function find(string $ma_hoc_ky): ?HocKy
    {
        $statement = $this->db->prepare('SELECT * FROM Hoc_Ky WHERE ma_hoc_ky = :ma_hoc_ky');
        $statement->execute(['ma_hoc_ky' => $ma_hoc_ky]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    protected function fillFromDB(array $row): HocKy
    {
        [
            'ma_hoc_ky' => $this->ma_hoc_ky,
            'ten_hoc_ky' => $this->ten_hoc_ky,
            'bat_dau' => $this->bat_dau,
            'ket_thuc' => $this->ket_thuc
        ] = $row;
        return $this;
    }

    public function exists(): bool
    {
        $statement = $this->db->prepare('SELECT COUNT(*) FROM Hoc_Ky WHERE ma_hoc_ky = :ma_hoc_ky');
        $statement->execute(['ma_hoc_ky' => $this->ma_hoc_ky]);
        return $statement->fetchColumn() > 0;
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM Hoc_Ky");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
<?php
namespace Hp\Qlktx\Models;
use PDO;
class Phong
{
    public ?PDO $db;
    public int $ma_phong = -1;
    public string $ten_phong;
    public float $dien_tich;
    public int $so_giuong;
    public float $gia_thue;
    private array $errors = [];
    public function
        __construct(
        ?PDO $pdo
    ) {
        $this->db = $pdo;
    }

    public function fill(array $data): Phong
    {
        $this->ten_phong = $data['ten_phong'] ?? '';
        $this->dien_tich = $data['dien_tich'] ?? 0;
        $this->so_giuong = $data['so_giuong'] ?? 0;
        $this->gia_thue = $data['gia_thue'] ?? 0;
        return $this;
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        if (empty($this->ten_phong)) {
            $this->errors['ten_phong'] = 'Tên phòng không được để trống';
        }
        if ($this->dien_tich <= 0) {
            $this->errors['dien_tich'] = 'Diện tích phải lớn hơn 0';
        }
        if ($this->so_giuong <= 0) {
            $this->errors['so_giuong'] = 'Số giường phải lớn hơn 0';
        }
        if ($this->gia_thue <= 0) {
            $this->errors['gia_thue'] = 'Giá thuê phải lớn hơn 0';
        }
        return empty($this->errors);
    }

    public function save(): bool
    {
        if ($this->ma_phong >= 0) {
            $statement = $this->db->prepare(
                'UPDATE Phong SET ten_phong = :ten_phong, dien_tich = :dien_tich, so_giuong = :so_giuong, gia_thue =
                :gia_thue WHERE ma_phong = :ma_phong'
            );
            return $statement->execute([
                'ten_phong' => $this->ten_phong,
                'dien_tich' => $this->dien_tich,
                'so_giuong' => $this->so_giuong,
                'gia_thue' => $this->gia_thue,
                'ma_phong' => $this->ma_phong
            ]);
        } else {
            $statement = $this->db->prepare(
                'INSERT INTO Phong (ten_phong, dien_tich, so_giuong, gia_thue) VALUES (:ten_phong, :dien_tich,
                :so_giuong,
                :gia_thue)'
            );
            $result = $statement->execute([
                'ten_phong' => $this->ten_phong,
                'dien_tich' => $this->dien_tich,
                'so_giuong' => $this->so_giuong,
                'gia_thue' => $this->gia_thue
            ]);
            if ($result) {
                $this->ma_phong = $this->db->lastInsertId();
            }
            return $result;
        }
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('DELETE FROM Phong WHERE ma_phong = :ma_phong');
        return $statement->execute(['ma_phong' => $this->ma_phong]);
    }

   public function find(int $ma_phong): ?Phong
    {
        $statement = $this->db->prepare('SELECT * FROM Phong WHERE ma_phong = :ma_phong');
        $statement->execute(['ma_phong' => $ma_phong]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }
    protected function fillFromDB(array $row): Phong
    {
        [
            'ma_phong' => $this->ma_phong,
            'ten_phong' => $this->ten_phong,
            'dien_tich' => $this->dien_tich,
            'so_giuong' => $this->so_giuong,
            'gia_thue' => $this->gia_thue
        ] = $row;
        return $this;
    }

    public function getAll():array 
    {
        $stmt = $this->db->query("SELECT * FROM Phong");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
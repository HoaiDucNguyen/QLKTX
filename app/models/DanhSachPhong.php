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

    public function search(array $criteria): array {
        $query = "SELECT * FROM Phong WHERE 1=1";
        $params = [];

        if (!empty($criteria['ten_phong'])) {
            $query .= " AND ten_phong LIKE :ten_phong";
            $params['ten_phong'] = '%' . $criteria['ten_phong'] . '%';
        }
        if (!empty($criteria['dien_tich'])) {
            $query .= " AND dien_tich = :dien_tich";
            $params['dien_tich'] = $criteria['dien_tich'];
        }
        if (!empty($criteria['so_giuong'])) {
            $query .= " AND so_giuong = :so_giuong";
            $params['so_giuong'] = $criteria['so_giuong'];
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
<?php
namespace Hp\Qlktx\Models;
use PDO;

class Lop
{
    public ?PDO $db;
    public int $ma_lop = -1;
    public string $ten_lop;
    private array $errors = [];

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function fill(array $data): Lop
    {
        $this->ten_lop = $data['ten_lop'] ?? '';
        return $this;
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        if (empty($this->ten_lop)) {
            $this->errors['ten_lop'] = 'Tên lớp không được để trống';
        }
        return empty($this->errors);
    }

    public function find(int $ma_lop): ?Lop
    {
        $statement = $this->db->prepare('SELECT * FROM Lop WHERE ma_lop = :ma_lop');
        $statement->execute(['ma_lop' => $ma_lop]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    protected function fillFromDB(array $row): Lop
    {
        [
            'ma_lop' => $this->ma_lop,
            'ten_lop' => $this->ten_lop
        ] = $row;
        return $this;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM Lop");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
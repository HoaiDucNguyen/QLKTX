<?php
namespace Hp\Qlktx\Models;
use PDO;

class ThuePhong
{
    public ?PDO $db;
    public int $ma_hop_dong = -1;
    public string $ma_sinh_vien;
    public int $ma_phong;
    public string $bat_dau;
    public string $ket_thuc;
    public float $tien_dat_coc;
    public float $gia_thue_thuc_te;
    private array $errors = [];

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function fill(array $data): ThuePhong
    {
        $this->ma_sinh_vien = $data['ma_sinh_vien'] ?? 0;
        $this->ma_phong = $data['ma_phong'] ?? 0;
        $this->bat_dau = $data['bat_dau'] ?? '';
        $this->ket_thuc = $data['ket_thuc'] ?? '';
        $this->tien_dat_coc = $data['tien_dat_coc'] ?? 0;
        $this->gia_thue_thuc_te = $data['gia_thue_thuc_te'] ?? 0;
        return $this;
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        if ($this->ma_sinh_vien =='') {
            $this->errors['ma_sinh_vien'] = 'Mã sinh viên không hợp lệ';
        }
        if ($this->ma_phong <= 0) {
            $this->errors['ma_phong'] = 'Mã phòng không hợp lệ';
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
        if ($this->ma_hop_dong >= 0) {
            $statement = $this->db->prepare(
                'UPDATE ThuePhong SET ma_sinh_vien = :ma_sinh_vien, ma_phong = :ma_phong, bat_dau = :bat_dau, ket_thuc = :ket_thuc, tien_dat_coc = :tien_dat_coc, gia_thue_thuc_te = :gia_thue_thuc_te WHERE ma_hop_dong = :ma_hop_dong'
            );
            return $statement->execute([
                'ma_sinh_vien' => $this->ma_sinh_vien,
                'ma_phong' => $this->ma_phong,
                'bat_dau' => $this->bat_dau,
                'ket_thuc' => $this->ket_thuc,
                'tien_dat_coc' => $this->tien_dat_coc,
                'gia_thue_thuc_te' => $this->gia_thue_thuc_te,
                'ma_hop_dong' => $this->ma_hop_dong
            ]);
        } else {
            $statement = $this->db->prepare(
                'INSERT INTO ThuePhong (ma_sinh_vien, ma_phong, bat_dau, ket_thuc, tien_dat_coc, gia_thue_thuc_te) VALUES (:ma_sinh_vien, :ma_phong, :bat_dau, :ket_thuc, :tien_dat_coc, :gia_thue_thuc_te)'
            );
            $result = $statement->execute([
                'ma_sinh_vien' => $this->ma_sinh_vien,
                'ma_phong' => $this->ma_phong,
                'bat_dau' => $this->bat_dau,
                'ket_thuc' => $this->ket_thuc,
                'tien_dat_coc' => $this->tien_dat_coc,
                'gia_thue_thuc_te' => $this->gia_thue_thuc_te
            ]);
            if ($result) {
                $this->ma_hop_dong = $this->db->lastInsertId();
            }
            return $result;
        }
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('DELETE FROM ThuePhong WHERE ma_hop_dong = :ma_hop_dong');
        return $statement->execute(['ma_hop_dong' => $this->ma_hop_dong]);
    }

    public function find(int $ma_hop_dong): ?ThuePhong
    {
        $statement = $this->db->prepare('SELECT * FROM ThuePhong WHERE ma_hop_dong = :ma_hop_dong');
        $statement->execute(['ma_hop_dong' => $ma_hop_dong]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    protected function fillFromDB(array $row): ThuePhong
    {
        [
            'ma_hop_dong' => $this->ma_hop_dong,
            'ma_sinh_vien' => $this->ma_sinh_vien,
            'ma_phong' => $this->ma_phong,
            'bat_dau' => $this->bat_dau,
            'ket_thuc' => $this->ket_thuc,
            'tien_dat_coc' => $this->tien_dat_coc,
            'gia_thue_thuc_te' => $this->gia_thue_thuc_te
        ] = $row;
        return $this;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM ThuePhong");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} 
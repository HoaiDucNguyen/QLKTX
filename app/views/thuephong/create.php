<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hợp Đồng Thuê Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <?php include '../app/views/nav.php'; ?>
        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Thêm Hợp Đồng Thuê Phòng</h1>
                <form method="POST">
                    <div class="form-group">
                        <label>Mã Sinh Viên:</label>
                        <select name="ma_sinh_vien" class="form-control" required>
                            <?php foreach ($sinhViens as $sinhVien): ?>
                            <option value="<?= $sinhVien['ma_sinh_vien'] ?>"><?= $sinhVien['ho_ten'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mã Phòng:</label>
                        <select name="ma_phong" class="form-control" required>
                            <?php foreach ($phongs as $phong): ?>
                            <option value="<?= $phong['ma_phong'] ?>"><?= $phong['ten_phong'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bắt Đầu:</label>
                        <input type="date" name="bat_dau" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kết Thúc:</label>
                        <input type="date" name="ket_thuc" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tiền Đặt Cọc:</label>
                        <input type="number" name="tien_dat_coc" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Giá Thuê Thực Tế:</label>
                        <input type="number" name="gia_thue_thuc_te" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
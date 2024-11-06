<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <?php include '../app/views/nav.php'; ?>
        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Sửa Nhân Viên</h1>
                <form method="POST">

                    <div class="form-group">
                        <label>Họ Tên:</label>
                        <input type="text" name="ho_ten" class="form-control"
                            value="<?= htmlspecialchars($nhanVien->ho_ten) ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại:</label>
                        <input type="text" name="so_dien_thoai" class="form-control"
                            value="<?= htmlspecialchars($nhanVien->so_dien_thoai) ?>" required pattern="[0-9]{10,11}"
                            title="Số điện thoại phải có 10-11 chữ số">
                    </div>
                    <div class="form-group">
                        <label>Ghi Chú:</label>
                        <select name="ghi_chu" class="form-control" required>
                            <option value="admin" <?= $nhanVien->ghi_chu === 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="nhan vien" <?= $nhanVien->ghi_chu === 'nhan vien' ? 'selected' : '' ?>>Nhân
                                Viên</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mật Khẩu (Để trống nếu không muốn đổi):</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
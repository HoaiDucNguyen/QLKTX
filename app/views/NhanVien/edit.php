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
        <nav class="bg-light sidebar">
            <ul class="list-unstyled">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/phong">Quản Lý Phòng</a></li>
                <li><a href="/nhanvien">Quản Lý Nhân Viên</a></li>
                <!-- Thêm các mục khác -->
            </ul>
        </nav>
        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Sửa Nhân Viên</h1>
                <form method="POST">
                    <label>Họ Tên:</label>
                    <input type="text" name="ho_ten" value="<?= $nhanvien->ho_ten ?>" required>
                    <label>Số Điện Thoại:</label>
                    <input type="text" name="so_dien_thoai" value="<?= $nhanvien->so_dien_thoai ?>" required>
                    <label>Ghi Chú:</label>
                    <textarea name="ghi_chu" required><?= $nhanvien->ghi_chu ?></textarea>
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

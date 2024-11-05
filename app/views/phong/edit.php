<!-- app/views/phong/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <nav class="bg-light sidebar">
            <ul class="list-unstyled">
                <li><a href="/dashboard">Dashboard</a></li>
                <li><a href="/phong">Quản Lý Phòng</a></li>
                <!-- Thêm các mục khác -->
            </ul>
        </nav>
        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Sửa Phòng</h1>
                <form method="POST">
                    <label>Tên Phòng:</label>
                    <input type="text" name="ten_phong" value="<?= $phong->ten_phong ?>" required>
                    <label>Diện Tích:</label>
                    <input type="number" name="dien_tich" value="<?= $phong->dien_tich ?>" required>
                    <label>Số Giường:</label>
                    <input type="number" name="so_giuong" value="<?= $phong->so_giuong ?>" required>
                    <label>Giá Thuê:</label>
                    <input type="number" name="gia_thue" value="<?= $phong->gia_thue ?>" required>
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
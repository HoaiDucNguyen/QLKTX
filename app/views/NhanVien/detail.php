<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Nhân Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <?php include '../app/views/nav.php'; ?>
        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Chi Tiết Nhân Viên</h1>
                <p>Mã Nhân Viên: <?= $nhanvien['ma_nhanvien'] ?></p>
                <p>Họ Tên: <?= $nhanvien['ho_ten'] ?></p>
                <p>Số Điện Thoại: <?= $nhanvien['so_dien_thoai'] ?></p>
                <p>Ghi Chú: <?= $nhanvien['ghi_chu'] ?></p>
                <a href="/nhanvien" class="btn btn-secondary">Quay Lại</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
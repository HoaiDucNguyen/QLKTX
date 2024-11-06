<!-- app/views/phong/detail.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <nav class="bg-light sidebar">
            <?php include '../app/views/nav.php'; ?>
        </nav>
        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Chi Tiết Phòng</h1>
                <p>Mã Phòng: <?= $phong['ma_phong'] ?></p>
                <p>Tên Phòng: <?= $phong['ten_phong'] ?></p>
                <p>Diện Tích: <?= $phong['dien_tich'] ?></p>
                <p>Số Giường: <?= $phong['so_giuong'] ?></p>
                <p>Giá Thuê: <?= $phong['gia_thue'] ?></p>
                <a href="/phong" class="btn btn-secondary">Quay Lại</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
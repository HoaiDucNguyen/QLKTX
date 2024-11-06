<!-- app/views/phong/index.php -->
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
        <?php include '../app/views/nav.php'; ?>
        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Quản Lý Phòng</h1>
                <a href="/phong/create" class="btn btn-primary mb-3">Thêm Phòng</a>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã Phòng</th>
                            <th>Tên Phòng</th>
                            <th>Diện Tích</th>
                            <th>Số Giường</th>
                            <th>Giá Thuê</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($phongs as $phong): ?>
                        <tr>
                            <td><?= $phong['ma_phong'] ?></td>
                            <td><?= $phong['ten_phong'] ?></td>
                            <td><?= $phong['dien_tich'] ?></td>
                            <td><?= $phong['so_giuong'] ?></td>
                            <td><?= $phong['gia_thue'] ?></td>
                            <td>
                                <a href="/phong/edit/<?= $phong['ma_phong'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="/phong/delete/<?= $phong['ma_phong'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
</script>
</body>

</html>
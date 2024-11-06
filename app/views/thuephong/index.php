<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thuê Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <?php include '../app/views/nav.php'; ?>
        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Quản Lý Thuê Phòng</h1>
                <a href="/thuephong/create" class="btn btn-primary mb-3">Thêm Hợp Đồng</a>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã Hợp Đồng</th>
                            <th>Mã Sinh Viên</th>
                            <th>Mã Phòng</th>
                            <th>Bắt Đầu</th>
                            <th>Kết Thúc</th>
                            <th>Tiền Đặt Cọc</th>
                            <th>Giá Thuê Thực Tế</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($thuePhongs as $thuePhong): ?>
                        <tr>
                            <td><?= $thuePhong['ma_hop_dong'] ?></td>
                            <td><?= $thuePhong['ma_sinh_vien'] ?></td>
                            <td><?= $thuePhong['ma_phong'] ?></td>
                            <td><?= $thuePhong['bat_dau'] ?></td>
                            <td><?= $thuePhong['ket_thuc'] ?></td>
                            <td><?= $thuePhong['tien_dat_coc'] ?></td>
                            <td><?= $thuePhong['gia_thue_thuc_te'] ?></td>
                            <td>
                                <a href="/thuephong/edit/<?= $thuePhong['ma_hop_dong'] ?>"
                                    class="btn btn-warning btn-sm">Sửa</a>
                                <a href="/thuephong/delete/<?= $thuePhong['ma_hop_dong'] ?>"
                                    class="btn btn-danger btn-sm">Xóa</a>
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
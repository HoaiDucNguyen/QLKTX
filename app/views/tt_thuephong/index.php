<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thanh Toán Thuê Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3">
                <?php include '../app/views/nav.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="content mt-4">
                    <h1 class="mb-4">Quản Lý Thanh Toán Thuê Phòng</h1>
                    <a href="/tt_thuephong/create" class="btn btn-primary mb-3">Thêm Thanh Toán</a>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Mã Hợp Đồng</th>
                                <th>Tháng Năm</th>
                                <th>Số Tiền</th>
                                <th>Ngày Thanh Toán</th>
                                <th>Mã Nhân Viên</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ttThuePhongs as $ttThuePhong): ?>
                            <tr>
                                <td><?= $ttThuePhong['ma_hop_dong'] ?></td>
                                <td><?= $ttThuePhong['thang_nam'] ?></td>
                                <td><?= $ttThuePhong['so_tien'] ?></td>
                                <td><?= $ttThuePhong['ngay_thanh_toan'] ?></td>
                                <td><?= $ttThuePhong['ma_nhan_vien'] ?></td>
                                <td>
                                    <a href="/tt_thuephong/edit/<?= $ttThuePhong['ma_hop_dong'] ?>/<?= $ttThuePhong['thang_nam'] ?>"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="/tt_thuephong/delete/<?= $ttThuePhong['ma_hop_dong'] ?>/<?= $ttThuePhong['thang_nam'] ?>"
                                        class="btn btn-danger btn-sm">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
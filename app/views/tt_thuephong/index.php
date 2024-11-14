<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thanh Toán Thuê Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <link rel="icon" type="image/x-icon" href="CTU_logo.ico">
</head>

<body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <?php include '../app/views/header.php'; ?>
            </div>
        </div>
        <div class="row">
            <div>
                <?php include '../app/views/nav.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="content mt-4">
                    <h1 class="mb-4">Quản Lý Thanh Toán Thuê Phòng</h1>
                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
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
                                <td class="text-center">

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
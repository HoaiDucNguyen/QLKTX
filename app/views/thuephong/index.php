<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Thuê Phòng</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
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
                    <h1 class="mb-4">Quản Lý Thuê Phòng</h1>
                    <a href="/thuephong/create" class="btn btn-primary mb-3">Thêm Hợp Đồng</a>
                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Hợp Đồng</th>
                                <th>Mã Sinh Viên</th>
                                <th>Mã Phòng</th>
                                <th>Bắt Đầu</th>
                                <th>Kết Thúc</th>
                                <th>Tiền Đặt Cọc</th>
                                <th>Giá Thuê Thực Tế</th>
                                <th>Cần Thanh Toán</th>
                                <th>Trạng Thái</th>
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
                                <td><?= $thuePhong['can_thanh_toan'] ?></td>
                                <td><?php if ($thuePhong['trang_thai'] === 'choxetduyet'): ?>
                                    <a href="/thuephong/approve/<?= $thuePhong['ma_hop_dong'] ?>"
                                        class="btn btn-info btn-sm">Xét Duyệt</a>
                                    <?php else :; ?>
                                    <p>Đã được duyệt</p>
                                    <?php endif?>
                                </td>
                                <td class="d-flex">
                                    <?php if ($thuePhong['trang_thai'] === 'daduyet'): ?>
                                    <a href="/tt_thuephong/create?ma_hop_dong=<?= $thuePhong['ma_hop_dong'] ?>"
                                        class="btn btn-success btn-sm col-6 hanhdong">Thêm Thanh Toán</a>
                                    <?php endif ?>
                                    <a href="/thuephong/edit/<?= $thuePhong['ma_hop_dong'] ?>"
                                        class="btn btn-warning btn-sm col-6 hanhdong">Sửa</a>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>
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
            <div class="col-md-2">
                <?php include '../app/views/nav.php'; ?>
        </div>
            <div class="col-md-9">
                <div class="content mt-4">
                    <h1 class="mb-4">Quản Lý Nhân Viên</h1>
                    <a href="/nhanvien/create" class="btn btn-primary mb-3">Thêm Nhân Viên</a>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Mã Nhân Viên</th>
                                <th>Họ Tên</th>
                                <th>Số Điện Thoại</th>
                                <th>Ghi Chú</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($nhanViens as $nhanvien): ?>
                            <tr>
                                <td><?= htmlspecialchars($nhanvien['ma_nhan_vien']) ?></td>
                                <td><?= htmlspecialchars($nhanvien['ho_ten']) ?></td>
                                <td><?= htmlspecialchars($nhanvien['so_dien_thoai']) ?></td>
                                <td><?= htmlspecialchars($nhanvien['ghi_chu']) ?></td>
                                <td>
                                    <a href="/nhanvien/edit/<?= htmlspecialchars($nhanvien['ma_nhan_vien']) ?>"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="/nhanvien/delete/<?= htmlspecialchars($nhanvien['ma_nhan_vien']) ?>"
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
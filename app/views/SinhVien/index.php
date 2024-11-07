<!-- app/views/sinhvien/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        
        <?php include '../app/views/nav.php'; ?>

        <div class="content p-4">
            <div class="container mt-5">
                <h1 class="mb-4">Quản Lý Sinh Viên</h1>
                <a href="/sinhvien/create" class="btn btn-primary mb-3">Thêm Sinh Viên</a>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Mã Sinh Viên</th>
                            <th>Họ Tên</th>
                            <th>Số Điện Thoại</th>
                            <th>Mã Lớp</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sinhViens as $sinhvien): ?>
                        <tr>
                            <td><?= htmlspecialchars($sinhvien['ma_sinh_vien']) ?></td>
                            <td><?= htmlspecialchars($sinhvien['ho_ten']) ?></td>
                            <td><?= htmlspecialchars($sinhvien['so_dien_thoai']) ?></td>
                            <td><?= htmlspecialchars($sinhvien['ma_lop']) ?></td>
                            <td>
                                <a href="/sinhvien/edit/<?= htmlspecialchars($sinhvien['ma_sinh_vien']) ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="/sinhvien/delete/<?= htmlspecialchars($sinhvien['ma_sinh_vien']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">Xóa</a>
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

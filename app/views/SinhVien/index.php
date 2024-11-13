<!-- app/views/sinhvien/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <!-- Đảm bảo rằng tệp CSS được liên kết đúng -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Kiểm tra lại đường dẫn -->
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
                    <h1 class="mb-4">Danh Sách Sinh Viên</h1>

                    <!-- Hiển thị thông báo thành công nếu có -->
                    <?php if (!empty($successMessage)): ?>
                    <div class="alert alert-success">
                        <?= htmlspecialchars($successMessage) ?>
                    </div>
                    <?php endif; ?>

                    <!-- Hiển thị lỗi nếu có -->
                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <!-- Form tìm kiếm -->
                    <form action="/sinhvien" method="get" class="mb-3">
                        <input type="text" name="ho_ten" placeholder="Họ tên"
                            value="<?= htmlspecialchars($_GET['ho_ten'] ?? '') ?>" class="form-control mr-2">
                        <input type="text" name="so_dien_thoai" placeholder="Số điện thoại"
                            value="<?= htmlspecialchars($_GET['so_dien_thoai'] ?? '') ?>" class="form-control mr-2">
                        <input type="text" name="ma_lop" placeholder="Mã lớp"
                            value="<?= htmlspecialchars($_GET['ma_lop'] ?? '') ?>" class="form-control mr-2">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>

                    <a href="/sinhvien/create" class="btn btn-primary mb-3">Thêm Sinh Viên</a>

                    <!-- Bảng hiển thị danh sách sinh viên hoặc kết quả tìm kiếm -->
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Mã Sinh Viên</th>
                                <th>Họ Tên</th>
                                <th>Số Điện Thoại</th>
                                <th>Mã Lớp</th>
                                <th>Giới Tính</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_GET['ho_ten']) || isset($_GET['so_dien_thoai']) || isset($_GET['ma_lop'])): ?>
                                <?php if (empty($sinhViens)): ?>
                                <tr>
                                    <td colspan="6">Không tìm thấy sinh viên nào phù hợp.</td>
                                </tr>
                                <?php else: ?>
                                <?php foreach ($sinhViens as $sinhvien): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($sinhvien['ma_sinh_vien']) ?></td>
                                        <td><?= htmlspecialchars($sinhvien['ho_ten']) ?></td>
                                        <td><?= htmlspecialchars($sinhvien['so_dien_thoai']) ?></td>
                                        <td><?= htmlspecialchars($sinhvien['ma_lop']) ?></td>
                                        <td><?= htmlspecialchars($sinhvien['gioi_tinh']) ?></td>
                                        <td>
                                            <a href="/sinhvien/edit/<?= $sinhvien['ma_sinh_vien'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                            <a href="/sinhvien/delete/<?= $sinhvien['ma_sinh_vien'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php foreach ($sinhViens as $sinhvien): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($sinhvien['ma_sinh_vien']) ?></td>
                                        <td><?= htmlspecialchars($sinhvien['ho_ten']) ?></td>
                                        <td><?= htmlspecialchars($sinhvien['so_dien_thoai']) ?></td>
                                        <td><?= htmlspecialchars($sinhvien['ma_lop']) ?></td>
                                        <td><?= htmlspecialchars($sinhvien['gioi_tinh']) ?></td>
                                        <td>
                                            <a href="/sinhvien/edit/<?= $sinhvien['ma_sinh_vien'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                            <a href="/sinhvien/delete/<?= $sinhvien['ma_sinh_vien'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

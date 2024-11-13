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

                    <!-- Form tìm kiếm nhân viên -->
                    <form action="/nhanvien" method="get" class="mb-3">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="ma_nhan_vien" class="form-control" placeholder="Mã nhân viên"
                                    value="<?= htmlspecialchars($_GET['ma_nhan_vien'] ?? '') ?>">
                            </div>
                            <div class="col">
                                <input type="text" name="ho_ten" class="form-control" placeholder="Họ tên"
                                    value="<?= htmlspecialchars($_GET['ho_ten'] ?? '') ?>">
                            </div>
                            <div class="col">
                                <input type="text" name="so_dien_thoai" class="form-control" placeholder="Số điện thoại"
                                    value="<?= htmlspecialchars($_GET['so_dien_thoai'] ?? '') ?>">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>

                    <a href="/nhanvien/create" class="btn btn-primary mb-3">Thêm Nhân Viên</a>

                    <!-- Bảng hiển thị danh sách nhân viên -->
                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Nhân Viên</th>
                                <th>Họ Tên</th>
                                <th>Số Điện Thoại</th>
                                <th>Ghi Chú</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($nhanViens) && is_array($nhanViens)): ?>
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
                                        class="btn btn-danger btn-sm" onclick="return confirmDelete();">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="5">Không có nhân viên nào để hiển thị.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa? Tất cả dữ liệu liên quan sẽ bị xóa.");
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
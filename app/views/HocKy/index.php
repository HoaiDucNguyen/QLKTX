<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Học Kỳ</title>
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
                    <h1 class="mb-4">Quản Lý Học Kỳ</h1>

                    <a href="/hocky/create" class="btn btn-primary mb-3">Thêm Học Kỳ</a>

                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Học Kỳ</th>
                                <th>Tên Học Kỳ</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($hocKys) && is_array($hocKys)): ?>
                            <?php foreach ($hocKys as $hocKy): ?>
                            <tr>
                                <td><?= htmlspecialchars($hocKy['ma_hoc_ky']) ?></td>
                                <td><?= htmlspecialchars($hocKy['ten_hoc_ky']) ?></td>
                                <td><?= htmlspecialchars($hocKy['bat_dau']) ?></td>
                                <td><?= htmlspecialchars($hocKy['ket_thuc']) ?></td>
                                <td>
                                    <a href="/hocky/edit/<?= htmlspecialchars($hocKy['ma_hoc_ky']) ?>"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="/hocky/delete/<?= htmlspecialchars($hocKy['ma_hoc_ky']) ?>"
                                        class="btn btn-danger btn-sm" onclick="return confirmDelete();">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="5">Không có học kỳ nào để hiển thị.</td>
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
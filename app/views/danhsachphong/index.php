<!-- app/views/phong/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Phòng</title>
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
                <?php include '../app/views/navSV.php'; ?>
            </div>

            <div class="col-md-9">
                <div class="content mt-4">
                    <h1 class="mb-4">Danh Sách Phòng</h1>
                    <!-- Form tìm kiếm -->
                    <form action="/phong" method="get" class="mb-3">
                        <input type="text" name="ten_phong" placeholder="Tên phòng"
                            value="<?= htmlspecialchars($_GET['ten_phong'] ?? '') ?>">
                        <input type="text" name="dien_tich" placeholder="Diện tích"
                            value="<?= htmlspecialchars($_GET['dien_tich'] ?? '') ?>">
                        <input type="number" name="so_giuong" placeholder="Số giường"
                            value="<?= htmlspecialchars($_GET['so_giuong'] ?? '') ?>">
                        <button type="submit">Tìm kiếm</button>
                    </form>

                    <!-- Bảng hiển thị danh sách phòng hoặc kết quả tìm kiếm -->

                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Phòng</th>
                                <th>Tên Phòng</th>
                                <th>Diện Tích</th>
                                <th>Số Giường</th>
                                <th>Giá Thuê</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_GET['ten_phong']) || isset($_GET['dien_tich']) || isset($_GET['so_giuong'])): ?>
                            <?php if (empty($phongs)): ?>
                            <tr>
                                <td colspan="5">Không tìm thấy phòng nào phù hợp.</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($phongs as $phong): ?>
                            <tr>
                                <td><?= htmlspecialchars($phong['ma_phong']) ?></td>
                                <td><?= htmlspecialchars($phong['ten_phong']) ?></td>
                                <td><?= htmlspecialchars($phong['dien_tich']) ?></td>
                                <td><?= htmlspecialchars($phong['so_giuong']) ?></td>
                                <td><?= htmlspecialchars($phong['gia_thue']) ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php foreach ($phongs as $phong): ?>
                            <tr>
                                <td><?= htmlspecialchars($phong['ma_phong']) ?></td>
                                <td><?= htmlspecialchars($phong['ten_phong']) ?></td>
                                <td><?= htmlspecialchars($phong['dien_tich']) ?></td>
                                <td><?= htmlspecialchars($phong['so_giuong']) ?></td>
                                <td><?= htmlspecialchars($phong['gia_thue']) ?></td>
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
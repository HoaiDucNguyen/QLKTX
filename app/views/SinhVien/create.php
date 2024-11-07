<!-- app/views/sinhvien/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
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
                    <h1 class="mb-4">Thêm Sinh Viên</h1>
                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <form method="POST" class="form">
                        <div class="form-group">
                            <label for="ma_sinh_vien">Mã sinh viên:</label>
                            <input type="text" name="ma_sinh_vien" id="ma_sinh_vien" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="ho_ten">Họ Tên:</label>
                            <input type="text" name="ho_ten" id="ho_ten" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="so_dien_thoai">Số Điện Thoại:</label>
                            <input type="text" name="so_dien_thoai" id="so_dien_thoai" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="ma_lop">Mã Lớp:</label>
                            <input type="text" name="ma_lop" id="ma_lop" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

</html>
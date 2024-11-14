<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Học Kỳ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">
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
                    <h1 class="mb-4">Sửa Học Kỳ</h1>
                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Mã Học Kỳ:</label>
                            <input type="text" name="ma_hoc_ky" class="form-control"
                                value="<?= htmlspecialchars($hocKy->ma_hoc_ky) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tên Học Kỳ:</label>
                            <input type="text" name="ten_hoc_ky" class="form-control"
                                value="<?= htmlspecialchars($hocKy->ten_hoc_ky) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ngày Bắt Đầu:</label>
                            <input type="date" name="bat_dau" class="form-control"
                                value="<?= htmlspecialchars($hocKy->bat_dau) ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Ngày Kết Thúc:</label>
                            <input type="date" name="ket_thuc" class="form-control"
                                value="<?= htmlspecialchars($hocKy->ket_thuc) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
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
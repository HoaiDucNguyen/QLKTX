<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Lớp</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Sửa Lớp</h1>
        <form action="/lop/edit/<?= $lop['ma_lop'] ?>" method="POST">
            <div class="form-group">
                <label for="ten_lop">Tên Lớp:</label>
                <input type="text" id="ten_lop" name="ten_lop" class="form-control" value="<?= $lop['ten_lop'] ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Cập Nhật</button>
        </form>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger mt-3">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

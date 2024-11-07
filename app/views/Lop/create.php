<!-- app/views/lop/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Lớp</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Thêm Lớp</h1>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="ma_lop">Mã Lớp</label>
                <input type="text" name="ma_lop" id="ma_lop" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ten_lop">Tên Lớp</label>
                <input type="text" name="ten_lop" id="ten_lop" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Lớp</button>
        </form>
    </div>
</body>

</html>

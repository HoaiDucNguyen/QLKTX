<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Lớp</title>
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
            <div">
                <?php include '../app/views/nav.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="content mt-4">
                    <h1 class="mb-4">Sửa Lớp</h1>
                    <form method="POST" class="form">
                        <div class="form-group">

                            <div class="form-group">
                                <label for="ma_lop">Mã Lớp :
                                    <input type="text" hidden name="ma_lop" id="ma_lop" class="form-control"
                                        value="<?= htmlspecialchars($lop->ma_lop) ?>" required>
                                    <?php echo $lop->ma_lop; ?></label>
                                <br>
                                <label for="ten_lop">Tên Lớp:</label>
                                <input type="text" name="ten_lop" id="ten_lop" class="form-control"
                                    value="<?= htmlspecialchars($lop->ten_lop) ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>

                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger mt-3">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
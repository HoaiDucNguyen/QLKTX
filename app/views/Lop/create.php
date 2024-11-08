<!-- app/views/lop/create.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Lớp</title>
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
            <div class="col-md-2">
                <?php include '../app/views/nav.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="content mt-4">
                    <h1 class="mb-4">Thêm Lớp</h1>
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
            </div>
        </div>
    </div>
</body>

</html>
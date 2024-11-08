<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
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
        <div class="container mt-5 w-50">
            <div class="card">
                <div class="card-header font-weight-bold text-white" style="background-color: #1f5ca9;">
                    THÀNH VIÊN ĐĂNG NHẬP
                </div>
                <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <div class="card-body ">
                    <form class="form-horizontal" method="POST">
                        <div class="form-group">
                            <label>Mã số</label>
                            <input type="text" name="ma_so" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
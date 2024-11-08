<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hợp Đồng Thuê Phòng</title>
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
                    <h1 class="mb-4">Thêm Hợp Đồng Thuê Phòng</h1>
                    <form method="POST">
                        <div class="form-group">
                            <label>Mã Sinh Viên:</label>
                            <input type="text" name="ma_sinh_vien" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mã Phòng:</label>
                            <input type="text" name="ma_phong" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Bắt Đầu:</label>
                            <input type="date" name="bat_dau" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kết Thúc:</label>
                            <input type="date" name="ket_thuc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tiền Đặt Cọc:</label>
                            <input type="number" name="tien_dat_coc" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Giá Thuê Thực Tế:</label>
                            <input type="number" name="gia_thue_thuc_te" class="form-control" required>
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
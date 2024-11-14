<!-- app/views/phong/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê</title>
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
            <div>
                <?php include '../app/views/nav.php'; ?>
            </div>
            <div class="col-md-9">
                <div class="content mt-4">
                    <div class="col-md-12">
                        <h1 class="mb-4">Thống Kê</h1>
                        <section class="dashboard-content">
                            <div class="dashboard-item">
                                <h2 class="text-center text-primary font-weight-bold">Phòng</h2>
                                <p>Tổng số phòng: <?= htmlspecialchars($totalRooms) ?></p>
                                <p>Số phòng nam: <?= htmlspecialchars($maleRooms) ?></p>
                                <p>Số phòng nữ: <?= htmlspecialchars($femaleRooms) ?></p>
                                <p>Số phòng trống: <?= htmlspecialchars($availableRooms) ?></p>
                                <p>Số phòng đã thuê: <?= htmlspecialchars($rentedRooms) ?></p>
                            </div>
                            <div class="dashboard-item">
                                <h2 class="text-center text-primary font-weight-bold">Sinh Viên</h2>
                                <p>Số sinh viên đang thuê phòng: <?= htmlspecialchars($currentStudentsRenting) ?></p>
                                <p>Số sinh viên nam đang thuê: <?= htmlspecialchars($maleStudentsRenting) ?></p>
                                <p>Số sinh viên nữ đang thuê: <?= htmlspecialchars($femaleStudentsRenting) ?></p>
                            </div>
                            <div class="dashboard-item">
                                <h2 class="text-center text-primary font-weight-bold">Tài Chính</h2>
                                <p>Tổng số tiền thu được: <?= htmlspecialchars($totalRevenue) ?></p>
                                <p>Tổng số tiền đặt cọc: <?= htmlspecialchars($totalDeposit) ?></p>
                                <p>Tổng số tiền thanh toán: <?= htmlspecialchars($totalPayment) ?></p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
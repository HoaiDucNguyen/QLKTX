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
                    <div class="col-md-5">
                        <h1 class="mb-4">Thống Kê</h1>
                        <section class="dashboard-content">
                            <!-- Hiển thị các thông tin dashboard -->
                            <div class="dashboard-item">
                                <h2>Tổng số phòng:</h2>
                                <p><?= htmlspecialchars($totalRooms) ?></p>
                            </div>
                            <div class="dashboard-item">
                                <h2>Số phòng đã thuê:</h2>
                                <p><?= htmlspecialchars($rentedRooms) ?></p>
                            </div>
                            <div class="dashboard-item">
                                <h2>Số phòng trống:</h2>
                                <p><?= htmlspecialchars($availableRooms) ?></p>
                            </div>
                            <div class="dashboard-item">
                                <h2>Số sinh viên đang thuê phòng:</h2>
                                <p><?= htmlspecialchars($currentStudentsRenting) ?></p>
                            </div>
                            <div class="dashboard-item">
                                <h2>Tổng số tiền thu được:</h2>
                                <p><?= htmlspecialchars($totalRevenue) ?></p>
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
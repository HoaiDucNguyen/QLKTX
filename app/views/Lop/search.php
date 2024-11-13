<!-- app/views/lop/search.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Kết quả tìm kiếm</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã Lớp</th>
                    <th>Tên Lớp</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($lops)): ?>
                    <p>Không tìm thấy lớp nào phù hợp.</p>
                <?php else: ?>
                    <?php foreach ($lops as $lop): ?>
                        <tr>
                            <td><?= htmlspecialchars($lop['ma_lop']) ?></td>
                            <td><?= htmlspecialchars($lop['ten_lop']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="/danhsachphong" class="btn btn-primary">Quay lại danh sách lớp</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

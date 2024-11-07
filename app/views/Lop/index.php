<!-- app/views/lop/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Lớp</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Quản Lý Lớp</h1>
        <a href="/lop/create" class="btn btn-primary mb-3">Thêm Lớp</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mã Lớp</th>
                    <th>Tên Lớp</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lops as $lop): ?>
                <tr>
                    <td><?= $lop['ma_lop'] ?></td>
                    <td><?= $lop['ten_lop'] ?></td>
                    <td>
                        <a href="/lop/edit/<?= $lop['ma_lop'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="/lop/delete/<?= $lop['ma_lop'] ?>" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

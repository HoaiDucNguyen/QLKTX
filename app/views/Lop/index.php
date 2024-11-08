<!-- app/views/lop/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Lớp</title>
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
            <div class="col-md-2">
                <?php include '../app/views/nav.php'; ?> 
            </div>
            <div class="col-md-9">
                <div class="content mt-4">
                    <h1 class="mb-4">Quản Lý Lớp</h1>
                    <a href="/lop/create" class="btn btn-primary mb-3">Thêm Lớp</a>
                    <table class="table table-bordered table-hover">
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
                                <td><?= htmlspecialchars($lop['ma_lop']) ?></td>
                                <td><?= htmlspecialchars($lop['ten_lop']) ?></td>
                                <td>
                                    <a href="/lop/edit/<?= htmlspecialchars($lop['ma_lop']) ?>"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="/lop/delete/<?= htmlspecialchars($lop['ma_lop']) ?>"
                                        class="btn btn-danger btn-sm">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
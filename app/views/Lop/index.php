<!-- app/views/lop/index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Lớp</title>
    <!-- Đảm bảo rằng tệp CSS được liên kết đúng -->
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
                    <h1 class="mb-4">Danh Sách Lớp</h1>

                    <!-- Hiển thị thông báo thành công nếu có -->
                    <?php if (!empty($successMessage)): ?>
                    <div class="alert alert-success">
                        <?= htmlspecialchars($successMessage) ?>
                    </div>
                    <?php endif; ?>

                    <!-- Hiển thị lỗi nếu có -->
                    <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <!-- Form tìm kiếm -->
                    <form action="/lop" method="get" class="mb-3">
                        <input type="text" name="ten_lop" placeholder="Tên lớp"
                            value="<?= htmlspecialchars($_GET['ten_lop'] ?? '') ?>">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>

                    <a href="/lop/create" class="btn btn-primary mb-3">Thêm Lớp</a>

                    <!-- Bảng hiển thị danh sách lớp hoặc kết quả tìm kiếm -->
                    <table class="table table-bordered table-hover">
                        <thead class="custom-thead">
                            <tr>
                                <th>Mã Lớp</th>
                                <th>Tên Lớp</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_GET['ma_lop']) || isset($_GET['ten_lop'])): ?>
                            <?php if (empty($lops)): ?>
                            <tr>
                                <td colspan="3">Không tìm thấy lớp nào phù hợp.</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($lops as $lop): ?>
                            <tr>
                                <td><?= htmlspecialchars($lop['ma_lop']) ?></td>
                                <td><?= htmlspecialchars($lop['ten_lop']) ?></td>
                                <td>
                                    <a href="/lop/edit/<?= htmlspecialchars($lop['ma_lop']) ?>"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="/lop/delete/<?= htmlspecialchars($lop['ma_lop']) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa lớp này?');">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php foreach ($lops as $lop): ?>
                            <tr>
                                <td><?= htmlspecialchars($lop['ma_lop']) ?></td>
                                <td><?= htmlspecialchars($lop['ten_lop']) ?></td>
                                <td>
                                    <a href="/lop/edit/<?= htmlspecialchars($lop['ma_lop']) ?>"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                    <a href="/lop/delete/<?= htmlspecialchars($lop['ma_lop']) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa lớp này?');">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Files -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
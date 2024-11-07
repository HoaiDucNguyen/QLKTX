<!-- app/views/sinhvien/create.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên Mới</title>
</head>
<body>
    <h1>Thêm Sinh Viên Mới</h1>
    <form action="/sinhvien/create" method="post">
        <div>
            <label>Họ Tên:</label>
            <input type="text" name="ho_ten" value="<?= htmlspecialchars($_POST['ho_ten'] ?? '') ?>">
            <?php if (isset($errors['ho_ten'])): ?>
                <span style="color:red;"><?= htmlspecialchars($errors['ho_ten']) ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label>Số Điện Thoại:</label>
            <input type="text" name="so_dien_thoai" value="<?= htmlspecialchars($_POST['so_dien_thoai'] ?? '') ?>">
            <?php if (isset($errors['so_dien_thoai'])): ?>
                <span style="color:red;"><?= htmlspecialchars($errors['so_dien_thoai']) ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label>Mã Lớp:</label>
            <input type="number" name="ma_lop" value="<?= htmlspecialchars($_POST['ma_lop'] ?? '') ?>">
            <?php if (isset($errors['ma_lop'])): ?>
                <span style="color:red;"><?= htmlspecialchars($errors['ma_lop']) ?></span>
            <?php endif; ?>
        </div>
        <button type="submit">Lưu</button>
        <a href="/sinhvien">Quay lại danh sách</a>
    </form>
</body>
</html>

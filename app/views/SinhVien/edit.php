<!-- app/views/sinhvien/edit.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa Sinh Viên</title>
</head>
<body>
    <h1>Chỉnh sửa Sinh Viên</h1>
    <form action="/sinhvien/edit/<?= $sinhVien->ma_sinh_vien ?>" method="post">
        <div>
            <label>Họ Tên:</label>
            <input type="text" name="ho_ten" value="<?= htmlspecialchars($sinhVien->ho_ten) ?>">
            <?php if (isset($errors['ho_ten'])): ?>
                <span style="color:red;"><?= htmlspecialchars($errors['ho_ten']) ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label>Số Điện Thoại:</label>
            <input type="text" name="so_dien_thoai" value="<?= htmlspecialchars($sinhVien->so_dien_thoai) ?>">
            <?php if (isset($errors['so_dien_thoai'])): ?>
                <span style="color:red;"><?= htmlspecialchars($errors['so_dien_thoai']) ?></span>
            <?php endif; ?>
        </div>
        <div>
            <label>Mã Lớp:</label>
            <input type="number" name="ma_lop" value="<?= htmlspecialchars($sinhVien->ma_lop) ?>">
            <?php if (isset($errors['ma_lop'])): ?>
                <span style="color:red;"><?= htmlspecialchars($errors['ma_lop']) ?></span>
            <?php endif; ?>
        </div>
        <button type="submit">Cập nhật</button>
        <a href="/sinhvien">Quay lại danh sách</a>
    </form>
</body>
</html>

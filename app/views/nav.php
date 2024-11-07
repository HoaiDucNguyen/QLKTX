<nav class="bg-light sidebar p-3">
    <ul class="list-unstyled">
        <li><a href="/phong" class="d-block py-2">Quản Lý Phòng</a></li>
        <?php if ($_SESSION['ghi_chu'] === 'admin') : ?>
        <li><a href="/nhanvien" class="d-block py-2">Quản Lý Nhân Viên</a></li>
        <?php endif; ?>
        <li><a href="/thuephong" class="d-block py-2">Quản Lý Thuê Phòng</a></li>
        <li><a href="/lop" class="d-block py-2">Quản Lý Lớp</a></li>
        <li><a href="/sinhvien" class="d-block py-2">Quản Lý Sinh Viên</a></li>
    </ul>
</nav>
<nav class="bg-light sidebar">
    <ul class="list-unstyled">
        <li><a href="/phong">Quản Lý Phòng</a></li>
        <?php if ($_SESSION['ghi_chu'] === 'admin') : ?>
        <li><a href="/nhanvien">Quản Lý Nhân Viên</a></li>
        <?php endif; ?>
        <li><a href="/thuephong">Quản Lý Thuê Phòng</a></li>
        <li><a href="/lop">Quản Lý Lớp</a></li>
        <li><a href="/sinhvien">Quản Lý Sinh Viên</a></li>
        <!-- Thêm các mục khác -->
    </ul>
</nav>
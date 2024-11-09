<?php
function isActive($path) {
    $currentPath = $_SERVER['REQUEST_URI'];
    return $currentPath === $path || 
           strpos($currentPath, $path . '/create') === 0 || 
           strpos($currentPath, $path . '/edit') === 0 ? 'active' : '';
}
?>

<nav class="navbar border-right navbar-expand-lg">
    <div class="bg-white" id="sidebar-wrapper">
        <!-- Nút hamburger cho màn hình nhỏ -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <!-- Biểu tượng hamburger -->
        </button>
        <div class="collapse list-group-flush my-3 navbar-collapse" id="navbarNav">
            <ul class="list-unstyled flex-column navbar-nav">
                <li>
                    <a href="#" class="list-group-item list-group-item-action <?php echo isActive('/'); ?>"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                </li>
                <li>
                    <a href="/phong" class="list-group-item list-group-item-action <?php echo isActive('/phong'); ?>"><i class="fas fa-bed me-2"></i>Quản lý Phòng</a>
                </li>
                <?php if ($_SESSION['ghi_chu'] === 'admin') : ?>
                <li>
                    <a href="/nhanvien" class="list-group-item list-group-item-action <?php echo isActive('/nhanvien'); ?>"><i class="fas fa-users me-2"></i>Quản Lý Nhân Viên</a>
                </li>
                <?php endif; ?>
                <li>
                    <a href="/thuephong" class="list-group-item list-group-item-action <?php echo isActive('/thuephong'); ?>"><i class="fas fa-paperclip me-2"></i>Quản Lý Thuê Phòng</a>
                </li>
                <li>
                    <a href="/lop" class="list-group-item list-group-item-action <?php echo isActive('/lop'); ?>"><i class="fas fa-address-book me-2"></i>Quản Lý Lớp</a>
                </li>
                <li>
                    <a href="/sinhvien" class="list-group-item list-group-item-action <?php echo isActive('/sinhvien'); ?>"><i class="fas fa-graduation-cap me-2"></i>Quản Lý Sinh Viên</a>
                </li>
                <li>
                    <a href="/danhsachphong" class="list-group-item list-group-item-action <?php echo isActive('/danhsachphong'); ?>"><i class="fas fa-list-alt me-2"></i>Danh Sách Phòng</a>
                </li>
                <li>
                    <a href="/login" class="list-group-item list-group-item-action text-danger fw-bold <?php echo isActive('/login'); ?>"><i class="fas fa-power-off me-2"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



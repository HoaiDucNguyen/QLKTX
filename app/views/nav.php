<?php
function isActive($path) {
    $currentPath = $_SERVER['REQUEST_URI'];
    return $currentPath === $path || 
           strpos($currentPath, $path . '/create') === 0 || 
           strpos($currentPath, $path . '/edit') === 0 ? 'active' : '';
}
?>

<nav class="border-right">
    <div class="bg-white " id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
        </div>
        <div class="list-group list-group-flush my-3">
            <ul class="list-unstyled">
                <a href="#" class="list-group-item list-group-item-action <?php echo isActive('/'); ?>"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="/phong" class="list-group-item list-group-item-action <?php echo isActive('/phong'); ?>"><i
                        class="fas fa-bed me-2"></i>Quản lý Phòng</a>
                <?php if ($_SESSION['ghi_chu'] === 'admin') : ?>
                    <a href="/nhanvien" class="list-group-item list-group-item-action <?php echo isActive('/nhanvien'); ?>"><i
                        class="fas fa-users me-2"></i>Quản Lý Nhân Viên</a>
                <?php endif; ?>
                <a href="/thuephong" class="list-group-item list-group-item-action <?php echo isActive('/thuephong'); ?>"><i
                        class="fas fa-paperclip me-2"></i>Quản Lý Thuê Phòng</a>
                <a href="/lop" class="list-group-item list-group-item-action <?php echo isActive('/lop'); ?>"><i
                        class="fas fa-address-book me-2"></i>Quản Lý Lớp</a>
                <a href="/sinhvien" class="list-group-item list-group-item-action <?php echo isActive('/sinhvien'); ?>"><i
                        class="fas fa-graduation-cap me-2"></i>Quản Lý Sinh Viên</a>
                <a href="/login" class="list-group-item list-group-item-action text-danger fw-bold <?php echo isActive('/login'); ?>"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </ul>
        </div>
    </div>
</nav>


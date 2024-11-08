
<!-- nav.php -->
<!-- <nav class="navbar navbar-expand-lg"> 
    <a class="navbar-brand" href="#">Quản Lý Ký Túc Xá</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/phong">Quản Lý Phòng</a>
            </li>
            <li class="nav-item">
                <?php if ($_SESSION['ghi_chu'] === 'admin') : ?>
                    <a class="nav-link" href="/nhanvien">Quản Lý Nhân Viên</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/thuephong">Quản Lý Thuê Phòng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/lop">Quản Lý Lớp</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/sinhvien">Quản Lý Sinh Vien</a>
            </li>
           
        </ul>
    </div>
</nav> -->
<?php
// Function to check if the current page matches the link
function isActive($path) {
    return $_SERVER['REQUEST_URI'] === $path ? 'active' : '';
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
                <a href="/nhanvien" class="list-group-item list-group-item-action <?php echo isActive('/nhanvien'); ?>"><i
                        class="fas fa-users me-2"></i>Quản Lý Nhân Viên</a>
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


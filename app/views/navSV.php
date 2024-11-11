<?php
function isActive($path)
{
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
                <a href="/phong" class="list-group-item list-group-item-action <?php echo isActive('/phong'); ?>"><i
                        class="fas fa-bed me-2"></i>Danh Sách Phòng</a>
                <a href="/current" class="list-group-item list-group-item-action <?php echo isActive('/current'); ?>"><i
                        class="fas fa-users me-2"></i>Phòng Ở Hiện Tại</a>
                <a href="/login"
                    class="list-group-item list-group-item-action text-danger fw-bold <?php echo isActive('/logout'); ?>"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </ul>
        </div>
    </div>
</nav>
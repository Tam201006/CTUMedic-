<?php
$userName = 'Test User';
$role = 'login'; // 'patient', 'doctor', 'manager', 'login'

function navigation($role) {
    $baseUrl = BASE_URL;
    $assetsUrl = BASE_ASSETS;

    if ($role == 'patient') {
        return "
            <li><a href='?page=home'><img src='{$assetsUrl}/images/icons/house-door.svg' alt=''><span>Trang chủ</span></a></li>
            <li><a href='?page=lichkham'><img src='{$assetsUrl}/images/icons/calendar-check.svg' alt=''><span>Lịch khám bệnh</span></a></li>
            <li><a href='?page=datlich'><img src='{$assetsUrl}/images/icons/calendar-plus.svg' alt=''><span>Đặt lịch khám</span></a></li>
            <li><a href='?page=logout'><img src='{$assetsUrl}/images/icons/box-arrow-right.svg' alt=''><span>Đăng xuất</span></a></li>
        ";
    } elseif ($role == 'doctor') {
        return "
            <li><a href='?page=home'><img src='{$assetsUrl}/images/icons/house-door.svg' alt=''><span>Trang chủ</span></a></li>
            <li><a href='?page=lichkham'><img src='{$assetsUrl}/images/icons/calendar-check.svg' alt=''><span>Lịch khám bệnh</span></a></li>
            <li><a href='?page=logout'><img src='{$assetsUrl}/images/icons/box-arrow-right.svg' alt=''><span>Đăng xuất</span></a></li>
        ";
    } elseif ($role == 'manager') {
        return "
            <li><a href='?page=home'><img src='{$assetsUrl}/images/icons/house-door.svg' alt=''><span>Trang chủ</span></a></li>
            <li><a href='?page=lichkham'><img src='{$assetsUrl}/images/icons/calendar-check.svg' alt=''><span>Lịch khám bệnh</span></a></li>
            <li><a href='?page=bacsi'><img src='{$assetsUrl}/images/icons/person-badge.svg' alt=''><span>Danh sách bác sĩ</span></a></li>
            <li><a href='?page=thembacsi'><img src='{$assetsUrl}/images/icons/person-plus.svg' alt=''><span>Thêm bác sĩ</span></a></li>
            <li><a href='?page=logout'><img src='{$assetsUrl}/images/icons/box-arrow-right.svg' alt=''><span>Đăng xuất</span></a></li>
        ";
    } elseif ($role == 'login') {
        return "
            <li><a href='?page=home'><img src='{$assetsUrl}/images/icons/house-door.svg' alt=''><span>Trang chủ</span></a></li>
            <li><a href='?page=login'><img src='{$assetsUrl}/images/icons/box-arrow-in-right.svg' alt=''><span>Đăng nhập</span></a></li>
            <li><a href='?page=register'><img src='{$assetsUrl}/images/icons/person-plus.svg' alt=''><span>Đăng ký</span></a></li>
        ";
    }
}
?>

<div class="sidebar">
    <!-- Header Logo & Tên trung tâm -->
    <div class="header">
        <img src="<?php echo BASE_ASSETS; ?>/images/icons/IconCTUMedic.png" alt="CTUMedic Logo">
        <div class="text">
            <p class="title">Trung tâm Sức khoẻ</p>
            <p class="sub-title">Đại học Cần Thơ</p>
        </div>
    </div>

    <!-- Content / Chào mừng & Nav Menu -->
    <div class="content">
        <h2>Chào, <?php echo $userName; ?></h2>
        <nav>
            <ul>
                <?php echo navigation($role); ?>
            </ul>
        </nav>
    </div>

    <!-- Footer Sidebar -->
    <div class="footer">
        <p>&copy; 2026. Đại học Cần Thơ</p>
    </div>
</div>
<?php
// Tentukan base URL aplikasi secara otomatis
$base_url = '/ikn-mobility/admin/';
$current_uri = $_SERVER['REQUEST_URI'];
?>
<style>
    .sidebar-wrapper {
        width: 260px;
        min-width: 260px;
        background-color: #1b4327;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 100vh;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
    }
    
    .sidebar-brand {
        padding: 15px 20px;
    }

    .sidebar-menu {
        list-style: none;
        padding: 16px 12px;
        margin: 0;
    }

    .sidebar-menu li {
        margin-bottom: 4px;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 16px;
        color: #d1d5db;
        text-decoration: none;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.2s ease;
        position: relative;
    }

    .sidebar-link:hover {
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.08);
    }

    .sidebar-link.active {
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.18);
        font-weight: 600;
    }

    .sidebar-link.active::before {
        content: "";
        position: absolute;
        left: 0;
        top: 6px;
        bottom: 6px;
        width: 4px;
        background-color: #ffffff;
        border-radius: 0 4px 4px 0;
    }

    .sidebar-icon {
        width: 20px;
        text-align: center;
        font-size: 1rem;
    }

    .sidebar-footer {
        padding: 16px 12px 24px 12px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
</style>

<aside class="sidebar-wrapper">
    <div>
        <!-- Logo / Brand Header -->
        <div class="sidebar-brand d-flex align-items-center gap-3">
            <!-- Logo / Brand Header -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
            <img src="/ikn-mobility/assets/images/logo/04%20Otorita%20Ibu%20Kota%20Nusantara-05-HorizontalColorDiapositive.png" 
                alt="Otorita Ibu Kota Nusantara" 
                style="max-width: 100%; height: auto; max-height: 48px;">
            </div>
        </div>

        <!-- Menu Navigation -->
        <ul class="sidebar-menu">
            <li>
                <a href="<?= $base_url ?>dashboard.php" 
                   class="sidebar-link <?= (strpos($current_uri, 'dashboard.php') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-border-all sidebar-icon"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>beranda/index.php" 
                   class="sidebar-link <?= (strpos($current_uri, '/beranda/') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-location-dot sidebar-icon"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>antarkota/index.php" 
                   class="sidebar-link <?= (strpos($current_uri, '/antarkota/') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-bus sidebar-icon"></i>
                    <span>Layanan Antarkota</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>intrakota/index.php" 
                   class="sidebar-link <?= (strpos($current_uri, '/intrakota/') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-car-side sidebar-icon"></i>
                    <span>Layanan Intrakota</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>aktivitas/index.php" 
                   class="sidebar-link <?= (strpos($current_uri, '/aktivitas/') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-clock-rotate-left sidebar-icon"></i>
                    <span>Aktivitas</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>tentang/index.php" 
                   class="sidebar-link <?= (strpos($current_uri, '/tentang/') !== false) ? 'active' : '' ?>">
                    <i class="fa-regular fa-circle-question sidebar-icon"></i>
                    <span>Tentang</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Bottom Footer / Logout -->
    <div class="sidebar-footer">
        <a href="<?= $base_url ?>logout.php" class="sidebar-link text-white-50">
            <i class="fa-solid fa-right-from-bracket sidebar-icon"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>
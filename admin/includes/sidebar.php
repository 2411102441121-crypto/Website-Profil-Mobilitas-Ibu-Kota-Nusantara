<?php
// Tentukan base URL aplikasi secara otomatis
$base_url = '/ikn-mobility/admin/';
$current_uri = $_SERVER['REQUEST_URI'];
?>
<style>
    /* Reset khusus area sidebar agar tidak terpengaruh CSS Halaman/Framework */
    .ikn-sidebar-wrapper,
    .ikn-sidebar-wrapper * {
        box-sizing: border-box !important;
        margin: 0;
        padding: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
    }

    .ikn-sidebar-wrapper {
        position: fixed !important; /* Mengunci posisi sidebar di layar */
        top: 0 !important;
        left: 0 !important;
        bottom: 0 !important;
        width: 260px !important;
        min-width: 260px !important;
        max-width: 260px !important;
        height: 100vh !important; /* Memenuhi tinggi layar */
        background-color: #1b4327 !important;
        color: #ffffff !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: space-between !important;
        z-index: 9999 !important; /* Memastikan di atas elemen lain */
        overflow-y: auto !important; /* Mencegah terpotong jika layar pendek */
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05) !important;
    }
    
    .ikn-sidebar-brand {
        padding: 20px 16px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .ikn-sidebar-brand img {
        max-width: 100% !important;
        height: auto !important;
        max-height: 48px !important;
        display: block !important;
    }

    .ikn-sidebar-menu {
        list-style: none !important;
        padding: 8px 12px !important;
        margin: 0 !important;
    }

    .ikn-sidebar-menu li {
        margin-bottom: 4px !important;
        list-style: none !important;
    }

    .ikn-sidebar-link {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        height: 44px !important;
        padding: 0 16px !important;
        color: #d1d5db !important;
        text-decoration: none !important;
        font-size: 14px !important;
        line-height: 1 !important;
        font-weight: 500 !important;
        border-radius: 8px !important;
        transition: background-color 0.2s ease, color 0.2s ease !important;
        position: relative !important;
    }

    .ikn-sidebar-link:hover {
        color: #ffffff !important;
        background-color: rgba(255, 255, 255, 0.08) !important;
        text-decoration: none !important;
    }

    .ikn-sidebar-link.active {
        color: #ffffff !important;
        background-color: rgba(255, 255, 255, 0.18) !important;
        font-weight: 600 !important;
    }

    /* Indikator Aktif (Garis Putih Kiri) */
    .ikn-sidebar-link.active::before {
        content: "" !important;
        position: absolute !important;
        left: 0 !important;
        top: 8px !important;
        bottom: 8px !important;
        width: 4px !important;
        background-color: #ffffff !important;
        border-radius: 0 4px 4px 0 !important;
    }

    .ikn-sidebar-icon {
        width: 20px !important;
        height: 20px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 16px !important;
        flex-shrink: 0 !important;
    }

    .ikn-sidebar-footer {
        padding: 16px 12px 24px 12px !important;
        border-top: 1px solid rgba(255, 255, 255, 0.1) !important;
    }
</style>

<aside class="ikn-sidebar-wrapper">
    <div>
        <div class="ikn-sidebar-brand">
            <img src="/ikn-mobility/assets/images/logo/04%20Otorita%20Ibu%20Kota%20Nusantara-05-HorizontalColorDiapositive.png" 
                 alt="Otorita Ibu Kota Nusantara">
        </div>

        <ul class="ikn-sidebar-menu">
            <li>
                <a href="<?= $base_url ?>dashboard.php" 
                   class="ikn-sidebar-link <?= (strpos($current_uri, 'dashboard.php') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-border-all ikn-sidebar-icon"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>beranda/index.php" 
                   class="ikn-sidebar-link <?= (strpos($current_uri, '/beranda/') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-location-dot ikn-sidebar-icon"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>antarkota/index.php" 
                   class="ikn-sidebar-link <?= (strpos($current_uri, '/antarkota/') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-bus ikn-sidebar-icon"></i>
                    <span>Layanan Antarkota</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>intrakota/index.php" 
                   class="ikn-sidebar-link <?= (strpos($current_uri, '/intrakota/') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-car-side ikn-sidebar-icon"></i>
                    <span>Layanan Intrakota</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>aktivitas/index.php" 
                   class="ikn-sidebar-link <?= (strpos($current_uri, '/aktivitas/') !== false) ? 'active' : '' ?>">
                    <i class="fa-solid fa-clock-rotate-left ikn-sidebar-icon"></i>
                    <span>Aktivitas</span>
                </a>
            </li>
            <li>
                <a href="<?= $base_url ?>tentang/index.php" 
                   class="ikn-sidebar-link <?= (strpos($current_uri, '/tentang/') !== false) ? 'active' : '' ?>">
                    <i class="fa-regular fa-circle-question ikn-sidebar-icon"></i>
                    <span>Tentang</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="ikn-sidebar-footer">
        <a href="<?= $base_url ?>logout.php" class="ikn-sidebar-link">
            <i class="fa-solid fa-right-from-bracket ikn-sidebar-icon"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>
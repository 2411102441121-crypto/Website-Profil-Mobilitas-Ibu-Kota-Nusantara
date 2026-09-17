<?php
// includes/base.php
if (!isset($title)) {
    $title = "Profil Mobilitas Ibu Kota Nusantara";
}

// Deteksi nama file halaman aktif untuk menyalakan garis active di navbar
$current_page = basename($_SERVER['PHP_SELF']);

// Tentukan root URL aplikasi agar link & gambar tidak pernah 404
$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/ikn-mobility/";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title); ?></title>
    
    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS UTAMA WEBSITE -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/style.css?v=1">

    <!-- CSS KHUSUS HALAMAN AKTIVITAS -->
    <?php
    switch ($current_page) {

        /* =========================
        HALAMAN AKTIVITAS UTAMA
        CSS-nya ada di style.css
        ========================= */
        case 'aktivitas.php':
            break;


        /* =========================
        AKTIVITAS MASYARAKAT
        ========================= */
        case 'aktivitas-masyarakat.php':
            echo '<link rel="stylesheet" href="' . $base_url . 'assets/css/aktivitas-masyarakat.css">';
            break;


        /* =========================
        AKTIVITAS OLAHRAGA
        Nama file di project:
        aktivitas-olaraga.php
        ========================= */
        case 'aktivitas-olaraga.php':
            echo '<link rel="stylesheet" href="' . $base_url . 'assets/css/aktivitas-olahraga.css">';
            break;


        /* =========================
        AKTIVITAS PEMBANGUNAN
        ========================= */
        case 'aktivitas-pembangunan.php':
            echo '<link rel="stylesheet" href="' . $base_url . 'assets/css/aktivitas-pembangunan.css">';
            break;


        /* =========================
        AKTIVITAS TRANSPORTASI
        ========================= */
        case 'aktivitas-transportasi.php':
            echo '<link rel="stylesheet" href="' . $base_url . 'assets/css/aktivitas-transportasi.css">';
            break;
        
        /* =========================
        LAYANAN INTRAKOTA
        ========================= */
        case 'intrakota.php':
            echo '<link rel="stylesheet" href="' . $base_url . 'assets/css/intrakota.css?v=2">';
            break;
    }
    ?>
    
    <style>
    /* 1. REGISTRASI SELURUH FONT SUTASOMA (DISPLAY & TEXT) */
    
    /* --- SUTASOMA DISPLAY (Untuk Judul & Header) --- */
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-ExtraLight.ttf') format('truetype');
        font-weight: 200; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-ExtraLightItalic.ttf') format('truetype');
        font-weight: 200; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-Light.ttf') format('truetype');
        font-weight: 300; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-LightItalic.ttf') format('truetype');
        font-weight: 300; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-Regular.ttf') format('truetype');
        font-weight: 400; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-Italic.ttf') format('truetype');
        font-weight: 400; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-Medium.ttf') format('truetype');
        font-weight: 500; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-MediumItalic.ttf') format('truetype');
        font-weight: 500; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-SemiBold.ttf') format('truetype');
        font-weight: 600; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-SemiBoldItalic.ttf') format('truetype');
        font-weight: 600; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-Bold.ttf') format('truetype');
        font-weight: 700; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-BoldItalic.ttf') format('truetype');
        font-weight: 700; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-ExtraBold.ttf') format('truetype');
        font-weight: 800; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Display';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaDisplay-ExtraBoldItalic.ttf') format('truetype');
        font-weight: 800; font-style: italic;
    }

    /* --- SUTASOMA TEXT (Untuk Body, Navigasi, & Paragraf) --- */
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-ExtraLight.ttf') format('truetype');
        font-weight: 200; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-ExtraLightItalic.ttf') format('truetype');
        font-weight: 200; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-Light.ttf') format('truetype');
        font-weight: 300; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-LightItalic.ttf') format('truetype');
        font-weight: 300; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-Regular.ttf') format('truetype');
        font-weight: 400; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-Italic.ttf') format('truetype');
        font-weight: 400; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-Medium.ttf') format('truetype');
        font-weight: 500; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-MediumItalic.ttf') format('truetype');
        font-weight: 500; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-SemiBold.ttf') format('truetype');
        font-weight: 600; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-SemiBoldItalic.ttf') format('truetype');
        font-weight: 600; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-Bold.ttf') format('truetype');
        font-weight: 700; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-BoldItalic.ttf') format('truetype');
        font-weight: 700; font-style: italic;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-ExtraBold.ttf') format('truetype');
        font-weight: 800; font-style: normal;
    }
    @font-face {
        font-family: 'Sutasoma Text';
        src: url('<?= $base_url; ?>assets/fonts/ttf/SutasomaText-ExtraBoldItalic.ttf') format('truetype');
        font-weight: 800; font-style: italic;
    }

    :root {
        --ikn-green-dark: #204420;
        --ikn-green-card: #204420;
        --ikn-green-brand: #2e6e2e;
    }

    /* 2. TERAPKAN FONT KE SELURUH ELEMEN WEBSITE */
    body {
        font-family: 'Sutasoma Text', sans-serif;
        color: #333;
        background-color: #fdfdfd;
    }

    /* Khusus Judul/Header Menggunakan Sutasoma Display */
    h1, h2, h3, h4, h5, h6, .hero-title, .brand-title {
        font-family: 'Sutasoma Display', sans-serif !important;
    }

        /* 1. KONDISI AWAL (POSISI PALING ATAS): Background Putih Solid */
        .custom-navbar {
            background-color: #ffffff !important; /* Putih Solid */
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04) !important;
            transition: all 0.3s ease-in-out;
        }

        /* Navigasi Atas */
        .custom-navbar .nav-link { 
            color: #434654; 
            font-weight: 600; 
            font-size: 0.85rem;
            margin: 0 8px; 
            padding-bottom: 6px !important;
            border-bottom: 2px solid transparent !important; /* Ruang agar tidak terdorong saat active */
            transition: all 0.2s ease;
        }

        .custom-navbar .nav-link.active { 
            font-weight: 600; 
            color: #204420 !important; 
            border-bottom: 2px solid #204420 !important; /* Garis bawah aktif */
        }

        /* 2. KONDISI KETIKA DI-SCROLL KE BAWAH: Berubah Menjadi Transparan */
        .custom-navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.45) !important; /* Transparan */
            backdrop-filter: blur(16px) saturate(180%) !important;
            -webkit-backdrop-filter: blur(16px) saturate(180%) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3) !important;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.08) !important;
        }

        .navbar-logo {
            height: 40px;
            width: auto;
            object-fit: contain;
        }

        /* Navigasi Atas */
        .nav-link { 
            color: #434654; 
            font-weight: 600; 
            font-size: 0.85rem;
            margin: 0 8px; 
            transition: color 0.2s ease;
        }

        .nav-link.active { 
            font-weight: 600; 
            color: #204420 !important; 
            border-bottom: 2px solid #204420; 
        }

        .brand-title { 
            color: #204420; 
            font-weight: 700; 
            letter-spacing: -0.2px; 
        }

        /* Tombol Admin */
        /* .btn-admin {
            background-color: var(--ikn-green-dark);
            color: #fff !important;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background-color 0.2s ease;
        } */
        
        /* .btn-admin:hover {
            background-color: #317531;
        } */

        /* Styling Tombol Aksi Kanan Navbar (Pencarian & Bahasa) */
        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Tombol Ikon Pencarian */
        .btn-search-trigger {
            background: transparent;
            border: none;
            color: #204420;
            font-size: 1rem;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 50%;
            transition: background 0.2s, color 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-search-trigger:hover {
            background: #eaf3ed;
            color: #10321a;
        }

        /* Mencegah halaman bergeser ke kiri saat Modal Pencarian terbuka */
        body.modal-open {
            overflow: auto !important;
            padding-right: 0 !important;
        }

        .modal-backdrop {
            width: 100vw;
            height: 100vh;
        }

        /* Garis Pemisah Vertikal (|) */
        .nav-divider {
            width: 1px;
            height: 18px;
            background-color: #d0d7d1;
            display: inline-block;
        }

        /* Pengalih Bahasa (ID / EN) */
        .lang-switcher {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #204420;
            font-size: 0.82rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            padding: 4px 6px;
            border-radius: 6px;
            transition: background 0.2s;
        }

        .lang-switcher:hover {
            background: #eaf3ed;
            color: #204420;
        }

        .lang-switcher .lang-active {
            color: #204420;
        }

        .lang-switcher .lang-inactive {
            color: #88998c;
        }

        /* Custom Dropdown Switcher Bahasa */
        .btn-lang-dropdown {
            background: transparent;
            border: none;
            color: #204420;
            font-size: 0.85rem;
            font-weight: 700;
            padding: 4px 8px;
            border-radius: 6px;
            transition: background 0.2s;
        }

        .btn-lang-dropdown:hover, 
        .btn-lang-dropdown:focus {
            background: #eaf3ed;
            color: #204420;
        }

        .btn-lang-dropdown::after {
            margin-left: 4px;
            font-size: 0.75rem;
        }

        /* Container Menu Dropdown */
        .lang-dropdown .dropdown-menu {
            background-color: #ffffff;
            border: 1px solid #ebedf0 !important;
            border-radius: 12px;
            min-width: 180px;
        }

        /* Item Pilihan Bahasa */
        .lang-dropdown .dropdown-item {
            font-size: 0.85rem;
            font-weight: 600;
            color: #333333;
            padding: 8px 12px;
            transition: all 0.2s ease;
        }

        .lang-dropdown .dropdown-item:hover {
            background-color: #f4f7f5;
            color: #204420;
        }

        /* State Aktif (Terpilih) */
        .lang-dropdown .dropdown-item.active {
            background-color: #E8F2EE !important; /* Warna hijau pastel IKN */
            color: #204420 !important;
            font-weight: 700;
        }

        .lang-dropdown .check-icon {
            font-size: 0.8rem;
            color: #204420;
        }

       /* Paksa Sembunyikan Semua Elemen Topbar Google Translate */
        .goog-te-banner-frame, 
        .goog-te-banner,
        .goog-te-balloon-frame,
        #goog-gt-tt,
        .goog-te-spinner-pos {
            display: none !important;
            visibility: hidden !important;
        }

        /* Kunci Posisi HTML dan Body Agar Tidak Boleh Terdorong */
        html {
            margin-top: 0px !important;
            padding-top: 0px !important;
        }

        body {
            top: 0px !important;
            position: static !important;
            margin-top: 0px !important;
        }

        /* Sembunyikan Garis/Highlight Teks Bawaan Google */
        .goog-text-highlight {
            background-color: transparent !important;
            box-shadow: none !important;
        }

        /* Hero Section */
        .hero-section {
            background-color: #4a524d;
            background-image: linear-gradient(rgba(106, 106, 106, 0.65), rgba(106, 106, 106, 0.65)), url('<?= $base_url; ?>assets/images/logo/IKN_Nusantara_AuliaAkbar-04.png');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            color: #fff;
            padding: 120px 0 60px;
        }
        
        .hero-title { font-size: 2.8rem; font-weight: 700; line-height: 1.2; }
        .hero-subtitle { font-size: 0.95rem; opacity: 0.9; max-width: 800px; line-height: 1.6; }
        
        .btn-hero {
            background-color: var(--ikn-green-dark);
            color: #fff;
            border-radius: 8px;
            padding: 10px 24px;
            border: none;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-block;
        }
        .btn-hero-active { background-color: #ffffff; color: #111; font-weight: 600; }

        /* Stats Cards */
        .stats-card {
            background-color: var(--ikn-green-card);
            color: #fff;
            border-radius: 12px;
            padding: 24px;
            height: 100%;
        }
        .stats-number { font-size: 2.2rem; font-weight: 700; margin-bottom: 8px; }
        .stats-desc { font-size: 0.85rem; opacity: 0.85; line-height: 1.4; }

        /* Prinsip Cards */
        .prinsip-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
            height: 100%;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        }
        .prinsip-card img { height: 200px; object-fit: cover; width: 100%; background-color: #eee; }

        /* Banner Dokumen */
        .dark-banner {
            background-color: var(--ikn-green-dark);
            color: #fff;
            border-radius: 16px;
            padding: 40px;
        }

        /* FAQ Accordion */
        .accordion-button:not(.collapsed) {
            background-color: transparent;
            color: var(--ikn-green-dark);
            box-shadow: none;
        }
        .accordion-item { border-radius: 8px !important; margin-bottom: 12px; border: 1px solid #ddd; }

        footer { background-color: #111; color: #aaa; font-size: 0.85rem; }
    </style>
</head>
<body>

    <!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top custom-navbar py-2">
    <div class="container">
        <!-- 1. LOGO IKN (Pojok Kiri) -->
        <a class="navbar-brand d-flex align-items-center me-4" href="<?= $base_url; ?>beranda.php">
            <img src="<?= $base_url; ?>assets/images/logo/04 Otorita Ibu Kota Nusantara-04-HorizontalColorPositive (1).png" alt="Logo IKN" class="navbar-logo">
        </a>

        <!-- Tombol Toggler Mobil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Container Isi Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- 2. MENU NAVIGASI (Didekatkan ke sebelah kiri setelah Logo) -->
            <ul class="navbar-nav my-2 my-lg-0 mx-auto">
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'beranda.php' || $current_page == 'index.php') ? 'active' : ''; ?>" href="<?= $base_url; ?>beranda.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos($current_page, 'antarkota') !== false) ? 'active' : ''; ?>" href="<?= $base_url; ?>pages/antarkota.php">Layanan Antarkota</a>
                </li>
               <li class="nav-item">
                    <a class="nav-link <?= (strpos($current_page, 'intrakota') !== false || (isset($parent_page) && $parent_page == 'intrakota')) ? 'active' : ''; ?>" href="<?= $base_url; ?>pages/intrakota.php">Layanan Intrakota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'peta.php') ? 'active' : ''; ?>" href="<?= $base_url; ?>pages/peta.php"> Peta</a>

                <li class="nav-item">
                    <a class="nav-link <?= (strpos($current_page, 'aktivitas') !== false) ? 'active' : ''; ?>" href="<?= $base_url; ?>pages/aktivitas.php">Aktivitas</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'tentang.php') ? 'active' : ''; ?>" href="<?= $base_url; ?>pages/tentang.php">Tentang</a>
                </li>
            </ul>

            <!-- 3. JUDUL & LOGIN -->
            <div class="d-flex align-items-center gap-3 ms-auto mt-2 mt-lg-0">
                <!-- Judul Brand -->
                <span class="brand-title fs-5 fw-bold mb-0 me-2">Profil Mobilitas IKN</span>
                
                <!-- Tombol Pencarian & ID/EN -->
                <div class="navbar-actions">
                    <!-- Tombol Pencarian -->
                    <button type="button" class="btn-search-trigger" data-bs-toggle="modal" data-bs-target="#searchModal" title="Cari">
                        <i class="fas fa-search"></i>
                    </button>

                    <span class="nav-divider"></span>

                    <!-- Tombol Switcher Bahasa Otomatis -->
                    <div class="dropdown lang-dropdown">
                        <button class="btn btn-lang-dropdown dropdown-toggle d-flex align-items-center gap-1" type="button" id="dropdownLang" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-globe me-1"></i>
                            <span id="currentLangText">ID</span>
                        </button>
                        
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 p-2" aria-labelledby="dropdownLang">
                            <li>
                                <button class="dropdown-item d-flex align-items-center gap-2 rounded active" id="btn-lang-id" onclick="selectLanguage('id', 'Bahasa Indonesia')">
                                    <i class="fas fa-check check-icon"></i>
                                    <span>Bahasa Indonesia</span>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center gap-2 rounded" id="btn-lang-en" onclick="selectLanguage('en', 'English (English)')">
                                    <i class="fas fa-check check-icon opacity-0"></i>
                                    <span>English (English)</span>
                                </button>
                            </li>
                        </ul>
                    </div>

                    <!-- Element Tersembunyi Mesin Google Translate -->
                    <div id="google_translate_element" style="display:none;"></div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Pop-Up Form Pencarian -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
            <div class="modal-body p-4">
                <form action="<?= $base_url; ?>pages/search.php" method="GET">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-white border-end-0 text-success" style="border-radius: 12px 0 0 12px;">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" name="q" class="form-control border-start-0 shadow-none" placeholder="Telusuri Profil Mobilitas Ibu Kota Nusantara" autofocus style="border-radius: 0 12px 12px 0; font-size: 1rem;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- KONTEN UTAMA DARI PANGGILAN OB_START -->
    <main style="padding-top: 70px;">
        <?= $content ?? ''; ?>
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white-50 py-5">
        <div class="container">
            <div class="row g-4 justify-content-between align-items-start">
                <!-- Col 1: Logo, Deskripsi, Social Media Circles -->
                <div class="col-lg-3 col-md-6">
                    <!-- DITAMBAHKAN $base_url DI SINI AGAR GAMBAR TIDAK HILANG -->
                    <img src="<?= $base_url; ?>assets/images/logo/04 Otorita Ibu Kota Nusantara-05-HorizontalColorDiapositive.png" alt="Logo IKN" class="mb-3" style="height: 52px; width: auto;">
                    <p class="text-white-50 mb-4" style="font-size: 0.9rem; line-height: 1.5;">
                        Mendorong transformasi mobilitas cerdas menuju kota yang berkelanjutan, terintegrasi, dan berorientasi pada masyarakat.
                    </p>
                    <!-- Social Media Buttons -->
                    <div class="d-flex gap-2">
                        <a href="https://ikn.go.id/" class="btn btn-secondary rounded-circle p-0 d-flex align-items-center justify-content-center text-white" style="width: 38px; height: 38px; background-color: #2b3035; border: none;"><i class="fas fa-globe fs-6"></i></a>
                        <a href="https://www.instagram.com/ikn_id/" class="btn btn-secondary rounded-circle p-0 d-flex align-items-center justify-content-center text-white" style="width: 38px; height: 38px; background-color: #2b3035; border: none;"><i class="fab fa-instagram fs-6"></i></a>
                        <a href="https://www.youtube.com/@iknindonesia4397" class="btn btn-secondary rounded-circle p-0 d-flex align-items-center justify-content-center text-white" style="width: 38px; height: 38px; background-color: #2b3035; border: none;"><i class="fab fa-youtube fs-6"></i></a>
                        <a href="https://www.facebook.com/iknindonesia1" class="btn btn-secondary rounded-circle p-0 d-flex align-items-center justify-content-center text-white" style="width: 38px; height: 38px; background-color: #2b3035; border: none;"><i class="fab fa-facebook-f fs-6"></i></a>
                        <a href="https://x.com/ikn_id" class="btn btn-secondary rounded-circle p-0 d-flex align-items-center justify-content-center text-white" style="width: 38px; height: 38px; background-color: #2b3035; border: none;"><i class="fab fa-x-twitter fs-6"></i></a>
                    </div>
                </div>

                <!-- Col 2: Navigasi (DITAMBAHKAN BERANDA & BASE_URL) -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="text-white fw-bold mb-4" style="letter-spacing: 0.8px; font-size: 0.95rem;">NAVIGASI</h6>
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0" style="font-size: 0.9rem;">
                        <?php if ($current_page != 'beranda.php' && $current_page != 'index.php'): ?>
                            <li><a href="<?= $base_url; ?>beranda.php" class="text-white-50 text-decoration-none">Beranda</a></li>
                        <?php endif; ?>

                        <?php if (strpos($current_page, 'antarkota') === false): ?>
                            <li><a href="<?= $base_url; ?>pages/antarkota.php" class="text-white-50 text-decoration-none">Layanan Antarkota</a></li>
                        <?php endif; ?>
                        
                        <?php if (strpos($current_page, 'intrakota') === false && (!isset($parent_page) || $parent_page != 'intrakota')): ?>
                            <li><a href="<?= $base_url; ?>pages/intrakota.php" class="text-white-50 text-decoration-none">Layanan Intrakota</a></li>
                        <?php endif; ?>

                        <?php if ($current_page != 'peta.php'): ?>
                            <li><a href="<?= $base_url; ?>pages/peta.php" class="text-white-50 text-decoration-none">Peta</a></li>
                        <?php endif; ?>

                        <?php if ($current_page != 'aktivitas.php'): ?>
                            <li><a href="<?= $base_url; ?>pages/aktivitas.php" class="text-white-50 text-decoration-none">Aktivitas</a></li>
                        <?php endif; ?>

                        <?php if ($current_page != 'tentang.php'): ?>
                            <li><a href="<?= $base_url; ?>pages/tentang.php" class="text-white-50 text-decoration-none">Tentang</a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Col 3: Kontak -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-bold mb-4" style="letter-spacing: 0.8px; font-size: 0.95rem;">KONTAK</h6>
                    <div class="d-flex flex-column gap-3" style="font-size: 0.9rem;">
                        <p class="text-white-50 mb-0">+62 21 27099100 (Office)</p>
                        <p class="text-white-50 mb-0">investasi@ikn.go.id</p>
                        <p class="text-white-50 mb-0">sekretariat@ikn.go.id</p>
                    </div>
                </div>

                <!-- Col 4: Lokasi Kantor OIKN -->
                <div class="col-lg-4 col-md-6">
                    <h6 class="mb-3" style="color: #C59D63; font-size: 0.95rem; font-family: 'Sutasoma Text', sans-serif; font-weight: 700;">
                        Gedung Kantor Otorita IKN - Balai Kota
                    </h6>
                    <p class="mb-3" style="font-size: 0.9rem; line-height: 1.4;">
                        <strong class="text-white d-block mb-1" style="font-family: 'Sutasoma Text', sans-serif; font-weight: 500;">
                            Kawasan Inti Pusat Pemerintahan
                        </strong>
                        <span class="text-white-50" style="font-family: 'Sutasoma Text', sans-serif; font-weight: 400;">
                            Nusantara, Kalimantan, Indonesia
                        </span>
                    </p>

                    <h6 class="mb-3" style="color: #C59D63; font-size: 0.95rem; font-family: 'Sutasoma Text', sans-serif; font-weight: 700;">
                        Otorita Ibu Kota Nusantara - Jakarta
                    </h6>
                    <p class="mb-0" style="font-size: 0.9rem; line-height: 1.4;">
                        <strong class="text-white d-block mb-1" style="font-family: 'Sutasoma Text', sans-serif; font-weight: 500;">
                            Menara Mandiri II Lantai 5
                        </strong>
                        <span class="text-white-50" style="font-family: 'Sutasoma Text', sans-serif; font-weight: 400;">
                            Jalan Jenderal Sudirman Kav 54-55, Senayan<br>Jakarta Selatan 12190
                        </span>
                    </p>
                </div>
            </div>

            <!-- Garis Tipis & Copyright -->
            <div class="border-top border-secondary border-opacity-25 mt-5 pt-4 text-center text-white-50" style="font-size: 0.85rem;">
                © 2026 Otorita Ibu Kota Nusantara (OIKN). Kota Dunia untuk Semua.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Deteksi Scroll untuk Efek Navbar Transparan saat ke bawah
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.custom-navbar');
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    <!-- Container Tersembunyi Google Translate -->
<div id="google_translate_element" style="display:none;"></div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'id',
            includedLanguages: 'en,id',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }

    // 1. FUNGSI UNTUK MEMBACA COOKIE BROWSER
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length === 2) return parts.pop().split(";").shift();
        return "";
    }

    // 2. FUNGSI UTAMA PENGUBAH TAMPILAN UI DROPDOWN
    function updateDropdownUI(langCode) {
        // Change text ID / EN on Header Button
        var langTextEl = document.getElementById('currentLangText');
        if (langTextEl) {
            langTextEl.innerText = langCode.toUpperCase();
        }

        // Reset state active pada dropdown
        document.querySelectorAll('.lang-dropdown .dropdown-item').forEach(function(item) {
            item.classList.remove('active');
            var check = item.querySelector('.check-icon');
            if (check) check.classList.add('opacity-0');
        });

        // Set state active untuk bahasa terpilih
        var activeBtn = document.getElementById('btn-lang-' + langCode);
        if (activeBtn) {
            activeBtn.classList.add('active');
            var activeCheck = activeBtn.querySelector('.check-icon');
            if (activeCheck) activeCheck.classList.remove('opacity-0');
        }
    }

    // 3. FUNGSI PENGUBAH BAHASA VIA DROPDOWN (PILIHAN USER)
    function selectLanguage(langCode, labelText) {
        // Set Cookie Google Translate
        document.cookie = "googtrans=/id/" + langCode + "; path=/;";
        document.cookie = "googtrans=/id/" + langCode + "; domain=" + window.location.hostname + "; path=/;";

        // Trigger Google Translate
        var selectEl = document.querySelector('.goog-te-combo');
        if (selectEl) {
            selectEl.value = langCode;
            selectEl.dispatchEvent(new Event('change'));
        } else {
            window.location.reload();
        }

        updateDropdownUI(langCode);
    }

    // 4. OTOMATIS SINKRONKAN UI SAAT HALAMAN SELESAI DIMUAT
    document.addEventListener("DOMContentLoaded", function() {
        var cookieVal = getCookie("googtrans");
        var activeLang = "id"; // Default bahasa awal

        // Jika cookie mendeteksi mode bahasa inggris (/en)
        if (cookieVal && cookieVal.indexOf("/en") !== -1) {
            activeLang = "en";
        }

        updateDropdownUI(activeLang);
    });
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<style>
    /* Sembunyikan Frame Banner Topbar Bawaan Google Translate */
    .goog-te-banner-frame,
    .goog-te-banner,
    .goog-te-balloon-frame,
    #goog-gt-tt,
    .goog-te-spinner-pos,
    .skiptranslate {
        display: none !important;
        visibility: hidden !important;
    }

    /* Kembalikan Posisi Body ke Paling Atas Tanpa Banner */
    body {
        top: 0px !important;
        position: static !important;
    }

    /* Hilangkan Highlight Garis/Warna Teks dari Google */
    .goog-text-highlight {
        background-color: transparent !important;
        box-shadow: none !important;
        border: none !important;
    }
</style>
</body>
</html>
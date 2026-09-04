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
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/style.css">

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
            echo '<link rel="stylesheet" href="' . $base_url . 'assets/css/intrakota.css">';
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
        .btn-admin {
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
        }
        
        .btn-admin:hover {
            background-color: #317531;
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
                    <a class="nav-link <?= ($current_page == 'intrakota.php') ? 'active' : ''; ?>" href="<?= $base_url; ?>pages/intrakota.php">Layanan Intrakota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos($current_page, 'aktivitas') !== false) ? 'active' : ''; ?>" href="<?= $base_url; ?>pages/aktivitas.php">Aktivitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'tentang.php') ? 'active' : ''; ?>" href="<?= $base_url; ?>pages/tentang.php">Tentang</a>
                </li>
            </ul>

            <!-- 3. JUDUL & LOGIN -->
            <div class="d-flex align-items-center gap-3 ms-auto mt-2 mt-lg-0">
                <span class="brand-title fs-4 fw-bold mb-0">Profil Mobilitas IKN</span>
                <a href="<?= $base_url; ?>admin/login.php" class="btn-admin">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                    </svg> Login
                </a>
            </div>
        </div>
    </div>
</nav>

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
                        
                        <?php if ($current_page != 'intrakota.php'): ?>
                            <li><a href="<?= $base_url; ?>pages/intrakota.php" class="text-white-50 text-decoration-none">Layanan Intrakota</a></li>
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
</body>
</html>
<?php
// pages/antarkota.php
$title = "Layanan Antarkota - Profil Mobilitas IKN";

// 1. KONEKSI KE DATABASE (DENGAN PENANGANAN ERROR)
require_once '../config/database.php';

// Cek variabel koneksi (menyesuaikan nama $conn atau $koneksi dari database.php)
if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}

// Tentukan Base URL
$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/ikn-mobility/";

// 2. QUERY DATABASE DENGAN PENGECEKAN AMAN
$result_layanan = false;
if (isset($conn) && $conn) {
    $query_layanan = "SELECT * FROM antarkota_layanan ORDER BY id ASC";
    $result_layanan = @mysqli_query($conn, $query_layanan);
}

// Buffer Konten Utama
ob_start();
?>

<style>

    /* 1. Kunci lebar scrollbar browser agar stabil */
    html {
        scrollbar-gutter: stable !important;
    }

    /* 2. Mencegah seluruh halaman meluap ke samping */
    html, body {
        margin: 0 !important;
        padding: 0 !important;
        background-color: #f8f9fa !important;
        max-width: 100% !important;
        overflow-x: hidden !important;
    }

    /* 3. Mencegah pendorong bawaan Bootstrap saat modal terbuka tanpa merusak layout navbar */
    body.modal-open {
        padding-right: 0px !important;
        margin-right: 0px !important;
    }

    /* 4. Menetralkan margin negatif bawaan .row Bootstrap */
    .row {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    /* 6. Pembungkus konten utama */
    main, .main-content, .content, #content {
        padding-top: 0 !important;
        margin-top: 0 !important;
        background-color: #f8f9fa !important;
    }


    /* HERO BANNER HIJAU TUA */
    .hero-antarkota {
        background-color: #204420; /* Hijau Tua IKN */
        color: #ffffff;
        
        /* UBAH PADDING ATAS & BAWAH JADI SAMA AGAR KONTEN TURUN KE TENGAH PRESISI */
        padding-top: 180px; 
        padding-bottom: 180px;
        margin-top: 0;
        width: 100%;
        display: flex;
        align-items: center; /* Meratakan elemen secara vertikal */
    }

    .hero-antarkota h1 {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 55px; /* Ukuran font diperbesar */
        font-weight: 700;
        line-height: 1.15;
        margin-bottom: 24px;
    }

    .hero-antarkota p {
        font-family: 'Sutasoma Text', sans-serif;
        font-size: 16px;
        font-weight: 400;
        line-height: 1.7;
        opacity: 0.92;
        margin-bottom: 35px;
    }

    /* UKURAN GAMBAR DAN FRAME DIPERBESAR */
    .hero-frame-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
        max-width: 650px; /* Ukuran frame diperbesar */
    }

    /* Bingkai Belakang (Efek Bayangan Hijau Muda) */
    .hero-frame-wrapper::before {
        content: '';
        position: absolute;
        top: 18px;
        left: -18px;
        right: 18px;
        bottom: -18px;
        background-color: #8AAF6A; /* Warna Hijau Bawaan Frame Belakang */
        border-radius: 28px;
        z-index: 1;
    }

    /* Bingkai Utama / Frame Depan */
    .hero-img-box {
        position: relative;
        z-index: 2;
        background-color: #204420;
        border: 2px solid #557548;
        border-radius: 26px;
        padding: 12px;
        box-shadow: 0 12px 30px rgba(0,0,0,0.25);
    }

    .hero-img-box img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 18px;
        display: block;
    }

    /* TOMBOL HERO SECTION */
    .btn-hero-white {
        background-color: #ffffff;
        color: #204420;
        font-family: 'Sutasoma Display', sans-serif;
        font-weight: 600;
        font-size: 14px;
        border-radius: 12px;
        padding: 12px 28px;
        text-decoration: none;
        transition: all 0.25 ease;
        display: inline-block;
    }
    .btn-hero-white:hover {
        background-color: #8AAF6A;
        color: #204420;
        transform: translateY(-2px);
    }

    /* .btn-hero-trans {
        background-color: #8AAF6A;
        color: #000000;
        font-family: 'Sutasoma Display', sans-serif;
        font-weight: 500;
        font-size: 14px;
        border-radius: 12px;
        padding: 12px 28px;
        text-decoration: none;
        transition: all 0.25 ease;
        display: inline-block;
    }
    .btn-hero-trans:hover {
        background-color: #ffffff;
        color: #204420;
        transform: translateY(-2px);
    } */

    /* STYLE KARTU & SEKSI LAINNYA */
    .stat-card-white {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 16px; /* Sudut lebih membulat */
        padding: 24px 16px;
        text-align: center;
        height: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Efek bayangan halus */
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

    /* Card Statistik Hijau Tua */
    .stat-card-green-solid {
        background: #204420; /* Warna hijau tua khas IKN */
        color: #ffffff;
        border: 1px solid #204420;
        border-radius: 16px;
        padding: 24px 16px;
        text-align: center;
        height: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    /* Efek Hover (Opsional, agar interaktif saat di-hover) */
    .stat-card-white:hover, .stat-card-green-solid:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
    }

    /* Penyesuaian Ukuran Teks & Ikon Statistik */
    .stat-card-white h3, .stat-card-green-solid h3 {
        font-size: 34px;
        font-weight: 700;
        margin-top: 10px;
        margin-bottom: 4px;
    }

    .stat-card-white h4, .stat-card-green-solid h4 {
        font-size: 22px;
        font-weight: 700;
        margin-top: 10px;
        margin-bottom: 4px;
    }

    .stat-card-white small {
        color: #666666;
        font-weight: 400;
    }

    .stat-card-green-solid small {
        color: rgba(255, 255, 255, 0.8);
        font-weight: 400;
    }

    /* Styling Gambar Ikon di Dalam Card */
    .stat-icon-img {
        width: 36px;            /* Lebar gambar ikon */
        height: 36px;           /* Tinggi gambar ikon */
        object-fit: contain;    /* Menjaga proporsi gambar tidak gepeng */
        display: block;
        margin: 0 auto 12px auto; /* Membuat gambar pas di tengah horizontal */
    }

    /* CARD RUTE PERJALANAN */
    .card-rute-white {
        background: #ffffff;
        border-radius: 20px;
        padding: 28px 24px;
        border: 1.5px solid #e2e8f0;
        height: 100%;
        width: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);

        /* 1. UBAH PADDING ATAS & BAWAH UNTUK MEMANJANGKAN KOTAK PUTIH */
        padding-top: 40px;     /* Tambah angka ini (misal dari 28px jadi 50px / 60px) */
        padding-bottom: 30px;  /* Tambah angka ini (misal dari 28px jadi 50px / 60px) */
        padding-left: 32px;
        padding-right: 32px;
    }

    /* Styling Judul Utama 'RUTE PERJALANAN' */
    .section-title-gold {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        color: #785A1A;
        font-weight: 700;
        
        /* 1. ATUR UKURAN FONT JUDUL UTAMA DI SINI */
        font-size: 27px !important; /* Ubah sesuai selera (misal: 32px, 45px, 48px) */
    }

    /* Styling Sub-judul 'Cara Menuju Nusantara' */
    .section-subtitle-rute {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        color: #204420;
        font-weight: 600;
        
        /* 2. ATUR UKURAN FONT SUB-JUDUL DI SINI */
        font-size: 16px; /* Ubah sesuai selera (misal: 16px, 22px, 24px) */
        margin-top: 6px;
    }

    /* HILANGKAN JARAK PADA ITEM RUTE TERAKHIR (KIPP IKN) */
    .rute-item:last-child {
        margin-bottom: 0 !important; /* Mencegah jarak berlebih di paling bawah */
    }

    /* Watermark Transparan di Pojok Kanan Atas Card */
    .rute-watermark {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 72px;
        color: rgba(32, 68, 32, 0.08); /* Transparan lembut */
        pointer-events: none;
        z-index: 1;
    }

    /* Badge Ikon Judul (Latar Belakang Abu-abu) */
    .rute-title-badge {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
        position: relative;
        z-index: 2;
    }

    .rute-icon-box {
        width: 44px;
        height: 44px;
        background-color: #3261321d;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        color: #1a1a1a;
    }

    /*judul jalur perjalanan ("Jalur Udara", "Jalur Darat", "Jalur Laut") */
    .rute-title-badge h5 {
        font-weight: 700;
        color: #000000;
        margin: 0;
        font-size: 22px;
        transition: color 0.3s ease;
    }

    .card-rute-white:hover .rute-title-badge h5 {
    color: #204420; /* Warna judul berubah hijau tua khas IKN */
    }

    /* Timeline Garis Vertikal */
    .rute-timeline {
        position: relative;
        padding-left: 28px;
        z-index: 2;
    }

    .rute-timeline::before {
        content: '';
        position: absolute;
        left: 7px;
        top: 10px;
        bottom: 24px;
        width: 2px;
        background-color: #cbd5e1;
    }

    /* Teks Isi Baris Rute ("Bandara", "Bus/Travel", dll) */
    .rute-item {
        position: relative;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 14px;
        font-size: 16px;
        color: #334155;
        font-weight: 500;
        transition: transform 0.3s ease;
    }

    /* Saat card di-hover, baris rute sedikit bergeser ke kanan (efek interaktif) */
    .card-rute-white:hover .rute-item {
        transform: translateX(4px);
    }

    /* Lingkaran Titik Rute Default */
    .rute-item::before {
        content: '';
        position: absolute;
        left: -28px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background-color: #ffffff;
        border: 2px solid #204420;
    }

    /* Titik Aktif KIPP IKN (Hijau dengan Halo Transparan) */
    .rute-item.active-kipp::before {
        border-color: #466A3A;
        background-color: #204420;
        box-shadow: 0 0 0 4px rgba(32, 68, 32, 0.2);
    }

    .rute-item.active-kipp span {
        color: #204420;
        font-weight: 700;
    }

    /* ikon jalan */
    .rute-item i {
        width: 20px;
        text-align: center;
        color: #1a1a1a;
    }

    /* IKON WATERMARK */
    .rute-watermark-img {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 100px;
        height: 100px;
        object-fit: contain;
        opacity: 0.12; /* Transparan lembut */
        pointer-events: none;
        z-index: 1;
        transition: opacity 0.3s ease;
    }

    /* Watermark sedikit lebih terang saat card di-hover */
    .card-rute-white:hover .rute-watermark-img {
        opacity: 0.25;
    }


    /* 1. ANIMASI PESAWAT (TERBANG MELUNCUR KE KANAN ATAS) */
    @keyframes flyAway {
        0% {
            transform: translate(0, 0) scale(1);
        }
        50% {
            transform: translate(12px, -12px) scale(1.1);
        }
        100% {
            transform: translate(0, 0) scale(1);
        }
    }

    .card-rute-white:hover .wm-pesawat {
        animation: flyAway 2s ease-in-out infinite;
    }


    /* 2. ANIMASI MOBIL (MELAJU MAJU-MUNDUR & MEMBAL) */
    @keyframes driveCar {
        0% {
            transform: translateX(0) translateY(0);
        }
        25% {
            transform: translateX(-8px) translateY(-2px); /* Mobil mulai maju & menghentak sedikit */
        }
        50% {
            transform: translateX(-15px) translateY(0); /* Maju ke depan */
        }
        75% {
            transform: translateX(-7px) translateY(-1px);
        }
        100% {
            transform: translateX(0) translateY(0);
        }
    }

    .card-rute-white:hover .wm-mobil {
        animation: driveCar 1.8s ease-in-out infinite;
    }


    /* 3. ANIMASI KAPAL (BERLAYAR NAIK-TURUN BERGELOMBANG) */
    @keyframes sailBoat {
        0% {
            transform: translateY(0) rotate(0deg);
        }
        25% {
            transform: translateY(-5px) rotate(-3deg); /* Naik terangkat gelombang */
        }
        50% {
            transform: translateY(3px) rotate(2deg);   /* Turun mengikuti gelombang */
        }
        75% {
            transform: translateY(-3px) rotate(-2deg);
        }
        100% {
            transform: translateY(0) rotate(0deg);
        }
    }

    .card-rute-white:hover .wm-kapal {
        animation: sailBoat 2.5s ease-in-out infinite;
    }

    /* GAMBAR IKON DI DALAM BADGE JUDUL */
    .rute-icon-box img {
        width: 27px;
        height: 27px;
        object-fit: contain;
    }

    /* GAMBAR IKON KECIL DI TIAP ITEM TIMELINE */
    .rute-item-img {
        width: 23px;
        height: 23px;
        object-fit: contain;
        display: inline-block;
    }
    
    /* INFRASTRUKTUR */
    .card-infra-custom {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        height: 100%;
    }
    .card-infra-custom img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }
    .card-infra-custom .p-content { padding: 20px; }
    .card-infra-custom h4 {
        color: #204420;
        font-family: 'Sutasoma Display', sans-serif;
        font-weight: 600;
        font-size: 21px;
    }

    /* Styling Paragraf Deskripsi Card Infrastruktur */
    .card-infra-custom p {
        /* 1. JENIS FONT SUTASOMA TEXT */
        font-family: 'Sutasoma Text', sans-serif !important;
        font-weight: 400;
        
        /* 2. UKURAN FONT (GEDE / KECIL) */
        font-size: 14px; /* Ubah angka ini (misal: 14px untuk memperkecil, 15px / 16px untuk memperbesar) */
        
        /* 3. PENGATURAN TAMBAHAN AGAR RAPI */
        line-height: 1.7;  /* Jarak antar baris teks */
        color: #475569;    /* Warna teks abu-abu tua yang nyaman dibaca */
        margin-bottom: 0;
    }

    /* LAYANAN TERPADU */

    /* Styling Judul Sub-Kategori Layanan (misal: "Bandara") */
    .sub-category-title {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 19px;     /* <--- UBAH UKURAN (GEDE/KECIL) HURUFNflavor DI SINI */
        font-weight: 700;
        color: #000000;          /* Warna teks hijau tua khas IKN */
        display: flex;
        align-items: center;
        gap: 10px;               /* Jarak antara gambar ikon dan teks judul */
    }

    /* Styling Gambar Ikon di Samping Judul Sub-Kategori */
    .sub-category-icon-img {
        width: 28px;             /* <--- UBAH LEBAR GAMBAR IKON DI SINI */
        height: 28px;            /* <--- UBAH TINGGI GAMBAR IKON DI SINI */
        object-fit: contain;
        display: inline-block;
    }

    .card-moda-green {
        background-color: #648B3C;
        border-radius: 16px;
        padding: 16px;
        color: #ffffff;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-moda-green img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 12px;
    }

    /* JUDUL LAYANAN DI DALAM KARTU (Misal: "Bandara VVIP IKN", "PO Sinar Jaya") */
    .card-moda-green h5 {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 20px; /* <--- UBAH UKURAN (GEDE/KECIL) */
        font-weight: 500;
        margin-bottom: 8px;
        color: #ffffff;
    }

    /* PARAGRAF DESKRIPSI DI DALAM KARTU (Misal: "Akses penerbangan VVIP...") */
    .card-moda-green p {
        font-family: 'Sutasoma Text', sans-serif !important;
        font-size: 14px; /* <--- UBAH UKURAN (GEDE/KECIL) DESKRIPSI DI SINI */
        font-weight: 300;
        line-height: 1.5;
        opacity: 0.92;
        margin-bottom: 16px;
    }

    /* TOMBOL 'LIHAT DETAIL' DI BAWAH KARTU */
    .btn-card-detail {
        background-color: #ffffff;
        color: #204420;
        font-family: 'Sutasoma Display', sans-serif !important;
        font-weight: 600;
        font-size: 14px; /* <--- UBAH UKURAN TEKS TOMBOL */
        border-radius: 8px;
        padding: 10px 16px;
        text-align: center;
        text-decoration: none;
        display: block;
        transition: all 0.25s ease;
    }

    .btn-card-detail:hover {
        background-color: #eeefee;
        color: #204420;
    }

    /* Badge Perencanaan Emas/Cokelat */
    .badge-perencanaan {
        background-color: #775A19;
        color: #ffffff;
        font-size: 12px;
        font-weight: 300;
        padding: 4px 12px;
        border-radius: 6px;
        text-transform: uppercase;
        display: inline-block;
    }

    /* Sub-Judul Rute / Lokasi (misal: "DARI BALIKPAPAN") */
    .sub-location-gold {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        color: #785A1A;
        font-weight: 500;
        font-size: 1.16px;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
    }
</style>

<!-- HERO SECTION (FULL WIDTH BANNER) -->
<section class="hero-antarkota">
    <div class="container-fluid px-lg-5">
        <div class="row align-items-center g-5">
            <!-- Teks Sisi Kiri -->
            <div class="col-lg-6 ps-lg-5">
                <h1 class="mb-4">Layanan Konektivitas<br>Antarkota<br>Ibu Kota Nusantara</h1>
                <p class="mb-5">
                    Layanan konektivitas antarkota menghubungkan Ibu Kota Nusantara dengan kota-kota di sekitarnya melalui jaringan jalan, transportasi darat, transportasi laut, dan transportasi udara yang saling terintegrasi. Sistem ini mendukung mobilitas masyarakat, logistik, serta akses menuju Kawasan Inti Pusat Pemerintahan (KIPP).
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#infrastruktur" class="btn-hero-white">Lihat Infrastruktur</a>
                    <a href="#layanan-terpadu" class="btn-hero-white">Jelajahi Moda Transportasi</a>
                </div>
            </div>

            <!-- Gambar Sisi Kanan Dengan Frame Double Layer -->
            <div class="col-lg-6 text-center pe-lg-5">
                <div class="hero-frame-wrapper">
                    <div class="hero-img-box">
                        <img src="<?= $base_url; ?>assets/images/antarkota/bus_sinarjaya.jpeg" alt="Bus Antarkota Sinar Jaya" onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80';">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS & RUTE PERJALANAN -->
<section class="py-5 bg-light">
    <div class="container py-3">
        <div class="row g-4 mb-5">
            <!-- Card 1: Kategori Layanan -->
            <div class="col-md-3 col-6">
                <div class="stat-card-white">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon1.jpg" alt="Kategori" class="stat-icon-img">
                    <h3 class="fw-bold">7</h3>
                    <small class="d-block">Kategori Layanan</small>
                </div>
            </div>

            <!-- Card 2: Multi Moda -->
            <div class="col-md-3 col-6">
                <div class="stat-card-white">
                   <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pesawat.png" alt="Multi Moda" class="stat-icon-img">
                    <h4 class="fw-bold">Multi Moda</h4>
                    <small class="d-block">Transportasi Terintegrasi</small>
                </div>
            </div>

            <!-- Card 3: Wilayah Penghubung -->
            <div class="col-md-3 col-6">
                <div class="stat-card-white">
                   <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bangunan.png" alt="Wilayah" class="stat-icon-img">
                    <h3 class="fw-bold">3</h3>
                    <small class="d-block">Kawasan Kabupaten/Kota Terhubung</small>
                </div>
            </div>

            <!-- Card 4: Terintegrasi (Hijau Tua) -->
            <div class="col-md-3 col-6">
                <div class="stat-card-green-solid">
                    <i class="fas fa-check-circle" style="font-size: 28px; color: #caba84;" style="color: #caba84;"></i>
                    <h4 class="fw-bold">Terintegrasi</h4>
                    <small class="d-block">Sistem Konektivitas</small>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
           <h2 class="fw-bold mb-3" style="font-size: 32px;">Rute Perjalanan</h2>
            <p class="mx-auto mb-4" style="max-width: 800px; color: #666666; font-size: 16px;">Cara Menuju Nusantara</div>

        <div class="row g-4">
            <!-- JALUR UDARA -->
            <div class="col-lg-4 col-md-6">
                <div class="card-rute-white">
                    <!-- Watermark Gambar Transparan -->
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pesawat.png" alt="Watermark Pesawat" class="rute-watermark-img wm-pesawat">
                    
                    <div class="rute-title-badge">
                        <div class="rute-icon-box">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pesawat.png" alt="Ikon Pesawat">
                        </div>
                        <h5>Jalur Udara</h5>
                    </div>
                    <div class="rute-timeline">
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pesawat.png" class="rute-item-img"> 
                            <span>Bandara</span>
                        </div>
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bus.png" class="rute-item-img"> 
                            <span>Bus / Travel</span>
                        </div>
                        <div class="rute-item"><i class="fas fa-road"></i> <span>Tol / Jalan Nasional</span></div>
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pnr.jpg" class="rute-item-img"> 
                            <span>Park and Ride</span>
                        </div>
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_evbus.jpg" class="rute-item-img"> 
                            <span>EV Bus</span>
                        </div>
                        <div class="rute-item active-kipp">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bangunan.png" class="rute-item-img"> 
                            <span>KIPP IKN</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JALUR DARAT -->
            <div class="col-lg-4 col-md-6">
                <div class="card-rute-white">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" alt="Watermark Mobil" class="rute-watermark-img wm-mobil">
                    
                    <div class="rute-title-badge">
                        <div class="rute-icon-box">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" alt="Ikon Mobil">
                        </div>
                        <h5>Jalur Darat</h5>
                    </div>
                    <div class="rute-timeline">
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" class="rute-item-img"> 
                            <span>Bus / Travel / Pribadi</span>
                        </div>
                        <div class="rute-item"><i class="fas fa-road"></i> <span>Tol / Jalan Nasional</span></div>
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pnr.jpg" class="rute-item-img"> 
                            <span>Park and Ride</span>
                        </div>
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_evbus.jpg" class="rute-item-img"> 
                            <span>EV Bus</span>
                        </div>
                        <div class="rute-item active-kipp">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bangunan.png" class="rute-item-img"> 
                            <span>KIPP IKN</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JALUR LAUT -->
            <div class="col-lg-4 col-md-6">
                <div class="card-rute-white">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kapal.jpg" alt="Watermark Kapal" class="rute-watermark-img wm-kapal">
                    <div class="rute-title-badge">
                        <div class="rute-icon-box">
                            <i class="fas fa-ship"></i>
                        </div>
                        <h5>Jalur Laut</h5>
                    </div>
                    <div class="rute-timeline">
                        <div class="rute-item"><i class="fas fa-ship"></i> <span>Pelabuhan</span></div>
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bus.png" class="rute-item-img"> 
                            <span>Bus / Travel / Pribadi</span>
                        </div>
                        <div class="rute-item"><i class="fas fa-road"></i> <span>Tol / Jalan Nasional</span></div>
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pnr.jpg" class="rute-item-img"> 
                            <span>Park and Ride</span>
                        </div>
                        <div class="rute-item">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_evbus.jpg" class="rute-item-img"> 
                            <span>EV Bus</span>
                        </div>
                        <div class="rute-item active-kipp">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bangunan.png" class="rute-item-img"> 
                            <span>KIPP IKN</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- INFRASTRUKTUR KONEKTIVITAS -->
<section id="infrastruktur" class="py-6 bg-light">
    <div class="container py-1">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3" style="font-size: 32px;">Infrastruktur Konektivitas</h2>
            <p class="mx-auto mb-4" style="max-width: 800px; color: #666666; font-size: 16px;">Jaringan Utama</p>
        </div>
        
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-infra-custom">
                    <img src="<?= $base_url; ?>assets/images/antarkota/tol_balsam.jpeg" alt="Tol Balsam" onerror="this.src='https://images.unsplash.com/photo-1545558014-8692077e9b5c?auto=format&fit=crop&w=800&q=80';">
                    <div class="p-content">
                        <h4>Jalan Tol Balikpapan – Samarinda (Tol Balsam)</h4>
                        <p>Jalan Tol Balikpapan–Samarinda (Tol Balsam) adalah tol pertama di Kalimantan sepanjang 99,02 km yang memangkas waktu tempuh antar-kota menjadi 1,5 jam. Tol ini berfungsi sebagai tulang punggung logistik utama yang menghubungkan Pelabuhan Semayang/Kariangau, Bandara Sepinggan Balikpapan, dan Kota Samarinda langsung menuju Kawasan Inti Ibu Kota Nusantara (IKN).</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-infra-custom">
                    <img src="<?= $base_url; ?>assets/images/antarkota/pulau_balang.jpeg" alt="Pulau Balang" onerror="this.src='https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80';">
                    <div class="p-content">
                        <h4>Jalan Tol Balikpapan - IKN (via Pulau Balang)</h4>
                        <p>Jalan Tol Akses IKN (Seksi Balikpapan–Pulau Balang–IKN) merupakan megaproyek infrastruktur bebas hambatan sepanjang lebih dari 52 km yang dirancang untuk memangkas waktu tempuh dari Balikpapan menuju Kawasan Inti Pusat Pemerintahan (KIPP) IKN dari 2 jam menjadi 30–45 menit saja. Rute ini terhubung dari Km 8 Tol Balsam, melintasi Jembatan Pulau Balang, hingga langsung menembus ring luar IKN. Saat ini, statusnya masih beroperasi secara fungsional terbatas pada momen-momen tertentu (seperti libur nasional/mudik) sembari mengejar target penyelesaian konstruksi penuh.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-infra-custom">
                    <img src="<?= $base_url; ?>assets/images/antarkota/samboja-ikn.jpeg" alt="Bandara VVIP IKN" onerror="this.src='https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?auto=format&fit=crop&w=800&q=80';">
                    <div class="p-content">
                        <h4>Jalan Nasional Samboja – IKN</h4>
                        <p>Jalan Nasional Samboja–IKN merupakan jalur arteri non-tol sepanjang sekitar 52 km yang menghubungkan Km 38 Tol Balikpapan–Samarinda, kawasan Samboja Barat, hingga masuk ke ring luar Ibu Kota Nusantara (IKN). Berperan sebagai jalur logistik utama dan akses alternatif, jalan nasional ini sangat krusial bagi mobilitas kendaraan berat pembawa material konstruksi dari pelabuhan sekitarnya menuju kawasan inti pemerintahan. Jalur ini terus diperkuat dengan infrastruktur penahan longsor permanen seperti struktur pile slab (jalan layang di atas tanah labil) demi menjamin kelancaran arus transportasi publik non-tol.</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-infra-custom">
                    <img src="<?= $base_url; ?>assets/images/antarkota/bpp-smd.jpeg" alt="Pulau Balang" onerror="this.src='https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80';">
                    <div class="p-content">
                        <h4>Jalan Trans Kalimantan (Balikpapan – Samarinda)</h4>
                        <p>Jalan Trans Kalimantan (Poros Balikpapan–Samarinda) merupakan jalur arteri nasional non-tol utama sepanjang sekitar 115 km yang menghubungkan Kota Balikpapan (via Jl. Soekarno-Hatta) dan Kota Samarinda. Jalur ini melintasi kawasan Bukit Soeharto dan terhubung langsung dengan Jalan Nasional Samboja–IKN (Km 38) sebagai gerbang masuk alternatif non-tol menuju kawasan Ibu Kota Nusantara (IKN). Berperan vital sebagai jalur logistik, rute ini menyediakan akses intermoda tanpa batas bagi kendaraan umum, roda dua, hingga angkutan barang berat nonstop 24 jam.</p>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-infra-custom">
                    <img src="<?= $base_url; ?>assets/images/antarkota/sepaku-penajam.jpeg" alt="Bandara VVIP IKN" onerror="this.src='https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?auto=format&fit=crop&w=800&q=80';">
                    <div class="p-content">
                        <h4>Jalan Trans Kalimantan (Sepaku – Penajam)</h4>
                        <p>Jalan Trans Kalimantan (Poros Sepaku–Penajam) merupakan rute arteri nasional non-tol utama yang menghubungkan pusat Ibu Kota Nusantara di Kecamatan Sepaku dengan pusat pemerintahan Kabupaten Penajam Paser Utara (PPU) di Simpang Silkar Petung. Berperan vital sebagai salah satu akses logistik darat selatan IKN, jalur lintas negara ini menjadi penghubung mobilitas masyarakat lokal, pekerja konstruksi, dan suplai logistik dari arah Pelabuhan Penajam. Saat ini, tata kelola dan peningkatan kualitas infrastruktur di koridor Jalan Negara ini secara bertahap dialihkan ke bawah pengawasan Otorita IKN demi mendukung integrasi ekosistem wilayah penyangga KIPP.</p>
                    </div>
                </div>
            </div>

             <!-- Card 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="card-infra-custom">
                    <img src="<?= $base_url; ?>assets/images/antarkota/muarajawa.jpeg" alt="Bandara VVIP IKN" onerror="this.src='https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?auto=format&fit=crop&w=800&q=80';">
                    <div class="p-content">
                        <h4>Jalan Nasional Samboja – Muara Jawa</h4>
                        <p>Jalan Nasional Samboja–Muara Jawa merupakan rute arteri non-tol pesisir sepanjang sekitar 30 km yang menghubungkan pesisir selatan Kutai Kartanegara langsung ke zona delineasi timur IKN. Berfungsi strategis sebagai koridor pendukung wilayah perencanaan (WP) Muara Jawa dan Kuala Samboja, jalur lintas pesisir ini mengintegrasikan mobilitas sektor perikanan, pertanian, dan distribusi komoditas lokal menuju pusat pemerintahan baru. Rute ini beroperasi penuh 24 jam untuk umum bebas biaya, sekaligus berfungsi sebagai jalur logistik sekunder penunjang ketahanan pangan domestik Nusantara.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LAYANAN TERPADU MODA TRANSPORTASI -->
<section id="layanan-terpadu" class="pt-5 pb-5 bg-light">
    <div class="container pt-3 pb-0">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3" style="font-size: 32px;">Layanan Terpadu</h2>
            <p class="mx-auto mb-4" style="max-width: 800px; color: #666666; font-size: 16px;">Moda Transportasi Antarkota</p>
        </div>

        <div class="mb-5">
            <h5 class="sub-category-title mb-3">
                <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pesawat.png" alt="Ikon Mobil" class="sub-category-icon-img">
                <span>Bandara</span>
            </h5>
            <div class="row g-4">
                <?php 
                if ($result_layanan && mysqli_num_rows($result_layanan) > 0): 
                    while ($row = mysqli_fetch_assoc($result_layanan)):
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-moda-green">
                            <div>
                                <img src="<?= $base_url; ?>uploads/<?= $row['gambar']; ?>" alt="<?= htmlspecialchars($row['nama_layanan']); ?>" onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80';">
                                <h5><?= htmlspecialchars($row['nama_layanan']); ?></h5>
                                <p><?= htmlspecialchars($row['deskripsi_singkat']); ?></p>
                            </div>
                            <a href="<?= $base_url; ?>detail/antarkota-detail.php?id=<?= $row['id']; ?>" class="btn-card-detail">Lihat Detail</a>
                        </div>
                    </div>
                <?php 
                    endwhile;
                else: 
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-moda-green">
                            <div>
                                <img src="<?= $base_url; ?>assets/images/antarkota/VVIP_IKN.jpeg" alt="Bandara VVIP" onerror="this.src='https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?auto=format&fit=crop&w=800&q=80';">
                                <h5>Bandar Udara Internasional Nusantara</h5>
                                <p>Akses penerbangan VVIP menuju kawasan Ibu Kota Nusantara.</p>
                            </div>
                            <a href="<?= $base_url; ?>detail/antarkota-bandara.php?id=bandara-vvip" class="btn-card-detail">Lihat Detail</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-moda-green">
                            <div>
                                <img src="<?= $base_url; ?>assets/images/antarkota/sams_sepinggan.jpeg" alt="Sinar Jaya" onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80';">
                                <h5>Bandar Udara Internasional Sultan Aji Muhammad Sulaiman Sepinggan</h5>
                                <p>Simpul transportasi udara utama menuju IKN melalui konektivitas darat.</p>
                            </div>
                            <a href="<?= $base_url; ?>detail/antarkota-bandara.php?id=sams-sepinggan" class="btn-card-detail">Lihat Detail</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-moda-green">
                            <div>
                                <img src="<?= $base_url; ?>assets/images/antarkota/apt_pranoto.jpeg" alt="Sinar Jaya" onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80';">
                                <h5>Bandar Udara Internasional Aji Pangeran Tumenggung Pranoto</h5>
                                <p>Salah satu simpul akses udara dari Samarinda menuju IKN.</p>
                            </div>
                            <a href="<?= $base_url; ?>detail/antarkota-bandara.php?id=apt-pranoto" class="btn-card-detail">Lihat Detail</a>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    
        
        <!-- KELOMPOK BUS ANTARKOTA & TRAVEL -->
        <div class="mb-5">
            <!-- Judul Kategori Gabungan -->
            <h5 class="sub-category-title mb-3">
                <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bus.png" alt="Ikon Bus" class="sub-category-icon-img">
                <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" alt="Ikon Travel" class="sub-category-icon-img" style="margin-left: -4px;">
                <span>Bus Antarkota & Travel</span>
            </h5>

            <div class="row g-4">
                <!-- Card 1: Bus Antarkota -->
                <div class="col-lg-6 col-md-6">
                    <div class="card-moda-green">
                        <div>
                            <img src="<?= $base_url; ?>assets/images/antarkota/bus_sinarjaya.jpeg" alt="Bus Antarkota" onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80';">
                            <h5>Bus Antarkota</h5>
                            <p>Layanan bus antarkota yang menghubungkan sejumlah simpul transportasi dengan kawasan Ibu Kota Nusantara.</p>
                        </div>
                        <a href="<?= $base_url; ?>detail/antarkota-bus.php?id=bus-antarkota" class="btn-card-detail">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 2: Travel -->
                <div class="col-lg-6 col-md-6">
                    <div class="card-moda-green">
                        <div>
                            <img src="<?= $base_url; ?>assets/images/antarkota/travel_cititrans.png" alt="Travel" onerror="this.src='https://images.unsplash.com/photo-1570125909232-eb263c188f7e?auto=format&fit=crop&w=800&q=80';">
                            <h5>Travel</h5>
                            <p>Pilihan perjalanan darat yang menghubungkan Samarinda, Balikpapan, dan Penajam dengan Kawasan Ibu Kota Nusantara.</p>
                        </div>
                        <a href="<?= $base_url; ?>detail/antarkota-travel.php?id=travel" class="btn-card-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- KELOMPOK KERETA API (PERENCANAAN) -->
        <div class="mb-5">
            <!-- Judul Kategori Kereta Api dengan Badge Perencanaan -->
            <div class="d-flex align-items-center gap-3 mb-3">
                <h5 class="sub-category-title mb-0">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kereta.png" alt="Ikon Kereta Api" class="sub-category-icon-img">
                    <span>Kereta Api</span>
                </h5>
                <span class="badge-perencanaan">PERENCANAAN</span>
            </div>

            <!-- Deskripsi Pengantar Kereta Api -->
            <p class="text-muted mb-4" style="max-width: 900px; line-height: 1.6; font-size: 14px;" style="max-width: 900px; line-height: 1.6;">
                Pengembangan jaringan kereta api di Kalimantan dan Ibu Kota Nusantara direncanakan untuk memperkuat konektivitas antarkawasan, mendukung mobilitas masyarakat, serta meningkatkan integrasi transportasi menuju IKN.
            </p>

            <div class="row g-4">
                <!-- Card 1: KA Bandara SAMS Sepinggan - KIPP IKN -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-moda-green">
                        <div>
                            <img src="<?= $base_url; ?>assets/images/antarkota/ka_samssepinggan.jpeg" alt="KA Bandara" onerror="this.src='https://images.unsplash.com/photo-1515165562839-978bbcf1b26d?auto=format&fit=crop&w=800&q=80';">
                            <h5>KA Bandara SAMS Sepinggan – KIPP IKN</h5>
                            <p>Rencana layanan kereta api yang menghubungkan Bandara SAMS Sepinggan Balikpapan dengan Kawasan Inti Pusat Pemerintahan (KIPP) IKN.</p>
                        </div>
                        <a href="https://ibukotakini.com/read/kereta-api-bandara-sepinggan-kipp-ikn-masuk-pembahasan-ditargetkan-selesai-2030" class="btn-card-detail">Lihat Rencana</a>
                    </div>
                </div>

                <!-- Card 2: KA Perkotaan K-IKN -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-moda-green">
                        <div>
                            <img src="<?= $base_url; ?>assets/images/antarkota/ka_ikn.jpeg" alt="KA Perkotaan" onerror="this.src='https://images.unsplash.com/photo-1515165562839-978bbcf1b26d?auto=format&fit=crop&w=800&q=80';">
                            <h5>KA Perkotaan K-IKN</h5>
                            <p>Rencana jaringan kereta api perkotaan untuk mendukung pergerakan masyarakat di kawasan Ibu Kota Nusantara.</p>
                        </div>
                        <!-- Diarahkan ke file PDF di folder assets/pdf/ -->
                        <a href="#" class="btn-card-detail" data-bs-toggle="modal" data-bs-target="#pdfModalKaPerkotaan">Lihat Rencana</a>
                    </div>
                </div>

                <!-- Card 3: KA Trans Kalimantan -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-moda-green">
                        <div>
                            <img src="<?= $base_url; ?>assets/images/antarkota/ka_transkalimantan.webp" alt="KA Trans Kalimantan" onerror="this.src='https://images.unsplash.com/photo-1515165562839-978bbcf1b26d?auto=format&fit=crop&w=800&q=80';">
                            <h5>KA Trans Kalimantan</h5>
                            <p>Rencana pengembangan jaringan kereta api yang menghubungkan berbagai wilayah di Pulau Kalimantan dan diarahkan untuk memperkuat konektivitas antarkawasan.</p>
                        </div>
                        <a href="https://mti.or.id/en/masyarakat-transportasi-indonesia-dorong-percepatan-kereta-api-kalimantan/" class="btn-card-detail">Lihat Rencana</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- KELOMPOK TRANSPORTASI PERAIRAN -->
        <div class="mb-5">
            <h5 class="sub-category-title mb-3">
                <i class="fas fa-ship me-2"></i>
                <span>Transportasi Perairan</span>
            </h5>

            <div class="row g-4">
                <!-- Card 1: Pelabuhan Semayang -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-moda-green">
                        <div>
                            <img src="<?= $base_url; ?>assets/images/antarkota/pelabuhan_semayang2.webp" alt="Pelabuhan Semayang" onerror="this.src='https://images.unsplash.com/photo-1559136555-9303baea8ebd?auto=format&fit=crop&w=800&q=80';">
                            <h5>Pelabuhan Semayang Balikpapan</h5>
                            <p>Pelabuhan utama Balikpapan untuk angkutan penumpang dan konektivitas menuju IKN.</p>
                        </div>
                        <a href="<?= $base_url; ?>detail/antarkota-perairan.php?id=pelabuhan-semayang" class="btn-card-detail">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 2: Pelabuhan Kariangau -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-moda-green">
                        <div>
                            <img src="<?= $base_url; ?>assets/images/antarkota/pelabuhan_kariangau.webp" alt="Pelabuhan Kariangau" onerror="this.src='https://images.unsplash.com/photo-1559136555-9303baea8ebd?auto=format&fit=crop&w=800&q=80';">
                            <h5> Pelabuhan Penyeberangan Kariangau</h5>
                            <p>Pelabuhan penyeberangan yang menghubungkan Balikpapan dan Penajam melalui layanan feri.</p>
                        </div>
                        <a href="<?= $base_url; ?>detail/antarkota-perairan.php?id=pelabuhan-kariangau" class="btn-card-detail">Lihat Detail</a>
                    </div>
                </div>

                <!-- Card 3: Pelabuhan Penajam -->
                <div class="col-lg-4 col-md-6">
                    <div class="card-moda-green">
                        <div>
                            <img src="<?= $base_url; ?>assets/images/antarkota/pelabuhan_penajam.webp" alt="Pelabuhan Penajam" onerror="this.src='https://images.unsplash.com/photo-1559136555-9303baea8ebd?auto=format&fit=crop&w=800&q=80';">
                            <h5> Pelabuhan Penyeberangan Penajam</h5>
                            <p>Simpul penyeberangan dan akses darat dari Penajam menuju kawasan IKN.</p>
                        </div>
                        <a href="<?= $base_url; ?>detail/antarkota-perairan.php?id=pelabuhan-penajam" class="btn-card-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- KELOMPOK PARK AND RIDE -->
        <div class="mb-4">
            <h5 class="sub-category-title mb-3">
                <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pnr.jpg" alt="Ikon Park and Ride" class="sub-category-icon-img" onerror="this.src='https://images.unsplash.com/photo-1506521781263-d8422e82f27a?auto=format&fit=crop&w=100&q=80';">
                <span>Park and Ride</span>
            </h5>

            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <p class="mb-3" style="font-family: 'Sutasoma Text', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 1.7; color: #030405;">
                        Lokasi Park n Ride direncanakan di daerah perimeter dan jalan akses ke kawasan perkotaan IKN. Saat ini, ada 2 fasilitas Park n Ride yang direncanakan yaitu di KIPP 1A and KIPP 1B.
                    </p>
                    <p class="mb-4" style="font-family: 'Sutasoma Text', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 1.7; color: #030405;">
                        Park n Ride 1A melayani perpindahan transportasi dari Sepaku, Samboja, Tenggarong, Samarinda, dan daerah mitra lainnya di utara IKN. Sedangkan Park n Ride 1B melayani perpindahan transportasi dari Balikpapan, Penajam, Samarinda (via tol Pulau Balang), and daerah mitra lainnya di selatan IKN.
                    </p>

                    <!-- Gambar Dokumentasi Park n Ride -->
                    <div class="row g-3">
                    <div class="col-sm-6">
                        <div style="border-radius:12px; overflow:hidden; border:1px solid #e2e8f0; background-color:#ffffff; height:180px; display:flex; align-items:center; justify-content:center;">
                            <img src="<?= $base_url; ?>assets/images/antarkota/pnr.jpg" alt="Park & Ride KIPP 1B & 1A" class="img-fluid" style="max-height:100%; max-width:100%; object-fit:contain;" onerror="this.src='https://images.unsplash.com/photo-1506521781263-d8422e82f27a?auto=format&fit=crop&w=800&q=80';">
                        </div>
                    </div>

                    <!-- Foto 2: Diagram Alur Transportasi Park n Ride -->
                    <div class="col-sm-6">
                        <div style="border-radius:12px; overflow:hidden; border:1px solid #e2e8f0; background-color:#ffffff; height:180px; display:flex; align-items:center; justify-content:center;">
                            <img src="<?= $base_url; ?>assets/images/antarkota/pnr2.jpg" alt="Diagram Alur Park n Ride" class="img-fluid" style="max-height:100%; max-width:100%; object-fit:contain;" onerror="this.src='https://images.unsplash.com/photo-1506521781263-d8422e82f27a?auto=format&fit=crop&w=800&q=80';">
                        </div>
                    </div>
                </div>
                </div>

                <!-- Gambar Peta Sisi Kanan -->
                <div class="col-lg-5">
                    <div class="bg-light p-3 rounded-4 border text-center shadow-sm">
                        <img src="<?= $base_url; ?>assets/images/antarkota/pnr3.jpg" alt="Peta Lokasi Park & Ride" class="img-fluid rounded-3" style="max-height: 380px; width:100%; object-fit:contain;" onerror="this.src='https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?auto=format&fit=crop&w=800&q=80';">
                    </div>
                </div>
            </div>
        </div>
    <!-- Penutup container & section layanan-terpadu -->
    </div>
</section>

        <!-- VISUALISASI PETA KONEKTIVITAS -->
        <section class="pt-6 pb-5 bg-light">
            <div class="container py-2">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-3" style="font-size: 32px;">Visualisasi Konektivitas</h2>
                    <p class="mx-auto mb-4" style="max-width: 800px; color: #666666; font-size: 16px;">Peta Konektivitas Regional</p>
                </div>
                <div class="bg-light p-4 rounded-4 text-center border shadow-sm">
                    <img src="<?= $base_url; ?>assets/images/antarkota/peta_antarkota.jpg" alt="Peta Konektivitas" class="img-fluid rounded-3 mb-3" style="max-height: 600px;" onerror="this.src='https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?auto=format&fit=crop&w=1000&q=80';">
                    <p class="text-muted mb-0" style="font-size: 14px;">Peta konektivitas regional menuju Ibu Kota Nusantara yang mengintegrasikan jaringan transportasi udara, laut, dan darat.</p>
                </div>
            </div>
        </section>

        <!-- MODAL POP-UP PDF RENCANA KA PERKOTAAN K-IKN -->
        <div class="modal fade" id="pdfModalKaPerkotaan" tabindex="-1" aria-labelledby="pdfModalKaPerkotaanLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" style="max-width: 90vw;">
                <div class="modal-content" style="border-radius: 16px; overflow: hidden; height: 90vh;">
                    <!-- Header Modal -->
                    <div class="modal-header" style="background-color: #204420; color: #ffffff; border-bottom: none;">
                        <h5 class="modal-title fw-bold" id="pdfModalKaPerkotaanLabel" style="font-family: 'Sutasoma Display', serif; font-size: 1.1rem;">
                            <i class="fas fa-file-pdf me-2"></i> Dokumen Rencana KA Perkotaan K-IKN
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Body Modal dengan PDF Viewer -->
                    <div class="modal-body p-0" style="height: calc(100% - 56px);">
                        <iframe src="<?= $base_url; ?>assets/pdf/231122-Fgd-Sid-Ka-Perkotaan-Ikn.pdf" width="100%" height="100%" style="border: none;"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $content = ob_get_clean();
        require_once '../includes/base.php';
        ?>
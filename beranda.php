<?php
require_once 'config/database.php';

// Fetch Data FAQ dari Database
$faqs = [];
try {
    if (isset($pdo)) {
        $pdo->setAttribute(PDO::ATTR_TIMEOUT, 2);
        $stmt = $pdo->query("SELECT * FROM beranda_faq ORDER BY urutan ASC");
        $faqs = $stmt->fetchAll();
    }
} catch (Exception $e) {
    $faqs = [];
}

$title = "Beranda - Profil Mobilitas IKN";

ob_start();
?>

<!-- Custom Style Tambahan -->
<style>

    /* Jika di base.php ada pembungkus seperti <main>, .content, atau .container-fluid */
    main, .main-content, .content, #content {
        padding-top: 0 !important;
        margin-top: 0 !important;
        background-color: #f8f9fa !important;
    }
    
    /* Utility font-size hasil konversi rem Bootstrap ke px */
    .font-size-40px { font-size: 40px !important; }
    .font-size-32px { font-size: 32px !important; }
    .font-size-28px { font-size: 28px !important; }
    .font-size-24px { font-size: 24px !important; }
    .font-size-16px { font-size: 16px !important; }

    /* CSS Reset Mencegah Overflow Kanan secara Mutlak */
    body, html {
        width: 100% !important;
        max-width: 100% !important;
        overflow-x: hidden !important;
    }

    .row {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    /* Hero Wrapper & Slideshow Background */
    .hero-container-wrapper {
        position: relative;
        background-color: #1b3821;
        color: white;
        min-height: auto;
        width: 100%;
        display: flex;
        align-items: center;
        padding-top: 180px; 
        padding-bottom: 180px;
        box-sizing: border-box;
        overflow: hidden;
    }

    /* Overlay Slideshow Item */
    .hero-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        z-index: 1;
    }

    .hero-slide.active {
        opacity: 1;
    }

    /* Inner Content */
    .hero-container-wrapper .container {
        position: relative;
        z-index: 2;
    }

    .btn-green-ikn {
        font-family: 'Sutasoma Display', sans-serif;
        background-color: #ffffff;
        color: #1d1d1d;
        border: 1px solid #2e6e2e;
        border-radius: 8px;
        padding: 10px 24px;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .btn-green-ikn:hover { background-color: #204420; color: white; }

    /* Green Stats Container- VISI */
    .stats-banner {
        background-color: #204420;
        padding: 60px 0;
        width: 100%;
    }

    .stat-card-green {
        background-color: #285728;
        border-radius: 12px;
        padding: 24px;
        height: 100%;
    } 

    .stat-card-green h2 {
        font-family: 'Sutasoma Text', sans-serif !important;
        font-weight: 400 !important;
        color: #ffffff !important;   
        font-size: 35px;
        margin-bottom: 8px;
    } 

    .stat-card-green p {
        font-family: 'Sutasoma Text', sans-serif !important;
        font-weight: 500 !important;
        color: #d1dcd3 !important;   
        font-size: 14px;
        line-height: 1.4;
    }

    /* Cards Prinsip Pembangunan */
    .prinsip-card-custom {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        height: 100%;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1),
                    box-shadow 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .prinsip-card-custom .card-img-wrapper {
        overflow: hidden;
        height: 220px;
    }

    .prinsip-card-custom img.card-banner {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .prinsip-card-custom .prinsip-icon {
        transition: filter 0.35s ease, opacity 0.35s ease, transform 0.35s ease;
    }

    .prinsip-card-custom:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 30px rgba(32, 68, 32, 0.12);
        border-color: #204420;
    }

    .prinsip-card-custom:hover img.card-banner {
        transform: scale(1.06);
    }

    .prinsip-card-custom:hover .prinsip-icon {
        filter: grayscale(0%) !important;
        opacity: 0.9 !important;
        transform: scale(1.1);
    }

    .prinsip-card-custom h4 {
        font-family: 'Sutasoma Display', sans-serif !important;
        font-weight: 700;
    }
    .prinsip-card-custom small {
        font-family: 'Sutasoma Display', sans-serif !important;
    }

    /* TAHAP PEMBANGUNAN IKN */
    .strategic-timeline-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 12px;
        align-items: start;
    }

    @media (max-width: 991px) {
        .strategic-timeline-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 24px;
        }
    }

    .strategic-column {
        cursor: pointer;
        transition: transform 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .strategic-column:hover {
        transform: translateY(-10px);
    }

    .strategic-photo-wrap {
        position: relative;
        width: 100%;
        height: 380px;
        overflow: visible !important;
        flex-shrink: 0;
    }

    .strategic-photo-inner {
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: box-shadow 0.4s ease;
    }

    .strategic-column:hover .strategic-photo-inner {
        box-shadow: 0 15px 35px rgba(150, 104, 68, 0.35), 0 0 15px rgba(150, 104, 68, 0.2);
    }

    .strategic-photo-inner::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 60%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, 0.3),
            transparent
        );
        transform: skewX(-25deg);
        transition: left 0.75s ease-in-out;
        z-index: 5;
    }

    .strategic-column:hover .strategic-photo-inner::after {
        left: 150%;
    }

    .strategic-photo {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), filter 0.5s ease;
    }

    .strategic-column:hover .strategic-photo {
        transform: scale(1.08);
        filter: brightness(1.08) contrast(1.02);
    }

    .strategic-year {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 145px;
        height: 54px;
        
        display: flex;
        align-items: center;
        justify-content: center;
        padding-bottom: 12px;
        
        background: linear-gradient(135deg, #966844);
        color: #ffffff;
        font-family: 'Sutasoma Display', Arial, sans-serif !important;
        font-size: 18px;
        font-weight: 700;
        line-height: 1;
        z-index: 20 !important;

        clip-path: polygon(
            21% 0%,
            79% 0%,
            100% 38%,
            79% 77%,
            21% 77%,
            0% 38%
        );

        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        filter: drop-shadow(0 4px 6px rgba(0,0,0,0.25));
    }

    .strategic-column:nth-child(1) .strategic-year,
    .strategic-column:nth-child(3) .strategic-year,
    .strategic-column:nth-child(5) .strategic-year {
        top: -27px;
        bottom: auto;
    }

    .strategic-column:nth-child(2) .strategic-year,
    .strategic-column:nth-child(4) .strategic-year {
        bottom: -27px;
        top: auto;
    }

    .strategic-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 12px;
        text-align: center;
        padding: 16px 12px;
        background-color: #f8f9fa;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        font-family: 'Sutasoma Text', sans-serif;
        font-size: 13px;
        color: #4a4a4a;
        line-height: 1.5;
        transition: all 0.4s ease;
    }

    .strategic-text p {
        margin: 0;
        padding: 8px 12px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.6);
        width: 100%;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .strategic-column:hover .strategic-text {
        background-color: #ffffff;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
    }

    .strategic-column:hover .strategic-text p {
        background: #fdfbfa;
        border-color: #e7d1c0;
        color: #0c0c0c;
        transform: translateY(-2px);
    }

    .strategic-text.top {
        height: 330px;
        margin-bottom: 12px;
    }

    .strategic-text.bottom {
        min-height: 330px;
        margin-top: 12px;
    }

    /* Banner Hijau Gelap Dokumen & App */
    .green-section-banner {
        background-color: #204420;
        color: white;
        font-family: 'Sutasoma Text', sans-serif;
        font-weight: 300;
        border-radius: 0px;
        padding: 60px 0;
    }
    .btn-doc-card {
        background-color: #d1dcd3;
        color: #1a1a1a;
        border-radius: 12px;
        padding: 16px 28px;
        font-family: 'Sutasoma Text', sans-serif;
        font-weight: 500;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* ANIMASI FLOATING UNTUK BUS GAMBAR FAQ */
    @keyframes busFloat {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-12px); }
        100% { transform: translateY(0px); }
    }

    .faq-bus-img {
        width: 100%;
        max-width: 250px;
        height: auto;
        display: block;
        margin: 0 auto;
        animation: busFloat 3.5s ease-in-out infinite;
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    .faq-bus-img:hover {
        transform: translateY(-12px) scale(1.04);
    }

    /* Accordion Custom */
    .faq-accordion .accordion-item {
        border: 1px solid #204420 !important;
        border-radius: 12px !important;
        margin-bottom: 16px;
        overflow: hidden;
    }

    /* Header Tombol FAQ */
    .faq-accordion .accordion-button {
        font-family: 'Sutasoma Display', sans-serif !important;
        font-weight: 500;
        font-size: 17px;
        padding: 20px 24px;
        background-color: #ffffff;
        color: #1a1a1a;
        transition: all 0.3s ease;
    }

    /* KETIKA FAQ DIBUKA */
    .faq-accordion .accordion-button:not(.collapsed) {
        background-color: #204420 !important;
        color: #ffffff !important;
        box-shadow: none;
    }

    .faq-accordion .accordion-button:not(.collapsed)::after {
        filter: brightness(0) invert(1);
    }

    /* Isi Jawaban FAQ */
    .faq-accordion .accordion-body {
        font-family: 'Sutasoma Text', sans-serif !important;
        font-size: 15px;
        line-height: 1.6;
        color: #333333 !important;
        background-color: #f8f9fa;
        padding: 20px 24px;
    }

    #siap-menjelajahi {
        scroll-margin-top: 90px; 
    }

    /* STYLING SECTION 5: SIAP MENJELAJAHI MOBILITAS DI IKN */
    .explore-ikn-section {
        background-color: #204420;
        color: #ffffff;
        padding: 20px 0;
        font-family: 'Sutasoma Text', sans-serif;
    }

    /* Judul Utama */
    .explore-ikn-section h1 {
        font-family: 'Sutasoma Display', sans-serif;
        font-weight: 700;
        font-size: 43px !important;
        color: #ffffff;
        line-height: 1.2;
    }

    /* KARTU PUTIH IKNOW LEBAR (SINGLE CARD) */
    .card-iknow-single {
        background-color: #ffffff;
        border-radius: 16px;
        padding: 28px 32px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .card-iknow-single .deskripsi-iknow {
        font-size: 15px;
        line-height: 1.6;
        color: #333333;
        margin-bottom: 24px;
        max-width: 95%;
    }

    /* CONTAINER DUA HP BERDAMPINGAN */
    .hp-double-preview-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        height: 100%;
    }

    .hp-double-preview-container img {
        height: 380px;
        width: auto;
        object-fit: contain;
        filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));
        transition: transform 0.3s ease;
    }

    .hp-double-preview-container img:hover {
        transform: translateY(-6px);
    }

    /* Tombol Store Berdampingan di DALAM Kartu */
    .store-buttons-horizontal {
        display: flex;
        gap: 8px;
        margin-top: auto;
        width: auto;
        justify-content: flex-start; /* Tombol rata kiri presisi seperti gambar */
        align-items: center;
        box-sizing: border-box;
        perspective: 1000px;
    }

    .btn-store-small-black {
        background: linear-gradient(145deg, #1a1a1a, #0d0d0d);
        color: #ffffff !important;
        font-family: 'Sutasoma Text', sans-serif;
        font-weight: 300;
        border-radius: 6px;
        padding: 10px 18px; /* PANJANG & TINGGI TOMBOL (Atur via Padding) */
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        flex: 0 0 auto;
        box-sizing: border-box;
        border: 1px solid rgba(255, 255, 255, 0.1);
        
        transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), 
                    box-shadow 0.25s ease, 
                    background 0.25s ease;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    /* EFEK HOVER MAJU KE DEPAN (3D POP-OUT) */
    .btn-store-small-black:hover { 
        background: linear-gradient(145deg, #666866);
        transform: scale(1.06);
        border-color: rgba(255, 255, 255, 0.4);
        z-index: 10;
    }

    .btn-store-small-black:active {
        transform: scale(0.98);
        box-shadow: 0 2px 6px rgba(32, 68, 32, 0.3);
    }

    /* 2. UKURAN IKON */
    .btn-store-small-black img.store-icon,
    .btn-store-small-black i.store-icon {
        width: 23px !important;
        height: 23px !important;
        font-size: 21px !important;
        object-fit: contain;
        flex-shrink: 0;
        transition: transform 0.25s ease;
    }

    .btn-store-small-black:hover img.store-icon,
    .btn-store-small-black:hover i.store-icon {
        transform: scale(1.1);
    }

    /* 3. UKURAN TEKS ATAS ("DAPATKAN DI") */
    .btn-store-small-black small { 
        font-size: 11px; 
        display: block; 
        line-height: 1; 
        text-transform: uppercase; 
        white-space: nowrap;
        opacity: 0.85;
    }

    /* 4. UKURAN TEKS UTAMA ("Google Play / App Store") */
    .btn-store-small-black strong { 
        font-size: 0.80rem; 
        display: block; 
        line-height: 1.1; 
        white-space: nowrap;
    }

    /* Deskripsi IKNOW di dalam Kartu */
    .card-mitra-darat-v1 .deskripsi-iknow {
        font-size: 14px;
        line-height: 1.5;
        color: #4a4a4a;
        margin-bottom: 16px;
    }

    /* Gambar HP di Kanan */
    .hp-preview-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        height: 100%;
    }

    .ikn-app-preview-img {
        max-height: 400px !important;
        width: auto;
        object-fit: contain;
    }
</style>

<!-- SECTION 1: HERO WITH AUTO SLIDESHOW BACKGROUND -->
<section class="hero-container-wrapper">
    <div class="hero-slide active" style="background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.65)), url('assets/images/beranda/banner1.jpeg');"></div>
    <div class="hero-slide" style="background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.65)), url('assets/images/beranda/banner2.jpeg');"></div>
    <div class="hero-slide" style="background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.65)), url('assets/images/beranda/banner3.jpeg');"></div>
    <div class="hero-slide" style="background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.65)), url('assets/images/beranda/banner4.jpeg');"></div>
    <div class="hero-slide" style="background-image: linear-gradient(rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.65)), url('assets/images/beranda/banner5.jpeg');"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3" style="line-height: 1.2;">
                    Bergerak dengan Mudah,<br>Terhubung, dan Ramah<br>Lingkungan di Ibu Kota<br>Nusantara
                </h1>
                <p class="font-size-16px mb-4 text-white-80" style="max-width: 750px; font-weight: 400; line-height: 1.6;">
                    Nusantara dirancang sebagai Kota 10 Menit yang berorientasi manusia dan berbasis transit dengan sistem transportasi andal, nyaman, dan ramah lingkungan. Pejalan kaki dan pesepeda menjadi prioritas aksesibilitas kawasan dan pusat aktivitas kota untuk mencapai kawasan hijau yang berkelanjutan.
                </p>
                
                <div class="d-flex flex-wrap gap-3">
                    <a href="pages/antarkota.php" class="btn btn-green-ikn">Layanan Antarkota</a>
                    <a href="pages/intrakota.php" class="btn btn-green-ikn">Layanan Intrakota</a>
                    <a href="#siap-menjelajahi" class="btn btn-green-ikn">Akses Lingkara</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS BANNER -->
<div class="stats-banner">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-3 col-6">
                <div class="stat-card-green">
                    <h2 class="fw-bold mb-2 font-size-40px">80%</h2>
                    <p class="small text-white-80 mb-0">Perjalanan dengan Transportasi Umum atau Mobilitas Aktif</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card-green">
                    <h2 class="fw-bold mb-2 font-size-40px">10 Menit</h2>
                    <p class="small text-white-80 mb-0">Perjalanan ke fasilitas penting dan simpul transportasi umum</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card-green">
                    <h2 class="fw-bold mb-2 font-size-40px">&lt;50 Menit</h2>
                    <p class="small text-white-80 mb-0">Koneksi transit ekspres dari KIPP ke bandara SAMS Sepinggan Balikpapan pada 2030</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card-green">
                    <h2 class="fw-bold mb-2 font-size-40px">2045</h2>
                    <p class="small text-white-80 mb-0">Untuk IKN (saat beroperasi) pada tahun 2045 di area seluas 256 ribu Ha</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 2: PRINSIP PEMBANGUNAN -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <h2 class="text-center fw-bold mb-5 font-size-28px" style="letter-spacing: 2px;">Prinsip Pembangunan</h2>
        <div class="row g-4">
            <!-- Kota Hutan -->
            <div class="col-md-4">
                <div class="prinsip-card-custom">
                    <div class="card-img-wrapper">
                        <img src="assets/images/beranda/kota_hutan.jpeg" alt="Kota Hutan" class="card-banner img-fluid">
                    </div>
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h4 class="fw-bold mb-0">Kota Hutan</h4>
                                <small class="text-muted fst-italic">(Forest City)</small>
                            </div>
                            <img src="assets/images/beranda/hutan.png" alt="Kota Hutan Icon" class="prinsip-icon img-fluid" style="width: 32px; height: 41px; filter: grayscale(100%); opacity: 0.4;">
                        </div>
                        <p class="text-muted small mt-3">Kota yang didominasi bentang lanskap berstruktur hutan/RTH, dengan pendekatan lanskap terintegrasi untuk kehidupan yang berdampingan dengan alam.</p>
                    </div>
                </div>
            </div>

            <!-- Kota Spons -->
            <div class="col-md-4">
                <div class="prinsip-card-custom">
                    <div class="card-img-wrapper">
                        <img src="assets/images/beranda/kota_spons.jpeg" alt="Kota Spons" class="card-banner img-fluid">
                    </div>
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h4 class="fw-bold mb-0">Kota Spons</h4>
                                <small class="text-muted fst-italic">(Sponge City)</small>
                            </div>
                            <img src="assets/images/beranda/spons.png" alt="Kota Spons Icon" class="prinsip-icon img-fluid" style="width: 27px; height: 41px; filter: grayscale(100%); opacity: 0.4;">
                        </div>
                        <p class="text-muted small mt-3">Sistem perairan sirkular yang menggabungkan arsitektur, desain tata kota, infrastruktur, dan prinsip berkelanjutan. Area perencanaan berperan seperti spons yang menyerap air hujan, menyaring melalui proses alami dan melepaskan air kebendungan, saluran air, dan akuifer.</p>
                    </div>
                </div>
            </div>

            <!-- Kota Cerdas -->
            <div class="col-md-4">
                <div class="prinsip-card-custom">
                    <div class="card-img-wrapper">
                        <img src="assets/images/beranda/kota_cerdas.webp" alt="Kota Cerdas" class="card-banner img-fluid">
                    </div>
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h4 class="fw-bold mb-0">Kota Cerdas</h4>
                                <small class="text-muted fst-italic">(Smart City)</small>
                            </div>
                            <img src="assets/images/beranda/cerdas.png" alt="Kota Cerdas Icon" class="prinsip-icon img-fluid" style="width: 43px; height: 41px; filter: grayscale(100%); opacity: 0.4;">
                        </div>
                        <p class="text-muted small mt-3">Komponen smart city mengidentifikasi elemen nilai tambah yang memanfaatkan kemajuan teknologi informasi & komunikasi, pengelolaan data perkotaan, dan teknologi digital untuk memberikan manfaat yang lebih besar bagi IKN secara keseluruhan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 3: TAHAP PEMBANGUNAN IKN -->
<section class="py-5 bg-white">
    <div class="container-fluid px-lg-5 py-4">
        <h2 class="text-center fw-bold mb-5 font-size-32px" style="font-family: 'Sutasoma Display', sans-serif;">
            Tahap Pembangunan Ibu Kota Nusantara
        </h2>
        
        <div class="strategic-timeline-grid">
            
            <!-- KOLOM 1 -->
            <div class="strategic-column">
                <div class="strategic-text top">
                    <p>Untuk populasi awal, infrastruktur dasar utama selesai dibangun dan berfungsi.</p>
                    <p>Pembangunan fasilitas utama (istana kepresidenan, perkantoran, dan hunian) di KIPP.</p>
                    <p>Pemindahan ASN tahap awal.</p>
                    <p>Inisiasi sektor-sektor ekonomi prioritas.</p>
                </div>
                <div class="strategic-photo-wrap">
                    <div class="strategic-year">2020-2024</div>
                    <div class="strategic-photo-inner">
                        <img src="assets/images/beranda/2020-2024.jpeg" alt="Tahap 2020-2024" class="strategic-photo">
                    </div>
                </div>
            </div>

            <!-- KOLOM 2 -->
            <div class="strategic-column">
                <div class="strategic-photo-wrap">
                    <div class="strategic-year">2025-2029</div>
                    <div class="strategic-photo-inner">
                        <img src="assets/images/beranda/2025-2029.jpeg" alt="Tahap 2025-2029" class="strategic-photo">
                    </div>
                </div>
                <div class="strategic-text bottom">
                    <p>Fasilitas transportasi umum baik primer maupun sekunder sudah dapat digunakan.</p>
                    <p>Perluasan Kawasan permukiman dan penyelesaian pemindahan ASN.</p>
                    <p>Pembangunan infrastruktur dasar dan sosial ke 1B dan 1C.</p>
                    <p>Pembangunan lanjutan dan pemeliharaan infrastruktur terbangun.</p>
                </div>
            </div>

            <!-- KOLOM 3 -->
            <div class="strategic-column">
                <div class="strategic-text top">
                    <p>Pengembangan utilitas terintegrasi serta KA Bandara Balikpapan – KIPP.</p>
                    <p>Meningkatkan investasi klaster ekonomi.</p>
                    <p>Pengembangan kawasan industri di klaster ekonomi superhub.</p>
                    <p>Penguatan kota cerdas, pusat digital, dan pendidikan.</p>
                </div>
                <div class="strategic-photo-wrap">
                    <div class="strategic-year">2030-2034</div>
                    <div class="strategic-photo-inner">
                        <img src="assets/images/beranda/2030-2034.jpeg" alt="Tahap 2030-2034" class="strategic-photo">
                    </div>
                </div>
            </div>

            <!-- KOLOM 4 -->
            <div class="strategic-column">
                <div class="strategic-photo-wrap">
                    <div class="strategic-year">2035-2039</div>
                    <div class="strategic-photo-inner">
                        <img src="assets/images/beranda/2035-2039.jpeg" alt="Tahap 2035-2039" class="strategic-photo">
                    </div>
                </div>
                <div class="strategic-text bottom">
                    <p>Perkembangan pesat bidang pendidikan & kesehatan.</p>
                    <p>Meningkatkan daya saing pendidikan dan sosial budaya masyarakat.</p>
                    <p>Penambahan kapasitas infrastruktur dasar seiring peningkatan populasi.</p>
                    <p>Peningkatan kapasitas dan diversifikasi ekonomi.</p>
                </div>
            </div>

            <!-- KOLOM 5 -->
            <div class="strategic-column">
                <div class="strategic-text top">
                    <p>Pengembangan angkutan umum massal berbasis jalan dari KA di IKN.</p>
                    <p>Pemantapan infrastruktur dan utilitas terintegrasi.</p>
                    <p>Mencapai net zero-carbon emission dan 100% energi terbarukan.</p>
                    <p>Menjadi kota terdepan di dunia dalam hal daya saing.</p>
                </div>
                <div class="strategic-photo-wrap">
                    <div class="strategic-year">2040-2045</div>
                    <div class="strategic-photo-inner">
                        <img src="assets/images/beranda/2040-2045.jpeg" alt="Tahap 2040-2045" class="strategic-photo">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECTION 4: DOKUMEN BANNER & FAQ -->
<section class="green-section-banner">
    <div class="container text-center">
        <h2 class="fw-bold mb-3 font-size-32px">Dokumen &amp; Sumber Daya</h2>
        <p class="text-white-80 mx-auto mb-4" style="max-width: 800px; font-size: 16px;">
            Akses dokumen resmi, dataset, serta referensi pengembangan Kota Cerdas dan Mobilitas Cerdas Nusantara untuk mendukung riset, pembelajaran, dan publikasi.
        </p>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <a href="https://satudata.ikn.go.id/" target="_blank" class="btn-doc-card">
                <i class="fas fa-file-pdf font-size-24px text-dark"></i>
                <span>satu_data.ikn.go.id</span>
            </a>
            <a href="https://kms.kotacerdas.id" target="_blank" class="btn-doc-card">
                <i class="fas fa-map-marked-alt font-size-24px text-dark"></i>
                <span>kms.kotacerdas.id</span>
            </a>
        </div>
    </div>
</section>

<!-- SECTION FAQ -->
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            
            <!-- KOLOM KIRI: Judul FAQ + Gambar Bus Melayang -->
            <div class="col-lg-4 text-center text-lg-start">
                <h2 class="fw-bold font-size-32px mb-3">Pertanyaan<br>Sering Diajukan</h2>
                <p class="text-muted mb-4">Temukan jawaban cepat untuk pertanyaan seputar sistem mobilitas di Nusantara.</p>
                
                <div class="faq-bus-container text-center mt-3">
                    <img src="assets/images/beranda/FAQ.png" alt="Bus FAQ Illustration" class="faq-bus-img">
                </div>
            </div>

            <!-- KOLOM KANAN: Accordion FAQ -->
            <div class="col-lg-8">
                <div class="accordion faq-accordion" id="faqAccordion">
                    <?php if (!empty($faqs)): ?>
                        <?php foreach ($faqs as $index => $faq): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $index; ?>">
                                <button class="accordion-button <?= $index !== 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index; ?>">
                                    <?= htmlspecialchars($faq['pertanyaan']); ?>
                                </button>
                            </h2>
                            <div id="collapse<?= $index; ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : ''; ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    <?= nl2br(htmlspecialchars($faq['jawaban'])); ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Belum ada FAQ yang ditambahkan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 5: SIAP MENJELAJAHI MOBILITAS DI IKN -->
<section id="siap-menjelajahi" class="explore-ikn-section">
    <div class="container">
        <div class="row align-items-center g-4">
            
            <!-- KOLOM KIRI: Judul & 1 Kartu Putih IKNOW -->
            <div class="col-lg-7">
                <div class="mb-4">
                    <h1 class="mb-0">Siap Menjelajahi Mobilitas di IKN?</h1>
                </div>

                <!-- Kartu Tunggal IKNOW -->
                <div class="card-iknow-single">
                    <!-- Header Logo & Nama Aplikasi -->
                    <div class="mb-3 d-flex align-items-center gap-3">
                        <img src="assets/images/beranda/Icon IKN_Square.png" alt="IKNOW Logo" style="height: 48px; width: auto; object-fit: contain;">
                        <h3 class="mb-0 text-dark" style="font-family: 'Sutasoma Display', serif; font-size: 29px; font-weight: 700; letter-spacing: 0.5px;">IKNOW</h3>
                    </div>
                    
                    <!-- Deskripsi IKNOW -->
                    <p class="deskripsi-iknow">
                        Akses peta dan layanan Bus Nusantara (Lingkara) melalui aplikasi IKNOW. Jika aplikasi belum terpasang, unduh terlebih dahulu melalui Google Play atau App Store.
                    </p>

                    <!-- Tombol Download Store Berdampingan -->
                    <div class="store-buttons-horizontal">
                        <a href="https://play.google.com/store/apps/details?id=com.ikn.smartcity&hl=id" target="_blank" class="btn-store-small-black">
                            <img src="assets/images/beranda/OIP.png" class="store-icon" alt="Google Play">
                            <div>
                                <small>DAPATKAN DI</small>
                                <strong>Google Play</strong>
                            </div>
                        </a>
                        <a href="https://apps.apple.com/id/app/iknow/id6477182949" target="_blank" class="btn-store-small-black">
                            <i class="fab fa-apple store-icon"></i>
                            <div>
                                <small>Download di</small>
                                <strong>App Store</strong>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- KOLOM KANAN: Preview 2 HP Berdampingan -->
            <div class="col-lg-5">
                <div class="hp-double-preview-container">
                    <img src="assets/images/beranda/IKNOW_Home.png" alt="IKNOW Home Preview" onerror="this.src='assets/images/beranda/IKNOW2.png';">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- JavaScript untuk mengganti background per 5 detik -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelectorAll('.hero-slide');
    let currentSlide = 0;

    if (slides.length > 1) {
        setInterval(() => {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }, 5000);
    }
});
</script>

<?php
$content = ob_get_clean();
require_once 'includes/base.php';
?>
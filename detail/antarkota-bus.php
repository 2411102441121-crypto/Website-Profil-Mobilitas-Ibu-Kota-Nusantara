<?php
// detail/antarkota-bus.php
require_once '../config/database.php';
if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/ikn-mobility/";
$id = isset($_GET['id']) ? $_GET['id'] : 'bus-antarkota';

$page  = 'antarkota';
$title = "Bus Antarkota - Profil Mobilitas IKN";
ob_start();
?>

<!-- CUSTOM STYLING -->
<style>
    /* HERO STYLING */
    .hero-badge-pill {
        background-color: #DDE5DD;
        color: #204420;
        border: 1px solid #d8e3da;
        border-radius: 20px;
        padding: 6px 16px;
        font-size: 0.78rem;
        font-weight: 400;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    /* Ukuran Foto/Gambar Kecil di Dalam Badge */
    .hero-badge-pill img {
        width: 18px;
        height: 18px;
        object-fit: contain;
        border-radius: 3px; /* Opsional, beri efek rounded kecil jika gambarnya persegi */
    }

    .hero-title-bus {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 2.8rem;
        font-weight: 700;
        color: #1a2e1a;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .hero-desc-bus {
        font-family: 'Sutasoma Text', sans-serif !important;
        font-size: 1rem;
        color: #4a5568;
        line-height: 1.7;
        margin-bottom: 30px;
        max-width: 480px;
    }

    .btn-ikn-dark {
        background-color: #204420;
        color: #ffffff;
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 400;
        font-size: 0.9rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.25s ease;
    }
    .btn-ikn-dark:hover {
        background-color: #152d15;
        color: #ffffff;
    }

    .btn-ikn-outline {
        background-color: transparent;
        color: #1a2e1a;
        border: 1.5px solid #1a2e1a;
        border-radius: 8px;
        padding: 12px 24px;
        font-weight: 400;
        font-size: 0.9rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.25s ease;
    }
    .btn-ikn-outline:hover {
        background-color: #1a2e1a;
        color: #ffffff;
    }

    /* GALLERY HERO WITH ZOOM HOVER */
    .hero-main-img-box {
        position: relative;
        border-radius: 18px;
        overflow: hidden;
        height: 390px;
        background-color: #bcc2bc;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    }

    .hero-main-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: opacity 0.5s ease-in-out, transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}

    .hero-main-img-box::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-image: inherit;
        background-size: cover;
        background-position: center;
        transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .hero-main-img-box:hover::before {
        transform: scale(1.08);
    }

    /* THUMBNAIL KECIL DI BAWAH (5 FOTO) */
    .thumb-gallery-box {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        height: 80px;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .thumb-gallery-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .thumb-gallery-box::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-image: inherit;
        background-size: cover;
        background-position: center;
        transition: transform 0.4s ease;
    }
    .thumb-gallery-box:hover::before {
        transform: scale(1.1);
    }

    .thumb-overlay-more {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.5);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        z-index: 2;
    }

    .card-custom-flat { 
        background: #ffffff; 
        border: 1px solid #e9ecef; 
        border-radius: 16px; 
    }

    /* INDICATOR ACTIVE THUMBNAIL */
    .thumb-gallery-box.active {
        border-color: #204420;
        transform: scale(1.03);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    /* Pengaturan posisi tentang layanan agar naik ke atas */
    .tentang-layanan-wrapper {
        margin-top: -40px; /* Adjust angka minus ini (-10px s/d -30px) untuk menaikkan posisi */
    }

    /* KONEKTIVITAS STEP CARDS */
    .step-card-box {
        background: #e8f0eb;
        border-radius: 14px;
        padding: 16px 12px;
        text-align: center;
        border: 1px solid #e8eee9;
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        cursor: pointer;
    }

    /* WADAH GAMBAR IKON */
    .step-icon-wrapper {
        width: 48px;
        height: 48px;
        background: #eef4f0;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px auto;
        font-size: 1.2rem;
        color: #204420;
        overflow: hidden; /* Agar gambar tidak keluar dari sudut rounded */
        padding: 8px;    /* Memberi jarak/padding gambar dari kotak background */
    }

    /* PENGATURAN FOTO/GAMBAR IKON */
    .step-icon-img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Menjaga proporsi gambar agar rapi */
        transition: transform 0.25s ease;
    }

    /* PENGATURAN HURUF JUDUL (Samarinda - Balikpapan - Penajam) */
    .step-title {
        font-family: 'Sutasoma Text', sans-serif;
        font-size: 0.89rem;
        font-weight: 600;
        color: #204420;
        margin-bottom: 4px;
        line-height: 1.3;
    }

    /* PENGATURAN HURUF SUBJUDUL (Titik Awal Keberangkatan) */
    .step-desc {
        font-size: 0.75rem;
        font-weight: 400;     /* Ketebalan huruf deskripsi */
        color: #6c757d;
        margin-bottom: 0;
    }

    /* ================= HOVER SIMPEL ================= */
    .step-card-box:hover {
        transform: translateY(-4px); /* Kartu naik sedikit ke atas */
        border-color: #b8cabf;      /* Warna border sedikit lebih tegas */
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.06); /* Bayangan halus */
    }

    .step-card-box:hover .step-icon-img {
        transform: scale(1.1); /* Gambar ikon membesar halus */
    }

    /* DETAIL RUTE CARDS */
    .route-card-teal {
        background-color: #e8f0eb;
        border-radius: 16px;
        padding: 28px 24px;
        height: 100%;
    }
    .route-card-title {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 1.25rem;
        font-weight: 700;
        color: #1a2e1a;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #d2e0d6;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .route-label {
        font-family: 'Sutasoma Text', sans-serif;
        font-size: 0.82rem;
        font-weight: 600;
        color: #6a7a6c;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        margin-bottom: 4px;
        display: block;
    }
    .route-val {
        font-size: 0.88rem;
        color: #2d3748;
        font-weight: 500;
        margin-bottom: 16px;
        line-height: 1.5;
    }

    /* OPERATOR CARDS */
    .operator-card-item {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 16px;
        height: 100%;
    }
    .operator-icon-box {
        width: 48px;
        height: 48px;
        background: #f1f5f2;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
        overflow: hidden; /* Mencegah foto keluar dari batas rounded */
        padding: 8px;     /* Padding agar gambar tidak terlalu menempel ke tepi */
    }

    /* WADAH FOTO/GAMBAR DALAM KOTAK IKON OPERATOR */
    .operator-icon-box img {
        width: 95%;
        height: 95%;
        object-fit: contain; /* Menjaga proporsi logo/gambar */
    }

    /* PENGATURAN TEBAL TIPIS JUDUL OPERATOR */
    .operator-title {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 1.0rem;
        font-weight: 600; /* Atur ketebalan huruf di sini (misal: 600 = Semi-bold, 700 = Bold, 800 = Extra-bold) */
        color: #1a2e1a;
        margin-bottom: 4px;
        line-height: 1.2;
    }

    .info-sidebar-dark {
        background-color: #204420;
        color: #ffffff;
        border-radius: 20px;
        padding: 32px 28px;
    }
    .info-sidebar-dark .divider {
        height: 1px;
        background-color: rgba(255, 255, 255, 0.15);
        margin: 16px 0;
    }

    /* TITIK JEMPUT CARD */
    .pickup-card {
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid #e9ecef;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .pickup-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .pickup-img-box {
        position: relative;
        height: 220px;
        background-color: #204420;
        overflow: hidden;
    }
    .pickup-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    /* EFEK GRADASI MEMUDAR DI BAWAH FOTO (LIKE GAMBAR 1) */
    .pickup-img-box::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 60%;
        background: linear-gradient(to top, #ffffff 0%, rgba(255, 255, 255, 0) 100%);
    }

    .pickup-icon-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background-color: #204420;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        z-index: 2;
        overflow: hidden; /* Mencegah gambar meluap keluar dari badge */
        padding: 6px;     /* Memberi jarak/ruang napas agar ikon tidak menempel ke tepi badge */
    }

    /* Pengaturan gambar/foto di dalam badge ikon */
    .pickup-icon-badge img {
        width: 22px;
        height: 22px;
        object-fit: contain;
    }

    /* KARTU TUJUAN AKHIR HIJAU GELAP (IKN) */
    .pickup-card-dark {
        background-color: #204420;
        border-radius: 18px;
        border: 1px solid #e9ecef;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .pickup-card-dark:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    }

    .pickup-dark-img-box {
        position: relative;
        height: 220px;
        background-color: #204420;
        overflow: hidden;
    }
    .pickup-dark-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* GRADASI FADE OUT DARI FOTO KE BACKGROUND HIJAU GELAP (#204420) */
    .pickup-dark-img-box::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 65%;
        background: linear-gradient(to top, #204420 0%, rgba(32, 68, 32, 0.4) 50%, transparent 100%);
    }

    /* INTEGRASI SEAMLESS CARD */
    .seamless-box {
        background-color: #e8f0eb;
        border-radius: 24px;
        padding: 48px 40px;
    }
    .flow-step-white {
        background: #ffffff;
        border-radius: 12px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
    }
    .flow-step-dark {
        background: #1b381b;
        color: #ffffff;
        border-radius: 12px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .flow-arrow {
        text-align: center;
        color: #a3b8a6;
        font-size: 1.2rem;
        margin: 8px 0;
    }

    /* PENGATURAN GAMBAR IKON DALAM FLOW SEAMLESS */
    .flow-step-white .operator-icon-box,
    .flow-step-dark .operator-icon-box {
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: 6px; /* Memberi ruang agar gambar tidak menempel ke tepi */
    }

    .flow-step-white .operator-icon-box img,
    .flow-step-dark .operator-icon-box img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    /* EFEK SCROLL HALUS SAAT DIKLIK */
    html {
        scroll-behavior: smooth;
    }

    /* MEMBERIKAN JARAK OFFSET ATAS AGAR JUDUL TIDAK TERTUTUP NAVBAR */
    #rute-perjalanan,
    #titik-jemput {
        scroll-margin-top: 100px; /* Sesuaikan angka ini (misal 90px - 120px) sesuai tinggi Navbarmu */
    }
</style>

<div class="container py-4">
    
    <!-- ================= GAMBAR 1: HERO & TENTANG LAYANAN ================= -->
    <div class="row g-4 mb-5 align-items-center">
        <!-- Teks Sisi Kiri -->
        <div class="col-lg-5">
            <div class="hero-badge-pill">
                <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bus.png" alt="Ikon Layanan Antarkota" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3448/3448339.png';">
                <span>Layanan Antarkota</span>
            </div>
            <h1 class="hero-title-bus">Bus Antarkota</h1>
            <p class="hero-desc-bus">
                Layanan bus antarkota yang menghubungkan sejumlah simpul transportasi dengan kawasan Ibu Kota Nusantara.
            </p>
            <div class="d-flex gap-3 flex-wrap">
                <a href="#rute-perjalanan" class="btn-ikn-dark">Lihat Rute Perjalanan</a>
                <a href="#titik-jemput" class="btn-ikn-outline">Titik Jemput & Keberangkatan</a>
            </div>
        </div>

        <!-- Galeri Foto Sisi Kanan -->
        <div class="col-lg-7">
            <!-- Gambar Utama (Slide Gede) -->
            <div class="hero-main-img-box mb-3">
                <img id="mainHeroImage" src="<?= $base_url; ?>assets/images/antarkota/bus_sinarjaya.jpeg" alt="Gambar Utama Bus Antarkota">
            </div>
            
            <!-- 5 Thumbnail Foto Kecil -->
            <div class="row g-2">
                <div class="col">
                    <div class="thumb-gallery-box active" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/bus_sinarjaya.jpeg', 0)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/bus_sinarjaya.jpeg" alt="Thumb 1">
                    </div>
                </div>
                <div class="col">
                    <div class="thumb-gallery-box" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/bus_antarkota.jpeg', 1)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/bus_antarkota.jpeg" alt="Thumb 2">
                    </div>
                </div>
                <div class="col">
                    <div class="thumb-gallery-box" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/bus_damri.jpg', 2)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/bus_damri.jpg" alt="Thumb 3">
                    </div>
                </div>
                <div class="col">
                    <div class="thumb-gallery-box" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/bus_transkaltim.jpeg', 3)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/bus_transkaltim.jpeg" alt="Thumb 4">
                    </div>
                </div>
                <div class="col">
                    <div class="thumb-gallery-box" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/bus.jpg', 4)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/bus.jpg" alt="Thumb 5">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TENTANG LAYANAN -->
    <div class="mb-4 tentang-layanan-wrapper">
        <h5 class="fw-semibold mb-2 d-flex align-items-center gap-2 text-dark fs-5">
            <i class="far fa-circle-question text-muted"></i> Tentang Layanan
        </h5>
        <div class="card-custom-flat p-4 shadow-sm">
            <p class="text-secondary mb-0" style="line-height: 1.8; font-size: 0.95rem;">
                Bus antarkota merupakan layanan transportasi yang menghubungkan Ibu Kota Nusantara dengan kota dan simpul transportasi di wilayah sekitarnya. Layanan ini mendukung perjalanan masyarakat menuju dan dari IKN melalui jaringan transportasi jalan yang terintegrasi dengan berbagai simpul perjalanan.
            </p>
        </div>
    </div>

    <hr class="my-4" style="border-color: #e9ecef;">

    <!-- ================= GAMBAR 2: KONEKTIVITAS & DETAIL RUTE ================= -->
    <div class="mb-5 text-center">
        <h2 class="fw-bold text-dark font-size-28px mb-1" style="font-family: 'Sutasoma Display', serif;">Konektivitas Bus Antarkota</h2>
        <p class="text-muted small mb-4">Kota/Simpul Transportasi &rarr; IKN</p>

        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="step-card-box shadow-sm">
                    <div class="step-icon-wrapper"><i class="fas fa-city"></i></div>
                    <h6 class="step-title">Samarinda &middot; Balikpapan &middot; Penajam</h6>
                    <p class="step-desc">Titik Awal Keberangkatan</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="step-card-box shadow-sm">
                    <div class="step-icon-wrapper">
                        <img src="<?= $base_url; ?>assets/images/antarkota/ikon_simpul.png" alt="Ikon Simpul" class="step-icon-img" onerror="this.src='https://cdn-icons-png.flaticon.com/512/2885/2885440.png';">
                    </div>
                    <h6 class="step-title">Simpul Transportasi</h6>
                    <p class="step-desc">Pelabuhan, Terminal, Bandara</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="step-card-box shadow-sm">
                    <div class="step-icon-wrapper">
                        <img src="<?= $base_url; ?>assets/images/antarkota/ikon_restarea.png" alt="Ikon Rest Area" class="step-icon-img" onerror="this.src='https://cdn-icons-png.flaticon.com/512/924/924514.png';">
                    </div>
                    <h6 class="step-title">Rest Area IKN</h6>
                    <p class="step-desc">Titik Persinggahan</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="step-card-box shadow-sm">
                    <div class="step-icon-wrapper">
                        <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bangunan.png" alt="Ikon KIPP" class="step-icon-img" onerror="this.src='https://cdn-icons-png.flaticon.com/512/1018/1018641.png';">
                    </div>
                    <h6 class="step-title">KIPP IKN</h6>
                    <p class="step-desc">Tujuan Akhir</p>
                </div>
            </div>
        </div>
    </div>

    <!-- DETAIL RUTE PERJALANAN -->
    <div id="rute-perjalanan" class="mb-5 pt-4">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark font-size-28px mb-1" style="font-family: 'Sutasoma Display', serif;">Detail Rute Perjalanan</h2>
            <p class="text-muted small">Panduan rute perjalanan dari berbagai kota dan wilayah sekitar menuju kawasan Ibu Kota Nusantara.</p>
        </div>

        <div class="row g-4">
            <!-- Balikpapan -> IKN -->
            <div class="col-lg-4 col-md-6">
                <div class="route-card-teal shadow-sm">
                    <h5 class="route-card-title"><i class="fas fa-route"></i> Balikpapan &rarr; IKN</h5>
                    
                    <span class="route-label">TITIK KEBERANGKATAN</span>
                    <p class="route-val">Terminal Batu Ampar &middot; SAMS Sepinggan &middot; Pelabuhan Semayang &middot; Plaza Balikpapan</p>

                    <span class="route-label">RUTE</span>
                    <p class="route-val">Balikpapan &rarr; Tol Balsam &rarr; Samboja &rarr; Semoi &rarr; Sepaku &rarr; IKN</p>

                    <span class="route-label">MODA</span>
                    <p class="route-val mb-0">Bus / Angkutan Antarmoda</p>
                </div>
            </div>

            <!-- Samarinda -> IKN -->
            <div class="col-lg-4 col-md-6">
                <div class="route-card-teal shadow-sm">
                    <h5 class="route-card-title"><i class="fas fa-route"></i> Samarinda &rarr; IKN</h5>
                    
                    <span class="route-label">TITIK KEBERANGKATAN</span>
                    <p class="route-val">Terminal/halte layanan bus Samarinda</p>

                    <span class="route-label">RUTE</span>
                    <p class="route-val">Samarinda &rarr; Balikpapan &rarr; Transit &rarr; Samboja &rarr; Semoi &rarr; Sepaku &rarr; IKN</p>

                    <span class="route-label">MODA</span>
                    <p class="route-val mb-0">Bus antarkota + transit Balikpapan</p>
                </div>
            </div>

            <!-- Penajam -> IKN -->
            <div class="col-lg-4 col-md-6">
                <div class="route-card-teal shadow-sm">
                    <h5 class="route-card-title"><i class="fas fa-route"></i> Penajam &rarr; IKN</h5>
                    
                    <span class="route-label">TITIK KEBERANGKATAN</span>
                    <p class="route-val">Penajam Paser Utara</p>

                    <span class="route-label">RUTE</span>
                    <p class="route-val">Penajam &rarr; Sepaku &rarr; IKN</p>

                    <span class="route-label">MODA</span>
                    <p class="route-val mb-0">Kendaraan pribadi</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5" style="border-color: #e9ecef;">

    <!-- ================= GAMBAR 3: LAYANAN BUS & TITIK JEMPUT ================= -->
    <div class="row g-4 mb-5">
        <!-- Kolom Kiri: Operator Bus -->
        <div class="col-lg-7">
            <h3 class="fw-bold text-dark fs-3 mb-1" style="font-family: 'Sutasoma Display', serif;">Layanan Bus Antarkota</h3>
            <p class="text-muted small mb-4">Operator dan layanan bus yang mendukung konektivitas regional menuju IKN.</p>

            <div class="row g-3 mb-3">
                <!-- 1. Sinar Jaya -->
                <div class="col-sm-6">
                    <div class="operator-card-item shadow-sm">
                        <div class="operator-icon-box">
                            <!-- Foto/Gambar Ikon Operator 1 -->
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bus.png" alt="Sinar Jaya">
                        </div>
                        <div>
                            <h6 class="operator-title">Sinar Jaya</h6>
                            <p class="text-muted mb-0" style="font-size: 0.78rem;">Layanan bus antarkota yang menghubungkan Balikpapan dengan kawasan Ibu Kota Nusantara.</p>
                        </div>
                    </div>
                </div>

                <!-- 2. Cititrans -->
                <div class="col-sm-6">
                    <div class="operator-card-item shadow-sm">
                        <div class="operator-icon-box">
                            <!-- Foto/Gambar Ikon Operator 2 -->
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bus.png" alt="Cititrans">
                        </div>
                        <div>
                            <h6 class="operator-title">Cititrans</h6>
                            <p class="text-muted mb-0" style="font-size: 0.78rem;">Layanan bus antarkota yang menghubungkan Balikpapan dengan kawasan Ibu Kota Nusantara.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-custom-flat p-3 shadow-sm d-flex align-items-center gap-3">
                <div class="operator-icon-box" style="width:38px; height:38px; font-size:1rem;"><i class="fas fa-plus"></i></div>
                <div>
                    <h6 class="fw-semibold text-dark mb-0" style="font-size:0.95rem;">Operator Lainnya</h6>
                    <p class="text-muted mb-0" style="font-size: 0.78rem;">Operator bus lainnya dapat ditambahkan sesuai rute dan layanan yang tersedia.</p>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Info Sidebar Hijau Tua -->
        <div class="col-lg-5">
            <div class="info-sidebar-dark shadow">
                <h5 class="fw-medium mb-4 text-white d-flex align-items-center gap-2 fs-6">
                    <i class="far fa-circle-question opacity-75"></i> Informasi Layanan
                </h5>

                <small class="d-block" style="font-family: 'Sutasoma Text', serif; font-size:0.8rem; color: #C5EDBE; font-weight: 400; letter-spacing:1px;">WILAYAH LAYANAN</small>
                <p class="fw-normal text-white mb-0 fs-6">Kota dan simpul transportasi di sekitar IKN</p>
                <div class="divider"></div>

                <small class="d-block" style="font-family: 'Sutasoma Text', serif; font-size:0.8rem; color: #C5EDBE; font-weight: 400; letter-spacing:1px;">MODA</small>
                <p class="fw-normal text-white mb-0 fs-6">Bus Antarkota</p>
                <div class="divider"></div>

                <small class="d-block" style="font-family: 'Sutasoma Text', serif; font-size:0.8rem; color: #C5EDBE; font-weight: 400; letter-spacing:1px;">JARINGAN JALAN</small>
                <p class="fw-normal text-white mb-0 fs-6">Jaringan jalan regional menuju IKN</p>
                <div class="divider"></div>

                <small class="d-block" style="font-family: 'Sutasoma Text', serif; font-size:0.8rem; color: #C5EDBE; font-weight: 400; letter-spacing:1px;">SIMPUL PERJALANAN</small>
                <p class="fw-normal text-white mb-0 fs-6">Terminal, bandara, pelabuhan, dan kawasan IKN</p>
            </div>
        </div>
    </div>

    <!-- TITIK JEMPUT & KEBERANGKATAN -->
    <div id="titik-jemput" class="mb-5 pt-3">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark fs-2 mb-1" style="font-family: 'Sutasoma Display', serif;">Titik Jemput & Keberangkatan</h2>
            <p class="text-muted small">Titik integrasi utama yang melayani kedatangan dan keberangkatan penumpang menuju kawasan Nusantara.</p>
        </div>

        <div class="row g-3">
            <!-- 1. Bandara SAMS Sepinggan -->
            <div class="col-lg col-md-4 col-sm-6">
                <div class="pickup-card">
                    <div class="pickup-img-box">
                        <img src="<?= $base_url; ?>assets/images/antarkota/sams_sepinggan.jpeg" alt="Bandara SAMS Sepinggan" onerror="this.src='https://images.unsplash.com/photo-1542296332-2e4473faf563?auto=format&fit=crop&w=600&q=80';">
                        <div class="pickup-icon-badge">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pesawat2.png" alt="Ikon Bandara" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3125/3125713.png';">
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <h6 class="fw-medium text-dark mb-1" style="font-size:0.9rem; line-height:1.3;">Bandara SAMS Sepinggan</h6>
                        <span class="text-muted small d-block" style="font-size:0.78rem;">Balikpapan</span>
                    </div>
                </div>
            </div>

            <!-- 2. Pelabuhan Semayang -->
            <div class="col-lg col-md-4 col-sm-6">
                <div class="pickup-card">
                    <div class="pickup-img-box">
                        <img src="<?= $base_url; ?>assets/images/antarkota/semayang.jpeg" alt="Pelabuhan Semayang" onerror="this.src='https://images.unsplash.com/photo-1559136555-9303baea8ebd?auto=format&fit=crop&w=600&q=80';">
                        <div class="pickup-icon-badge"><i class="fas fa-ship"></i></div>
                    </div>
                    <div class="p-3 pt-0">
                        <h6 class="fw-medium text-dark mb-1" style="font-size:0.9rem; line-height:1.3;">Pelabuhan Semayang</h6>
                        <span class="text-muted small d-block" style="font-size:0.78rem;">Balikpapan</span>
                    </div>
                </div>
            </div>

            <!-- 3. Plaza Balikpapan -->
            <div class="col-lg col-md-4 col-sm-6">
                <div class="pickup-card">
                    <div class="pickup-img-box">
                        <img src="<?= $base_url; ?>assets/images/antarkota/plaza_balikpapan.jpg" alt="Plaza Balikpapan" onerror="this.src='https://images.unsplash.com/photo-1567449303078-57ad995bd301?auto=format&fit=crop&w=600&q=80';">
                        <div class="pickup-icon-badge">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_belanja.png" alt="Ikon Mall" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3081/3081559.png';">
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <h6 class="fw-medium text-dark mb-1" style="font-size:0.9rem; line-height:1.3;">Plaza Balikpapan</h6>
                        <span class="text-muted small d-block" style="font-size:0.78rem;">Balikpapan</span>
                    </div>
                </div>
            </div>

            <!-- 4. Terminal Batu Ampar -->
            <div class="col-lg col-md-4 col-sm-6">
                <div class="pickup-card">
                    <div class="pickup-img-box">
                        <img src="<?= $base_url; ?>assets/images/antarkota/terminal_batuampar.jpg" alt="Terminal Batu Ampar" onerror="this.src='https://images.unsplash.com/photo-1570125909232-eb263c188f7e?auto=format&fit=crop&w=600&q=80';">
                        <div class="pickup-icon-badge">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bus2.png" alt="Ikon Terminal" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3448/3448339.png';">
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <h6 class="fw-medium text-dark mb-1" style="font-size:0.9rem; line-height:1.3;">Terminal Batu Ampar</h6>
                        <span class="text-muted small d-block" style="font-size:0.78rem;">Balikpapan</span>
                    </div>
                </div>
            </div>

            <!-- 5. Kawasan IKN (Tujuan Perjalanan - Background Hijau Gelap) -->
            <div class="col-lg col-md-4 col-sm-6">
                <div class="pickup-card-dark">
                    <div class="pickup-dark-img-box">
                        <img src="<?= $base_url; ?>assets/images/antarkota/ikn2.jpeg" alt="Kawasan IKN" onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=600&q=80';">
                        <div class="pickup-icon-badge" style="background-color: #ffffff;">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bangunan.png" alt="Ikon Bendera" onerror="this.src='https://cdn-icons-png.flaticon.com/512/149/149060.png';">
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <h6 class="fw-medium text-white mb-1" style="font-size:0.9rem; line-height:1.3;">Kawasan IKN</h6>
                        <span class="text-white-50 small d-block" style="font-size:0.78rem;">Tujuan Perjalanan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ================= GAMBAR 4: INTEGRASI PERJALANAN SEAMLESS ================= -->
    <div class="seamless-box my-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <span class="hero-badge-pill mb-3"><i class="fas fa-rotate"></i> KONEKSI SEAMLESS</span>
                <h2 class="fw-bold text-dark fs-1 mb-3" style="font-family: 'Sutasoma Display', serif;">Integrasi Perjalanan</h2>
                <p class="text-secondary mb-0" style="line-height: 1.8; font-size:0.95rem;">
                    Setibanya di simpul transportasi IKN, layanan bus antarkota dirancang untuk terintegrasi secara mulus dengan jaringan transportasi perkotaan (Intra-city). Sistem ini memastikan kelancaran mobilitas penumpang dari wilayah regional langsung menuju titik tujuan akhir di dalam kawasan Nusantara.
                </p>
            </div>

            <div class="col-lg-6">
                <div class="d-flex flex-column gap-1">
                    <!-- 1. Bus Antarkota -->
                    <div class="flow-step-white">
                        <div class="operator-icon-box">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bus.png" alt="Bus Antarkota" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3448/3448339.png';">
                        </div>
                        <div>
                            <h6 class="fw-medium text-dark mb-0" style="font-family: 'Sutasoma Text', sans-serif !important; font-size:0.93rem;">Bus Antarkota</h6>
                            <span class="text-muted small">Layanan Regional</span>
                        </div>
                    </div>

                    <div class="flow-arrow"><i class="fas fa-arrow-down"></i></div>

                    <!-- 2. Simpul/Terminal IKN -->
                    <div class="flow-step-white">
                        <div class="operator-icon-box">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_simpul.png" alt="Simpul/Terminal IKN" onerror="this.src='https://cdn-icons-png.flaticon.com/512/2885/2885440.png';">
                        </div>
                        <div>
                            <h6 class="fw-medium text-dark mb-0" style="font-family: 'Sutasoma Text', sans-serif !important; font-size:0.93rem;">Simpul/Terminal IKN</h6>
                            <span class="text-muted small">Titik Transit</span>
                        </div>
                    </div>

                    <div class="flow-arrow"><i class="fas fa-arrow-down"></i></div>

                    <!-- 3. Bus Perkotaan -->
                    <div class="flow-step-white">
                        <div class="operator-icon-box">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bus.png" alt="Bus Perkotaan" onerror="this.src='https://cdn-icons-png.flaticon.com/512/1048/1048314.png';">
                        </div>
                        <div>
                            <h6 class="fw-medium text-dark mb-0" style="font-family: 'Sutasoma Text', sans-serif !important; font-size:0.93rem;">Bus Perkotaan</h6>
                            <span class="text-muted small">Intra-city IKN</span>
                        </div>
                    </div>

                    <div class="flow-arrow"><i class="fas fa-arrow-down"></i></div>

                    <!-- 4. Tujuan Akhir -->
                    <div class="flow-step-dark">
                        <div class="operator-icon-box" style="background:rgba(255,255,255,0.15);">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bangunan2.png" alt="Tujuan Akhir" onerror="this.src='https://cdn-icons-png.flaticon.com/512/149/149060.png';">
                        </div>
                        <div>
                            <h6 class="fw-medium text-white mb-0" style="font-family: 'Sutasoma Text', sans-serif !important; font-size:0.93rem;">Tujuan Akhir</h6>
                            <span class="text-white-50 small">Kawasan Nusantara</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Array 5 foto untuk slideshow otomatis
    const heroImages = [
        "<?= $base_url; ?>assets/images/antarkota/bus_sinarjaya.jpeg",
        "<?= $base_url; ?>assets/images/antarkota/bus_antarkota.jpeg",
        "<?= $base_url; ?>assets/images/antarkota/bus_damri.jpg",
        "<?= $base_url; ?>assets/images/antarkota/bus_transkaltim.jpeg",
        "<?= $base_url; ?>assets/images/antarkota/bus.jpg"
    ];

    let currentImageIndex = 0;
    let autoSlideTimer;

    // Fungsi ganti foto saat thumbnail diklik atau berganti otomatis
    function changeHeroImage(element, imageSrc, index) {
        const mainImg = document.getElementById('mainHeroImage');
        const thumbnails = document.querySelectorAll('.thumb-gallery-box');

        // Efek fade out
        mainImg.style.opacity = '0.3';

        setTimeout(() => {
            mainImg.src = imageSrc;
            mainImg.style.opacity = '1';
        }, 250);

        // Update indikator active border
        thumbnails.forEach(thumb => thumb.classList.remove('active'));
        if (element) {
            element.classList.add('active');
        } else {
            thumbnails[index].classList.add('active');
        }

        currentImageIndex = index;
        resetAutoSlide();
    }

    // Fungsi perputaran otomatis secara berurutan
    function startAutoSlide() {
        autoSlideTimer = setInterval(() => {
            currentImageIndex = (currentImageIndex + 1) % heroImages.length;
            const nextSrc = heroImages[currentImageIndex];
            changeHeroImage(null, nextSrc, currentImageIndex);
        }, 4000); // Berganti otomatis setiap 4 detik
    }

    function resetAutoSlide() {
        clearInterval(autoSlideTimer);
        startAutoSlide();
    }

    // Jalankan slideshow otomatis begitu halaman dimuat
    document.addEventListener('DOMContentLoaded', startAutoSlide);
</script>

<?php
$content = ob_get_clean();
require_once '../includes/base.php';
?>
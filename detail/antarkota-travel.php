<?php
// detail/antarkota-travel.php
require_once '../config/database.php';
if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/ikn-mobility/";
$id = isset($_GET['id']) ? $_GET['id'] : 'travel';

$page  = 'antarkota';
$title = "Travel Antarkota - Profil Mobilitas IKN";
ob_start();
?>

<!-- CUSTOM STYLING -->
<style>
    /* HERO STYLING */
    .hero-badge-pill {
        background-color: #f1f5f2;
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

    .hero-title-travel {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 2.8rem;
        font-weight: 700;
        color: #1a2e1a;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .hero-desc-travel {
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

    /* GALLERY HERO SLIDESHOW */
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

    .thumb-gallery-box.active {
        border-color: #204420;
        transform: scale(1.03);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .tentang-layanan-wrapper {
        margin-top: -40px;
    }

    .card-custom-flat { 
        background: #ffffff; 
        border: 1px solid #e9ecef; 
        border-radius: 16px; 
    }

    /* AKSES TRAVEL CARDS */
    .access-card-teal {
        background-color: #E1ECEA;
        border-radius: 16px;
        padding: 28px 24px;
        height: 100%;
        border: 1px solid #d4e3d8;
    }

    .access-card-icon {
        width: 44px;
        height: 44px;
        background-color: #204420;
        color: #ffffff;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-bottom: 20px;
    }

    .access-card-title {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 1.3rem;
        font-weight: 600;
        color: #1a2e1a;
        margin-bottom: 8px;
    }

    .access-badge {
        display: inline-block;
        background-color: #d1e2d6;
        color: #204420;
        font-size: 0.72rem;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 6px;
        margin-bottom: 16px;
    }

    .access-card-desc {
        font-size: 0.88rem;
        color: #4a5568;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* PILIHAN LAYANAN OPERATOR CARDS */
    .operator-card-box {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 12px rgba(0,0,0,0.02);
    }

    .operator-card-icon {
        width: 48px;
        height: 48px;
        background-color: #E1ECEA;
        color: #204420;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-bottom: 20px;
        overflow: hidden; /* Mencegah gambar meluap dari sudut rounded */
        padding: 8px;     /* Ruang napas agar gambar tidak menempel ke tepi */
    }

    /* PENGATURAN GAMBAR/FOTO DI DALAM WADAH IKON OPERATOR */
    .operator-card-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .operator-card-title {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 1.2rem;
        font-weight: 700;
        color: #1a2e1a;
        margin-bottom: 8px;
    }

    .operator-card-desc {
        font-size: 0.85rem;
        color: #64748b;
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .operator-time-info {
        font-size: 0.8rem;
        color: #475569;
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        padding-top: 12px;
        border-top: 1px dashed #e2e8f0;
    }

    /* Efek Hover Judul Operator Travel */
    .operator-card-box {
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .operator-card-box:hover {
        transform: translateY(-4px);
        border-color: #b8cabf;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    }

    .operator-card-box:hover .operator-card-title {
        color: #204420 !important; /* Judul menyala hijau tua saat kartu di-hover */
    }

    /* TITIK JEMPUT AREA CARDS */
    .pickup-area-card {
        background-color: #E1ECEA;
        border-radius: 14px;
        padding: 20px 24px;
        margin-bottom: 16px;
        border: 1px solid #d4e3d8;
    }

    .pickup-area-title {
        font-weight: 700;
        color: #1a2e1a;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 6px;
    }

    .pickup-area-desc {
        font-family: 'Sutasoma Text', serif, sans-serif !important;
        font-size: 0.85rem;
        color: #4a5568;
        margin-bottom: 0;
        line-height: 1.5;
    }

    /* SIDEBAR SEBELUM BERANGKAT (GREEN DARK) */
    .before-travel-sidebar {
        background-color: #204420;
        color: #ffffff;
        border-radius: 20px;
        padding: 32px 28px;
        height: auto;
    }

    .before-travel-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 20px;
    }

    .before-travel-item:last-child {
        margin-bottom: 0;
    }

    .before-travel-item i {
        color: #82A77C;
        font-size: 1.15rem;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .before-travel-item p {
        font-size: 0.88rem;
        color: #82A77C;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* ALUR PERJALANAN TIMELINE */
    .flow-travel-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 16px;
        position: relative;
        text-align: center;
    }

    @media (max-width: 991px) {
        .flow-travel-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }
    }

    .flow-step-item {
        position: relative;
        z-index: 2;
    }

    .flow-icon-circle {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 14px auto;
        font-size: 1.25rem;
    }

    /* Pengaturan gambar/foto di dalam lingkaran alur perjalanan */
    .flow-icon-circle img {
        width: 26px;
        height: 26px;
        object-fit: contain;
        display: block;
    }

    .flow-icon-dark {
        background-color: #204420;
        color: #ffffff;
    }

    .flow-icon-accent {
        background-color: #82A77C;
        color: #1b381b;
    }

    .flow-step-num {
        font-family: 'Sutasoma Text', serif, sans-serif !important;
        font-weight: 600;
        font-size: 0.95rem;
        color: #000000;
        margin-bottom: 4px;
    }

    .flow-step-sub {
        font-size: 0.78rem;
        color: #64748b;
        margin-bottom: 0;
    }

    .flow-step-item {
    transition: transform 0.25s ease;
    cursor: pointer;
    }

    .flow-step-item:hover {
        transform: translateY(-4px);
    }

    .flow-step-item:hover .flow-icon-circle {
        transform: scale(1.1);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
    }

    .flow-step-item:hover .flow-step-num {
        color: #204420;
    }

    /* INFORMASI LAYANAN UMUM CARDS */
    .general-info-card {
        background-color: #E1ECEA;
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        border: 1px solid #d4e3d8;
    }

    /* Pengaturan gambar/foto untuk Informasi Layanan Umum */
    .general-info-icon {
        width: 24px;
        height: 24px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
    }

    .general-info-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .general-info-title {
        font-weight: 700;
        color: #1a2e1a;
        font-size: 1rem;
        margin-bottom: 8px;
    }

    .general-info-desc {
        font-size: 0.85rem;
        color: #4a5568;
        line-height: 1.6;
        margin-bottom: 0;
    }

    /* INTEGRASI DENGAN MOBILITAS IKN CARD */
    .integration-ikn-box {
        background-color: #E1ECEA;
        border-radius: 24px;
        padding: 48px 40px;
    }

    /* PENGATURAN DESKRIPSI BESAR/KECIL TEKS */
    .integration-ikn-desc {
        font-size: 0.92rem; /* Atur besar kecil huruf deskripsi di sini (misal: 0.88rem - 1rem) */
        color: #4a5568;
        line-height: 1.7;
        max-width: 750px;
        margin-bottom: 32px;
    }

    /* KOTAK IKON */
    .integration-item-icon {
        width: 44px;
        height: 44px;
        background-color: #ffffff; /* Latar belakang putih seperti desain awal */
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        overflow: hidden;
        padding: 8px;              /* Memberi ruang napas gambar agar tidak nempel ke tepi */
        margin-bottom: 16px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }

    /* SASAR LANGSUNG TAG <img> DI DALAM .integration-item-icon */
    .integration-item-icon img {
        width: 100% !important;
        height: 100% !important;
        object-fit: contain;
        display: block;
    }

    /* EFEK SCROLL HALUS & OFFSET */
    html {
        scroll-behavior: smooth;
    }

    #layanan-travel,
    #alur-perjalanan,
    #titik-jemput {
        scroll-margin-top: 100px;
    }
</style>

<div class="container py-4">
    
    <!-- ================= GAMBAR 1: HERO & TENTANG LAYANAN ================= -->
    <div class="row g-4 mb-5 align-items-center">
        <!-- Teks Sisi Kiri -->
        <div class="col-lg-5">
            <div class="hero-badge-pill">
                <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" alt="Ikon Layanan Antarkota" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3448/3448339.png';">
                <span>Layanan Antarkota</span>
            </div>
            <h1 class="hero-title-travel">Travel</h1>
            <p class="hero-desc-travel">
                Pilihan perjalanan darat yang menghubungkan Samarinda, Balikpapan, dan Penajam dengan Kawasan Ibu Kota Nusantara.
            </p>
            <div class="d-flex gap-3 flex-wrap">
                <a href="#layanan-travel" class="btn-ikn-dark">Lihat Layanan Travel</a>
                <a href="#alur-perjalanan" class="btn-ikn-outline">Lihat Alur Perjalanan</a>
            </div>
        </div>

        <!-- Galeri Foto Sisi Kanan (Slideshow 5 Gambar) -->
        <div class="col-lg-7">
            <!-- Gambar Utama -->
            <div class="hero-main-img-box mb-3">
                <img id="mainHeroImage" src="<?= $base_url; ?>assets/images/antarkota/travel_cititrans.png" alt="Travel Antarkota Utama">
            </div>
            
            <!-- 5 Thumbnail Kecil -->
            <div class="row g-2">
                <div class="col">
                    <div class="thumb-gallery-box active" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/travel_cititrans.png', 0)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/travel_cititrans.png" alt="Thumb 1">
                    </div>
                </div>
                <div class="col">
                    <div class="thumb-gallery-box" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/travel.jpeg', 1)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/travel.jpeg" alt="Thumb 2">
                    </div>
                </div>
                <div class="col">
                    <div class="thumb-gallery-box" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/travel3.jpg', 2)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/travel3.jpg" alt="Thumb 3">
                    </div>
                </div>
                <div class="col">
                    <div class="thumb-gallery-box" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/travel2.jpg', 3)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/travel2.jpg" alt="Thumb 4">
                    </div>
                </div>
                <div class="col">
                    <div class="thumb-gallery-box" onclick="changeHeroImage(this, '<?= $base_url; ?>assets/images/antarkota/travel4.jpg', 4)">
                        <img src="<?= $base_url; ?>assets/images/antarkota/travel4.jpg" alt="Thumb 5">
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
                Layanan travel merupakan salah satu pilihan transportasi darat yang mendukung perjalanan masyarakat menuju dan dari kawasan Ibu Kota Nusantara (IKN), dengan konektivitas dari Samarinda, Balikpapan, dan Penajam melalui jaringan jalan darat. Perjalanan dari Samarinda dapat dilakukan melalui Balikpapan sebagai titik transit sebelum melanjutkan perjalanan menuju IKN, sedangkan dari Balikpapan perjalanan dapat dilanjutkan menuju IKN dan dari Penajam tersedia pilihan menggunakan travel maupun kendaraan pribadi melalui Sepaku.
            </p>
        </div>
    </div>

    <hr class="my-4" style="border-color: #e9ecef;">

    <!-- ================= GAMBAR 2: AKSES TRAVEL & PILIHAN LAYANAN ================= -->
    <div class="mb-4">
        <h2 class="fw-bold text-dark fs-2 mb-1" style="font-family: 'Sutasoma Display', serif;">Akses Travel Menuju IKN</h2>
        <p class="text-muted small mb-4">Perjalanan dari berbagai kota di sekitar IKN melalui jaringan jalan darat.</p>

        <div class="row g-4">
            <!-- Samarinda -> IKN -->
            <div class="col-lg-4 col-md-6">
                <div class="access-card-teal shadow-sm">
                    <div class="access-card-icon"><i class="fas fa-route"></i></div>
                    <h5 class="access-card-title">Samarinda &rarr; IKN</h5>
                    <span class="access-badge">Akses Regional</span>
                    <p class="access-card-desc">
                        Perjalanan dari Samarinda menuju IKN dapat dilakukan melalui Balikpapan sebagai titik transit, kemudian dilanjutkan melalui jaringan jalan menuju kawasan IKN. Ataupun dapat melakukan perjalanan langsung menuju IKN menggunakan kendaraan pribadi maupun travel.
                    </p>
                </div>
            </div>

            <!-- Balikpapan -> IKN -->
            <div class="col-lg-4 col-md-6">
                <div class="access-card-teal shadow-sm">
                    <div class="access-card-icon"><i class="fas fa-route"></i></div>
                    <h5 class="access-card-title">Balikpapan &rarr; IKN</h5>
                    <span class="access-badge">Akses Regional</span>
                    <p class="access-card-desc">
                        Perjalanan dari Balikpapan menuju IKN melalui jaringan jalan regional menuju kawasan Sepaku.
                    </p>
                </div>
            </div>

            <!-- Penajam -> IKN -->
            <div class="col-lg-4 col-md-6">
                <div class="access-card-teal shadow-sm">
                    <div class="access-card-icon"><i class="fas fa-route"></i></div>
                    <h5 class="access-card-title">Penajam &rarr; IKN</h5>
                    <span class="access-badge">Akses Lokal</span>
                    <p class="access-card-desc">
                        Perjalanan dari Penajam menuju IKN melalui jaringan jalan darat menuju Sepaku dan kawasan IKN.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- PILIHAN LAYANAN TRAVEL -->
    <div id="layanan-travel" class="mb-4 pt-3">
        <h2 class="fw-bold text-dark fs-2 mb-1" style="font-family: 'Sutasoma Display', serif;">Pilihan Layanan Travel</h2>
        <p class="text-muted small mb-4">Berbagai operator penyedia layanan perjalanan menuju kawasan IKN.</p>

        <div class="row g-4 mb-2">
            <!-- Cititrans -->
            <div class="col-lg-3 col-md-6">
                <div class="operator-card-box">
                    <div>
                        <div class="operator-card-icon">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" alt="Cititrans" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3448/3448339.png';">
                        </div>
                        <h5 class="operator-card-title">Cititrans</h5>
                        <p class="operator-card-desc">Shuttle eksekutif menggunakan armada van modern dengan pilihan waktu keberangkatan terjadwal dan berkala.</p>
                    </div>
                    <div class="operator-time-info">
                        <i class="far fa-clock text-muted"></i> Tersedia Setiap Hari
                    </div>
                </div>
            </div>

            <!-- Delina Trans -->
            <div class="col-lg-3 col-md-6">
                <div class="operator-card-box">
                    <div>
                        <div class="operator-card-icon">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" alt="Delina Trans" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3448/3448339.png';">
                        </div>
                        <h5 class="operator-card-title">Delina Trans</h5>
                        <p class="operator-card-desc">Layanan travel reguler dengan sistem jemput antar pintu (door-to-door) untuk rute antarkota di Kalimantan Timur.</p>
                    </div>
                    <div class="operator-time-info">
                        <i class="far fa-clock text-muted"></i> Jadwal Berkala
                    </div>
                </div>
            </div>

            <!-- Travel Lokal Jasa -->
            <div class="col-lg-3 col-md-6">
                <div class="operator-card-box">
                    <div>
                        <div class="operator-card-icon">
                            <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" alt="Travel Lokal Jasa" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3448/3448339.png';">
                        </div>
                        <h5 class="operator-card-title">Travel Lokal Jasa</h5>
                        <p class="operator-card-desc">Pilihan travel lokal konvensional dengan cakupan titik penjemputan dan area layanan yang lebih luas.</p>
                    </div>
                    <div class="operator-time-info">
                        <i class="far fa-clock text-muted"></i> Bervariasi
                    </div>
                </div>
            </div>
        </div>
        <small class="text-muted fst-italic" style="font-size:0.75rem;">*Ketersediaan armada, jadwal, dan tarif mengikuti ketentuan masing-masing operator penyedia layanan.</small>
    </div>

    <hr class="my-4" style="border-color: #e9ecef;">

    <!-- ================= GAMBAR 3: TITIK JEMPUT & ALUR PERJALANAN ================= -->
    <div id="titik-jemput" class="row g-4 mb-5">
        <!-- Kolom Kiri: Titik Jemput berdasarkan Wilayah -->
        <div class="col-lg-7">
            <h3 class="fw-bold text-dark fs-3 mb-1" style="font-family: 'Sutasoma Display', serif;">Titik Jemput & Keberangkatan</h3>
            <p class="text-muted small mb-4">Lokasi umum titik awal perjalanan travel berdasarkan wilayah.</p>

            <div class="pickup-area-card shadow-sm">
                <h6 class="pickup-area-title"><i class="fas fa-city"></i> Area Samarinda</h6>
                <p class="pickup-area-desc">Titik kumpul keberangkatan umumnya berada di terminal bus utama atau pool masing-masing operator di pusat kota Samarinda.</p>
            </div>

            <div class="pickup-area-card shadow-sm">
                <h6 class="pickup-area-title"><i class="fas fa-city"></i> Area Balikpapan</h6>
                <p class="pickup-area-desc">Keberangkatan dapat diakses dari Bandara SAMS Sepinggan, Terminal Batu Ampar, atau lokasi pool operator tersebar di Balikpapan.</p>
            </div>

            <div class="pickup-area-card shadow-sm">
                <h6 class="pickup-area-title"><i class="fas fa-building"></i> Area Penajam</h6>
                <p class="pickup-area-desc">Tersedia titik-titik penjemputan di area Penajam Paser Utara untuk akses yang lebih dekat menuju Sepaku.</p>
            </div>
        </div>

        <!-- Kolom Kanan: Sebelum Berangkat (Hijau Tua) -->
        <div class="col-lg-5">
            <div class="before-travel-sidebar shadow">
                <h5 class="fw-semibold mb-4" style="color: #82A77C; font-size: 1.2rem;">Sebelum Berangkat</h5>
                <div class="before-travel-item">
                    <i class="far fa-check-circle"></i>
                    <p>Khusus travel door-to-door, konfirmasi titik jemput 24 jam sebelum keberangkatan. Untuk airport shuttle, pastikan e-tiket sudah dipesan sebelum jadwal armada jalan.</p>
                </div>

                <div class="before-travel-item">
                    <i class="far fa-check-circle"></i>
                    <p>Pastikan membawa identitas diri yang berlaku.</p>
                </div>

                <div class="before-travel-item">
                    <i class="far fa-check-circle"></i>
                    <p>Tiba di pool/shelter 30 menit sebelum jadwal, atau sudah siap di lokasi penjemputan jika menggunakan layanan door-to-door.</p>
                </div>

                <div class="before-travel-item">
                    <i class="far fa-check-circle"></i>
                    <p>Perhatikan kebijakan bagasi dari masing-masing layanan travel.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ALUR PERJALANAN TRAVEL -->
    <div id="alur-perjalanan" class="mb-5 pt-3 text-center">
        <h2 class="fw-bold text-dark fs-2 mb-5" style="font-family: 'Sutasoma Display', serif;">Alur Perjalanan Travel</h2>

        <div class="flow-travel-grid">
            <div class="flow-step-item">
                <div class="flow-icon-circle flow-icon-dark">
                    <img src="<?= $base_url; ?>assets/images/antarkota/lokasi.png" alt="Kota Asal" onerror="this.src='https://cdn-icons-png.flaticon.com/512/684/684908.png';">
                </div>
                <h6 class="flow-step-num">1. Kota Asal</h6>
                <p class="flow-step-sub">Samarinda / Balikpapan / Penajam</p>
            </div>

            <div class="flow-step-item">
                <div class="flow-icon-circle flow-icon-dark"><i class="fas fa-map-pin"></i></div>
                <h6 class="flow-step-num">2. Titik Jemput</h6>
                <p class="flow-step-sub">Pool / Terminal / Bandara</p>
            </div>

            <div class="flow-step-item">
                <div class="flow-icon-circle flow-icon-accent">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" alt="Perjalanan Darat" onerror="this.src='https://cdn-icons-png.flaticon.com/512/3448/3448339.png';">
                </div>
                <h6 class="flow-step-num">3. Perjalanan Darat</h6>
                <p class="flow-step-sub">Via jalan tol atau arteri</p>
            </div>

            <div class="flow-step-item">
                <div class="flow-icon-circle flow-icon-dark"><i class="fas fa-building"></i></div>
                <h6 class="flow-step-num">4. Sepaku</h6>
                <p class="flow-step-sub">Area penyangga utama IKN</p>
            </div>

            <div class="flow-step-item">
                <div class="flow-icon-circle flow-icon-dark">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_bangunan2.png" alt="Kawasan IKN" onerror="this.src='https://cdn-icons-png.flaticon.com/512/149/149060.png';">
                </div>
                <h6 class="flow-step-num">5. Kawasan IKN</h6>
                <p class="flow-step-sub">Tujuan Perjalanan</p>
            </div>
        </div>
    </div>

    <hr class="my-4" style="border-color: #e9ecef;">

    <!-- ================= GAMBAR 4: INFORMASI LAYANAN UMUM & INTEGRASI ================= -->
    <div class="mb-4">
        <h2 class="fw-bold text-dark fs-2 mb-4" style="font-family: 'Sutasoma Display', serif;">Informasi Layanan Umum</h2>

        <div class="row g-4">
            <!-- 1. Titik Jemput -->
            <div class="col-lg-3 col-md-6">
                <div class="general-info-card shadow-sm">
                    <div class="general-info-icon">
                        <img src="<?= $base_url; ?>assets/images/antarkota/lokasi2.png" alt="Titik Jemput" onerror="this.src='https://cdn-icons-png.flaticon.com/512/684/684908.png';">
                    </div>
                    <h6 class="general-info-title">Titik Jemput</h6>
                    <p class="general-info-desc">Penjemputan disesuaikan dengan area yang dilayani masing-masing operator, baik door-to-door maupun point-to-point.</p>
                </div>
            </div>

            <!-- 2. Jadwal -->
            <div class="col-lg-3 col-md-6">
                <div class="general-info-card shadow-sm">
                    <div class="general-info-icon">
                        <img src="<?= $base_url; ?>assets/images/antarkota/ikon_jadwal.png" alt="Jadwal" onerror="this.src='https://cdn-icons-png.flaticon.com/512/2693/2693507.png';">
                    </div>
                    <h6 class="general-info-title">Jadwal</h6>
                    <p class="general-info-desc">Sebagian besar layanan beroperasi setiap hari dengan pilihan keberangkatan yang luas, mulai dari dini hari hingga larut malam.</p>
                </div>
            </div>

            <!-- 3. Pemesanan -->
            <div class="col-lg-3 col-md-6">
                <div class="general-info-card shadow-sm">
                    <div class="general-info-icon">
                        <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pemesanan.png" alt="Pemesanan" onerror="this.src='https://cdn-icons-png.flaticon.com/512/1018/1018610.png';">
                    </div>
                    <h6 class="general-info-title">Pemesanan</h6>
                    <p class="general-info-desc">Pemesanan tiket dapat dilakukan melalui aplikasi, situs web resmi operator, atau langsung di loket.</p>
                </div>
            </div>

            <!-- 4. Tarif -->
            <div class="col-lg-3 col-md-6">
                <div class="general-info-card shadow-sm">
                    <div class="general-info-icon">
                        <img src="<?= $base_url; ?>assets/images/antarkota/ikon_Rp.png" alt="Tarif" onerror="this.src='https://cdn-icons-png.flaticon.com/512/2170/2170153.png';">
                    </div>
                    <h6 class="general-info-title">Tarif</h6>
                    <p class="general-info-desc">Biaya perjalanan bervariasi bergantung pada operator, jenis layanan (eksekutif/reguler), dan jarak tempuh.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- INTEGRASI DENGAN MOBILITAS IKN -->
    <div class="integration-ikn-box my-4 shadow-sm">
        <h2 class="fw-bold text-dark fs-2 mb-2" style="font-family: 'Sutasoma Display', serif;">Integrasi dengan Mobilitas IKN</h2>
        <p class="text-secondary small mb-6" style="max-width: 750px; line-height: 1.7;">
            Layanan travel antarkota menjadi bagian dari konektivitas menuju IKN dan dapat terhubung dengan sistem transportasi di kawasan Ibu Kota Nusantara.
        </p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="integration-item-icon">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_konektivitas.png" alt="Konektivitas Regional" class="operator-icon-img">
                </div>
                <h6 class="fw-semibold text-dark mb-2" style="font-size: 1rem;">Konektivitas Regional</h6>
                <p class="text-muted small mb-0" style="line-height: 1.6;">Menghubungkan kota-kota dan simpul transportasi di sekitar IKN.</p>
            </div>

            <div class="col-md-4">
                <div class="integration-item-icon">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_simpul.png" alt="Simpul Transportasi" class="operator-icon-img">
                </div>
                <h6 class="fw-semibold text-dark mb-2" style="font-size: 1rem;">Simpul Transportasi</h6>
                <p class="text-muted small mb-0" style="line-height: 1.6;">Perjalanan dapat terhubung dengan simpul transportasi untuk melanjutkan perjalanan menuju KIPP.</p>
            </div>

            <div class="col-md-4">
                <div class="integration-item-icon">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan.png" alt="Perjalanan Lanjutan" class="operator-icon-img">
                </div>
                <h6 class="fw-semibold text-dark mb-2" style="font-size: 1rem;">Perjalanan Lanjutan</h6>
                <p class="text-muted small mb-0" style="line-height: 1.6;">Akses mudah berpindah ke transportasi perkotaan IKN.</p>
            </div>
        </div>
    </div>

</div>

<!-- JAVASCRIPT SLIDESHOW GALERI HERO -->
<script>
    const heroImages = [
        "<?= $base_url; ?>assets/images/antarkota/travel_cititrans.png",
        "<?= $base_url; ?>assets/images/antarkota/travel.jpeg",
        "<?= $base_url; ?>assets/images/antarkota/travel3.jpg",
        "<?= $base_url; ?>assets/images/antarkota/travel2.jpg",
        "<?= $base_url; ?>assets/images/antarkota/travel4.jpg"
    ];

    let currentImageIndex = 0;
    let autoSlideTimer;

    function changeHeroImage(element, imageSrc, index) {
        const mainImg = document.getElementById('mainHeroImage');
        const thumbnails = document.querySelectorAll('.thumb-gallery-box');

        mainImg.style.opacity = '0.3';

        setTimeout(() => {
            mainImg.src = imageSrc;
            mainImg.style.opacity = '1';
        }, 250);

        thumbnails.forEach(thumb => thumb.classList.remove('active'));
        if (element) {
            element.classList.add('active');
        } else {
            thumbnails[index].classList.add('active');
        }

        currentImageIndex = index;
        resetAutoSlide();
    }

    function startAutoSlide() {
        autoSlideTimer = setInterval(() => {
            currentImageIndex = (currentImageIndex + 1) % heroImages.length;
            const nextSrc = heroImages[currentImageIndex];
            changeHeroImage(null, nextSrc, currentImageIndex);
        }, 4000);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideTimer);
        startAutoSlide();
    }

    document.addEventListener('DOMContentLoaded', startAutoSlide);
</script>

<?php
$content = ob_get_clean();
require_once '../includes/base.php';
?>
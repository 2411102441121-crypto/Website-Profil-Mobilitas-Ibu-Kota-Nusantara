<?php
$title = "Bus Perkotaan Nusantara - Profil Mobilitas IKN";
require_once __DIR__ . '/../admin/koneksi.php';

function e($value){ return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8'); }

ob_start();

$parent_page = 'intrakota'; // Penanda bahwa halaman ini bagian dari Layanan Intrakota
?>

<style>

body, 
main, 
.main-content, 
.content-wrapper {
    background-color: #f8faf9 !important; /* Sesuaikan warna abu-abu lembut pilihanmu */
}

.bus-subpage {
    background-color: #f8f9fa;
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
    padding: 30px 40px 30px;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
    /* color: #1a2e22; */
}

/* BAGIAN 1: HERO & RINGKASAN RUTE */

.hero-section {
    background: transparent !important; /* Hapus warna background gelap */
    padding: 0;
    margin-bottom: 20px;
}

.hero-grid {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr; /* Pembagian porsi kiri & kanan yang lebih seimbang */
    gap: 28px;
    margin-bottom: 0px;
    background: transparent !important;
}

.hero-left-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 40px 36px;
    border: 1px solid #ebedf0;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative; /* Wajib agar lingkaran tidak keluar dari kartu */
    overflow: hidden;   /* Wajib agar potong bentuk lingkaran di sudut kartu */
}

.hero-left-card h1 {
    font-size: 38px;
    font-weight: 800;
    color: #204420;
    margin: 0 0 16px;
    line-height: 1.2;
}

.hero-left-card p {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.6;
    color: #55695c;
    margin-bottom: 28px;
}

.hero-buttons {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 24px;
}

.btn-hero-primary {
    background: #204420;
    font-family: 'Sutasoma Display', sans-serif;
    color: #ffffff;
    padding: 12px 22px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background 0.2s;
}

.btn-hero-primary:hover {
    background: #10321a;
}

.btn-hero-secondary {
    background: #E8F2EE;
    font-family: 'Sutasoma Display', sans-serif;
    color: #204420;
    padding: 12px 22px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.free-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: transparent;
    border: 1px solid #d0e0d5;
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 500;
    color: #010402;
    width: fit-content;
}

/* Lingkaran Hijau Soft di Pojok Kiri Bawah */
.hero-left-card::before {
    content: '';
    position: absolute;
    bottom: -30px;
    left: -30px;
    width: 160px;
    height: 160px;
    background-color: #E8F2EE; /* Warna hijau sangat soft khas IKN */
    border-radius: 50%;       /* Membuat bentuk lingkaran bundar */
    z-index: 1;               /* Ditaruh di latar belakang isi kartu */
    pointer-events: none;
}

/* Pastikan Teks & Tombol Berada di Atas Lingkaran (z-index lebih tinggi) */
.hero-left-card h1,
.hero-left-card p,
.hero-left-card .hero-buttons,
.hero-left-card .free-badge {
    position: relative;
    z-index: 2;
}

/* CONTAINER HERO KANAN */
.hero-right-card {
    background: transparent !important;
    border-radius: 20px;
    overflow: hidden;
    border: none !important;
    border: none !important;
    display: flex;
    flex-direction: column;
    position: relative;
}

/* Mengatur Ukuran Foto Bus */
.bus-image-wrapper {
    width: 100%;
    height: 300px;
    background: #e2ece6; /* Fallback warna jika gambar belum muncul */
    border-radius: 20px 20px 0 0; /* Melengkung di bagian atas */
    overflow: hidden;
    position: relative; /* Penting untuk penumpukan gambar */
    background: #e2ece6;
}

.bus-image-wrapper img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    display: block;
}

.hero-slide-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;                             /* Gambar tersembunyi secara default */
    transition: opacity 1s ease-in-out;     /* Durasi transisi memudar (1 detik) */
    z-index: 1;
}

.hero-slide-img.active {
    opacity: 1;                             /* Gambar aktif yang tampil */
    z-index: 2;
}

.route-summary-card {
    background: #ffffff !important;
    border-radius: 20px !important;
    padding: 20px 24px;
    border: 1px solid #ebedf0 !important;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
    
    /* Kunci membuat kartu menumpuk ke atas gambar */
    margin-top: -50px; /* Menarik kartu naik ke atas foto */
    position: relative;
    z-index: 5;         /* Memastikan kartu berada di atas gambar */
}

.route-summary-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
}

.route-title {
    font-family: 'Sutasoma Text', sans-serif;
    display: flex;
    align-items: center;
    gap:10px;
    font-size: 14px;
    font-weight: 700;
    color: #204420;
    letter-spacing: 0.5px;
}

/* KOTAK HIJAU UNTUK IKON (Presisi Sesuai Gambar) */
.route-icon-box {
    width: 34px;
    height: 34px;
    background-color: #204420; /* Warna hijau tua IKN */
    color: #ffffff;            /* Warna ikon putih */
    border-radius: 10px;        /* Sudut membulat rapi */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    flex-shrink: 0;
}

.corridor-badge {
    background: #204420;
    color: #ffffff;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
}

.route-badges-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 6px;
    background: #E8F2EE;
    padding: 10px 14px;
    border-radius: 12px;
    margin-bottom: 16px;
}

.route-chip {
    padding: 4px 8px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    color: #ffffff;
}

/* Badge Warna Koridor Sesuai Peta */
.chip-1e  { background: #6E26B1; }
.chip-2   { background: #025BFD; }
.chip-2e  { background: #02F69F; color: #000; }
.chip-3   { background: #FEC803; color: #000; }
.chip-3e  { background: #FB0102; }
.chip-4   { background: #8A3938; }
.chip-1em { background: #D7AE76; color: #000; }
.chip-2em { background: #FDFC04; color: #000; }

/* Style Titik Bulat Pemisah di Antara 4 dan 1EM */
.badge-dot {
    color: #000000;
    font-size: 14px;
    font-weight: 700;
    line-height: 1;
    margin: 0 2px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.route-stats-footer {
    font-family: 'Sutasoma Text', sans-serif;
    font-weight: 400;
    display: flex;
    justify-content: space-between;
    border-top: 1px solid #edf2ef;
    padding-top: 12px;
    font-size: 12px;
    color: #55695c;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 6px;
}

/* BAGIAN 2: PROFIL LAYANAN & STATISTIK */
.profile-section {
    margin-bottom: 40px;
}

.about-card {
    border: 1px solid #ebedf0; /* Warna garis tipis abu-abu sangat muda */
    border-radius: 16px;       /* Lengkungan sudut kartu */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03); /* Bayangan halus di bawah */
    background: #ffffff;
    padding: 32px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.about-content {
    max-width: 700px;
}

.section-label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.8px;
    color: #204420;
    display: inline-flex;
    align-items: center;
    gap: 8px; /* Jarak antara titik hijau dan teks */
    margin-bottom: 8px;
}

/* Titik Hijau Bulat Sempurna di Kiri Label */
.green-dot {
    width: 8px;
    height: 8px;
    background-color: #204420; /* Warna hijau tua IKN */
    border-radius: 50%;
    display: inline-block;
}

.about-content h2 {
    font-size: 26px;
    font-weight: 800;
    color: #204420;
    margin: 0 0 12px;
}

.about-content p {
    font-family: 'Sutasoma Text', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 1.6;
    color: #55695c;
    margin: 0;
}

.about-illustration {
    width: 250px;         /* Lebar area gambar */
    height: 150px;        /* Tinggi area gambar */
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-right: 30px; /* <-- Tambahkan ini untuk menggeser ke kiri */
    position: relative;
}

/* Ukuran Gambar Bus */
.about-illustration img {
    width: 100%;
    height: 100%;
    object-fit: contain;  /* Memastikan gambar tampil utuh dan proporsional */
    opacity: 0.35;        /* Memberikan efek warna samar/soft */
}

/* Pembungkus Animasi Bus & Bayangan */
.animated-bus-container {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* Gambar Bus Berjalan */
.driving-bus {
    width: 180px;
    height: auto;
    object-fit: contain;
    opacity: 0.5; /* Efek samar/soft elegant khas UI IKN */
    /* Menjalankan kombinasi animasi meluncur & getaran suspensi */
    animation: driveSmooth 3.5s ease-in-out infinite;
    will-change: transform;
}

/* Bayangan Jalanan Dinamis */
.bus-road-shadow {
    width: 140px;
    height: 10px;
    background: rgba(25, 72, 40, 0.15); /* Bayangan soft berwarna hijau gelap */
    border-radius: 50%;
    margin-top: -6px;
    filter: blur(4px);
    /* Animasi bayangan membesar/mengecil ikuti bus */
    animation: shadowPulse 3.5s ease-in-out infinite;
}

/* -----------------------------------------------------
   KEYFRAMES ANIMASI (Gerakan Berjalan & Suspensi)
------------------------------------------------------ */

/* Keyframe Gerakan Bus */
@keyframes driveSmooth {
    0% {
        transform: translateX(0px) translateY(0px) rotate(0deg);
    }
    25% {
        transform: translateX(-6px) translateY(-3px) rotate(-0.5deg); /* Maju sedikit & naik suspensi */
    }
    50% {
        transform: translateX(6px) translateY(1px) rotate(0.5deg);  /* Meluncur ke depan */
    }
    75% {
        transform: translateX(-2px) translateY(-2px) rotate(-0.3deg);
    }
    100% {
        transform: translateX(0px) translateY(0px) rotate(0deg);
    }
}

/* Keyframe Skala Bayangan */
@keyframes shadowPulse {
    0%, 100% {
        transform: scaleX(1);
        opacity: 0.15;
    }
    25% {
        transform: scaleX(0.85); /* Bayangan mengecil saat bus naik */
        opacity: 0.1;
    }
    50% {
        transform: scaleX(1.1);  /* Bayangan membesar saat bus meluncur rendah */
        opacity: 0.2;
    }
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}

.stat-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 22px 20px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
}

.stat-icon-wrap {
    width: 36px;
    height: 36px;
    background: #E8F2EE;
    color: #000000;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    margin-bottom: 12px;
}

.stat-number {
    font-family: 'Sutasoma Display', sans-serif;
    font-size: 35px;
    font-weight: 800;
    color: #204420;
    line-height: 1;
    margin-bottom: 6px;
}

.stat-number .unit {
    font-size: 16px;
    font-weight: 700;
}

.stat-title {
    font-size: 16px;
    font-weight: 700;
    color: #204420;
    margin-bottom: 6px;
}

.stat-desc {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 12px;
    font-weight: 400;
    color: #414941;
    line-height: 1.4;
    margin: 0;
}

.dark-card {
    background: #204420;
    color: #ffffff;
}

.dark-card-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.dark-icon {
    background: rgba(255,255,255,0.15);
    color: #ffffff;
}

/* Pengaturan Gambar Ikon Statistik */
.stat-img-icon {
    width: 20px;
    height: 20px;
    object-fit: contain;
    display: block;
}

/* Khusus ikon di kartu hijau gelap (agar warnanya putih jika ikon berupa SVG/filter) */
.dark-icon .stat-img-icon {
    filter: brightness(0) invert(1); /* Mengubah warna ikon jadi putih bersih (opsional) */
}

.active-badge {
    background: rgba(255,255,255,0.2);
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 600;
}

.white-text { color: #ffffff !important; }
.light-text { color: #b7d6c2 !important; }

/* Efek pergerakan scroll halus ketika tombol diklik */
html {
    scroll-behavior: smooth;
}

/* BAGIAN 3: ARMADA & TARIF */
.armada-section {
    margin-bottom: 25px;
    scroll-margin-top: 100px; /* Jarak kompensasi tinggi navbar header */
}

.section-heading-block {
    margin-bottom: 20px;
}

.section-heading-block h2 {
    font-size: 26px;
    font-weight: 800;
    color: #204420;
    margin: 0 0 6px;
}

.section-heading-block p {
    font-family: 'Sutasoma Text', sans-serif;
    font-weight: 400;
    font-size: 14px;
    color: #55695c;
    margin: 0;
}

.fleet-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 24px;
}

.fleet-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 24px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
}

.fleet-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 14px;
}

.fleet-title-wrap {
    display: flex;
    gap: 12px;
    align-items: center;
}

.fleet-icon {
    width: 38px;
    height: 38px;
    background: #E8F2EE;
    color: #000000;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

.fleet-title-wrap h3 {
    font-family: 'Sutasoma Display', sans-serif;
    margin: 0;
    font-size: 16px;
    font-weight: 700;
    color: #0f381e;
}

.fleet-sub {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 12px;
    color: #5b645b;
    font-weight: 400;
}

.fleet-count-tag {
    font-family: 'Sutasoma Text', sans-serif;
    background: #E8F2EE;
    color: #204420;
    font-size: 12px;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 20px;
}

.fleet-desc {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #414941;
    line-height: 1.5;
    margin-bottom: 16px;
}

.fleet-spec-box {
    background: #E8F2EE;
    padding: 12px 16px;
    border-radius: 10px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 16px;
}

.spec-label {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: #414941;
    display: block;
    margin-bottom: 2px;
}

.spec-val {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: #204420;
}

.fleet-footer {
    font-family: 'Sutasoma Text', sans-serif;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
    color: #414941;
    font-weight: 400;
}

.fleet-footer i {
    color: #204420;
    font-size: 14px;
}

.info-dual-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.tariff-green-card {
    background: #204420;
    color: #ffffff;
    border-radius: 18px;
    padding: 28px;
    position: relative;
    overflow: hidden;
}

.tariff-header-icon {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.sub-label {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.8px;
    color: #ffffff;
}

.user-stats-card .sub-label {
    color: #204420;
}

.wallet-icon {
    font-size: 20px;
    color: #ffffff;
}

.tariff-green-card h3, .user-stats-card h3 {
    font-family: 'Sutasoma Display', sans-serif;
    font-size: 24px;
    font-weight: 800;
    margin: 0 0 10px;
}

.price-display, .user-count-display {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 40px;
    font-weight: 800;
    margin-bottom: 12px;
}

.price-display span, .user-count-display span {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 16px;
    font-weight: 500;
}

.tariff-green-card p {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.6;
    color: #ffffff;
    margin-bottom: 20px;
}

.tariff-footer-note {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 11px;
    font-weight: 400;
    color: #ffffff;
    display: flex;
    align-items: center;
    gap: 6px;
}

.user-stats-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 28px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.user-stats-card h3, .user-count-display {
    color: #204420;
}

.user-stats-card p {
    font-family: 'Sutasoma Text', sans-serif;
    font-weight: 400;
    font-size: 13px;
    line-height: 1.6;
    color: #414941;
    margin-bottom: 20px;
}

.period-box {
    background: #E8F2EE;
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 11px;
    font-weight: 400;
    padding: 10px 16px;
    border-radius: 8px;
    display: flex;
    justify-content: space-between;
    color: #204420;
}

.period-box strong {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #204420;
}

/* BAGIAN 4: CTA BANNER & CATATAN */
.footer-cta-section {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.cta-banner {
    background: #204420;
    border-radius: 18px;
    padding: 32px 36px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #ffffff;
}

.cta-tag {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.8px;
    background: rgba(255,255,255,0.15);
    padding: 4px 12px;
    border-radius: 20px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 10px;
}

.cta-text h2 {
    font-family: 'Sutasoma Display', sans-serif;
    font-size: 28px;
    font-weight: 700;
    margin: 0 0 8px;
}

.cta-text p {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #ffffff;
    margin: 0;
    max-width: 600px;
    line-height: 1.5;
}

.btn-cta-white {
    background: #ffffff;
    font-family: 'Sutasoma Text', sans-serif;
    color: #204420;
    padding: 12px 24px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 700;
    font-size: 13px;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.notes-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 24px 28px;
    border: 1px solid #e2e8f0;
    display: flex;
    gap: 16px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
}

.notes-icon {
    width: 36px;
    height: 36px;
    background: #E8F2EE;
    color: #204420;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

.notes-tag {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 10px;
    font-weight: 700;
    color: #204420;
    letter-spacing: 0.8px;
    display: block;
    margin-bottom: 4px;
}

.notes-body h3 {
    font-family: 'Sutasoma Display', sans-serif;
    font-size: 25px;
    font-weight: 800;
    color: #204420;
    margin: 0 0 6px;
}

.notes-body p {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 14px;
    font-weight: 400;
    color: #414941;
    line-height: 1.6;
    margin: 0 0 12px;
}

.notes-meta {
    font-family: 'Sutasoma Text', sans-serif;
    font-size: 12px;
    color: #414941;
    font-weight: 600;
    display: flex;
    gap: 8px;
}

@media (max-width: 900px) {
    .hero-grid, .fleet-grid, .info-dual-grid { grid-template-columns: 1fr; }
    .stats-grid { grid-template-columns: 1fr 1fr; }
    .cta-banner { flex-direction: column; align-items: flex-start; gap: 20px; }
}

@media (max-width: 500px) {
    .stats-grid { grid-template-columns: 1fr; }
}

/* =====================================================
   PENYESUAIAN RESPONSIVE LAYAR MOBILE (HP)
====================================================== */
@media (max-width: 768px) {
    /* 1. Atur Kartu 'Tentang Bus Perkotaan' bertumpuk ke bawah */
    .about-card {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px 20px;
        gap: 20px;
    }

    /* 2. Berikan lebar penuh untuk teks agar tidak terhimpit */
    .about-content {
        max-width: 100%;
    }

    /* 3. Rapikan posisi ilustrasi bus di HP */
    .about-illustration {
        width: 100%;
        height: auto;
        justify-content: center; /* Posisikan bus di tengah bawah teks */
        margin-right: 0;        /* Hapus margin geser kiri desktop */
        margin-top: 10px;
    }

    .driving-bus {
        width: 140px; /* Ukuran bus disesuaikan agar pas di layar HP */
    }

    .bus-road-shadow {
        width: 110px;
    }
}
</style>

<!-- =====================================================
     KONTEN HTML SUBHALAMAN BUS PERKOTAAN
====================================================== -->
<div class="bus-subpage">

    <!-- BAGIAN 1: HERO & RINGKASAN RUTE -->
    <section class="hero-section">
        <div class="hero-grid">
            <div class="hero-left-card">
                <h1>Bus Perkotaan Nusantara</h1>
                <p>
                    Layanan angkutan umum yang mendukung mobilitas masyarakat dan ASN 
                    di kawasan perkotaan Ibu Kota Nusantara. Bus Perkotaan Nusantara 
                    melayani perjalanan di kawasan KIPP melalui jaringan koridor yang 
                    menghubungkan kawasan hunian, pusat pemerintahan, fasilitas pelayanan, 
                    dan berbagai titik kegiatan di sekitar IKN.
                </p>
                <div class="hero-buttons">
                    <a href="../pages/peta.php" class="btn-hero-primary">
                        Lihat Peta Jaringan <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#armada-section" class="btn-hero-secondary">Lihat Armada Bus Perkotaan</a>
                </div>
                <div class="free-badge">
                    <i class="far fa-check-circle"></i> Rp0 Bebas Biaya
                </div>
            </div>

            <div class="hero-right-card">
                <div class="bus-image-wrapper">
                    <img src="../assets/images/intrakota/bus_perkotaan.jpeg" class="hero-slide-img active" alt="Bus Perkotaan 1">
                    <img src="../assets/images/intrakota/bus_EV.jpeg" class="hero-slide-img" alt="Bus Perkotaan 2">
                </div>
                <div class="route-summary-card">
                    <div class="route-summary-header">
                        <div class="route-title">
                            <div class="route-icon-box">
                                <i class="fas fa-code-branch"></i> <!-- Atau fa-route / fa-directions -->
                            </div>
                            <span>RUTE LAYANAN</span>
                        </div>
                        <span class="corridor-badge">Jaringan Koridor</span>
                    </div>
                    <div class="route-badges-container">
                        <span class="route-chip chip-1e">1E</span>
                        <span class="route-chip chip-2">2</span>
                        <span class="route-chip chip-2e">2E</span>
                        <span class="route-chip chip-3">3</span>
                        <span class="route-chip chip-3e">3E</span>
                        <span class="route-chip chip-4">4</span>

                        <span class="badge-dot">•</span>
                        
                        <span class="route-chip chip-1em">1EM</span>
                        <span class="route-chip chip-2em">2EM</span>
                    </div>
                    <div class="route-stats-footer">
                        <div class="stat-item">
                            <i class="far fa-clock"></i>
                            <span><strong>~10 Menit</strong> Waktu Tunggu Halte</span>
                        </div>
                        <div class="stat-item">
                            <i class="fa-bus-simple"></i>
                            <span><strong>14 Halte</strong> Jumlah Halte Dilayani</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BAGIAN 2: PROFIL LAYANAN & 4 KARTU STATISTIK -->
    <section class="profile-section">
        <div class="about-card">
            <div class="about-content">
                <span class="section-label">
                    <span class="green-dot"></span> PROFIL LAYANAN </span>
                <h2>Tentang Bus Perkotaan</h2>
                <p>
                    Bus Perkotaan merupakan layanan angkutan umum yang mendukung pergerakan masyarakat dan 
                    ASN di Kawasan Inti Pusat Pemerintahan (KIPP) IKN. Layanan ini beroperasi melalui sejumlah rute 
                    yang menghubungkan kawasan hunian, pusat pemerintahan, fasilitas pelayanan, dan titik kegiatan di 
                    sekitar KIPP.
                </p>
            </div>
            <div class="about-illustration">
                <div class="animated-bus-container">
                    <!-- Tambahkan class="driving-bus" di bawah ini -->
                    <img src="../assets/images/intrakota/icon-bus-perkotaan.png" class="driving-bus" alt="Ilustrasi Bus Perkotaan">
                    <div class="bus-road-shadow"></div>
                </div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon-wrap"><img src="../assets/images/intrakota/lokasi2.png" alt="Icon Halte" class="stat-img-icon"></div>
                <div class="stat-number">14</div>
                <div class="stat-title">Halte</div>
                <p class="stat-desc">Jumlah halte yang dilayani dalam jaringan Bus Perkotaan.</p>
            </div>
            <div class="stat-card">
                <div class="stat-icon-wrap"><i class="fas fa-warehouse"></i></div>
                <div class="stat-number">1</div>
                <div class="stat-title">Depo</div>
                <p class="stat-desc">Ketersediaan depo untuk mendukung operasional layanan terpadu.</p>
            </div>
            <div class="stat-card">
                <div class="stat-icon-wrap"><i class="fas fa-code-branch"></i></div>
                <div class="stat-number">43 <span class="unit">KM</span></div>
                <div class="stat-title">Total Layanan</div>
                <p class="stat-desc">Panjang keseluruhan rute jaringan layanan Bus Perkotaan (periode 2026).</p>
            </div>
            <div class="stat-card dark-card">
                <div class="dark-card-head">
                    <div class="stat-icon-wrap dark-icon"><img src="../assets/images/intrakota/ikon_bus2.png" alt="Icon Bus" class="stat-img-icon dark-img"></div>
                    <span class="active-badge">Aktif</span>
                </div>
                <div class="stat-number white-text">17</div>
                <div class="stat-title white-text">Armada Eksisting</div>
                <p class="stat-desc light-text">Terdiri dari 3 bus listrik (EV) + 14 bus diesel operasional.</p>
            </div>
        </div>
    </section>

    <!-- BAGIAN 3: ARMADA & DUAL INFO (TARIF + DATA PENGGUNA) -->
    <section id="armada-section" class="armada-section">
        <div class="section-heading-block">
            <h2>Armada Bus Perkotaan</h2>
            <p>Penyediaan armada ramah lingkungan bertahap menuju 100% armada bertenaga listrik murni di Nusantara.</p>
        </div>

        <div class="fleet-grid">
            <div class="fleet-card">
                <div class="fleet-header">
                    <div class="fleet-title-wrap">
                        <div class="fleet-icon"><i class="fas fa-charging-station"></i></div>
                        <div>
                            <h3>Bus Listrik (EV)</h3>
                            <span class="fleet-sub">Zero Emission Transit</span>
                        </div>
                    </div>
                    <div class="fleet-count-tag">3 Armada</div>
                </div>
                <p class="fleet-desc">
                    Bus listrik yang digunakan untuk mendukung layanan transportasi di kawasan KIPP dengan emisi nol karbon, tingkat kebisingan minimal, dan kenyamanan optimal.
                </p>
                <div class="fleet-spec-box">
                    <div>
                        <span class="spec-label">Daya Baterai</span>
                        <strong class="spec-val">100% Electric Battery</strong>
                    </div>
                    <div>
                        <span class="spec-label">Karakteristik</span>
                        <strong class="spec-val">Rendah Emisi &amp; Minim Kebisingan</strong>
                    </div>
                </div>
                <div class="fleet-footer">
                    <span>Untuk Layanan KIPP</span>
                    <i class="far fa-check-circle"></i>
                </div>
            </div>

            <div class="fleet-card">
                <div class="fleet-header">
                    <div class="fleet-title-wrap">
                        <div class="fleet-icon"><i class="fas fa-gas-pump"></i></div>
                        <div>
                            <h3>Bus Diesel</h3>
                            <span class="fleet-sub">High Capacity Transit</span>
                        </div>
                    </div>
                    <div class="fleet-count-tag">14 Armada</div>
                </div>
                <p class="fleet-desc">
                    Armada bus diesel yang mendukung operasional layanan angkutan umum di kawasan KIPP, termasuk layanan pada kawasan hunian pekerja dan area terkait.
                </p>
                <div class="fleet-spec-box">
                    <div>
                        <span class="spec-label">Peran Operasional</span>
                        <strong class="spec-val">Penopang Layanan Reguler</strong>
                    </div>
                    <div>
                        <span class="spec-label">Standar Emisi</span>
                        <strong class="spec-val">Euro 4 Standard</strong>
                    </div>
                </div>
                <div class="fleet-footer">
                    <span>Untuk Layanan HPK, KIPP 1B dan 1C</span>
                    <i class="far fa-check-circle"></i>
                </div>
            </div>
        </div>

        <div class="info-dual-grid">
            <div class="tariff-green-card">
                <div class="tariff-header-icon">
                    <span class="sub-label">AKSESIBILITAS WARGA</span>
                    <div class="wallet-icon"><i class="far fa-credit-card"></i></div>
                </div>
                <h3>Tarif Layanan</h3>
                <div class="price-display">
                    Rp0 <span>/penumpang</span>
                </div>
                <p>
                    Layanan Bus Perkotaan Nusantara pada periode yang tercantum dalam data layanan tidak dikenakan tarif kepada penumpang. Layanan dapat digunakan oleh masyarakat dan ASN sesuai ketentuan operasional yang berlaku.
                </p>
                <div class="tariff-footer-note">
                    <i class="fas fa-info-circle"></i> Tarif dapat berubah mengikuti kebijakan operasional yang berlaku.
                </div>
            </div>

            <div class="user-stats-card">
                <span class="sub-label">STATISTIK PENGGUNAAN</span>
                <h3>Data Pengguna Layanan</h3>
                <div class="user-count-display">
                    52.044 <span>Penumpang</span>
                </div>
                <p>
                    Data menunjukkan jumlah pengguna layanan Bus Perkotaan berdasarkan periode pencatatan Juli 2026, mencerminkan kepercayaan tinggi para pekerja, ASN, dan masyarakat lokal terhadap keandalan sistem transit IKN.
                </p>
                <div class="period-box">
                    <span>Periode Pencatatan</span>
                    <strong>Juli 2026</strong>
                </div>
            </div>
        </div>
    </section>

    <!-- BAGIAN 4: CALL TO ACTION & CATATAN LAYANAN -->
    <section class="footer-cta-section">
        <div class="cta-banner">
            <div class="cta-text">
                <span class="cta-tag"><i class="fas fa-broadcast-tower"></i> PETA JARINGAN TRANSPORTASI</span>
                <h2>Lihat Peta Jaringan Bus Perkotaan</h2>
                <p>Jelajahi jaringan koridor, rute perjalanan, dan titik pemberhentian Bus Perkotaan Nusantara di kawasan KIPP IKN melalui peta jaringan yang tersedia.</p>
            </div>
            <a href="../pages/peta.php" class="btn-cta-white">
                <i class="fas fa-map-marked-alt"></i> Lihat Peta Jaringan
            </a>
        </div>

        <div class="notes-card">
            <div class="notes-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="notes-body">
                <span class="notes-tag">KETETAPAN OPERASIONAL</span>
                <h3>Catatan Layanan</h3>
                <p>
                    Jadwal, rute, dan operasional Bus Perkotaan dapat menyesuaikan kondisi dan kebutuhan layanan di lapangan serta perkembangan infrastruktur kawasan KIPP. Informasi layanan khusus Ramadan berlaku pada periode Ramadan sesuai ketentuan operasional yang ditetapkan oleh Otorita Ibu Kota Nusantara dan Kedeputian Sarana &amp; Prasarana.
                </p>
                <div class="notes-meta">
                    <span>Sumber Data: Kedeputian Bidang Sarana &amp; Prasarana OIKN</span>
                    <span class="dot">•</span>
                    <span>Revisi Terakhir: 2026</span>
                </div>
            </div>
        </div>
    </section>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-slide-img');
    let currentSlide = 0;
    const slideInterval = 3500; // Waktu ganti gambar (3,5 detik)

    function nextSlide() {
        if (slides.length <= 1) return; // Jika gambar cuma 1, jangan jalankan slider

        // Sembunyikan gambar saat ini
        slides[currentSlide].classList.remove('active');

        // Pindah ke indeks gambar berikutnya
        currentSlide = (currentSlide + 1) % slides.length;

        // Tampilkan gambar berikutnya
        slides[currentSlide].classList.add('active');
    }

    // Jalankan ganti gambar secara otomatis
    setInterval(nextSlide, slideInterval);
});
</script>

</div>

<?php
$content = ob_get_clean();
require_once "../includes/base.php";
?>
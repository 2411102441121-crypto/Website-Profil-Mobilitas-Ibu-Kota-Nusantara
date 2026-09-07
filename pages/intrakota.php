<?php
// pages/intrakota.php
$title = "Layanan Intrakota - Profil Mobilitas IKN";
$active_page = "intrakota";

ob_start();
?>

<div class="intrakota-page">

    <!-- HERO INTRAKOTA -->
    <section class="intrakota-hero" aria-label="Layanan Intrakota IKN">
        <div class="intrakota-hero-inner">
            <span class="intrakota-kicker">INTRAKOTA IKN</span>

            <h1 class="intrakota-title">
                Mobilitas Perkotaan<br>Ibu Kota Nusantara
            </h1>

            <p class="intrakota-tagline">
                Terhubung, aktif, dan mudah diakses
            </p>

            <p class="intrakota-description">
                Sistem mobilitas perkotaan Ibu Kota Nusantara dirancang <br> untuk
                mendukung pergerakan masyarakat melalui <br> transportasi umum,
                mobilitas aktif, dan mikromobilitas yang<br> terintegrasi.
            </p>

            <div class="intrakota-actions">
                <a href="#moda-layanan" class="intrakota-btn intrakota-btn-primary">
                    Jelajahi Moda &amp; Layanan
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </a>

                <a href="#logistik-perkotaan" class="intrakota-btn intrakota-btn-secondary">
                    Lihat Logistik Perkotaan
                </a>
            </div>
        </div>
    </section>

    <!-- ALUR PERJALANAN -->
    <section class="intrakota-flow" id="alur-perjalanan">
        <div class="intrakota-flow-inner">
            <h2 class="intrakota-flow-title">Alur Perjalanan Pengguna</h2>

            <div class="intrakota-steps-wrap">
                <div class="intrakota-steps">

                    <!-- 1. TEMPAT ASAL -->
                    <div class="intrakota-step">
                        <div class="intrakota-step-icon">
                            <img
                                src="../assets/images/intrakota/icon-tempat-asal.png"
                                alt="Tempat Asal"
                                loading="lazy"
                            >
                        </div>
                        <p class="intrakota-step-name">Tempat Asal</p>
                        <p class="intrakota-step-sub">Titik Awal</p>

                        <span class="intrakota-step-arrow" aria-hidden="true">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>

                    <!-- 2. MIKROMOBILITAS -->
                    <div class="intrakota-step">
                        <div class="intrakota-step-icon">
                            <img
                                src="../assets/images/intrakota/icon-mikromobilitas.png"
                                alt="Mikromobilitas"
                                loading="lazy"
                            >
                        </div>
                        <p class="intrakota-step-name">Mikromobilitas</p>
                        <p class="intrakota-step-sub">First Mile</p>

                        <span class="intrakota-step-arrow" aria-hidden="true">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>

                    <!-- 3. TITIK TRANSFER -->
                    <div class="intrakota-step active">
                        <div class="intrakota-step-icon">
                            <img
                                src="../assets/images/intrakota/icon-titik-transfer.png"
                                alt="Titik Transfer"
                                loading="lazy"
                            >
                        </div>
                        <p class="intrakota-step-name">Titik Transfer</p>
                        <p class="intrakota-step-sub">Bus Interchange Station</p>

                        <span class="intrakota-step-arrow" aria-hidden="true">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>

                    <!-- 4. BUS PERKOTAAN -->
                    <div class="intrakota-step">
                        <div class="intrakota-step-icon">
                            <img
                                src="../assets/images/intrakota/icon-bus-perkotaan.png"
                                alt="Bus Perkotaan"
                                loading="lazy"
                            >
                        </div>
                        <p class="intrakota-step-name">Bus Perkotaan</p>
                        <p class="intrakota-step-sub">
                            Koridor Utama / Main Trunk
                        </p>

                        <span class="intrakota-step-arrow" aria-hidden="true">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>

                    <!-- 5. TUJUAN -->
                    <div class="intrakota-step">
                        <div class="intrakota-step-icon">
                            <img
                                src="../assets/images/intrakota/icon-tujuan.png"
                                alt="Tujuan"
                                loading="lazy"
                            >
                        </div>
                        <p class="intrakota-step-name">Tujuan</p>
                        <p class="intrakota-step-sub">Last Mile</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- =========================
     SISTEM MOBILITAS PERKOTAAN
    ========================== -->
    <section class="intrakota-mobility">

        <div class="intrakota-mobility-container">

            <h2 class="intrakota-mobility-title">
                Sistem Mobilitas Perkotaan
            </h2>

            <p class="intrakota-mobility-description">
                Mobilitas di IKN dirancang melalui integrasi transportasi umum,
                mobilitas aktif, dan mikromobilitas untuk menciptakan perjalanan
                yang mudah, terhubung, dan berkelanjutan.
            </p>

            <div class="intrakota-mobility-cards">

                <!-- TRANSPORTASI UMUM -->
                <a href="#" class="intrakota-mobility-card">

                    <img
                        src="../assets/images/intrakota/transportasi.jpeg"
                        alt="Transportasi Umum"
                    >

                    <div class="intrakota-card-overlay"></div>

                    <div class="intrakota-card-content">

                        <div class="intrakota-card-icon">
                            <i class="fas fa-bus"></i>
                        </div>

                        <div class="intrakota-card-title">
                            Transportasi Umum
                        </div>

                        <div class="intrakota-card-subtitle">
                            Bus Perkotaan &amp; Paratransit
                        </div>

                    </div>
                </a>


                <!-- MOBILITAS AKTIF -->
                <a href="#" class="intrakota-mobility-card">

                    <img
                        src="../assets/images/intrakota/mobilitas.jpeg"
                        alt="Mobilitas Aktif"
                    >

                    <div class="intrakota-card-overlay"></div>

                    <div class="intrakota-card-content">

                        <div class="intrakota-card-icon">
                            <i class="fas fa-person-walking"></i>
                        </div>

                        <div class="intrakota-card-title">
                            Mobilitas Aktif
                        </div>

                        <div class="intrakota-card-subtitle">
                            Berjalan Kaki &amp; Bersepeda
                        </div>

                    </div>
                </a>


                <!-- MIKROMOBILITAS -->
                <a href="#" class="intrakota-mobility-card">

                    <img
                        src="../assets/images/intrakota/mikromobilitas.jpeg"
                        alt="Mikromobilitas"
                    >

                    <div class="intrakota-card-overlay"></div>

                    <div class="intrakota-card-content">

                        <div class="intrakota-card-icon">
                            <i class="fas fa-bicycle"></i>
                        </div>

                        <div class="intrakota-card-title">
                            Mikromobilitas
                        </div>

                        <div class="intrakota-card-subtitle">
                            Sepeda, Sepeda Listrik &amp; Skuter
                        </div>

                    </div>
                </a>

            </div>

        </div>

    </section>

    <!-- =========================
     MODA & LAYANAN
    ========================== -->
<section class="intrakota-moda" id="moda-layanan">

    <div class="intrakota-moda-container">

        <h2 class="intrakota-moda-title">
            Moda &amp; Layanan
        </h2>

        <p class="intrakota-moda-description">
            Beragam pilihan mobilitas dirancang untuk mendukung perjalanan masyarakat
            di dalam kawasan perkotaan IKN.
        </p>


        <div class="intrakota-moda-grid">

            <!-- =========================
                 BUS PERKOTAAN
            ========================== -->
            <div class="intrakota-moda-card">

                <div class="intrakota-moda-image">
                    <img
                        src="../assets/images/intrakota/bus_perkotaan.jpeg"
                        alt="Bus Perkotaan"
                    >
                </div>

                <div class="intrakota-moda-content">

                    <div class="intrakota-moda-icon">
                        <i class="fas fa-bus"></i>
                    </div>

                    <h3>
                        Bus Perkotaan
                    </h3>

                    <p>
                        EV Bus. Layanan bus perkotaan sebagai moda transportasi
                        umum utama di kawasan IKN.
                    </p>

                    <a href="../detail/bus-perkotaan.php" class="intrakota-detail-link">
                        Lihat Detail
                        <span>&rarr;</span>
                    </a>

                </div>

            </div>


            <!-- =========================
                 MOBILITAS AKTIF
            ========================== -->
            <div class="intrakota-moda-card">

                <div class="intrakota-moda-image">
                    <img
                        src="../assets/images/intrakota/mobilitas_aktif.jpeg"
                        alt="Mobilitas Aktif"
                    >
                </div>

                <div class="intrakota-moda-content">

                    <div class="intrakota-moda-icon">
                        <i class="fas fa-person-walking"></i>
                    </div>

                    <h3>
                        Mobilitas Aktif
                    </h3>

                    <p>
                        Berjalan kaki dan bersepeda sebagai bagian utama
                        perjalanan.
                    </p>

                    <a href="../detail/mobilitas-aktif.php" class="intrakota-detail-link">
                        Lihat Detail
                        <span>&rarr;</span>
                    </a>

                </div>

            </div>


            <!-- =========================
                 MIKROMOBILITAS
            ========================== -->
            <div class="intrakota-moda-card">

                <div class="intrakota-moda-image">
                    <img
                        src="../assets/images/intrakota/mikromobilitas_moda.jpeg"
                        alt="Mikromobilitas"
                    >
                </div>

                <div class="intrakota-moda-content">

                    <div class="intrakota-moda-icon">
                        <i class="fas fa-bicycle"></i>
                    </div>

                    <h3>
                        Mikromobilitas
                    </h3>

                    <p>
                        Pilihan mobilitas jarak dekat seperti sepeda, skuter
                        listrik, dan layanan berbagi sepeda atau skuter.
                    </p>

                    <a href="../detail/mikromobilitas.php" class="intrakota-detail-link">
                        Lihat Detail
                        <span>&rarr;</span>
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
     FASILITAS & TITIK TRANSFER
========================== -->
<section class="intrakota-transfer">

    <div class="intrakota-transfer-container">

        <!-- JUDUL & DESKRIPSI -->
        <div class="intrakota-transfer-heading">

            <h2 class="intrakota-transfer-title">
                Fasilitas &amp; Titik<br>
                Transfer
            </h2>

            <p class="intrakota-transfer-description">
                Infrastruktur pendukung yang menghubungkan berbagai moda dan membantu
                mengatur perpindahan perjalanan menuju kawasan perkotaan IKN.
            </p>

        </div>


        <!-- KONTEN -->
        <div class="intrakota-transfer-content">

            <!-- BAGIAN KIRI -->
            <div class="intrakota-transfer-info">

                <div class="intrakota-transfer-icon">
                    <i class="fas fa-share-nodes"></i>
                </div>

                <h3 class="intrakota-transfer-card-title">
                    Bus Interchange<br>
                    Station
                </h3>

                <p class="intrakota-transfer-card-text">
                    Simpul perpindahan antarkota ke intrakota.
                </p>

                <button
                    type="button"
                    class="intrakota-transfer-toggle"
                    id="simpulToggleBtn"
                    aria-expanded="false"
                    aria-controls="simpulWrapper"
                    onclick="toggleSimpulSection()"
                >
                    Lihat Selengkapnya
                    <i class="fas fa-chevron-down"></i>
                </button>

            </div>


            <!-- BAGIAN KANAN -->
            <div class="intrakota-transfer-image-wrap">

                <img
                    src="../assets/images/intrakota/bus_interchange.jpeg"
                    alt="Bus Interchange Station"
                    class="intrakota-transfer-image"
                >

            </div>

        </div>

    </div>

</section>

<!-- =========================================
     SKEMA ALIRAN MODA & PEMETAAN LOKASI
========================================= -->
<section class="intrakota-simpul">

    <div class="intrakota-simpul-wrapper" id="simpulWrapper">

    <div class="intrakota-simpul-container">

        <!-- =========================
             CARD
        ========================== -->
        <div class="intrakota-simpul-cards">

            <!-- CARD 1 -->
            <div class="intrakota-simpul-card">

                <div class="intrakota-simpul-card-header">
                    <h3>Skema Aliran Moda</h3>

                    <i class="fas fa-diagram-project"></i>
                </div>

                <div class="intrakota-simpul-image-wrap">
                    <img
                        src="../assets/images/intrakota/skema.jpeg"
                        alt="Skema Aliran Moda"
                        class="intrakota-simpul-image"
                    >
                </div>

                <div class="intrakota-simpul-caption">
                    Skema integrasi perjalanan dari layanan antarkota menuju
                    layanan intrakota di Kawasan KIPP.
                </div>

            </div>


            <!-- CARD 2 -->
            <div class="intrakota-simpul-card">

                <div class="intrakota-simpul-card-header">
                    <h3>Pemetaan Lokasi Simpul</h3>

                    <i class="fas fa-map"></i>
                </div>

                <div class="intrakota-simpul-image-wrap">
                    <img
                        src="../assets/images/intrakota/pemetaan.jpeg"
                        alt="Pemetaan Lokasi Simpul"
                        class="intrakota-simpul-image"
                    >
                </div>

                <div class="intrakota-simpul-caption">
                    Peta lokasi Bus Interchange Station sebagai simpul
                    integrasi transportasi di kawasan.
                </div>

            </div>

        </div>


        <!-- =========================
             QUOTE
        ========================== -->
        <div class="intrakota-simpul-quote">

            <p>
                "Stasiun Perpindahan Bus atau Titik Transfer adalah
                <strong>simpul perpindahan moda transportasi antar kota
                ke transportasi perkotaan</strong> yang terletak di pusat
                aktivitas perkotaan di IKN."
            </p>

        </div>

    </div><!-- /.intrakota-simpul-container -->

    </div><!-- /.intrakota-simpul-wrapper -->

</section>

<!-- =========================================================
     DETAIL HALTE BUS
     Bagian hero "Halte Bus" bisa diklik untuk membuka
     (accordion slide-down) konten "Halte sebagai Akses
     Mobilitas" beserta "IKNOW Mobile & E-Kios Nusantara"
     di bawahnya. Diletakkan di bawah section "MODA & LAYANAN".
========================================================= -->

<section class="intrakota-halte">

    <div class="intrakota-halte-container">

        <!-- BAGIAN ATAS (PEMICU KLIK / TIDAK BERUBAH TAMPILAN) -->
        <div
            class="intrakota-halte-hero"
            id="halteHero"
            role="button"
            tabindex="0"
            aria-expanded="false"
            aria-controls="halteWrapper"
            onclick="toggleHalteSection()"
            onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();toggleHalteSection();}"
        >

            <div class="intrakota-halte-image">
                <img
                    src="../assets/images/intrakota/halte_bus.jpeg"
                    alt="Halte Bus IKN"
                >
            </div>

            <div class="intrakota-halte-heading">

                <div class="intrakota-halte-icon">
                    <i class="fas fa-person-walking"></i>
                </div>

                <h2>Halte Bus</h2>

                <p>
                    Titik akses layanan Bus Perkotaan di kawasan IKN.
                </p>

                <span class="intrakota-halte-toggle-hint">
                    Lihat Selengkapnya
                    <i class="fas fa-chevron-down"></i>
                </span>

            </div>

        </div>

    </div>
    <!-- /.intrakota-halte-container (hero) -->

    <!-- BAGIAN YANG MUNCUL SAAT DIKLIK -->
    <div class="intrakota-halte-wrapper" id="halteWrapper">
    <div class="intrakota-halte-wrapper-inner">

        <div class="intrakota-halte-container">

            <!-- BAGIAN INFORMASI -->
            <div class="intrakota-halte-card">

                <!-- KIRI -->
                <div class="intrakota-halte-content">

                    <h2>Halte sebagai Akses Mobilitas</h2>

                    <p class="intrakota-halte-intro">
                        Halte Bus menjadi bagian dari jaringan mobilitas perkotaan
                        yang mendukung akses pengguna menuju layanan Bus Perkotaan
                        serta perjalanan lanjutan di dalam kawasan IKN.
                    </p>


                    <!-- ITEM 1 -->
                    <div class="intrakota-halte-feature">

                        <div class="intrakota-halte-feature-icon">
                            <i class="fas fa-bus"></i>
                        </div>

                        <div>
                            <h3>Titik Naik dan Turun</h3>

                            <p>
                                Menjadi titik akses penumpang untuk menggunakan
                                layanan Bus Perkotaan.
                            </p>
                        </div>

                    </div>


                    <!-- ITEM 2 -->
                    <div class="intrakota-halte-feature">

                        <div class="intrakota-halte-feature-icon">
                            <i class="fas fa-rotate"></i>
                        </div>

                        <div>
                            <h3>Terhubung dalam Jaringan Perjalanan</h3>

                            <p>
                                Mendukung keterhubungan perjalanan antarhalte,
                                simpul transportasi, dan kawasan tujuan.
                            </p>
                        </div>

                    </div>


                    <!-- ITEM 3 -->
                    <div class="intrakota-halte-feature">

                        <div class="intrakota-halte-feature-icon">
                            <i class="fas fa-person-walking"></i>
                        </div>

                        <div>
                            <h3>Mendukung First Mile dan Last Mile</h3>

                            <p>
                                Memudahkan perjalanan pengguna dari titik asal
                                menuju layanan transportasi dan dari halte
                                menuju tujuan akhir.
                            </p>
                        </div>

                    </div>

                </div>


                <!-- KANAN -->
                <div class="intrakota-halte-photo">

                    <img
                        src="../assets/images/intrakota/halte_akses.jpeg"
                        alt="Halte Bus Kawasan IKN"
                    >

                </div>

            </div>

        </div>
        <!-- /.intrakota-halte-container (halte-card) -->

        <!-- =========================================================
             IKNOW MOBILE + E-KIOS NUSANTARA
             (Struktur & CSS TIDAK DIUBAH sama sekali — container-nya
             sendiri, tidak dibatasi lebar 1000px milik halte-container,
             supaya tampilannya kembali sama seperti sebelumnya)
        ========================================================= -->

        <section class="iknow-ekios-section">

                <div class="iknow-ekios-container">

                <div class="iknow-ekios-row">

                    <!-- =====================================================
                         CARD IKNOW MOBILE
                         ===================================================== -->

                    <div class="ik-card">

                        <!-- HEADER -->
                        <div class="ik-card-header">

                            <div class="ik-card-brand">

                                <!-- FOTO LOGO IKNOW -->
                                <img
                                    src="../assets/images/beranda/Icon IKN_Square.png"
                                    alt="IKNOW Mobile"
                                    class="iknow-logo-photo"
                                >

                                <div>
                                    <div class="ik-card-title-row">
                                        <h3 class="ik-card-title">
                                            IKNOW Mobile
                                        </h3>
                                    </div>

                                    <p class="ik-card-subtitle">
                                        Portal Genggam Pintar Warga & Pelancong IKN
                                    </p>
                                </div>

                            </div>

                            <div class="ik-card-badges">

                                <span class="ik-badge ik-badge-dot">
                                    Online Sync
                                </span>

                            </div>

                        </div>


                        <!-- GREEN CONTENT -->
                        <div class="ik-card-green">

                            <!-- GAMBAR HP -->
                            <div class="ik-card-image">

                            <img
                                src="../assets/images/intrakota/IKNOW.png"
                                alt="IKNOW Mobile App"
                                class="iknow-phone-image"
                            >

                            </div>


                            <!-- FITUR -->
                            <div class="ik-card-features">

                                <div class="ik-feature">

                                    <span class="ik-feature-icon">
                                        <i class="fas fa-qrcode"></i>
                                    </span>

                                    <span>
                                        <strong>Izin Akses KIPP & QR Pass</strong><br>
                                        Reservasi instan kunjungan Titik Nol, Plaza
                                        Seremoni & Istana Negara.
                                    </span>

                                </div>


                                <div class="ik-feature">

                                    <span class="ik-feature-icon">
                                        <i class="fas fa-bus"></i>
                                    </span>

                                    <span>
                                        <strong>Live Transit Autonomous Bus (ART)</strong><br>
                                        Pantau posisi armada, estimasi tiba halte,
                                        dan integrasi feeder mikro.
                                    </span>

                                </div>


                                <div class="ik-feature">

                                    <span class="ik-feature-icon">
                                        <i class="fas fa-triangle-exclamation"></i>
                                    </span>

                                    <span>
                                        <strong>Tombol Darurat Terkoneksi 112</strong><br>
                                        Kirim lokasi presisi ke Smart Command
                                        Center IKN dalam 3 detik.
                                    </span>

                                </div>


                                <div class="ik-feature">

                                    <span class="ik-feature-icon">
                                        <i class="fas fa-leaf"></i>
                                    </span>

                                    <span>
                                        <strong>Telemetri Lingkungan & AQI</strong><br>
                                        Indeks kualitas udara PM2.5 aktual dan
                                        tingkat kelembapan kanopi.
                                    </span>

                                </div>

                            </div>

                        </div>


                        <!-- FOOTER -->
                        <div class="ik-card-footer">

                            <div class="ik-store-buttons">

                                <!-- GOOGLE PLAY -->
                                <a
                                    href="https://play.google.com/store/apps/details?id=com.ikn.smartcity&hl=id"
                                    target="_blank"
                                    class="ik-store-btn"
                                >

                                    <img src="../assets/images/beranda/OIP.png" class="ik-store-icon" alt="Google Play">

                                    <div>
                                        <span class="ik-store-small">
                                            Download di
                                        </span>

                                        <span class="ik-store-name">
                                            Google Play
                                        </span>
                                    </div>

                                </a>


                                <!-- APP STORE -->
                                <a
                                    href="https://apps.apple.com/id/app/iknow/id6477182949"
                                    target="_blank"
                                    class="ik-store-btn"
                                >

                                    <i class="fab fa-apple"></i>

                                    <div>
                                        <span class="ik-store-small">
                                            Tersedia di
                                        </span>

                                        <span class="ik-store-name">
                                            App Store
                                        </span>
                                    </div>

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- =====================================================
                         CARD E-KIOS NUSANTARA
                         ===================================================== -->

                    <div class="ik-card">

                        <!-- HEADER -->
                        <div class="ik-card-header">

                            <div class="ik-card-brand">

                                <!-- ICON E-KIOS -->
                                <div
                                    style="
                                        width:38px;
                                        height:38px;
                                        border-radius:7px;
                                        background:#204b25;
                                        color:#fff;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        flex-shrink:0;
                                    "
                                >
                                    <i class="fas fa-desktop"></i>
                                </div>

                                <div>

                                    <div class="ik-card-title-row">
                                        <h3 class="ik-card-title">
                                            E-Kios Nusantara
                                        </h3>

                                        <span class="ik-badge ik-badge-dot ik-badge-inline">
                                            Totem Publik
                                        </span>
                                    </div>

                                    <p class="ik-card-subtitle">
                                        Anjungan Layanan Sentuh & Informasi Ruang Terbuka
                                    </p>

                                </div>

                            </div>


                            <div class="ik-card-badges">

                                <span class="ik-badge ik-badge-dot">
                                    Layar Sentuh 55"
                                </span>

                            </div>

                        </div>


                        <!-- GREEN CONTENT -->
                        <div class="ik-card-green">

                            <!-- FOTO E-KIOS -->
                            <div class="ik-card-image ekios-image-wrap">

                            <img
                                src="../assets/images/intrakota/ekios.jpeg"
                                alt="E-Kios Nusantara"
                                class="ekios-photo"
                            >

                                <div class="ekios-caption">
                                    <div class="ekios-caption-row">
                                        <span class="ekios-caption-title">Titik E-Kios 01</span>
                                        <span class="ekios-caption-dot">Aktif 24 Jam</span>
                                    </div>
                                    <div class="ekios-caption-sub">
                                        <i class="fas fa-location-dot"></i>
                                        Sumbu Kebangsaan Barat
                                    </div>
                                </div>

                            </div>


                            <!-- FITUR -->
                            <div class="ik-card-features">

                                <div class="ik-feature">

                                    <span class="ik-feature-icon">
                                        <i class="fas fa-hand-pointer"></i>
                                    </span>

                                    <span>
                                        <strong>Tap e-KTP & Identitas Nusantara</strong><br>
                                        Autentikasi cepat layanan kependudukan
                                        dan cetak dokumen kilat.
                                    </span>

                                </div>


                                <div class="ik-feature">

                                    <span class="ik-feature-icon">
                                        <i class="fas fa-wifi"></i>
                                    </span>

                                    <span>
                                        <strong>Hotspot Wi-Fi 6 Publik Bebas Kuota</strong><br>
                                        Konektivitas serat optik 100 Mbps radius
                                        30 meter dari anjungan.
                                    </span>

                                </div>


                                <div class="ik-feature">

                                    <span class="ik-feature-icon">
                                        <i class="fas fa-compass"></i>
                                    </span>

                                    <span>
                                        <strong>Wayfinding & Peta 3D Interaktif</strong><br>
                                        Panduan rute pejalan kaki, lift, ramp,
                                        dan gedung kementerian.
                                    </span>

                                </div>


                                <div class="ik-feature">

                                    <span class="ik-feature-icon">
                                        <i class="fas fa-headset"></i>
                                    </span>

                                    <span>
                                        <strong>Asisten Suara AI Multibahasa</strong><br>
                                        Mendukung Bahasa Indonesia, Inggris,
                                        dan dialek lokal Kalimantan.
                                    </span>

                                </div>

                            </div>

                        </div>


                        <!-- FOOTER -->
                        <div class="ik-card-footer ekios-card-footer">

                            <div class="ekios-footer-buttons">

                                <a href="#" class="ekios-btn ekios-btn-solid">
                                    <i class="fas fa-location-crosshairs"></i>
                                    Cari Halte Terdekat
                                </a>

                            </div>

                        </div>

                    </div>

                </div>
                </div>

            </section>
            <!-- /iknow-ekios-section -->

        </div>
        <!-- /.intrakota-halte-wrapper-inner -->
        </div>
        <!-- /.intrakota-halte-wrapper -->

</section>
<!-- =========================================================
     LOGISTIK PERKOTAAN
========================================================= -->

<section class="intrakota-logistik" id="logistik-perkotaan">

    <div class="intrakota-logistik-container">

        <!-- FOTO UTAMA -->
        <div class="intrakota-logistik-photo">

            <img
                src="../assets/images/intrakota/logistik.jpg"
                alt="Logistik Perkotaan di IKN"
            >

            <div class="intrakota-logistik-photo-overlay"></div>

            <!-- JUDUL DI ATAS FOTO -->
            <div class="intrakota-logistik-heading">

                <div class="intrakota-logistik-kicker">
                    <span></span>
                    EKOSISTEM MOBILITAS IKN
                </div>

                <h2>
                    Logistik Perkotaan<br>
                    <strong>di IKN</strong>
                </h2>

                <div class="intrakota-logistik-line"></div>

                <p>
                    Logistik perkotaan di IKN adalah sistem pengelolaan dan
                    distribusi barang yang mendukung kebutuhan masyarakat,
                    pelaku usaha, dan berbagai aktivitas di kawasan perkotaan.
                </p>

            </div>

        </div>


        <!-- CARD INFORMASI -->
        <div class="intrakota-logistik-info-card">

            <div class="intrakota-logistik-info-item">

                <div class="intrakota-logistik-info-icon">
                    <i class="fas fa-cube"></i>
                </div>

                <div>
                    <h3>
                        Mendukung Kebutuhan<br>
                        Masyarakat &amp; Pelaku Usaha
                    </h3>

                    <p>
                        Memastikan ketersediaan barang dan layanan
                        secara cepat, tepat, dan merata.
                    </p>
                </div>

            </div>


            <div class="intrakota-logistik-info-item">

                <div class="intrakota-logistik-info-icon">
                    <i class="fas fa-truck"></i>
                </div>

                <div>
                    <h3>
                        Proses Terintegrasi<br>
                        &amp; Efisien
                    </h3>

                    <p>
                        Mencakup pengelolaan, pengiriman, hingga
                        pengantaran jarak akhir secara efisien dan aman.
                    </p>
                </div>

            </div>


            <div class="intrakota-logistik-info-item">

                <div class="intrakota-logistik-info-icon">
                    <i class="fas fa-leaf"></i>
                </div>

                <div>
                    <h3>
                        Ramah Lingkungan<br>
                        &amp; Berkelanjutan
                    </h3>

                    <p>
                        Mengedepankan teknologi dan praktik hijau
                        untuk masa depan yang berkelanjutan.
                    </p>
                </div>

            </div>

        </div>


        <!-- DESKRIPSI -->
        <div class="intrakota-logistik-description">

            <p>
                Dengan dukungan teknologi dan layanan yang terintegrasi,
                logistik perkotaan berperan penting dalam memperlancar
                pergerakan barang, memenuhi kebutuhan sehari-hari, serta
                mendorong pertumbuhan ekonomi dan kualitas hidup di IKN.
            </p>

            <p>
                Berbagai layanan logistik dan mobilitas hadir di IKN untuk
                mendukung kebutuhan pengiriman, distribusi, dan mobilitas
                masyarakat. Beberapa layanan yang tersedia antara lain
                <strong>Grab</strong> untuk layanan transportasi dan pengantaran,
                <strong>Gojek</strong> untuk mobilitas dan pengiriman,
                <strong>Blogmove</strong> untuk pengiriman barang dalam kota,
                <strong>J&amp;T Cargo</strong>, <strong>J&amp;T Express</strong>,
                untuk layanan kurir dan logistik, serta berbagai layanan
                lainnya yang terus berkembang.
            </p>

        </div>

    </div>

</section>
<!-- =========================================================
     SISTEM KORIDOR PERKOTAAN IKN
========================================================= -->
<section class="intrakota-koridor">

    <div class="intrakota-koridor-container">

        <!-- JUDUL -->
        <div class="intrakota-koridor-heading">

            <h2>
                Sistem Koridor Perkotaan IKN
            </h2>

            <p>
                Jaringan pergerakan yang mengatur mobilitas orang dan distribusi
                barang berdasarkan hierarki koridor, mulai dari skala regional
                hingga pergerakan internal kawasan.
            </p>

        </div>


        <!-- KARTU KORIDOR -->
        <div class="intrakota-koridor-grid">


            <!-- REGIONAL -->
            <div class="intrakota-koridor-card">

                <div class="intrakota-koridor-icon">
                    <i class="fas fa-globe-asia"></i>
                </div>

                <h3>
                    Regional
                </h3>

                <h4>
                    IKN ↔ GATEWAY, KPIKN &amp;<br>
                    DAERAH MITRA
                </h4>

                <p>
                    Menghubungkan kawasan IKN dengan Gateway, KPIKN, dan Daerah
                    Mitra untuk mendukung pergerakan regional.
                </p>

                <div class="intrakota-koridor-tags">

                    <span>
                        Transit Rel/Jalan Arteri
                    </span>

                    <span>
                        Moda Rel
                    </span>

                    <span>
                        Moda Jalan
                    </span>

                    <span>
                        Moda Udara
                    </span>

                </div>

            </div>


            <!-- PRIMER -->
            <div class="intrakota-koridor-card">

                <div class="intrakota-koridor-icon">
                    <i class="fas fa-share-alt"></i>
                </div>

                <h3>
                    Primer
                </h3>

                <h4>
                    ANTAR-WP
                </h4>

                <p>
                    Melayani pergerakan utama antar Wilayah Perencanaan (WP)
                    di kawasan IKN.
                </p>

                <div class="intrakota-koridor-tags">

                    <span>
                        Transit Rel/Jalan Arteri
                    </span>

                    <span>
                        Moda Rel
                    </span>

                    <span>
                        Moda Jalan
                    </span>

                </div>

            </div>


            <!-- SEKUNDER -->
            <div class="intrakota-koridor-card">

                <div class="intrakota-koridor-icon">
                    <i class="fas fa-map-signs"></i>
                </div>

                <h3>
                    Sekunder
                </h3>

                <h4>
                    ANTAR SUB-WP
                </h4>

                <p>
                    Melayani pergerakan antar Sub-WP dalam Wilayah Perencanaan
                    dan akses menuju pusat kegiatan lokal.
                </p>

                <div class="intrakota-koridor-tags">

                    <span>
                        Transit Perkotaan
                    </span>

                    <span>
                        Jalan Kaki &amp; Sepeda
                    </span>

                </div>

            </div>


            <!-- TERSIER -->
            <div class="intrakota-koridor-card">

                <div class="intrakota-koridor-icon">
                    <i class="fas fa-person-walking"></i>
                </div>

                <h3>
                    Tersier
                </h3>

                <h4>
                    INTERNAL SUB-WP IKN /<br>
                    FIRST &amp; LAST MILE
                </h4>

                <p>
                    Melayani pergerakan internal sub-WP dan mendukung
                    konektivitas first &amp; last mile.
                </p>

                <div class="intrakota-koridor-tags">

                    <span>
                        Jalan Kaki
                    </span>

                    <span>
                        Sepeda
                    </span>

                    <span>
                        NMT
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     PERGERAKAN BARANG
========================================================= -->
<section class="intrakota-barang">

    <div class="intrakota-barang-container">

        <!-- GAMBAR KIRI -->
        <div class="intrakota-barang-image">

            <img
                src="../assets/images/intrakota/pergerakan_barang.jpeg"
                alt="Sistem Pergerakan Barang IKN"
            >

        </div>


        <!-- KONTEN KANAN -->
        <div class="intrakota-barang-content">

            <div class="intrakota-barang-icon">
                <i class="fas fa-truck"></i>
            </div>

            <h2>
                Pergerakan Barang
            </h2>

            <p class="intrakota-barang-description">
                Sistem distribusi barang di IKN dirancang berdasarkan hierarki
                koridor untuk mendukung pergerakan logistik secara efisien hingga
                mencapai tujuan akhir.
            </p>


            <div class="intrakota-barang-list">

                <!-- REGIONAL -->
                <div class="intrakota-barang-item">

                    <span class="intrakota-barang-dot"></span>

                    <p>
                        <strong>REGIONAL:</strong>
                        Gateway/KPIKN/Daerah Mitra → Logistik Center
                    </p>

                </div>


                <!-- PRIMER -->
                <div class="intrakota-barang-item">

                    <span class="intrakota-barang-dot"></span>

                    <p>
                        <strong>PRIMER:</strong>
                        Logistik Center → Terminal/Regional Hub
                        (10–15 km)
                    </p>

                </div>


                <!-- SEKUNDER -->
                <div class="intrakota-barang-item">

                    <span class="intrakota-barang-dot"></span>

                    <p>
                        <strong>SEKUNDER:</strong>
                        Terminal Barang → Terminal Satelit
                        (Jangkauan 5 km)
                    </p>

                </div>


                <!-- TERSIER -->
                <div class="intrakota-barang-item">

                    <span class="intrakota-barang-dot"></span>

                    <p>
                        <strong>TERSIER:</strong>
                        Terminal/Satelit → Last Mile → Pengiriman
                        Komoditas Pokok: Terminal/Satelit → Pasar/Pusat Perdagangan
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

    <!-- =========================================================
        TEKNOLOGI PENDUKUNG MOBILITAS CERDAS
    ========================================================= -->
    <section class="intrakota-teknologi">

        <div class="intrakota-teknologi-container">

            <!-- JUDUL -->
            <div class="intrakota-teknologi-heading">

                <h2>
                    Teknologi Pendukung Mobilitas Cerdas
                </h2>

                <p>
                    Sistem dan teknologi digital yang mendukung pengelolaan,
                    integrasi, pemantauan, dan peningkatan layanan mobilitas
                    di kawasan Ibu Kota Nusantara.
                </p>

            </div>


            <!-- =====================================================
                GRID TEKNOLOGI
            ====================================================== -->
            <div class="intrakota-teknologi-grid">

            <!-- =================================================
                ATCS + GAMBAR
            ================================================== -->
            <div class="intrakota-atcs">

                <!-- KONTEN ATCS -->
                <div class="intrakota-atcs-content">

                    <div class="intrakota-teknologi-icon">
                        <i class="fas fa-traffic-light"></i>
                    </div>

                    <h3>
                        ATCS
                    </h3>

                    <p>
                        Adaptive Traffic Control System adalah sistem pengendali
                        lampu lalu lintas yang menyesuaikan waktu siklus secara
                        otomatis berdasarkan data kondisi lalu lintas real-time.
                    </p>

                    <ul>
                        <li>Adaptive Signal</li>
                        <li>Prioritas untuk Bus / Ambulance</li>
                        <li>Terhubung ke Command Center</li>
                    </ul>

                </div>


                <!-- GAMBAR -->
                <div class="intrakota-atcs-image">

                    <img
                        src="../assets/images/intrakota/atcs.jpeg"
                        alt="ATCS Mobilitas IKN"
                    >

                </div>

            </div>

            <!-- =================================================
                 INTERNET OF THINGS
            ================================================== -->
            <div class="intrakota-teknologi-card iot-card">

                <div class="intrakota-teknologi-icon">
                    <i class="fas fa-wifi"></i>
                </div>

                <h3>
                    Internet of Things (IoT)
                </h3>

                <p>
                    Sensor dan perangkat terhubung untuk mendukung
                    pemantauan kondisi lalu lintas, angkutan umum,
                    dan infrastruktur secara real-time.
                </p>

                <div class="intrakota-teknologi-badge">
                    <span>●</span>
                    <span>Live Monitoring &amp; Data Real-Time</span>
                </div>

            </div>


            <!-- =================================================
                 AI & ANALITIK DATA
            ================================================== -->
            <div class="intrakota-teknologi-card">

                <div class="intrakota-teknologi-icon">
                    <i class="fas fa-brain"></i>
                </div>

                <h3>
                    AI &amp; Analitik Data
                </h3>

                <p>
                    Pemanfaatan Big Data dan kecerdasan buatan untuk
                    menganalisis kondisi mobilitas, mendukung pengambilan
                    keputusan, dan meningkatkan efisiensi perjalanan.
                </p>

                <div class="intrakota-teknologi-tags">

                    <span>
                        Prediksi Kondisi Lalu Lintas
                    </span>

                    <span>
                        Analisis Data Real-Time
                    </span>

                </div>

            </div>


            <!-- =================================================
                 ETLE
            ================================================== -->
            <div class="intrakota-teknologi-card">

                <div class="intrakota-teknologi-icon">
                    <i class="fas fa-camera"></i>
                </div>

                <h3>
                    ETLE
                </h3>

                <p>
                    Electronic Traffic Law Enforcement adalah sistem
                    penegakan hukum lalu lintas berbasis elektronik
                    menggunakan kamera dan rekaman digital untuk
                    mendeteksi serta menindak pelanggaran secara otomatis.
                </p>

            </div>


            <!-- =================================================
                 ELECTRONIC PAYMENT SYSTEM
            ================================================== -->
            <div class="intrakota-teknologi-card">

                <div class="intrakota-teknologi-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>

                <h3>
                    Electronic Payment System (EPS)
                </h3>

                <p>
                    Sistem pembayaran elektronik yang mendukung transaksi
                    perjalanan secara terintegrasi, aman, dan nyaman melalui
                    berbagai metode pembayaran serta teknologi digital
                    (Account-Based Ticketing, Mobile Ticketing, NFC, dan QRIS).
                </p>

                <div class="intrakota-teknologi-tags">

                    <span>Multi Operator</span>
                    <span>Multi Modal</span>
                    <span>Interoperabilitas</span>

                </div>

            </div>


            <!-- =================================================
                 MAAS & SMART PARKING
            ================================================== -->
            <div class="intrakota-teknologi-maas">

                <div class="intrakota-teknologi-maas-content">

                    <div class="intrakota-teknologi-icon">
                        <i class="fas fa-car"></i>
                    </div>

                    <h3>
                        MaaS &amp; Smart Parking
                    </h3>

                    <p>
                        Layanan mobilitas terintegrasi untuk merencanakan
                        perjalanan dan mengakses berbagai moda, didukung
                        sistem parkir cerdas dengan informasi ketersediaan
                        parkir secara real-time.
                    </p>

                    <div class="intrakota-teknologi-tags">

                        <span>Multi-Moda</span>
                        <span>Perjalanan Terintegrasi</span>
                        <span>Parkir Real-Time</span>

                    </div>

                </div>

                <div class="intrakota-teknologi-maas-image">

                    <img
                        src="../assets/images/intrakota/smartparking.jpg"
                        alt="MaaS dan Smart Parking"
                    >

                </div>

            </div>


            <!-- =================================================
                 NUSANTARA COMMAND CENTER
            ================================================== -->
            <div class="intrakota-teknologi-command">

                <div class="intrakota-teknologi-command-top">

                    <div class="intrakota-teknologi-icon">
                        <i class="fas fa-th-large"></i>
                    </div>

                    <h3>
                        Nusantara Command Center
                    </h3>

                    <p>
                        Pusat pemantauan, pengendalian, dan koordinasi yang
                        mengintegrasikan berbagai data dan sistem untuk
                        mendukung operasional Smart Mobility di Ibu Kota
                        Nusantara.
                    </p>

                </div>


                <div class="intrakota-teknologi-command-grid">

                    <!-- TRANSPORTASI UMUM -->
                    <div class="intrakota-command-item">

                        <i class="fas fa-bus"></i>

                        <div>
                            <h4>
                                TRANSPORTASI UMUM
                            </h4>

                            <p>
                                Pemantauan armada dan layanan
                                secara real-time
                            </p>
                        </div>

                    </div>


                    <!-- LALU LINTAS -->
                    <div class="intrakota-command-item">

                        <i class="fas fa-traffic-light"></i>

                        <div>
                            <h4>
                                LALU LINTAS
                            </h4>

                            <p>
                                Monitoring dan pengelolaan
                                kondisi lalu lintas
                            </p>
                        </div>

                    </div>


                    <!-- INFRASTRUKTUR -->
                    <div class="intrakota-command-item">

                        <i class="fas fa-location-dot"></i>

                        <div>
                            <h4>
                                INFRASTRUKTUR
                            </h4>

                            <p>
                                Pemantauan infrastruktur dan
                                aspek pendukung mobilitas
                            </p>

                        </div>

                    </div>


                    <!-- DATA & SENSOR -->
                    <div class="intrakota-command-item">

                        <i class="fas fa-wifi"></i>

                        <div>

                            <h4>
                                DATA &amp; SENSOR
                            </h4>

                            <p>
                                Integrasi data real-time dari
                                perangkat dan sensor
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

</div>

<script>
function toggleSimpulSection() {
    const wrapper = document.getElementById('simpulWrapper');
    const btn = document.getElementById('simpulToggleBtn');
    const isOpen = wrapper.classList.toggle('open');

    btn.classList.toggle('active', isOpen);
    btn.setAttribute('aria-expanded', isOpen);

    if (isOpen) {
        wrapper.style.maxHeight = wrapper.scrollHeight + 'px';
    } else {
        wrapper.style.maxHeight = '0px';
    }
}

function toggleHalteSection() {
    const wrapper = document.getElementById('halteWrapper');
    const hero = document.getElementById('halteHero');
    const isOpen = wrapper.classList.toggle('open');

    hero.classList.toggle('active', isOpen);
    hero.setAttribute('aria-expanded', isOpen);

    if (isOpen) {
        wrapper.style.maxHeight = wrapper.scrollHeight + 'px';
    } else {
        wrapper.style.maxHeight = '0px';
    }
}

window.addEventListener('resize', () => {
    const simpulWrapper = document.getElementById('simpulWrapper');
    if (simpulWrapper && simpulWrapper.classList.contains('open')) {
        simpulWrapper.style.maxHeight = simpulWrapper.scrollHeight + 'px';
    }

    const halteWrapper = document.getElementById('halteWrapper');
    if (halteWrapper && halteWrapper.classList.contains('open')) {
        halteWrapper.style.maxHeight = halteWrapper.scrollHeight + 'px';
    }
});
</script>

<?php
$content = ob_get_clean();
require_once '../includes/base.php';
?>
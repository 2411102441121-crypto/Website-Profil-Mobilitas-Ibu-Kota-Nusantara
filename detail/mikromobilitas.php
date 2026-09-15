<?php
// ======================================================
// HALAMAN MIKROMOBILITAS
// File: detail/mikromobilitas.php
// ======================================================

$parent_page = 'intrakota'; // Penanda bahwa halaman ini bagian dari Layanan Intrakota
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mikromobilitas - Profil Mobilitas IKN</title>

    <!-- CSS HALAMAN INI (cache-busting otomatis) -->
    <link rel="stylesheet" href="../assets/css/mikromobilitas.css?v=<?php echo filemtime(__DIR__ . '/../assets/css/mikromobilitas.css'); ?>">
</head>

<body>

<!-- ======================================================
     KONTEN UTAMA
====================================================== -->

<main class="micro-page">

    <!-- =========================
         HEADER HALAMAN
    ========================== -->
    <section class="micro-heading">

        <div class="micro-breadcrumb">
            <span>Penerapan Teknologi untuk Mobilitas Cerdas di IKN</span>
            <i>•</i>
            <span>Mobilitas Aktif dan Mikromobilitas | First Mile - Last Mile</span>
        </div>

        <div class="heading-row">

            <div>
                <h1>
                    Mikromobilitas: Sepeda, Skuter Listrik &amp; Mobilitas Berbagi
                </h1>

                <p>
                    Untuk perjalanan first mile-last mile, IKN mengembangkan
                    mikromobilitas seperti sepeda, skuter listrik, dan shared
                    bike/scooter. Moda ini menghubungkan kawasan hunian dan
                    perkantoran ke simpul transportasi massal, beroperasi di
                    koridor kecepatan rendah demi keselamatan, dan dapat
                    dikelola melalui skema berbagi armada yang terintegrasi
                    dengan aplikasi di kawasan TOD dan area ramai pejalan kaki.
                </p>
            </div>

        </div>

    </section>


    <!-- ==================================================
         BAGIAN 1
         APA ITU MIKROMOBILITAS
    =================================================== -->

    <section class="micro-card bike-main-card">

        <!-- FOTO KIRI -->
        <div class="bike-main-image">

            <img
                src="../assets/images/intrakota/jalur-sepeda.jpg"
                alt="Mikromobilitas IKN"
            >

            <div class="image-badge">
                First Mile - Last Mile
            </div>

            <div class="image-caption">
                Skuter, Sepeda, dan Moda Mikromobilitas Lain di KIPP
            </div>

        </div>


        <!-- INFORMASI KANAN -->
        <div class="bike-main-content">

            <span class="small-label">
                DEFINISI &amp; CAKUPAN
            </span>

            <h2>
                Apa yang Termasuk Mikromobilitas?
            </h2>

            <p class="description">
                Micromobility dapat berupa kendaraan bertenaga manusia atau
                listrik, milik pribadi atau digunakan bersama-sama, secara
                umum berkecepatan rendah (maksimal 25 km/jam), dan beberapa
                berkecepatan sedang (maksimal hingga 45 km/jam).
            </p>


            <div class="feature-list">

                <div class="feature-item">
<div>
                        <strong>
                            Termasuk Mikromobilitas
                        </strong>

                        <p>
                            Skuter, sepeda, skateboard, dan sepeda kargo —
                            baik unit pribadi maupun unit berbagi.
                        </p>
                    </div>
                </div>


                <div class="feature-item">
<div>
                        <strong>
                            Tidak Termasuk Mikromobilitas
                        </strong>

                        <p>
                            Kendaraan bermotor konvensional seperti mobil
                            dan moped, serta kendaraan berkecepatan tinggi
                            (melebihi 45 km/jam).
                        </p>
                    </div>
                </div>


                <div class="feature-item">
<div>
                        <strong>
                            Kendaraan Penggerak Motor Listrik
                        </strong>

                        <p>
                            Skuter listrik, sepeda listrik, hoverboard,
                            sepeda roda satu (unicycle), dan otopet.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </section>



    <!-- ==================================================
         BAGIAN 2
         PRINSIP PENGEMBANGAN DESAIN INFRASTRUKTUR SEPEDA
    =================================================== -->

    <section class="micro-card docking-card">

        <!-- KIRI -->
        <div class="docking-content">

            <span class="small-label">
                RANCANGAN
            </span>

            <h2>
                Prinsip Pengembangan Desain
                Infrastruktur Sepeda
            </h2>

            <p class="description">
                Peta rancangan lokasi infrastruktur bike hub disiapkan
                sebagai tempat kumpulan fasilitas bike-sharing, mengikuti
                empat prinsip pengembangan desain infrastruktur sepeda
                berikut ini.
            </p>


            <div class="dock-features">

                <div class="dock-feature">
<div>
                        <strong>Integrasi (Integration)</strong>

                        <p>
                            Terintegrasi dengan moda transportasi lain
                            di kawasan TOD dan simpul transfer.
                        </p>
                    </div>
                </div>


                <div class="dock-feature">
<div>
                        <strong>Keamanan (Safety)</strong>

                        <p>
                            Jalur dan fasilitas dirancang untuk menjaga
                            keselamatan pengguna sepeda dan mikromobilitas.
                        </p>
                    </div>
                </div>


                <div class="dock-feature">
<div>
                        <strong>Konektivitas (Connectivity)</strong>

                        <p>
                            Menghubungkan kawasan hunian dan perkantoran
                            ke simpul transportasi massal.
                        </p>
                    </div>
                </div>


                <div class="dock-feature">
<div>
                        <strong>Penunjuk Arah (Wayfinding)</strong>

                        <p>
                            Sistem penunjuk arah yang jelas di sepanjang
                            jaringan bike hub KIPP.
                        </p>
                    </div>
                </div>

            </div>

        </div>


        <!-- KANAN FOTO -->
        <div class="docking-image">

            <img
                src="../assets/images/intrakota/gowes-ikn.jpg"
                alt="Rancangan Bike Hub IKN"
            >

            <div class="solar-badge">
                Peta Rancangan Lokasi Bike Hub
            </div>

            <div class="image-caption">
                Kumpulan Fasilitas Bike-Sharing di Kawasan KIPP
            </div>

        </div>

    </section>



    <!-- ==================================================
         BAGIAN 3
         TAHAPAN PENGEMBANGAN SISTEM SEPEDA (2025-2045)
    =================================================== -->

    <section class="micro-card scooter-card">

        <!-- FOTO -->
        <div class="scooter-image">

            <img
                src="../assets/images/intrakota/agenda.jpeg"
                alt="Tahapan Pengembangan Mikromobilitas IKN"
            >

            <div class="image-badge">
                2025 - 2045
            </div>

            <div class="image-caption">
                Tahapan Utama Perluasan Sistem Sepeda KIPP
            </div>

        </div>


        <!-- INFORMASI -->
        <div class="scooter-content">

            <span class="small-label">
                RANCANGAN TAHAPAN PENGEMBANGAN
            </span>

            <h2>
                Dari Manual Bike System Menuju
                Bike-Sharing Cerdas
            </h2>

            <p class="description">
                Diagram tahapan berikut menggambarkan tindakan yang
                diperlukan serta peran kelembagaan yang akan memandu
                perluasan sistem sepeda dari tahun 2025 hingga 2045
                di kawasan KIPP.
            </p>


            <!-- TAHAP 1 -->
            <div class="info-box">

                <h3>
                    01. Manual Bike System Phase (2025-2028)
                </h3>

                <p>
                    Biaya rendah, risiko rendah - implementasi,
                    pembelajaran operasional, perubahan budaya dan
                    perilaku, serta dasar infrastruktur. OIKN mulai
                    mengembangkan sistem booking bagi pegawai OIKN.
                </p>

                <p>
                    <strong>Kelembagaan:</strong>
                    Policymaker, Operator, dan Monitoring dijalankan
                    oleh OIKN. Milestone: Pilot Deployment, Monitoring
                    &amp; Evaluation, Network Expansion.
                </p>

            </div>


            <!-- TAHAP 2 -->
            <div class="info-box">

                <h3>
                    02. Transition Phase (2028-2030)
                </h3>

                <p>
                    Evolusi sistem, aksesibilitas yang ditingkatkan,
                    sinergi publik-swasta, serta bukti konsep untuk
                    penskalaan.
                </p>

                <p>
                    <strong>Kelembagaan:</strong>
                    Policymaker &amp; Monitoring oleh OIKN, Operator oleh
                    Private Bike-Sharing. Milestone: Introduction of
                    Bike Sharing.
                </p>

            </div>


            <!-- TAHAP 3 -->
            <div class="info-box">

                <h3>
                    03. Bike-Sharing Phase (2030-2045)
                </h3>

                <p>
                    Cakupan dan fleksibilitas yang lebih luas, perjalanan
                    multimoda yang lancar, integrasi mobilitas cerdas,
                    berkelanjutan, dan tangguh.
                </p>

                <p>
                    <strong>Kelembagaan:</strong>
                    Policymaker &amp; Monitoring oleh OIKN, Operator oleh
                    Private Bike-Sharing. Milestone: System Update
                    (Hybrid Model), Regional Expansion ke KIKN,
                    Full Integration &amp; Scalability, serta Smart
                    Mobility &amp; Innovation berbasis AI.
                </p>

            </div>

        </div>

    </section>



    <!-- ==================================================
         BAGIAN 4
         HIERARKI MODE SHARE MOBILITAS AKTIF
    =================================================== -->

    <section class="micro-card gowes-card">

        <div class="gowes-header">

            <div>
                <span class="small-label">
                    KONSEP DAN HIERARKI MIKROMOBILITAS
                </span>

                <h2>
                    Mobilitas Aktif &amp; Mikromobilitas dalam
                    Hierarki Moda Transportasi IKN
                </h2>

                <p>
                    Mikromobilitas melayani cakupan jarak lebih jauh dari
                    berjalan kaki, menghubungkan kawasan sekitar Park
                    n Ride dan Bus Interchange Station di dalam
                    MicroMobility Distance Coverage Area.
                </p>
            </div>

        </div>


        <div class="gowes-body">

            <!-- FOTO -->
            <div class="gowes-image">

                <img
                    src="../assets/images/intrakota/spx.jpg"
                    alt="Hierarki Mobilitas Aktif IKN"
                >

                <div class="image-caption">
                    Piramida Prioritas Moda: Berjalan Kaki, Bersepeda,
                    Angkutan Umum, Logistik, hingga Kendaraan Pribadi
                </div>

            </div>


            <!-- JADWAL -->
            <div class="gowes-schedule">

                <h3>
                    Urutan Prioritas Moda Mobilitas Aktif
                </h3>


                <div class="event-item">

                    <div class="event-title">
                        <span>Prioritas 1</span>
                        <small>Walking</small>
                    </div>

                    <h4>
                        Berjalan Kaki
                    </h4>

                    <p>
                        Moda utama untuk perjalanan jarak dekat dan akses
                        langsung ke halte bus serta stasiun di dalam
                        Kota 10 Menit.
                    </p>

                </div>


                <div class="event-item">

                    <div class="event-title">
                        <span>Prioritas 2</span>
                        <small>Cycling</small>
                    </div>

                    <h4>
                        Bersepeda &amp; Mikromobilitas
                    </h4>

                    <p>
                        Sepeda, skuter listrik, dan moda mikromobilitas
                        lain untuk perjalanan first mile-last mile menuju
                        simpul transportasi massal.
                    </p>

                </div>


                <div class="event-item">

                    <div class="event-title">
                        <span>Prioritas 3</span>
                        <small>Public Transport &amp; Freight/Taxi</small>
                    </div>

                    <h4>
                        Angkutan Umum, Logistik &amp; Taksi
                    </h4>

                    <p>
                        Angkutan umum massal serta layanan logistik dan
                        taksi melengkapi konektivitas antarmoda sebelum
                        kendaraan pribadi.
                    </p>

                </div>

            </div>

        </div>

    </section>

</main>


<?php
// ======================================================
// FOOTER
// ======================================================
// Karena footer sudah ada di:
// includes/base.php
//
// __DIR__ membuat path tetap benar walaupun halaman berada
// di dalam folder /detail/
require_once __DIR__ . '/../includes/base.php';
?>

</body>
</html>
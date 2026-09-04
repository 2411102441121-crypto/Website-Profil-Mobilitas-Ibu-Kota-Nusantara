<?php

$title = "Bus Perkotaan - Profil Mobilitas IKN";

ob_start();

?>

<!-- CSS KHUSUS HALAMAN BUS -->
<link rel="stylesheet" href="../assets/css/bus-perkotaan.css">


<div class="bus-page">

    <!-- =========================================================
         HEADER / JUDUL
    ========================================================== -->

    <section class="bus-header">

        <div>

            <span class="bus-label">
                MODA &amp; LAYANAN
            </span>

            <h1>
                Peta Jaringan Bus Perkotaan
            </h1>

            <p>
                Sistem transportasi massal terintegrasi Nusantara dirancang
                untuk mobilitas yang cerdas, efisien, dan ramah lingkungan.
                Jelajahi rute dan konektivitas kota masa depan.
            </p>

        </div>

    </section>


    <!-- =========================================================
         FOTO BUS
    ========================================================== -->

    <section class="bus-map-section">

        <div class="bus-map-card">

            <img
                src="../assets/images/intrakota/bus_perkotaan.png"
                alt="Bus Perkotaan IKN"
                class="bus-map"
            >

            <div class="map-caption">

                <strong>
                    Peta Jaringan Bus Perkotaan IKN
                </strong>

                <span>
                    Peta jaringan dan informasi rute bus perkotaan.
                </span>

            </div>

        </div>

    </section>


    <!-- =========================================================
         JADWAL OPERASIONAL
    ========================================================== -->

    <section class="bus-schedule">

        <div class="section-heading">

            <div>

                <span>
                    LAYANAN BUS
                </span>

                <h2>
                    Jadwal Operasional
                </h2>

            </div>


            <!-- TAB -->

            <div class="schedule-filter">

                <button
                    type="button"
                    class="schedule-tab active"
                    data-target="reguler"
                >
                    Reguler
                </button>

                <button
                    type="button"
                    class="schedule-tab"
                    data-target="kondisional"
                >
                    Kondisional
                </button>

            </div>

        </div>


        <!-- =====================================================
             PANEL REGULER
        ====================================================== -->

        <div
            id="reguler"
            class="schedule-panel active"
        >

            <div class="schedule-grid">


                <!-- 1E -->

                <div class="schedule-card purple">

                    <div class="route-number">
                        1E
                    </div>

                    <div class="route-info">

                        <h3>
                            Koridor Pusat
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Hari Biasa &amp; Akhir Pekan
                            </span>

                            <strong>
                                05.30 - 21.00
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- 2 -->

                <div class="schedule-card blue">

                    <div class="route-number">
                        2
                    </div>

                    <div class="route-info">

                        <h3>
                            Lingkar Dalam
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Hari Biasa &amp; Akhir Pekan
                            </span>

                            <strong>
                                05.30 - 21.00
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- 2E -->

                <div class="schedule-card green">

                    <div class="route-number">
                        2E
                    </div>

                    <div class="route-info">

                        <h3>
                            Utara - Selatan
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Hari Biasa &amp; Akhir Pekan
                            </span>

                            <strong>
                                05.30 - 21.00
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- 3 -->

                <div class="schedule-card yellow">

                    <div class="route-number">
                        3
                    </div>

                    <div class="route-info">

                        <h3>
                            Timur - Barat
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Hari Biasa &amp; Akhir Pekan
                            </span>

                            <strong>
                                05.30 - 21.00
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- 3E -->

                <div class="schedule-card red">

                    <div class="route-number">
                        3E
                    </div>

                    <div class="route-info">

                        <h3>
                            Ekspres KIPP
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Hari Biasa &amp; Akhir Pekan
                            </span>

                            <strong>
                                05.30 - 21.00
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- 4 -->

                <div class="schedule-card brown">

                    <div class="route-number">
                        4
                    </div>

                    <div class="route-info">

                        <h3>
                            Kawasan ASN
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Hari Biasa &amp; Akhir Pekan
                            </span>

                            <strong>
                                06.00 - 21.00
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- =====================================================
             PANEL KONDISIONAL
        ====================================================== -->

        <div
            id="kondisional"
            class="schedule-panel"
        >

            <div class="schedule-grid">


                <!-- 1E -->

                <div class="schedule-card purple">

                    <div class="route-number">
                        1E
                    </div>

                    <div class="route-info">

                        <h3>
                            Koridor Pusat
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Jam Puncak
                            </span>

                            <strong>
                                04.00 - 06.00
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- 2E -->

                <div class="schedule-card green">

                    <div class="route-number">
                        2E
                    </div>

                    <div class="route-info">

                        <h3>
                            Utara - Selatan
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Jam Puncak
                            </span>

                            <strong>
                                04.00 - 06.00
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- 3E -->

                <div class="schedule-card red">

                    <div class="route-number">
                        3E
                    </div>

                    <div class="route-info">

                        <h3>
                            Ekspres KIPP
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Jam Khusus
                            </span>

                            <strong>
                                06.00 - 09.00
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- 4 -->

                <div class="schedule-card brown">

                    <div class="route-number">
                        4
                    </div>

                    <div class="route-info">

                        <h3>
                            Kawasan ASN
                        </h3>

                        <div class="schedule-row">

                            <span>
                                Kondisional
                            </span>

                            <strong>
                                Sesuai Kebutuhan
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================================
         LAYANAN BUS
    ========================================================== -->

    <section class="bus-services">


        <!-- =====================================================
             LAYANAN UTAMA
        ====================================================== -->

        <div class="service-column">

            <h3>

                <span class="service-line"></span>

                LAYANAN UTAMA

            </h3>


            <div class="service-item">

                <span class="service-badge purple-bg">
                    1E
                </span>

                <p>
                    Rusun ASN 1 - Kemenko 3 - Plaza Barat -
                    Hotel Nusantara - Balai Kota - Rusun ASN 1
                </p>

            </div>


            <div class="service-item">

                <span class="service-badge blue-bg">
                    2
                </span>

                <p>
                    Rest Area - Kemenko 3 - Hotel Nusantara -
                    Balai Kota - Rest Area
                </p>

            </div>


            <div class="service-item">

                <span class="service-badge yellow-bg">
                    3
                </span>

                <p>
                    Rest Area - HPK 2 - HPK 1 - Rest Area
                </p>

            </div>


            <div class="service-item">

                <span class="service-badge brown-bg">
                    4
                </span>

                <p>
                    PSSI/RS Mayapada - Rusun ASN 1 -
                    Kemenko 3 - Rusun ASN 1
                </p>

            </div>

        </div>


        <!-- =====================================================
             LAYANAN EKSPRES
        ====================================================== -->

        <div class="service-column">

            <h3>

                <span class="service-line"></span>

                LAYANAN EKSPRES

            </h3>


            <div class="service-item">

                <span class="service-badge red-bg">
                    3E
                </span>

                <p>
                    Rusun ASN 3 - Kantor OIKN - Masjid Negara -
                    Rest Area - Rusun ASN 3
                </p>

            </div>


            <div class="service-item">

                <span class="service-badge green-bg">
                    2E
                </span>

                <p>
                    Rusun ASN 3 - Kemenko 3 - Hotel Nusantara -
                    Balai Kota - Rusun ASN 3
                </p>

            </div>

        </div>


        <!-- =====================================================
             LAYANAN KOMUTER
        ====================================================== -->

        <div class="service-column">

            <h3>

                <span class="service-line"></span>

                LAYANAN KOMUTER

            </h3>


            <div class="service-item">

                <span class="service-badge orange-bg">
                    K
                </span>

                <p>
                    Rusun ASN 1 - Rusun ASN 4 - Rusun ASN 2 -
                    Masjid Negara PP
                </p>

            </div>


            <div class="service-item">

                <span class="service-badge lime-bg">
                    K
                </span>

                <p>
                    Rusun ASN 3 - Masjid Negara PP
                </p>

            </div>

        </div>

    </section>


    <!-- =========================================================
         INFORMASI
    ========================================================== -->

    <section class="bus-notice">

        <div class="notice-icon">

            <i class="fas fa-info-circle"></i>

        </div>

        <p>

            Rute 1E dan 2E beroperasi khusus pada jam puncak

            <strong>
                (04.00-06.00)
            </strong>

            untuk memfasilitasi
            pergerakan pekerja komuter.

        </p>

    </section>


    <!-- =========================================================
         TARIF + DETAIL RUTE
    ========================================================== -->

    <section class="bus-route-detail">


        <!-- =====================================================
             TARIF LAYANAN
        ====================================================== -->

        <div class="tariff-card">

            <h2>
                Tarif Layanan
            </h2>


            <div class="tariff-price">

                Rp 0,-

                <span>
                    / Penumpang
                </span>

            </div>


            <p>

                Saat ini layanan Bus Perkotaan Nusantara
                beroperasi tanpa biaya untuk seluruh
                warga dan pengunjung sebagai bagian dari
                inisiatif

                <strong>
                    Transformasi Hijau dan Digital
                </strong>

                Otorita IKN.

            </p>


            <a
                href="#"
                class="tariff-button"
            >

                <i class="fas fa-qrcode"></i>

                Unduh Aplikasi Mitra Darat

            </a>

        </div>


        <!-- =====================================================
             DETAIL RUTE
        ====================================================== -->

        <div class="route-detail-content">

            <h2>
                Detail Rute &amp; Koridor
            </h2>


            <div class="route-grid">


                <!-- =================================================
                     KORIDOR 1
                ================================================== -->

                <div class="route-card">

                    <div class="route-card-title">

                        <div class="route-icon">

                            <i class="fas fa-briefcase"></i>

                        </div>

                        <h3>
                            Koridor 1: Pusat Pemerintahan
                        </h3>

                    </div>


                    <p>
                        Menghubungkan area esensial di Kawasan Inti
                        Pusat Pemerintahan (KIPP).
                    </p>


                    <ul>

                        <li>
                            Istana Wapres
                        </li>

                        <li>
                            Kemenko 3
                        </li>

                        <li>
                            Plaza Barat
                        </li>

                    </ul>

                </div>


                <!-- =================================================
                     KORIDOR 2
                ================================================== -->

                <div class="route-card">

                    <div class="route-card-title">

                        <div class="route-icon">

                            <i class="fas fa-building"></i>

                        </div>

                        <h3>
                            Koridor 2: Hunian &amp; Residensial
                        </h3>

                    </div>


                    <p>
                        Jalur penghubung utama untuk kawasan
                        tempat tinggal ASN dan pekerja.
                    </p>


                    <ul>

                        <li>
                            Rusun ASN 1 &amp; 2
                        </li>

                        <li>
                            Rest Area IKN
                        </li>

                        <li>
                            Hotel Nusantara
                        </li>

                    </ul>

                </div>


                <!-- =================================================
                     FASILITAS HALTE
                ================================================== -->

                <div class="facility-card">

                    <div class="facility-content">

                        <h3>
                            Fasilitas Halte Terintegrasi
                        </h3>

                        <p>
                            Halte dilengkapi dengan SPKLU,
                            Parkir Sepeda, dan akses pejalan kaki
                            yang aman.
                        </p>

                    </div>


                    <div class="facility-icon">

                        <i class="fas fa-bus"></i>

                    </div>

                </div>

            </div>

        </div>

    </section>


</div>


<!-- =========================================================
     JAVASCRIPT TAB
========================================================== -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    const tabs =
        document.querySelectorAll(".schedule-tab");

    const panels =
        document.querySelectorAll(".schedule-panel");


    tabs.forEach(function (tab) {

        tab.addEventListener("click", function () {

            const target =
                this.getAttribute("data-target");


            /*
            |------------------------------------------------------
            | Hapus active dari semua tombol
            |------------------------------------------------------
            */

            tabs.forEach(function (item) {

                item.classList.remove("active");

            });


            /*
            |------------------------------------------------------
            | Aktifkan tombol yang diklik
            |------------------------------------------------------
            */

            this.classList.add("active");


            /*
            |------------------------------------------------------
            | Sembunyikan semua panel
            |------------------------------------------------------
            */

            panels.forEach(function (panel) {

                panel.classList.remove("active");

            });


            /*
            |------------------------------------------------------
            | Tampilkan panel tujuan
            |------------------------------------------------------
            */

            const targetPanel =
                document.getElementById(target);


            if (targetPanel) {

                targetPanel.classList.add("active");

            }

        });

    });

});

</script>


<?php

$content = ob_get_clean();

require_once "../includes/base.php";

?>
<?php
$title = "Bus Perkotaan - Profil Mobilitas IKN";
require_once __DIR__ . '/../admin/koneksi.php';

function e($value){ return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8'); }
function jam($value){ return $value ? date('H.i', strtotime($value)) : '-'; }

// =====================================================
// DATA PETA
// =====================================================
$qPeta = mysqli_query($koneksi, "SELECT * FROM informasi_peta WHERE status='aktif' ORDER BY id DESC LIMIT 1");
$peta = mysqli_fetch_assoc($qPeta);

// =====================================================
// DATA LAYANAN
// =====================================================
$qLayanan = mysqli_query($koneksi, "SELECT * FROM layanan WHERE status='aktif' ORDER BY urutan ASC,id ASC");
$layanan = [];
while($row = mysqli_fetch_assoc($qLayanan)){ $layanan[] = $row; }

// =====================================================
// DATA JADWAL REGULER
// =====================================================
$qReguler = mysqli_query($koneksi, "
    SELECT j.*, l.kode, l.nama_layanan, l.warna
    FROM jam_operasional j
    INNER JOIN layanan l ON l.id = j.layanan_id
    WHERE l.status = 'aktif'
    ORDER BY l.urutan ASC,l.id ASC
");

$reguler = [];
while($row = mysqli_fetch_assoc($qReguler)){ $reguler[] = $row; }

// =====================================================
// DATA JADWAL KONDISIONAL
// =====================================================
$qKondisional = mysqli_query($koneksi, "
    SELECT j.*, l.kode, l.nama_layanan, l.warna
    FROM jam_kondisional j
    INNER JOIN layanan l ON l.id = j.layanan_id
    WHERE l.status = 'aktif'
    ORDER BY l.urutan ASC,l.id ASC
");

$kondisional = [];
while($row = mysqli_fetch_assoc($qKondisional)){ $kondisional[] = $row; }

// =====================================================
// KELOMPOK LAYANAN
// =====================================================
$utama = ['1E','2','3','4'];
$ekspres = ['2E','3E'];
$komuter = ['1EM','2EM'];

$grupUtama = [];
$grupEkspres = [];
$grupKomuter = [];

foreach($layanan as $r){
    $kode = strtoupper(trim($r['kode']));

    if(in_array($kode,$utama,true)){
        $grupUtama[] = $r;
    }elseif(in_array($kode,$ekspres,true)){
        $grupEkspres[] = $r;
    }elseif(in_array($kode,$komuter,true)){
        $grupKomuter[] = $r;
    }else{
        // Layanan baru otomatis masuk Layanan Utama
        $grupUtama[] = $r;
    }
}

ob_start();
?>

<link rel="stylesheet" href="../assets/css/peta.css">

<div class="bus-page">

<!-- =====================================================
     HEADER
====================================================== -->
<section class="bus-header">
    <div>
        <span class="bus-label">MODA &amp; LAYANAN</span>
        <h1>Peta Jaringan Bus Perkotaan</h1>
        <p>
            Sistem transportasi massal terintegrasi Nusantara dirancang
            untuk mobilitas yang cerdas, efisien, dan ramah lingkungan.
            Jelajahi rute dan konektivitas kota masa depan.
        </p>
    </div>
</section>

<!-- =====================================================
     PETA
====================================================== -->
<section class="bus-map-section">
    <div class="bus-map-card">

        <?php if($peta && !empty($peta['gambar'])): ?>

            <img src="../uploads/peta/<?=e($peta['gambar'])?>"
                 alt="Peta Jaringan Bus Perkotaan IKN"
                 class="bus-map">

        <?php else: ?>

            <img src="../assets/images/peta/peta_bus.jpeg"
                 alt="Peta Jaringan Bus Perkotaan IKN"
                 class="bus-map">

        <?php endif; ?>

        <div class="map-caption">
            <strong>
                <?=e($peta['judul'] ?? 'Peta Jaringan Bus Perkotaan IKN')?>
            </strong>

            <span>
                <?=e($peta['deskripsi'] ?? 'Peta jaringan dan informasi rute bus perkotaan.')?>
            </span>
        </div>

    </div>
</section>



<!-- =====================================================
     JADWAL OPERASIONAL
====================================================== -->
<section class="bus-schedule">

    <div class="section-heading">
        <div>
            <span>LAYANAN BUS</span>
            <h2>Jadwal Operasional</h2>
        </div>

        <div class="schedule-filter">
            <button type="button" class="schedule-tab active" data-target="reguler">
                Reguler
            </button>

            <button type="button" class="schedule-tab" data-target="kondisional">
                Kondisional
            </button>
        </div>
    </div>

    <div class="schedule-content">

        <!-- =================================================
             REGULER
        ================================================== -->
        <div id="reguler" class="schedule-panel active">
            <div class="schedule-grid">

                <?php if(!empty($reguler)): ?>

                    <?php foreach($reguler as $r): ?>

                        <div class="schedule-card" style="--route-color: <?=e($r['warna'] ?? '#64748B')?>;">

                            <div class="route-number" style="background:<?=e($r['warna'] ?? '#64748B')?>;">
                                <?=e($r['kode'])?>
                            </div>

                            <div class="route-info">

                                <h3>
                                    <?=e($r['nama_layanan'])?>
                                </h3>

                                <div class="schedule-row">
                                    <span>Hari Biasa</span>
                                    <strong>
                                        <?=jam($r['hari_biasa_mulai'])?> -
                                        <?=jam($r['hari_biasa_selesai'])?>
                                    </strong>
                                </div>

                                <div class="schedule-row">
                                    <span>Akhir Pekan</span>
                                    <strong>
                                        <?=jam($r['akhir_pekan_mulai'])?> -
                                        <?=jam($r['akhir_pekan_selesai'])?>
                                    </strong>
                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <div class="schedule-card">
                        <div class="route-info">
                            <h3>Belum ada jadwal reguler</h3>
                            <div class="schedule-row">
                                <span>Informasi</span>
                                <strong>Belum tersedia</strong>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>

        <!-- =================================================
             KONDISIONAL
        ================================================== -->
        <div id="kondisional" class="schedule-panel">
            <div class="schedule-grid">

                <?php if(!empty($kondisional)): ?>

                    <?php foreach($kondisional as $r): ?>

                        <div class="schedule-card" style="--route-color: <?=e($r['warna'] ?? '#64748B')?>;">

                            <div class="route-number" style="background:<?=e($r['warna'] ?? '#64748B')?>;">
                                <?=e($r['kode'])?>
                            </div>

                            <div class="route-info">

                                <h3>
                                    <?=e($r['nama_layanan'])?>
                                </h3>

                                <div class="schedule-row">
                                    <span><?=e($r['jenis'])?></span>

                                    <strong>
                                        <?php if(!empty($r['waktu_mulai']) && !empty($r['waktu_selesai'])): ?>

                                            <?=jam($r['waktu_mulai'])?> -
                                            <?=jam($r['waktu_selesai'])?>

                                        <?php else: ?>

                                            Sesuai Kebutuhan

                                        <?php endif; ?>
                                    </strong>
                                </div>

                                <?php if(!empty($r['keterangan'])): ?>

                                    <div class="schedule-row">
                                        <span>Keterangan</span>
                                        <strong><?=e($r['keterangan'])?></strong>
                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <div class="schedule-card">
                        <div class="route-info">
                            <h3>Belum ada jadwal kondisional</h3>
                            <div class="schedule-row">
                                <span>Informasi</span>
                                <strong>Belum tersedia</strong>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>

    </div>
</section>

<!-- =====================================================
     LAYANAN BUS
====================================================== -->
<section class="bus-services">

    <!-- LAYANAN UTAMA -->
    <div class="service-column">

        <h3>
            <span class="service-line"></span>
            LAYANAN UTAMA
        </h3>

        <?php if(!empty($grupUtama)): ?>

            <?php foreach($grupUtama as $r): ?>

                <div class="service-item">

                    <span class="service-badge" style="background:<?=e($r['warna'] ?? '#64748B')?>;">
                        <?=e($r['kode'])?>
                    </span>

                    <p>
                        <strong><?=e($r['nama_layanan'])?></strong><br>
                        <?=e($r['deskripsi'])?>
                    </p>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="service-item">
                <p>Belum ada layanan utama.</p>
            </div>

        <?php endif; ?>

    </div>

    <!-- LAYANAN EKSPRES -->
    <div class="service-column">

        <h3>
            <span class="service-line"></span>
            LAYANAN EKSPRES
        </h3>

        <?php if(!empty($grupEkspres)): ?>

            <?php foreach($grupEkspres as $r): ?>

                <div class="service-item">

                    <span class="service-badge" style="background:<?=e($r['warna'] ?? '#64748B')?>;">
                        <?=e($r['kode'])?>
                    </span>

                    <p>
                        <strong><?=e($r['nama_layanan'])?></strong><br>
                        <?=e($r['deskripsi'])?>
                    </p>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="service-item">
                <p>Belum ada layanan ekspres.</p>
            </div>

        <?php endif; ?>

    </div>

    <!-- LAYANAN KOMUTER -->
    <div class="service-column">

        <h3>
            <span class="service-line"></span>
            LAYANAN KOMUTER
        </h3>

        <?php if(!empty($grupKomuter)): ?>

            <?php foreach($grupKomuter as $r): ?>

                <div class="service-item">

                    <span class="service-badge" style="background:<?=e($r['warna'] ?? '#64748B')?>;">
                        <?=e($r['kode'])?>
                    </span>

                    <p>
                        <strong><?=e($r['nama_layanan'])?></strong><br>
                        <?=e($r['deskripsi'])?>
                    </p>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="service-item">
                <p>Belum ada layanan komuter.</p>
            </div>

        <?php endif; ?>

    </div>

</section>

<!-- =====================================================
     INFORMASI
====================================================== -->
<section class="bus-notice">

    <div class="notice-icon">
        <i class="fas fa-info-circle"></i>
    </div>

    <p>
        <strong>Informasi:</strong>
        Jadwal dan rute layanan bus dapat berubah mengikuti kondisi
        serta kebijakan operasional transportasi di kawasan IKN.
    </p>

</section>

<!-- =====================================================
     TARIF + DETAIL RUTE
====================================================== -->
<section class="bus-route-detail">

    <!-- TARIF -->
    <div class="tariff-card">

        <h2>Tarif Layanan</h2>

        <div class="tariff-price">
            Rp 0,- <span>/ Penumpang</span>
        </div>

        <p>
            Saat ini layanan Bus Perkotaan Nusantara beroperasi tanpa biaya
            untuk seluruh warga dan pengunjung sebagai bagian dari inisiatif
            <strong>Transformasi Hijau dan Digital</strong> Otorita IKN.
        </p>

        <a href="https://apps.apple.com/id/app/mitradarat/id6445860885?l=id"
           target="_blank"
           rel="noopener noreferrer"
           class="tariff-button">

            <i class="fas fa-qrcode"></i>
            Unduh Aplikasi Mitra Darat

        </a>

    </div>

    <!-- DETAIL RUTE -->
    <div class="route-detail-content">

        <h2>Detail Rute &amp; Koridor</h2>

        <div class="route-grid">

            <?php
            $detailRute = [
                [
                    'icon' => 'fa-briefcase',
                    'judul' => 'Koridor 1: Pusat Pemerintahan',
                    'deskripsi' => 'Menghubungkan area esensial di Kawasan Inti Pusat Pemerintahan (KIPP).',
                    'point' => ['Istana Wapres','Kemenko 3','Plaza Barat']
                ],
                [
                    'icon' => 'fa-building',
                    'judul' => 'Koridor 2: Hunian & Residensial',
                    'deskripsi' => 'Jalur penghubung utama untuk kawasan tempat tinggal ASN dan pekerja.',
                    'point' => ['Rusun ASN 1 & 2','Rest Area IKN','Hotel Nusantara']
                ]
            ];
            ?>

            <?php foreach($detailRute as $r): ?>

                <div class="route-card">

                    <div class="route-card-title">

                        <div class="route-icon">
                            <i class="fas <?=e($r['icon'])?>"></i>
                        </div>

                        <h3><?=e($r['judul'])?></h3>

                    </div>

                    <p>
                        <?=e($r['deskripsi'])?>
                    </p>

                    <ul>
                        <?php foreach($r['point'] as $point): ?>
                            <li><?=e($point)?></li>
                        <?php endforeach; ?>
                    </ul>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

</div>

<!-- =====================================================
     JAVASCRIPT TAB
====================================================== -->
<script>
document.addEventListener("DOMContentLoaded",function(){
    const tabs=document.querySelectorAll(".schedule-tab");
    const panels=document.querySelectorAll(".schedule-panel");

    tabs.forEach(function(tab){
        tab.addEventListener("click",function(){
            const target=this.getAttribute("data-target");

            tabs.forEach(function(item){
                item.classList.remove("active");
            });

            this.classList.add("active");

            panels.forEach(function(panel){
                panel.classList.remove("active");
            });

            const targetPanel=document.getElementById(target);

            if(targetPanel){
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
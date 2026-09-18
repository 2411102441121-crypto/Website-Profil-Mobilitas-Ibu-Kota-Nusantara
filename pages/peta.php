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
    ORDER BY l.urutan ASC, l.id ASC
");

$kondisional = [];
while($row = mysqli_fetch_assoc($qKondisional)){ 
    $kondisional[] = $row; 
}

// =====================================================
// KELOMPOK LAYANAN (Disesuaikan dengan Peta IKN & Ramadan)
// =====================================================
$utama   = ['1E', '2', '2E', '3', '3E', '4'];
$komuter = ['1EM', '2EM', '2M']; // <-- Tambahkan '2M' di sini

$grupUtama   = [];
$grupKomuter = [];

foreach($layanan as $r){
    $kode = strtoupper(trim($r['kode']));

    if(in_array($kode, $utama, true)){
        $grupUtama[] = $r;
    } else {
        // Semua rute pagi / komuter / tambahan lainnya
        $grupKomuter[] = $r;
    }
}

ob_start();
?>

<link rel="stylesheet" href="/ikn-mobility/assets/css/peta.css?v=2">

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
<!-- =====================================================
     PETA & SLIDER
====================================================== -->
<section class="bus-map-section">
    <div class="bus-map-card">

        <!-- CONTAINER PETA REGULER -->
        <div id="map-reguler" class="map-container active">
            <img src="../uploads/peta/<?=e($peta['gambar'] ?? 'peta_bus.jpeg')?>" 
                 alt="Peta Jaringan Bus Perkotaan IKN" class="bus-map">
            <div class="map-caption">
                <strong>Peta Jaringan Bus Perkotaan IKN (Reguler)</strong>
            </div>
        </div>

        <!-- CONTAINER PETA KONDISIONAL (RAMADAN) -->
        <div id="map-kondisional" class="map-container" style="display: none;">
            
            <!-- Sub Switcher Gambar Peta Kondisional -->
            <div class="cond-map-tabs">
                <button type="button" class="btn-sub-map active" data-map="peta-ramadan">
                    <span class="sub-map-icon">
                        <i class="fa-solid fa-mosque"></i>
                    </span>
                    <span class="sub-map-text">
                        <strong>Peta Bus Ramadan</strong>
                        <small>Rute khusus selama Ramadan</small>
                    </span>
                </button>

                <button type="button" class="btn-sub-map" data-map="peta-ekspres">
                    <span class="sub-map-icon">
                        <i class="fa-solid fa-bus"></i>
                    </span>
                    <span class="sub-map-text">
                        <strong>Peta Bus Ekspres Ramadan</strong>
                        <small>Layanan ekspres selama Ramadan</small>
                    </span>
                </button>
            </div>

            <!-- Gambar Peta Ramadan 1 -->
            <div id="peta-ramadan" class="sub-map-item active">
                <img src="../uploads/peta/<?=e($peta['gambar_ramadan'] ?? 'peta_ramadan.jpeg')?>" 
                     alt="Peta Bus Perkotaan Ramadan" class="bus-map">
                <div class="map-caption">
                    <strong>Peta Bus Perkotaan Ramadan Nusantara</strong>
                </div>
            </div>

            <!-- Gambar Peta Ramadan 2 -->
            <div id="peta-ekspres" class="sub-map-item" style="display: none;">
                <img src="../uploads/peta/<?=e($peta['gambar_ekspres_ramadan'] ?? 'peta_ekspres_ramadan.jpeg')?>" 
                     alt="Peta Bus Ekspres Ramadan" class="bus-map">
                <div class="map-caption">
                    <strong>Peta Bus Ekspres Ramadan Nusantara</strong>
                </div>
            </div>

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

                        <div class="schedule-card" style="--route-color: <?=e($r['warna'] ?? '#050608')?>;">

                            <?php 
                                // Daftar kode rute yang berlatar terang dan butuh teks hitam
                                $kodeTerang = ['2E', '3', '1EM', '2EM']; 
                                $warnaTeks = in_array(strtoupper(trim($r['kode'])), $kodeTerang) ? '#000000' : '#ffffff';
                            ?>

                            <div class="route-number" style="background:<?=e($r['warna'] ?? '#64748B')?>; color: <?= $warnaTeks ?>;">
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

                        <?php 
                            // Logika warna teks: Rute 2E, 3, 1EM, 2EM memakai teks hitam (#000000)
                            $kodeTerang = ['2E', '3', '1EM', '2EM']; 
                            $warnaTeks = in_array(strtoupper(trim($r['kode'])), $kodeTerang) ? '#000000' : '#ffffff';
                        ?>

                        <div class="schedule-card" style="--route-color: <?=e($r['warna'] ?? '#64748B')?>;">

                            <div class="route-number" style="background:<?=e($r['warna'] ?? '#64748B')?>; color: <?= $warnaTeks ?> !important;">
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
                                        <strong style="white-space: normal; text-align: right; line-height: 1.3;">
                                            <?=e($r['keterangan'])?>
                                        </strong>
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
        KORIDOR REGULER
    </h3>

    <?php if(!empty($grupUtama)): ?>

        <?php foreach($grupUtama as $r): ?>
            <?php 
                // Cek jika rute berlatar terang (3, 1EM, 2EM) pakai teks hitam (#000000), selebihnya putih (#ffffff)
                $kodeTerang = ['2E', '3', '1EM', '2EM']; 
                $warnaTeks = in_array(strtoupper(trim($r['kode'])), $kodeTerang) ? '#000000' : '#ffffff';
            ?>

            <div class="service-item">

                <span class="service-badge" style="background:<?=e($r['warna'] ?? '#64748B')?>; color: <?= $warnaTeks ?> !important;">
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
    <!-- LAYANAN KOMUTER -->
    <div class="service-column">

        <h3>
            <span class="service-line"></span>
            KORIDOR PAGI
        </h3>

        <?php if(!empty($grupKomuter)): ?>

            <?php foreach($grupKomuter as $r): ?>
                <?php 
                    $kodeTerang = ['2E', '3', '1EM', '2EM']; 
                    $warnaTeks = in_array(strtoupper(trim($r['kode'])), $kodeTerang) ? '#000000' : '#ffffff';
                ?>

                <div class="service-item">

                    <span class="service-badge" style="background:<?=e($r['warna'] ?? '#64748B')?>; color: <?= $warnaTeks ?> !important;">
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
     JAVASCRIPT TAB
====================================================== -->
<script>
document.addEventListener("DOMContentLoaded", function(){
    const tabs = document.querySelectorAll(".schedule-tab");
    const panels = document.querySelectorAll(".schedule-panel");
    
    // Element Peta
    const mapReguler = document.getElementById("map-reguler");
    const mapKondisional = document.getElementById("map-kondisional");

    tabs.forEach(function(tab){
        tab.addEventListener("click", function(){
            const target = this.getAttribute("data-target");

            // Switcher Tab Jadwal
            tabs.forEach(item => item.classList.remove("active"));
            this.classList.add("active");

            panels.forEach(panel => panel.classList.remove("active"));
            const targetPanel = document.getElementById(target);
            if(targetPanel) targetPanel.classList.add("active");

            // OTOMATIS SWAP GAMBAR PETA
            if(target === 'kondisional') {
                mapReguler.style.display = 'none';
                mapKondisional.style.display = 'block';
            } else {
                mapReguler.style.display = 'block';
                mapKondisional.style.display = 'none';
            }
        });
    });

    // Sub-Tab Switcher untuk Peta Kondisional (Ramadan vs Ekspres Ramadan)
    const subTabs = document.querySelectorAll(".btn-sub-map");
    subTabs.forEach(function(btn){
        btn.addEventListener("click", function(){
            const targetMap = this.getAttribute("data-map");

            subTabs.forEach(b => b.classList.remove("active"));
            this.classList.add("active");

            document.getElementById("peta-ramadan").style.display = 'none';
            document.getElementById("peta-ekspres").style.display = 'none';

            document.getElementById(targetMap).style.display = 'block';
        });
    });
});
</script>

<?php
$content = ob_get_clean();
require_once "../includes/base.php";
?>
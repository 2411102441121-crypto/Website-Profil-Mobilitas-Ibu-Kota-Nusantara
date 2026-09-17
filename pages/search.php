<?php
$title = "Hasil Pencarian - Profil Mobilitas IKN";
require_once __DIR__ . '/../admin/koneksi.php';

// Ambil kata kunci dari URL (?q=...)
$query = isset($_GET['q']) ? trim($_GET['q']) : '';

// FUNGSI HIGHLIGHT KATA KUNCI (Case Insensitive)
function highlight_text($text, $query) {
    if (empty($query)) return htmlspecialchars($text);
    return preg_replace('/(' . preg_quote($query, '/') . ')/iu', '<mark class="search-highlight">$1</mark>', htmlspecialchars($text));
}

ob_start();
?>

<style>
.search-container {
    max-width: 1000px;
    margin: 40px auto 80px;
    padding: 0 20px;
}

.search-header {
    background: #ffffff;
    border-radius: 16px;
    padding: 30px;
    border: 1px solid #ebedf0;
    box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    margin-bottom: 30px;
}

.search-header h1 {
    font-size: 28px;
    font-weight: 800;
    color: #204420;
    margin-bottom: 10px;
}

.search-input-box {
    position: relative;
    margin-top: 20px;
}

.search-input-box input {
    width: 100%;
    padding: 14px 20px 14px 45px;
    border-radius: 12px;
    border: 1px solid #d0d7d1;
    font-size: 15px;
    outline: none;
    transition: border 0.2s;
}

.search-input-box input:focus {
    border-color: #204420;
}

.search-input-box i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #204420;
    font-size: 16px;
}

.result-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 20px 24px;
    border: 1px solid #ebedf0;
    margin-bottom: 16px;
    transition: transform 0.2s, box-shadow 0.2s;
    text-decoration: none;
    display: block;
    color: inherit;
}

.result-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.05);
    color: inherit;
}

.result-badge {
    display: inline-block;
    background: #E8F2EE;
    color: #204420;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
    margin-bottom: 8px;
}

.result-title {
    font-size: 18px;
    font-weight: 700;
    color: #204420;
    margin-bottom: 6px;
}

.result-desc {
    font-size: 13px;
    color: #55695c;
    margin: 0;
    line-height: 1.5;
}

.no-result {
    text-align: center;
    padding: 60px 20px;
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #ebedf0;
}

.no-result i {
    font-size: 48px;
    color: #a0b3a5;
    margin-bottom: 16px;
}

.search-highlight {
    background-color: #ffe066;
    color: #204420;
    font-weight: 700;
    padding: 0 4px;
    border-radius: 4px;
}
</style>

<div class="search-container">
    <div class="search-header">
        <h1>Hasil Pencarian</h1>
        <p class="text-muted mb-0">
            <?= !empty($query) ? 'Menampilkan hasil pencarian untuk: <strong>"' . htmlspecialchars($query) . '"</strong>' : 'Ketik kata kunci di bawah ini untuk mencari konten'; ?>
        </p>

        <form action="search.php" method="GET" class="search-input-box">
            <i class="fas fa-search"></i>
            <input type="text" name="q" value="<?= htmlspecialchars($query); ?>" placeholder="Cari rute, bus, halte, peta, atau layanan IKN...">
        </form>
    </div>

    <div class="search-results">
        <?php
        $data_halaman = [
            // --- HALAMAN UTAMA ---
            [
                'judul' => 'Beranda Utama Profil Mobilitas IKN',
                'kategori' => 'Beranda',
                'deskripsi' => 'Portal utama Profil Mobilitas Ibu Kota Nusantara. Menampilkan ikhtisar layanan transportasi, statistik mobilitas cerdas, dan navigasi terpadu.',
                'url' => '../beranda.php'
            ],
            [
                'judul' => 'Layanan Transportasi Antarkota',
                'kategori' => 'Layanan Antarkota',
                'deskripsi' => 'Portal utama konektivitas transportasi antarkota yang menghubungkan IKN dengan kota-kota penyangga seperti Balikpapan dan Samarinda.',
                'url' => 'antarkota.php'
            ],
            [
                'judul' => 'Layanan Transportasi Intrakota',
                'kategori' => 'Layanan Intrakota',
                'deskripsi' => 'Portal utama sistem jaringan transportasi dalam kota Nusantara berbasis ramah lingkungan, cerdas, dan terintegrasi.',
                'url' => 'intrakota.php'
            ],
            [
                'judul' => 'Peta Jaringan Rute & Koridor Transportasi',
                'kategori' => 'Peta & Rute',
                'deskripsi' => 'Portal utama peta interaktif jaringan rute bus perkotaan, halte transit, koridor 1E, 2, 2E, 3, 3E, 4, 1EM, dan 2EM IKN.',
                'url' => 'peta.php'
            ],
            [
                'judul' => 'Aktivitas & Event Mobilitas IKN',
                'kategori' => 'Aktivitas',
                'deskripsi' => 'Portal utama kumpulan berita, kegiatan masyarakat, pembangunan infrastruktur, dan perkembangan mobilitas cerdas IKN.',
                'url' => 'aktivitas.php'
            ],
            [
                'judul' => 'Tentang Profil Mobilitas IKN',
                'kategori' => 'Informasi',
                'deskripsi' => 'Portal utama visi, misi, dan informasi latar belakang transformasi mobilitas berkelanjutan di Ibu Kota Nusantara.',
                'url' => 'tentang.php'
            ],

            // --- SUBHALAMAN INTRAKOTA ---
            [
                'judul' => 'Bus Perkotaan Nusantara',
                'kategori' => 'Layanan Intrakota',
                'deskripsi' => 'Detail informasi layanan angkutan umum utama pendukung pergerakan masyarakat dan ASN di Kawasan Inti Pusat Pemerintahan (KIPP) IKN dengan 14 halte operasional dan armada bus listrik.',
                'url' => '../detail/bus-perkotaan.php'
            ],
            [
                'judul' => 'Jalur Pejalan Kaki & Mobilitas Aktif Terpadu',
                'kategori' => 'Layanan Intrakota',
                'deskripsi' => 'Detail informasi penerapan prinsip 10-Minute City berbasis pedestrian-first, trotoar ekstra lebar, rindang, dan terhubung langsung dengan jalur sepeda.',
                'url' => '../detail/mobilitas-aktif.php'
            ],
            [
                'judul' => 'Ekosistem Sepeda & Mikromobilitas Ramah Lingkungan',
                'kategori' => 'Layanan Intrakota',
                'deskripsi' => 'Detail informasi solusi mobilitas aktif first-mile last-mile non-emisi di IKN dengan docking station bertenaga surya dan sensor IoT geofencing.',
                'url' => '../detail/mikromobilitas.php'
            ],

            // --- SUBHALAMAN ANTARKOTA ---
            [
                'judul' => 'Layanan Bandara VVIP Nusantara (IKN)',
                'kategori' => 'Layanan Antarkota',
                'deskripsi' => 'Detail informasi fasilitas penerbangan utama khusus melayani tamu kenegaraan dan pejabat VVIP/VIP di Kawasan Inti Pusat Pemerintahan (KIPP). Dilengkapi terminal VVIP & Helipad.',
                'url' => '../detail/antarkota-bandara.php?id=bandara-vvip'
            ],
            [
                'judul' => 'Layanan Bandara APT Pranoto Samarinda (AAP)',
                'kategori' => 'Layanan Antarkota',
                'deskripsi' => 'Detail informasi konektivitas udara utama Kalimantan Timur dan Samarinda pendukung IKN. Melayani penerbangan Batik Air, Lion Air, Super Air Jet, Citilink, dan Wings Air.',
                'url' => '../detail/antarkota-bandara.php?id=apt-pranoto'
            ],
            [
                'judul' => 'Layanan Bandara SAMS Sepinggan Balikpapan (BPN)',
                'kategori' => 'Layanan Antarkota',
                'deskripsi' => 'Detail informasi gerbang udara utama menuju IKN via Tol Balsam (~90 menit). Melayani penerbangan domestik & internasional (AirAsia, Scoot, Royal Brunei, Garuda Indonesia).',
                'url' => '../detail/antarkota-bandara.php?id=sams-sepinggan'
            ],
            [
                'judul' => 'Layanan Bus Antarkota IKN',
                'kategori' => 'Layanan Antarkota',
                'deskripsi' => 'Detail informasi rute bus antarkota terintegrasi yang melayani perjalanan dari Balikpapan dan Samarinda menuju IKN.',
                'url' => '../detail/antarkota-bus.php'
            ],
            [
                'judul' => 'Pelabuhan Penyeberangan Kariangau',
                'kategori' => 'Layanan Antarkota',
                'deskripsi' => 'Detail informasi hub logistik dan penyeberangan feri Ro-Ro vital di Balikpapan menuju Penajam & Sulawesi. Jalur utama armada peti kemas & material IKN.',
                'url' => '../detail/antarkota-perairan.php?id=pelabuhan-kariangau'
            ],
            [
                'judul' => 'Pelabuhan Semayang Balikpapan',
                'kategori' => 'Layanan Antarkota',
                'deskripsi' => 'Detail informasi gerbang utama maritim penumpang & logistik nasional Pelindo. Terhubung dengan Balikpapan City Trans (Bacitra) dan bus antarkota IKN.',
                'url' => '../detail/antarkota-perairan.php?id=pelabuhan-semayang'
            ],
            [
                'judul' => 'Pelabuhan Penyeberangan Penajam',
                'kategori' => 'Layanan Antarkota',
                'deskripsi' => 'Detail informasi pintu gerbang jalur laut utama PPU menuju IKN. Melayani kapal feri ASDP 24 jam, speedboat, klotok, serta travel lanjutan ke Sepaku/KIPP.',
                'url' => '../detail/antarkota-perairan.php?id=pelabuhan-penajam'
            ],
            [
                'judul' => 'Layanan Travel & Shuttle Khusus',
                'kategori' => 'Layanan Antarkota',
                'deskripsi' => 'Detail informasi armada travel intercity dan shuttle point-to-point untuk kenyamanan pergerakan penumpang antarwilayah.',
                'url' => '../detail/antarkota-travel.php'
            ],

            // --- SUBHALAMAN AKTIVITAS ---
            [
                'judul' => 'Aktivitas & Komunitas Masyarakat',
                'kategori' => 'Aktivitas',
                'deskripsi' => 'Detail informasi kegiatan sosial, partisipasi warga, dan pemanfaatan ruang publik berkelanjutan oleh masyarakat IKN.',
                'url' => '../detail/aktivitas-masyarakat.php'
            ],
            [
                'judul' => 'Progress Pembangunan Infrastruktur',
                'kategori' => 'Aktivitas',
                'deskripsi' => 'Detail informasi pembaruan terkini mengenai pembangunan jalan, halte, depo, dan sarana fisik di IKN.',
                'url' => '../detail/aktivitas-pembangunan.php'
            ],
            [
                'judul' => 'Uji Coba & Operasional Transportasi Cerdas',
                'kategori' => 'Aktivitas',
                'deskripsi' => 'Detail informasi pelaksanaan uji coba kendaraan otonom, bus listrik, dan sistem manajemen lalu lintas cerdas.',
                'url' => '../detail/aktivitas-transportasi.php'
            ]
        ];

        $found = false;

        if (!empty($query)) {
            foreach ($data_halaman as $item) {
                // HANYA CEK TEKS YANG TERLIHAT DI LAYAR (Judul, Deskripsi, Kategori)
                if (stripos($item['judul'], $query) !== false || 
                    stripos($item['deskripsi'], $query) !== false || 
                    stripos($item['kategori'], $query) !== false) {
                    
                    $found = true;
                    ?>
                    <a href="<?= htmlspecialchars($item['url']); ?>" class="result-card">
                        <span class="result-badge"><?= highlight_text($item['kategori'], $query); ?></span>
                        <div class="result-title"><?= highlight_text($item['judul'], $query); ?></div>
                        <p class="result-desc"><?= highlight_text($item['deskripsi'], $query); ?></p>
                    </a>
                    <?php
                }
            }
        }

        if (!empty($query) && !$found) {
            ?>
            <div class="no-result">
                <i class="fas fa-search-minus"></i>
                <h3 class="fs-5 fw-bold text-dark mb-2">Tidak Ditemukan Hasil</h3>
                <p class="text-muted fs-6 mb-0">Maaf, kata kunci "<strong><?= htmlspecialchars($query); ?></strong>" tidak cocok dengan layanan atau informasi apa pun.</p>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once "../includes/base.php";
?>
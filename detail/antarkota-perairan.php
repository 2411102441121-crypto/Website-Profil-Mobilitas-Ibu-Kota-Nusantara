<?php
// detail/antarkota-perairan.php
require_once '../config/database.php';
if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/ikn-mobility/";

// 1. DATABASE KONTEN DINAMIS DUA BAHASA/PELABUHAN
$perairan_data = [
    'pelabuhan-kariangau' => [
        'nama' => 'Pelabuhan Kariangau',
        'lokasi_singkat' => 'Kec. Balikpapan Barat, Kota Balikpapan, Kalimantan Timur',
        'hero_banner' => 'assets/images/antarkota/pelabuhan_kariangau.webp',
        'main_img' => 'assets/images/antarkota/pelabuhan_kariangau2.jpeg',
        'sub_category_title' => 'GERBANG LOGISTIK & KONEKTIVITAS PENYEBERANGAN',
        'desc_1' => 'Pelabuhan Kariangau merupakan hub logistik dan penyeberangan feri (Ro-Ro) vital di Balikpapan yang menghubungkan Balikpapan dengan Penajam Paser Utara (PPU), sekaligus menjadi gerbang utama penyeberangan antarpulau menuju Pulau Sulawesi. Dikelola oleh PT Kaltim Kariangau Terminal (KKT) untuk terminal peti kemas dan ASDP untuk dermaga penyeberangan feri, pelabuhan ini menjadi jalur utama distribusi bahan bangunan, kendaraan, dan logistik berat menuju Kawasan Inti Pusat Pemerintahan (KIPP) Nusantara.',
        'desc_2' => 'Sebagai tulang punggung rantai pasok maritim IKN Nusantara, kawasan Kariangau melayani aktivitas bongkar muat peti kemas berskala internasional sekaligus penyeberangan lintas selat 24 jam yang efisien memangkas waktu tempuh kendaraan logistik antarwilayah.',
        'tag_1_title' => 'TERMINAL PETI KEMAS (KKT)',
        'tag_1_desc' => 'Operasional logistik kontainer modern, dermaga gantry crane & koridor industri ekspor-impor.',
        'tag_2_title' => 'DERMAGA FERI RO-RO (ASDP)',
        'tag_2_desc' => 'Layanan penyeberangan armada kendaraan, truk logistik berat & penumpang 24 jam non-stop.',
        'status_operasi' => 'Aktif 24 Jam',
        'koordinat' => 'Kec. Balikpapan Barat',
        'pengelola' => 'PT KKT & ASDP Ferry',
        'integrasi' => 'Jalur Utama Logistik & Feri',
        // Rantai Konektivitas
        'rantai' => [
            ['title' => 'Pelabuhan Kariangau', 'sub' => 'Titik Muat & Dermaga Ro-Ro', 'icon' => 'fas fa-flask'],
            ['title' => 'Kapal Feri Ro-Ro', 'sub' => 'Penyeberangan Selat ASDP', 'icon' => 'fas fa-truck'],
            ['title' => 'Pelabuhan Penajam', 'sub' => 'Pendaratan Penajam Paser Utara', 'icon' => 'fas fa-landmark'],
            ['title' => 'Jl. Penajam - Sepaku', 'sub' => 'Koridor Logistik IKN', 'icon' => 'fas fa-road'],
            ['title' => 'KIPP IKN Nusantara', 'sub' => 'Kawasan Inti Pusat Pemerintahan', 'icon' => 'fas fa-bolt', 'accent' => true]
        ],
        // Layanan Transportasi Lanjutan
        'layanan' => [
            [
                'badge' => 'Jalur Darat Cepat',
                'img' => 'assets/images/antarkota/pelabuhan_kariangau4.jpeg',
                'title' => 'Mobil Pribadi / Travel / Rental',
                'desc' => 'Akses darat langsung via Akses Tol Kariangau & Jembatan Pulau Balang menuju Simpang Riko hingga KIPP IKN (± 1–1.5 jam).',
                'rute' => 'Via Jembatan Pulau Balang'
            ],
            [
                'badge' => 'Koridor Logistik & Bahan Bangunan',
                'img' => 'assets/images/antarkota/pelabuhan_kariangau8.webp',
                'title' => 'Truk & Armada Logistik',
                'desc' => 'Rute utama distribusi material konstruksi & peti kemas dari KKT Kariangau langsung menuju kawasan proyek IKN.',
                'rute' => 'Tol Kariangau / Jalan Arteri'
            ],
            [
                'badge' => 'Penyeberangan Laut (Feri)',
                'img' => 'assets/images/antarkota/pelabuhan_kariangau2.jpeg',
                'title' => 'Kapal Feri Ro-Ro (Kariangau – Penajam)',
                'desc' => 'Layanan kapal feri 24 jam penyeberangan kendaraan/penumpang menyeberangi Teluk Balikpapan menuju Pelabuhan Penajam.',
                'rute' => 'Beroperasi 24 Jam Non-Stop'
            ]
        ],
        // Fasilitas
        'fasilitas' => [
            ['icon' => 'fas fa-truck-ramp-box', 'title' => 'Area Parkir Siap Muat (Lahan Truk)'],
            ['icon' => 'fas fa-ticket', 'title' => 'Loket Tiket Elektronik (Ferizy)'],
            ['icon' => 'fas fa-couch', 'title' => 'Ruang Tunggu Penumpang Ber-AC'],
            ['icon' => 'fas fa-utensils', 'title' => 'Kantin UMKM & Restoran Feri'],
            ['icon' => 'fas fa-mosque', 'title' => 'Mushola & Toilet Bersih'],
            ['icon' => 'fas fa-ship', 'title' => 'Dermaga Ro-Ro & Crane Kontainer']
        ],
        'galeri_1' => 'assets/images/antarkota/pelabuhan_kariangau3.jpg',
        'galeri_2' => 'assets/images/antarkota/pelabuhan_kariangau6.jpg',
        'galeri_3' => 'assets/images/antarkota/pelabuhan_kariangau7.jpg',
        'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.512398418525!2d116.8021!3d-1.1895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df1488c00000001%3A0x1111111111111111!2sPelabuhan%20Kariangau!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid'
    ],

    'pelabuhan-semayang' => [
        'nama' => 'Pelabuhan Semayang',
        'lokasi_singkat' => 'Balikpapan, Kalimantan Timur',
        'hero_banner' => 'assets/images/antarkota/pelabuhan_semayang2.webp',
        'main_img' => 'assets/images/antarkota/pelabuhan_semayang3.jpg',
        'sub_category_title' => 'Gerbang Utama Maritim',
        'desc_1' => 'Pelabuhan Semayang merupakan simpul transportasi perairan krusial di Balikpapan, melayani pergerakan penumpang dan logistik skala nasional. Sebagai salah satu pelabuhan tersibuk di kawasan Timur Indonesia, pelabuhan ini dikelola dengan standar operasional modern oleh PT Pelabuhan Indonesia (Pelindo).',
        'desc_2' => 'Dalam konteks pengembangan Ibu Kota Nusantara (IKN), Pelabuhan Semayang berperan strategis sebagai titik masuk utama dari jalur laut, menghubungkan pergerakan antarpulau dengan sistem mobilitas darat cerdas menuju Kawasan Inti Pusat Pemerintahan (KIPP).',
        'tag_1_title' => null,
        'tag_1_desc' => null,
        'tag_2_title' => null,
        'tag_2_desc' => null,
        'status_operasi' => 'Aktif Penuh',
        'koordinat' => 'Kec. Balikpapan Kota',
        'pengelola' => 'PT Pelindo',
        'integrasi' => 'Terhubung Langsung',
        
        // Rantai Konektivitas IKN
        'rantai' => [
            ['title' => 'Pelabuhan Semayang', 'sub' => 'Titik Kedatangan', 'icon' => 'fas fa-ship'],
            ['title' => 'Bus AKAP / Travel', 'sub' => 'DAMRI / Sinar Jaya', 'icon' => 'fas fa-bus'],
            ['title' => 'Tol Balikpapan - IKN', 'sub' => 'Koridor Cepat', 'icon' => 'fas fa-road'],
            ['title' => 'Park & Ride', 'sub' => 'Simpul Transit', 'icon' => 'fas fa-square-p'],
            ['title' => 'EV Bus KIPP', 'sub' => 'Mobilitas Internal', 'icon' => 'fas fa-bus-simple', 'accent' => true]
        ],
        
        // Layanan Transportasi Lanjutan
        'layanan' => [
            [
                'badge' => 'Bus DAMRI',
                'img' => 'assets/images/antarkota/bus_damri.jpg',
                'title' => 'Bus DAMRI',
                'desc' => 'Layanan bus yang menghubungkan Pelabuhan Semayang dengan berbagai titik tujuan melalui jaringan transportasi darat.',
                'rute' => 'Jadwal: Reguler'
            ],
            [
                'badge' => 'PO Sinar Jaya',
                'img' => 'assets/images/antarkota/bus_sinarjaya.jpeg',
                'title' => 'PO Sinar Jaya',
                'desc' => 'Layanan bus antarkota yang mendukung perjalanan dari Balikpapan menuju kawasan IKN melalui jaringan jalan regional.',
                'rute' => 'Jadwal: Terjadwal'
            ],
            [
                'badge' => 'Travel Lintas Kota',
                'img' => 'assets/images/antarkota/pelabuhan_penajam3.webp',
                'title' => 'Travel Lintas Kota',
                'desc' => 'Layanan perjalanan darat yang mendukung mobilitas dari Balikpapan menuju berbagai tujuan, termasuk kawasan Ibu Kota Nusantara.',
                'rute' => 'Jadwal: Mengikuti layanan operator'
            ]
        ],
        
        // Fasilitas Penumpang
        'fasilitas' => [
            ['icon' => 'fas fa-restroom', 'title' => 'Toilet Bersih'],
            ['icon' => 'fas fa-mosque', 'title' => 'Mushola'],
            ['icon' => 'fas fa-square-p', 'title' => 'Area Parkir Luas'],
            ['icon' => 'fas fa-ticket', 'title' => 'Loket Tiket Terpadu'],
            ['icon' => 'fas fa-utensils', 'title' => 'Area Kuliner'],
            ['icon' => 'fas fa-wheelchair', 'title' => 'Akses Difabel']
        ],
        
        'galeri_1' => 'assets/images/antarkota/pelabuhan_semayang.webp',
        'galeri_2' => 'assets/images/antarkota/pelabuhan_semayang4.webp',
        'galeri_3' => 'assets/images/antarkota/pelabuhan_semayang5.webp',
        'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.000000000000!2d116.8100!3d-1.2800!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df1480000000000%3A0x2222222222222222!2sPelabuhan%20Semayang!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid'
    ],

    'pelabuhan-penajam' => [
        'nama' => 'Pelabuhan Penajam',
        'lokasi_singkat' => 'Kab. Penajam Paser Utara, Kalimantan Timur',
        'hero_banner' => 'assets/images/antarkota/pelabuhan_penajam.webp',
        'main_img' => 'assets/images/antarkota/pelabuhan_penajam2.webp',
        'sub_category_title' => 'PINTU GERBANG UTAMA JALUR LAUT MENUJU IKN NUSANTARA',
        'desc_1' => 'Pelabuhan Penajam merupakan simpul transportasi perairan vital yang menghubungkan Kabupaten Penajam Paser Utara dengan Kota Balikpapan. Pelabuhan ini melayani penyeberangan kapal Feri Ro-Ro (ASDP), speedboat, dan kapal kayu (klotok) untuk mobilitas penumpang, kendaraan pribadi, hingga armada logistik.',
        'desc_2' => 'Sebagai titik darat pertama di sisi Penajam, pelabuhan ini memegang peranan strategis dalam mendukung kelancaran akses dan rantai pasok ke Kawasan Inti Pusat Pemerintahan (KIPP) Nusantara.',
        'tag_1_title' => 'DERMAGA FERI ASDP',
        'tag_1_desc' => 'Layanan penyeberangan armada kendaraan, truk logistik, dan bus 24 non-stop via Movable Bridge.',
        'tag_2_title' => 'PELABUHAN SPEEDBOAT & KLOTOK',
        'tag_2_desc' => 'Untuk mobilitas penumpang cepat non-kendaraan.',
        'status_operasi' => 'Aktif 24 Jam',
        'koordinat' => 'Kab. Penajam Paser Utara',
        'pengelola' => 'PT ASDP Indonesia Ferry / Dishub PPU',
        'integrasi' => 'Jalur Penghubung Utama',
        
        // Rantai Konektivitas IKN
        'rantai' => [
            ['title' => 'Pelabuhan Kariangau / Kp. Baru', 'sub' => 'Titik Keberangkatan', 'icon' => 'fas fa-flask'],
            ['title' => 'Kapal Feri / Speedboat / Klotok', 'sub' => 'Penyeberangan Lintas Teluk', 'icon' => 'fas fa-truck'],
            ['title' => 'Pelabuhan Penajam', 'sub' => 'Titik Kedatangan PPU', 'icon' => 'fas fa-landmark'],
            ['title' => 'Jl. Poros Penajam - Sepaku', 'sub' => 'Koridor Darat Bebas Hambatan', 'icon' => 'fas fa-road'],
            ['title' => 'KIPP IKN', 'sub' => 'Kawasan Inti Pusat Pemerintahan', 'icon' => 'fas fa-bolt', 'accent' => true]
        ],
        
        // Layanan Transportasi Lanjutan
        'layanan' => [
            [
                'badge' => 'Bus Feeder & Shuttle IKN',
                'img' => 'assets/images/antarkota/pelabuhan_penajam4.jpg',
                'title' => 'Bus Feeder / Shuttle IKN',
                'desc' => 'Bus antarkota/shuttle yang menjemput penumpang dari area pelabuhan menuju Sepaku / KIPP IKN dengan jadwal reguler dan terintegrasi.',
                'rute' => 'Layanan: Feeder Pelabuhan - Sepaku / KIPP'
            ],
            [
                'badge' => 'Travel Antarkota & Taksi Lokal',
                'img' => 'assets/images/antarkota/pelabuhan_penajam3.webp',
                'title' => 'Travel Antarkota & Taksi Lokal',
                'desc' => 'Mobil travel (Isuzu ELF, Avanza/Innova) dan taksi pangkalan rute Pelabuhan Penajam - Sepaku - KIPP IKN dengan sistem carter atau perorangan.',
                'rute' => 'Rute: Penajam - Sepaku - IKN'
            ],
            [
                'badge' => 'Jalur Arteri Utama',
                'img' => 'assets/images/antarkota/pelabuhan_penajam5.jpg',
                'title' => 'Kendaraan Pribadi / Sewa / Motor',
                'desc' => 'Menggunakan jalan arteri utama Jl. Raya Penajam - Sepaku langsung menuju Kawasan Inti IKN (Waktu tempuh ± 1-1.5 jam).',
                'rute' => 'Rute: Via Jl. Raya Penajam-Sepaku (± 1-1.5 Jam)'
            ]
        ],
        
        // Fasilitas Penyeberangan & Terminal
        'fasilitas' => [
            ['icon' => 'fas fa-landmark', 'title' => 'Dermaga Ro-Ro (MB) & Dermaga Tradisional/ Speedboat'],
            ['icon' => 'fas fa-bus', 'title' => 'Area Parkir Antrean Kendaraan'],
            ['icon' => 'fas fa-ticket', 'title' => 'Loket Tiket Elektronik (Ferizy / E-Ticketing)'],
            ['icon' => 'fas fa-child', 'title' => 'Ruang Tunggu Penumpang'],
            ['icon' => 'fas fa-cart-shopping', 'title' => 'Area UMKM / Kantin / Kuliner'],
            ['icon' => 'fas fa-mosque', 'title' => 'Mushola & Toilet Umum']
        ],
        
        'galeri_1' => 'assets/images/antarkota/pelabuhan_penajam7.jpg',
        'galeri_2' => 'assets/images/antarkota/pelabuhan_penajam8.webp',
        'galeri_3' => 'assets/images/antarkota/pelabuhan_penajam6.jpg',
        'maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.000000000000!2d116.7800!3d-1.2400!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df1480000000000%3A0x3333333333333333!2sPelabuhan%20Penajam!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid'
    ]
];

// 2. TENTUKAN DATA AKTIF BERDASARKAN PARAMETER URL `id`
$id = isset($_GET['id']) ? strtolower($_GET['id']) : 'kariangau';
if (!array_key_exists($id, $perairan_data)) {
    $id = 'kariangau'; // Default fallback
}

$data = $perairan_data[$id];

$page  = 'antarkota';
$title = $data['nama'] . " - Profil Mobilitas IKN";
ob_start();
?>

<!-- CUSTOM STYLING -->
<style>
    /* HERO HEADER IMAGE OVERLAY */
    .hero-port-banner {
        position: relative;
        width: 100%;
        height: 500px;
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 40px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        background-color: #1a2e1a;
    }

    .hero-port-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-port-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.2) 60%, transparent 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 36px 40px;
        color: #ffffff;
    }

    .hero-port-title {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 6px;
        color: #ffffff;
    }

    .hero-port-location {
        font-size: 0.95rem;
        color: #e2e8f0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* ABOUT PORT SECTION */
    .sub-cat-badge {
        font-size: 0.75rem;
        font-weight: 700;
        color: #204420;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 12px;
        display: block;
    }

    .port-main-img-wrap {
        border-radius: 20px;
        overflow: hidden;
        height: 360px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    }

    .port-main-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .port-tag-card {
        background-color: #f8faf8;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px 20px;
    }

    .port-tag-title {
        font-size: 0.78rem;
        font-weight: 700;
        color: #204420;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .port-tag-desc {
        font-size: 0.82rem;
        color: #64748b;
        margin-bottom: 0;
        line-height: 1.5;
    }

    /* METRIC STATS CARDS */
    .metric-card-box {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        box-shadow: 0 4px 12px rgba(0,0,0,0.02);
    }

    .metric-icon-box {
        width: 44px;
        height: 44px;
        background-color: #e8f0eb;
        color: #204420;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-bottom: 16px;
    }

    .metric-label {
        font-size: 0.72rem;
        font-weight: 700;
        color: #94a3b8;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        margin-bottom: 4px;
        display: block;
    }

    .metric-value {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 1.2rem;
        font-weight: 700;
        color: #1a2e1a;
        margin-bottom: 0;
    }

    /* RANTAI KONEKTIVITAS BANNER */
    .chain-box-teal {
        background-color: #e8f0eb;
        border-radius: 24px;
        padding: 40px 32px;
    }

    .chain-grid-flow {
        display: grid;
        grid-template-columns: repeat(<?= count($data['rantai']); ?>, 1fr);
        gap: 12px;
        align-items: center;
        text-align: center;
        position: relative;
    }

    @media (max-width: 991px) {
        .chain-grid-flow {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }

    .chain-node-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .chain-icon-circle {
        width: 52px;
        height: 52px;
        border-radius: 16px;
        background-color: #ffffff;
        color: #204420;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-bottom: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
    }

    .chain-icon-circle.accent {
        background-color: #1b381b;
        color: #ffffff;
    }

    .chain-node-title {
        font-weight: 700;
        font-size: 0.9rem;
        color: #1a2e1a;
        margin-bottom: 4px;
    }

    .chain-node-sub {
        font-size: 0.75rem;
        color: #64748b;
        margin-bottom: 0;
    }

    .chain-arrow-icon {
        color: #8da392;
        font-size: 1.1rem;
    }

    /* LAYANAN TRANSPORTASI CARDS */
    .transport-card-box {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }

    .transport-img-wrap {
        position: relative;
        height: 230px;
        overflow: hidden;
    }

    .transport-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .transport-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background-color: #1b381b;
        color: #ffffff;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
    }

    .transport-body {
        padding: 20px;
    }

    .transport-title {
        font-family: 'Sutasoma Display', serif, sans-serif !important;
        font-size: 1.15rem;
        font-weight: 700;
        color: #1a2e1a;
        margin-bottom: 8px;
    }

    .transport-desc {
        font-size: 0.85rem;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 16px;
    }

    .transport-rute-info {
        font-size: 0.8rem;
        font-weight: 600;
        color: #204420;
        padding-top: 12px;
        border-top: 1px dashed #e2e8f0;
    }

    /* FASILITAS GRID */
    .facility-card-item {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 20px;
        text-align: center;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .facility-icon {
        font-size: 1.5rem;
        color: #204420;
    }

    .facility-title {
        font-size: 0.85rem;
        font-weight: 700;
        color: #1a2e1a;
        margin-bottom: 0;
    }

    /* GALERI & MAPS */
    .galeri-side-img {
        border-radius: 16px;
        overflow: hidden;
        height: 170px;
    }
    .galeri-side-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .galeri-large-img {
        border-radius: 16px;
        overflow: hidden;
        height: 230px;
    }
    .galeri-large-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .maps-iframe-box {
        width: 100%;
        height: 410px;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.04);
    }
</style>

<div class="container py-4">

    <!-- ================= GAMBAR 1: HERO HEADER BANNER ================= -->
    <div class="hero-port-banner">
        <img src="<?= $base_url . $data['hero_banner']; ?>" alt="<?= $data['nama']; ?>" onerror="this.src='https://images.unsplash.com/photo-1518241353330-0f7941c2d9b5?auto=format&fit=crop&w=1200&q=80';">
        <div class="hero-port-overlay">
            <h1 class="hero-port-title"><?= $data['nama']; ?></h1>
            <div class="hero-port-location">
                <i class="fas fa-location-dot"></i> <?= $data['lokasi_singkat']; ?>
            </div>
        </div>
    </div>

    <!-- TENTANG PELABUHAN -->
    <div class="row g-4 mb-5 align-items-center">
        <!-- Foto Kiri -->
        <div class="col-lg-6">
            <div class="port-main-img-wrap">
                <img src="<?= $base_url . $data['main_img']; ?>" alt="Foto Utama <?= $data['nama']; ?>" onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80';">
            </div>
        </div>

        <!-- Teks Kanan -->
        <div class="col-lg-6">
            <span class="sub-cat-badge"><?= $data['sub_category_title']; ?></span>
            <p class="text-secondary mb-3" style="font-size:0.92rem; line-height:1.7;"><?= $data['desc_1']; ?></p>
            <p class="text-secondary mb-4" style="font-size:0.92rem; line-height:1.7;"><?= $data['desc_2']; ?></p>

            <?php if (!empty($data['tag_1_title'])): ?>
            <div class="row g-3">
                <div class="col-sm-6">
                    <div class="port-tag-card">
                        <h6 class="port-tag-title"><i class="fas fa-anchor"></i> <?= $data['tag_1_title']; ?></h6>
                        <p class="port-tag-desc"><?= $data['tag_1_desc']; ?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="port-tag-card">
                        <h6 class="port-tag-title"><i class="fas fa-ship"></i> <?= $data['tag_2_title']; ?></h6>
                        <p class="port-tag-desc"><?= $data['tag_2_desc']; ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- ================= GAMBAR 2: METRICS & RANTAI KONEKTIVITAS ================= -->
    <div class="row g-3 mb-5">
        <div class="col-md-3 col-6">
            <div class="metric-card-box">
                <div class="metric-icon-box"><i class="fas fa-circle-check"></i></div>
                <span class="metric-label">STATUS OPERASI</span>
                <h6 class="metric-value"><?= $data['status_operasi']; ?></h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="metric-card-box">
                <div class="metric-icon-box"><i class="fas fa-map"></i></div>
                <span class="metric-label">LOKASI KOORDINAT</span>
                <h6 class="metric-value"><?= $data['koordinat']; ?></h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="metric-card-box">
                <div class="metric-icon-box"><i class="fas fa-building"></i></div>
                <span class="metric-label">PENGELOLA</span>
                <h6 class="metric-value"><?= $data['pengelola']; ?></h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="metric-card-box">
                <div class="metric-icon-box"><i class="fas fa-network-wired"></i></div>
                <span class="metric-label">INTEGRASI IKN</span>
                <h6 class="metric-value"><?= $data['integrasi']; ?></h6>
            </div>
        </div>
    </div>

    <!-- RANTAI KONEKTIVITAS IKN -->
    <div class="chain-box-teal mb-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark fs-2 mb-1" style="font-family: 'Sutasoma Display', serif;">Rantai Konektivitas IKN</h2>
            <p class="text-muted small">Alur pergerakan logistik dan multimoda yang mulus dari kedatangan laut hingga pusat pemerintahan cerdas Nusantara.</p>
        </div>

        <div class="chain-grid-flow">
            <?php foreach ($data['rantai'] as $index => $node): ?>
                <div class="chain-node-item">
                    <div class="chain-icon-circle <?= isset($node['accent']) && $node['accent'] ? 'accent' : ''; ?>">
                        <i class="<?= $node['icon']; ?>"></i>
                    </div>
                    <h6 class="chain-node-title"><?= $node['title']; ?></h6>
                    <p class="chain-node-sub"><?= $node['sub']; ?></p>
                </div>

                <?php if ($index < count($data['rantai']) - 1): ?>
                    <div class="d-none d-lg-block chain-arrow-icon"><i class="fas fa-arrow-right"></i></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ================= GAMBAR 3: LAYANAN TRANSPORTASI & FASILITAS ================= -->
    <div class="mb-5">
        <h2 class="fw-bold text-dark fs-2 mb-1" style="font-family: 'Sutasoma Display', serif;">Layanan Transportasi Lanjutan</h2>
        <p class="text-muted small mb-4">Opsi pergerakan penumpang, kendaraan pribadi, dan armada logistik darat langsung dari kawasan pelabuhan.</p>

        <div class="row g-4">
            <?php foreach ($data['layanan'] as $lay): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="transport-card-box">
                        <div>
                            <div class="transport-img-wrap">
                                <img src="<?= $base_url . $lay['img']; ?>" alt="<?= $lay['title']; ?>" onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=600&q=80';">
                                <span class="transport-badge"><?= $lay['badge']; ?></span>
                            </div>
                            <div class="transport-body">
                                <h5 class="transport-title"><?= $lay['title']; ?></h5>
                                <p class="transport-desc"><?= $lay['desc']; ?></p>
                            </div>
                        </div>
                        <div class="transport-body pt-0">
                            <div class="transport-rute-info">
                                <?= $lay['rute']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- FASILITAS PENYEBERANGAN & TERMINAL -->
    <div class="mb-5 pt-3">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-dark fs-2 mb-1" style="font-family: 'Sutasoma Display', serif;">Fasilitas Penyeberangan & Terminal</h2>
            <p class="text-muted small">Kelengkapan sarana operasional armada penyeberangan serta kenyamanan pengguna jasa.</p>
        </div>

        <div class="row g-3">
            <?php foreach ($data['fasilitas'] as $fas): ?>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="facility-card-item shadow-sm">
                        <i class="<?= $fas['icon']; ?> facility-icon"></i>
                        <h6 class="facility-title"><?= $fas['title']; ?></h6>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- ================= GAMBAR 4: GALERI & PETA LOKASI ================= -->
    <div class="mb-5 pt-3">
        <div class="row g-4 align-items-center">
            <!-- Kolom Kiri: Galeri Foto Grid -->
            <div class="col-lg-6">
                <h2 class="fw-bold text-dark fs-2 mb-1" style="font-family: 'Sutasoma Display', serif;">Galeri & Peta Lokasi</h2>
                <p class="text-muted small mb-4">Infrastruktur pendukung dan dermaga laut yang dirancang untuk efisiensi mobilitas industri dan logistik IKN.</p>

                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <div class="galeri-side-img">
                            <img src="<?= $base_url . $data['galeri_1']; ?>" alt="Galeri 1" onerror="this.src='https://images.unsplash.com/photo-1518241353330-0f7941c2d9b5?auto=format&fit=crop&w=600&q=80';">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="galeri-side-img">
                            <img src="<?= $base_url . $data['galeri_2']; ?>" alt="Galeri 2" onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=600&q=80';">
                        </div>
                    </div>
                </div>

                <div class="galeri-large-img">
                    <img src="<?= $base_url . $data['galeri_3']; ?>" alt="Galeri Utama" onerror="this.src='https://images.unsplash.com/photo-1570125909232-eb263c188f7e?auto=format&fit=crop&w=800&q=80';">
                </div>
            </div>

            <!-- Kolom Kanan: Google Maps Embed -->
            <div class="col-lg-6">
                <div class="maps-iframe-box">
                    <iframe src="<?= $data['maps_embed']; ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
require_once '../includes/base.php';
?>
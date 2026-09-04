<?php
// detail/antarkota-bandara.php
require_once '../config/database.php';
if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}

$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/ikn-mobility/";
$id = isset($_GET['id']) ? $_GET['id'] : 'sams-sepinggan';

// 1. CEK KE DATABASE
$data = null;
if (isset($conn) && $conn) {
    $query = "SELECT * FROM antarkota_layanan WHERE id = '" . mysqli_real_escape_string($conn, $id) . "'";
    $res = @mysqli_query($conn, $query);
    if ($res && mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
    }
}

// 2. DEKLARASI DATA BERDASARKAN ID
if ($data) {
    $nama_layanan  = $data['nama_layanan'];
    $sub_judul     = $data['deskripsi_singkat'];
    $gambar_hero   = $base_url . 'uploads/' . $data['gambar'];
    $lokasi        = "Kalimantan Timur";
    $kode_bandara  = "-";
    $operasional   = "24 Jam";
    $status        = "Aktif";
    $tentang       = $data['deskripsi_singkat'];
    $jarak_ikn     = "-";
    $akses_tol     = "Tersedia";
    $panduan_judul   = "Panduan Transit IKN";
    $fasilitas     = [];
    $panduan_transit = [];
    $infrastruktur = [];
    $spesifikasi   = [];
    $maskapai_domestik = [];
    $maskapai_inter = [];
} else {
    switch ($id) {
        // --- BANDARA VVIP IKN ---
        case 'bandara-vvip':
            $nama_layanan  = "Layanan Bandara VVIP Nusantara (IKN)";
            $sub_judul     = "Fasilitas penerbangan utama yang dirancang khusus untuk melayani tamu kenegaraan, pejabat VVIP/VIP, serta konektivitas udara strategis bagi Ibu Kota Nusantara.";
            $gambar_hero   = $base_url . "assets/images/antarkota/VVIP_IKN.jpeg";
            $lokasi        = "Kawasan Ibu Kota Nusantara (KIPP)";
            $kode_bandara  = "- / WALK";
            $operasional   = "Waktu Tertentu";
            $status        = "-";
            $tentang       = "Bandara Nusantara merupakan infrastruktur transportasi udara vital di IKN yang mengedepankan standar pelayanan VVIP. Bandara ini mengintegrasikan arsitektur modern dengan kearifan lokal serta menyediakan aksesibilitas cepat bagi tamu negara menuju Kawasan Inti Pusat Pemerintahan (KIPP). <strong>Saat ini, bandara ditutup dan belum melayani penerbangan komersial. Bandara ini direncanakan untuk diresmikan kembali guna mendukung konektivitas udara di IKN.</strong>";
            $jarak_ikn     = "Terletak di KIPP (Akses Langsung)";
            $akses_tol     = "Tersedia (Tol Balsam)";
            
            $fasilitas = [
                ['icon' => 'fas fa-building', 'nama' => 'Terminal VVIP (2.350 m²)'],
                ['icon' => 'fas fa-city', 'nama' => 'Terminal VIP (5.000 m²)'],
                ['icon' => 'fas fa-couch', 'nama' => 'Lounge VVIP/VIP Premium'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_terminalenumpang.png', 'nama' => 'Ruang Pertemuan Bisnis'],
                ['icon' => 'fas fa-fingerprint', 'nama' => 'Check-in & Proses Digital'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_pesawat.png', 'nama' => 'Boarding Bridge'],
                ['icon' => 'fas fa-helicopter', 'nama' => 'Helipad (3 Helikopter)'],
                ['icon' => 'fas fa-shield-halved', 'nama' => 'Sistem Keamanan Tinggi']
            ];

            $panduan_judul = "Panduan Bandara VVIP IKN";
            $panduan_transit = [
                [
                    'type'  => 'image',
                    'src'   => $base_url . 'assets/images/antarkota/ikon_pesawat2.png',
                    'title' => 'Arrival at VVIP Terminal',
                    'desc'  => 'Selamat datang di Ibu Kota Nusantara. Ambil bagasi dan ikuti petunjuk menuju area penjemputan.'
                ],

                [
                    'type'  => 'image',
                    'src'   => $base_url . 'assets/images/antarkota/ikon_kendaraan2.png',
                    'title' => 'Go to Ground Transport',
                    'desc'  => 'Pilih transportasi Anda. Naik kendaraan resmi, shuttle, atau kendaraan yang telah dijadwalkan.'
                ],

                [
                    'icon' => 'fas fa-road', 
                    'title' => 'Access Road Journey', 
                    'desc' => 'Perjalanan dimulai. Kendaraan akan melalui Jalan Akses Bandara menuju koridor utama KIPP.'],

                [
                    'type'  => 'image',
                    'src'   => $base_url . 'assets/images/antarkota/ikon_bangunan2.png',
                    'title' => 'Arrival at KIPP',
                    'desc'  => 'Selamat datang di pusat Kota IKN. Akses menuju Istana Negara, Plaza Seremoni, Gedung Kementerian, dan area pelayanan publik.'
                ],
            ];

            $infrastruktur = [];

            $spesifikasi = [
                'Fasilitas Udara' => [
                    'type' => 'image',
                    'src'  => $base_url . 'assets/images/antarkota/ikon_pesawat.png',
                    'items' => [
                        'Runway 3.000 x 45m (Wide-body ready)',
                        'Taxiway & Apron (5 WB / 9 NB)',
                        'Menara ATC Modern',
                        'Penanggulangan Keadaan Darurat'
                    ]
                ],
                'Fasilitas Penunjang' => [
                    'type' => 'image',
                    'src'  => $base_url . 'assets/images/antarkota/ikon_bangunan.png',
                    'items' => [
                        'Gedung Administrasi',
                        'Rumah Ibadah',
                        'Jalan Perimeter & Keamanan'
                    ]
                ]
            ];

            $maskapai_domestik = [];
            $maskapai_inter = [];
            break;

        // --- BANDARA APT PRANOTO SAMARINDA ---
        case 'apt-pranoto':
            $nama_layanan  = "Layanan Bandara APT Pranoto (AAP)";
            $sub_judul     = "Konektivitas udara utama untuk kawasan Kalimantan Timur dan Ibu Kota Nusantara.";
            $gambar_hero   = $base_url . "assets/images/antarkota/apt_pranoto.jpeg";
            $lokasi        = "Samarinda Utara";
            $kode_bandara  = "AAP / WALS";
            $operasional   = "24 Jam";
            $status        = "Internasional";
            $tentang       = "Bandar Udara Internasional Aji Pangeran Tumenggung Pranoto (APT Pranoto) merupakan gerbang udara utama untuk Kota Samarinda dan pendukung strategis bagi konektivitas Ibu Kota Nusantara (IKN). Dilengkapi dengan fasilitas modern untuk melayani penerbangan Domestik dan Internasional. Saat ini, APT Pranoto tengah mempersiapkan dan melengkapi fasilitas Customs, Immigration, and Quarantine (CIQ) serta memenuhi standar keamanan internasional untuk mendukung operasional penerbangan internasional.";
            $jarak_ikn     = "± 158 KM (Akses Tol)";
            $akses_tol     = "Tersedia (Tol Balsam)";

            $fasilitas = [
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_terminalenumpang.png', 'nama' => 'Terminal Penumpang'],
                ['type' => 'icon', 'icon' => 'fas fa-user-check', 'nama' => 'Check-in Counter'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_Check-in.png', 'nama' => 'Self Check-in'],         
                ['type' => 'icon', 'icon' => 'fas fa-couch', 'nama' => 'Boarding Lounge'],          
                ['type' => 'icon', 'icon' => 'fas fa-crown', 'nama' => 'Executive Lounge'],        
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_pesawat.png', 'nama' => 'Garbarata'],
                ['type' => 'icon', 'icon' => 'fas fa-suitcase-rolling', 'nama' => 'Baggage Claim'],
                ['type' => 'icon', 'icon' => 'fas fa-door-open', 'nama' => 'Ruang Kedatangan'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_NurseryRoom.png','nama' => 'Nursery Room'],             
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_rokok.png', 'nama' => 'Smoking Room'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_mushola.png', 'nama' => 'Mushola'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_toilet.png', 'nama' => 'Toilet'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_Rp.png', 'nama' => 'ATM'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_makan.png', 'nama' => 'Area Makanan'],
                ['type' => 'icon', 'icon' => 'fas fa-laptop', 'nama' => 'Working Space'],          
                ['type' => 'icon', 'icon' => 'fas fa-gamepad', 'nama' => 'Area Bermain'],           
                ['type' => 'icon', 'icon' => 'fas fa-headset', 'nama' => 'Layanan Pelanggan'], 
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_pnr2.png', 'nama' => 'Parkir Inap'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_kendaraan.png', 'nama' => 'Drop-off & Pick-up'],
                ['type' => 'icon', 'icon' => 'fas fa-charging-station', 'nama' => 'SPKLU']       
            ];

            $panduan_judul = "Panduan Transit IKN";
            $panduan_transit =  [
                [
                    'type'  => 'image',
                    'src'   => $base_url . 'assets/images/antarkota/ikon_pesawat2.png',
                    'title' => 'Arrival at APT Pranoto',
                    'desc'  => 'Tiba dan ambil bagasi Anda.'
                ],
                [
                    'type'  => 'image',
                    'src'   => $base_url . 'assets/images/antarkota/ikon_berjalan.png',
                    'title' => 'Transit Go To Balikpapan',
                    'desc'  => 'menaiki bus/travel dari bandara menuju ke terminal bus Balikpapan.'
                ],
                [
                    'type'  => 'icon',
                    'icon'  => 'fas fa-qrcode',
                    'title' => 'Check-in Bus/Travel',
                    'desc'  => 'Tiba di terminal bus, Pindai tiket bus Anda.'
                ],
                [
                    'type'  => 'image',
                    'src'   => $base_url . 'assets/images/antarkota/ikon_kendaraan2.png',
                    'title' => 'Journey to IKN',
                    'desc'  => 'Perjalanan menuju Ibu Kota Nusantara.'
                ]
            ];

            $fasilitas_operasional = [
                'Runway',
                'Taxiway',
                'Apron',
                'ATC Tower',
                'Hanggar',
                'Terminal Kargo',
                'Gedung Meteorologi',
                'Airport Maintenance',
                'Fire Station'
            ];

            $spesifikasi = [];
            $maskapai_domestik = ['Batik Air', 'Lion Air', 'Super Air Jet', 'Wings Air', 'Citilink'];
            $maskapai_inter = [];
            break;

        // --- BANDARA SAMS SEPINGGAN BALIKPAPAN (DEFAULT) ---
        case 'sams-sepinggan':
        default:
            $nama_layanan  = "Layanan Bandara SAMS Sepinggan";
            $sub_judul     = "Konektivitas udara utama untuk kawasan Kalimantan Timur dan Ibu Kota Nusantara.";
            $gambar_hero   = $base_url . "assets/images/antarkota/sams_sepinggan.jpeg";
            $lokasi        = "Balikpapan Selatan";
            $kode_bandara  = "BPN / WALL";
            $operasional   = "24 Jam";
            $status        = "Internasional";
            $tentang       = "Bandara Internasional Sultan Aji Muhammad Sulaiman Sepinggan (SAMS Sepinggan) merupakan gerbang udara utama menuju kawasan Kalimantan Timur dan Ibu Kota Nusantara (IKN). Dilengkapi fasilitas modern dan terintegrasi dengan berbagai moda transportasi lanjutan.";
            $jarak_ikn     = "± 94 KM (Akses Tol)";
            $akses_tol     = "Tersedia (Tol Balsam)";

            $fasilitas = [
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_terminalenumpang.png', 'nama' => 'Terminal Penumpang (Domestik & Internasional)'],
                ['type' => 'icon', 'icon' => 'fas fa-user-check', 'nama' => 'Check-in Counter'],
                ['type' => 'icon', 'icon' => 'fas fa-chair', 'nama' => 'Ruang Tunggu Keberangkatan'],
                ['type' => 'icon', 'icon' => 'fas fa-door-open', 'nama' => 'Boarding Gate'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_pesawat.png', 'nama' => 'Garbarata (Aviobridge)'],
                ['type' => 'icon', 'icon' => 'fas fa-suitcase-rolling', 'nama' => 'Baggage Claim'],
                ['type' => 'icon', 'icon' => 'fas fa-couch', 'nama' => 'Lounge Premium'],
                ['type' => 'icon', 'icon' => 'fas fa-store', 'nama' => 'Area Komersial (Resto, Kafe, Toko)'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_Rp.png', 'nama' => 'ATM & Perbankan'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_mushola.png', 'nama' => 'Mushola'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_toilet.png', 'nama' => 'Toilet & Ruang Ibu/Anak'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_pnr2.png', 'nama' => 'Parkir Kendaraan'],
                ['type' => 'icon', 'icon' => 'fas fa-person-walking-luggage', 'nama' => 'Drop-off & Pick-up'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_bus.png', 'nama' => 'Transportasi Darat (Taksi/Bus)']
            ];

            $panduan_judul = "Panduan Transit IKN";
            $panduan_transit = [
                [
                    'type'  => 'image',
                    'src'   => $base_url . 'assets/images/antarkota/ikon_pesawat2.png',
                    'title' => 'Arrival at BPN',
                    'desc'  => 'Tiba dan ambil bagasi Anda.'
                ],
                [
                    'type'  => 'image',
                    'src'   => $base_url . 'assets/images/antarkota/ikon_berjalan.png',
                    'title' => 'Go to Ground Transport',
                    'desc'  => 'Ikuti petunjuk arah ke area shuttle IKN Mobility.'
                ],
                [
                    'type'  => 'icon',
                    'icon'  => 'fas fa-qrcode',
                    'title' => 'Check-in Shuttle',
                    'desc'  => 'Pindai tiket shuttle Anda.'
                ],
                [
                    'type'  => 'image',
                    'src'   => $base_url . 'assets/images/antarkota/ikon_kendaraan2.png',
                    'title' => 'Journey to IKN',
                    'desc'  => 'Perjalanan via Tol Balsam (~90 menit).'
                ]
            ];

            $infrastruktur = [
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_pesawat.png', 'nama' => 'Landasan Pacu'],
                ['type' => 'image', 'src' => $base_url . 'assets/images/antarkota/ikon_parkir.png', 'nama' => 'Apron & Parkir Pesawat'],
                ['type' => 'text', 'text' => 'TOWER', 'nama' => 'Menara ATC'],
                ['type' => 'icon', 'icon' => 'fas fa-shield-halved', 'nama' => 'Keamanan & Pemeriksaan'],
                ['type' => 'icon', 'icon' => 'fas fa-truck-medical', 'nama' => 'Pemadam Kebakaran (PKP-PK)'],
                ['type' => 'icon', 'icon' => 'fas fa-boxes-packing', 'nama' => 'Terminal Kargo']
            ];

            $spesifikasi = [];
            $maskapai_domestik = ['Garuda Indonesia', 'Lion Air', 'Batik Air', 'Citilink', 'Super Air Jet', 'Pelita Air', 'Indonesia AirAsia', 'Wings Air', 'TransNusa'];
            $maskapai_inter = ['AirAsia (Kuala Lumpur)', 'Scoot (Singapura)', 'Indonesia AirAsia'];
            break;
    }
}

$page  = 'antarkota';
$title = $nama_layanan . " - Profil Mobilitas IKN";
ob_start();
?>

<!-- STYLE CSS -->
<style>
    .img-icon-box {
        background-color: #204420;
        color: #ffffff;
        width: 54px;
        height: 54px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        overflow: hidden;
        flex-shrink: 0;
        padding: 11px;
    }

    .img-icon-box img,
    .img-icon-box-light img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .img-icon-box-light {
        background-color: #e8f0eb;
        color: #111111;
        width: 54px;
        height: 54px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        overflow: hidden;
        flex-shrink: 0;
        padding: 11px;
    }

    .divider-line-v {
        width: 2px;
        height: 29px;
        background-color: #e9ecef;
        margin-left: 26px;
    }

    .info-label {
        font-family: 'Sutasoma Text', sans-serif !important;
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 1px;
        color: #6c757d;
        text-transform: uppercase;
        display: block;
        margin-bottom: 4px;
    }

    .info-value {
        font-family: 'Sutasoma Display', sans-serif !important;
        font-size: 1.15rem;
        font-weight: 600;
        color: #111111;
        margin-bottom: 0;
        line-height: 1.2;
    }

    .bg-soft-green { background-color: #eaf2ed; }
    .text-ikn-green { color: #204420; }
    .bg-ikn-green { background-color: #204420; }

    .card-custom-flat { 
        background: #ffffff; 
        border: 1px solid #e9ecef; 
        border-radius: 16px; 
    }

    .hero-detail-box { 
        position: relative; 
        border-radius: 20px; 
        overflow: hidden; 
        min-height: 380px; 
        background-size: cover; 
        background-position: center; 
        background-color: #111; /* Fallback warna latar */
    }

    /* GAMBAR BACKGROUND SEBAGAI LAYER DI DALAM (YANG AKAN DI-ZOOM) */
    .hero-detail-box::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: inherit; /* Mengambil background-image dari style inline HTML */
        background-size: cover;
        background-position: center;
        transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
        z-index: 1;
    }

    /* EFEK HOVER: HANYA GAMBAR DI DALAM YANG MEMBESAR / ZOOM IN */
    .hero-detail-box:hover::before {
        transform: scale(1.08); /* Tingkat zoom in (bisa disesuaikan, misal 1.05 - 1.1) */
    }

    .hero-detail-overlay { 
        position: absolute; 
        bottom: 0; 
        left: 0; 
        right: 0; 
        padding: 30px; 
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 60%, rgba(0,0,0,0) 100%); 
        color: #ffffff; 
        z-index: 2; /* Memastikan teks dan gradien selalu ada di atas gambar */
        pointer-events: none; /* Klik tembus ke container */
    }

    .facility-box { 
        background-color: #e8f0eb; 
        border-radius: 14px; 
        padding: 20px 16px; 
        text-align: center; 
        height: 100%; 
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        justify-content: center; 
        gap: 8px; 
        color: #1a2e1a; 
        font-weight: 600; 
        font-size: 0.88rem; 
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
        border: 1px solid transparent;
    }

    .facility-box i { 
        font-size: 1.5rem; 
        color: #000000 !important; 
    }

    .facility-box i,
    .facility-box img {
        transition: transform 0.3s ease;
    }

    /* Efek Kartu Naik & Bayangan saat di-hover */
    .facility-box:hover {
        background-color: #ffffff;
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(32, 68, 32, 0.12);
        border-color: #d0e0d5;
    }

    /* Efek Ikon/Gambar Membesar Sedikit */
    .facility-box:hover i,
    .facility-box:hover img {
        transform: scale(1.18);
    }

    .facility-box img {
        width: 28px;
        height: 28px;
        object-fit: contain;
        margin-bottom: 4px;
    }

    .facility-op-box {
        background-color: #204420; /* Warna Hijau Tua IKN */
        color: #ffffff;
        border-radius: 12px;
        padding: 18px 12px;
        text-align: center;
        font-weight: 500;
        font-size: 0.95rem;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .infra-text-tower {
        font-family: 'Sutasoma Display', sans-serif;
        font-weight: 500;
        font-size: 1.2rem;
        letter-spacing: 2px;
        color: #000000;
        margin-bottom: -2px;
    }

    .transit-timeline-v2 {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .transit-step-v2 {
        display: flex;
        flex-direction: column;
    }

    .transit-content-v2 {
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }

    .transit-circle-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.35);
        background-color: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        padding: 9px;
        color: #ffffff;
        font-size: 1.1rem;
    }

    .transit-circle-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .transit-line-short {
        width: 2px;
        height: 24px;
        background-color: rgba(255, 255, 255, 0.4);
        margin-left: 20px;
        margin-top: 6px;
        margin-bottom: 6px;
    }

    .transit-title-v2 {
        font-family: 'Sutasoma Display', sans-serif !important;
        font-size: 1.1rem;
        font-weight: 400;
        color: #ffffff;
        margin-bottom: 4px;
        line-height: 1.3;
    }

    .transit-desc-v2 {
        font-family: 'Sutasoma Text', sans-serif !important;
        font-size: 0.95rem;
        font-weight: 300;
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: 0;
        line-height: 1.5;
    }

    .btn-ikn-green { 
        background-color: #204420; 
        color: #ffffff; 
        border-radius: 10px; 
        padding: 12px 20px; 
        font-weight: 400; 
        font-size: 0.9rem; 
        text-decoration: none; 
        display: inline-flex; 
        align-items: center; 
        justify-content: center; 
        gap: 10px; 
        width: 100%; 
        transition: all 0.2s ease; 
    }

    .btn-ikn-green:hover { 
        background-color: #152d15; 
        color: #ffffff; 
    }

    .btn-img-icon, .title-img-icon {
        width: 23px;
        height: 23px;
        object-fit: contain;
        display: inline-block;
        vertical-align: middle;
    }

    /* Style Khusus Kapasitas & Spesifikasi Teknik */
    .spec-card-box {
        background-color: #e8f0eb;
        border-radius: 16px;
        padding: 24px;
        height: 100%;
    }

    .spec-card-title {
        font-family: 'Sutasoma Text', sans-serif;
        font-size: 1.05rem;
        font-weight: 600;
        color: #1a2e1a;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .spec-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .spec-list li {
        position: relative;
        padding-left: 20px;
        font-size: 0.9rem;
        color: #2d3748;
        line-height: 1.5;
    }

    .spec-list li::before {
        content: "•";
        position: absolute;
        left: 0;
        top: 0;
        font-size: 1.2rem;
        line-height: 1;
    }

    .spec-card-title img {
        width: 22px;
        height: 22px;
        object-fit: contain;
        display: inline-block;
        vertical-align: middle;
    }

</style>

<div class="container py-4">
    <div class="row g-4 mb-5">
        <!-- ================= SISI KIRI (HERO, TENTANG LAYANAN, FASILITAS, INFRASTRUKTUR, MASKAPAI) ================= -->
        <div class="col-lg-8">
            <!-- 1. HERO IMAGE -->
            <div class="hero-detail-box shadow-sm mb-4" style="background-image: url('<?= $gambar_hero; ?>');">
                <div class="hero-detail-overlay">
                    <h2 class="fw-semibold mb-2 fs-1"><?= htmlspecialchars($nama_layanan); ?></h2>
                    <p class="mb-0 opacity-90 text-white-50 fs-6"><?= htmlspecialchars($sub_judul); ?></p>
                </div>
            </div>

            <!-- 2. TENTANG LAYANAN -->
            <div class="mb-5">
                <h5 class="fw-semibold mb-3 d-flex align-items-center gap-2 text-dark fs-5">
                    <i class="far fa-circle-question text-muted"></i> Tentang Layanan
                </h5>
                <p class="text-dark mb-4" style="line-height: 1.7; font-size: 0.95rem;"><?= $tentang; ?></p>
                
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="card-custom-flat p-3 shadow-sm">
                            <small class="text-uppercase text-muted fw-medium d-block mb-1" style="font-family: 'Sutasoma Text', sans-serif; font-size: 0.80rem;">JARAK KE IKN</small>
                            <span class="fw-semibold text-dark fs-6" style="font-family: 'Sutasoma Display', sans-serif;"><?= $jarak_ikn; ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-custom-flat p-3 shadow-sm">
                            <small class="text-uppercase text-muted fw-medium d-block mb-1" style="font-family: 'Sutasoma Text', sans-serif; font-size: 0.80rem;">AKSES TOL</small>
                            <span class="fw-bold text-dark fs-6" style="font-family: 'Sutasoma Display', sans-serif;"><?= $akses_tol; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. FASILITAS -->
            <div class="mb-5">
                <h5 class="fw-semibold mb-3 d-flex align-items-center gap-2 text-dark fs-5">
                    <i class="fas fa-concierge-bell text-muted"></i> Fasilitas
                </h5>
                <div class="row g-3">
                    <?php foreach ($fasilitas as $f): ?>
                    <div class="col-sm-3 col-6">
                        <div class="facility-box">
                            <?php if (isset($f['type']) && $f['type'] == 'image'): ?>
                                <img src="<?= $f['src']; ?>" alt="<?= htmlspecialchars($f['nama']); ?>">
                            <?php else: ?>
                                <i class="<?= $f['icon']; ?>"></i>
                            <?php endif; ?>
                            <span><?= $f['nama']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- KAPASITAS & SPESIFIKASI TEKNIK (KHUSUS BANDARA VVIP) -->
            <?php if (!empty($spesifikasi)): ?>
            <div class="mb-5">
                <h5 class="fw-semibold mb-3 d-flex align-items-center gap-2 text-dark fs-5">
                    <i class="fas fa-sliders text-muted"></i> Kapasitas & Spesifikasi Teknik
                </h5>
                <div class="row g-3">
                    <?php 
                    $is_first = true;
                    foreach ($spesifikasi as $kategori => $detail): 
                    ?>
                    <div class="col-sm-6">
                        <div class="spec-card-box shadow-sm">
                            <h6 class="spec-card-title">
                                <?php if (isset($detail['type']) && $detail['type'] == 'image'): ?>
                                    <img src="<?= $detail['src']; ?>" alt="<?= htmlspecialchars($kategori); ?>">
                                <?php else: ?>
                                    <i class="<?= $detail['icon']; ?>"></i>
                                <?php endif; ?>
                                <?= htmlspecialchars($kategori); ?>
                            </h6>
                            <ul class="spec-list <?= $is_first ? 'brown' : 'teal'; ?>">
                                <?php foreach ($detail['items'] as $item): ?>
                                    <li><?= htmlspecialchars($item); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php 
                    $is_first = false;
                    endforeach; 
                    ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- 4. INFRASTRUKTUR OPERASIONAL (JIKA ADA) -->
            <?php if (!empty($infrastruktur)): ?>
            <div class="mt-5">
                <h5 class="fw-semibold mb-3 d-flex align-items-center gap-2 text-dark fs-5">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_infrastuktur.png" alt="Ikon Infrastruktur" class="title-img-icon"> 
                    Infrastruktur Operasional
                </h5>
                <div class="row g-3">
                    <?php foreach ($infrastruktur as $infra): ?>
                    <div class="col-md-4 col-6">
                        <div class="facility-box">
                            <?php if (isset($infra['type']) && $infra['type'] == 'text'): ?>
                                <span class="infra-text-tower"><?= $infra['text']; ?></span>
                            <?php elseif (isset($infra['type']) && $infra['type'] == 'image'): ?>
                                <img src="<?= $infra['src']; ?>" alt="<?= htmlspecialchars($infra['nama']); ?>">
                            <?php else: ?>
                                <i class="<?= $infra['icon']; ?>"></i>
                            <?php endif; ?>
                            <span><?= htmlspecialchars($infra['nama']); ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- FASILITAS OPERASIONAL (KHUSUS BANDARA APT PRANOTO) -->
            <?php if (!empty($fasilitas_operasional)): ?>
            <div class="mb-5">
                <h5 class="fw-semibold mb-3 d-flex align-items-center gap-2 text-dark fs-5">
                    <i class="fas fa-user-gear text-muted"></i> Fasilitas Operasional
                </h5>
                <div class="row g-3">
                    <?php foreach ($fasilitas_operasional as $item): ?>
                    <div class="col-sm-3 col-6">
                        <div class="facility-op-box shadow-sm">
                            <span><?= htmlspecialchars($item); ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- 5. MASKAPAI OPERASIONAL (JIKA ADA) -->
            <?php if (!empty($maskapai_domestik) || !empty($maskapai_inter)): ?>
            <div class="mt-5">
                <h5 class="fw-semibold mb-3 d-flex align-items-center gap-2 text-dark fs-5">
                    <img src="<?= $base_url; ?>assets/images/antarkota/ikon_pesawat.png" alt="Ikon Pesawat" class="title-img-icon"> 
                    Maskapai Operasional
                </h5>
                <div class="row g-4">
                    <?php if (!empty($maskapai_domestik)): ?>
                    <div class="col-md-6">
                        <div class="card-custom-flat p-4 shadow-sm">
                            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2 text-dark"><i class="fas fa-book-open text-muted"></i> Domestik</h6>
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-2 text-secondary small">
                                <?php foreach ($maskapai_domestik as $m): ?>
                                <li><i class="fas fa-circle me-2" style="font-size: 0.4rem;"></i> <?= $m; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($maskapai_inter)): ?>
                    <div class="col-md-6">
                        <div class="card-custom-flat p-4 shadow-sm h-100">
                            <h6 class="fw-bold mb-3 d-flex align-items-center gap-2 text-dark"><i class="fas fa-globe text-muted"></i> Internasional</h6>
                            <ul class="list-unstyled mb-0 d-flex flex-column gap-2 text-secondary small">
                                <?php foreach ($maskapai_inter as $mi): ?>
                                <li><i class="fas fa-circle me-2" style="font-size: 0.4rem;"></i> <?= $mi; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- ================= SISI KANAN (SIDEBAR: LOKASI, OPERASIONAL, TRANSPORTASI LANJUTAN, PANDUAN) ================= -->
        <div class="col-lg-4 d-flex flex-column gap-3">
            
            <!-- 1. CARD LOKASI & KODE IATA / ICAO -->
            <div class="card-custom-flat p-4 shadow-sm d-flex flex-column justify-content-center">
                <div class="d-flex align-items-center gap-3">
                    <div class="img-icon-box shadow-sm">
                        <img src="<?= $base_url; ?>assets/images/antarkota/lokasi.png" alt="Ikon Lokasi">
                    </div>
                    <div>
                        <span class="info-label">LOKASI</span>
                        <h5 class="info-value"><?= htmlspecialchars($lokasi); ?></h5>
                    </div>
                </div>

                <div class="divider-line-v my-2"></div>

                <div class="d-flex align-items-center gap-3">
                    <div class="img-icon-box-light shadow-sm">
                        <img src="<?= $base_url; ?>assets/images/antarkota/KODE IATA.png" alt="Ikon Kode">
                    </div>
                    <div>
                        <span class="info-label">KODE IATA / ICAO</span>
                        <h5 class="info-value"><?= htmlspecialchars($kode_bandara); ?></h5>
                    </div>
                </div>
            </div>

            <!-- 2. BOX OPERASIONAL & STATUS -->
            <div class="row g-3">
                <div class="col-6">
                    <div class="card-custom-flat p-3 text-center shadow-sm">
                        <i class="far fa-clock text-muted fs-4 mb-2"></i>
                        <small class="d-block text-uppercase text-muted fw-medium" style="font-family: 'Sutasoma Text', sans-serif; font-size: 0.80rem; letter-spacing: 0.9px;">OPERASIONAL</small>
                        <span class="text-dark" style="font-family: 'Sutasoma Display', sans-serif !important; font-weight:600; font-size: 1.1rem;"><?= $operasional; ?></span>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="card-custom-flat p-3 text-center shadow-sm">
                        <i class="fas fa-globe text-muted fs-4 mb-2"></i>
                        <small class="d-block text-uppercase text-muted fw-medium" style="font-family: 'Sutasoma Text', sans-serif; font-size: 0.80rem; letter-spacing: 0.9px;">STATUS</small>
                        <span class="text-dark" style="font-family: 'Sutasoma Display', sans-serif !important; font-weight: 600; font-size: 1.1rem;"><?= $status; ?></span>
                    </div>
                </div>
            </div>

            <!-- TRANSPORTASI LANJUTAN -->
            <?php if ($id != 'bandara-vvip'): ?>
            <div class="card-custom-flat p-4 shadow-sm">
                <h5 class="fw-semibold mb-3 text-dark fs-5">Transportasi Lanjutan</h5>
                
                <!-- DESKRIPSI TEKS KHUSUS APT PRANOTO VS SAMS SEPINGGAN -->
                <?php if ($id == 'apt-pranoto'): ?>
                    <p class="text-secondary small mb-0" style="line-height: 1.6;">
                        Anda dapat menaiki bus, travel ataupun kendaraan pribadi dari Bandara APT Pranoto menuju ke Ibu Kota Nusantara. Anda dapat transit menggunakan bus ke terminal Balikpapan untuk menuju ke Ibu Kota Nusantara.
                    </p>
                <?php else: ?>
                    <p class="text-secondary small mb-4" style="line-height: 1.6;">
                        Anda dapat menaiki bus Sinar Jaya dan bus Cititrans yang menuju ke ibu kota nusantara, atau pesan shuttle travel menuju destinasi anda di IKN di bawah ini.
                    </p>
                    
                    <!-- TOMBOL HANYA TAMPIL UNTUK SAMS SEPINGGAN / LAINNYA -->
                    <a href="https://www.traveloka.com/id-id/bus-and-shuttle" target="_blank" class="btn-ikn-green">
                        <img src="<?= $base_url; ?>assets/images/antarkota/ikon_kendaraan2.png" alt="Ikon Bus" class="btn-img-icon"> 
                        Pesan Shuttle ke IKN
                    </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- 4. KOTAK HIJAU TUA (PANDUAN TRANSIT IKN) -->
            <div class="bg-ikn-green text-white p-4 p-md-5 rounded-4 shadow-sm">
                <h4 class="fw-medium mb-4 text-white" style="font-family: 'Sutasoma Text', sans-serif; font-size: 1.6rem; letter-spacing: -0.3px;">
                    <?= htmlspecialchars($panduan_judul); ?>
                </h4>

                <div class="transit-timeline-v2">
                    <?php 
                    $total_step = count($panduan_transit);
                    foreach ($panduan_transit as $index => $step): 
                    ?>
                        <div class="transit-step-v2">
                            <div class="transit-content-v2">
                                <div class="transit-circle-icon">
                                    <?php if (isset($step['type']) && $step['type'] == 'image'): ?>
                                        <img src="<?= $step['src']; ?>" alt="<?= htmlspecialchars($step['title']); ?>">
                                    <?php else: ?>
                                        <i class="<?= $step['icon']; ?>"></i>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <h5 class="transit-title-v2"><?= htmlspecialchars($step['title']); ?></h5>
                                    <p class="transit-desc-v2"><?= htmlspecialchars($step['desc']); ?></p>
                                </div>
                            </div>

                            <?php if ($index < $total_step - 1): ?>
                                <div class="transit-line-short"></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once '../includes/base.php';
?>
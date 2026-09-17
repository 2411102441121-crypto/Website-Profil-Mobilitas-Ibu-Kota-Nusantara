<?php
// Mulai session agar pilihan bahasa tersimpan saat pindah halaman
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Cek parameter URL ?lang=..., jika ada simpan ke session
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'] === 'en' ? 'en' : 'id';
    $_SESSION['lang'] = $lang;
} else {
    // Default bahasa Indonesia jika belum diset
    $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';
}

// 2. Daftar Terjemahan Teks Website
$translations = [
    'id' => [
        // Navbar
        'nav_beranda'   => 'Beranda',
        'nav_antarkota' => 'Layanan Antarkota',
        'nav_intrakota' => 'Layanan Intrakota',
        'nav_peta'      => 'Peta',
        'nav_aktivitas' => 'Aktivitas',
        'nav_tentang'   => 'Tentang',

        // Antarkota Header
        'hero_title'    => 'Layanan Konektivitas Antarkota Ibu Kota Nusantara',
        'hero_desc'     => 'Layanan konektivitas antarkota menghubungkan Ibu Kota Nusantara dengan kota-kota di sekitarnya melalui jaringan jalan, transportasi darat, transportasi laut, dan transportasi udara yang saling terintegrasi.',
        'btn_infrastruktur' => 'Lihat Infrastruktur',
        'btn_jelajah'   => 'Jelajahi Moda Transportasi',
    ],
    'en' => [
        // Navbar
        'nav_beranda'   => 'Home',
        'nav_antarkota' => 'Intercity Services',
        'nav_intrakota' => 'Intracity Services',
        'nav_peta'      => 'Map',
        'nav_aktivitas' => 'Activities',
        'nav_tentang'   => 'About',

        // Antarkota Header
        'hero_title'    => 'Nusantara Capital Intercity Connectivity Services',
        'hero_desc'     => 'Intercity connectivity services connect Nusantara Capital with surrounding cities through integrated road networks, land, sea, and air transportation systems.',
        'btn_infrastruktur' => 'View Infrastructure',
        'btn_jelajah'   => 'Explore Transportation Modes',
    ]
];

// Helper Function untuk mengambil teks terjemahan
function __t($key) {
    global $translations, $lang;
    return isset($translations[$lang][$key]) ? $translations[$lang][$key] : $key;
}
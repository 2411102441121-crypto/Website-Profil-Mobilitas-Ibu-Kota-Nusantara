<?php
// Konfigurasi Database
$host     = "localhost"; // Host database (biasanya localhost)
$user     = "root";      // Username database Anda
$password = "";          // Password database (kosongkan jika menggunakan XAMPP standar)
$database = "ikn_mobility"; // GANTI dengan nama database Anda

// Membuat Koneksi ke MySQL
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa Status Koneksi
if (!$koneksi) {
    // Menampilkan pesan gagal jika koneksi bermasalah
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Mengatur charset ke UTF-8 agar karakter khusus terbaca dengan benar
mysqli_set_charset($koneksi, "utf8mb4");
?>
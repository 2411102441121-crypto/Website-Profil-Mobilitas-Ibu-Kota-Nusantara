<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) { 
    header('Location: ../login.php'); 
    exit; 
}
require_once __DIR__ . '/../koneksi.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // 1. Ambil nama gambar & kategori dari database
    $stmt = mysqli_prepare($koneksi, "SELECT gambar, kategori FROM antarkota WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        // 2. Hapus file gambar dari folder jika ada
        if (!empty($data['gambar'])) {
            $upload_dir = __DIR__ . '/../../assets/images/uploads/';
            $file_path = $upload_dir . $data['gambar'];
            
            if (file_exists($file_path) && is_file($file_path)) {
                unlink($file_path);
            }
        }

        // 3. Hapus data dari tabel antarkota
        $del_stmt = mysqli_prepare($koneksi, "DELETE FROM antarkota WHERE id = ?");
        mysqli_stmt_bind_param($del_stmt, "i", $id);
        mysqli_stmt_execute($del_stmt);

        // Redirect kembali ke halaman index sesuai kategori
        header('Location: index.php?kategori=' . urlencode($data['kategori']));
        exit;
    }
}

header('Location: index.php');
exit;
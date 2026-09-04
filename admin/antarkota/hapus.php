<?php
session_start();
include '../koneksi.php'; // Naik 1 folder ke admin/koneksi.php

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    $query_hapus = "DELETE FROM layanan_bandara WHERE id = '$id'";
    
    if (mysqli_query($koneksi, $query_hapus)) {
        header("Location: index.php?pesan=berhasil_hapus");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit;
}
?>
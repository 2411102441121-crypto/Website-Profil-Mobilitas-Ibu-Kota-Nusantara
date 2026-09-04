<?php
session_start();
include '../koneksi.php'; // Naik 1 folder ke admin/koneksi.php

if (isset($_POST['simpan'])) {
    $kategori  = $_POST['kategori'];
    $nama      = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $status    = $_POST['status'];

    $query = "INSERT INTO layanan_bandara (kategori, nama, deskripsi, status) VALUES ('$kategori', '$nama', '$deskripsi', '$status')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?pesan=berhasil_tambah");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Layanan - Admin OIKN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <h4 class="mb-3 fw-bold text-dark">Tambah Data Layanan Bandara</h4>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Kategori</label>
                <select name="kategori" class="form-select" required>
                    <option value="fasilitas">Fasilitas Bandara</option>
                    <option value="infrastruktur">Infrastruktur Operasional</option>
                    <option value="maskapai">Maskapai Beroperasi</option>
                    <option value="transportasi">Transportasi Lanjutan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Nama Item</label>
                <input type="text" name="nama" class="form-control" placeholder="Contoh: Terminal Penumpang" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Deskripsi / Detail</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan keterangan..." required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Status</label>
                <select name="status" class="form-select">
                    <option value="Aktif">Aktif</option>
                    <option value="Non-Aktif">Non-Aktif</option>
                </select>
            </div>
            <div class="d-flex justify-content-end gap-2 pt-2">
                <a href="index.php" class="btn btn-light border">Batal</a>
                <button type="submit" name="simpan" class="btn btn-success px-4" style="background-color: #1b4327; border: none;">Simpan Data</button>
            </div>
        </form>
    </div>
</body>
</html>
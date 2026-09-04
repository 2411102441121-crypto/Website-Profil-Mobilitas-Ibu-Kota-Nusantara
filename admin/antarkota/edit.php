<?php
session_start();
include '../koneksi.php'; // Naik 1 folder ke admin/koneksi.php

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$query_get = mysqli_query($koneksi, "SELECT * FROM layanan_bandara WHERE id = '$id'");
$data = mysqli_fetch_assoc($query_get);

if (!$data) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])) {
    $nama      = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $status    = $_POST['status'];

    $query_update = "UPDATE layanan_bandara SET nama='$nama', deskripsi='$deskripsi', status='$status' WHERE id='$id'";
    
    if (mysqli_query($koneksi, $query_update)) {
        header("Location: index.php?pesan=berhasil_update");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Layanan - Admin OIKN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <h4 class="mb-3 fw-bold text-dark">Edit Data Layanan</h4>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Nama Item</label>
                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Deskripsi / Detail</label>
                <textarea name="deskripsi" class="form-control" rows="3" required><?= htmlspecialchars($data['deskripsi']); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Status</label>
                <select name="status" class="form-select">
                    <option value="Aktif" <?= $data['status'] == 'Aktif' ? 'selected' : ''; ?>>Aktif</option>
                    <option value="Non-Aktif" <?= $data['status'] == 'Non-Aktif' ? 'selected' : ''; ?>>Non-Aktif</option>
                </select>
            </div>
            <div class="d-flex justify-content-end gap-2 pt-2">
                <a href="index.php" class="btn btn-light border">Batal</a>
                <button type="submit" name="update" class="btn btn-primary px-4">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
require_once '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $istilah  = mysqli_real_escape_string($koneksi, $_POST['istilah']);
    $definisi = mysqli_real_escape_string($koneksi, $_POST['definisi']);
    $icon     = mysqli_real_escape_string($koneksi, $_POST['icon'] ?: 'fa-bookmark');
    $status   = mysqli_real_escape_string($koneksi, $_POST['status']);

    $query = "INSERT INTO glosarium (istilah, definisi, icon, status) VALUES ('$istilah', '$definisi', '$icon', '$status')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Istilah - Glosarium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .main-wrapper { display: flex; min-height: 100vh; }
        .content-wrapper { flex: 1; padding: 32px; }
        .btn-green { background-color: #1b4327; color: white; }
        .btn-green:hover { background-color: #14331d; color: white; }
    </style>
</head>
<body>
<div class="main-wrapper">
    <?php include '../includes/sidebar.php'; ?>
    <div class="content-wrapper">
        <div class="card p-4 mx-auto" style="max-width: 600px; border-radius: 12px;">
            <h4 class="fw-bold mb-3">Tambah Istilah Baru</h4>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Istilah</label>
                    <input type="text" class="form-control" name="istilah" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Definisi</label>
                    <textarea class="form-control" name="definisi" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon (Font Awesome Class)</label>
                    <input type="text" class="form-control" name="icon" value="fa-bookmark" placeholder="fa-bus">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-green">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
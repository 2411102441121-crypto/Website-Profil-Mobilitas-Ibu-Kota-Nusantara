<?php
require_once '../koneksi.php';

$id = (int)$_GET['id'];
$query = "SELECT * FROM glosarium WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $istilah  = mysqli_real_escape_string($koneksi, $_POST['istilah']);
    $definisi = mysqli_real_escape_string($koneksi, $_POST['definisi']);
    $icon     = mysqli_real_escape_string($koneksi, $_POST['icon']);
    $status   = mysqli_real_escape_string($koneksi, $_POST['status']);

    $update_query = "UPDATE glosarium SET istilah='$istilah', definisi='$definisi', icon='$icon', status='$status' WHERE id=$id";
    if (mysqli_query($koneksi, $update_query)) {
        header("Location: index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Istilah - Glosarium</title>
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
            <h4 class="fw-bold mb-3">Edit Istilah</h4>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Istilah</label>
                    <input type="text" class="form-control" name="istilah" value="<?= htmlspecialchars($data['istilah']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Definisi</label>
                    <textarea class="form-control" name="definisi" rows="3" required><?= htmlspecialchars($data['definisi']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon (Font Awesome Class)</label>
                    <input type="text" class="form-control" name="icon" value="<?= htmlspecialchars($data['icon']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status">
                        <option value="Aktif" <?= $data['status'] === 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="Nonaktif" <?= $data['status'] === 'Nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-green">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
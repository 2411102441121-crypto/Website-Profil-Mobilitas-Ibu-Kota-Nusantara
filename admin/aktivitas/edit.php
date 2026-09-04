<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../login.php');
    exit;
}
require_once __DIR__ . '/../koneksi.php';

$id = $_GET['id'] ?? '';
$id_clean = mysqli_real_escape_string($koneksi, $id);

$query = mysqli_query($koneksi, "SELECT * FROM aktivitas WHERE id = '$id_clean' LIMIT 1");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $link = mysqli_real_escape_string($koneksi, $_POST['link']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $tanggal = $_POST['tanggal'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $img_name = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $gambar = time() . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($tmp_name, "../../assets/images/" . $gambar);

        $q_update = "UPDATE aktivitas SET judul='$judul', kategori='$kategori', status='$status', link='$link', deskripsi='$deskripsi', tanggal='$tanggal', gambar='$gambar' WHERE id='$id_clean'";
    } else {
        $q_update = "UPDATE aktivitas SET judul='$judul', kategori='$kategori', status='$status', link='$link', deskripsi='$deskripsi', tanggal='$tanggal' WHERE id='$id_clean'";
    }

    if (mysqli_query($koneksi, $q_update)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aktivitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom-primary { background-color: #073b29; color: #fff; }
        .btn-custom-primary:hover { background-color: #052c1f; color: #fff; }
    </style>
</head>
<body class="bg-light py-5">
    <div class="container" style="max-width: 650px;">
        <div class="card shadow-sm border-0 p-4">
            <h4 class="fw-bold mb-3">Edit Postingan Aktivitas</h4>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger py-2 small"><?= $error ?></div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-bold small">Judul Berita/Aktivitas</label>
                    <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required class="form-control form-control-sm">
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold small">Kategori</label>
                        <select name="kategori" class="form-select form-select-sm">
                            <option value="Olahraga" <?= $data['kategori']==='Olahraga'?'selected':'' ?>>Olahraga</option>
                            <option value="Transportasi" <?= $data['kategori']==='Transportasi'?'selected':'' ?>>Transportasi</option>
                            <option value="Pembangunan" <?= $data['kategori']==='Pembangunan'?'selected':'' ?>>Pembangunan</option>
                            <option value="Kegiatan & Masyarakat" <?= $data['kategori']==='Kegiatan & Masyarakat'?'selected':'' ?>>Kegiatan & Masyarakat</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small">Status</label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="Published" <?= $data['status']==='Published'?'selected':'' ?>>Published</option>
                            <option value="Draft" <?= $data['status']==='Draft'?'selected':'' ?>>Draft</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small">Tanggal</label>
                        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small">Link Berita (URL)</label>
                    <input type="url" name="link" value="<?= htmlspecialchars($data['link']) ?>" class="form-control form-control-sm">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small">Gambar Saat Ini: <span class="text-muted fw-normal"><?= htmlspecialchars($data['gambar']) ?></span></label>
                    <input type="file" name="gambar" accept="image/*" class="form-control form-control-sm">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="4" class="form-control form-control-sm"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
                </div>

                <div class="d-flex gap-2">
                    <a href="index.php" class="btn btn-outline-secondary btn-sm w-50">Batal</a>
                    <button type="submit" class="btn btn-custom-primary btn-sm w-50 fw-bold">Update Postingan</button>
                </div>
            </form>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
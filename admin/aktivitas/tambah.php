<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../login.php');
    exit;
}
require_once __DIR__ . '/../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $link = mysqli_real_escape_string($koneksi, $_POST['link']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $tanggal = !empty($_POST['tanggal']) ? $_POST['tanggal'] : date('Y-m-d');

    $gambar = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $img_name = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $gambar = time() . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($tmp_name, "../../assets/images/" . $gambar);
    }

    $query = "INSERT INTO aktivitas (judul, kategori, status, link, deskripsi, tanggal, gambar) 
              VALUES ('$judul', '$kategori', '$status', '$link', '$deskripsi', '$tanggal', '$gambar')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Aktivitas Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom-primary { background-color: #073b29; color: #fff; }
        .btn-custom-primary:hover { background-color: #052c1f; color: #fff; }
    </style>
</head>
<body class="bg-light py-5">
    <div class="container" style="max-width: 650px;">
        <div class="card shadow-sm border-0 p-4">
            <h4 class="fw-bold mb-3">Tambah Postingan Aktivitas Baru</h4>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger py-2 small"><?= $error ?></div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-bold small">Judul Berita/Aktivitas</label>
                    <input type="text" name="judul" required class="form-control form-control-sm">
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold small">Kategori</label>
                        <select name="kategori" class="form-select form-select-sm">
                            <option value="Olahraga">Olahraga</option>
                            <option value="Transportasi">Transportasi</option>
                            <option value="Pembangunan">Pembangunan</option>
                            <option value="Kegiatan & Masyarakat">Kegiatan & Masyarakat</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small">Status</label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="Published">Published</option>
                            <option value="Draft">Draft</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small">Tanggal</label>
                        <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small">Link Berita (URL)</label>
                    <input type="url" name="link" placeholder="https://..." class="form-control form-control-sm">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small">Upload Gambar</label>
                    <input type="file" name="gambar" accept="image/*" class="form-control form-control-sm">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="4" class="form-control form-control-sm"></textarea>
                </div>

                <div class="d-flex gap-2">
                    <a href="index.php" class="btn btn-outline-secondary btn-sm w-50">Batal</a>
                    <button type="submit" class="btn btn-custom-primary btn-sm w-50 fw-bold">Simpan Postingan</button>
                </div>
            </form>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
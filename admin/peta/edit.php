<?php
require_once '../koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: index.php?tab=layanan");
    exit;
}

$query = mysqli_query($koneksi, "SELECT * FROM layanan WHERE id=$id LIMIT 1");

if (!$query) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data layanan tidak ditemukan.");
}

$error = '';
$warnaSekarang = !empty($data['warna']) ? $data['warna'] : '#64748B';

// Proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = strtoupper(trim($_POST['kode'] ?? ''));
    $nama = trim($_POST['nama_layanan'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $urutan = (int)($_POST['urutan'] ?? 0);
    $status = $_POST['status'] ?? 'aktif';
    $warna = $_POST['warna'] ?? '#64748B';

    if ($kode === '' || $nama === '' || $deskripsi === '') {
        $error = 'Semua data wajib diisi.';
    } else {
        $kode = mysqli_real_escape_string($koneksi, $kode);
        $nama = mysqli_real_escape_string($koneksi, $nama);
        $deskripsi = mysqli_real_escape_string($koneksi, $deskripsi);
        $status = mysqli_real_escape_string($koneksi, $status);
        $warna = mysqli_real_escape_string($koneksi, $warna);

        $cek = mysqli_query($koneksi, "SELECT id FROM layanan WHERE kode='$kode' AND id<>$id LIMIT 1");

        if (!$cek) {
            $error = 'Gagal memeriksa kode layanan: ' . mysqli_error($koneksi);
        } elseif (mysqli_num_rows($cek) > 0) {
            $error = 'Kode layanan sudah digunakan.';
        } else {
            $update = mysqli_query($koneksi, "UPDATE layanan SET kode='$kode', warna='$warna', nama_layanan='$nama', deskripsi='$deskripsi', urutan='$urutan', status='$status' WHERE id=$id");

            if ($update) {
                header("Location: index.php?tab=layanan&success=edit");
                exit;
            }

            $error = 'Gagal mengubah data: ' . mysqli_error($koneksi);
        }
    }

    $data['kode'] = $_POST['kode'] ?? $data['kode'];
    $data['nama_layanan'] = $_POST['nama_layanan'] ?? $data['nama_layanan'];
    $data['deskripsi'] = $_POST['deskripsi'] ?? $data['deskripsi'];
    $data['urutan'] = $_POST['urutan'] ?? $data['urutan'];
    $data['status'] = $_POST['status'] ?? $data['status'];
    $warnaSekarang = $_POST['warna'] ?? $warnaSekarang;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan - CMS IKN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f5f6f7; color: #25364b; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; }
        .main-content { margin-left: 260px; min-height: 100vh; padding: 30px 35px; }
        .breadcrumb { font-size: 12px; color: #98a2b3; margin-bottom: 8px; }
        .title h1 { margin: 0; color: #172b4d; font-size: 28px; }
        .title p { margin: 5px 0 20px; color: #718096; font-size: 13px; }
        .card { width: 100%; max-width: 1000px; background: #fff; border: 1px solid #e5e7eb; border-radius: 11px; padding: 25px; box-shadow: 0 2px 5px rgba(16,24,40,.05); }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; margin-bottom: 7px; color: #344054; font-size: 13px; font-weight: 600; }
        .form-control { width: 100%; height: 46px; padding: 0 13px; border: 1px solid #d0d5dd; border-radius: 8px; background: #fff; color: #344054; font-size: 13px; outline: none; }
        .form-control:focus { border-color: #12552f; box-shadow: 0 0 0 2px rgba(18,85,47,.08); }
        textarea.form-control { height: 130px; padding: 13px; resize: vertical; }
        .color-box { display: flex; align-items: center; gap: 12px; }
        .color-input { width: 52px; height: 44px; padding: 3px; border: 1px solid #d0d5dd; border-radius: 8px; background: #fff; cursor: pointer; }
        .color-text { font-size: 12px; color: #98a2b3; }
        .footer { display: flex; justify-content: flex-end; gap: 10px; margin-top: 25px; padding-top: 18px; border-top: 1px solid #eaecf0; }
        .btn { height: 40px; padding: 0 17px; border: 0; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; gap: 7px; text-decoration: none; font-size: 12px; font-weight: 600; cursor: pointer; }
        .btn-primary { background: #12552f; color: #fff; }
        .btn-primary:hover { background: #0e4325; }
        .btn-secondary { background: #fff; color: #475467; border: 1px solid #d0d5dd; }
        .btn-secondary:hover { background: #f9fafb; }
        .alert { max-width: 1000px; margin-bottom: 15px; padding: 11px 14px; border-radius: 8px; background: #fef3f2; border: 1px solid #fecdca; color: #b42318; font-size: 12px; }

        @media(max-width: 700px) {
            .main-content { margin-left: 0; padding: 20px; }
            .grid-2 { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>

<div class="main-wrapper">
    <?php include '../includes/sidebar.php'; ?>

    <div class="main-content">

        <div class="breadcrumb">Peta & Rute / Layanan / Edit</div>

        <div class="title">
            <h1>Edit Layanan</h1>
            <p>Perbarui informasi layanan transportasi yang ditampilkan pada halaman peta.</p>
        </div>

        <?php if ($error): ?>
            <div class="alert">
                <i class="fa-solid fa-circle-exclamation"></i>
                <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <div class="card">

            <form method="POST">

                <div class="grid-2">
                    <div class="form-group">
                        <label>Kode Layanan</label>
                        <input type="text" name="kode" class="form-control" value="<?= htmlspecialchars($data['kode'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Warna Kode</label>
                        <div class="color-box">
                            <input type="color" name="warna" class="color-input" value="<?= htmlspecialchars($warnaSekarang, ENT_QUOTES, 'UTF-8') ?>">
                            <span class="color-text">Pilih warna kode layanan.</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Layanan</label>
                    <input type="text" name="nama_layanan" class="form-control" value="<?= htmlspecialchars($data['nama_layanan'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi Rute</label>
                    <textarea name="deskripsi" class="form-control" required><?= htmlspecialchars($data['deskripsi'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>Urutan Tampil</label>
                        <input type="number" name="urutan" class="form-control" value="<?= htmlspecialchars($data['urutan'] ?? 1, ENT_QUOTES, 'UTF-8') ?>" min="1" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="aktif" <?= $data['status'] === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="nonaktif" <?= $data['status'] === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="footer">
                    <a href="index.php?tab=layanan" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>

    </div>
</div>

</body>
</html>
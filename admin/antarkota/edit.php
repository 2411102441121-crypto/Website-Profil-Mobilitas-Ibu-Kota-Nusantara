<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) { 
    header('Location: ../login.php'); 
    exit; 
}
require_once __DIR__ . '/../koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) { 
    header('Location: index.php'); 
    exit; 
}

// Ambil data dari database
$stmt = mysqli_prepare($koneksi, "SELECT * FROM antarkota WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$data) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul']);
    $deskripsi = trim($_POST['deskripsi']);
    $kategori = $_POST['kategori'];
    $gambar = $data['gambar'];

    // Jika user mengunggah gambar baru
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['gambar']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed_ext)) {
            $new_filename = time() . '_' . uniqid() . '.' . $ext;
            
            // Tentukan jalur fisik folder uploads di XAMPP Windows
            $upload_dir = __DIR__ . '/../../assets/images/uploads/';

            // Otomatis buat folder jika belum ada
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $target_file = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                // Hapus gambar lama jika file fisiknya ada
                if (!empty($data['gambar'])) {
                    $old_file = $upload_dir . $data['gambar'];
                    if (file_exists($old_file) && is_file($old_file)) {
                        unlink($old_file);
                    }
                }
                $gambar = $new_filename;
            } else {
                $error = "Gagal memindahkan file ke folder uploads. Cek hak akses folder.";
            }
        } else {
            $error = "Format gambar tidak didukung (Gunakan JPG, JPEG, PNG, WEBP).";
        }
    }

    if (!$error) {
        $update_stmt = mysqli_prepare($koneksi, "UPDATE antarkota SET judul = ?, deskripsi = ?, kategori = ?, gambar = ? WHERE id = ?");
        mysqli_stmt_bind_param($update_stmt, "ssssi", $judul, $deskripsi, $kategori, $gambar, $id);
        
        if (mysqli_stmt_execute($update_stmt)) {
            header('Location: index.php?kategori=' . urlencode($kategori));
            exit;
        } else {
            $error = "Gagal memperbarui database.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan Antarkota - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #1e293b; }
        .btn-submit { background-color: #1b4327; color: #fff; }
        .btn-submit:hover { background-color: #14331e; color: #fff; }
    </style>
</head>
<body>
<div class="d-flex min-vh-100">
    <?php include __DIR__ . '/../includes/sidebar.php'; ?>

    <main class="main-content p-4 p-md-5 w-100">
        <div class="mb-4">
            <h2 class="fw-bold" style="color:#1b4327;">Edit Post</h2>
            <p class="text-secondary">Ubah data layanan atau infrastruktur antarkota.</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger col-md-8"><?= $error ?></div>
        <?php endif; ?>

        <div class="card border-0 shadow-sm p-4 rounded-4 col-md-8 bg-white">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Layanan / Infrastruktur</label>
                    <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <?php foreach(['Infrastruktur', 'Bandara', 'Bus & travel', 'Perairan'] as $kat): ?>
                            <option value="<?= $kat ?>" <?= ($data['kategori'] == $kat) ? 'selected' : '' ?>><?= $kat ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold d-block">Gambar saat ini</label>
                    <img src="../../assets/images/uploads/<?= htmlspecialchars($data['gambar']) ?>" width="160" class="rounded-3 border mb-2" onerror="this.src='https://via.placeholder.com/160x100?text=No+Image'">
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">*Biarkan kosong jika tidak ingin mengubah gambar.</small>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-submit px-4 fw-medium">Simpan Perubahan</button>
                    <a href="index.php?kategori=<?= urlencode($data['kategori']) ?>" class="btn btn-light border px-4">Batal</a>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>
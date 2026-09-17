<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) { 
    header('Location: ../login.php'); 
    exit; 
}
require_once __DIR__ . '/../koneksi.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul']);
    $deskripsi = trim($_POST['deskripsi']);
    $kategori = $_POST['kategori'];

    // Validasi & Upload Gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['gambar']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($ext, $allowed_ext)) {
            $new_filename = time() . '_' . uniqid() . '.' . $ext;
            
            // Menggunakan lokasi absolut agar tidak gagal membuat folder/menyimpan gambar
            $target_dir = __DIR__ . '/../../assets/images/uploads/';

            if (!is_dir($target_dir)) { 
                mkdir($target_dir, 0777, true); 
            }

            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_dir . $new_filename)) {
                $stmt = mysqli_prepare($koneksi, "INSERT INTO antarkota (judul, deskripsi, kategori, gambar) VALUES (?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt, "ssss", $judul, $deskripsi, $kategori, $new_filename);
                
                if (mysqli_stmt_execute($stmt)) {
                    header('Location: index.php?kategori=' . urlencode($kategori));
                    exit;
                } else {
                    $error = "Gagal menyimpan data ke database.";
                }
            } else {
                $error = "Gagal mengunggah gambar.";
            }
        } else {
            $error = "Format gambar tidak didukung. Gunakan JPG, JPEG, PNG, atau WEBP.";
        }
    } else {
        $error = "Silakan pilih gambar terlebih dahulu.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan Antarkota - Admin</title>
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
            <h2 class="fw-bold" style="color:#1b4327;">Tambah Post Baru</h2>
            <p class="text-secondary">Tambah rute atau infrastruktur layanan antarkota baru.</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger col-md-8"><?= $error ?></div>
        <?php endif; ?>

        <div class="card border-0 shadow-sm p-4 rounded-4 col-md-8 bg-white">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Layanan / Infrastruktur</label>
                    <input type="text" name="judul" class="form-control" placeholder="Contoh: Jalan Tol Balikpapan – Samarinda (Tol Balsam)" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi Singkat</label>
                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tuliskan deskripsi koridor/layanan..." required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="Infrastruktur">Infrastruktur</option>
                        <option value="Bandara">Bandara</option>
                        <option value="Bus & travel">Bus & travel</option>
                        <option value="Perairan">Perairan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Gambar Thumbnail</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-submit px-4 fw-medium">Simpan Data</button>
                    <a href="index.php" class="btn btn-light border px-4">Batal</a>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>
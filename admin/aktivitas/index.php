<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../login.php');
    exit;
}
require_once __DIR__ . '/../koneksi.php';

// Filter Kategori
$cat_filter = $_GET['cat'] ?? 'All';
if ($cat_filter !== 'All') {
    $cat_clean = mysqli_real_escape_string($koneksi, $cat_filter);
    $q_list = mysqli_query($koneksi, "SELECT * FROM aktivitas WHERE LOWER(kategori) = LOWER('$cat_clean') ORDER BY tanggal DESC, id DESC");
} else {
    $q_list = mysqli_query($koneksi, "SELECT * FROM aktivitas ORDER BY tanggal DESC, id DESC");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivitas Content Management - Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; color: #334155; }
        .text-custom-primary { color: #1b4327; }
        .btn-custom-primary { background-color: #1b4327; color: #fff; border: none; }
        .btn-custom-primary:hover { background-color: #12301b; color: #fff; }
        .img-thumb { width: 110px; height: 80px; object-fit: cover; }
        .badge-kategori { background-color: #e6f4ea; color: #1b4327; border: 1px solid #b7e1cd; }
    </style>
</head>
<body class="bg-light">

<div class="d-flex min-vh-100">
    
    <!-- Memanggil Sidebar Hijau Gelap Terpisah -->
    <?php include '../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="flex-grow-1 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Aktivitas Content Management</h3>
                <p class="text-muted small mb-0">Kelola pembaruan berita, kegiatan, transportasi, dan pembangunan IKN.</p>
            </div>
            <a href="tambah.php" class="btn btn-custom-primary btn-sm fw-bold px-3 py-2 rounded-2">
                <i class="fa-solid fa-plus me-1"></i> Create New Post
            </a>
        </div>

        <!-- Filter Kategori (Opsi Olahraga Sudah Dihapus) -->
        <div class="d-flex gap-2 mb-4 overflow-x-auto pb-1">
            <a href="index.php?cat=All" class="btn btn-sm rounded-pill <?= $cat_filter==='All'?'btn-dark':'btn-outline-secondary bg-white' ?>">All Categories</a>
            <a href="index.php?cat=Transportasi" class="btn btn-sm rounded-pill <?= $cat_filter==='Transportasi'?'btn-dark':'btn-outline-secondary bg-white' ?>">Transportasi</a>
            <a href="index.php?cat=Pembangunan" class="btn btn-sm rounded-pill <?= $cat_filter==='Pembangunan'?'btn-dark':'btn-outline-secondary bg-white' ?>">Pembangunan</a>
            <a href="index.php?cat=Kegiatan %26 Masyarakat" class="btn btn-sm rounded-pill <?= $cat_filter==='Kegiatan & Masyarakat'?'btn-dark':'btn-outline-secondary bg-white' ?>">Kegiatan & Masyarakat</a>
        </div>

        <!-- List Postingan -->
        <div class="d-flex flex-column gap-3">
            <?php if ($q_list && mysqli_num_rows($q_list) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($q_list)): ?>
                    <div class="card border-0 shadow-sm p-3 rounded-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <img src="../../assets/images/<?= !empty($row['gambar']) ? htmlspecialchars($row['gambar']) : 'olahraga.jpg' ?>" class="rounded-2 img-thumb" alt="Thumbnail" onerror="this.src='https://via.placeholder.com/110x80'">
                                <div>
                                    <span class="badge badge-kategori rounded-pill mb-1"><?= htmlspecialchars($row['kategori']) ?></span>
                                    <h6 class="fw-bold mb-1 text-dark"><?= htmlspecialchars($row['judul']) ?></h6>
                                    <div class="text-muted small">
                                        <span class="me-3"><i class="fa-regular fa-calendar me-1"></i> <?= date('d M Y', strtotime($row['tanggal'])) ?></span>
                                        <span class="text-success fw-medium"><i class="fa-solid fa-link me-1"></i> <?= !empty($row['link']) ? 'Link Set' : 'No Link' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge bg-light text-dark border"><i class="fa-solid fa-circle text-dark me-1" style="font-size: 8px;"></i> <?= htmlspecialchars($row['status'] ?? 'Published') ?></span>
                                <div class="d-flex gap-2">
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="text-secondary p-1"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus postingan ini?')" class="text-danger p-1"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="card p-5 text-center text-muted border-0 shadow-sm">Belum ada data postingan.</div>
            <?php endif; ?>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
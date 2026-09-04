<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once __DIR__ . '/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Profil Mobilitas IKN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; color: #1e293b; }
        .card-stat { background-color: #e2ece9; border: none; border-radius: 12px; }
        .icon-box { width: 42px; height: 42px; background-color: #1b4327; color: #fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; }
        .badge-kategori-tbl { background-color: #f1f5f9; color: #475569; font-size: 0.75rem; font-weight: 600; padding: 4px 10px; border-radius: 6px; }
        .badge-pub { background-color: #dcfce7; color: #15803d; font-size: 0.7rem; font-weight: 700; border-radius: 12px; padding: 4px 12px; }
        .badge-draft { background-color: #f1f5f9; color: #64748b; font-size: 0.7rem; font-weight: 700; border-radius: 12px; padding: 4px 12px; }
    </style>
</head>
<body class="bg-light">
<div class="d-flex min-vh-100">
    
    <?php include __DIR__ . '/includes/sidebar.php'; ?>

    <main class="flex-grow-1 p-4 p-md-5">
        <div class="mb-4"><span class="text-secondary small fw-medium">Admin CMS Dashboard</span></div>

        <div class="mb-4">
            <h2 class="fw-bold text-dark mb-2" style="font-size: 1.85rem;">Dashboard Admin Profil Mobilitas IKN</h2>
            <p class="text-secondary small mb-0">Pusat kendali manajemen informasi mobilitas, infrastruktur cerdas, dan layanan transportasi publik terpadu di Ibu Kota Nusantara.</p>
        </div>

        <!-- Stat Cards -->
        <div class="row g-3 mb-5">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-stat p-4">
                    <div class="icon-box mb-3"><i class="fa-regular fa-newspaper fs-5"></i></div>
                    <div class="fs-2 fw-bold text-dark mb-1">24</div>
                    <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.7rem;">TOTAL AKTIVITAS / BERITA</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-stat p-4">
                    <div class="icon-box mb-3"><i class="fa-solid fa-wrench fs-5"></i></div>
                    <div class="fs-2 fw-bold text-dark mb-1">12</div>
                    <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.7rem;">TOTAL INFRASTRUKTUR</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-stat p-4">
                    <div class="icon-box mb-3"><i class="fa-solid fa-bus fs-5"></i></div>
                    <div class="fs-2 fw-bold text-dark mb-1">18</div>
                    <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.7rem;">TOTAL LAYANAN TERPADU</div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card card-stat p-4">
                    <div class="icon-box mb-3"><i class="fa-regular fa-clock fs-5"></i></div>
                    <div class="fs-6 fw-bold text-dark mb-1">Hari Ini, 08:30 WITA</div>
                    <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.7rem;">TERAKHIR DIPERBARUI</div>
                </div>
            </div>
        </div>

        <!-- Tabel Aktivitas Terbaru -->
        <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark m-0 fs-5">Aktivitas Terbaru</h4>
                <div class="d-flex gap-2">
                    <select class="form-select form-select-sm border-0 bg-light fw-medium text-secondary" style="width: 150px;">
                        <option>Semua Kategori</option>
                    </select>
                    <button class="btn btn-sm btn-light border-0"><i class="fa-solid fa-sliders"></i></button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle table-borderless">
                    <thead>
                        <tr class="text-secondary small text-uppercase border-bottom">
                            <th class="fw-semibold">JUDUL</th>
                            <th class="fw-semibold">KATEGORI</th>
                            <th class="fw-semibold">TANGGAL</th>
                            <th class="fw-semibold">STATUS</th>
                            <th class="fw-semibold text-end">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-bottom">
                            <td class="fw-bold text-dark">Pembangunan Tol Balikpapan</td>
                            <td><span class="badge-kategori-tbl"><i class="fa-solid fa-wrench me-1"></i> Infrastruktur</span></td>
                            <td class="text-secondary small">24 Okt 2024</td>
                            <td><span class="badge-pub">PUBLISHED</span></td>
                            <td class="text-end"><a href="#" class="text-secondary"><i class="fa-solid fa-ellipsis-vertical"></i></a></td>
                        </tr>
                        <tr class="border-bottom">
                            <td class="fw-bold text-dark">Festival Nusantara</td>
                            <td><span class="badge-kategori-tbl"><i class="fa-regular fa-calendar me-1"></i> Aktivitas</span></td>
                            <td class="text-secondary small">22 Okt 2024</td>
                            <td><span class="badge-pub">PUBLISHED</span></td>
                            <td class="text-end"><a href="#" class="text-secondary"><i class="fa-solid fa-ellipsis-vertical"></i></a></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-dark">Bandara VVIP IKN</td>
                            <td><span class="badge-kategori-tbl"><i class="fa-solid fa-plane me-1"></i> Layanan</span></td>
                            <td class="text-secondary small">20 Okt 2024</td>
                            <td><span class="badge-draft">DRAFT</span></td>
                            <td class="text-end"><a href="#" class="text-secondary"><i class="fa-solid fa-ellipsis-vertical"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
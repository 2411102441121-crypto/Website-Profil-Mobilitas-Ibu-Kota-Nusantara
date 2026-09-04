<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../login.php');
    exit;
}
require_once __DIR__ . '/../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Layanan Intrakota - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; color: #1e293b; }
        .btn-custom-dark { background-color: #000; color: #fff; font-size: 0.75rem; font-weight: 700; border: none; padding: 10px 18px; }
        .card-mode { border: none; border-radius: 16px; overflow: hidden; background: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.03); }
        .card-mode-header { height: 180px; background-size: cover; background-position: center; position: relative; display: flex; align-items: flex-end; padding: 16px; }
        .card-mode-header::before { content: ""; position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); }
        .badge-status-card { position: absolute; top: 12px; right: 12px; font-size: 0.65rem; font-weight: 700; border-radius: 12px; padding: 4px 10px; text-uppercase: true; background: rgba(255,255,255,0.3); color: #fff; backdrop-filter: blur(4px); }
        .mode-title { position: relative; z-index: 1; color: #fff; display: flex; align-items: center; gap: 10px; }
        .mode-icon { width: 32px; height: 32px; background: rgba(255,255,255,0.2); border-radius: 6px; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px); }
        .btn-card-act { background-color: #1b4327; color: #fff; font-size: 0.75rem; font-weight: 600; border: none; }
        .btn-card-act:hover { background-color: #12301b; color: #fff; }
    </style>
</head>
<body class="bg-light">
<div class="d-flex min-vh-100">
    
    <?php include __DIR__ . '/../includes/sidebar.php'; ?>

    <main class="flex-grow-1 p-4 p-md-5">
        <div class="mb-4"><span class="text-secondary small fw-medium">Admin CMS Dashboard</span></div>

        <div class="d-flex justify-content-between align-items-start mb-4">
            <div style="max-width: 700px;">
                <h2 class="fw-bold text-dark mb-2" style="font-size: 1.85rem;">Manajemen Layanan Intrakota</h2>
                <p class="text-secondary small mb-0">Pusat kontrol operasional untuk mobilitas di dalam Kawasan Inti Pusat Pemerintahan (KIPP). Kelola armada, pantau rute aktif, dan perbarui jadwal secara real-time.</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-light btn-sm border fw-semibold px-3 py-2"><i class="fa-solid fa-download me-1"></i> Laporan</button>
                <button class="btn btn-custom-dark btn-sm rounded-2 text-uppercase px-3 py-2"><i class="fa-solid fa-plus me-1"></i> Tambah Mode</button>
            </div>
        </div>

        <div class="row g-4">
            <!-- Card 1: ART -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card card-mode">
                    <div class="card-mode-header" style="background-image: url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=600');">
                        <span class="badge-status-card text-warning"><i class="fa-solid fa-circle me-1" style="font-size: 6px;"></i> OPERASIONAL</span>
                        <div class="mode-title">
                            <div class="mode-icon"><i class="fa-solid fa-train"></i></div>
                            <div>
                                <h5 class="fw-bold m-0 lh-1">ART</h5>
                                <small class="opacity-75" style="font-size: 0.75rem;">Autonomous Rail</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row text-center mb-4">
                            <div class="col-6 border-end">
                                <div class="fs-2 fw-bold text-dark">12</div>
                                <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.65rem;">TOTAL ARMADA</div>
                            </div>
                            <div class="col-6">
                                <div class="fs-2 fw-bold text-dark">3</div>
                                <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.65rem;">RUTE AKTIF</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-light btn-sm border flex-grow-1 fw-semibold"><i class="fa-solid fa-route me-1"></i> Edit Rute</button>
                            <button class="btn btn-card-act btn-sm flex-grow-1"><i class="fa-regular fa-clock me-1"></i> Update Jadwal</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Bus Lingkar -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card card-mode">
                    <div class="card-mode-header" style="background-image: url('https://images.unsplash.com/photo-1570125909232-eb263c188f7e?q=80&w=600');">
                        <span class="badge-status-card text-info"><i class="fa-solid fa-circle me-1" style="font-size: 6px;"></i> OPERASIONAL</span>
                        <div class="mode-title">
                            <div class="mode-icon"><i class="fa-solid fa-bus"></i></div>
                            <div>
                                <h5 class="fw-bold m-0 lh-1">Bus Lingkar</h5>
                                <small class="opacity-75" style="font-size: 0.75rem;">KIPP Loop</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row text-center mb-4">
                            <div class="col-6 border-end">
                                <div class="fs-2 fw-bold text-dark">45</div>
                                <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.65rem;">TOTAL ARMADA</div>
                            </div>
                            <div class="col-6">
                                <div class="fs-2 fw-bold text-dark">8</div>
                                <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.65rem;">RUTE AKTIF</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-light btn-sm border flex-grow-1 fw-semibold"><i class="fa-solid fa-route me-1"></i> Edit Rute</button>
                            <button class="btn btn-card-act btn-sm flex-grow-1"><i class="fa-regular fa-clock me-1"></i> Update Jadwal</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Mobilitas Aktif -->
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card card-mode">
                    <div class="card-mode-header" style="background-image: url('https://images.unsplash.com/photo-1519501025264-65ba15a82390?q=80&w=600');">
                        <span class="badge-status-card text-warning"><i class="fa-solid fa-circle me-1" style="font-size: 6px;"></i> MAINTENANCE</span>
                        <div class="mode-title">
                            <div class="mode-icon"><i class="fa-solid fa-person-biking"></i></div>
                            <div>
                                <h5 class="fw-bold m-0 lh-1">Mobilitas Aktif</h5>
                                <small class="opacity-75" style="font-size: 0.75rem;">Sepeda & Pejalan</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row text-center mb-4">
                            <div class="col-6 border-end">
                                <div class="fs-2 fw-bold text-dark">120 <span class="fs-6 fw-normal text-secondary">km</span></div>
                                <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.65rem;">TOTAL JALUR</div>
                            </div>
                            <div class="col-6">
                                <div class="fs-2 fw-bold text-dark">15</div>
                                <div class="text-secondary small fw-bold text-uppercase" style="font-size: 0.65rem;">TITIK SEPEDA</div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-light btn-sm border w-100 fw-semibold"><i class="fa-solid fa-location-dot me-1"></i> Edit Jalur</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
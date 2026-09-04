<?php
session_start();
// Cek status login admin jika diperlukan
// if (!isset($_SESSION['admin_logged_in'])) { header('Location: ../login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Layanan Bandara SAMS Sepinggan - Admin OIKN</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }
        .main-content {
            flex: 1;
            background-color: #f8f9fa;
            min-height: 100vh;
            overflow-y: auto;
        }
        .card-table-section {
            border: 1px solid #eef2f5;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
            background: #ffffff;
            margin-bottom: 24px;
        }
        .badge-count {
            background-color: #e8f5e9;
            color: #1b4327;
            font-weight: 600;
            border-radius: 50rem;
            padding: 2px 10px;
            font-size: 0.8rem;
        }
        .table-custom {
            margin-bottom: 0;
            font-size: 0.875rem;
        }
        .table-custom th {
            text-transform: uppercase;
            font-size: 0.725rem;
            letter-spacing: 0.5px;
            color: #6c757d;
            background-color: #fafafa;
            border-bottom: 1px solid #edf2f7;
            padding: 12px 16px;
        }
        .table-custom td {
            vertical-align: middle;
            padding: 12px 16px;
            border-bottom: 1px solid #f1f5f9;
        }
        .icon-box {
            width: 36px;
            height: 36px;
            background-color: #e8f5e9;
            color: #1b4327;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }
        .status-dot {
            height: 8px;
            width: 8px;
            background-color: #198754;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }
        .btn-action {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            border: none;
            font-size: 0.825rem;
        }
        .btn-action-view { background-color: #f1f5f9; color: #475569; }
        .btn-action-view:hover { background-color: #e2e8f0; color: #1e293b; }
        .btn-action-edit { background-color: #fef3c7; color: #d97706; }
        .btn-action-edit:hover { background-color: #fde68a; color: #b45309; }
        .btn-action-delete { background-color: #fee2e2; color: #dc2626; }
        .btn-action-delete:hover { background-color: #fca5a5; color: #991b1b; }
        .btn-add-section {
            border: 1px solid #e2e8f0;
            color: #334155;
            background-color: #ffffff;
            font-size: 0.825rem;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: 6px;
        }
        .btn-add-section:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
        }
        .btn-main-add {
            background-color: #1b4327;
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 8px;
        }
        .btn-main-add:hover {
            background-color: #14331d;
            color: #ffffff;
        }
        .img-thumb-table {
            width: 48px;
            height: 32px;
            object-fit: cover;
            border-radius: 4px;
        }
        .img-logo-table {
            max-width: 80px;
            max-height: 28px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <?php include '../includes/sidebar.php'; ?>

    <!-- Main Content Area -->
    <div class="main-content p-4 p-md-5">
        
        <!-- Header Top Bar -->
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <span class="text-secondary small fw-medium">Admin CMS Dashboard</span>
                <h3 class="fw-bold text-dark mt-1 mb-1">Manajemen Layanan Bandara SAMS Sepinggan</h3>
                <p class="text-muted small mb-0">Kelola fasilitas, infrastruktur, maskapai, dan transportasi lanjutan di bandara.</p>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <!-- Main Add Button -->
                <button class="btn btn-main-add d-flex align-items-center gap-2 border-0 shadow-sm">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>TAMBAH DATA</span>
                </button>


            </div>
        </div>

        <!-- SECTION 1: FASILITAS BANDARA -->
        <div class="card card-table-section">
            <div class="card-header bg-transparent border-0 p-3 pb-0 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-hospital-user text-success"></i>
                    <h6 class="fw-bold mb-0 text-dark">Fasilitas Bandara</h6>
                    <span class="badge-count">8</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-add-section d-flex align-items-center gap-2">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <span>Tambah Fasilitas</span>
                    </button>
                    <a href="#" class="text-decoration-none text-secondary small fw-medium">Lihat Semua <i class="fa-solid fa-arrow-right ms-1 text-xs"></i></a>
                </div>
            </div>
            <div class="card-body p-0 mt-3">
                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th style="width: 60px;">NO</th>
                                <th style="width: 80px;">ICON</th>
                                <th>NAMA FASILITAS</th>
                                <th>DESKRIPSI</th>
                                <th style="width: 120px;">STATUS</th>
                                <th style="width: 130px;" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-secondary">1</td>
                                <td><div class="icon-box"><i class="fa-solid fa-users"></i></div></td>
                                <td class="fw-semibold">Terminal Penumpang</td>
                                <td class="text-secondary">Area terminal untuk keberangkatan dan kedatangan penumpang.</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view" title="Lihat"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit" title="Edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete" title="Hapus"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">2</td>
                                <td><div class="icon-box"><i class="fa-solid fa-receipt"></i></div></td>
                                <td class="fw-semibold">Check-in Counter</td>
                                <td class="text-secondary">Loket pelayanan check-in penumpang.</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">3</td>
                                <td><div class="icon-box"><i class="fa-solid fa-couch"></i></div></td>
                                <td class="fw-semibold">Ruang Tunggu</td>
                                <td class="text-secondary">Ruang tunggu penumpang sebelum keberangkatan.</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">4</td>
                                <td><div class="icon-box"><i class="fa-solid fa-door-open"></i></div></td>
                                <td class="fw-semibold">Boarding Gate</td>
                                <td class="text-secondary">Pintu masuk penumpang ke pesawat.</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SECTION 2: INFRASTRUKTUR OPERASIONAL -->
        <div class="card card-table-section">
            <div class="card-header bg-transparent border-0 p-3 pb-0 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-building-user text-success"></i>
                    <h6 class="fw-bold mb-0 text-dark">Infrastruktur Operasional</h6>
                    <span class="badge-count">4</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-add-section d-flex align-items-center gap-2">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <span>Tambah Infrastruktur</span>
                    </button>
                    <a href="#" class="text-decoration-none text-secondary small fw-medium">Lihat Semua <i class="fa-solid fa-arrow-right ms-1 text-xs"></i></a>
                </div>
            </div>
            <div class="card-body p-0 mt-3">
                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th style="width: 60px;">NO</th>
                                <th style="width: 90px;">GAMBAR</th>
                                <th>NAMA INFRASTRUKTUR</th>
                                <th>DESKRIPSI</th>
                                <th style="width: 120px;">STATUS</th>
                                <th style="width: 130px;" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-secondary">1</td>
                                <td><img src="https://via.placeholder.com/80x50/334155/ffffff?text=Runway" class="img-thumb-table" alt="Runway"></td>
                                <td class="fw-semibold">Landasan Pacu (Runway)</td>
                                <td class="text-secondary">Panjang 2.500 m, digunakan untuk take off dan landing.</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">2</td>
                                <td><img src="https://via.placeholder.com/80x50/334155/ffffff?text=ATC" class="img-thumb-table" alt="ATC"></td>
                                <td class="fw-semibold">Menara Kontrol (ATC Tower)</td>
                                <td class="text-secondary">Menara pengatur lalu lintas penerbangan.</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">3</td>
                                <td><img src="https://via.placeholder.com/80x50/334155/ffffff?text=Apron" class="img-thumb-table" alt="Apron"></td>
                                <td class="fw-semibold">Apron Pesawat</td>
                                <td class="text-secondary">Area parkir pesawat untuk bongkar muat dan servis.</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">4</td>
                                <td><img src="https://via.placeholder.com/80x50/334155/ffffff?text=Hanggar" class="img-thumb-table" alt="Hanggar"></td>
                                <td class="fw-semibold">Hanggar</td>
                                <td class="text-secondary">Fasilitas perawatan dan penyimpanan pesawat.</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SECTION 3: MASKAPAI YANG BEROPERASI -->
        <div class="card card-table-section">
            <div class="card-header bg-transparent border-0 p-3 pb-0 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-plane-departure text-success"></i>
                    <h6 class="fw-bold mb-0 text-dark">Maskapai yang Beroperasi</h6>
                    <span class="badge-count">6</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-add-section d-flex align-items-center gap-2">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <span>Tambah Maskapai</span>
                    </button>
                    <a href="#" class="text-decoration-none text-secondary small fw-medium">Lihat Semua <i class="fa-solid fa-arrow-right ms-1 text-xs"></i></a>
                </div>
            </div>
            <div class="card-body p-0 mt-3">
                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th style="width: 60px;">NO</th>
                                <th style="width: 100px;">LOGO</th>
                                <th>MASKAPAI</th>
                                <th>TUJUAN UTAMA</th>
                                <th style="width: 120px;">STATUS</th>
                                <th style="width: 130px;" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-secondary">1</td>
                                <td><span class="fw-bold text-primary">Garuda</span></td>
                                <td class="fw-semibold">Garuda Indonesia</td>
                                <td class="text-secondary">Jakarta, Surabaya, Makassar</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">2</td>
                                <td><span class="fw-bold text-success">Citilink</span></td>
                                <td class="fw-semibold">Citilink</td>
                                <td class="text-secondary">Jakarta, Surabaya, Semarang</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">3</td>
                                <td><span class="fw-bold text-danger">Lion Air</span></td>
                                <td class="fw-semibold">Lion Air</td>
                                <td class="text-secondary">Makassar, Palu, Manado</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">4</td>
                                <td><span class="fw-bold text-danger fst-italic">Batik Air</span></td>
                                <td class="fw-semibold">Batik Air</td>
                                <td class="text-secondary">Jakarta, Surabaya</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SECTION 4: TRANSPORTASI LANJUTAN MENUJU IKN -->
        <div class="card card-table-section mb-0">
            <div class="card-header bg-transparent border-0 p-3 pb-0 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <i class="fa-solid fa-bus text-success"></i>
                    <h6 class="fw-bold mb-0 text-dark">Transportasi Lanjutan Menuju IKN</h6>
                    <span class="badge-count">4</span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-add-section d-flex align-items-center gap-2">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <span>Tambah Transportasi</span>
                    </button>
                    <a href="#" class="text-decoration-none text-secondary small fw-medium">Lihat Semua <i class="fa-solid fa-arrow-right ms-1 text-xs"></i></a>
                </div>
            </div>
            <div class="card-body p-0 mt-3">
                <div class="table-responsive">
                    <table class="table table-custom align-middle">
                        <thead>
                            <tr>
                                <th style="width: 60px;">NO</th>
                                <th style="width: 80px;">ICON</th>
                                <th>NAMA TRANSPORTASI</th>
                                <th>OPERATOR</th>
                                <th>ESTIMASI WAKTU</th>
                                <th style="width: 120px;">STATUS</th>
                                <th style="width: 130px;" class="text-center">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-secondary">1</td>
                                <td><div class="icon-box"><i class="fa-solid fa-bus"></i></div></td>
                                <td class="fw-semibold">Shuttle IKN</td>
                                <td class="text-secondary">DAMRI</td>
                                <td class="text-secondary">&plusmn; 90 Menit</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">2</td>
                                <td><div class="icon-box"><i class="fa-solid fa-car"></i></div></td>
                                <td class="fw-semibold">Travel</td>
                                <td class="text-secondary">Cititrans</td>
                                <td class="text-secondary">&plusmn; 95 Menit</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">3</td>
                                <td><div class="icon-box"><i class="fa-solid fa-taxi"></i></div></td>
                                <td class="fw-semibold">Taksi</td>
                                <td class="text-secondary">Blue Bird</td>
                                <td class="text-secondary">&plusmn; 90 Menit</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">4</td>
                                <td><div class="icon-box"><i class="fa-solid fa-bus-simple"></i></div></td>
                                <td class="fw-semibold">Bus Antar Kota</td>
                                <td class="text-secondary">Sinar Jaya</td>
                                <td class="text-secondary">&plusmn; 100 Menit</td>
                                <td><span class="text-success fw-medium small"><span class="status-dot"></span>Aktif</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-action btn-action-view"><i class="fa-regular fa-eye"></i></button>
                                        <button class="btn btn-action btn-action-edit"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn btn-action btn-action-delete"><i class="fa-regular fa-trash-can"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
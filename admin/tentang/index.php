<?php
require_once '../koneksi.php';

// Ambil semua data glosarium
$query = "SELECT * FROM glosarium ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CMS Dashboard - Glosarium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        .main-wrapper { display: flex; min-height: 100vh; }
        .content-wrapper { flex: 1; display: flex; flex-direction: column; min-width: 0; }
        .top-header { height: 60px; background-color: #ffffff; border-bottom: 1px solid #e5e7eb; display: flex; align-items: center; padding: 0 32px; font-weight: 600; font-size: 16px; color: #1f2937; }
        .main-content { padding: 32px; flex: 1; }
        .card-custom { background-color: #ffffff; border-radius: 12px; border: 1px solid #edf2f7; overflow: hidden; }
        .table-glosarium th { background-color: #ffffff; color: #6b7280; font-size: 11px; font-weight: 700; text-transform: uppercase; padding: 16px 24px; border-bottom: 1px solid #f3f4f6; }
        .table-glosarium td { padding: 20px 24px; vertical-align: middle; border-bottom: 1px solid #f3f4f6; font-size: 14px; }
        .icon-avatar { width: 40px; height: 40px; border-radius: 50%; background-color: #f3f7f4; color: #1b4327; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .badge-status { font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; display: inline-block; }
        .badge-aktif { background-color: #d1fae5; color: #065f46; }
        .badge-nonaktif { background-color: #fee2e2; color: #991b1b; }
        .btn-green { background-color: #1b4327; color: #ffffff; border-radius: 8px; padding: 8px 16px; font-size: 14px; border: none; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; }
        .btn-green:hover { background-color: #14331d; color: #ffffff; }
        .action-btns a { color: #9ca3af; margin-right: 8px; font-size: 16px; }
        .action-btns a:hover { color: #1b4327; }
    </style>
</head>
<body>

<div class="main-wrapper">
    <?php include '../includes/sidebar.php'; ?>

    <div class="content-wrapper">
        <header class="top-header">Admin CMS Dashboard</header>

        <main class="main-content">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h2 class="fw-bold mb-1" style="color: #111827;">Glosarium</h2>
                    <p class="text-muted m-0" style="font-size: 14px;">Kelola istilah dan informasi terkait mobilitas cerdas.</p>
                </div>
                <a href="tambah.php" class="btn btn-green">
                    <i class="fa-solid fa-plus"></i>
                    <span>Tambah Istilah</span>
                </a>
            </div>

            <div class="card-custom">
                <div class="table-responsive">
                    <table class="table table-glosarium m-0">
                        <thead>
                            <tr>
                                <th style="width: 25%;">ISTILAH</th>
                                <th style="width: 50%;">DEFINISI</th>
                                <th style="width: 15%;">STATUS</th>
                                <th style="width: 10%;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="icon-avatar">
                                                <i class="fa-solid <?= htmlspecialchars($row['icon']) ?>"></i>
                                            </div>
                                            <span class="fw-bold text-dark"><?= htmlspecialchars($row['istilah']) ?></span>
                                        </div>
                                    </td>
                                    <td><span class="text-secondary"><?= htmlspecialchars($row['definisi']) ?></span></td>
                                    <td>
                                        <span class="badge-status <?= $row['status'] === 'Aktif' ? 'badge-aktif' : 'badge-nonaktif' ?>">
                                            <?= htmlspecialchars($row['status']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-btns">
                                            <a href="edit.php?id=<?= $row['id'] ?>" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus istilah ini?')" title="Hapus"><i class="fa-regular fa-trash-can"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada data glosarium.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>
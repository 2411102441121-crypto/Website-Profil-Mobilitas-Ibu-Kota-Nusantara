<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../login.php');
    exit;
}
require_once __DIR__ . '/../koneksi.php';

// Ambil kategori dari parameter URL (Default: Infrastruktur)
$kategori_aktif = $_GET['kategori'] ?? 'Infrastruktur';

// Query data berdasarkan kategori
$query = "SELECT * FROM antarkota WHERE kategori = ? ORDER BY id DESC";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "s", $kategori_aktif);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Layanan Antarkota - Admin IKN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f8fafc; 
            color: #1e293b; 
        }
        .top-admin-bar { 
            font-size: 1.1rem; 
            color: #334155; 
            font-weight: 500; 
        }
        .page-title { 
            font-size: 1.75rem; 
            font-weight: 700; 
            color: #0f172a; 
        }
        .category-pill { 
            border-radius: 8px; 
            padding: 8px 18px; 
            font-size: 0.875rem; 
            font-weight: 500; 
            border: 1px solid transparent; 
            background-color: #e2e8f0; 
            color: #475569; 
            text-decoration: none; 
            transition: all 0.2s ease;
        }
        .category-pill.active { 
            background-color: #1b4327; 
            color: #ffffff; 
        }
        .btn-create { 
            background-color: #1b4327; 
            color: #ffffff; 
            border-radius: 8px; 
            padding: 8px 18px; 
            font-weight: 500; 
            font-size: 0.875rem; 
            text-decoration: none; 
        }
        .btn-create:hover { 
            background-color: #14331e; 
            color: #ffffff; 
        }
        .item-card { 
            background-color: #ffffff; 
            border-radius: 12px; 
            border: 1px solid #f1f5f9; 
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04); 
        }
        /* Style untuk gambar thumbnail */
        .item-thumb { 
            width: 140px; 
            height: 90px; 
            object-fit: cover; 
            border-radius: 8px; 
            flex-shrink: 0;
            border: 1px solid #e2e8f0;
        }
        .item-title { 
            font-size: 1.1rem; 
            font-weight: 600; 
            color: #1b4327; 
        }
        .item-desc { 
            font-size: 0.875rem; 
            color: #64748b; 
            display: -webkit-box; 
            -webkit-line-clamp: 2; 
            -webkit-box-orient: vertical; 
            overflow: hidden; 
        }
        .action-icon { 
            color: #94a3b8; 
            font-size: 1.1rem; 
            padding: 6px; 
            text-decoration: none;
            transition: color 0.2s;
        }
        .action-icon.edit:hover { color: #3b82f6; }
        .action-icon.delete:hover { color: #ef4444; }
    </style>
</head>
<body>

<div class="d-flex min-vh-100">
    <!-- Include Sidebar -->
    <?php include __DIR__ . '/../includes/sidebar.php'; ?>

    <main class="main-content p-4 p-md-5 w-100">
        <div class="top-admin-bar mb-4">Admin CMS Dashboard</div>
        <div class="mb-4">
            <h1 class="page-title mb-1">Manajemen Layanan Antarkota</h1>
            <p class="text-secondary mb-0">Kelola rute, jadwal, dan status operasional armada regional.</p>
        </div>

        <!-- Filter Kategori & Tombol Create -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div class="d-flex gap-2 flex-wrap">
                <?php foreach(['Infrastruktur', 'Bandara', 'Bus & travel', 'Perairan'] as $kat): ?>
                    <a href="index.php?kategori=<?= urlencode($kat) ?>" class="category-pill <?= ($kategori_aktif == $kat) ? 'active' : '' ?>">
                        <?= $kat ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <a href="create.php" class="btn-create"><i class="fa-solid fa-plus me-1"></i> Create New Post</a>
        </div>

        <!-- Daftar Card Data -->
        <div class="d-flex flex-column gap-3">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="item-card p-3">
                        <div class="d-flex align-items-center justify-content-between gap-3">
                            <div class="d-flex align-items-center gap-3 overflow-hidden">
                                <!-- Tag Gambar -->
                                <img src="../../assets/images/uploads/<?= htmlspecialchars($row['gambar']) ?>" 
                                     alt="<?= htmlspecialchars($row['judul']) ?>" 
                                     class="item-thumb" 
                                     onerror="this.onerror=null; this.src='../../assets/images/<?= htmlspecialchars($row['gambar']) ?>';">
                                
                                <div>
                                    <h3 class="item-title mb-1"><?= htmlspecialchars($row['judul']) ?></h3>
                                    <p class="item-desc mb-0"><?= htmlspecialchars($row['deskripsi']) ?></p>
                                </div>
                            </div>

                            <!-- Tombol Aksi Edit & Hapus -->
                            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                <a href="edit.php?id=<?= $row['id'] ?>" class="action-icon edit" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="action-icon delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa-regular fa-trash-can"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-light text-center border py-4">Belum ada data untuk kategori ini.</div>
            <?php endif; ?>
        </div>
    </main>
</div>

</body>
</html>
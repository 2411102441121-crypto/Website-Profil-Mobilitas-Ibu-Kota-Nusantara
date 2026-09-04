<?php
session_start();
include '../koneksi.php';

// Ambil data FAQ dari database
$query = "SELECT * FROM faq ORDER BY id ASC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Profil Mobilitas - OIKN</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        .main-content { flex: 1; min-height: 100vh; background-color: #f8fafc; }
        
        .btn-oikn { background-color: #073b29; color: #ffffff; font-weight: 600; font-size: 0.85rem; border-radius: 6px; border: none; padding: 10px 18px; text-decoration: none; }
        .btn-oikn:hover { background-color: #052b1e; color: #ffffff; }

        .faq-item { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; margin-bottom: 12px; overflow: hidden; }
        .faq-header { padding: 16px 20px; display: flex; align-items: center; justify-content: space-between; }
        .faq-title { font-size: 0.95rem; font-weight: 700; color: #0f172a; margin: 0; }
        
        .btn-action-icon { background: none; border: none; color: #94a3b8; padding: 4px 8px; font-size: 0.9rem; transition: color 0.2s; text-decoration: none; }
        .btn-action-icon:hover { color: #475569; }
        .btn-action-delete:hover { color: #ef4444; }
        
        .accordion-button-custom { background: none; border: none; color: #64748b; padding: 4px 8px; cursor: pointer; }
        .accordion-button-custom:after { content: '\f107'; font-family: 'Font Awesome 6 Free'; font-weight: 900; transition: transform 0.2s; display: inline-block; }
        .accordion-button-custom:not(.collapsed):after { transform: rotate(180deg); }
    </style>
</head>
<body>

<div class="d-flex">
    <?php include '../includes/sidebar.php'; ?>

    <div class="main-content p-4 p-md-5">
        
        <!-- Header -->
        <div class="mb-5" style="max-width: 900px;">
            <span class="text-secondary small fw-medium">Admin CMS Dashboard</span>
            <h2 class="fw-bold text-dark mt-1 mb-2" style="font-size: 1.8rem;">Manajemen Profil Mobilitas</h2>
            <p class="text-muted small leading-relaxed">
                Kelola visi dan strategi utama "10-Minute City". Bagian ini mengontrol konten publik yang mendeskripsikan integrasi infrastruktur cerdas dan ekosistem transportasi berkelanjutan di Ibu Kota Nusantara.
            </p>
        </div>

        <!-- FAQ Title & Add Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold text-dark m-0" style="font-size: 1.3rem;">Manajemen FAQ</h4>
            <a href="tambah.php" class="btn btn-oikn d-flex align-items-center gap-2">
                <i class="fa-regular fa-square-plus"></i>
                <span>TAMBAH FAQ</span>
            </a>
        </div>

        <!-- Alert Notification -->
        <?php if(isset($_GET['pesan'])): ?>
            <div class="alert alert-success alert-dismissible fade show p-2 small mb-3" role="alert">
                Data FAQ berhasil <?= htmlspecialchars($_GET['pesan']); ?>!
                <button type="button" class="btn-close p-2" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- List Accordion FAQ -->
        <div class="accordion" id="faqAccordion">
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="faq-item shadow-sm">
                    <div class="faq-header">
                        <h6 class="faq-title"><?= htmlspecialchars($row['pertanyaan']); ?></h6>
                        <div class="d-flex align-items-center gap-2">
                            <!-- Toggle Jawaban -->
                            <button class="accordion-button-custom collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $row['id']; ?>"></button>
                            <!-- Tombol Edit -->
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn-action-icon" title="Edit FAQ"><i class="fa-solid fa-pen"></i></a>
                            <!-- Tombol Hapus -->
                            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?');" class="btn-action-icon btn-action-delete" title="Hapus FAQ"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                    <!-- Body Collapse Jawaban -->
                    <div id="collapse<?= $row['id']; ?>" class="collapse" data-bs-parent="#faqAccordion">
                        <div class="px-4 pb-4 text-secondary small border-top pt-3 bg-light">
                            <?= nl2br(htmlspecialchars($row['jawaban'])); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="p-4 bg-white rounded border text-center text-muted small">Belum ada data FAQ. Silakan tambah data baru.</div>
            <?php endif; ?>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
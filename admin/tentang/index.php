<?php
require_once __DIR__ . '/../koneksi.php';

// Tentukan Tab Aktif ('glosarium' atau 'struktur')
$tab_aktif = $_GET['tab'] ?? 'glosarium';

// --- HANDLER PROSES CRUD STRUKTUR ORGANISASI ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_struktur'])) {
    $action = $_POST['action_struktur'];
    
    if ($action === 'create' || $action === 'update') {
        $posisi = $_POST['posisi'];
        $nama_pejabat = $_POST['nama_pejabat'];
        $tentang = $_POST['tentang'];
        $tugas = $_POST['tugas'];
        
        if ($action === 'create') {
            $stmt = mysqli_prepare($koneksi, "INSERT INTO struktur_organisasi (posisi, nama_pejabat, tentang, tugas) VALUES (?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssss", $posisi, $nama_pejabat, $tentang, $tugas);
        } else {
            $id = $_POST['id'];
            $stmt = mysqli_prepare($koneksi, "UPDATE struktur_organisasi SET posisi=?, nama_pejabat=?, tentang=?, tugas=? WHERE id=?");
            mysqli_stmt_bind_param($stmt, "ssssi", $posisi, $nama_pejabat, $tentang, $tugas, $id);
        }
        mysqli_stmt_execute($stmt);
        header("Location: ?tab=struktur");
        exit;
    }

    if ($action === 'delete') {
        $id = $_POST['id'];
        $stmt = mysqli_prepare($koneksi, "DELETE FROM struktur_organisasi WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        header("Location: ?tab=struktur");
        exit;
    }
}

// Fetch Data Glosarium
$query_glosarium = "SELECT * FROM glosarium ORDER BY id DESC";
$result_glosarium = mysqli_query($koneksi, $query_glosarium);

// Fetch Data Struktur Organisasi
$query_struktur = "SELECT * FROM struktur_organisasi ORDER BY id ASC";
$result_struktur = mysqli_query($koneksi, $query_struktur);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CMS Dashboard - Tentang Management</title>
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
        .badge-status { font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; display: inline-block; }
        .badge-aktif { background-color: #d1fae5; color: #065f46; }
        .badge-nonaktif { background-color: #fee2e2; color: #991b1b; }
        .btn-green { background-color: #1b4327; color: #ffffff; border-radius: 8px; padding: 8px 16px; font-size: 14px; border: none; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; }
        .btn-green:hover { background-color: #14331d; color: #ffffff; }
        .action-btns a, .action-btns button { color: #9ca3af; margin-right: 8px; font-size: 16px; border: none; background: none; padding: 0; }
        .action-btns a:hover, .action-btns button:hover { color: #1b4327; }

        /* Custom Filter Tabs */
        .nav-tab-custom { display: flex; gap: 8px; border-bottom: 1px solid #e5e7eb; padding-bottom: 12px; }
        .tab-btn { border-radius: 50px; padding: 6px 18px; font-weight: 500; font-size: 14px; text-decoration: none; transition: all 0.2s; }
        .tab-btn-active { background-color: #1e293b; color: #ffffff !important; }
        .tab-btn-inactive { background-color: transparent; border: 1px solid #cbd5e1; color: #64748b; }
        .tab-btn-inactive:hover { background-color: #e2e8f0; }
    </style>
</head>
<body>

<div class="main-wrapper">
    <?php include '../includes/sidebar.php'; ?>

    <div class="content-wrapper">
        <header class="top-header">Admin CMS Dashboard</header>

        <main class="main-content">
            <!-- Header Halaman -->
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h2 class="fw-bold mb-1" style="color: #111827;">Aktivitas Content Management</h2>
                    <p class="text-muted m-0" style="font-size: 14px;">Kelola glosarium dan profil struktur organisasi IKN.</p>
                </div>
                <div>
                    <?php if ($tab_aktif === 'glosarium'): ?>
                        <a href="tambah.php" class="btn btn-green">
                            <i class="fa-solid fa-plus"></i>
                            <span>Tambah Istilah</span>
                        </a>
                    <?php else: ?>
                        <button class="btn btn-green" onclick="resetFormStruktur()" data-bs-toggle="modal" data-bs-target="#modalStruktur">
                            <i class="fa-solid fa-plus"></i>
                            <span>Tambah Struktur</span>
                        </button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Tab Filter Sub-Halaman -->
            <div class="nav-tab-custom mb-4">
                <a href="?tab=glosarium" class="tab-btn <?= $tab_aktif === 'glosarium' ? 'tab-btn-active' : 'tab-btn-inactive'; ?>">Glosarium</a>
                <a href="?tab=struktur" class="tab-btn <?= $tab_aktif === 'struktur' ? 'tab-btn-active' : 'tab-btn-inactive'; ?>">Struktur Organisasi</a>
            </div>

            <!-- TAB 1: KONTEN GLOSARIUM -->
            <?php if ($tab_aktif === 'glosarium'): ?>
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
                                <?php if (mysqli_num_rows($result_glosarium) > 0): ?>
                                    <?php while ($row = mysqli_fetch_assoc($result_glosarium)): ?>
                                    <tr>
                                        <td>
                                            <span class="fw-bold text-dark"><?= htmlspecialchars($row['istilah']) ?></span>
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
            <?php endif; ?>

            <!-- TAB 2: KONTEN STRUKTUR ORGANISASI -->
            <?php if ($tab_aktif === 'struktur'): ?>
                <div class="card-custom">
                    <div class="table-responsive">
                        <table class="table table-glosarium m-0">
                            <thead>
                                <tr>
                                    <th style="width: 25%;">POSISI STRUKTUR</th>
                                    <th style="width: 25%;">NAMA PEJABAT & GELAR</th>
                                    <th style="width: 40%;">TENTANG (DESKRIPSI)</th>
                                    <th style="width: 10%;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($result_struktur) > 0): ?>
                                    <?php while ($row = mysqli_fetch_assoc($result_struktur)): ?>
                                    <tr>
                                        <td>
                                            <span class="fw-bold text-dark"><?= htmlspecialchars($row['posisi']) ?></span>
                                        </td>
                                        <td><span class="text-dark font-medium"><?= htmlspecialchars($row['nama_pejabat']) ?></span></td>
                                        <td><span class="text-secondary d-inline-block text-truncate" style="max-width: 350px;"><?= htmlspecialchars($row['tentang']) ?></span></td>
                                        <td>
                                            <div class="action-btns d-flex align-items-center">
                                                <button type="button" onclick='editStruktur(<?= json_encode($row); ?>)' title="Edit">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </button>
                                                <form action="" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pejabat/posisi ini?')">
                                                    <input type="hidden" name="action_struktur" value="delete">
                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                    <button type="submit" title="Hapus" style="color: #ef4444;"><i class="fa-regular fa-trash-can"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">Belum ada data struktur organisasi.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>

        </main>
    </div>
</div>

<!-- MODAL FORM CRUD STRUKTUR ORGANISASI -->
<div class="modal fade" id="modalStruktur" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold" id="modalStrukturLabel">Tambah Anggota Struktur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body space-y-3">
                    <input type="hidden" name="action_struktur" id="form_action" value="create">
                    <input type="hidden" name="id" id="struktur_id">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Posisi / Node Struktur</label>
                        <select name="posisi" id="posisi" class="form-select" required>
                            <option value="Deputi bidang Transformasi Hijau dan Digital">Deputi bidang Transformasi Hijau dan Digital</option>
                            <option value="Direktur Pengembangan Ekosistem Digital">Direktur Pengembangan Ekosistem Digital</option>
                            <option value="Direktur Transformasi Hijau">Direktur Transformasi Hijau</option>
                            <option value="Direktur Data dan Kecerdasan buatan">Direktur Data dan Kecerdasan buatan</option>
                            <option value="Koordinator Tim">Koordinator Tim</option>
                            <option value="Anggota Tim">Anggota Tim</option>
                            <option value="Tata Kelola Pendukung (Umum) & Kerja Sama">Tata Kelola Pendukung (Umum) & Kerja Sama</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Pejabat & Gelar</label>
                        <input type="text" name="nama_pejabat" id="nama_pejabat" class="form-control" placeholder="Contoh: Dr. Agung Indrajit, S.T., M.Sc." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tentang (Deskripsi Peran)</label>
                        <textarea name="tentang" id="tentang" class="form-control" rows="3" placeholder="Memimpin pelaksanaan transformasi..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Daftar Tugas (Satu Poin Per Baris)</label>
                        <textarea name="tugas" id="tugas" class="form-control" rows="4" placeholder="Koordinasi pelaksanaan...&#10;Perumusan dan pelaksanaan..." required></textarea>
                        <small class="text-muted">Gunakan tombol <strong>Enter</strong> untuk membuat poin tugas baru.</small>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-green px-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function resetFormStruktur() {
    document.getElementById('form_action').value = 'create';
    document.getElementById('struktur_id').value = '';
    document.getElementById('nama_pejabat').value = '';
    document.getElementById('tentang').value = '';
    document.getElementById('tugas').value = '';
    document.getElementById('modalStrukturLabel').innerText = 'Tambah Anggota Struktur';
}

function editStruktur(data) {
    document.getElementById('form_action').value = 'update';
    document.getElementById('struktur_id').value = data.id;
    document.getElementById('posisi').value = data.posisi;
    document.getElementById('nama_pejabat').value = data.nama_pejabat;
    document.getElementById('tentang').value = data.tentang;
    document.getElementById('tugas').value = data.tugas;
    document.getElementById('modalStrukturLabel').innerText = 'Edit Profil Pejabat';
    
    var modal = new bootstrap.Modal(document.getElementById('modalStruktur'));
    modal.show();
}
</script>
</body>
</html>
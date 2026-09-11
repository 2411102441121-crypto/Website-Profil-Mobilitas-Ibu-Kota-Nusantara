<?php
require_once '../koneksi.php';

$tab = $_GET['tab'] ?? 'layanan';
$jenis_jadwal = $_GET['jenis_jadwal'] ?? 'reguler';
$success = $_GET['success'] ?? '';
$error = '';

if (!in_array($tab, ['informasi','jam','layanan'], true)) $tab = 'layanan';
if (!in_array($jenis_jadwal, ['reguler','kondisional'], true)) $jenis_jadwal = 'reguler';

function e($v){ return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8'); }
function jam($v){ return $v ? substr($v, 0, 5) : ''; }

function redirect_ok($msg, $jenis='reguler'){
    header("Location:index.php?tab=jam&jenis_jadwal=$jenis&success=$msg");
    exit;
}

/* =========================================================
   TAMBAH JADWAL REGULER
========================================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_reguler'])) {
    $layanan_id = (int)($_POST['layanan_id'] ?? 0);
    $bm = $_POST['hari_biasa_mulai'] ?? '05:30';
    $bs = $_POST['hari_biasa_selesai'] ?? '21:00';
    $am = $_POST['akhir_pekan_mulai'] ?? '05:30';
    $as = $_POST['akhir_pekan_selesai'] ?? '21:00';

    if ($layanan_id <= 0) {
        $error = 'Pilih layanan terlebih dahulu.';
    } else {
        $cek = mysqli_query($koneksi,
            "SELECT id FROM jam_operasional WHERE layanan_id=$layanan_id LIMIT 1"
        );

        if (mysqli_num_rows($cek) > 0) {
            $error = 'Layanan tersebut sudah memiliki jadwal reguler.';
        } else {
            $sql = "INSERT INTO jam_operasional
                    (layanan_id,hari_biasa_mulai,hari_biasa_selesai,akhir_pekan_mulai,akhir_pekan_selesai)
                    VALUES
                    ($layanan_id,'$bm','$bs','$am','$as')";

            if (mysqli_query($koneksi, $sql)) {
                redirect_ok('tambah_reguler', 'reguler');
            }

            $error = mysqli_error($koneksi);
        }
    }
}

/* =========================================================
   EDIT JADWAL REGULER
========================================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_reguler'])) {
    $id = (int)($_POST['jam_id'] ?? 0);
    $layanan_id = (int)($_POST['layanan_id'] ?? 0);
    $bm = $_POST['hari_biasa_mulai'] ?? '05:30';
    $bs = $_POST['hari_biasa_selesai'] ?? '21:00';
    $am = $_POST['akhir_pekan_mulai'] ?? '05:30';
    $as = $_POST['akhir_pekan_selesai'] ?? '21:00';

    if ($id <= 0 || $layanan_id <= 0) {
        $error = 'Data layanan tidak valid.';
    } else {
        $cek = mysqli_query($koneksi,
            "SELECT id FROM jam_operasional
             WHERE layanan_id=$layanan_id AND id<>$id LIMIT 1"
        );

        if (mysqli_num_rows($cek) > 0) {
            $error = 'Layanan tersebut sudah memiliki jadwal reguler.';
        } else {
            $sql = "UPDATE jam_operasional SET
                    layanan_id=$layanan_id,
                    hari_biasa_mulai='$bm',
                    hari_biasa_selesai='$bs',
                    akhir_pekan_mulai='$am',
                    akhir_pekan_selesai='$as'
                    WHERE id=$id";

            if (mysqli_query($koneksi, $sql)) {
                redirect_ok('edit_reguler', 'reguler');
            }

            $error = mysqli_error($koneksi);
        }
    }
}

/* =========================================================
   HAPUS JADWAL REGULER
========================================================= */

if (isset($_GET['hapus_reguler'])) {
    $id = (int)$_GET['hapus_reguler'];
    mysqli_query($koneksi, "DELETE FROM jam_operasional WHERE id=$id");
    redirect_ok('hapus_reguler', 'reguler');
}

/* =========================================================
   TAMBAH JADWAL KONDISIONAL
========================================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_kondisional'])) {
    $layanan_id = (int)($_POST['layanan_id'] ?? 0);
    $jenis = mysqli_real_escape_string($koneksi, trim($_POST['jenis'] ?? 'Kondisional'));
    $ket = mysqli_real_escape_string($koneksi, trim($_POST['keterangan'] ?? ''));

    $mulai = $_POST['waktu_mulai'] ?? '';
    $selesai = $_POST['waktu_selesai'] ?? '';

    $mulai_sql = $mulai ? "'" . mysqli_real_escape_string($koneksi, $mulai) . "'" : "NULL";
    $selesai_sql = $selesai ? "'" . mysqli_real_escape_string($koneksi, $selesai) . "'" : "NULL";

    if ($layanan_id <= 0) {
        $error = 'Pilih layanan terlebih dahulu.';
    } else {
        $cek = mysqli_query($koneksi,
            "SELECT id FROM jam_kondisional WHERE layanan_id=$layanan_id LIMIT 1"
        );

        if (mysqli_num_rows($cek) > 0) {
            $error = 'Layanan tersebut sudah memiliki jadwal kondisional.';
        } else {
            $sql = "INSERT INTO jam_kondisional
                    (layanan_id,jenis,waktu_mulai,waktu_selesai,keterangan)
                    VALUES
                    ($layanan_id,'$jenis',$mulai_sql,$selesai_sql,'$ket')";

            if (mysqli_query($koneksi, $sql)) {
                redirect_ok('tambah_kondisional', 'kondisional');
            }

            $error = mysqli_error($koneksi);
        }
    }
}

/* =========================================================
   EDIT JADWAL KONDISIONAL
========================================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_kondisional'])) {
    $id = (int)($_POST['jam_id'] ?? 0);
    $layanan_id = (int)($_POST['layanan_id'] ?? 0);
    $jenis = mysqli_real_escape_string($koneksi, trim($_POST['jenis'] ?? 'Kondisional'));
    $ket = mysqli_real_escape_string($koneksi, trim($_POST['keterangan'] ?? ''));

    $mulai = $_POST['waktu_mulai'] ?? '';
    $selesai = $_POST['waktu_selesai'] ?? '';

    $mulai_sql = $mulai ? "'" . mysqli_real_escape_string($koneksi, $mulai) . "'" : "NULL";
    $selesai_sql = $selesai ? "'" . mysqli_real_escape_string($koneksi, $selesai) . "'" : "NULL";

    if ($id <= 0 || $layanan_id <= 0) {
        $error = 'Data layanan tidak valid.';
    } else {
        $cek = mysqli_query($koneksi,
            "SELECT id FROM jam_kondisional
             WHERE layanan_id=$layanan_id AND id<>$id LIMIT 1"
        );

        if (mysqli_num_rows($cek) > 0) {
            $error = 'Layanan tersebut sudah memiliki jadwal kondisional.';
        } else {
            $sql = "UPDATE jam_kondisional SET
                    layanan_id=$layanan_id,
                    jenis='$jenis',
                    waktu_mulai=$mulai_sql,
                    waktu_selesai=$selesai_sql,
                    keterangan='$ket'
                    WHERE id=$id";

            if (mysqli_query($koneksi, $sql)) {
                redirect_ok('edit_kondisional', 'kondisional');
            }

            $error = mysqli_error($koneksi);
        }
    }
}

/* =========================================================
   HAPUS JADWAL KONDISIONAL
========================================================= */

if (isset($_GET['hapus_kondisional'])) {
    $id = (int)$_GET['hapus_kondisional'];
    mysqli_query($koneksi, "DELETE FROM jam_kondisional WHERE id=$id");
    redirect_ok('hapus_kondisional', 'kondisional');
}

/* =========================================================
   INFORMASI PETA
========================================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan_informasi'])) {
    $status = mysqli_real_escape_string($koneksi, $_POST['status'] ?? 'aktif');

    $old = null;
    $qold = mysqli_query($koneksi, "SELECT * FROM informasi_peta ORDER BY id LIMIT 1");

    if ($qold && mysqli_num_rows($qold)) {
        $old = mysqli_fetch_assoc($qold);
    }

    $gambar = $old['gambar'] ?? '';

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['gambar']['error'] !== UPLOAD_ERR_OK) {
            $error = 'Gagal mengupload gambar.';
        } else {
            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, ['jpg','jpeg','png','webp'], true)) {
                $error = 'Format gambar harus JPG, JPEG, PNG, atau WEBP.';
            } elseif ($_FILES['gambar']['size'] > 10 * 1024 * 1024) {
                $error = 'Ukuran gambar maksimal 10 MB.';
            } else {
                $folder = __DIR__ . '/../../uploads/peta/';

                if (!is_dir($folder)) {
                    mkdir($folder, 0777, true);
                }

                $new = 'peta-' . date('YmdHis') . '-' . uniqid() . '.' . $ext;

                if (move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $new)) {
                    if ($old && !empty($old['gambar']) && file_exists($folder . $old['gambar'])) {
                        @unlink($folder . $old['gambar']);
                    }

                    $gambar = $new;
                } else {
                    $error = 'Gambar gagal disimpan.';
                }
            }
        }
    }

    if ($error === '') {
        $gambar_db = mysqli_real_escape_string($koneksi, $gambar);

        if ($old) {
            $id = (int)$old['id'];

            $ok = mysqli_query($koneksi,
                "UPDATE informasi_peta
                 SET gambar='$gambar_db', status='$status'
                 WHERE id=$id"
            );
        } else {
            if ($gambar === '') {
                $error = 'Silakan upload gambar peta terlebih dahulu.';
            } else {
                $judul = mysqli_real_escape_string($koneksi, 'Peta Jaringan Bus Perkotaan');
                $deskripsi = mysqli_real_escape_string(
                    $koneksi,
                    'Sistem transportasi massal terintegrasi Nusantara dirancang untuk mobilitas yang cerdas, efisien, dan ramah lingkungan.'
                );

                $ok = mysqli_query($koneksi,
                    "INSERT INTO informasi_peta
                    (judul,deskripsi,gambar,status)
                    VALUES
                    ('$judul','$deskripsi','$gambar_db','$status')"
                );
            }
        }

        if ($error === '' && !empty($ok)) {
            header('Location:index.php?tab=informasi&success=informasi');
            exit;
        }

        if ($error === '') {
            $error = mysqli_error($koneksi);
        }
    }
}

/* =========================================================
   AMBIL SEMUA LAYANAN
========================================================= */

$layanan = [];

$q = mysqli_query($koneksi, "
    SELECT
        l.*,
        j.id AS jam_id,
        j.hari_biasa_mulai,
        j.hari_biasa_selesai,
        j.akhir_pekan_mulai,
        j.akhir_pekan_selesai
    FROM layanan l
    LEFT JOIN jam_operasional j
        ON l.id = j.layanan_id
    ORDER BY l.urutan ASC, l.id ASC
");

if ($q) {
    while ($row = mysqli_fetch_assoc($q)) {
        $layanan[] = $row;
    }
}

/* =========================================================
   AMBIL KONDISIONAL
========================================================= */

$kondisional = [];

$q = mysqli_query($koneksi, "
    SELECT
        k.*,
        l.kode,
        l.nama_layanan,
        l.warna
    FROM jam_kondisional k
    INNER JOIN layanan l
        ON l.id = k.layanan_id
    WHERE l.status='aktif'
    ORDER BY l.urutan ASC, l.id ASC
");

if ($q) {
    while ($row = mysqli_fetch_assoc($q)) {
        $kondisional[] = $row;
    }
}

/* =========================================================
   INFORMASI PETA
========================================================= */

$info = null;

$q = mysqli_query($koneksi, "SELECT * FROM informasi_peta ORDER BY id LIMIT 1");

if ($q && mysqli_num_rows($q)) {
    $info = mysqli_fetch_assoc($q);
}

/* =========================================================
   WARNA KODE
========================================================= */

function warnaKode($kode){
    $warna = [
        '1e'  => '#5731a6',
        '2'   => '#0869d7',
        '2e'  => '#12b989',
        '3'   => '#f59e0b',
        '3e'  => '#ee174c',
        '4'   => '#59432e',
        '1em' => '#bd6508',
        '2em' => '#f4c20d'
    ];

    $kode = strtolower(trim($kode));

    if (isset($warna[$kode])) {
        return $warna[$kode];
    }

    $warnaBaru = [
        '#64748b',
        '#0f766e',
        '#7c3aed',
        '#dc2626',
        '#0891b2',
        '#9333ea'
    ];

    return $warnaBaru[abs(crc32($kode)) % count($warnaBaru)];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Peta & Rute - CMS IKN</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
*{box-sizing:border-box}
body{margin:0;background:#f5f6f7;color:#25364b;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Arial,sans-serif}
.peta-content{margin-left:260px;min-height:100vh;padding:28px 32px 45px}
.breadcrumb{display:flex;gap:6px;margin-bottom:8px;font-size:12px;color:#98a2b3}
.breadcrumb span{color:#667085}
.page-header{margin-bottom:18px}
.page-title h1{margin:0;color:#172b4d;font-size:28px}
.page-title p{margin:5px 0 0;color:#718096;font-size:13px}

.peta-tabs{display:flex;gap:8px;margin-bottom:18px}
.peta-tab{display:flex;align-items:center;gap:7px;min-height:37px;padding:0 15px;background:#fff;border:1px solid #dfe3e8;border-radius:7px;color:#667085;text-decoration:none;font-size:12px}
.peta-tab.active{background:#124b2b;border-color:#124b2b;color:#fff}

.content-card{width:100%;max-width:1500px;background:#fff;border:1px solid #e5e7eb;border-radius:11px;padding:20px 22px;box-shadow:0 2px 5px rgba(16,24,40,.05)}
.card-header{display:flex;justify-content:space-between;align-items:flex-start;gap:15px;margin-bottom:16px}
.card-title h2{margin:0;font-size:17px}
.card-title p{margin:4px 0 0;color:#98a2b3;font-size:11px}

.btn{display:inline-flex;align-items:center;justify-content:center;gap:7px;height:37px;padding:0 15px;border:0;border-radius:7px;background:#12552f;color:#fff;text-decoration:none;font-size:12px;font-weight:600;cursor:pointer}
.btn:hover{background:#0e4325}

.alert{margin-bottom:15px;padding:10px 13px;border-radius:7px;font-size:12px}
.ok{background:#ecfdf3;border:1px solid #abefc6;color:#067647}
.err{background:#fef3f2;border:1px solid #fecdca;color:#b42318}

.switch{display:flex;background:#f2f4f7;padding:3px;border-radius:7px;gap:3px}
.switch a{padding:8px 15px;border-radius:5px;text-decoration:none;color:#667085;font-size:12px;font-weight:600}
.switch a.active{background:#fff;color:#25364b;box-shadow:0 1px 3px rgba(0,0,0,.08)}

.table-wrap{width:100%;overflow-x:auto}
table{width:100%;min-width:850px;border-collapse:separate;border-spacing:0 4px}
th{padding:0 8px 6px;color:#98a2b3;font-size:9px;text-align:left}
td{padding:0 5px;vertical-align:middle}

.kode{width:46px;height:44px;display:flex;align-items:center;justify-content:center;border-radius:8px;color:#fff;font-size:12px;font-weight:700}
.kode-name{display:flex;align-items:center;gap:9px}
.service-name{font-size:12px;font-weight:600}

.data-box{height:46px;display:flex;align-items:center;padding:0 13px;border:1px solid #e1e5ea;border-radius:8px;background:#fff;color:#475467;font-size:13px;white-space:nowrap}
.actions{display:flex;gap:5px}
.action{width:28px;height:28px;display:flex;align-items:center;justify-content:center;background:transparent;border:0;text-decoration:none;cursor:pointer}
.edit{color:#98a2b3}.delete{color:#ff6262}

.jadwal{display:flex;align-items:center;gap:6px}
.jadwal .data-box{min-width:65px;justify-content:center;height:35px;padding:0 8px;font-size:11px}

.form-group{display:flex;flex-direction:column;gap:7px}
.label{font-size:14px;font-weight:600}
.input,.select,.textarea{width:100%;border:1px solid #d0d5dd;border-radius:8px;background:#fff;color:#344054;font:inherit;font-size:14px;outline:0}
.input,.select{height:48px;padding:0 13px}
.textarea{min-height:130px;padding:13px;resize:vertical}
.upload{border:1px dashed #cbd5e1;border-radius:9px;padding:16px;background:#fafafa}
.preview{margin-top:12px;border:1px solid #e5e7eb;border-radius:8px;padding:8px}
.preview img{width:100%;max-height:450px;object-fit:contain;display:block}

.modal{display:none;position:fixed;inset:0;background:rgba(16,24,40,.45);z-index:10000;align-items:center;justify-content:center;padding:20px}
.modal.show{display:flex}
.modal-box{width:100%;max-width:500px;background:#fff;border-radius:11px;padding:22px}
.modal-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
.modal-head h3{margin:0;font-size:17px}
.close{border:0;background:transparent;font-size:19px;color:#98a2b3;cursor:pointer}
.modal-row{display:grid;grid-template-columns:1fr 1fr;gap:13px;margin-bottom:13px}
.modal-group{display:flex;flex-direction:column;gap:6px}
.modal-group label{font-size:11px;font-weight:600}
.modal-input,.modal-select{width:100%;height:38px;padding:0 9px;border:1px solid #d0d5dd;border-radius:7px;font-size:12px;background:#fff}
.modal-footer{display:flex;justify-content:flex-end;gap:8px;margin-top:18px;padding-top:15px;border-top:1px solid #eaecf0}
.cancel{height:37px;padding:0 15px;border:1px solid #d0d5dd;border-radius:7px;background:#fff;color:#475467;font-size:12px;font-weight:600;cursor:pointer}

@media(max-width:700px){
    .peta-content{padding:20px 14px 35px;margin-left:0}
    .card-header{flex-direction:column}
    .modal-row{grid-template-columns:1fr}
}
</style>
</head>

<body>

<?php include '../includes/sidebar.php'; ?>

<main class="peta-content">

<div class="breadcrumb">
    <span>Peta & Rute</span>
    <span>›</span>
    <span><?=e(ucwords(str_replace('_',' ',$tab)))?></span>
</div>

<div class="page-header">
    <div class="page-title">
        <h1>Peta & Rute</h1>
        <p>Kelola layanan, rute, dan informasi transportasi yang ditampilkan pada peta.</p>
    </div>
</div>

<?php if($success): ?>
<div class="alert ok">
    <i class="fa-solid fa-circle-check"></i>
    Data berhasil disimpan.
</div>
<?php endif; ?>

<?php if($error): ?>
<div class="alert err">
    <i class="fa-solid fa-circle-exclamation"></i>
    <?=e($error)?>
</div>
<?php endif; ?>

<div class="peta-tabs">

<a href="index.php?tab=informasi" class="peta-tab <?=$tab==='informasi'?'active':''?>">
    <i class="fa-solid fa-circle-info"></i>
    Informasi Umum
</a>

<a href="index.php?tab=jam" class="peta-tab <?=$tab==='jam'?'active':''?>">
    <i class="fa-regular fa-clock"></i>
    Jam Operasional
</a>

<a href="index.php?tab=layanan" class="peta-tab <?=$tab==='layanan'?'active':''?>">
    <i class="fa-solid fa-list"></i>
    Layanan
</a>

</div>


<?php if($tab==='layanan'): ?>

<section class="content-card">

<div class="card-header">

<div class="card-title">
    <h2>Daftar Layanan</h2>
    <p>Kelola nama layanan, deskripsi rute, dan urutan tampil.</p>
</div>

<a href="tambah.php" class="btn">
    <i class="fa-solid fa-plus"></i>
    Tambah Layanan
</a>

</div>

<div class="table-wrap">

<table>

<thead>
<tr>
    <th>KODE</th>
    <th>NAMA LAYANAN</th>
    <th>DESKRIPSI RUTE</th>
    <th>URUTAN</th>
    <th>AKSI</th>
</tr>
</thead>

<tbody>

<?php foreach($layanan as $r): ?>

<tr>

<td>
    <div class="kode" style="background:<?=e($r['warna'] ?? '#64748B')?>">
    <?=e($r['kode'])?>
    </div>
</td>

<td>
    <div class="data-box">
        <?=e($r['nama_layanan'])?>
    </div>
</td>

<td>
    <div class="data-box" style="min-width:400px">
        <?=e($r['deskripsi'])?>
    </div>
</td>

<td>
    <div class="data-box">
        <?=e($r['urutan'])?>
    </div>
</td>

<td>

<div class="actions">

<a class="action edit" href="edit.php?id=<?=$r['id']?>" title="Edit">
    <i class="fa-solid fa-pen"></i>
</a>

<a class="action delete"
   href="hapus.php?id=<?=$r['id']?>"
   onclick="return confirm('Yakin ingin menghapus layanan ini?')"
   title="Hapus">
    <i class="fa-solid fa-trash"></i>
</a>

</div>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</section>

<?php endif; ?>


<?php if($tab==='jam'): ?>

<section class="content-card">

<div class="card-header">

<div class="card-title">
    <h2>Jam Operasional</h2>
    <p>Kelola jadwal reguler dan kondisional.</p>
</div>

<div class="switch">

<a href="index.php?tab=jam&jenis_jadwal=reguler"
   class="<?=$jenis_jadwal==='reguler'?'active':''?>">
    Reguler
</a>

<a href="index.php?tab=jam&jenis_jadwal=kondisional"
   class="<?=$jenis_jadwal==='kondisional'?'active':''?>">
    Kondisional
</a>

</div>

</div>


<?php if($jenis_jadwal==='reguler'): ?>

<div class="card-header">

<div class="card-title">
    <h2 style="font-size:15px">Jadwal Reguler</h2>
    <p>Jam hari biasa dan akhir pekan.</p>
</div>

<button class="btn" onclick="openAddReguler()">
    <i class="fa-solid fa-plus"></i>
    Tambah Jadwal
</button>

</div>

<div class="table-wrap">

<table>

<thead>
<tr>
    <th>LAYANAN</th>
    <th>JADWAL</th>
    <th>AKSI</th>
</tr>
</thead>

<tbody>

<?php foreach($layanan as $r): ?>

<tr>

<td>

<div class="kode-name">

<div class="kode" style="background:<?=e($r['warna'] ?? '#64748B')?>">
    <?=e($r['kode'])?>
</div>

<div class="service-name">
    <?=e($r['nama_layanan'])?>
</div>

</div>

</td>

<td>

<?php if($r['jam_id']): ?>

<div class="jadwal">

<div class="data-box">
    <?=jam($r['hari_biasa_mulai'])?>
</div>

<span>—</span>

<div class="data-box">
    <?=jam($r['hari_biasa_selesai'])?>
</div>

<span style="color:#98a2b3;font-size:10px">Biasa</span>

<div class="data-box">
    <?=jam($r['akhir_pekan_mulai'])?>
</div>

<span>—</span>

<div class="data-box">
    <?=jam($r['akhir_pekan_selesai'])?>
</div>

<span style="color:#98a2b3;font-size:10px">Weekend</span>

</div>

<?php else: ?>

<span style="color:#98a2b3;font-size:11px">
    Belum diatur
</span>

<?php endif; ?>

</td>

<td>

<div class="actions">

<?php if($r['jam_id']): ?>

<button class="action edit"
onclick='openEditReguler(
<?=json_encode((int)$r["jam_id"])?>,
<?=json_encode((int)$r["id"])?>,
<?=json_encode($r["nama_layanan"])?>,
<?=json_encode(jam($r["hari_biasa_mulai"]))?>,
<?=json_encode(jam($r["hari_biasa_selesai"]))?>,
<?=json_encode(jam($r["akhir_pekan_mulai"]))?>,
<?=json_encode(jam($r["akhir_pekan_selesai"]))?>
)'>

<i class="fa-solid fa-pen"></i>

</button>

<a class="action delete"
href="index.php?tab=jam&jenis_jadwal=reguler&hapus_reguler=<?=$r['jam_id']?>"
onclick="return confirm('Hapus jadwal reguler ini?')">

<i class="fa-solid fa-trash"></i>

</a>

<?php else: ?>

<button class="action edit"
onclick="openAddReguler(<?=$r['id']?>)">

<i class="fa-solid fa-plus"></i>

</button>

<?php endif; ?>

</div>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>


<?php else: ?>

<div class="card-header">

<div class="card-title">
    <h2 style="font-size:15px">Jadwal Kondisional</h2>
    <p>Jadwal khusus atau sesuai kebutuhan.</p>
</div>

<button class="btn" onclick="openAddKondisional()">
    <i class="fa-solid fa-plus"></i>
    Tambah Jadwal
</button>

</div>

<div class="table-wrap">

<table>

<thead>
<tr>
    <th>LAYANAN</th>
    <th>KONDISI / WAKTU</th>
    <th>AKSI</th>
</tr>
</thead>

<tbody>

<?php foreach($kondisional as $r): ?>

<?php
$nilai = $r['keterangan'];

if (!$nilai && $r['waktu_mulai'] && $r['waktu_selesai']) {
    $nilai = jam($r['waktu_mulai']).' - '.jam($r['waktu_selesai']);
}

if (!$nilai) $nilai = 'Sesuai Kebutuhan';
?>

<tr>

<td>

<div class="kode-name">

<div class="kode" style="background:<?=e($r['warna'] ?? '#64748B')?>">
    <?=e($r['kode'])?>
</div>

<div class="service-name">
    <?=e($r['nama_layanan'])?>
</div>

</div>

</td>

<td>

<div style="display:flex;gap:30px;align-items:center">

<span style="font-size:11px;color:#667085">
    <?=e($r['jenis'])?>
</span>

<strong style="font-size:12px">
    <?=e($nilai)?>
</strong>

</div>

</td>

<td>

<div class="actions">

<button class="action edit"
onclick='openEditKondisional(
<?=json_encode((int)$r["id"])?>,
<?=json_encode((int)$r["layanan_id"])?>,
<?=json_encode($r["nama_layanan"])?>,
<?=json_encode($r["jenis"])?>,
<?=json_encode(jam($r["waktu_mulai"]))?>,
<?=json_encode(jam($r["waktu_selesai"]))?>,
<?=json_encode($r["keterangan"])?>
)'>

<i class="fa-solid fa-pen"></i>

</button>

<a class="action delete"
href="index.php?tab=jam&jenis_jadwal=kondisional&hapus_kondisional=<?=$r['id']?>"
onclick="return confirm('Hapus jadwal kondisional ini?')">

<i class="fa-solid fa-trash"></i>

</a>

</div>

</td>

</tr>

<?php endforeach; ?>

<?php if(!$kondisional): ?>

<tr>
<td colspan="3" style="padding:30px;text-align:center;color:#98a2b3">
    Belum ada jadwal kondisional.
</td>
</tr>

<?php endif; ?>

</tbody>

</table>

</div>

<?php endif; ?>

</section>


<!-- MODAL REGULER -->

<div class="modal" id="modalReguler">

<div class="modal-box">

<div class="modal-head">

<h3 id="regTitle">Tambah Jadwal Reguler</h3>

<button class="close" onclick="closeModal('modalReguler')">
    <i class="fa-solid fa-xmark"></i>
</button>

</div>

<form method="POST">

<input type="hidden" name="jam_id" id="regId">

<div class="modal-group" style="margin-bottom:13px">

<label>Layanan</label>

<select class="modal-select" name="layanan_id" id="regLayanan" required>

<option value="">Pilih layanan</option>

<?php foreach($layanan as $r): ?>

<option value="<?=$r['id']?>">
    <?=e($r['kode'])?> - <?=e($r['nama_layanan'])?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="modal-row">

<div class="modal-group">
<label>Hari Biasa Mulai</label>
<input class="modal-input" type="time" name="hari_biasa_mulai" id="regBM" value="05:30" required>
</div>

<div class="modal-group">
<label>Hari Biasa Selesai</label>
<input class="modal-input" type="time" name="hari_biasa_selesai" id="regBS" value="21:00" required>
</div>

</div>

<div class="modal-row">

<div class="modal-group">
<label>Akhir Pekan Mulai</label>
<input class="modal-input" type="time" name="akhir_pekan_mulai" id="regAM" value="05:30" required>
</div>

<div class="modal-group">
<label>Akhir Pekan Selesai</label>
<input class="modal-input" type="time" name="akhir_pekan_selesai" id="regAS" value="21:00" required>
</div>

</div>

<div class="modal-footer">

<button type="button" class="cancel" onclick="closeModal('modalReguler')">
    Batal
</button>

<button class="btn" name="tambah_reguler" id="regSubmit">
    Simpan
</button>

</div>

</form>

</div>

</div>


<!-- MODAL KONDISIONAL -->

<div class="modal" id="modalKondisional">

<div class="modal-box">

<div class="modal-head">

<h3 id="konTitle">Tambah Jadwal Kondisional</h3>

<button class="close" onclick="closeModal('modalKondisional')">
    <i class="fa-solid fa-xmark"></i>
</button>

</div>

<form method="POST">

<input type="hidden" name="jam_id" id="konId">

<div class="modal-group" style="margin-bottom:13px">

<label>Layanan</label>

<select class="modal-select" name="layanan_id" id="konLayanan">

<option value="">Pilih layanan</option>

<?php foreach($layanan as $r): ?>

<option value="<?=$r['id']?>">
    <?=e($r['kode'])?> - <?=e($r['nama_layanan'])?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="modal-group" style="margin-bottom:13px">

<label>Jenis</label>

<input class="modal-input" name="jenis" id="konJenis" value="Kondisional">

</div>

<div class="modal-row">

<div class="modal-group">
<label>Waktu Mulai</label>
<input class="modal-input" type="time" name="waktu_mulai" id="konMulai">
</div>

<div class="modal-group">
<label>Waktu Selesai</label>
<input class="modal-input" type="time" name="waktu_selesai" id="konSelesai">
</div>

</div>

<div class="modal-group">

<label>Keterangan</label>

<input class="modal-input"
       name="keterangan"
       id="konKet"
       placeholder="Contoh: Sesuai Kebutuhan">

</div>

<div class="modal-footer">

<button type="button" class="cancel" onclick="closeModal('modalKondisional')">
    Batal
</button>

<button class="btn" name="tambah_kondisional" id="konSubmit">
    Simpan
</button>

</div>

</form>

</div>

</div>

<?php endif; ?>


<?php if($tab==='informasi'): ?>

<form method="POST" enctype="multipart/form-data">

<section class="content-card">

<div class="card-title" style="margin-bottom:20px">

<h2>Informasi Umum</h2>

<p>Kelola gambar peta layanan transportasi IKN.</p>

</div>

<div class="form-group">

<label class="label">Gambar Peta</label>

<div class="upload">

<input type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp">

<small style="color:#98a2b3;display:block;margin-top:7px">
    JPG, JPEG, PNG, WEBP maksimal 10 MB.
</small>

<?php if($info && $info['gambar']): ?>

<div class="preview">
<img src="../../uploads/peta/<?=e($info['gambar'])?>" alt="Peta">
</div>

<?php endif; ?>

</div>

</div>

<div style="display:flex;justify-content:flex-end;margin-top:20px">

<button class="btn" name="simpan_informasi">

<i class="fa-solid fa-floppy-disk"></i>
Simpan Informasi

</button>

</div>

</section>

</form>

<?php endif; ?>

</main>


<script>

function closeModal(id){
    document.getElementById(id).classList.remove('show');
}

function openAddReguler(id=''){

    document.getElementById('regTitle').textContent='Tambah Jadwal Reguler';
    document.getElementById('regId').value='';
    document.getElementById('regLayanan').value=id||'';
    document.getElementById('regLayanan').disabled=false;

    document.getElementById('regBM').value='05:30';
    document.getElementById('regBS').value='21:00';
    document.getElementById('regAM').value='05:30';
    document.getElementById('regAS').value='21:00';

    document.getElementById('regSubmit').name='tambah_reguler';

    document.getElementById('modalReguler').classList.add('show');
}

function openEditReguler(id,layananId,nama,bm,bs,am,as){

    document.getElementById('regTitle').textContent='Edit Jadwal Reguler - '+nama;
    document.getElementById('regId').value=id;
    document.getElementById('regLayanan').value=String(layananId);
    document.getElementById('regLayanan').disabled=false;

    document.getElementById('regBM').value=(bm||'05:30').substring(0,5);
    document.getElementById('regBS').value=(bs||'21:00').substring(0,5);
    document.getElementById('regAM').value=(am||'05:30').substring(0,5);
    document.getElementById('regAS').value=(as||'21:00').substring(0,5);

    document.getElementById('regSubmit').name='edit_reguler';

    document.getElementById('modalReguler').classList.add('show');
}

function openAddKondisional(id=''){

    document.getElementById('konTitle').textContent='Tambah Jadwal Kondisional';
    document.getElementById('konId').value='';
    document.getElementById('konLayanan').value=id||'';
    document.getElementById('konLayanan').disabled=false;

    document.getElementById('konJenis').value='Kondisional';
    document.getElementById('konMulai').value='';
    document.getElementById('konSelesai').value='';
    document.getElementById('konKet').value='';

    document.getElementById('konSubmit').name='tambah_kondisional';

    document.getElementById('modalKondisional').classList.add('show');
}

function openEditKondisional(id,layananId,nama,jenis,mulai,selesai,ket){

    document.getElementById('konTitle').textContent='Edit Jadwal Kondisional - '+nama;
    document.getElementById('konId').value=id;
    document.getElementById('konLayanan').value=String(layananId);
    document.getElementById('konLayanan').disabled=false;

    document.getElementById('konJenis').value=jenis;
    document.getElementById('konMulai').value=mulai||'';
    document.getElementById('konSelesai').value=selesai||'';
    document.getElementById('konKet').value=ket||'';

    document.getElementById('konSubmit').name='edit_kondisional';

    document.getElementById('modalKondisional').classList.add('show');
}

window.addEventListener('click',function(e){

    if(e.target.classList.contains('modal')){
        e.target.classList.remove('show');
    }

});

</script>

</body>
</html>
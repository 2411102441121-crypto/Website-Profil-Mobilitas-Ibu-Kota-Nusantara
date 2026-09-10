<?php
require_once '../koneksi.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $kode = strtoupper(trim($_POST['kode'] ?? ''));
    $nama = trim($_POST['nama_layanan'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $urutan = (int)($_POST['urutan'] ?? 0);
    $status = $_POST['status'] ?? 'aktif';
    $warna = $_POST['warna'] ?? '#64748B';

    if ($kode === '' || $nama === '' || $deskripsi === '') {
        $error = 'Semua data wajib diisi.';
    } else {

        $kode = mysqli_real_escape_string($koneksi, $kode);
        $nama = mysqli_real_escape_string($koneksi, $nama);
        $deskripsi = mysqli_real_escape_string($koneksi, $deskripsi);
        $status = mysqli_real_escape_string($koneksi, $status);
        $warna = mysqli_real_escape_string($koneksi, $warna);

        $cek = mysqli_query(
            $koneksi,
            "SELECT id FROM layanan WHERE kode='$kode' LIMIT 1"
        );

        if (mysqli_num_rows($cek) > 0) {

            $error = 'Kode layanan sudah digunakan.';

        } else {

            $query = "
                INSERT INTO layanan
                (kode, warna, nama_layanan, deskripsi, urutan, status)
                VALUES
                ('$kode', '$warna', '$nama', '$deskripsi', '$urutan', '$status')
            ";

            if (mysqli_query($koneksi, $query)) {

                header("Location: index.php?tab=layanan&success=tambah");
                exit;

            } else {

                $error = 'Gagal menyimpan data: ' . mysqli_error($koneksi);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Tambah Layanan - CMS IKN</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>
*{box-sizing:border-box}

body{
    margin:0;
    background:#f5f6f7;
    color:#25364b;
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Arial,sans-serif
}

.main-content{
    margin-left:260px;
    min-height:100vh;
    padding:30px 35px
}

.breadcrumb{
    font-size:12px;
    color:#98a2b3;
    margin-bottom:8px
}

.title h1{
    margin:0;
    color:#172b4d;
    font-size:28px
}

.title p{
    margin:5px 0 20px;
    color:#718096;
    font-size:13px
}

.card{
    width:100%;
    max-width:1000px;
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:11px;
    padding:25px;
    box-shadow:0 2px 5px rgba(16,24,40,.05)
}

.grid-2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px
}

.form-group{
    margin-bottom:18px
}

.form-group label{
    display:block;
    margin-bottom:7px;
    color:#344054;
    font-size:13px;
    font-weight:600
}

.form-control{
    width:100%;
    height:46px;
    padding:0 13px;
    border:1px solid #d0d5dd;
    border-radius:8px;
    background:#fff;
    color:#344054;
    font-size:13px;
    outline:none
}

textarea.form-control{
    height:130px;
    padding:13px;
    resize:vertical
}

.color-box{
    display:flex;
    align-items:center;
    gap:12px
}

.color-input{
    width:52px;
    height:44px;
    padding:3px;
    border:1px solid #d0d5dd;
    border-radius:8px;
    background:#fff;
    cursor:pointer
}

.color-text{
    font-size:12px;
    color:#98a2b3
}

.footer{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:25px;
    padding-top:18px;
    border-top:1px solid #eaecf0
}

.btn{
    height:40px;
    padding:0 17px;
    border:0;
    border-radius:8px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:7px;
    text-decoration:none;
    font-size:12px;
    font-weight:600;
    cursor:pointer
}

.btn-primary{
    background:#12552f;
    color:#fff
}

.btn-primary:hover{
    background:#0e4325
}

.btn-secondary{
    background:#fff;
    color:#475467;
    border:1px solid #d0d5dd
}

.alert{
    max-width:1000px;
    margin-bottom:15px;
    padding:11px 14px;
    border-radius:8px;
    background:#fef3f2;
    border:1px solid #fecdca;
    color:#b42318;
    font-size:12px
}

@media(max-width:700px){

    .main-content{
        margin-left:0;
        padding:20px
    }

    .grid-2{
        grid-template-columns:1fr
    }
}
</style>
</head>

<body>

<?php include '../includes/sidebar.php'; ?>

<main class="main-content">

<div class="breadcrumb">
    Peta & Rute / Layanan / Tambah
</div>

<div class="title">
    <h1>Tambah Layanan</h1>
    <p>Tambahkan layanan transportasi baru yang akan ditampilkan pada halaman peta.</p>
</div>

<?php if($error): ?>

<div class="alert">
    <i class="fa-solid fa-circle-exclamation"></i>
    <?=htmlspecialchars($error, ENT_QUOTES, 'UTF-8')?>
</div>

<?php endif; ?>

<div class="card">

<form method="POST">

<div class="grid-2">

<div class="form-group">

<label>Kode Layanan</label>

<input
    type="text"
    name="kode"
    class="form-control"
    placeholder="Contoh: 7E"
    maxlength="10"
    required
>

</div>


<div class="form-group">

<label>Warna Kode</label>

<div class="color-box">

<input
    type="color"
    name="warna"
    class="color-input"
    value="#64748B"
>

<span class="color-text">
    Pilih warna yang akan digunakan pada kode layanan.
</span>

</div>

</div>

</div>


<div class="form-group">

<label>Nama Layanan</label>

<input
    type="text"
    name="nama_layanan"
    class="form-control"
    placeholder="Contoh: Koridor Pusat"
    required
>

</div>


<div class="form-group">

<label>Deskripsi Rute</label>

<textarea
    name="deskripsi"
    class="form-control"
    placeholder="Contoh: Rusun ASN 1 – Kemenko 3 – Plaza Barat – Hotel Nusantara"
    required
></textarea>

</div>


<div class="grid-2">

<div class="form-group">

<label>Urutan Tampil</label>

<input
    type="number"
    name="urutan"
    class="form-control"
    value="1"
    min="1"
    required
>

</div>


<div class="form-group">

<label>Status</label>

<select name="status" class="form-control">

<option value="aktif">
    Aktif
</option>

<option value="nonaktif">
    Nonaktif
</option>

</select>

</div>

</div>


<div class="footer">

<a href="index.php?tab=layanan" class="btn btn-secondary">
    <i class="fa-solid fa-arrow-left"></i>
    Batal
</a>

<button type="submit" class="btn btn-primary">
    <i class="fa-solid fa-floppy-disk"></i>
    Simpan Layanan
</button>

</div>

</form>

</div>

</main>

</body>
</html>
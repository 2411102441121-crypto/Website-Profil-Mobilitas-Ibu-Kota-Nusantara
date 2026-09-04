<?php
session_start();
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $pertanyaan = mysqli_real_escape_string($koneksi, $_POST['pertanyaan']);
    $jawaban    = mysqli_real_escape_string($koneksi, $_POST['jawaban']);

    $query = "INSERT INTO faq (pertanyaan, jawaban) VALUES ('$pertanyaan', '$jawaban')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?pesan=ditambahkan");
        exit();
    } else {
        $error = "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah FAQ - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px; margin-top: 50px;">
        <h4 class="fw-bold mb-3">Tambah FAQ Baru</h4>
        <?php if(isset($error)): ?><div class="alert alert-danger p-2 small"><?= $error; ?></div><?php endif; ?>

        <form method="POST" action="tambah.php">
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Pertanyaan</label>
                <input type="text" name="pertanyaan" class="form-control" placeholder="Tuliskan pertanyaan FAQ..." required>
            </div>
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Jawaban</label>
                <textarea name="jawaban" class="form-control" rows="4" placeholder="Tuliskan jawaban lengkap..." required></textarea>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="index.php" class="btn btn-light border">Batal</a>
                <button type="submit" name="simpan" class="btn text-white px-4" style="background-color: #073b29;">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
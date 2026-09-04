<?php
session_start();
include '../koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) { 
    header("Location: index.php"); 
    exit(); 
}

// Ambil data spesifik berdasarkan ID
$result = mysqli_query($koneksi, "SELECT * FROM faq WHERE id = $id");
$data   = mysqli_fetch_assoc($result);

if (!$data) { 
    header("Location: index.php"); 
    exit(); 
}

// Proses Perbarui Data
if (isset($_POST['update'])) {
    $pertanyaan = mysqli_real_escape_string($koneksi, $_POST['pertanyaan']);
    $jawaban    = mysqli_real_escape_string($koneksi, $_POST['jawaban']);

    $query = "UPDATE faq SET pertanyaan = '$pertanyaan', jawaban = '$jawaban' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?pesan=diperbarui");
        exit();
    } else {
        $error = "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit FAQ - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px; margin-top: 50px;">
        <h4 class="fw-bold mb-3">Edit FAQ</h4>
        <?php if(isset($error)): ?><div class="alert alert-danger p-2 small"><?= $error; ?></div><?php endif; ?>

        <form method="POST" action="edit.php?id=<?= $id; ?>">
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Pertanyaan</label>
                <input type="text" name="pertanyaan" class="form-control" value="<?= htmlspecialchars($data['pertanyaan']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Jawaban</label>
                <textarea name="jawaban" class="form-control" rows="4" required><?= htmlspecialchars($data['jawaban']); ?></textarea>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="index.php" class="btn btn-light border">Batal</a>
                <button type="submit" name="update" class="btn text-white px-4" style="background-color: #073b29;">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>
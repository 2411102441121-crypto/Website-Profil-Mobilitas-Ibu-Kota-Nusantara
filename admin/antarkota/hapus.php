<?php
session_start();

if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../login.php');
    exit;
}

require_once __DIR__ . '/../koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $stmt = mysqli_prepare($koneksi, "SELECT gambar, kategori FROM antarkota WHERE id = ?");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if ($data) {
            $kategori = $data['kategori'] ?? '';

            // Hapus data dari database terlebih dahulu.
            $del_stmt = mysqli_prepare($koneksi, "DELETE FROM antarkota WHERE id = ?");

            if ($del_stmt) {
                mysqli_stmt_bind_param($del_stmt, "i", $id);

                if (mysqli_stmt_execute($del_stmt)) {
                    mysqli_stmt_close($del_stmt);

                    // Setelah data berhasil dihapus, hapus file gambarnya.
                    if (!empty($data['gambar'])) {
                        $upload_dir = __DIR__ . '/../../assets/images/uploads/';
                        $file_path = $upload_dir . basename($data['gambar']);

                        if (file_exists($file_path) && is_file($file_path)) {
                            unlink($file_path);
                        }
                    }

                    header('Location: index.php?kategori=' . urlencode($kategori));
                    exit;
                }

                mysqli_stmt_close($del_stmt);
            }
        }
    }
}

header('Location: index.php');
exit;
?>

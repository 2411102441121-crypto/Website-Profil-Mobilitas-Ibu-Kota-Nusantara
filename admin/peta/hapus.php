<?php
require_once '../koneksi.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id > 0) {

    mysqli_query($koneksi, "
        DELETE FROM layanan
        WHERE id='$id'
    ");
}

header("Location: index.php?success=hapus");
exit;
?>
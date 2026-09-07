<?php
require_once '../koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    mysqli_query($koneksi, "DELETE FROM glosarium WHERE id = $id");
}

header("Location: index.php");
exit();
?>
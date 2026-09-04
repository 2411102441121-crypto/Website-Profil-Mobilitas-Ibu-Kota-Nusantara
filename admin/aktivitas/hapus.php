<?php
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../login.php');
    exit;
}
require_once __DIR__ . '/../koneksi.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = "DELETE FROM aktivitas WHERE id = '$id'";
    mysqli_query($koneksi, $query);
}

header("Location: index.php");
exit;
?>
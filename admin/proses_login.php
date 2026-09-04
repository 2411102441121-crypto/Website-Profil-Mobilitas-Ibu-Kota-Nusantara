<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username'] ?? ''));
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        header('Location: login.php?error=1');
        exit;
    }

    // 1. Ubah 'users' menjadi 'admin'
    $query  = "SELECT * FROM admin WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // 2. Verifikasi Password (hash atau plain text)
        if (password_verify($password, $row['password']) || $password === $row['password']) {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id']        = $row['id'];
            $_SESSION['user_name']      = $row['nama'] ?? $row['username'];
            $_SESSION['user_role']      = $row['role'] ?? 'admin';

            header('Location: aktivitas/index.php');
            exit;
        }
    }

    // Login gagal
    header('Location: login.php?error=1');
    exit;
} else {
    header('Location: login.php');
    exit;
}
?>
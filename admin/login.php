<?php
session_start();
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: aktivitas/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Portal - Admin OIKN</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <style>
        .btn-custom-primary {
            background-color: #073b29;
            color: #ffffff;
            border: none;
        }
        .btn-custom-primary:hover {
            background-color: #052b1e;
            color: #ffffff;
        }
        .focus-border-custom:focus-within {
            border-color: #073b29 !important;
        }
    </style>
</head>
<body class="bg-light vh-100 overflow-hidden">

    <div class="container-fluid h-100 p-0">
        <div class="row g-0 h-100">
            
            <!-- Kolom Gambar Side Banner -->
            <div class="col-lg-6 d-none d-lg-block h-100 position-relative">
                <img src="../assets/images/admin/login-bg.jpg" alt="OIKN Building" class="w-100 h-100 object-fit-cover">
            <!-- Overlay transparan yang benar menggunakan RGBA (0.1 = 10% gelap) -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.1);"></div>
            </div>

            <!-- Kolom Form Login -->
            <div class="col-12 col-lg-6 h-100 bg-white d-flex align-items-center justify-content-center px-4 px-sm-5">
                <div class="w-100" style="max-width: 420px;">
                    
                    <h2 class="fw-bold text-dark mb-2 fs-3">Masuk ke Portal</h2>
                    <p class="text-secondary small mb-4 leading-relaxed">
                        Akses data mobilitas real-time dan kelola perjalanan di kawasan Nusantara.
                    </p>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger d-flex align-items-center gap-2 py-2 px-3 mb-4 rounded-3 small" role="alert">
                            <i class="fa-solid fa-circle-exclamation fs-6"></i>
                            <div>Username atau password yang Anda masukkan salah.</div>
                        </div>
                    <?php endif; ?>

                    <form action="proses_login.php" method="POST" class="d-flex flex-column gap-3">
                        
                        <!-- Input Username -->
                        <div>
                            <label class="form-label text-secondary fw-medium small mb-1">Username</label>
                            <div class="input-group border-bottom focus-border-custom pb-1">
                                <span class="input-group-text bg-transparent border-0 ps-0 text-secondary">
                                    <i class="fa-regular fa-user small"></i>
                                </span>
                                <input type="text" name="username" required placeholder="Masukkan username terdaftar" 
                                    class="form-control bg-transparent border-0 shadow-none ps-2 fs-7">
                            </div>
                        </div>

                        <!-- Input Password -->
                        <div>
                            <label class="form-label text-secondary fw-medium small mb-1">Kata Sandi</label>
                            <div class="input-group border-bottom focus-border-custom pb-1">
                                <span class="input-group-text bg-transparent border-0 ps-0 text-secondary">
                                    <i class="fa-solid fa-lock small"></i>
                                </span>
                                <input type="password" id="passwordInput" name="password" required placeholder="••••••••" 
                                    class="form-control bg-transparent border-0 shadow-none ps-2 fs-7">
                                <button type="button" onclick="togglePassword()" class="btn btn-link text-secondary text-decoration-none pe-0">
                                    <i class="fa-regular fa-eye small" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="pt-3">
                            <button type="submit" class="btn btn-custom-primary w-100 py-2 fw-semibold rounded-3 d-flex align-items-center justify-content-center gap-2 shadow-sm">
                                <span>Masuk</span>
                                <i class="fa-solid fa-arrow-right small"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
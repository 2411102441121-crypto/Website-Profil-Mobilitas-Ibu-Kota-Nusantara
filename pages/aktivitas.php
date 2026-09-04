<?php
// Hubungkan ke database
require_once __DIR__ . '/../admin/koneksi.php';

$title = "Aktivitas & Perkembangan Mobilitas IKN";
$active_page = "aktivitas";

// 1. QUERY BERITA UTAMA / HIGHLIGHT (Mengambil 1 Berita Terakhir)
$q_headline = mysqli_query($koneksi, "SELECT * FROM aktivitas WHERE status = 'Published' ORDER BY tanggal DESC, id DESC LIMIT 1");
$headline = mysqli_fetch_assoc($q_headline);

// 2. QUERY BERITA KANAN (Mengambil 3 Berita Terbaru Setelah Berita Utama)
$headline_id = $headline['id'] ?? 0;
$q_recent = mysqli_query($koneksi, "SELECT * FROM aktivitas WHERE status = 'Published' AND id != '$headline_id' ORDER BY tanggal DESC, id DESC LIMIT 3");

ob_start();
?>

<section class="py-5 bg-light">
    <div class="container py-4">

        <!-- =========================
             BAGIAN BERITA UTAMA
        ========================== -->
        <div class="text-center mb-5 max-w-75 mx-auto">
            <h1 class="fw-bold display-5 mb-3">Aktivitas &amp; Perkembangan Mobilitas IKN</h1>
            <p class="text-secondary fs-5 lead">
                Ikuti informasi terbaru mengenai pengembangan transportasi,
                inovasi mobilitas cerdas, serta berbagai kegiatan yang mendukung
                sistem transportasi di Ibu Kota Nusantara.
            </p>
        </div>

        <div class="row g-4 mb-5">

            <!-- KIRI: BERITA TERBARU (HIGHLIGHT / FEATURED) -->
            <div class="col-lg-7">
                <?php if ($headline): 
                    $h_link = !empty($headline['link']) ? $headline['link'] : '#';
                    $h_target = !empty($headline['link']) ? 'target="_blank" rel="noopener noreferrer"' : '';
                    $h_img = !empty($headline['gambar']) 
                        ? '/ikn-mobility/assets/images/' . $headline['gambar'] 
                        : '../assets/images/aktivitas/peta-rel-kaltim.jpg';
                ?>
                    <article class="card h-100 border-0 rounded-4 overflow-hidden shadow-sm text-white position-relative">
                        <a href="<?= htmlspecialchars($h_link) ?>" <?= $h_target ?> class="text-decoration-none text-white h-100 d-block position-relative">
                            <img src="<?= htmlspecialchars($h_img) ?>" class="card-img h-100 object-fit-cover position-absolute top-0 start-0 w-100" alt="<?= htmlspecialchars($headline['judul']) ?>">
                            <div class="card-img-overlay d-flex flex-column justify-content-end p-4 p-md-5" style="background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.85) 100%);">
                                <div>
                                    <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill fw-semibold text-uppercase">
                                        <?= htmlspecialchars($headline['kategori'] ?? 'HIGHLIGHT') ?>
                                    </span>
                                    <h2 class="card-title fw-bold h3 mb-2"><?= htmlspecialchars($headline['judul']) ?></h2>
                                    <p class="card-text text-light-50 small mb-0 text-truncate" style="max-height: 3.6em; line-height: 1.2;">
                                        <?= htmlspecialchars($headline['deskripsi']) ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </article>
                <?php else: ?>
                    <!-- Fallback jika belum ada berita di Database -->
                    <div class="card h-100 border-0 rounded-4 bg-secondary-subtle d-flex align-items-center justify-content-center text-secondary p-5" style="min-height: 400px;">
                        <p class="m-0 fw-medium">Belum ada berita terbaru terpublikasi.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- KANAN: 3 BERITA TERBARU BERIKUTNYA -->
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-3">
                    <?php if ($q_recent && mysqli_num_rows($q_recent) > 0): ?>
                        <?php while ($recent = mysqli_fetch_assoc($q_recent)): 
                            $r_link = !empty($recent['link']) ? $recent['link'] : '#';
                            $r_target = !empty($recent['link']) ? 'target="_blank" rel="noopener noreferrer"' : '';
                        ?>
                            <article class="card border-0 rounded-4 shadow-sm h-100">
                                <a href="<?= htmlspecialchars($r_link) ?>" <?= $r_target ?> class="card-body text-decoration-none text-dark p-4">
                                    <time class="text-muted small d-block mb-2 fw-medium">
                                        <?= !empty($recent['tanggal']) ? date('d F Y', strtotime($recent['tanggal'])) : '' ?>
                                    </time>
                                    <h3 class="h5 card-title fw-bold mb-2 text-primary-hover"><?= htmlspecialchars($recent['judul']) ?></h3>
                                    <p class="card-text text-secondary small mb-0"><?= htmlspecialchars($recent['deskripsi']) ?></p>
                                </a>
                            </article>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="card border-0 rounded-4 p-4 text-muted text-center">
                            Belum ada berita lainnya.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- =========================
             AKTIVITAS LAINNYA
        ========================== -->
        <section class="pt-4">

            <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
                <h2 class="fw-bold h3 mb-0">Aktivitas Lainnya</h2>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

                <!-- OLAHRAGA -->
                <div class="col">
                    <article class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                        <div class="ratio ratio-16x9">
                            <img src="../assets/images/aktivitas/olahraga.jpg" class="object-fit-cover" alt="Olahraga">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h3 class="h5 card-title fw-bold mb-2">Olahraga</h3>
                            <p class="card-text text-secondary small mb-4 flex-grow-1">Berbagai kegiatan olahraga yang diselenggarakan untuk mendukung aktivitas dan kebugaran di IKN.</p>
                            <a href="/ikn-mobility/detail/aktivitas-olahraga.php?cat=Olahraga" class="text-primary text-decoration-none fw-semibold small mt-auto">
                                Baca lebih lanjut <span class="ms-1">&rarr;</span>
                            </a>
                        </div>
                    </article>
                </div>

                <!-- PEMBANGUNAN -->
                <div class="col">
                    <article class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                        <div class="ratio ratio-16x9">
                            <img src="../assets/images/aktivitas/pembangunan.jpg" class="object-fit-cover" alt="Pembangunan">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h3 class="h5 card-title fw-bold mb-2">Pembangunan</h3>
                            <p class="card-text text-secondary small mb-4 flex-grow-1">Perkembangan pembangunan kawasan, infrastruktur, dan fasilitas pendukung di IKN.</p>
                            <a href="/ikn-mobility/detail/aktivitas-olahraga.php?cat=Pembangunan" class="text-primary text-decoration-none fw-semibold small mt-auto">
                                Baca lebih lanjut <span class="ms-1">&rarr;</span>
                            </a>
                        </div>
                    </article>
                </div>

                <!-- KEGIATAN & MASYARAKAT -->
                <div class="col">
                    <article class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                        <div class="ratio ratio-16x9">
                            <img src="../assets/images/aktivitas/masyarakat.jpg" class="object-fit-cover" alt="Kegiatan dan Masyarakat">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h3 class="h5 card-title fw-bold mb-2">Kegiatan &amp; Masyarakat</h3>
                            <p class="card-text text-secondary small mb-4 flex-grow-1">Berbagai kegiatan, acara, dan aktivitas masyarakat yang berlangsung di IKN.</p>
                            <a href="/ikn-mobility/detail/aktivitas-olahraga.php?cat=Kegiatan%20%26%20Masyarakat" class="text-primary text-decoration-none fw-semibold small mt-auto">
                                Baca lebih lanjut <span class="ms-1">&rarr;</span>
                            </a>
                        </div>
                    </article>
                </div>

                <!-- TRANSPORTASI -->
                <div class="col">
                    <article class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                        <div class="ratio ratio-16x9">
                            <img src="../assets/images/aktivitas/transportasi.jpg" class="object-fit-cover" alt="Transportasi">
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h3 class="h5 card-title fw-bold mb-2">Transportasi</h3>
                            <p class="card-text text-secondary small mb-4 flex-grow-1">Perkembangan moda, layanan, dan fasilitas transportasi untuk mendukung mobilitas di IKN.</p>
                            <a href="/ikn-mobility/detail/aktivitas-olahraga.php?cat=Transportasi" class="text-primary text-decoration-none fw-semibold small mt-auto">
                                Baca lebih lanjut <span class="ms-1">&rarr;</span>
                            </a>
                        </div>
                    </article>
                </div>

            </div>

        </section>

    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../includes/base.php';
?>
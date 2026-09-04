<?php
// Hubungkan ke database
require_once __DIR__ . '/../admin/koneksi.php';

// Tangkap parameter 'cat' dari URL (Default: Olahraga jika tidak ada parameter)
$cat = isset($_GET['cat']) ? $_GET['cat'] : 'Olahraga';
$cat_clean = mysqli_real_escape_string($koneksi, $cat);

$title = "Aktivitas " . htmlspecialchars($cat) . " - Profil Mobilitas IKN";
$active_page = "aktivitas";

// Query mengambil data dari database yang Status = 'Published' & Kategori sesuai
$query = "SELECT * FROM aktivitas WHERE LOWER(kategori) = LOWER('$cat_clean') AND status = 'Published' ORDER BY tanggal DESC, id DESC";
$result = mysqli_query($koneksi, $query);

// Menyesuaikan deskripsi sub-header berdasarkan kategori
$deskripsi_kategori = [
    'Olahraga' => 'Berbagai kegiatan olahraga yang diselenggarakan untuk mendukung aktivitas dan kebugaran masyarakat di Ibu Kota Nusantara.',
    'Pembangunan' => 'Perkembangan pembangunan kawasan, infrastruktur, serta fasilitas pendukung di Ibu Kota Nusantara.',
    'Kegiatan & Masyarakat' => 'Interaksi sosial, kegiatan kebudayaan, dan partisipasi publik warga Ibu Kota Nusantara.',
    'Transportasi' => 'Inovasi, perkembangan moda, dan layanan konektivitas sistem transportasi di Ibu Kota Nusantara.'
];

$sub_headline = $deskripsi_kategori[$cat] ?? 'Informasi dan perkembangan terbaru mengenai aktivitas di Ibu Kota Nusantara.';

ob_start();
?>

<section class="activity-section">
    <div class="container activity-container">
        
        <!-- Header Judul Kategori Dinamis -->
        <div class="activity-heading text-center" style="margin-bottom: 40px;">
            <h1 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 12px; color: #1a1a1a;">
                Aktivitas <?= htmlspecialchars($cat) ?>
            </h1>
            <p style="color: #666; max-width: 720px; margin: 0 auto; font-size: 0.95rem; line-height: 1.6;">
                <?= htmlspecialchars($sub_headline) ?>
            </p>
        </div>

        <!-- Grid Berita Hasil Input Dashboard Admin -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 24px;">
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): 
                    // Tentukan link tujuan (External URL dari Admin atau fallback ke modal/halaman detail)
                    $link_tujuan = !empty($row['link']) ? $row['link'] : '#';
                    $target_blank = !empty($row['link']) ? 'target="_blank" rel="noopener noreferrer"' : '';
                    
                    // Path gambar (fallback ke gambar standar jika kosong)
                    $gambar = !empty($row['gambar']) 
                        ? '/ikn-mobility/assets/images/' . $row['gambar'] 
                        : '../assets/images/aktivitas/olahraga.jpg';
                ?>
                    <article style="background: #ffffff; border-radius: 16px; border: 1px solid #e5e7eb; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); transition: transform 0.2s, box-shadow 0.2s;">
                        <div>
                            <!-- Thumbnail Gambar -->
                            <a href="<?= htmlspecialchars($link_tujuan) ?>" <?= $target_blank ?> style="display: block; overflow: hidden; height: 200px; background-color: #f3f4f6;">
                                <img src="<?= htmlspecialchars($gambar) ?>" 
                                     alt="<?= htmlspecialchars($row['judul']) ?>" 
                                     style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" 
                                     onmouseover="this.style.transform='scale(1.05)'" 
                                     onmouseout="this.style.transform='scale(1)'">
                            </a>

                            <!-- Konten Card -->
                            <div style="padding: 20px;">
                                <div style="font-size: 11px; color: #888; font-weight: 600; text-align: right; margin-bottom: 8px;">
                                    <?= !empty($row['tanggal']) ? date('d M Y', strtotime($row['tanggal'])) : '' ?>
                                </div>
                                <a href="<?= htmlspecialchars($link_tujuan) ?>" <?= $target_blank ?> style="text-decoration: none; color: #111827;">
                                    <h3 style="font-size: 1.1rem; font-weight: 700; line-height: 1.4; margin-bottom: 10px;">
                                        <?= htmlspecialchars($row['judul']) ?>
                                    </h3>
                                </a>
                                <?php if (!empty($row['deskripsi'])): ?>
                                    <p style="font-size: 0.875rem; color: #4b5563; line-height: 1.5; margin-bottom: 16px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        <?= htmlspecialchars($row['deskripsi']) ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Footer Card & Link Baca Lebih Lanjut -->
                        <div style="padding: 0 20px 20px 20px;">
                            <a href="<?= htmlspecialchars($link_tujuan) ?>" <?= $target_blank ?> style="text-decoration: none; font-size: 0.875rem; font-weight: 700; color: #073b29; display: inline-flex; align-items: center; gap: 6px;">
                                Baca lebih lanjut <span style="font-size: 1rem;">→</span>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Tampilan Jika Belum Ada Berita di Database -->
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: #ffffff; border-radius: 16px; border: 1px dashed #d1d5db; color: #6b7280;">
                    <i class="fa-regular fa-newspaper" style="font-size: 40px; margin-bottom: 12px; color: #9ca3af;"></i>
                    <p style="font-size: 0.95rem; font-weight: 500;">Belum ada aktivitas terpublikasi untuk kategori <strong><?= htmlspecialchars($cat) ?></strong>.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../includes/base.php';
?>
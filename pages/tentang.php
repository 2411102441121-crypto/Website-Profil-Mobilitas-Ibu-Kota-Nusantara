<?php
require_once __DIR__ . '/../admin/koneksi.php';

/* ========================================
   AMBIL DATA STRUKTUR DARI DATABASE ADMIN
   Tabel: struktur_organisasi
   Kolom: id, posisi, nama_pejabat, tentang, tugas, created_at
======================================== */
$strukturData = [
    'deputi' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []],
    'digital' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []],
    'hijau' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []],
    'data' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []],
    'coord1' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []],
    'coord2' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []],
    'coord3' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []],
    'member1' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []],
    'member2' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []],
    'member3' => ['name' => '', 'position' => '', 'about' => '', 'tasks' => []]
];
$coordFallback = 1;
$memberFallback = 1;
$query = mysqli_query($koneksi, "
    SELECT id, posisi, nama_pejabat, tentang, tugas
    FROM struktur_organisasi
    ORDER BY id ASC
");
if (!$query) {
    die('Data Struktur Organisasi gagal diambil: ' . mysqli_error($koneksi));
}
while ($row = mysqli_fetch_assoc($query)) {
    $posisi = trim((string)($row['posisi'] ?? ''));
    $posisiLower = strtolower($posisi);
    $nama = trim((string)($row['nama_pejabat'] ?? ''));
    $tentang = trim((string)($row['tentang'] ?? ''));
    $tugasRaw = trim((string)($row['tugas'] ?? ''));
    $tasks = [];
    if ($tugasRaw !== '') {
        $decoded = json_decode($tugasRaw, true);
        if (is_array($decoded)) {
            $tasks = array_values(array_filter(array_map('trim', $decoded), function ($value) {
                return $value !== '';
            }));
        } else {
            $tasks = preg_split('/\r\n|\r|\n|;|•/', $tugasRaw);
            $tasks = array_values(array_filter(array_map('trim', $tasks), function ($value) {
                return $value !== '';
            }));
        }
    }
    $item = [
        'name' => $nama,
        'position' => $posisi,
        'about' => $tentang,
        'tasks' => $tasks
    ];

    /* DEPUTI */
    if (strpos($posisiLower, 'deputi') !== false) {
        $strukturData['deputi'] = $item;
        continue;
    }

    /* KOORDINATOR HARUS DICEK SEBELUM DIREKTUR,
       karena nama koordinator juga mengandung kata
       'digital', 'hijau', atau 'data'. */
    if (strpos($posisiLower, 'koordinator') !== false) {
        if (strpos($posisiLower, 'digital') !== false || strpos($posisiLower, 'ekosistem') !== false) {
            $strukturData['coord1'] = $item;
        } elseif (strpos($posisiLower, 'hijau') !== false) {
            $strukturData['coord2'] = $item;
        } elseif (strpos($posisiLower, 'data') !== false || strpos($posisiLower, 'kecerdasan') !== false) {
            $strukturData['coord3'] = $item;
        } elseif ($coordFallback <= 3) {
            $strukturData['coord' . $coordFallback] = $item;
            $coordFallback++;
        }
        continue;
    }

    /* ANGGOTA */
    if (strpos($posisiLower, 'anggota') !== false) {
        if (strpos($posisiLower, 'digital') !== false || strpos($posisiLower, 'ekosistem') !== false) {
            $strukturData['member1'] = $item;
        } elseif (strpos($posisiLower, 'hijau') !== false) {
            $strukturData['member2'] = $item;
        } elseif (strpos($posisiLower, 'data') !== false || strpos($posisiLower, 'kecerdasan') !== false) {
            $strukturData['member3'] = $item;
        } elseif ($memberFallback <= 3) {
            $strukturData['member' . $memberFallback] = $item;
            $memberFallback++;
        }
        continue;
    }

    /* DIREKTUR */
    if (strpos($posisiLower, 'pengembangan ekosistem digital') !== false || strpos($posisiLower, 'ekosistem digital') !== false) {
        $strukturData['digital'] = $item;
        continue;
    }
    if (strpos($posisiLower, 'data dan kecerdasan buatan') !== false || strpos($posisiLower, 'kecerdasan buatan') !== false) {
        $strukturData['data'] = $item;
        continue;
    }
    if (strpos($posisiLower, 'transformasi hijau') !== false) {
        $strukturData['hijau'] = $item;
        continue;
    }

    /* ANGGOTA */
    if (strpos($posisiLower, 'anggota') !== false) {
        if (strpos($posisiLower, 'digital') !== false || strpos($posisiLower, 'ekosistem') !== false) {
            $strukturData['member1'] = $item;
        } elseif (strpos($posisiLower, 'hijau') !== false) {
            $strukturData['member2'] = $item;
        } elseif (strpos($posisiLower, 'data') !== false || strpos($posisiLower, 'kecerdasan') !== false) {
            $strukturData['member3'] = $item;
        } elseif ($memberFallback <= 3) {
            $strukturData['member' . $memberFallback] = $item;
            $memberFallback++;
        }
    }
}
$title = "Tentang | Profil Mobilitas IKN";
ob_start();
?>
<link rel="stylesheet" href="../assets/css/tentang.css">

<!-- ========================================
     HERO
======================================== -->
<section class="tentang-hero">
    <div class="hero-inner">
        <h1>Membangun Masa Depan Mobilitas Cerdas</h1>
        <p>Pada perencanaan, pengembangan, dan penerapannya, beragam unit organisasi dan kerja di lingkungan Otorita Ibu Kota Nusantara serta stakeholder terkait berperan dalam menciptakan dan mengelola layanan transportasi dan mobilitas yang andal di IKN.</p>
    </div>
</section>
<main class="tentang-page">

    <!-- ========================================
         PROFIL KEDEPUTIAN
    ======================================== -->
    <section class="tentang-section profil-section">
        <div class="section-heading">
            <div class="section-icon">
                <img
                    src="../assets/images/tentang/daun.png"
                    alt="Logo Transformasi Hijau dan Digital"
                >
            </div>
            <h2>Profil Kedeputian Bidang Transformasi Hijau dan Digital</h2>
        </div>
        <div class="profil-image">
            <img
                src="../assets/images/tentang/profil.png"
                alt="Profil Kedeputian Bidang Transformasi Hijau dan Digital"
            >
        </div>
        <div class="profil-copy">
            <h3>FUNGSI</h3>
            <p class="profil-pasal">
                Pasal 62 Perka OIKN No.1/2022
            </p>
            <ul class="fungsi-list">
                <li>
                    Perumusan kebijakan operasional, perencanaan arah kebijakan,
                    dan pengembangan kerangka regulasi di bidang Transformasi hijau dan digital.
                </li>
                <li>
                    Penyusunan dan pengembangan proses bisnis di bidang Transformasi hijau dan digital.
                </li>
                <li>
                    Pengoordinasian pelaksanaan kebijakan di bidang Transformasi hijau dan digital.
                </li>
                <li>
                    Pelaksanaan pemberian bimbingan teknis dan supervisi
                    di bidang Transformasi hijau dan digital.
                </li>
                <li>
                    Pemantauan, evaluasi, dan pelaporan kebijakan operasional
                    perencanaan, arah kebijakan, serta pengembangan kerangka regulasi
                    di bidang Transformasi hijau dan digital.
                </li>
                <li>
                    Pelaksanaan fungsi lain yang diberikan oleh Kepala Otorita Ibu Kota Nusantara.
                </li>
            </ul>
            <h3 class="tugas-title">
                TUGAS
            </h3>
            <p class="profil-pasal">
                Pasal 61 Perka OIKN No.1/2022
            </p>
            <p class="tugas-text">
                Perumusan kebijakan, pelaksanaan, pengoordinasian,
                pemantauan, dan pengawasan di bidang Transformasi hijau dan digital.
            </p>
        </div>
    </section>

    <!-- ========================================
         PEMANGKU KEPENTINGAN
    ======================================== -->
    <section class="tentang-section stakeholder-section">
        <div class="section-heading stakeholder-heading">
            <div class="section-icon">
                <img
                    src="../assets/images/tentang/pemangku.png"
                    alt="Logo Pemangku Kepentingan"
                >
            </div>
            <h2>Pemangku Kepentingan</h2>
        </div>
        <div class="stakeholder-grid top-three">
            <article class="stakeholder-card">
                <h3>Kedeputian Sarana dan Prasarana</h3>
                <p>
                    Kedeputian Bidang Sarana dan Prasarana berperan
                    dalam perencanaan, pembangunan, dan pengelolaan infrastruktur
                    untuk mendukung layanan dasar dan konektivitas di Ibu Kota Nusantara
                    secara andal, efisien, dan berkelanjutan.
                </p>
            </article>
            <article class="stakeholder-card">
                <h3>Direktorat Sarana dan Prasarana Sosial</h3>
                <p>
                    Melaksanakan koordinasi, analisis kebijakan, pembangunan,
                    serta evaluasi dan pelaporan di bidang sarana dan prasarana sosial,
                    meliputi fasilitas umum, sosial, kesehatan, dan pendidikan.
                </p>
            </article>
            <article class="stakeholder-card">
                <h3>Direktorat Pengelola Gedung dan Kawasan Perkotaan</h3>
                <p>
                    Melaksanakan koordinasi, analisis kebijakan, pembangunan,
                    pengelolaan, serta evaluasi di bidang gedung, kawasan, dan perkotaan,
                    termasuk pemberian bimbingan teknis dan supervisi.
                </p>
            </article>
        </div>
        <div class="stakeholder-grid middle-two">
            <article class="stakeholder-card">
                <h3>Direktorat Perencana Mikro</h3>
                <p>
                    Melaksanakan koordinasi, sinkronisasi, dan analisis kebijakan
                    dalam perencanaan mikro Ibu Kota Nusantara, meliputi perencanaan
                    detail tata ruang, tata bangunan dan lingkungan, struktur dan pola ruang,
                    serta pengembangan pusat pelayanan.
                </p>
            </article>
            <article class="stakeholder-card">
                <h3>Direktorat Pengembangan Ekosistem Digital</h3>
                <p>
                    Melaksanakan koordinasi, analisis kebijakan, dan pengembangan
                    ekosistem digital di Ibu Kota Nusantara, meliputi penyusunan peta jalan
                    kota cerdas, bimbingan dan supervisi transformasi digital,
                    serta pengembangan sumber daya manusia yang berdaya saing.
                </p>
            </article>
        </div>
        <div class="stakeholder-grid bottom-two">
            <article class="stakeholder-card stakeholder-logo-card">
                <img
                    src="../assets/images/tentang/ppu.png"
                    alt="Logo Pemerintah Kabupaten Penajam Paser Utara"
                    class="stakeholder-logo"
                >
                <h3>
                    Pemerintah Kabupaten Penajam Paser Utara
                </h3>
                <p>
                    Pemerintah Kabupaten Penajam Paser Utara berperan
                    dalam menyelaraskan tata ruang, memperkuat konektivitas
                    infrastruktur, dan mengelola sistem logistik serta transportasi
                    darat sebagai bagian dari mobilitas menuju kawasan Ibu Kota Nusantara.
                </p>
            </article>
            <article class="stakeholder-card stakeholder-logo-card">
                <img
                    src="../assets/images/tentang/kukar.png"
                    alt="Logo Pemerintah Kabupaten Kutai Kartanegara"
                    class="stakeholder-logo"
                >
                <h3>
                    Pemerintah Kabupaten Kutai Kartanegara
                </h3>
                <p>
                    Pemerintah Kabupaten Kutai Kartanegara berperan
                    dalam menyelaraskan Rencana Tata Ruang Wilayah (RTRW),
                    membangun konektivitas infrastruktur jalan dan logistik,
                    serta menyiapkan pusat ketahanan pangan dan pelatihan SDM
                    guna mendukung kelancaran arus mobilitas serta pertumbuhan kawasan IKN.
                </p>
            </article>
        </div>
    </section>

    <!-- ========================================
         STRUKTUR ORGANISASI
    ======================================== -->
    <section class="tentang-section struktur-section">
        <div class="section-heading">
            <div class="section-icon">
                ⌘
            </div>
            <h2>Struktur Organisasi</h2>
        </div>
        <div class="struktur-list">
            <div class="struktur-card dark">
                <h3>
                    Deputi Transformasi Hijau dan Digital
                </h3>
                <p>
                    <?= htmlspecialchars($strukturData['deputi']['name'] ?? '') ?>
                </p>
            </div>
            <div class="struktur-card green">
                <h3>
                    Direktur Pengembangan Ekosistem Digital
                </h3>
                <p>
                    <?= htmlspecialchars($strukturData['digital']['name'] ?? '') ?>
                </p>
            </div>
            <div class="struktur-card dark">
                <h3>
                    Direktur Transformasi Hijau
                </h3>
                <p>
                    <?= htmlspecialchars($strukturData['hijau']['name'] ?? '') ?>
                </p>
            </div>
            <div class="struktur-card green">
                <h3>
                    Direktur Data dan Kecerdasan Buatan
                </h3>
                <p>
                    <?= htmlspecialchars($strukturData['data']['name'] ?? '') ?>
                </p>
            </div>
        </div>

        <!-- ========================================
             ORGANIZATION CHART
        ======================================== -->
        <div class="organization-chart">
            <div class="org-canvas">
                <svg
                    class="org-lines"
                    viewBox="0 0 1000 760"
                    preserveAspectRatio="none"
                >
                    <!-- GARIS DEPUTI KE DIREKTUR -->
                    <path
                        d="M500 95 V145"
                        class="line-solid"
                    />
                    <path
                        d="M175 140 H825"
                        class="line-solid"
                    />
                    <path
                        d="M175 140 V165 M500 140 V165 M825 140 V165"
                        class="line-solid"
                    />
                    <!-- GARIS ANTAR DIREKTUR -->
                    <path
                        d="M300 195 H390 M610 195 H700"
                        class="line-dotted"
                    />
                    <!-- DIREKTUR KE KOORDINATOR -->
                    <path
                        d="M175 225 V340 M500 225 V340 M825 225 V340"
                        class="line-solid"
                    />
                    <!-- ANTAR KOORDINATOR -->
                    <path
                        d="M300 370 H390 M610 370 H700"
                        class="line-dotted"
                    />
                    <!-- KOORDINATOR KE ANGGOTA -->
                    <path
                        d="M175 400 V480 M500 400 V480 M825 400 V480"
                        class="line-solid"
                    />
                    <!-- ANTAR ANGGOTA -->
                    <path
                        d="M300 510 H390 M610 510 H700"
                        class="line-dotted"
                    />
                    <!-- GARIS TATA KELOLA -->
                    <path
                        d="M650 65 H985 V665 H850"
                        class="line-solid"
                    />
                </svg>
                <!-- DEPUTI -->
                <div
                    class="org-box org-deputi brown director-popup-btn"
                    data-director="deputi"
                >
                    Deputi Bidang Transformasi<br>
                    Hijau dan Digital
                </div>
                <!-- GROUP DIREKTUR -->
                <div class="org-group org-director-group"></div>
                <!-- DIREKTUR DIGITAL -->
                <div
                    class="org-box org-director-1 blue director-popup-btn"
                    data-director="digital"
                >
                    Direktur Pengembangan<br>
                    Ekosistem Digital
                </div>
                <!-- DIREKTUR HIJAU -->
                <div
                    class="org-box org-director-2 dark-green director-popup-btn"
                    data-director="hijau"
                >
                    Direktur Transformasi Hijau
                </div>
                <!-- DIREKTUR DATA -->
                <div
                    class="org-box org-director-3 red-dark director-popup-btn"
                    data-director="data"
                >
                    Direktur Data dan<br>
                    Kecerdasan Buatan
                </div>
                <!-- GROUP TIM -->
                <div class="org-group org-team-group"></div>
                <!-- KOORDINATOR -->
                <div class="org-box org-coord-1 cyan director-popup-btn" data-director="coord1">
                    <span class="org-role">Koordinator Tim</span>
                    <span class="org-name"><?= htmlspecialchars($coord1['name'] ?? '') ?></span>
                </div>
                <div class="org-box org-coord-2 green director-popup-btn" data-director="coord2">
                    <span class="org-role">Koordinator Tim</span>
                    <span class="org-name"><?= htmlspecialchars($coord2['name'] ?? '') ?></span>
                </div>
                <div class="org-box org-coord-3 red director-popup-btn" data-director="coord3">
                    <span class="org-role">Koordinator Tim</span>
                    <span class="org-name"><?= htmlspecialchars($coord3['name'] ?? '') ?></span>
                </div>
                <!-- ANGGOTA -->
                <div class="org-box org-member-1 cyan">
                    Anggota Tim<br>
                    <b><?= htmlspecialchars($strukturData['member1']['name'] ?? '') ?></b>
                </div>
                <div class="org-box org-member-2 green">
                    Anggota Tim<br>
                    <b><?= htmlspecialchars($strukturData['member2']['name'] ?? '') ?></b>
                </div>
                <div class="org-box org-member-3 red-light">
                    Anggota Tim<br>
                    <b><?= htmlspecialchars($strukturData['member3']['name'] ?? '') ?></b>
                </div>
                <!-- TATA KELOLA -->
                <div class="org-box org-support gold">
                    Tata Kelola<br>
                    Pendukung<br>
                    (Umum) &amp; Kerja<br>
                    Sama
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         POPUP DIREKTUR / DEPUTI
    ======================================== -->
    <div
        class="director-modal"
        id="directorModal"
    >
        <div
            class="director-modal-overlay"
            id="directorModalOverlay"
        ></div>
        <div class="director-modal-box">
            <button
                type="button"
                class="director-modal-close"
                id="directorModalClose"
            >
                ×
            </button>
            <div class="director-modal-header">
                <div class="director-heading">
                    <span class="director-label">
                        PROFIL DIREKTUR
                    </span>
                    <h3 id="directorName"></h3>
                    <h4 id="directorPosition"></h4>
                </div>
            </div>
            <div class="director-divider"></div>
            <div class="director-section">
                <span class="director-label">
                    TENTANG
                </span>
                <p id="directorAbout"></p>
            </div>
            <div class="director-section">
                <span class="director-label">
                    TUGAS &amp; FUNGSI
                </span>
                <ul id="directorTasks"></ul>
            </div>
        </div>
    </div>

    <!-- ========================================
         HUBUNGI KAMI + GLOSARIUM
    ======================================== -->
    <section class="tentang-section contact-section">
        <div class="section-heading">
            <div class="section-icon">
                ?
            </div>
            <h2>Hubungi Kami</h2>
        </div>
        <div class="contact-grid">
            <!-- CONTACT CARD -->
            <div class="contact-card">
                <div class="contact-info">
                    <div class="contact-item">
                        <span class="contact-icon">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M12 21s7-6.2 7-11a7 7 0 1 0-14 0c0 4.8 7 11 7 11z"
                                />
                                <circle
                                    cx="12"
                                    cy="10"
                                    r="2.5"
                                />
                            </svg>
                        </span>
                        <div>
                            <strong>
                                Kantor Otorita Ibu Kota Nusantara
                            </strong>
                            <p>
                                Kawasan Inti Pusat Pemerintahan (KIPP),<br>
                                Nusantara, Kalimantan Timur
                            </p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon"></span>
                        <div>
                            <strong>
                                Kantor Otorita Ibu Kota Nusantara Jakarta
                            </strong>
                            <p>
                                Menara Mandiri II Lantai 5,<br>
                                Jl. Jenderal Sudirman Kav. 54–55,<br>
                                Senayan, Jakarta Selatan
                            </p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">
                            <svg viewBox="0 0 24 24">
                                <rect
                                    x="3"
                                    y="5"
                                    width="18"
                                    height="14"
                                    rx="1"
                                />
                                <path
                                    d="M3 6l9 7 9-7"
                                />
                            </svg>
                        </span>
                        <div>
                            <strong>
                                Email
                            </strong>
                            <p>
                                investasi@ikn.go.id<br>
                                sekretariat@ikn.go.id
                            </p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">
                            <img
                                src="../assets/images/tentang/wab.png"
                                alt="Website"
                            >
                        </span>
                        <div>
                            <strong>
                                Website Resmi
                            </strong>
                            <p>
                                ikn.go.id
                            </p>
                        </div>
                    </div>
                </div>
                <!-- GOOGLE MAPS -->
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps?q=Kawasan+Inti+Pusat+Pemerintahan+IKN&output=embed"
                        loading="lazy"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>

            <!-- ========================================
                 GLOSARIUM
            ======================================== -->
            <?php
            $terms = [];
            $query_glosarium = mysqli_query($koneksi, "
                SELECT istilah, definisi
                FROM glosarium
                WHERE status = 'aktif'
                ORDER BY id DESC
            ");
            if ($query_glosarium) {
                while ($row = mysqli_fetch_assoc($query_glosarium)) {
                    $terms[] = [
                        $row['istilah'],
                        $row['definisi']
                    ];
                }
            }
            ?>
            <div class="glossary">
                <div class="glossary-header">
                    <h2>
                        GLOSARIUM
                    </h2>
                    <p>
                        Pahami istilah penting<br>
                        dalam mobilitas cerdas
                    </p>
                </div>
                <div class="glossary-scroll">
                    <?php foreach ($terms as $term): ?>
                        <div class="glossary-item">
                            <button
                                type="button"
                                class="glossary-button"
                                aria-expanded="false"
                            >
                                <span>
                                    <?= htmlspecialchars($term[0]) ?>
                                </span>
                                <span class="arrow"></span>
                            </button>
                            <div class="glossary-content">
                                <p>
                                    <?= htmlspecialchars($term[1]) ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- ========================================
     HUBUNGKAN PHP DENGAN JAVASCRIPT
======================================== -->
<script>
window.strukturData = <?= json_encode(
    $strukturData,
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
) ?>;
</script>
<script src="../assets/js/tentang.js"></script>
<?php
$content = ob_get_clean();
include "../includes/base.php";
?>
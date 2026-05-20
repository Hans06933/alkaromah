<?php
// Hubungkan ke file koneksi database
include 'config/koneksi.php';

// Ambil maksimal 4 data kegiatan terbaru yang statusnya 'publish'
$queryKegiatan = mysqli_query($conn, "SELECT * FROM kegiatan 
                                      WHERE status = 'publish' 
                                      ORDER BY id DESC 
                                      LIMIT 4");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan - MI Al Karomah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,600;1,700&display=swap" rel="stylesheet">
    
    <style>
        /* ==========================================================================
           RESET & UTILITIES
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #fcfbf7;
            color: #2d3e2d;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ==========================================================================
        1. HERO SECTION & STATS COUNTER (BASE STYLE LAPTOP)
        ========================================================================== */
        .hero-kegiatan {
            padding: 60px 0 40px 0;
            background: #fcfbf7;
            position: relative;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 5fr 7fr;
            gap: 40px;
            align-items: center;
        }

        .hero-left .tag {
            font-size: 0.85rem;
            text-transform: uppercase;
            color: #facc15;
            font-weight: 700;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 12px;
        }

        .hero-left h1 {
            font-size: 3rem;
            color: #0f6b3b;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero-left h1 span {
            font-family: 'Playfair Display', serif;
            color: #facc15;
            font-style: italic;
            font-weight: 700;
        }

        .hero-left p {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #666;
            margin-bottom: 30px;
            max-width: 480px;
        }

        .btn-jelajah {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #0f6b3b;
            color: white;
            padding: 14px 28px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-jelajah:hover {
            background: #0b522c;
            transform: translateY(-2px);
        }

        .hero-right {
            position: relative;
        }

        .image-mask-wrapper {
            width: 100%;
            position: relative;
            display: inline-block;
        }

        .image-mask-wrapper img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 200px 200px 0 200px;
        }

        /* ==========================================================================
        2. MINI STATS - LAPTOP PREMIUM STYLE
        ========================================================================== */
        .hero-stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            margin-top: 50px;
            background: #ffffff;
            padding: 25px 15px;
            border-radius: 24px;
            box-shadow: 0 10px 35px rgba(15, 107, 59, 0.04), 0 4px 12px rgba(0, 0, 0, 0.01);
            border: 1px solid #f3f4f6;
        }

        .stat-mini-box {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 0 20px;
            position: relative;
            transition: transform 0.3s ease;
        }

        .stat-mini-box:not(:last-child)::after {
            content: "";
            position: absolute;
            right: 0;
            top: 15%;
            height: 70%;
            width: 1px;
            background: #eaeaea;
        }

        .stat-mini-box .icon-container {
            width: 48px;
            height: 48px;
            background: #f0f7f4;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .stat-mini-box-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .stat-mini-box h3 {
            font-size: 1.35rem;
            color: #0f6b3b;
            font-weight: 800;
            line-height: 1.1;
            margin: 0 0 3px 0;
            letter-spacing: -0.5px;
        }

        .stat-mini-box p {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 500;
            margin: 0;
            white-space: nowrap; /* Di laptop aman menggunakan satu baris panjang */
        }

        .stat-mini-box:hover {
            transform: translateY(-2px);
        }
        .stat-mini-box:hover .icon-container {
            background: #0f6b3b;
            transform: scale(1.05);
        }

        /* ==========================================================================
        3. PERBAIKAN TOTAL MOBILE OPTIMIZATION (max-width: 768px)
        ========================================================================== */
        @media screen and (max-width: 768px) {
            .hero-kegiatan {
                padding: 0 0 25px 0 !important;
                overflow-x: hidden !important; /* Kunci pelindung kontainer luar */
            }

            .hero-grid {
                display: flex !important;
                flex-direction: column !important;
                gap: 20px !important;
                width: 100% !important;
            }

            /* --- HERO IMAGE (ATAS FULL-WIDTH) --- */
            .hero-right {
                order: 1 !important;
                width: calc(100% + 40px) !important; /* Menutup padding kanan-kiri container asli */
                margin-left: -20px !important;
                margin-right: -20px !important;
                position: relative !important;
            }

            .image-mask-wrapper {
                width: 100% !important;
            }

            .image-mask-wrapper img {
                width: 100% !important;
                height: 220px !important;
                object-fit: cover !important;
                border-radius: 0 0 100px 100px / 0 0 30px 30px !important; /* Efek lengkung halus presisi */
            }

            /* --- HERO TEXT (TENGAH) --- */
            .hero-left {
                order: 2 !important;
                width: 100% !important;
                padding: 0 5px !important;
            }

            .hero-left .tag {
                font-size: 0.75rem !important;
                margin-bottom: 6px !important;
            }

            .hero-left h1 {
                font-size: 1.6rem !important;
                line-height: 1.2 !important;
                margin-bottom: 12px !important;
            }

            .hero-left p {
                font-size: 0.8rem !important;
                line-height: 1.45 !important;
                margin-bottom: 15px !important;
            }

            .btn-jelajah {
                padding: 10px 20px !important;
                font-size: 0.8rem !important;
            }

            /* --- FIXING ANTI-BREAK: GRID STATS BOX (BAWAH) --- */
            .hero-stats-row {
                grid-template-columns: repeat(2, 1fr) !important; /* Menggunakan grid 2x2 */
                gap: 12px 8px !important; /* Margin celah antar boks diminimalkan */
                padding: 15px 10px !important;
                border-radius: 16px !important;
                margin-top: 20px !important;
                width: 100% !important;
                box-sizing: border-box !important;
            }

            .stat-mini-box {
                padding: 0 4px !important;
                gap: 8px !important; /* Merapatkan jarak ikon dan teks di HP */
                width: 100% !important;
                overflow: hidden !important;
            }

            .stat-mini-box:not(:last-child)::after {
                display: none !important; /* Matikan pseudo-border laptop */
            }

            .stat-mini-box .icon-container {
                width: 36px !important; /* Mengecilkan box icon */
                height: 36px !important;
                border-radius: 10px !important;
                font-size: 1rem !important;
            }

            .stat-mini-box h3 {
                font-size: 1rem !important;
                margin-bottom: 1px !important;
            }

            /* SOLUSI KUNCI: Matikan paksaan satu baris agar teks bisa melipat ke bawah saat layar sempit */
            .stat-mini-box p {
                font-size: 0.68rem !important;
                white-space: normal !important; /* Memperbolehkan teks turun baris di HP */
                line-height: 1.2 !important;
                word-break: break-word !important;
            }
        }

        /* ==========================================================================
        2. KEGIATAN UNGGULAN (GRID CARD GAMBAR)
        ========================================================================== */
        .kegiatan-unggulan {
            padding: 30px 0;
        }

        /* Section Header dengan Flex untuk Judul + Link Lihat Semua */
        .section-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .main-title-decorated {
            color: #0f6b3b;
            font-size: 1.4rem;
            font-weight: 700;
            position: relative;
            padding-bottom: 8px;
        }

        .main-title-decorated::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 35px;
            height: 3px;
            background: #facc15;
        }

        .link-lihat-semua {
            color: #0f6b3b;
            font-size: 0.85rem;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .link-lihat-semua:hover {
            text-decoration: underline;
        }

        /* Grid Card Kegiatan */
        .kegiatan-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .kegiatan-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #f1f1f1;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .kegiatan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .kg-img-box {
            position: relative;
            width: 100%;
            height: 160px;
            overflow: hidden;
        }

        .kg-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .kegiatan-card:hover .kg-img-box img {
            transform: scale(1.05);
        }

        .badge-tag-kg {
            position: absolute;
            bottom: 12px;
            left: 12px;
            background: rgba(255,255,255,0.9);
            color: #0f6b3b;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 50px;
            backdrop-filter: blur(4px);
        }

        .kg-body {
            padding: 20px;
            position: relative;
        }

        .kg-body h4 {
            font-size: 1rem;
            color: #0f6b3b;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .kg-body p {
            font-size: 0.78rem;
            color: #666;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .btn-arrow-circle {
            position: absolute;
            bottom: 15px;
            right: 20px;
            width: 32px;
            height: 32px;
            border: 1px solid #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0f6b3b;
            text-decoration: none;
            transition: all 0.3s;
        }

        .kegiatan-card:hover .btn-arrow-circle {
            background: #0f6b3b;
            color: white;
            border-color: #0f6b3b;
        }

        /* Responsive Grid */
        @media (max-width: 992px) {
            .kegiatan-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .kegiatan-grid {
                grid-template-columns: 1fr;
            }
            
            .section-header-flex {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }

        /* ==========================================================================
           4. MANFAAT KEGIATAN & CTA BOX
           ========================================================================== */
        .manfaat-cta-section {
            padding: 50px 0;
        }

        .manfaat-grid-layout {
            display: grid;
            grid-template-columns: 7fr 5fr;
            gap: 30px;
            align-items: stretch;
        }

        .manfaat-subgrid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .manfaat-box {
            background: white;
            padding: 20px;
            border-radius: 16px;
            border: 1px solid #f1f1f1;
            display: flex;
            gap: 14px;
            align-items: flex-start;
        }

        .m-icon-square {
            width: 40px;
            height: 40px;
            background: #f4f9f6;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .m-text-info h4 {
            font-size: 0.92rem;
            color: #0f6b3b;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .m-text-info p {
            font-size: 0.75rem;
            color: #666;
            line-height: 1.4;
        }

        /* CTA Card Box Terakhir di gambar */
        .cta-join-card {
            background: #f5f8f2;
            border-radius: 20px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            border: 1px solid #eaf0e4;
        }

        .cta-join-card h3 {
            font-size: 1.3rem;
            color: #0f6b3b;
            font-weight: 800;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .cta-join-card p {
            font-size: 0.8rem;
            color: #555;
            line-height: 1.5;
            margin-bottom: 20px;
            max-width: 240px;
        }

        .btn-cta-all {
            align-self: flex-start;
            background: #064e26;
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.82rem;
            text-decoration: none;
            transition: background 0.3s;
        }

        .btn-cta-all:hover {
            background: #0f6b3b;
        }

        /* Ilustrasi Trofi & Bola kaki pojok kanan bawah boks CTA */
        .cta-illustration {
            position: absolute;
            bottom: -10px;
            right: 10px;
            width: 110px;
            height: auto;
            opacity: 0.95;
        }

        /* ==========================================================================
           5. MOMEN KEGIATAN (GALLERY ROW)
           ========================================================================== */
        .momen-section {
            padding: 40px 0 60px 0;
        }

        .momen-slider-wrapper {
            position: relative;
        }

        .momen-grid-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .momen-img-card {
            width: 100%;
            height: 180px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.02);
        }

        .momen-img-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .momen-img-card:hover img {
            transform: scale(1.06);
        }

        /* Panah Navigasi Mini Slider Bulat */
        .nav-arrows-container {
            display: flex;
            gap: 8px;
        }

        .arrow-mini-btn {
            width: 32px;
            height: 32px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.8rem;
            color: #666;
            transition: all 0.3s;
        }

        .arrow-mini-btn:hover {
            background: #0f6b3b;
            color: white;
            border-color: #0f6b3b;
        }

        /* ==========================================================================
           OPTIMASI RESPONSIVE SMARTPHONE (max-width: 768px)
           ========================================================================== */
        @media screen and (max-width: 768px) {
            .hero-grid {
                grid-template-columns: 1fr !important;
                gap: 30px !important;
                text-align: center;
            }

            .hero-left h1 {
                font-size: 2.2rem !important;
            }

            .hero-left p {
                margin: 0 auto 25px auto !important;
            }

            .image-mask-wrapper img {
                border-radius: 120px 120px 0 120px !important;
            }

            .floating-char-card {
                right: 10px !important;
                bottom: 10px !important;
                padding: 12px !important;
                max-width: 220px !important;
            }

            .hero-stats-row {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 15px !important;
                padding: 15px !important;
            }

            /* Kegiatan Unggulan 4 kolom laptop diubah menjadi 2 kolom di HP */
            .kegiatan-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 12px !important;
            }

            .kg-img-box {
                height: 110px !important;
            }

            .kg-body {
                padding: 12px !important;
            }

            .kg-body h4 {
                font-size: 0.85rem !important;
            }

            .kg-body p {
                font-size: 0.7rem !important;
                margin-bottom: 15px !important;
            }

            .btn-arrow-circle {
                bottom: 8px !important;
                right: 10px !important;
                width: 26px !important;
                height: 26px !important;
                font-size: 0.7rem !important;
            }

            /* Manfaat & Kotak CTA diatur menumpuk vertikal lurus */
            .manfaat-grid-layout {
                grid-template-columns: 1fr !important;
                gap: 25px !important;
            }

            .manfaat-subgrid {
                grid-template-columns: 1fr !important; /* Satu Kolom penuh di HP agar teks aman */
            }

            /* Momen Foto Kegiatan diatur 2x2 grid */
            .momen-grid-row {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 10px !important;
            }

            .momen-img-card {
                height: 110px !important;
            }
        }
    </style>
</head>
<?php include_once 'layout/header.php'; ?>
<body>

    <section class="hero-kegiatan">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-left">
                    <span class="tag">| Kegiatan</span>
                    <h1>Aktif Berkarya,<br><span>Berekspresi Bersama</span></h1>
                    <p>Kami menghadirkan berbagai kegiatan belajar, pengembangan diri, dan program sekolah yang membentuk karakter, kreativitas, dan kepemimpinan siswa.</p>
                    <a href="#kegiatan-utama" class="btn-jelajah">Jelajahi Kegiatan ➔</a>
                </div>
                
                <div class="hero-right">
                    <div class="image-mask-wrapper">
                        <img src="img/kegiatan.png" alt="Siswa MI Al Karomah Aktif">
                    </div>
                </div>
            </div>

            <div class="hero-stats-row">
                <div class="stat-mini-box">
                    <div class="icon-container">🌿</div>
                    <div><h3>25+</h3><p>Program Kegiatan</p></div>
                </div>
                <div class="stat-mini-box">
                    <div class="icon-container">👦</div>
                    <div><h3>250+</h3><p>Siswa Aktif</p></div>
                </div>
                <div class="stat-mini-box">
                    <div class="icon-container">👩‍🏫</div>
                    <div><h3>30+</h3><p>Guru Pembina</p></div>
                </div>
                <div class="stat-mini-box">
                    <div class="icon-container">🏆</div>
                    <div><h3>5</h3><p>Bidang Kegiatan</p></div>
                </div>
            </div>
        </div>
    </section>

    <section id="kegiatan-utama" class="kegiatan-unggulan">
    <div class="container">
        
        <div class="section-header-flex">
            <h3 class="main-title-decorated">Kegiatan Utama</h3>
            <a href="kegiatan.php" class="link-lihat-semua">Lihat Semua Kegiatan ➔</a>
        </div>

        <div class="kegiatan-grid">
            <?php if (mysqli_num_rows($queryKegiatan) > 0): ?>
                <?php while ($kg = mysqli_fetch_assoc($queryKegiatan)): ?>
                    
                    <div class="kegiatan-card">
                        <div class="kg-img-box">
                            <img src="assets/kegiatan/<?= $kg['gambar']; ?>" 
                                 alt="<?= htmlspecialchars($kg['judul']); ?>" 
                                 onerror="this.src='upload/default.jpg'">
                            
                            <span class="badge-tag-kg">
                                <?= htmlspecialchars($kg['kategori']); ?>
                            </span>
                        </div>
                        
                        <div class="kg-body">
                            <h4><?= htmlspecialchars($kg['judul']); ?></h4>
                            
                            <p><?= htmlspecialchars(substr($kg['deskripsi'], 0, 100)); ?>...</p>
                            
                            <a href="kegiatan_detail.php?slug=<?= $kg['slug']; ?>" class="btn-arrow-circle">➔</a>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>

                <div class="empty-kegiatan" style="grid-column: 1/-1; text-align: center; padding: 40px; color: #6b7280;">
                    <i class="fas fa-folder-open" style="font-size: 40px; margin-bottom: 10px;"></i>
                    <h3>Belum Ada Kegiatan</h3>
                    <p>Data kegiatan saat ini belum tersedia.</p>
                </div>

            <?php endif; ?>
        </div>

    </div>
</section>

    <section class="manfaat-cta-section">
        <div class="container">
            <div class="manfaat-grid-layout">
                <div>
                    <div class="section-header-flex" style="margin-bottom: 20px;">
                        <h3 class="main-title-decorated">Manfaat Kegiatan</h3>
                    </div>
                    <div class="manfaat-subgrid">
                        <div class="manfaat-box">
                            <div class="m-icon-square">🚀</div>
                            <div class="m-text-info">
                                <h4>Pengembangan Diri</h4>
                                <p>Meningkatkan potensi, bakat, dan rasa percaya diri siswa.</p>
                            </div>
                        </div>
                        <div class="manfaat-box">
                            <div class="m-icon-square">🛡️</div>
                            <div class="m-text-info">
                                <h4>Karakter Positif</h4>
                                <p>Menumbuhkan akhlak mulia dan rasa tanggung jawab.</p>
                            </div>
                        </div>
                        <div class="manfaat-box">
                            <div class="m-icon-square">🏆</div>
                            <div class="m-text-info">
                                <h4>Prestasi Siswa</h4>
                                <p>Mendukung siswa meraih prestasi di berbagai bidang pilihan.</p>
                            </div>
                        </div>
                        <div class="manfaat-box">
                            <div class="m-icon-square">🤝</div>
                            <div class="m-text-info">
                                <h4>Kepedulian Sosial</h4>
                                <p>Membentuk kepedulian terhadap lingkungan dan sesama.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cta-join-card">
                    <div>
                        <h3>Jadilah Bagian dari<br>Kegiatan Kami!</h3>
                        <p>Temukan kegiatan yang sesuai dengan minat dan bakat Anda.</p>
                    </div>
                    <a href="#" class="btn-cta-all">Lihat Semua Kegiatan ➔</a>
                    
                    <svg class="cta-illustration" viewBox="0 0 100 100" fill="none">
                        <circle cx="75" cy="75" r="20" fill="#facc15" opacity="0.3"/>
                        <path d="M40 30h20v20c0 11-9 20-20 20s-20-9-20-20V30z" fill="#facc15" opacity="0.4"/>
                        <path d="M50 70v15M35 85h30" stroke="#facc15" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section class="momen-section">
        <div class="container">
            <div class="section-header-flex">
                <h3 class="main-title-decorated">Momen Kegiatan</h3>
                <div class="nav-arrows-container">
                    <div class="arrow-mini-btn">❮</div>
                    <div class="arrow-mini-btn">❯</div>
                </div>
            </div>

            <div class="momen-grid-row">
                <div class="momen-img-card"><img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=300&q=80" alt="Momen 1"></div>
                <div class="momen-img-card"><img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=300&q=80" alt="Momen 2"></div>
                <div class="momen-img-card"><img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=300&q=80" alt="Momen 3"></div>
                <div class="momen-img-card"><img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=300&q=80" alt="Momen 4"></div>
            </div>
        </div>
    </section>

<?php include_once 'layout/footer.php'; ?>
</body>
</html>
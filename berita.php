<?php
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Informasi & Berita - MI Al Karomah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: #f9faf8;
            color: #1e2a2e;
        }
        
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ========== HERO BERITA (BERITA UTAMA) ========== */
        .hero-news {
            padding: 40px 0 0 0;
        }
        
        .hero-news-container {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 0;
            background: white;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .hero-news-container:hover {
            box-shadow: 0 25px 50px rgba(0,0,0,0.12);
        }
        
        .hero-news-content {
            padding: 48px;
            background: linear-gradient(135deg, #ffffff 0%, #fefce8 100%);
        }
        
        .hero-news-category {
            display: inline-block;
            background: linear-gradient(135deg, #facc15 0%, #f59e0b 100%);
            color: #064e3b;
            padding: 6px 18px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 8px rgba(250,204,21,0.3);
        }
        
        .hero-news-content h2 {
            font-size: 2rem;
            color: #0f6b3b;
            margin-bottom: 16px;
            line-height: 1.3;
            font-weight: 700;
        }
        
        .hero-news-meta {
            display: flex;
            gap: 24px;
            margin: 20px 0;
            font-size: 0.8rem;
            color: #888;
            flex-wrap: wrap;
        }
        
        .hero-news-meta i {
            margin-right: 8px;
            color: #facc15;
        }
        
        .hero-news-content p {
            color: #555;
            line-height: 1.7;
            margin-bottom: 28px;
            font-size: 0.95rem;
        }
        
        .read-more-btn {
            background: #0f6b3b;
            color: white;
            padding: 12px 32px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(15,107,59,0.25);
        }
        
        .read-more-btn:hover {
            background: #064e2b;
            transform: translateX(6px);
            gap: 14px;
            box-shadow: 0 6px 16px rgba(15,107,59,0.35);
        }
        
        .hero-news-image {
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .hero-news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .hero-news-container:hover .hero-news-image img {
            transform: scale(1.05);
        }

        /* ========== FILTER KATEGORI ========== */
        .filter-section {
            padding: 48px 0 32px 0;
        }
        
        .filter-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            background: white;
            padding: 20px 28px;
            border-radius: 60px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            border: 1px solid #f0f2f0;
        }
        
        .filter-categories {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            background: #f8fafc;
            border: none;
            padding: 10px 28px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
            color: #334155;
        }
        
        .filter-btn.active, .filter-btn:hover {
            background: #0f6b3b;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(15,107,59,0.3);
        }
        
        .search-news {
            display: flex;
            gap: 12px;
        }
        
        .search-news input {
            padding: 10px 20px;
            border-radius: 40px;
            border: 1.5px solid #e2e8f0;
            font-family: 'Poppins', sans-serif;
            width: 260px;
            transition: all 0.3s;
            font-size: 0.85rem;
        }
        
        .search-news input:focus {
            outline: none;
            border-color: #0f6b3b;
            box-shadow: 0 0 0 3px rgba(15,107,59,0.1);
        }
        
        .search-news button {
            background: #0f6b3b;
            border: none;
            padding: 0 24px;
            border-radius: 40px;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .search-news button:hover {
            background: #064e2b;
            transform: scale(1.02);
        }

        /* ========== DAFTAR BERITA (GRID) ========== */
        .news-grid-section {
            padding: 32px 0 60px 0;
            background: #f9faf8;
        }
        
        .section-title {
            font-size: 1.8rem;
            color: #0f6b3b;
            margin-bottom: 32px;
            position: relative;
            display: inline-block;
            font-weight: 700;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, #facc15, #f59e0b);
            border-radius: 4px;
        }
        
        /* Modifikasi responsif grid agar muat 2 kolom di dalam layout kiri */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
            margin-top: 24px;
        }
        
        .news-card {
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0,0,0,0.04);
            transition: all 0.4s;
            cursor: pointer;
        }
        
        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }
        
        .news-img {
            height: 210px;
            overflow: hidden;
            position: relative;
        }
        
        .news-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .news-card:hover .news-img img {
            transform: scale(1.08);
        }
        
        .news-content {
            padding: 24px;
        }
        
        .news-category {
            display: inline-block;
            background: #e8f0fe;
            color: #0f6b3b;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 5px 14px;
            border-radius: 20px;
            margin-bottom: 14px;
            letter-spacing: 0.3px;
        }
        
        .news-content h3 {
            font-size: 1.2rem;
            margin-bottom: 12px;
            color: #1e2a2e;
            font-weight: 700;
            line-height: 1.4;
            transition: color 0.3s;
        }
        
        .news-card:hover .news-content h3 {
            color: #0f6b3b;
        }
        
        .news-meta {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-bottom: 14px;
            display: flex;
            gap: 16px;
        }
        
        .news-meta i {
            margin-right: 6px;
            color: #facc15;
        }
        
        .news-content p {
            font-size: 0.85rem;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 18px;
        }
        
        .news-link {
            color: #0f6b3b;
            font-weight: 700;
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: gap 0.3s;
        }
        
        .news-link:hover {
            gap: 12px;
        }

        /* ========== SIDEBAR ========== */
        .info-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 48px;
            margin-top: 24px;
        }
        
        .sidebar {
            background: white;
            border-radius: 32px;
            padding: 32px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.04);
            border: 1px solid #f0f2f0;
            align-self: start;
            position: sticky;
            top: 20px;
        }
        
        .sidebar-widget {
            margin-bottom: 36px;
        }
        
        .sidebar-widget:last-child {
            margin-bottom: 0;
        }
        
        .sidebar-widget h3 {
            font-size: 1.3rem;
            color: #0f6b3b;
            margin-bottom: 20px;
            border-left: 4px solid #facc15;
            padding-left: 16px;
            font-weight: 700;
        }
        
        .popular-list {
            list-style: none;
        }
        
        .popular-list li {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f2f0;
            transition: transform 0.3s;
        }
        
        .popular-list li:hover {
            transform: translateX(4px);
        }
        
        .popular-list li:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        
        .popular-list li img {
            width: 75px;
            height: 75px;
            object-fit: cover;
            border-radius: 16px;
            transition: transform 0.3s;
        }
        
        .popular-list li:hover img {
            transform: scale(1.05);
        }
        
        .popular-list li div {
            flex: 1;
        }
        
        .popular-list li a {
            text-decoration: none;
            font-weight: 700;
            color: #1e2a2e;
            transition: color 0.3s;
            font-size: 0.9rem;
            line-height: 1.4;
            display: block;
            margin-bottom: 6px;
        }
        
        .popular-list li a:hover {
            color: #0f6b3b;
        }
        
        .popular-list li span {
            font-size: 0.7rem;
            color: #94a3b8;
        }
        
        .category-list {
            list-style: none;
        }
        
        .category-list li {
            margin-bottom: 14px;
        }
        
        .category-list li a {
            text-decoration: none;
            color: #475569;
            display: flex;
            justify-content: space-between;
            transition: all 0.3s;
            padding: 6px 0;
            font-size: 0.9rem;
        }
        
        .category-list li a:hover {
            color: #0f6b3b;
            transform: translateX(6px);
        }
        
        .category-list li a span {
            background: #f1f5f9;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        
        .archive-list {
            list-style: none;
        }
        
        .archive-list li {
            margin-bottom: 12px;
        }
        
        .archive-list li a {
            text-decoration: none;
            color: #475569;
            transition: all 0.3s;
            display: block;
            padding: 6px 0;
            font-size: 0.9rem;
        }
        
        .archive-list li a:hover {
            color: #0f6b3b;
            transform: translateX(6px);
        }

        /* ========== PAGINATION ========== */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 52px;
        }
        
        .pagination a {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 50%;
            text-decoration: none;
            color: #0f6b3b;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            transition: all 0.3s;
            border: 1px solid #e2e8f0;
        }
        
        .pagination a.active, .pagination a:hover {
            background: #0f6b3b;
            color: white;
            border-color: #0f6b3b;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(15,107,59,0.25);
        }

        /* ========== CTA SECTION ========== */
        .cta-section {
            padding: 0 0 60px 0;
        }
        
        .cta {
            background: linear-gradient(135deg, #0f6b3b 0%, #1ea35b 100%);
            color: white;
            text-align: center;
            padding: 56px 32px;
            border-radius: 40px;
            box-shadow: 0 20px 40px rgba(15,107,59,0.25);
        }
        
        .cta h3 {
            font-size: 1.7rem;
            margin-bottom: 24px;
            font-weight: 700;
        }
        
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-primary {
            background: #facc15;
            color: #064e3b;
            padding: 14px 36px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .btn-primary:hover {
            background: #fbbf24;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        .btn-outline {
            border: 2px solid white;
            color: white;
            padding: 14px 36px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s;
            background: transparent;
        }
        
        .btn-outline:hover {
            background: white;
            color: #0f6b3b;
            transform: translateY(-2px);
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 992px) {
            .hero-news-container {
                grid-template-columns: 1fr;
            }
            
            .info-layout {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            
            .sidebar {
                position: static;
            }
            
            .hero-news-image {
                height: 280px;
            }
            
            .hero-news-content {
                padding: 32px;
            }
            
            .hero-news-content h2 {
                font-size: 1.6rem;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 0 16px;
            }
            
            .news-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
            
            .filter-wrapper {
                flex-direction: column;
                align-items: stretch;
                border-radius: 32px;
                padding: 20px;
            }
            
            .filter-categories {
                justify-content: center;
            }
            
            .search-news input {
                width: 100%;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .cta h3 {
                font-size: 1.3rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-primary, .btn-outline {
                width: 100%;
                max-width: 250px;
                text-align: center;
            }
        }
        
        @media (max-width: 480px) {
            .hero-news-content h2 {
                font-size: 1.3rem;
            }
            
            .hero-news-meta {
                gap: 12px;
                font-size: 0.7rem;
            }
            
            .sidebar {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <?php include 'layout/header.php'; ?>

<section class="hero-news">
    <div class="container">
        <div class="hero-news-container">
            <div class="hero-news-content">
                <span class="hero-news-category">🎉 Pengumuman</span>
                <h2>PPDB MI Al Karomah Tahun Ajaran 2025/2026 Dibuka</h2>
                <div class="hero-news-meta">
                    <span><i class="far fa-calendar-alt"></i> 1 Januari 2025</span>
                    <span><i class="far fa-user"></i> Admin MI</span>
                    <span><i class="far fa-eye"></i> 1.234 dilihat</span>
                </div>
                <p>Pendaftaran peserta didik baru telah dibuka mulai 1 Januari hingga 30 Juni 2025. Informasi lengkap dapat diakses melalui website atau datang langsung ke madrasah. Dapatkan potongan biaya pendaftaran untuk 100 pendaftar pertama!</p>
                <a href="#" class="read-more-btn">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="hero-news-image">
                <img src="https://picsum.photos/id/183/600/400" alt="PPDB MI Al Karomah">
            </div>
        </div>
    </div>
</section>

<section class="filter-section">
    <div class="container">
            <div class="search-news">
                <form action="berita.php" method="GET" style="display: flex; width: 100%;">
                    <input type="text" name="keyword" placeholder="Cari berita..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                    <button type="submit"><i class="fas fa-search"></i> Cari</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="news-grid-section">
    <div class="container">
        <div class="info-layout">
            <div>
                <div class="section-title">📰 Berita Terbaru</div>
                <div class="news-grid">
                    
                    <?php 
                    // ==========================================================================
                    // LOGIKA BARU: MENANGKAP KATA KUNCI PENCARIAN DARI INPUT FORM
                    // ==========================================================================
                    if (isset($_GET['keyword']) && trim($_GET['keyword']) !== '') {
                        // Mengamankan string input dari SQL Injection
                        $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
                        
                        // Query pencarian: mencari teks yang mirip di kolom 'judul' atau 'isi' berita
                        $sql = "SELECT * FROM berita WHERE status = 'publish' AND (judul LIKE '%$keyword%' OR isi LIKE '%$keyword%') ORDER BY id DESC";
                    } else {
                        // Query normal: tampilkan berita default jika tidak ada pencarian (dibatasi 6 berita)
                        $sql = "SELECT * FROM berita WHERE status = 'publish' ORDER BY id DESC LIMIT 6";
                    }
                    
                    // Eksekusi query gabungan di atas
                    $query_berita = mysqli_query($conn, $sql);
                    // ==========================================================================
                    
                    if(mysqli_num_rows($query_berita) > 0):
                        while($b = mysqli_fetch_assoc($query_berita)) : 
                            
                            // Ambil kategori dari database
                            $kategori = htmlspecialchars($b['kategori']);
                            
                            // Logika penanganan ikon badge kategori secara dinamis
                            if(strpos(strtolower($kategori), 'agenda') !== false || strpos(strtolower($kategori), 'kegiatan') !== false) {
                                $badge_kat = "🎨 " . $kategori;
                            } elseif (strtolower($kategori) == 'prestasi') {
                                $badge_kat = "🏆 " . $kategori;
                            } elseif (strtolower($kategori) == 'pengumuman') {
                                $badge_kat = "📢 " . $kategori;
                            } else {
                                $badge_kat = "📌 " . $kategori;
                            }

                            // MENYESUAIKAN DATABASE: Menggunakan kolom 'thumbnail' sesuai phpMyAdmin kamu
                            $foto_berita = !empty($b['thumbnail']) ? $b['thumbnail'] : 'default-berita.jpg';
                    ?>
                    
                    <div class="news-card">
                        <div class="news-img">
                            <img src="assets/berita/<?= $foto_berita; ?>" onerror="this.src='assets/berita/default-berita.jpg'" alt="<?= htmlspecialchars($b['judul']); ?>">
                        </div>
                        <div class="news-content">
                            <span class="news-category"><?= $badge_kat; ?></span>
                            
                            <h3><?= htmlspecialchars($b['judul']); ?></h3>
                            
                            <div class="news-meta">
                                <span><i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($b['created_at'])); ?></span>
                                <span><i class="far fa-user"></i> <?= htmlspecialchars($b['penulis']); ?></span>
                            </div>
                            
                            <p><?= substr(strip_tags($b['isi']), 0, 100); ?>...</p>
                            
                            <a href="detail_berita.php?id=<?= $b['id']; ?>" class="news-link">Selengkapnya →</a>
                        </div>
                    </div>

                    <?php 
                        endwhile; 
                    else: 
                    ?>
                        <div class="empty-state" style="grid-column: span 2; text-align: center; padding: 40px; color: #9ca3af;">
                            <i class="fas fa-search" style="font-size: 32px; display: block; margin-bottom: 12px;"></i>
                            <?php if (isset($_GET['keyword'])) : ?>
                                Berita dengan kata kunci "<strong><?= htmlspecialchars($_GET['keyword']); ?></strong>" tidak ditemukan.<br>
                                <a href="berita.php" style="color: #0f6b3b; display: inline-block; margin-top: 10px; font-weight: bold; text-decoration: underline;">Kembali Tampilkan Semua Berita</a>
                            <?php else : ?>
                                Belum ada berita yang diterbitkan.
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div> <div class="pagination">
                    <a href="#">«</a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">»</a>
                </div>
            </div>

            <aside class="sidebar">
                <div class="sidebar-widget">
                    <h3>🔥 Berita Populer</h3>
                    <ul class="popular-list">
                        <li>
                            <img src="https://picsum.photos/id/1/80/80" alt="Thumb">
                            <div>
                                <a href="#">PPDB 2025/2026 Resmi Dibuka</a>
                                <span><i class="far fa-calendar-alt"></i> 1 Januari 2025</span>
                            </div>
                        </li>
                        <li>
                            <img src="https://picsum.photos/id/2/80/80" alt="Thumb">
                            <div>
                                <a href="#">Peringatan Isra Mi'raj 1446 H</a>
                                <span><i class="far fa-calendar-alt"></i> 20 Februari 2025</span>
                            </div>
                        </li>
                        <li>
                            <img src="https://picsum.photos/id/3/80/80" alt="Thumb">
                            <div>
                                <a href="#">Juara Umum Lomba MAPSI</a>
                                <span><i class="far fa-calendar-alt"></i> 15 Januari 2025</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-widget">
                    <h3>📂 Kategori</h3>
                    <ul class="category-list">
                        <li><a href="#">📢 Pengumuman <span>12</span></a></li>
                        <li><a href="#">🏆 Prestasi <span>8</span></a></li>
                        <li><a href="#">🎨 Kegiatan <span>15</span></a></li>
                        <li><a href="#">📝 Artikel <span>6</span></a></li>
                    </ul>
                </div>
                <div class="sidebar-widget">
                    <h3>📅 Arsip</h3>
                    <ul class="archive-list">
                        <li><a href="#">Januari 2025 <span style="float:right">(4)</span></a></li>
                        <li><a href="#">Februari 2025 <span style="float:right">(3)</span></a></li>
                        <li><a href="#">Maret 2025 <span style="float:right">(7)</span></a></li>
                        <li><a href="#">April 2025 <span style="float:right">(5)</span></a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta">
            <h3>📧 Dapatkan informasi terbaru dari MI Al Karomah</h3>
            <p style="margin-bottom: 28px; opacity: 0.95;">Langganan newsletter kami untuk update kegiatan dan prestasi terbaru</p>
            <div class="cta-buttons">
                <a href="#" class="btn-primary"><i class="fas fa-envelope"></i> Berlangganan Newsletter</a>
                <a href="#" class="btn-outline"><i class="fas fa-headset"></i> Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>

<script>
    const filterBtns = document.querySelectorAll('.filter-btn');
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            console.log('Filter aktif: ' + this.innerText);
        });
    });
</script>

<?php include 'layout/footer.php'; ?>
</body>
</html>
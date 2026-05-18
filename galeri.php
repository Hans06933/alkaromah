<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Galeri MI Al Karomah - Momen Pembelajaran & Prestasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,700&display=swap" rel="stylesheet">
    
    <style>
        /* ==========================================================================
           1. RESET GLOBAL & VARIABEL TEMA (MI AL KAROMAH)
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #f7f6f0; /* Latar belakang krem hangat sesuai contoh gambar */
            color: #2d3748;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ==========================================================================
           3. HERO BANNER ATAS (LENGKUNG PERAHU GREEN-GOLD DENGAN SILUET)
           ========================================================================== */
        .hero-galeri {
            background: #ffffff;
            padding-bottom: 30px;
        }

        /* ==========================================================================
           PERBAIKAN HERO BANNER: BACKGROUND GAMBAR DENGAN OVERLAY GELAP
           ========================================================================== */
        .banner-masque {
            position: relative;
            /* Lapisan dasar warna hijau khas jika gambar gagal dimuat */
            background: #0f6b3b; 
            border-radius: 0 0 150px 150px / 0 0 40px 40px;
            padding: 60px 20px;
            text-align: center;
            overflow: hidden;
            border-bottom: 4px solid #facc15;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* Handler Utama Gambar Latar Belakang & Efek Gelap */
        .banner-masque .banner-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* 1. Silakan ganti nama_file_gambar.jpg dengan nama gambar di folder img Anda */
            /* 2. Linear gradient di bawah ini berfungsi sebagai kaca film gelap (opacity 75% - 85%) */
            background: linear-gradient(135deg, rgba(5, 43, 23, 0.85) 0%, rgba(15, 107, 59, 0.75) 100%), 
                        url('img/nama_file_gambar.jpg') center center no-repeat;
            background-size: cover;
            z-index: 1;
            transform: scale(1.02); /* Sedikit diperbesar mencegah kebocoran pixel di sudut melengkung */
        }

        /* Ornamen masjid tetap dipertahankan menumpuk manis di atas gambar */
        .banner-masque::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("img/akademik.png") bottom center no-repeat;
            background-size: cover;
            opacity: 0.25;
            z-index: 2; /* Di atas gambar background, di bawah teks */
            pointer-events: none;
        }

        .banner-content {
            position: relative;
            z-index: 3; /* Dipaksa naik ke lapisan paling atas agar tidak tertutup */
            max-width: 800px;
            margin: 0 auto;
        }

        /* Render Sempurna Desain Logo Kamera + Buku Emas */
        .camera-book-icon {
            width: 120px;
            height: auto;
            margin: 0 auto 12px auto;
            display: block;
        }

        .banner-content h1 {
            color: #facc15; /* Judul Emas */
            font-size: 2.1rem;
            font-weight: 800;
            line-height: 1.3;
            letter-spacing: -0.3px;
        }

        .banner-content h1 span {
            color: #ffffff; /* Sub-judul Putih */
            font-weight: 700;
            font-size: 1.8rem;
            display: block;
            margin-top: 5px;
        }

        /* ==========================================================================
           4. INTRO SECTION & TOMBOL FILTER KATEGORI BULAT
           ========================================================================== */
        .intro-section {
            text-align: center;
            padding: 40px 0 20px 0;
        }

        .intro-section h2 {
            font-size: 2rem;
            color: #1a202c;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .intro-section p {
            font-size: 0.95rem;
            color: #4a5568;
            font-weight: 600;
        }

        /* ==========================================================================
           5. SUSUNAN GRID UTAMA (ASIMETRIS KIRI & KANAN)
           ========================================================================== */
        .galeri-composite-grid {
            display: grid;
            grid-template-columns: 8fr 4fr; /* Kiri Lebar, Kanan Panel Info */
            gap: 25px;
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .left-grid-flow {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        /* Item Kiri Atas Berukuran Besar (Highlight Utama) */
        .card-galeri.big-highlight {
            grid-column: span 2;
            border: 3px solid #facc15; /* Bingkai Emas Terang */
        }

        .card-galeri {
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            position: relative;
            border: 1px solid #e2e8f0;
            height: 100%;
            min-height: 250px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }

        .img-container-galeri {
            width: 100%;
            height: 100%;
            position: relative;
            background: #edf2f7;
            flex-grow: 1;
        }

        .img-container-galeri img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }

        /* Overlay Keterangan Teks di Dalam Foto */
        .card-overlay-details {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.3) 70%, transparent 100%);
            color: #ffffff;
        }

        .card-overlay-details h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 4px;
            color: #ffffff;
        }

        .big-highlight .card-overlay-details h3 {
            font-size: 1.3rem;
        }

        .card-overlay-details p {
            font-size: 0.75rem;
            color: #cbd5e0;
        }

        /* Right Panel: Informasi Pembantu Sisi Kanan */
        .right-panel-info {
            background: #ffffff;
            border-radius: 18px;
            padding: 25px;
            border: 1px solid #e2e8f0;
            height: fit-content;
        }

        .right-panel-info h3 {
            font-size: 1.15rem;
            color: #1a202c;
            font-weight: 800;
            margin-bottom: 22px;
            padding-bottom: 8px;
            border-bottom: 1px solid #edf2f7;
        }

        .info-list-item {
            display: flex;
            gap: 15px;
            align-items: center;
            padding-bottom: 16px;
            margin-bottom: 16px;
        }

        .info-list-item:not(:last-child) {
            border-bottom: 1px solid #f7fafc;
        }

        .info-icon-circle {
            width: 36px;
            height: 36px;
            background: #0f6b3b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .info-texts h4 {
            font-size: 0.88rem;
            color: #1a202c;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .info-texts p {
            font-size: 0.75rem;
            color: #718096;
        }

        /* ==========================================================================
           6. BOTTOM ROW GALLERY GRID (6 KOLOM SEJAJAR DI DESKTOP)
           ========================================================================== */
        .bottom-row-gallery {
            display: grid;
            grid-template-columns: repeat(6, 1fr); /* Tepat 6 kolom sejajar horizontal */
            gap: 15px;
            margin-bottom: 50px;
        }

        .bottom-row-gallery .card-galeri {
            min-height: 170px;
            border-radius: 14px;
        }

        .bottom-row-gallery .card-overlay-details {
            padding: 12px;
        }

        .bottom-row-gallery .card-overlay-details h3 {
            font-size: 0.85rem;
            font-weight: 700;
        }

        /* ==========================================================================
           8. OPTIMASI RESPONSIVE SMARTPHONE (RESPONSIVE LUAR BIASA AMAN)
           ========================================================================== */
        @media screen and (max-width: 1024px) {
            .galeri-composite-grid { grid-template-columns: 1fr; }
            .bottom-row-gallery { grid-template-columns: repeat(3, 1fr); }
        }

        @media screen and (max-width: 768px) {
            .banner-masque {
                border-radius: 0 0 40px 40px;
                padding: 35px 15px;
            }

            .camera-book-icon { width: 90px; }
            .banner-content h1 { font-size: 1.35rem; }
            .banner-content h1 span { font-size: 1.15rem; }

            .intro-section { padding: 25px 0 10px 0; }
            .intro-section h2 { font-size: 1.3rem; }
            .intro-section p { font-size: 0.8rem; }
            
            /* Geser horizontal kategori di ponsel */
            .filter-wrapper {
                gap: 6px;
                justify-content: flex-start;
                overflow-x: auto;
                padding: 5px 0 12px 0;
                width: 100%;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .filter-btn {
                padding: 6px 14px;
                font-size: 0.75rem;
                display: inline-block;
            }

            /* Konversi Kiri menjadi 1 Kolom Vertikal Penuh */
            .left-grid-flow {
                grid-template-columns: 1fr !important;
                gap: 15px;
            }

            .card-galeri.big-highlight { grid-column: span 1; }
            .card-galeri { min-height: 210px; }
            .img-container-galeri { min-height: 190px; }
            .card-overlay-details h3, .big-highlight .card-overlay-details h3 { font-size: 0.95rem !important; }

            /* Grid Bawah Dikunci Paten Menjadi 2 Kolom Sejajar Tanpa Jebol */
            .bottom-row-gallery {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 10px;
                margin-bottom: 30px;
            }

            .bottom-row-gallery .card-galeri { min-height: 135px; }
            .bottom-row-gallery .card-overlay-details h3 { font-size: 0.78rem; }

        }
    </style>
</head>
<body>
    <?php include_once 'layout/header.php'; ?>

    <section class="hero-galeri">
        <div class="container">
            <div class="banner-masque">
                <div class="banner-bg"></div>
                
                <div class="banner-content">
                    <div class="camera-book-icon">
                        <svg viewBox="0 0 100 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 65c15-4 30-4 45 0M45 65c15-4 30-4 45 0" stroke="#ffffff" stroke-width="3.5" stroke-linecap="round"/>
                            <path d="M10 68c15-4 30-4 45 0M45 68c15-4 30-4 45 0" stroke="#facc15" stroke-width="2" stroke-linecap="round"/>
                            <rect x="20" y="22" width="60" height="36" rx="6" fill="none" stroke="#facc15" stroke-width="4"/>
                            <circle cx="50" cy="40" r="11" fill="none" stroke="#facc15" stroke-width="4"/>
                            <path d="M40 22l3-6h14l3 6" fill="none" stroke="#facc15" stroke-width="3"/>
                        </svg>
                    </div>
                    <h1>Galeri MI Al Karomah:<span>Momen Pembelajaran & Prestasi</span></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="intro-section">
            <h2>Telusuri Kehidupan Madrasah Kami</h2>
            <p>Aktivitas Terkini & Prestasi Siswa-Siswi</p>
        </div>
    </section>

    <main class="container">
        <div class="galeri-composite-grid">
            
            <div class="left-grid-flow">
                
                <div class="card-galeri big-highlight">
                    <div class="img-container-galeri">
                        <img src="images/galeri-highlight.jpg" alt="Momen Akademik Terpilih">
                        <div class="card-overlay-details">
                            <h3>Momen Akademik Terpilih</h3>
                            <p>10 Maret 2026</p>
                        </div>
                    </div>
                </div>

                <div class="card-galeri">
                    <div class="img-container-galeri">
                        <img src="images/galeri-wajah.jpg" alt="Wajah Madrasah">
                        <div class="card-overlay-details">
                            <h3>Wajah Madrasah</h3>
                            <p>20 Maret 2026</p>
                        </div>
                    </div>
                </div>

            </div>

            <aside class="right-panel-info">
                <h3>Informasi Galeri</h3>
                
                <div class="info-list-item">
                    <div class="info-icon-circle">📷</div>
                    <div class="info-texts">
                        <h4>Galeri Pilihan Hari Ini</h4>
                        <p>Koleksi Foto Terupdate Hari Ini</p>
                    </div>
                </div>

                <div class="info-list-item">
                    <div class="info-icon-circle">🏆</div>
                    <div class="info-texts">
                        <h4>Koleksi Prestasi</h4>
                        <p>Koleksi Prestasi Siswa-Siswi</p>
                    </div>
                </div>

                <div class="info-list-item">
                    <div class="info-icon-circle">🎥</div>
                    <div class="info-texts">
                        <h4>Video Terbaru</h4>
                        <p>Video Terbaru Aktivitas Siswa-Siswi</p>
                    </div>
                </div>
            </aside>

        </div>
    </main>

    <section class="container">
        <div class="bottom-row-gallery">
            
            <div class="card-galeri">
                <div class="img-container-galeri">
                    <img src="images/thumb-1.jpg" alt="Sciencer & Science">
                    <div class="card-overlay-details">
                        <h3>Sciencer & Science</h3>
                        <p>13 Mar 2026</p>
                    </div>
                </div>
            </div>

            <div class="card-galeri">
                <div class="img-container-galeri">
                    <img src="images/thumb-2.jpg" alt="Traditional Dance">
                    <div class="card-overlay-details">
                        <h3>Traditional Dance</h3>
                        <p>12 Mar 2026</p>
                    </div>
                </div>
            </div>

            <div class="card-galeri">
                <div class="img-container-galeri">
                    <img src="images/thumb-3.jpg" alt="Siswa Berprestasi">
                    <div class="card-overlay-details">
                        <h3>Siswa Berprestasi</h3>
                        <p>13 Mar 2026</p>
                    </div>
                </div>
            </div>

            <div class="card-galeri">
                <div class="img-container-galeri">
                    <img src="images/thumb-4.jpg" alt="Doa Bersama">
                    <div class="card-overlay-details">
                        <h3>Doa Bersama</h3>
                        <p>18 Mar 2026</p>
                    </div>
                </div>
            </div>

            <div class="card-galeri">
                <div class="img-container-galeri">
                    <img src="images/thumb-5.jpg" alt="Field Trip">
                    <div class="card-overlay-details">
                        <h3>Field Trip</h3>
                        <p>12 Mar 2026</p>
                    </div>
                </div>
            </div>

            <div class="card-galeri">
                <div class="img-container-galeri">
                    <img src="images/thumb-6.jpg" alt="Math Competition">
                    <div class="card-overlay-details">
                        <h3>Math Competition</h3>
                        <p>15 Mar 2026</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php include_once 'layout/footer.php'; ?>
</body>
</html>
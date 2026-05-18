<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Daftar Guru & Tenaga Kependidikan - MI Al Karomah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@1,700&display=swap" rel="stylesheet">
    
    <style>
        /* ==========================================================================
           1. RESET & VARIABLE DASAR (TEMA MI AL KAROMAH)
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #fcfbf7; /* Background cream hangat sesuai tema */
            color: #333333;
            overflow-x: hidden;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ==========================================================================
           2. HERO SECTION Halaman Guru (Mengikuti Karakter Desain Utama)
           ========================================================================== */
        .hero-guru {
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

        /* Hero Right (Gambar Masking Melengkung Khas) */
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
            border-radius: 200px 200px 0 200px; /* Lengkung asimetris premium */
        }

        /* Floating Badge Jumlah Guru */
        .floating-char-card {
            position: absolute;
            bottom: 20px;
            right: -20px;
            background: linear-gradient(135deg, #0f6b3b 0%, #053b1f 100%);
            border-radius: 20px;
            padding: 20px;
            color: white;
            max-width: 280px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .floating-char-card .icon-round {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .floating-char-card h4 {
            font-size: 1.2rem;
            font-weight: 800;
            color: #facc15;
        }

        .floating-char-card p {
            font-size: 0.75rem;
            color: #e2e8f0;
            line-height: 1.3;
        }

        /* ==========================================================================
           3. STATS BAR (SQUIRCLE GRID)
           ========================================================================== */
        .hero-stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            margin-top: 20px;
            margin-bottom: 60px;
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
            color: #0f6b3b;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .stat-mini-box h3 {
            font-size: 1.35rem;
            color: #0f6b3b;
            font-weight: 800;
            margin: 0 0 2px 0;
        }

        .stat-mini-box p {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 500;
            margin: 0;
        }

        /* ==========================================================================
           4. DIREKTORI GURU / GRID KARTU GURU
           ========================================================================== */
        .section-title {
            margin-bottom: 40px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2rem;
            color: #0f6b3b;
            font-weight: 800;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: #facc15;
            border-radius: 2px;
            margin-top: 8px;
        }

        .guru-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-bottom: 8px;
        }

        .card-guru {
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid #f1f1f1;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-guru:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(15, 107, 59, 0.08);
            border-color: #e6f0ea;
        }

        .wrapper-foto-guru {
            width: 100%;
            height: 280px;
            overflow: hidden;
            background: #f7f7f7;
            position: relative;
        }

        .wrapper-foto-guru img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card-guru:hover .wrapper-foto-guru img {
            transform: scale(1.04);
        }

        /* Label Jabatan di Atas Foto */
        .badge-jabatan {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #0f6b3b;
            color: #ffffff;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .info-guru {
            padding: 22px 20px;
            text-align: center;
        }

        .info-guru h4 {
            font-size: 1.05rem;
            color: #0f6b3b;
            font-weight: 800;
            margin-bottom: 4px;
            line-height: 1.3;
        }

        .info-guru .mapel {
            font-size: 0.78rem;
            color: #facc15;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .info-guru .nip {
            font-size: 0.75rem;
            color: #888888;
            background: #f8f9fa;
            padding: 4px 10px;
            border-radius: 6px;
            display: inline-block;
        }

        /* ==========================================================================
           5. OPTIMASI RESPONSIVE SMARTPHONE ( ANTI MELUBER / ANTI BREAK )
           ========================================================================== */
        @media screen and (max-width: 1024px) {
            .guru-grid { grid-template-columns: repeat(3, 1fr); gap: 20px; }
            .hero-left h1 { font-size: 2.5rem; }
        }

        @media screen and (max-width: 768px) {
            .hero-guru {
                padding: 0 0 25px 0 !important;
                overflow-x: hidden !important;
            }

            .hero-grid {
                display: flex !important;
                flex-direction: column !important;
                gap: 20px !important;
                width: 100% !important;
            }

            /* Gambar Utama Naik Ke Atas Mengikuti Tema Mobile */
            .hero-right {
                order: 1 !important;
                width: calc(100% + 40px) !important;
                margin-left: -20px !important;
                margin-right: -20px !important;
            }

            .image-mask-wrapper img {
                width: 100% !important;
                height: 220px !important;
                object-fit: cover !important;
                border-radius: 0 0 100px 100px / 0 0 30px 30px !important; /* Efek Perahu/Mangkok */
            }

            .floating-char-card {
                position: absolute !important;
                right: 15px !important;
                bottom: 12px !important;
                padding: 8px 12px !important;
                max-width: 160px !important;
                border-radius: 12px !important;
                gap: 8px !important;
            }

            .floating-char-card .icon-round {
                width: 32px !important;
                height: 32px !important;
                background: #ffffff !important;
            }
            
            .floating-char-card .icon-round svg {
                width: 14px !important;
                height: 14px !important;
                stroke: #0f6b3b !important;
            }

            .floating-char-card h4 { font-size: 0.95rem !important; }
            .floating-char-card p { font-size: 0.6rem !important; }

            /* Teks Pindah Ke Tengah */
            .hero-left {
                order: 2 !important;
                width: 100% !important;
                padding: 0 5px !important;
            }

            .hero-left .tag { font-size: 0.75rem !important; }
            .hero-left h1 { font-size: 1.8rem !important; }
            .hero-left p { font-size: 0.82rem !important; line-height: 1.5 !important; }

            /* Stats Counter Bar Ringkas di HP */
            /* Stats Counter Bar Berderet Kesamping (Horizontal) */
            .hero-stats-row {
                grid-template-columns: repeat(3, 1fr) !important; /* Memaksa 3 kolom berderet kesamping */
                gap: 8px !important; /* Memperkecil celah antar boks agar pas di layar HP */
                padding: 12px 8px !important; /* Padding disesuaikan */
                border-radius: 16px !important;
                width: 100% !important;
                box-sizing: border-box !important;
            }

            .stat-mini-box {
                flex-direction: column !important; /* Ikon di atas, teks di bawah agar hemat ruang horizontal */
                text-align: center !important;
                padding: 0 !important;
                gap: 6px !important;
            }

            .stat-mini-box:not(:last-child)::after { 
                display: none !important; /* Menghilangkan garis pembatas laptop */
            }

            .stat-mini-box .icon-container {
                width: 36px !important; /* Mengecilkan ukuran boks ikon */
                height: 36px !important;
                border-radius: 10px !important;
                font-size: 1rem !important;
                margin: 0 auto !important;
            }

            .stat-mini-box-text {
                align-items: center !important;
                width: 100% !important;
            }

            .stat-mini-box h3 { 
                font-size: 1rem !important; /* Ukuran angka (misal: 25+, 100%) */
                font-weight: 800 !important;
                margin-bottom: 1px !important;
            }

            .stat-mini-box p { 
                font-size: 0.65rem !important; /* Ukuran keterangan teks di bawah angka */
                white-space: normal !important; /* Mengizinkan teks melipat ke bawah jika terlalu panjang */
                line-height: 1.2 !important;
                color: #6b7280 !important;
            }

            /* Grid Kartu Guru di HP (Dibuat 2 Kolom Sejajar Sempurna) */
            .section-title h2 { font-size: 1.5rem !important; }
            
            .guru-grid {
                grid-template-columns: repeat(2, 1fr) !important; /* Mengunci 2 kolom di HP */
                gap: 12px !important;
            }

            .wrapper-foto-guru { height: 180px !important; } /* Tinggi foto dikurangi agar seimbang */
            
            .badge-jabatan {
                padding: 4px 8px !important;
                font-size: 0.6rem !important;
                top: 8px !important;
                left: 8px !important;
            }

            .info-guru { padding: 12px 10px !important; }
            .info-guru h4 { font-size: 0.85rem !important; margin-bottom: 2px !important; }
            .info-guru .mapel { font-size: 0.65rem !important; margin-bottom: 6px !important; }
            .info-guru .nip { font-size: 0.62rem !important; padding: 2px 6px !important; }
        }
    </style>
</head>
<body>
<?php include 'layout/header.php'; ?>

    <section class="hero-guru">
        <div class="container">
            <div class="hero-grid">
                
                <div class="hero-left">
                    <span class="tag">MI Al Karomah</span>
                    <h1>Guru & <span>Tenaga</span> Kependidikan</h1>
                    <p>Membentuk generasi unggul yang berilmu, berakhlak mulia, dan berprestasi bersama jajaran tenaga pendidik profesional kami.</p>
                </div>
                
                <div class="hero-right">
                    <div class="image-mask-wrapper">
                        <img src="img/hero.png" alt="Guru MI Al Karomah">
                    </div>
                    <div class="floating-char-card">
                        <div class="icon-round">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        </div>
                        <div>
                            <h4>25+ Guru</h4>
                            <p>Tenaga pengajar tersertifikasi & kompeten di bidangnya.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container">
        <div class="hero-stats-row">
            <div class="stat-mini-box">
                <div class="icon-container">👥</div>
                <div class="stat-mini-box-text">
                    <h3>25+</h3>
                    <p>Guru Profesional</p>
                </div>
            </div>
            <div class="stat-mini-box">
                <div class="icon-container">🎓</div>
                <div class="stat-mini-box-text">
                    <h3>100%</h3>
                    <p>Lulusan S1/S2</p>
                </div>
            </div>
            <div class="stat-mini-box">
                <div class="icon-container">✨</div>
                <div class="stat-mini-box-text">
                    <h3>6</h3>
                    <p>Program Akademik</p>
                </div>
            </div>
        </div>
    </div>

    <section class="direktori-guru" style="padding-bottom: 60px;">
        <div class="container">
            
            <div class="section-title">
                <h2>Tenaga Pendidik Kami</h2>
            </div>

            <div class="guru-grid">
                
                <div class="card-guru">
                    <div class="wrapper-foto-guru">
                        <span class="badge-jabatan">Kepala Madrasah</span>
                        <img src="images/guru-1.jpg" alt="Nama Kepala Sekolah">
                    </div>
                    <div class="info-guru">
                        <h4>Ahmad Syarif, M.Pd.</h4>
                        <p class="mapel">Manajemen Sekolah</p>
                        <span class="nip">NIP. 19820314XXXXXXXXX</span>
                    </div>
                </div>

                <div class="card-guru">
                    <div class="wrapper-foto-guru">
                        <span class="badge-jabatan">Waka Kurikulum</span>
                        <img src="images/guru-2.jpg" alt="Nama Guru">
                    </div>
                    <div class="info-guru">
                        <h4>Siti Aminah, S.Pd.I.</h4>
                        <p class="mapel">Pendidikan Agama Islam</p>
                        <span class="nip">NIP. 19870522XXXXXXXXX</span>
                    </div>
                </div>

                <div class="card-guru">
                    <div class="wrapper-foto-guru">
                        <span class="badge-jabatan">Guru Kelas</span>
                        <img src="images/guru-3.jpg" alt="Nama Guru">
                    </div>
                    <div class="info-guru">
                        <h4>Budi Santoso, S.Pd.</h4>
                        <p class="mapel">Tematik Kelas 5</p>
                        <span class="nip">NIP. 19910110XXXXXXXXX</span>
                    </div>
                </div>

                <div class="card-guru">
                    <div class="wrapper-foto-guru">
                        <span class="badge-jabatan">Guru Spesialis</span>
                        <img src="images/guru-4.jpg" alt="Nama Guru">
                    </div>
                    <div class="info-guru">
                        <h4>Rina Lestari, S.Hum.</h4>
                        <p class="mapel">Bahasa Inggris</p>
                        <span class="nip">NIP. 19940818XXXXXXXXX</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

<?php include 'layout/footer.php'; ?>
</body>
</html>
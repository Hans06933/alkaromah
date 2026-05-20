<?php
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Daftar Guru & Tenaga Kependidikan - MI Al Karomah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            background-color: #fcfbf7; 
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

        /* ========================================================
        5. DIUBAH SAMA PERSIS SEPERTI MODEL & UKURAN FACILITIES 
        ======================================================== */

        .direktori-guru { 
            padding: 60px 0; 
            background: white; 
        }

        .guru-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px; 
            margin-top: 30px; 
            margin-bottom: 8px;
        }

        .card-guru {
            background: #fefcf5;
            border-radius: 20px; 
            overflow: hidden;
            text-align: center;
            border: none; 
            box-shadow: none; 
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-guru:hover {
            transform: translateY(-4px);
        }

        .wrapper-foto-guru {
            width: 100%;
            height: 160px; 
            overflow: hidden;
            position: relative;
            background: #f7f7f7; 
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper-foto-guru img {
            width: 100%;
            height: 100%;
            object-fit: contain; 
            padding: 10px; 
            box-sizing: border-box;
        }


        .badge-jabatan {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #0f6b3b;
            color: #ffffff;
            padding: 4px 10px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 700;
            z-index: 2;
        }

        .info-guru {
            padding: 15px; 
            text-align: center;
        }

        .info-guru h4 {
            font-size: 1rem;
            color: #0f6b3b;
            font-weight: 600; 
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .info-guru .mapel {
            font-size: 0.8rem;
            color: #0f6b3b; 
            font-weight: 600;
            margin-bottom: 4px;
        }

        .info-guru .nip {
            font-size: 0.75rem;
            color: #0f6b3b; 
            opacity: 0.8;
            font-weight: 600;
        }


        .sosmed-guru {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 10px;
        }
        .sosmed-guru a {
            font-size: 1.1rem;
            transition: opacity 0.2s;
        }
        .sosmed-guru a:hover {
            opacity: 0.7;
        }

        /* ==========================================================================
           6. OPTIMASI RESPONSIVE SMARTPHONE ( ANTI MELUBER / ANTI BREAK )
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

            .hero-left {
                order: 2 !important;
                width: 100% !important;
                padding: 0 5px !important;
            }

            .hero-left .tag { font-size: 0.75rem !important; }
            .hero-left h1 { font-size: 1.8rem !important; }
            .hero-left p { font-size: 0.82rem !important; line-height: 1.5 !important; }

            .hero-stats-row {
                grid-template-columns: repeat(3, 1fr) !important; 
                gap: 8px !important;
                padding: 12px 8px !important; 
                border-radius: 16px !important;
                width: 100% !important;
                box-sizing: border-box !important;
            }

            .stat-mini-box {
                flex-direction: column !important; 
                text-align: center !important;
                padding: 0 !important;
                gap: 6px !important;
            }

            .stat-mini-box:not(:last-child)::after { 
                display: none !important; 
            }

            .stat-mini-box .icon-container {
                width: 36px !important; 
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
                font-size: 1rem !important;
                font-weight: 800 !important;
                margin-bottom: 1px !important;
            }

            .stat-mini-box p { 
                font-size: 0.65rem !important; 
                white-space: normal !important; 
                line-height: 1.2 !important;
                color: #6b7280 !important;
            }

            .section-title h2 { font-size: 1.5rem !important; }
            
            .guru-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 12px !important;
            }

            .wrapper-foto-guru { 
                height: 180px !important; 
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                background: #f7f7f7 !important;
                overflow: hidden !important;
            } 
            
            .wrapper-foto-guru img {
                object-fit: contain !important; 
                width: auto !important;
                height: 100% !important; 
                max-width: 100% !important;
                padding: 5px !important; 
                box-sizing: border-box !important;
            }
            
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
        
    <div class="guru-grid">
    <?php 
    // Mengubah nama variabel query menjadi $ambil_data agar kompak dengan baris bawahnya
    $ambil_data = mysqli_query($conn, "SELECT * FROM guru WHERE status = 'aktif'");
    
        // Sekarang $ambil_data sudah didefinisikan dan bisa dibaca dengan benar
        if (mysqli_num_rows($ambil_data) > 0) : 
            while ($d = mysqli_fetch_assoc($ambil_data)) : 
    ?>
        <div class="card-guru">
            <div class="wrapper-foto-guru">
                <span class="badge-jabatan"><?= htmlspecialchars($d['jabatan']); ?></span>
                <img src="assets/guru/<?= !empty($d['foto']) ? htmlspecialchars($d['foto']) : 'default-guru.jpg'; ?>" alt="<?= htmlspecialchars($d['nama']); ?>">
            </div>
            
            <div class="info-guru">
                <h4><?= htmlspecialchars($d['nama']); ?></h4>
                
                <p class="jabatan"><i class="fas fa-book"></i> <?= $d['jabatan'] ? htmlspecialchars($d['jabatan']) : '-'; ?></p>
                <p class="nip"><i class="far fa-id-card"></i> NIP. <?= $d['nip'] ? htmlspecialchars($d['nip']) : '-'; ?></p>
                <p class="pendidikan"><i class="fas fa-graduation-cap"></i> <?= $d['pendidikan'] ? htmlspecialchars($d['pendidikan']) : '-'; ?></p>
                
                <hr style="border: 0; border-top: 1px dashed #eee; margin: 10px 0;">

                <div class="sosmed-guru" style="display: flex; gap: 10px; justify-content: center; margin-top: 8px;">

                <?php if (!empty($d['whatsapp'])) : ?>
                    <?php 
                        $nomor_wa = preg_replace('/[^0-9]/', '', $d['whatsapp']); 
                        // Jika admin input pakai angka 0 di depan (misal 0812...), ubah otomatis ke format kode negara 62
                        if (substr($nomor_wa, 0, 1) === '0') {
                            $nomor_wa = '62' . substr($nomor_wa, 1);
                        }
                    ?>
                    <a href="https://wa.me/<?= $nomor_wa; ?>" target="_blank" title="Hubungi via WhatsApp" style="color: #25D366; font-size: 1.2rem;">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                <?php endif; ?>

                <?php if (!empty($d['instagram'])) : ?>
                    <a href="https://instagram.com/<?= htmlspecialchars($d['instagram']); ?>" target="_blank" title="Instagram" style="color: #E1306C; font-size: 1.2rem;">
                        <i class="fab fa-instagram"></i>
                    </a>
                <?php endif; ?>

                <?php if (!empty($d['facebook'])) : ?>
                    <a href="https://facebook.com/<?= htmlspecialchars($d['facebook']); ?>" target="_blank" title="Facebook" style="color: #1877F2; font-size: 1.2rem;">
                        <i class="fab fa-facebook"></i>
                    </a>
                <?php endif; ?>

                </div>
            </div>
        </div>
    <?php 
        endwhile; 
    else : 
    ?>
        <div class="empty-state" style="grid-column: span 4; text-align: center; padding: 40px;">
            <p>Belum ada data tenaga pendidik.</p>
        </div>
    <?php endif; ?>
</div>

<?php include 'layout/footer.php'; ?>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Hubungi Kami - MI Al Karomah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* ==========================================================================
           1. RESET & VARIABEL DASAR TEMA
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #f7f6f0; /* Krem hangat premium */
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
           3. HERO BANNER ATAS (KONSISTEN DENGAN DESAIN SEBELUMNYA)
           ========================================================================== */
        .hero-kontak {
            background: #ffffff;
            padding-bottom: 30px;
        }

        .banner-masque {
            position: relative;
            background: #0f6b3b; 
            border-radius: 0 0 150px 150px / 0 0 40px 40px;
            padding: 55px 20px;
            text-align: center;
            overflow: hidden;
            border-bottom: 4px solid #facc15;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* Handler Background Gambar Lokal & Efek Kaca Film Gelap */
        .banner-masque .banner-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* GANTI 'kontak-bg.jpg' di bawah ini dengan nama file gambar Anda di dalam folder img */
            background: linear-gradient(135deg, rgba(5, 43, 23, 0.88) 0%, rgba(15, 107, 59, 0.78) 100%), 
                        url('img/kontak-bg.jpg') center center no-repeat;
            background-size: cover;
            z-index: 1;
            transform: scale(1.02);
        }

        /* Siluet Ornamen Masjid Transparan */
        .banner-masque::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%230b532e' fill-opacity='0.5' d='M0,224L120,208C240,192,480,160,720,176C960,192,1200,256,1320,288L1440,320L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z'%3E%3C/path%3E%3C/svg%3E") bottom center no-repeat;
            background-size: cover;
            opacity: 0.25;
            z-index: 2;
            pointer-events: none;
        }

        .banner-content {
            position: relative;
            z-index: 3;
            max-width: 800px;
            margin: 0 auto;
        }

        .camera-book-icon {
            width: 110px;
            height: auto;
            margin: 0 auto 12px auto;
            display: block;
        }

        .banner-content h1 {
            color: #facc15;
            font-size: 2.1rem;
            font-weight: 800;
            line-height: 1.3;
        }

        .banner-content h1 span {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.7rem;
            display: block;
            margin-top: 5px;
        }

        /* Teks Pengantar Tengah */
        .intro-section {
            text-align: center;
            padding: 30px 0 25px 0;
        }

        .intro-section h2 {
            font-size: 1.85rem;
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
           4. SPLIT-GRID LAYOUT (KIRI: KARTU INFORMASI, KANAN: FORMULIR)
           ========================================================================== */
        .contact-main-grid {
            display: grid;
            grid-template-columns: 5fr 7fr;
            gap: 35px;
            margin-bottom: 50px;
            align-items: start;
        }

        .contact-info-sidebar {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info-card-premium {
            background: #ffffff;
            border-radius: 20px;
            padding: 25px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.01);
            display: flex;
            gap: 20px;
            align-items: flex-start;
            transition: transform 0.3s ease;
        }

        .info-card-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(15, 107, 59, 0.06);
        }

        .info-card-icon {
            width: 46px;
            height: 46px;
            background: #f0f7f4;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0f6b3b;
            font-size: 1.25rem;
            flex-shrink: 0;
            border: 1px solid #e6f0ea;
        }

        .info-card-details h3 {
            font-size: 1.05rem;
            color: #0f6b3b;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .info-card-details p {
            font-size: 0.88rem;
            color: #4a5568;
            line-height: 1.5;
        }

        .info-card-details a {
            color: #0f6b3b;
            font-weight: 700;
            display: inline-block;
            margin-top: 6px;
            font-size: 0.85rem;
        }

        /* Formulir Pesan Sisi Kanan */
        .contact-form-container {
            background: #ffffff;
            border-radius: 24px;
            padding: 35px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.01);
        }

        .contact-form-container h2 {
            font-size: 1.4rem;
            color: #1a202c;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .contact-form-container p {
            font-size: 0.88rem;
            color: #718096;
            margin-bottom: 25px;
        }

        .form-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-group label {
            font-size: 0.8rem;
            font-weight: 700;
            color: #4a5568;
            text-transform: uppercase;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            background: #f7f9fa;
            border: 1px solid #e2e8f0;
            padding: 13px 16px;
            border-radius: 10px;
            font-size: 0.9rem;
            color: #2d3748;
            transition: all 0.2s ease;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            background: #ffffff;
            border-color: #0f6b3b;
            box-shadow: 0 0 0 3px rgba(15, 107, 59, 0.1);
        }

        .btn-submit-premium {
            background: linear-gradient(135deg, #0f6b3b 0%, #064e26 100%);
            color: #ffffff;
            border: none;
            padding: 15px 30px;
            border-radius: 12px;
            font-size: 0.92rem;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 107, 59, 0.2);
        }

        /* Peta Google Maps */
        .map-section {
            margin-bottom: 50px;
        }

        .map-wrapper {
            width: 100%;
            height: 380px;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .map-wrapper iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }


        /* ==========================================================================
           6. OPTIMASI RESPONSIVE SMARTPHONE
           ========================================================================== */
        @media screen and (max-width: 1024px) {
            .contact-main-grid { grid-template-columns: 1fr; gap: 30px; }
        }

        @media screen and (max-width: 768px) {
            nav { display: none; }

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

            .info-card-premium { padding: 18px; border-radius: 16px; gap: 15px; }
            .info-card-icon { width: 40px; height: 40px; font-size: 1.1rem; border-radius: 12px; }
            .info-card-details h3 { font-size: 0.98rem; }
            .info-card-details p { font-size: 0.8rem; }

            .contact-form-container { padding: 25px 20px; border-radius: 20px; }
            .contact-form-container h2 { font-size: 1.22rem; }
            
            .form-grid-2 { grid-template-columns: 1fr !important; gap: 0; }
            .form-group.full-width { grid-column: span 1; }
            .form-group input, .form-group textarea { padding: 12px 15px; font-size: 0.85rem; }

            .map-wrapper { height: 260px; border-radius: 16px; }
        }
    </style>
</head>
<body>
<?php include_once 'layout/header.php'; ?>

    <section class="hero-kontak">
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
                    <h1>Hubungi Kami:<span>Mari Terhubung Dengan Madrasah</span></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="intro-section">
            <h2>Layanan Komunikasi & Informasi</h2>
            <p>Silakan hubungi kami atau kirim pesan secara instan melalui formulir resmi</p>
        </div>
    </section>

    <main class="container">
        <div class="contact-main-grid">
            
            <div class="contact-info-sidebar">
                <div class="info-card-premium">
                    <div class="info-card-icon">📍</div>
                    <div class="info-card-details">
                        <h3>Alamat Madrasah</h3>
                        <p>Jl. Raya Cikande-Rangkasbitung, KM 2, Kecamatan Cikande, Kabupaten Serang, Provinsi Banten.</p>
                        <a href="#maps-location">Lihat Peta Petunjuk ↓</a>
                    </div>
                </div>

                <div class="info-card-premium">
                    <div class="info-card-icon">📞</div>
                    <div class="info-card-details">
                        <h3>Layanan Informasi (WA)</h3>
                        <p>Hubungi admin tata usaha pada jam kerja operasional (Senin - Sabtu, 07.00 - 14.00 WIB).</p>
                        <a href="https://wa.me/6281234567890" target="_blank">Chat Via WhatsApp →</a>
                    </div>
                </div>

                <div class="info-card-premium">
                    <div class="info-card-icon">✉️</div>
                    <div class="info-card-details">
                        <h3>Email Resmi</h3>
                        <p>Kirimkan surat resmi kedinasan atau pertanyaan umum kerja sama ke alamat resmi kami.</p>
                        <a href="mailto:info@mialkaromah.sch.id">info@mialkaromah.sch.id</a>
                    </div>
                </div>
            </div>

            <div class="contact-form-container">
                <h2>Kirim Pesan Langsung</h2>
                <p>Punya pertanyaan mengenai PPDB atau administrasi? Isi formulir di bawah ini.</p>
                
                <form action="#" method="POST">
                    <div class="form-grid-2">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="Contoh: Ahmad Subagja" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="subjek">Subjek / Perihal</label>
                        <input type="text" id="subjek" name="subjek" placeholder="Contoh: Pertanyaan Syarat PPDB 2026" required>
                    </div>

                    <div class="form-group full-width">
                        <label for="pesan">Isi Pesan Anda</label>
                        <textarea id="pesan" name="pesan" rows="4" placeholder="Tuliskan detail pertanyaan Anda..." required></textarea>
                    </div>

                    <button type="submit" class="btn-submit-premium">
                        <span>Kirim Pesan Sekarang</span> ✉️
                    </button>
                </form>
            </div>

        </div>
    </main>

    <section class="container map-section" id="maps-location">
        <div class="map-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.2411910609!2d106.275811!3d-6.229388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTMnNDUuOCJTIDEwNsKwMTYnMzIuOSJF!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <?php include_once 'layout/footer.php'; ?>
</body>
</html>
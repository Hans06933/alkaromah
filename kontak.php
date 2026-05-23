<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Hubungi Kami - MI Al Karomah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2 family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS ANIMATION CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #1e293b;
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

        .hero-premium-section {
            background: linear-gradient(135deg, #094424 0%, #0f6b3b 100%);
            position: relative;
            padding: 80px 0 100px 0;
            color: #ffffff;
            border-radius: 0 0 60px 60px;
            box-shadow: 0 20px 40px rgba(15, 107, 59, 0.15);
            overflow: hidden;
        }

        .hero-premium-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Cpath d='M30 0l30 30-30 30L0 30z' fill='%23ffffff' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
            z-index: 1;
        }

        .hero-split-grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 50px;
            align-items: center;
        }

        .hero-left-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .badge-connect {
            background: rgba(254, 240, 138, 0.15);
            border: 1px solid rgba(254, 240, 138, 0.3);
            color: #fef08a;
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.82rem;
            font-weight: 700;
            width: fit-content;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .hero-left-content h1 {
            font-size: 2.8rem;
            font-weight: 800;
            line-height: 1.2;
            color: #ffffff;
        }

        .hero-left-content h1 span {
            color: #facc15;
            display: block;
        }

        .hero-left-content p.hero-desc {
            font-size: 1.05rem;
            color: #cbd5e1;
            line-height: 1.6;
            max-width: 520px;
        }

        .hero-action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .btn-hero-wa {
            background: #facc15;
            color: #0f6b3b;
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(250, 204, 21, 0.2);
        }

        .btn-hero-wa:hover {
            transform: translateY(-3px);
            background: #e2b80d;
            box-shadow: 0 15px 25px rgba(250, 204, 21, 0.3);
        }

        .hero-stats-row {
            display: flex;
            gap: 30px;
            margin-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            padding-top: 25px;
        }

        .stat-box-mini h4 {
            font-size: 1.6rem;
            font-weight: 800;
            color: #facc15;
        }

        .stat-box-mini p {
            font-size: 0.82rem;
            color: #e2e8f0;
            font-weight: 500;
        }

        .hero-right-image-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main-banner-frame {
            position: relative;
            width: 100%;
            height: 340px;
            border-radius: 30px 100px 30px 30px;
            overflow: hidden;
            border: 6px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        }

        .main-banner-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .main-banner-frame:hover img {
            transform: scale(1.04);
        }

        .floating-badge-teachers {
            position: absolute;
            bottom: -20px;
            left: -20px;
            background: #ffffff;
            color: #0f6b3b;
            padding: 15px 20px;
            border-radius: 18px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid #e2e8f0;
            z-index: 10;
        }

        .floating-badge-teachers i {
            font-size: 1.5rem;
            color: #facc15;
            background: #f0f7f4;
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .floating-badge-text h5 {
            font-size: 0.9rem;
            font-weight: 800;
            color: #1e293b;
        }

        .floating-badge-text p {
            font-size: 0.75rem;
            color: #64748b;
            font-weight: 600;
        }

        .intro-section {
            text-align: center;
            padding: 60px 0 35px 0;
        }

        .intro-section h2 {
            font-size: 2rem;
            color: #0f6b3b;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .intro-section p {
            font-size: 0.95rem;
            color: #64748b;
            font-weight: 500;
        }

        .contact-main-grid {
            display: grid;
            grid-template-columns: 5fr 7fr;
            gap: 40px;
            margin-bottom: 60px;
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
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -1px rgba(0,0,0,0.01);
            display: flex;
            gap: 20px;
            align-items: flex-start;
            transition: all 0.3s ease;
        }

        .info-card-premium:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(15, 107, 59, 0.05), 0 10px 10px -5px rgba(15, 107, 59, 0.03);
            border-color: #cbd5e1;
        }

        .info-card-icon {
            width: 50px;
            height: 50px;
            background: #f0fdf4;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0f6b3b;
            font-size: 1.35rem;
            flex-shrink: 0;
            border: 1px solid #dcfce7;
        }

        .info-card-details h3 {
            font-size: 1.1rem;
            color: #0f6b3b;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .info-card-details p {
            font-size: 0.9rem;
            color: #475569;
            line-height: 1.5;
        }

        .info-card-details a {
            color: #0f6b3b;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 8px;
            font-size: 0.88rem;
        }

        .info-card-details a:hover {
            text-decoration: underline;
        }

        .contact-form-container {
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.02);
        }

        .contact-form-container h2 {
            font-size: 1.5rem;
            color: #1e293b;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .contact-form-container p {
            font-size: 0.9rem;
            color: #64748b;
            margin-bottom: 30px;
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
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            padding: 14px 16px;
            border-radius: 12px;
            font-size: 0.92rem;
            color: #0f172a;
            transition: all 0.2s ease;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            background: #ffffff;
            border-color: #0f6b3b;
            box-shadow: 0 0 0 4px rgba(15, 107, 59, 0.1);
        }

        .btn-submit-premium {
            background: linear-gradient(135deg, #0f6b3b 0%, #084c28 100%);
            color: #ffffff;
            border: none;
            padding: 16px 30px;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 10px 15px -3px rgba(15, 107, 59, 0.2);
        }

        .btn-submit-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(15, 107, 59, 0.3);
        }

        .map-section {
            margin-bottom: 60px;
        }

        .map-wrapper {
            width: 100%;
            height: 400px;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
        }

        .map-wrapper iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        @media screen and (max-width: 1024px) {
            .hero-split-grid { grid-template-columns: 1fr; gap: 40px; text-align: center; }
            .hero-left-content { align-items: center; }
            .hero-left-content p.hero-desc { max-width: 100%; }
            .hero-stats-row { justify-content: center; width: 100%; }
            .main-banner-frame { height: 280px; max-width: 500px; border-radius: 24px 60px 24px 24px; }
            .floating-badge-teachers { left: 50%; transform: translateX(-50%); bottom: -15px; width: max-content; }
            .contact-main-grid { grid-template-columns: 1fr; gap: 30px; }
        }

        @media screen and (max-width: 768px) {
            .hero-premium-section { padding: 50px 0 70px 0; border-radius: 0 0 40px 40px; }
            .hero-left-content h1 { font-size: 2rem; }
            .hero-left-content p.hero-desc { font-size: 0.92rem; }
            .hero-action-buttons { flex-direction: column; width: 100%; gap: 10px; }
            .btn-hero-wa { width: 100%; justify-content: center; }
            .intro-section { padding: 40px 0 20px 0; }
            .intro-section h2 { font-size: 1.5rem; }
            .contact-form-container { padding: 30px 20px; border-radius: 20px; }
            .form-grid-2 { grid-template-columns: 1fr !important; gap: 0; }
            .form-group.full-width { grid-column: span 1; }
            .map-wrapper { height: 280px; border-radius: 16px; }
        }

        [data-aos] {
            opacity: 0;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        [data-aos].aos-animate {
            opacity: 1;
        }
    </style>
</head>
<body>
<?php include_once 'layout/header.php'; ?>

    <section class="hero-premium-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="0">
        <div class="container">
            <div class="hero-split-grid">
                
                <div class="hero-left-content" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                    <div class="badge-connect" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="150">
                        <i class="fas fa-circle-check"></i> Layanan Respons Cepat
                    </div>
                    <h1>Hubungi Kami <span>MI Al Karomah</span></h1>
                    <p class="hero-desc">Pintu komunikasi kami selalu terbuka untuk Anda. Dapatkan informasi pendaftaran (PPDB), administrasi, hingga sistem pembelajaran madrasah secara transparan.</p>
                    
                    <div class="hero-action-buttons" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn-hero-wa">
                            <i class="fab fa-whatsapp"></i> Chat Admin PPDB
                        </a>
                    </div>

                    <div class="hero-stats-row">
                        <div class="stat-box-mini" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="350">
                            <h4>A</h4>
                            <p>Akreditasi Resmi</p>
                        </div>
                        <div class="stat-box-mini" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="400">
                            <h4>100%</h4>
                            <p>Guru Berdedikasi</p>
                        </div>
                        <div class="stat-box-mini" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="450">
                            <h4>24/7</h4>
                            <p>Formulir Online</p>
                        </div>
                    </div>
                </div>

                <div class="hero-right-image-wrapper" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="250">
                    <div class="main-banner-frame" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                        <img src="assets/berita/default-berita.jpg" onerror="this.src='https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=800&auto=format&fit=cover'" alt="Tenaga Pendidik MI Al Karomah">
                    </div>
                    <div class="floating-badge-teachers" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
                        <i class="fas fa-users-rectangle"></i>
                        <div class="floating-badge-text">
                            <h5>Tenaga Pendidik</h5>
                            <p>Kompeten & Berdedikasi</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="container" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
        <div class="intro-section" data-aos="fade-down" data-aos-duration="600" data-aos-delay="150">
            <h2>Pusat Informasi & Pengaduan</h2>
            <p>Silakan hubungi kami atau kirim pesan secara instan melalui kanal di bawah ini</p>
        </div>
    </section>

    <main class="container">
        <div class="contact-main-grid">
            
            <div class="contact-info-sidebar">
                <div class="info-card-premium" data-aos="fade-right" data-aos-duration="600" data-aos-delay="200">
                    <div class="info-card-icon"><i class="fas fa-map-location-dot"></i></div>
                    <div class="info-card-details">
                        <h3>Alamat Lengkap</h3>
                        <p>Jl. Raya Cikande-Rangkasbitung, KM 2, Kecamatan Cikande, Kabupaten Serang, Provinsi Banten.</p>
                        <a href="#maps-location">Lihat Rute Google Maps ↓</a>
                    </div>
                </div>

                <div class="info-card-premium" data-aos="fade-right" data-aos-duration="600" data-aos-delay="250">
                    <div class="info-card-icon"><i class="fab fa-whatsapp"></i></div>
                    <div class="info-card-details">
                        <h3>WhatsApp Hotline</h3>
                        <p>Layanan operasional tata usaha aktif pada jam kerja sekolah (Senin - Sabtu, jam 07.00 - 14.00 WIB).</p>
                        <a href="https://wa.me/6281234567890" target="_blank">Mulai Obrolan Sekarang →</a>
                    </div>
                </div>

                <div class="info-card-premium" data-aos="fade-right" data-aos-duration="600" data-aos-delay="300">
                    <div class="info-card-icon"><i class="far fa-envelope"></i></div>
                    <div class="info-card-details">
                        <h3>Korespondensi Email</h3>
                        <p>Gunakan jalur email untuk pengiriman berkas kerjasama instansi atau surat kedinasan formal.</p>
                        <a href="mailto:info@mialkaromah.sch.id">info@mialkaromah.sch.id</a>
                    </div>
                </div>
            </div>

            <div class="contact-form-container" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <h2 data-aos="fade-down" data-aos-duration="500" data-aos-delay="250">Kirim Pesan Elektronik</h2>
                <p data-aos="fade-up" data-aos-duration="500" data-aos-delay="300">Mempunyai pertanyaan spesifik mengenai pendaftaran? Kirimkan pesan Anda langsung ke sistem berkas madrasah.</p>
                
                <form action="#" method="POST">
                    <div class="form-grid-2">
                        <div class="form-group" data-aos="fade-right" data-aos-duration="500" data-aos-delay="350">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="Contoh: Ahmad Subagja" required>
                        </div>
                        <div class="form-group" data-aos="fade-left" data-aos-duration="500" data-aos-delay="400">
                            <label for="email">Alamat Email</label>
                            <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div class="form-group full-width" data-aos="fade-up" data-aos-duration="500" data-aos-delay="450">
                        <label for="subjek">Subjek / Perihal</label>
                        <input type="text" id="subjek" name="subjek" placeholder="Contoh: Pertanyaan Syarat PPDB 2026" required>
                    </div>

                    <div class="form-group full-width" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
                        <label for="pesan">Isi Pesan Anda</label>
                        <textarea id="pesan" name="pesan" rows="4" placeholder="Tuliskan detail pertanyaan Anda secara jelas..." required></textarea>
                    </div>

                    <button type="submit" class="btn-submit-premium" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="550">
                        <i class="far fa-paper-plane"></i> <span>Kirim Pesan Sekarang</span> 
                    </button>
                </form>
            </div>

        </div>
    </main>

    <section class="container map-section" id="maps-location" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
        <div class="map-wrapper" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.2411910609!2d106.275811!3d-6.229388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTMinDQ1LjgiUyAxMDbCsDE2JzMyLjkiRQ!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!-- AOS ANIMATION JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
            delay: 0,
            easing: 'ease-out-cubic'
        });
        
        window.addEventListener('load', function() {
            AOS.refresh();
        });
    </script>

    <?php include_once 'layout/footer.php'; ?>
</body>
</html>
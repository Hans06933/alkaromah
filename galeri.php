<?php
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Galeri MI Al Karomah - Momen Pembelajaran & Prestasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=400;500;600;700;800&family=Playfair+Display:ital,wght=1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
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
            background-color: #f7f6f0; 
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

        .hero-galeri {
            background: #ffffff;
            padding-bottom: 30px;
        }

        .banner-masque {
            position: relative;
            background: #0f6b3b; 
            border-radius: 0 0 150px 150px / 0 0 40px 40px;
            padding: 60px 20px;
            text-align: center;
            overflow: hidden;
            border-bottom: 4px solid #facc15;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .banner-masque .banner-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(5, 43, 23, 0.85) 0%, rgba(15, 107, 59, 0.75) 100%), 
                        url('img/nama_file_gambar.jpg') center center no-repeat;
            background-size: cover;
            z-index: 1;
            transform: scale(1.02); 
        }

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
            width: 120px;
            height: auto;
            margin: 0 auto 12px auto;
            display: block;
        }

        .banner-content h1 {
            color: #facc15; 
            font-size: 2.1rem;
            font-weight: 800;
            line-height: 1.3;
            letter-spacing: -0.3px;
        }

        .banner-content h1 span {
            color: #ffffff; 
            font-weight: 700;
            font-size: 1.8rem;
            display: block;
            margin-top: 5px;
        }

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

        .galeri-composite-grid {
            display: grid;
            grid-template-columns: 8fr 4fr; 
            gap: 25px;
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .left-grid-flow {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
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
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-galeri:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        }

        .card-galeri.big-highlight {
            grid-column: span 2;
            border: 3px solid #facc15; 
        }

        .img-container-galeri {
            width: 100%;
            height: 100%;
            position: relative;
            background: #000000;
            flex-grow: 1;
            overflow: hidden;
        }

        .img-container-galeri img, .img-container-galeri video {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        .card-galeri.big-highlight .img-container-galeri img,
        .card-galeri.big-highlight .img-container-galeri video {
            height: 320px;
        }

        .card-overlay-details {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.3) 70%, transparent 100%);
            color: #ffffff;
            z-index: 5;
            pointer-events: none;
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

        .wajah-madrasah-section {
            width: 100%;
            margin-top: 30px;
            margin-bottom: 25px;
            box-sizing: border-box;
        }

        .card-wajah-madrasah-wrapper {
            display: flex !important;
            flex-direction: row;
            align-items: stretch;
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            width: 100%;
        }

        .wm-media-block {
            flex: 0 0 40%;
            position: relative;
            min-height: 280px;
            background-color: #000;
            overflow: hidden;
        }

        .wm-media-block img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .wm-media-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.2) 80%, transparent 100%);
            color: #ffffff;
            z-index: 2;
        }

        .wm-media-overlay h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0 0 4px 0;
        }

        .wm-media-overlay p {
            font-size: 0.75rem;
            color: #cbd5e0;
            margin: 0;
        }

        .side-description-wajah {
            flex: 0 0 60%;
            padding: 30px 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #ffffff;
            box-sizing: border-box;
        }

        .side-description-wajah h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #0f6b3b;
            margin: 0 0 15px 0;
            border-left: 4px solid #facc15;
            padding-left: 12px;
        }

        .side-description-wajah p {
            font-size: 0.85rem;
            line-height: 1.6;
            color: #475569;
            margin: 0 0 12px 0;
            text-align: justify;
        }

        .side-description-wajah p:last-of-type {
            margin-bottom: 20px;
        }

        .info-sekolah-wajah {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding-top: 15px;
            border-top: 1px dashed #cbd5e1;
        }

        .info-sekolah-wajah span {
            font-size: 0.75rem;
            color: #0f6b3b;
            font-weight: 600;
            background: #e6f7ec;
            padding: 6px 12px;
            border-radius: 30px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        @media screen and (max-width: 768px) {
            .card-wajah-madrasah-wrapper {
                flex-direction: column;
            }
            
            .wm-media-block, .side-description-wajah {
                flex: 0 0 100%;
                width: 100%;
            }
            
            .wm-media-block {
                min-height: 220px;
            }
            
            .side-description-wajah {
                padding: 20px 15px;
            }
        }

        .video-play-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(15, 107, 59, 0.9);
            color: #ffffff;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            z-index: 6;
            border: 1px solid rgba(250, 204, 21, 0.6);
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

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

        .bottom-row-gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 20px;
            margin-bottom: 50px;
            width: 100%;
        }

        .main-media-modal {
            display: none;
            position: fixed;
            z-index: 999999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .main-media-modal.open {
            display: flex;
            opacity: 1;
        }

        .main-media-modal .modal-wrapper {
            position: relative;
            max-width: 85%;
            max-height: 85%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .main-media-modal .modal-item {
            display: block;
            max-width: 100%;
            max-height: 80vh;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.8);
            animation: mainZoomIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-media-modal .modal-caption {
            color: #ffffff;
            margin-top: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            text-align: center;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.8);
        }

        .main-media-modal .close-main-modal {
            position: absolute;
            top: -45px;
            right: -10px;
            color: #ffffff;
            font-size: 38px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.2s, transform 0.2s;
        }

        .main-media-modal .close-main-modal:hover {
            color: #ef4444;
            transform: scale(1.1);
        }

        @keyframes mainZoomIn {
            from { transform: scale(0.85); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        @media screen and (max-width: 1024px) {
            .galeri-composite-grid { grid-template-columns: 1fr; }
            .bottom-row-gallery { grid-template-columns: repeat(2, 1fr); }
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
            .left-grid-flow { grid-template-columns: 1fr !important; gap: 15px; }
            .card-galeri.big-highlight { grid-column: span 1; }
            .card-galeri.big-highlight .img-container-galeri img,
            .card-galeri.big-highlight .img-container-galeri video { height: 220px; }
            .bottom-row-gallery { grid-template-columns: 1fr !important; gap: 15px; }
            .main-media-modal .close-main-modal { right: 0px; top: -50px; }
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

    <section class="hero-galeri" data-aos="fade-up" data-aos-duration="800" data-aos-delay="0">
        <div class="container">
            <div class="banner-masque">
                <div class="banner-bg"></div>
                <div class="banner-content">
                    <div class="camera-book-icon" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="200">
                        <svg viewBox="0 0 100 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 65c15-4 30-4 45 0M45 65c15-4 30-4 45 0" stroke="#ffffff" stroke-width="3.5" stroke-linecap="round"/>
                            <path d="M10 68c15-4 30-4 45 0M45 68c15-4 30-4 45 0" stroke="#facc15" stroke-width="2" stroke-linecap="round"/>
                            <rect x="20" y="22" width="60" height="36" rx="6" fill="none" stroke="#facc15" stroke-width="4"/>
                            <circle cx="50" cy="40" r="11" fill="none" stroke="#facc15" stroke-width="4"/>
                            <path d="M40 22l3-6h14l3 6" fill="none" stroke="#facc15" stroke-width="3"/>
                        </svg>
                    </div>
                    <h1 data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">Galeri MI Al Karomah:<span>Momen Pembelajaran & Prestasi</span></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="intro-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
            <h2>Telusuri Kehidupan Madrasah Kami</h2>
            <p>Aktivitas Terkini & Prestasi Siswa-Siswi</p>
        </div>
    </section>

    <main class="container">
        
        <div class="galeri-composite-grid">
            
            <div class="left-grid-flow">
                <div class="card-galeri big-highlight trigger-main-modal" 
                    data-media-type="gambar" 
                    data-media-src="assets/galeri/galeri.png" 
                    data-caption="Momen Akademik Terpilih"
                    data-aos="flip-left" data-aos-duration="800" data-aos-delay="200">
                    <div class="img-container-galeri">
                        <img src="assets/galeri/galeri.png" alt="Momen Academic Terpilih">
                        <div class="card-overlay-details">
                            <h3>Momen Akademik Terpilih</h3>
                            <p>10 Maret 2026</p>
                        </div>
                    </div>
                </div>
            </div>

            <aside class="right-panel-info" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                <h3>Informasi Galeri</h3>
                <div class="info-list-item" data-aos="fade-right" data-aos-duration="500" data-aos-delay="250">
                    <div class="info-icon-circle">📷</div>
                    <div class="info-texts">
                        <h4>Galeri Pilihan Hari Ini</h4>
                        <p>Koleksi Foto Terupdate Hari Ini</p>
                    </div>
                </div>
                <div class="info-list-item" data-aos="fade-right" data-aos-duration="500" data-aos-delay="300">
                    <div class="info-icon-circle">🏆</div>
                    <div class="info-texts">
                        <h4>Koleksi Prestasi</h4>
                        <p>Koleksi Prestasi Siswa-Siswi</p>
                    </div>
                </div>
                <div class="info-list-item" data-aos="fade-right" data-aos-duration="500" data-aos-delay="350">
                    <div class="info-icon-circle">🎥</div>
                    <div class="info-texts">
                        <h4>Video Terbaru</h4>
                        <p>Video Terbaru Aktivitas Siswa-Siswi</p>
                    </div>
                </div>
            </aside>

        </div>
        
        <section class="wajah-madrasah-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="150">
            <div class="card-wajah-madrasah-wrapper">
                
                <div class="wm-media-block" data-aos="fade-right" data-aos-duration="800" data-aos-delay="250">
                    <img src="img/sejarahmi.jpg" alt="Wajah Madrasah MI Al Karomah">
                    <div class="wm-media-overlay">
                        <h3>🏫 Wajah Madrasah</h3>
                        <p>Gedung Depan | 20 Maret 2026</p>
                    </div>
                </div>
                
                <div class="side-description-wajah" data-aos="fade-left" data-aos-duration="800" data-aos-delay="350">
                    <h4><i class="fas fa-history"></i> Sejarah Singkat</h4>
                    <p>MI Al Karomah berdiri pada tahun 1998 atas dasar kepedulian masyarakat dalam menyediakan pendidikan dasar Islam yang berkualitas bagi anak-anak di lingkungan sekitar.</p>
                    <p>Sejak berdiri hingga saat ini, MI Al Karomah terus berkomitmen memberikan pendidikan terbaik dengan mengedepankan nilai-nilai Islam, kedisiplinan, kreativitas, dan prestasi.</p>
                    
                    <div class="info-sekolah-wajah">
                        <span data-aos="zoom-in" data-aos-duration="500" data-aos-delay="400"><i class="fas fa-calendar-alt"></i> Berdiri: 1998</span>
                        <span data-aos="zoom-in" data-aos-duration="500" data-aos-delay="450"><i class="fas fa-map-marker-alt"></i> Kota Tasikmalaya</span>
                        <span data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500"><i class="fas fa-user-graduate"></i> Terakreditasi A</span>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <section class="container">
        <div class="bottom-row-gallery">
            <?php 
            $query_galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
            
            if (mysqli_num_rows($query_galeri) > 0) : 
                $delay = 0;
                while ($g = mysqli_fetch_assoc($query_galeri)) : 
                    $delay += 100;
                    $file_galeri = $g['gambar']; 
                    $ekstensi = strtolower(pathinfo($file_galeri, PATHINFO_EXTENSION));
                    $ekstensi_video = ['mp4', 'webm', 'ogg', 'mov'];
                    
                    $path_file = "assets/galeri/" . $file_galeri; 
                    $tanggal_formatted = date('d M Y', strtotime($g['tanggal']));
                    $is_video = in_array($ekstensi, $ekstensi_video);
                    $judul_clean = htmlspecialchars($g['judul']);
            ?>
                <div class="card-galeri trigger-main-modal" 
                     data-media-type="<?= $is_video ? 'video' : 'gambar'; ?>"
                     data-media-src="<?= $path_file; ?>"
                     data-caption="<?= $judul_clean; ?> (<?= $tanggal_formatted; ?>)"
                     data-aos="flip-up" data-aos-duration="700" data-aos-delay="<?= $delay; ?>">
                     
                    <div class="img-container-galeri">
                        <?php 
                        if (!empty($file_galeri) && file_exists($path_file)) {
                            if ($is_video) { 
                            ?>
                                <video preload="metadata" muted>
                                    <source src="<?= $path_file; ?>" type="video/<?= $ekstensi == 'mov' ? 'mp4' : $ekstensi; ?>">
                                </video>
                                <div class="video-play-badge">
                                    <i class="fas fa-video"></i>
                                </div>
                            <?php 
                            } else { 
                            ?>
                                <img src="<?= $path_file; ?>" alt="<?= $judul_clean; ?>">
                            <?php 
                            }
                        } else {
                        ?>
                            <div style="width:100%; height:220px; background:#eef0f3; display:flex; align-items:center; justify-content:center; color:#888; font-size:13px; text-align:center; padding:10px;">
                                <span>File Rusak / Tidak Ditemukan</span>
                            </div>
                        <?php 
                        } 
                        ?>
                        
                        <div class="card-overlay-details">
                            <h3><?= $judul_clean; ?></h3>
                            <p><?= $tanggal_formatted; ?> (<?= ucfirst($g['kategori']); ?>)</p>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile; 
            else :
                echo "<p style='grid-column: span 3; text-align:center; color:#666;' data-aos='fade-up' data-aos-duration='600'>Belum ada data galeri di database.</p>";
            endif; 
            ?>
        </div>
    </section>

    <div id="mainMediaModal" class="main-media-modal">
        <div class="modal-wrapper">
            <span class="close-main-modal">&times;</span>
            <div id="mainModalContentArea"></div>
            <div id="mainModalCaption" class="modal-caption"></div>
        </div>
    </div>

    <?php include_once 'layout/footer.php'; ?>

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

    <script>
    const mainModal = document.getElementById("mainMediaModal");
    const mainCloseBtn = document.querySelector(".close-main-modal");
    const mainContentArea = document.getElementById("mainModalContentArea");
    const mainCaptionArea = document.getElementById("mainModalCaption");
    const mainCards = document.querySelectorAll('.trigger-main-modal');

    function openMainLightbox(card) {
        const mediaType = card.dataset.mediaType;
        const mediaSrc = card.dataset.mediaSrc;
        const captionText = card.dataset.caption;

        mainContentArea.innerHTML = "";
        mainCaptionArea.innerText = captionText || "";

        if (mediaType === 'video') {
            const videoEl = document.createElement('video');
            videoEl.src = mediaSrc;
            videoEl.className = "modal-item";
            videoEl.controls = true;
            videoEl.autoplay = true;
            videoEl.id = "runningMainVideo";
            mainContentArea.appendChild(videoEl);
        } else {
            const imgEl = document.createElement('img');
            imgEl.src = mediaSrc;
            imgEl.className = "modal-item";
            mainContentArea.appendChild(imgEl);
        }

        mainModal.classList.add("open");
        document.body.style.overflow = "hidden";
    }

    function closeMainLightbox() {
        const activeVideo = document.getElementById("runningMainVideo");
        if (activeVideo) {
            activeVideo.pause();
            activeVideo.src = "";
        }
        mainModal.classList.remove("open");
        document.body.style.overflow = "";
    }

    mainCards.forEach(card => {
        card.addEventListener('click', () => openMainLightbox(card));
    });

    mainCloseBtn.addEventListener('click', closeMainLightbox);
    
    mainModal.addEventListener('click', (e) => {
        if (e.target === mainModal) {
            closeMainLightbox();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && mainModal.classList.contains("open")) {
            closeMainLightbox();
        }
    });
    </script>
</body>
</html>
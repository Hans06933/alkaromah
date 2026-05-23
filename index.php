<?php
include 'layout/header.php';
include 'config/koneksi.php';

$queryFasilitas = mysqli_query($conn, "
SELECT * FROM fasilitas
WHERE status='aktif'
ORDER BY id DESC
LIMIT 8
");

$queryBerita = mysqli_query($conn,
"SELECT * FROM berita
 ORDER BY id DESC 
 LIMIT 3");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MI Al Karomah - Madrasah Hebat Bermartabat</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f8f7f2;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        /* ---------- HERO SECTION (Final) ---------- */
        .hero {
            padding: 40px 7% 20px;
            position: relative;
        }

        .hero-container {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr; 
            align-items: center;
            background: #fdfcf7;
            border-radius: 35px;
            overflow: hidden;
            position: relative;
            min-height: 500px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .hero-container::before {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 55%;
            height: 100%;
            background: linear-gradient(135deg, #0f6b3b, #1ea35b);
            clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 0% 100%);
            z-index: 1;
        }

        .hero-container::after {
            content: '';
            position: absolute;
            left: 45%;
            bottom: -15px;
            width: 55px;
            height: 55px;
            background: #e8d8a6;
            transform: translateX(-50%) rotate(45deg);
            border: 5px solid #fdfcf7;
            z-index: 4;
            border-radius: 8px;
        }

        /* Area konten teks */
        .hero-content {
            padding: 60px;
            position: relative;
            z-index: 3;
        }

        .hero-label {
            display: inline-block;
            background: #fff3d0;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            color: #856404;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .hero-content h2 {
            font-size: 64px;
            line-height: 1.1;
            font-weight: 800;
            color: #0b6b3d;
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        .hero-content h3 {
            font-size: 32px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #333;
        }

        .hero-content p {
            line-height: 1.6;
            color: #444;
            margin-bottom: 35px;
            font-size: 15px;
            max-width: 500px;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: #0b532e;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-outline {
            border: 1.5px solid #0b532e;
            color: #0b532e;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            background: transparent;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-primary:hover, .btn-outline:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 12px rgba(0,0,0,0.1);
        }

        .hero-image {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
            min-height: 480px;
            overflow: hidden; 
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;     
            object-position: center left; 
            -webkit-mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0.2) 15%, 
                rgba(0,0,0,1) 45%
            );
            mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0.2) 15%, 
                rgba(0,0,0,1) 45%
            );

            filter: brightness(0.97) contrast(1.03);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero-container {
                grid-template-columns: 1fr;
            }
            .hero-container::before {
                width: 100%;
                clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%);
                opacity: 0.1;
            }
            .hero-image img {
                max-height: 350px;
                object-fit: contain;
                margin: 0 auto;
            }
            .hero-container::after {
                left: 50%;
            }
        }

        @media (max-width: 768px) {
        .hero {
            padding: 15px 4% 15px;
        }

        .hero-container {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: space-between !important;
            flex-wrap: nowrap !important;
            min-height: auto !important;
            height: 260px !important;
            border-radius: 20px !important;
        }

        .hero-container::before {
            width: 45% !important;
            clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 0% 100%) !important;
            opacity: 1 !important;
        }

        .hero-container::after {
            left: 55% !important; 
            width: 35px !important;
            height: 35px !important;
            bottom: -10px !important;
            border: 3px solid #fdfcf7 !important;
        }

        .hero-content {
            padding: 15px 0 15px 20px !important; 
            flex: 1.3 !important; 
            z-index: 3 !important;
        }

        .hero-label {
            font-size: 9px !important;
            padding: 4px 10px !important;
            margin-bottom: 8px !important;
            border-radius: 5px !important;
        }

        .hero-content h2 {
            font-size: 20px !important;
            line-height: 1.1 !important;
            margin-bottom: 4px !important;
            letter-spacing: 0px !important;
        }

        .hero-content h3 {
            font-size: 13px !important; 
            line-height: 1.2 !important;
            margin-bottom: 8px !important;
        }

        .hero-content p {
            font-size: 10px !important; 
            line-height: 1.4 !important;
            margin-bottom: 12px !important;
            max-width: 100% !important;
            display: -webkit-box;
            -webkit-line-clamp: 3; 
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .hero-btns {
            gap: 8px !important; 
        }

        .btn-primary, .btn-outline {
            padding: 6px 14px !important;
            font-size: 10px !important;
            border-radius: 20px !important;
            gap: 5px !important;
        }

        .hero-image {
            flex: 0.9 !important; 
            height: 100% !important;
            min-height: auto !important;
            display: block !important;
        }

        .hero-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            object-position: center left !important;
            max-height: none !important;

            -webkit-mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0.2) 15%, 
                rgba(0,0,0,1) 45%
            ) !important;
            mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0.2) 15%, 
                rgba(0,0,0,1) 45%
            ) !important;
        }
    }

    /* ---------- FEATURE / KEUNGGULAN ---------- */
    .feature-wrapper {
        margin-top: -40px;
        padding: 0 7%;
        position: relative;
        z-index: 10;
    }

    .feature-container {
        background: white;
        border-radius: 25px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        overflow: hidden;
    }

    .feature-box {
        padding: 35px 25px;
        display: flex;
        gap: 18px;
        align-items: flex-start;
        border-right: 1px solid #eee;
    }

    .feature-box:last-child {
        border: none;
    }

    .feature-icon {
        min-width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #0f6b3b;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        font-weight: 700;
    }

    .feature-box h4 {
        margin-bottom: 10px;
        color: #0f6b3b;
        font-size: 18px;
    }

    .feature-box p {
        font-size: 14px;
        line-height: 1.8;
        color: #666;
    }

    @media (max-width: 768px) {
        .feature-wrapper {
            margin-top: -20px !important;
            padding: 0 4% !important;
        }

        .feature-container {
            grid-template-columns: repeat(2, 1fr) !important; 
            overflow: visible !important; 
            background: transparent !important;
            box-shadow: none !important;
        }

        .feature-box {
            background: white !important;
            padding: 20px 15px !important; 
            display: flex !important;
            flex-direction: column !important; 
            align-items: center !important; 
            text-align: center !important;
            gap: 12px !important;

            border-right: 1px solid #eee !important;
            border-bottom: 1px solid #eee !important;
            box-sizing: border-box !important;

            transition: all 0.25s ease-in-out !important;
            position: relative !important;
            z-index: 1 !important;
        }

        .feature-box:nth-child(2n) {
            border-right: none !important; 
        }
        
        .feature-box:nth-child(3), 
        .feature-box:nth-child(4) {
            border-bottom: none !important;
        }

        .feature-box:nth-child(1) { border-top-left-radius: 20px !important; }
        .feature-box:nth-child(2) { border-top-right-radius: 20px !important; }
        .feature-box:nth-child(3) { border-bottom-left-radius: 20px !important; }
        .feature-box:nth-child(4) { border-bottom-right-radius: 20px !important; }

        .feature-icon {
            min-width: 45px !important;
            height: 45px !important;
            font-size: 18px !important;
        }

        .feature-box h4 {
            font-size: 14px !important;
            margin-bottom: 4px !important;
            font-weight: 700 !important;
        }

        .feature-box p {
            font-size: 11px !important;
            line-height: 1.5 !important;
            margin: 0 !important;
        }

        /* ==========================================================================
        EFEK TIMBUL & PERUBAHAN BORDER SAAT DISENTUH (TAP / ACTIVE / HOVER)
        ========================================================================== */
        .feature-box:active,
        .feature-box:hover {
            z-index: 5 !important;
            background: #fafdfb !important; 
            border-color: #0f6b3b !important; 
            border-radius: 15px !important; 
            box-shadow: 0 10px 25px rgba(15, 107, 59, 0.15) !important;
            transform: translateY(-4px) scale(1.02) !important; 
        }
    }

    /* ==========================================================================
    SECTION PROFIL & INFORMASI TERBARU (HOME)
    ========================================================================== */

    .profile {
        display: flex;
        justify-content: space-between;
        align-items: stretch;
        gap: 30px;
        padding: 60px 4%;
        background-color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* --- KONTEN PROFIL --- */
    .profile-container {
        display: flex;
        flex: 2;
        align-items: center;
        gap: 40px;
        background: #ffffff;
    }

    .profile-text {
        flex: 1;
    }

    .profile-text h2 {
        font-size: 28px;
        color: #064e3b;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .profile-line {
        width: 40px;
        height: 4px;
        background-color: #eab308; 
        margin-bottom: 25px;
        border-radius: 2px;
    }

    .profile-text p {
        font-size: 15px;
        color: #4b5563;
        line-height: 1.7;
        margin-bottom: 30px;
        text-align: justify;
    }

    .profile-btn {
        display: inline-flex;
        align-items: center;
        padding: 12px 28px;
        background-color: #046a38;
        color: #ffffff;
        text-decoration: none;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.2s;
    }

    .profile-btn:hover {
        background-color: #03522c;
        transform: translateY(-2px);
    }

    .profile-image {
        flex: 1.2;
        height: 100%;
        max-height: 320px;
        overflow: hidden;
        border-radius: 24px; 
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .profile-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* --- KOTAK INFORMASI TERBARU */
    .news-box {
        flex: 1; 
        background-color: #046a38; 
        border-radius: 24px; 
        padding: 30px 24px;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
        background-image: linear-gradient(rgba(4, 106, 56, 0.95), rgba(4, 106, 56, 0.95)), url('img/mosque-silhouette.png');
        background-size: bottom right;
        background-repeat: no-repeat;
    }

    .news-box h3 {
        font-size: 22px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 6px;
    }

    .news-line {
        width: 35px;
        height: 3px;
        background-color: #eab308;
        margin-bottom: 25px;
    }

    .news-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
    }

    .news-item:last-of-type {
        margin-bottom: 25px;
        border-bottom: none; 
    }

    .news-item img {
        width: 75px;
        height: 55px;
        object-fit: cover;
        border-radius: 12px; 
        background-color: #ffffff;
    }

    .news-content {
        flex: 1;
    }

    .news-content h4 {
        font-size: 14px;
        font-weight: 600;
        color: #fef08a; 
        margin-bottom: 4px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden; 
    }

    .news-content p {
        font-size: 12px;
        color: #e5e7eb;
        margin-bottom: 4px;
        line-height: 1.4;
    }

    .news-content span {
        font-size: 11px;
        color: #9ca3af; 
        display: block;
    }

    .news-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 12px;
        background-color: #f59e0b; 
        color: #1e293b; 
        text-decoration: none;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
        text-align: center;
        margin-top: auto;
        transition: background-color 0.3s, transform 0.2s;
    }

    .news-btn:hover {
        background-color: #d97706;
        transform: scale(1.02);
    }

    /* --- RESPONSIVE LAYOUT (SMARTPHONE & TABLET) --- */
    @media (max-width: 1024px) {
        .profile {
            flex-direction: column; /* Berubah susunan ke bawah saat layar mengecil */
            padding: 40px 20px;
            gap: 40px;
        }
        
        .profile-container {
            flex-direction: column-reverse; /* Gambar pindah ke atas teks pada mobile */
            gap: 25px;
        }
        
        .profile-image {
            width: 100%;
            max-height: 250px;
        }
    }
    

    /* ==========================================================================
    FASILITAS SEKOLAH
    ========================================================================== */

    .facilities {
        padding: 90px 0;
        background: #f8fafc;
    }

    .section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title h2 {
        font-size: 38px;
        color: #166534;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .section-title p {
        font-size: 15px;
        color: #6b7280;
        max-width: 650px;
        margin: auto;
        line-height: 1.8;
    }

    /* GRID SYSTEM */
    .facilities-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    /* CARD DESIGN */
    .facility-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        transition: 0.35s;
        position: relative;
    }

    .facility-card:hover {
        transform: translateY(-8px);
    }

    /* IMAGE & OVERLAY EFFECT */
    .facility-image {
        height: 220px;
        position: relative;
        overflow: hidden;
    }

    .facility-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.4s;
    }

    .facility-card:hover img {
        transform: scale(1.08);
    }

    .facility-overlay {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 55px;
        height: 55px;
        border-radius: 18px;
        background: rgba(22, 163, 74, 0.92);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        backdrop-filter: blur(5px);
    }

    /* CARD DETAILS */
    .facility-content {
        padding: 24px;
    }

    .facility-category {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 30px;
        background: #dcfce7;
        color: #166534;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 14px;
    }

    .facility-content h3 {
        font-size: 24px;
        color: #111827;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .facility-content p {
        font-size: 14px;
        color: #6b7280;
        line-height: 1.8;
    }

    /* EMPTY STATE AREA */
    .empty-facility-wrapper {
        grid-column: 1 / -1;
        width: 100%;
    }

    .empty-facility {
        background: white;
        padding: 70px 30px;
        border-radius: 24px;
        text-align: center;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.04);
    }

    .empty-facility i {
        font-size: 55px;
        color: #cbd5e1;
        margin-bottom: 20px;
        display: inline-block;
    }

    .empty-facility h3 {
        font-size: 28px;
        margin-bottom: 10px;
        color: #111827;
        font-weight: 700;
    }

    .empty-facility p {
        font-size: 15px;
        color: #6b7280;
    }

    /* RESPONSIVE DESIGN (TABLET & MOBILE) */
    @media (max-width: 768px) {
        .facilities {
            padding: 70px 0;
        }

        .section-title h2 {
            font-size: 30px;
        }

        .facilities-grid {
            grid-template-columns: repeat(2, 1fr); 
            gap: 15px;
        }

        .facility-image {
            height: 140px; 
        }

        .facility-content {
            padding: 12px;
        }

        .facility-category {
            padding: 4px 10px;
            font-size: 10px;
            margin-bottom: 8px;
        }

        .facility-content h3 {
            font-size: 15px;
            margin-bottom: 6px;
        }

        .facility-content p {
            font-size: 11px;
            line-height: 1.5;
        }

        .facility-overlay {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            font-size: 16px;
            top: 10px;
            right: 10px;
        }

        .empty-facility {
            padding: 50px 20px;
        }
        
        .empty-facility h3 {
            font-size: 24px;
        }
    }

    /* ==========================================================================
       ANIMASI SCROLL - FADE IN UP EFFECT
    ========================================================================== */
    [data-aos] {
        opacity: 0;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    [data-aos].aos-animate {
        opacity: 1;
    }

    .hero, .feature-wrapper, .profile, .facilities {
        transition: all 0.3s ease;
    }
    </style>
</head>
<body>

<!-- HERO SECTION -->
<section class="hero" data-aos="fade-up" data-aos-duration="800" data-aos-delay="0">
    <div class="hero-container">
        <div class="hero-content" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
            <div class="hero-label">Selamat Datang di</div>
            <h2>MI AL KAROMAH</h2>
            <h3>Madrasah Hebat, Bermartabat</h3>
            <p>Kami berkomitmen membentuk generasi yang cerdas intelektual, kuat spiritual, dan berakhlak mulia berlandaskan nilai-nilai Islam.</p>
            <div class="hero-btns">
                <a href="#" class="btn-primary">PPDB 2024/2025</a>
                <a href="profil.php" class="btn-outline">Profil Sekolah</a>
            </div>
        </div>
        <div class="hero-image" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
            <img src="img/hero1.jpg" alt="Suasana Madrasah">
        </div>
    </div>
</section>

<!-- KEUNGGULAN (4 fitur) -->
<section class="feature-wrapper" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
    <div class="feature-container">
        <div class="feature-box" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="150">
            <div class="feature-icon">📖</div>
            <div>
                <h4>Pendidikan Berkualitas</h4>
                <p>Mengintegrasikan ilmu pengetahuan dan nilai keislaman.</p>
            </div>
        </div>
        <div class="feature-box" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="250">
            <div class="feature-icon">👤</div>
            <div>
                <h4>Akhlak Mulia</h4>
                <p>Membentuk karakter islami yang santun dan disiplin.</p>
            </div>
        </div>
        <div class="feature-box" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="350">
            <div class="feature-icon">🏆</div>
            <div>
                <h4>Berprestasi</h4>
                <p>Mendorong siswa aktif dan berprestasi akademik.</p>
            </div>
        </div>
        <div class="feature-box" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="450">
            <div class="feature-icon">🕌</div>
            <div>
                <h4>Lingkungan Islami</h4>
                <p>Lingkungan belajar nyaman dan bernuansa islami.</p>
            </div>
        </div>
    </div>
</section>

<!-- PROFIL & INFORMASI TERBARU -->
<section class="profile" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
    <div class="profile-container">
        <div class="profile-text" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200">
            <h2>Profil MI Al Karomah</h2>
            <div class="profile-line"></div>
            <p>
                MI Al Karomah adalah lembaga pendidikan dasar Islam yang berkomitmen
                mencetak generasi beriman, berilmu dan berakhlak mulia serta siap menghadapi tantangan masa depan.
            </p>
            <a href="profil.php" class="profile-btn">Selengkapnya →</a>
        </div>
        <div class="profile-image" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300">
            <img src="img/sejarahmi.jpg" alt="Gedung MI Al Karomah">
        </div>
    </div>

    <div class="news-box" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
        <h3>Informasi Terbaru</h3>
        <div class="news-line"></div>

        <?php if (mysqli_num_rows($queryBerita) > 0) : ?>
            <?php while ($berita = mysqli_fetch_assoc($queryBerita)) : ?>
                
                <div class="news-item" data-aos="fade-left" data-aos-duration="500" data-aos-delay="300">
                    <?php 
                        $namaGambar = !empty($berita['thumbnail']) ? $berita['thumbnail'] : 'default-berita.jpg';
                    ?>
                    
                    <img src="assets/berita/<?= $namaGambar; ?>" 
                         alt="<?= htmlspecialchars($berita['judul']); ?>"
                         onerror="this.onerror=null; this.src='assets/berita/default-berita.jpg';">

                    <div class="news-content">
                        <h4>
                            <?= htmlspecialchars($berita['judul']); ?>
                        </h4>
                        <p>
                            <?= htmlspecialchars(substr($berita['isi'], 0, 55)); ?>...
                        </p>
                        <span>
                            <?= date('d F Y', strtotime($berita['created_at'])); ?>
                        </span>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php else : ?>
            <p style="color: rgba(255,255,255,0.7); font-size: 13px; text-align: center; margin: 30px 0;">
                Belum ada informasi terbaru yang diterbitkan.
            </p>
        <?php endif; ?>

        <a href="berita.php" class="news-btn" data-aos="fade-up" data-aos-duration="500" data-aos-delay="400">
            Lihat Semua Berita →
        </a>

    </div>
</section>

<section class="facilities" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
    <div class="container">

        <div class="section-title" data-aos="fade-down" data-aos-duration="600" data-aos-delay="150">
            <h2>Fasilitas Sekolah</h2>
            <p>Sarana dan prasarana terbaik untuk mendukung kegiatan belajar siswa.</p>
        </div>

        <div class="facilities-grid">
            <?php if (mysqli_num_rows($queryFasilitas) > 0) : ?>

                <?php $delay = 0; while ($f = mysqli_fetch_assoc($queryFasilitas)) : $delay += 100; ?>
                    <div class="facility-card" data-aos="flip-up" data-aos-duration="700" data-aos-delay="<?= $delay; ?>">

                        <div class="facility-image">
                            <img src="assets/fasilitas/<?= $f['gambar']; ?>" 
                                 alt="<?= htmlspecialchars($f['nama']); ?>" 
                                 onerror="this.src='assets/default.jpg'">
                            
                            <div class="facility-overlay">
                                <i class="<?= htmlspecialchars($f['icon']); ?>"></i>
                            </div>
                        </div>

                        <div class="facility-content">
                            <span class="facility-category">
                                <?= htmlspecialchars($f['kategori']); ?>
                            </span>
                            <h3>
                                <?= htmlspecialchars($f['nama']); ?>
                            </h3>
                            <p>
                                <?= htmlspecialchars(substr($f['deskripsi'], 0, 90)); ?>...
                            </p>
                        </div>

                    </div>
                <?php endwhile; ?>

            <?php else : ?>

                <div class="empty-facility-wrapper" style="grid-column: 1 / -1; text-align: center; width: 100%;" data-aos="fade-up" data-aos-duration="600">
                    <div class="empty-facility">
                        <i class="fas fa-school" style="font-size: 48px; color: #cbd5e1; margin-bottom: 15px; display: inline-block;"></i>
                        <h3>Belum Ada Fasilitas</h3>
                        <p>Data fasilitas sekolah belum tersedia saat ini.</p>
                    </div>
                </div>

            <?php endif; ?>
        </div>

    </div>
</section>

<script>
document.querySelectorAll('.footer-socials a').forEach(function(elem) {
    elem.addEventListener('click', function(e) {
        if (!/Android|iPhone|iPad/i.test(navigator.userAgent)) {
            e.preventDefault();
            window.open(this.getAttribute('data-desktop'), '_blank');
        }
    });
});
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800, 
        once: true,    
        offset: 50,     
        delay: 0,           
        easing: 'ease-out-cubic', 
    });

    window.addEventListener('load', function() {
        AOS.refresh();
    });
</script>

<?php
include 'layout/footer.php';
?>

</body>
</html>
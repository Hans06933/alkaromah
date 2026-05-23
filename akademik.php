<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Akademik - MI Al Karomah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- AOS ANIMATION CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .page-title {
            background: #fefcf5; 
            padding: 0; 
            position: relative;
            overflow: hidden;
            min-height: 380px;
            display: flex;
            align-items: center;
        }

        .title-wrapper {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr; 
            width: 10%;
            height: 100%;
            align-items: center;
        }

        .title-text {
            padding: 60px 0 60px 7%; 
            position: relative;
            z-index: 3;
        }

        .title-text h1 {
            font-size: 2.8rem;
            color: #0f6b3b;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .breadcrumb {
            color: #666;
            margin-top: 8px;
        }

        .breadcrumb a {
            color: #0f6b3b;
            text-decoration: none;
        }

        .title-image {
            width: 100%;
            height: 100%;
            position: absolute; 
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 1;
            display: flex;
            justify-content: flex-end; 
        }

        .title-image img {
            width: 50%;
            height: 100%;
            object-fit: contain; 
            object-position: right center;
            -webkit-mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0) 15%, 
                rgba(0,0,0,1) 65%
            );
            mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0) 15%, 
                rgba(0,0,0,1) 65%
            );
            border-radius: 0;
            box-shadow: none;
        }

        @media (max-width: 768px) {
            .page-title {
                padding: 0 !important; 
                min-height: 160px !important; 
                height: 160px !important;
                display: flex !important; 
                align-items: center !important;
                position: relative !important;
                overflow: hidden !important;
            }

            .title-wrapper {
                display: grid !important;
                grid-template-columns: 28% 72% !important; 
                width: 100% !important;
                height: 100% !important;
                align-items: center !important;
            }

            .title-text {
                padding: 0 0 0 8px !important; 
                text-align: left !important;
                z-index: 3 !important; 
            }

            .title-text h1 {
                font-size: 1.15rem !important; 
                margin-bottom: 2px !important;
                font-weight: 800 !important;
                white-space: nowrap !important;
            }

            .breadcrumb {
                font-size: 0.75rem !important;
                margin-top: 0 !important;
            }

            .title-image {
                position: absolute !important; 
                right: 0 !important;
                top: 0 !important;
                bottom: 0 !important;
                width: 75% !important;
                height: 100% !important;
                z-index: 1 !important;
                display: flex !important;
                justify-content: flex-end !important;
            }

            .title-image img {
                width: 100% !important; 
                height: 100% !important;
                object-fit: cover !important; 
                object-position: right center !important; 
                -webkit-mask-image: linear-gradient(to right, 
                    rgba(0, 0, 0, 0) 0%, 
                    rgba(0, 0, 0, 0) 30%, 
                    rgba(0, 0, 0, 1) 70%, 
                    rgba(0, 0, 0, 1) 100%
                ) !important;
                mask-image: linear-gradient(to right, 
                    rgba(0, 0, 0, 0) 0%, 
                    rgba(0, 0, 0, 0) 30%, 
                    rgba(0, 0, 0, 1) 70%, 
                    rgba(0, 0, 0, 1) 100%
                ) !important;
                border-radius: 0 !important;
                box-shadow: none !important;
            }
        }    

        .stats {
            padding: 60px 0;
            background: #fafafa;
        }

        .stats-main-box {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            background: white;
            padding: 40px 10px;
            border-radius: 32px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.03);
            border: 1px solid #f1f1f1;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 10px 20px;
            position: relative;
        }

        .stat-item:not(:last-child)::after {
            content: "";
            position: absolute;
            right: 0;
            top: 15%;
            height: 70%;
            width: 1px;
            background: #e6e6e6;
        }

        .stat-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .icon-bg-green { background: #0f6b3b; }
        .icon-bg-light { background: #f4f9f6; }
        .icon-bg-orange { background: #fffbf0; border: 1px solid #fef0c7; }

        .stat-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #666;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-main-text {
            font-size: 1.55rem;
            font-weight: 800;
            color: #0f6b3b;
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .stat-sub-label {
            font-size: 0.85rem;
            color: #888;
            font-weight: 400;
        }

        @media screen and (max-width: 768px) {
            .stats {
                padding: 25px 0 !important;
            }

            .stats .stats-main-box {
                display: grid !important;
                grid-template-columns: repeat(2, 1fr) !important; 
                padding: 24px 10px !important;
                border-radius: 24px !important;
                gap: 20px 10px !important;
            }

            .stats-main-box .stat-item {
                padding: 10px !important;
                width: 100% !important;
                box-sizing: border-box !important;
            }

            .stat-item:not(:last-child)::after {
                display: none !important;
            }

            .stat-item:nth-child(1),
            .stat-item:nth-child(2) {
                border-bottom: 1px dashed #eee !important;
                padding-bottom: 20px !important;
            }

            .stat-item:nth-child(3),
            .stat-item:nth-child(4) {
                border-bottom: none !important;
                padding-bottom: 10px !important;
            }

            .stat-icon {
                width: 40px !important;
                height: 40px !important;
                margin-bottom: 10px !important;
            }
            
            .stat-icon svg {
                width: 18px !important;
                height: 18px !important;
            }

            .stat-label {
                font-size: 0.75rem !important;
                margin-bottom: 4px !important;
            }

            .stat-main-text {
                font-size: 1.2rem !important;
                font-weight: 800 !important;
            }

            .stat-sub-label {
                font-size: 0.78rem !important;
            }
        }

        .kurikulum {
            padding: 60px 0;
            background: #ffffff;
        }

        .kurikulum-main-grid {
            display: grid;
            grid-template-columns: 4fr 7fr;
            gap: 40px;
            align-items: start;
        }

        .kurikulum-banner-card {
            background: #064e26;
            background: linear-gradient(135deg, #0f6b3b 0%, #053b1f 100%);
            padding: 40px 30px;
            border-radius: 24px;
            color: white;
        }

        .kurikulum-banner-card .tag-title {
            font-size: 0.9rem;
            color: #a3e635;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 10px;
        }

        .kurikulum-banner-card h2 {
            font-size: 2rem;
            font-weight: 800;
            color: #facc15;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .kurikulum-banner-card p {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #e2e8f0;
            margin-bottom: 25px;
        }

        .banner-features {
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
        }

        .banner-features li {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.92rem;
            color: #ffffff;
            margin-bottom: 12px;
        }

        .banner-features li svg {
            color: #a3e635;
            flex-shrink: 0;
        }

        .kurikulum-banner-card .btn-more {
            display: inline-block;
            background: white;
            color: #0f6b3b;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .pendekatan-container {
            padding-left: 10px;
        }

        .section-sub-title {
            color: #0f6b3b;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .pendekatan-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .pendekatan-item {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .p-icon-box {
            width: 48px;
            height: 48px;
            background: #f4f9f6;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .p-text h4 {
            font-size: 1.1rem;
            color: #0f6b3b;
            font-weight: 700;
            margin: 0 0 6px 0;
        }

        .p-text p {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.4;
            margin: 0;
        }

        .section-main-title {
            color: #0f6b3b;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0 0 25px 0;
            position: relative;
            padding-bottom: 8px;
        }

        .section-main-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #facc15;
        }

        .mapel-section {
            padding: 30px 0;
            background: #fff;
        }

        .mapel-slider-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .mapel-scroll-container {
            display: flex;
            gap: 16px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px 0;
            width: 100%;
        }

        .mapel-scroll-container::-webkit-scrollbar {
            display: none;
        }

        .mapel-node {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            min-width: 110px;
            gap: 10px;
        }

        .mapel-node .m-icon {
            width: 54px;
            height: 54px;
            background: #f4f9f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .mapel-node span {
            font-size: 0.85rem;
            font-weight: 600;
            color: #333;
        }

        .slider-arrow-next {
            width: 36px;
            height: 36px;
            background: #0f6b3b;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: absolute;
            right: -15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .program-unggulan-new {
            padding: 50px 0;
            background: #ffffff;
        }

        .program-cards-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
        }

        .p-card-item {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            border: 1px solid #f1f1f1;
            transition: transform 0.3s;
        }

        .p-card-item:hover {
            transform: translateY(-5px);
        }

        .p-card-img-box {
            width: 100%;
            height: 140px;
            overflow: hidden;
        }

        .p-card-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .p-card-body {
            padding: 16px;
        }

        .p-card-body h4 {
            font-size: 1rem;
            color: #0f6b3b;
            font-weight: 700;
            margin: 0 0 8px 0;
        }

        .p-card-body p {
            font-size: 0.8rem;
            color: #666;
            line-height: 1.4;
            margin: 0;
        }

        @media screen and (max-width: 768px) {
            .kurikulum {
                padding: 30px 0 !important;
            }

            .kurikulum-main-grid {
                grid-template-columns: 1fr !important;
                gap: 30px !important;
            }

            .kurikulum-banner-card {
                padding: 25px 20px !important;
                border-radius: 20px !important;
            }

            .kurikulum-banner-card h2 {
                font-size: 1.6rem !important;
            }

            .pendekatan-grid {
                grid-template-columns: 1fr !important;
                gap: 18px !important;
            }

            .mapel-scroll-container {
                padding-right: 40px !important;
            }
            
            .slider-arrow-next {
                display: none !important;
            }

            .program-cards-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 12px !important;
            }

            .p-card-img-box {
                height: 100px !important;
            }

            .p-card-body {
                padding: 10px !important;
            }

            .p-card-body h4 {
                font-size: 0.88rem !important;
            }

            .p-card-body p {
                font-size: 0.75rem !important;
            }
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

<section class="page-title" data-aos="fade-up" data-aos-duration="800" data-aos-delay="0">
    <div class="container">
        <div class="title-wrapper">
            <div class="title-text" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                <h1>Informasi Akademik</h1>
                <div class="breadcrumb">
                    <a href="index.php">Beranda</a> &gt; <span>Akademik</span>
                </div>
            </div>
            <div class="title-image" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                <img src="img/akademik.png" alt="Ilustrasi Akademik">
            </div>
        </div>
    </div>
</section>

<section class="stats" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
    <div class="container">
        <div class="stats-main-box">
            
            <div class="stat-item" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="150">
                <div class="stat-icon icon-bg-green">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15z"></path></svg>
                </div>
                <div class="stat-label">Kurikulum</div>
                <div class="stat-main-text">Kurikulum Merdeka</div>
                <div class="stat-sub-label">Terstruktur & Adaptif</div>
            </div>

            <div class="stat-item" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="250">
                <div class="stat-icon icon-bg-light">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#0f6b3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <div class="stat-label">Guru</div>
                <div class="stat-main-text">25+</div>
                <div class="stat-sub-label">Guru Profesional</div>
            </div>

            <div class="stat-item" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="350">
                <div class="stat-icon icon-bg-orange">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#facc15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"></path></svg>
                </div>
                <div class="stat-label">Mata Pelajaran</div>
                <div class="stat-main-text">10+</div>
                <div class="stat-sub-label">Bidang Studi</div>
            </div>

            <div class="stat-item" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="450">
                <div class="stat-icon icon-bg-light">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#0f6b3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                </div>
                <div class="stat-label">Program Unggulan</div>
                <div class="stat-main-text">6</div>
                <div class="stat-sub-label">Program Akademik</div>
            </div>

        </div>
    </div>
</section>

<section class="kurikulum" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
    <div class="container">
        <div class="kurikulum-main-grid">
            
            <div class="kurikulum-banner-card" data-aos="fade-right" data-aos-duration="800" data-aos-delay="200">
                <span class="tag-title">Kurikulum</span>
                <h2>Kurikulum Merdeka</h2>
                <p>Kami menerapkan Kurikulum Merdeka yang berfokus pada pengembangan karakter, literasi, numerasi, dan kompetensi siswa secara menyeluruh.</p>
                
                <ul class="banner-features">
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Pembelajaran berdiferensiasi
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Projek penguatan profil pelajar Pancasila
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Asesmen berkelanjutan
                    </li>
                </ul>
                <a href="#" class="btn-more">Selengkapnya ➔</a>
            </div>

            <div class="pendekatan-container" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300">
                <h3 class="section-sub-title">Pendekatan Pembelajaran</h3>
                <div class="pendekatan-grid">
                    
                    <div class="pendekatan-item" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="350">
                        <div class="p-icon-box">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#0f6b3b" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        </div>
                        <div class="p-text">
                            <h4>Aktif & Interaktif</h4>
                            <p>Siswa terlibat aktif dalam kegiatan pembelajaran.</p>
                        </div>
                    </div>

                    <div class="pendekatan-item" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="400">
                        <div class="p-icon-box">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#0f6b3b" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                        </div>
                        <div class="p-text">
                            <h4>Berbasis Projek</h4>
                            <p>Belajar melalui projek nyata dan kolaboratif.</p>
                        </div>
                    </div>

                    <div class="pendekatan-item" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="450">
                        <div class="p-icon-box">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#0f6b3b" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        </div>
                        <div class="p-text">
                            <h4>Berorientasi Karakter</h4>
                            <p>Mengembangkan nilai-nilai akhlak dan kepribadian.</p>
                        </div>
                    </div>

                    <div class="pendekatan-item" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="500">
                        <div class="p-icon-box">
                            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#0f6b3b" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15z"></path></svg>
                        </div>
                        <div class="p-text">
                            <h4>Literasi & Numerasi</h4>
                            <p>Penguatan literasi dan numerasi sejak dini.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="mapel-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
    <div class="container">
        <h3 class="section-main-title" data-aos="fade-down" data-aos-duration="600" data-aos-delay="150">Mata Pelajaran</h3>
        <div class="mapel-slider-wrapper">
            <div class="mapel-scroll-container">
                <div class="mapel-node" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="200"><div class="m-icon"><span class="m-dot">🌙</span></div><span>Pendidikan Agama Islam</span></div>
                <div class="mapel-node" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="250"><div class="m-icon">📖</div><span>Bahasa Indonesia</span></div>
                <div class="mapel-node" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300"><div class="m-icon">➕</div><span>Matematika</span></div>
                <div class="mapel-node" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="350"><div class="m-icon">🔬</div><span>Ilmu Pengetahuan Alam</span></div>
                <div class="mapel-node" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="400"><div class="m-icon">🌍</div><span>Ilmu Pengetahuan Sosial</span></div>
                <div class="mapel-node" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="450"><div class="m-icon">🗣️</div><span>Bahasa Inggris</span></div>
                <div class="mapel-node" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="500"><div class="m-icon">🎨</div><span>Seni Budaya & Prakarya</span></div>
                <div class="mapel-node" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="550"><div class="m-icon">🏃</div><span>Pendidikan Jasmani</span></div>
                <div class="mapel-node" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="600"><div class="m-icon">💻</div><span>Informatika</span></div>
            </div>
            <div class="slider-arrow-next">➔</div>
        </div>
    </div>
</section>

<section class="program-unggulan-new" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
    <div class="container">
        <h3 class="section-main-title" data-aos="fade-down" data-aos-duration="600" data-aos-delay="150">Program Unggulan Akademik</h3>
        <div class="program-cards-grid">
            
            <div class="p-card-item" data-aos="flip-up" data-aos-duration="700" data-aos-delay="200">
                <div class="p-card-img-box">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=500&q=80" alt="Tahfidz">
                </div>
                <div class="p-card-body">
                    <h4>Tahfidz Al-Qur'an</h4>
                    <p>Program menghafal Al-Qur'an dengan metode yang menyenangkan.</p>
                </div>
            </div>

            <div class="p-card-item" data-aos="flip-up" data-aos-duration="700" data-aos-delay="300">
                <div class="p-card-img-box">
                    <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=500&q=80" alt="Sains">
                </div>
                <div class="p-card-body">
                    <h4>Sains Club</h4>
                    <p>Eksperimen dan eksplorasi sains untuk menumbuhkan rasa ingin tahu.</p>
                </div>
            </div>

            <div class="p-card-item" data-aos="flip-up" data-aos-duration="700" data-aos-delay="400">
                <div class="p-card-img-box">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=500&q=80" alt="Literasi">
                </div>
                <div class="p-card-body">
                    <h4>Literasi Digital</h4>
                    <p>Pembelajaran literasi digital dan pemanfaatan teknologi secara bijak.</p>
                </div>
            </div>

            <div class="p-card-item" data-aos="flip-up" data-aos-duration="700" data-aos-delay="500">
                <div class="p-card-img-box">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=500&q=80" alt="English">
                </div>
                <div class="p-card-body">
                    <h4>English Club</h4>
                    <p>Program peningkatan kemampuan bahasa Inggris secara aktif.</p>
                </div>
            </div>

            <div class="p-card-item" data-aos="flip-up" data-aos-duration="700" data-aos-delay="600">
                <div class="p-card-img-box">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500&q=80" alt="Olimpiade">
                </div>
                <div class="p-card-body">
                    <h4>Olimpiade & Kompetisi</h4>
                    <p>Pembinaan prestasi akademik dan persiapan kompetisi siswa.</p>
                </div>
            </div>

        </div>
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
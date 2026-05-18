<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MI Al Karomah - Madrasah Hebat Bermartabat</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* ---------- RESET & GLOBAL ---------- */
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

        /* ==========================================================================
        KODE ASLI UNTUK LAPTOP (TIDAK BERUBAH)
        ========================================================================== */

        /* ---------- TOPBAR ---------- */
        .topbar {
            background: #066534;
            color: white;
            padding: 8px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .top-left {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .ppdb-btn {
            background: #facc15;
            color: #064e3b;
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 12px;
            transition: 0.2s;
            text-decoration: none;
        }

        .ppdb-btn:hover {
            background: #e5b800;
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .social-icon {
            color: #ffffff;
            font-size: 16px;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .social-icon:hover {
            transform: translateY(-2px);
        }

        .social-icon:hover .fa-facebook-f { color: #1877F2; }
        .social-icon:hover .fa-instagram { color: #E1306C; }
        .social-icon:hover .fa-youtube { color: #FF0000; }

        /* ---------- HEADER / NAVBAR ---------- */
        header {
            background: white;
            padding: 18px 7%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .logo img {
            width: 70px;
            height: auto;
            background: #e9ecef;
            border-radius: 12px;
        }

        .logo-text h1 {
            font-size: 38px;
            font-weight: 800;
            color: #0f6b3b;
            line-height: 1;
        }

        .logo-text p {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }

        nav {
            display: flex;
            gap: 25px;
            align-items: center;
            flex-wrap: wrap;
        }

        nav a {
            color: #222;
            font-weight: 500;
            position: relative;
            text-decoration: none;
        }

        nav a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 0%;
            height: 3px;
            background: #15803d;
            transition: 0.3s;
            border-radius: 10px;
        }

        nav a:hover::after {
            width: 100%;
        }

        .search-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #0f6b3b;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: 0.2s;
        }

        .search-btn:hover {
            background: #0a532e;
        }

        /* Menyembunyikan fungsionalitas hamburger bawaan di laptop */
        .menu-toggle, .hamburger-icon {
            display: none;
        }

        @media (max-width: 768px) {
    /* 1. Reset Topbar */
    .topbar {
        flex-direction: row !important;
        justify-content: space-between !important;
        padding: 8px 5%;
    }
    
    .top-left { flex: 1; }
    .top-right { flex: none; margin-left: auto; }

    /* 2. Header & Navbar Mobile */
    header {
        padding: 10px 5% !important; /* Batasi padding agar tidak terlalu tebal di HP */
    }

    .navbar {
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-between !important; /* Memaksa grup logo (kiri) dan grup utilitas (kanan) saling menjauh */
        align-items: center !important;
        flex-wrap: nowrap !important;
        width: 100% !important;
    }

    /* KUNCI PERBAIKAN LOGO (RATA KIRI PENUH) */
    .logo {
        display: flex !important;
        flex-direction: row !important; /* Memaksa gambar & teks berjejer kesamping */
        align-items: center !important;
        justify-content: flex-start !important; /* Memaksa seluruh isi logo rapat ke ujung kiri */
        text-align: left !important; /* Menghapus efek center jika ada */
        flex-wrap: nowrap !important;
        margin: 0 !important; /* Menghilangkan margin auto yang bikin elemen ke tengah */
        padding: 0 !important;
        flex: 1 !important;
    }

    .logo img {
        width: 40px !important; /* Ukuran diperkecil sedikit agar pas di layar HP mini */
        height: 40px !important;
        object-fit: contain !important;
        border-radius: 8px !important;
        flex-shrink: 0 !important; /* Menjaga logo gambar agar tidak gepeng */
        margin-right: 10px !important; /* Jarak antara logo gambar dan teks di sampingnya */
    }

    .logo-text {
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important; /* Teks rata kiri */
        justify-content: center !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* TULISAN DIBUAT LEBIH KECIL & RAPI */
    .logo-text h1 {
        font-size: 16px !important; /* Diperkecil dari 18px/20px agar pas satu baris dan rapi */
        font-weight: 800 !important;
        color: #0f6b3b !important;
        line-height: 1.2 !important;
        margin: 0 !important;
        letter-spacing: 0.5px !important; /* Memberi sedikit jarak antar huruf agar elegan */
    }

    .logo-text p {
        font-size: 9px !important; /* Slogan dibuat super kecil namun tetap terbaca */
        color: #666 !important;
        margin: 2px 0 0 0 !important;
        line-height: 1 !important;
        white-space: nowrap !important; /* Mencegah slogan patah menjadi 2 baris */
    }

    /* Sisi Kanan: Pembungkus Utilitas (Search & Hamburger) */
    .nav-utilities {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        flex-shrink: 0 !important;
        margin-left: auto !important; /* Memastikan area ini tetap terkunci di ujung kanan */
    }

    .search-btn {
        width: 32px !important;
        height: 32px !important;
        font-size: 12px !important;
    }

    /* Hamburger Icon */
    .hamburger-icon {
        display: flex !important;
        flex-direction: column !important;
        gap: 4px !important;
        cursor: pointer;
        z-index: 1000 !important;
    }

    .hamburger-icon span {
        display: block !important;
        width: 22px !important;
        height: 2.5px !important;
        background: #0f6b3b !important;
        border-radius: 2px !important;
        transition: 0.3s !important;
    }

    /* Nav Dropdown Mobile */
    nav {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: white;
        flex-direction: column;
        gap: 0;
        padding: 5px 0;
        box-shadow: 0 10px 15px rgba(0,0,0,0.08);
        border-top: 1px solid #f0f0f0;
    }

    nav a {
        width: 100%;
        padding: 14px 5%;
        box-sizing: border-box;
        border-bottom: 1px solid #f9f9f9;
        text-decoration: none;
    }

    nav a::after { display: none; }
    .menu-toggle:checked ~ nav { display: flex; }

    /* Animasi Hamburger */
    .menu-toggle:checked ~ .hamburger-icon span:nth-child(1) { transform: rotate(45deg) translate(4px, 5px); }
    .menu-toggle:checked ~ .hamburger-icon span:nth-child(2) { opacity: 0; }
    .menu-toggle:checked ~ .hamburger-icon span:nth-child(3) { transform: rotate(-45deg) translate(5px, -5px); }
}

    /* ---------- HERO SECTION (Final) ---------- */
    .hero {
        padding: 40px 7% 20px;
        position: relative;
    }

    .hero-container {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr; /* proporsi teks : gambar */
        align-items: center;
        background: #fdfcf7;
        border-radius: 35px;
        overflow: hidden;
        position: relative;
        min-height: 500px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    /* Background Hijau Lengkung di sisi kanan */
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

    /* Ornamen kotak/berlian di bawah tengah perbatasan */
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

    /* Area gambar – FULL menutupi area hijau */
    .hero-image {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 100%;
        min-height: 480px;
        overflow: hidden; /* agar masking tidak kelebihan */
    }

    .hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;      /* MEMENUHI seluruh area tanpa ruang kosong */
        object-position: center left; /* fokus ke sisi kiri gambar (penting agar gradasi kiri bagus) */
        
        /* Efek gradasi dari kiri ke kanan (transparan -> solid) */
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
        
        /* Opsional: sedikit kecerahan agar menyatu */
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
            padding: 15px 4% 15px; /* Memperkecil padding luar area hero di HP */
        }

        .hero-container {
            /* Mengubah sistem grid menjadi baris lurus ke samping tanpa patah ke bawah */
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: space-between !important;
            flex-wrap: nowrap !important; /* KUNCI UTAMA: Gambar dilarang keras turun ke bawah */
            min-height: auto !important; /* Menghapus tinggi statis 500px agar proporsional */
            height: 260px !important; /* Mengunci tinggi wadah agar seragam di HP */
            border-radius: 20px !important; /* Menyesuaikan lengkungan box di layar kecil */
        }

        /* Background Hijau Kanan Tetap Dipertahankan & Disesuaikan Skalanya */
        .hero-container::before {
            width: 45% !important; /* Menyesuaikan porsi area hijau di HP */
            clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 0% 100%) !important;
            opacity: 1 !important; /* Menjaga warna hijau solid, bukan transparan */
        }

        /* Ornamen Berlian Tengah Bawah */
        .hero-container::after {
            left: 55% !important; /* Menggeser posisi berlian mengikuti batas lekukan baru */
            width: 35px !important;
            height: 35px !important;
            bottom: -10px !important;
            border: 3px solid #fdfcf7 !important;
        }

        /* AREA KONTEN TEKS (SISI KIRI) */
        .hero-content {
            padding: 15px 0 15px 20px !important; /* Merapikan padding teks bagian dalam */
            flex: 1.3 !important; /* Memberikan porsi ruang lebih dominan untuk teks */
            z-index: 3 !important;
        }

        .hero-label {
            font-size: 9px !important; /* Mengecilkan badge label sekolah */
            padding: 4px 10px !important;
            margin-bottom: 8px !important;
            border-radius: 5px !important;
        }

        /* Ukuran Judul Utama Dipaksa Lebih Kecil & Rapi */
        .hero-content h2 {
            font-size: 20px !important; /* Diturunkan ekstrem dari 64px agar pas di layar HP */
            line-height: 1.1 !important;
            margin-bottom: 4px !important;
            letter-spacing: 0px !important;
        }

        /* Sub-judul */
        .hero-content h3 {
            font-size: 13px !important; /* Diturunkan dari 32px */
            line-height: 1.2 !important;
            margin-bottom: 8px !important;
        }

        /* Paragraf Deskripsi */
        .hero-content p {
            font-size: 10px !important; /* Ukuran teks deskripsi dibuat presisi dan rapi */
            line-height: 1.4 !important;
            margin-bottom: 12px !important;
            max-width: 100% !important;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Membatasi teks maksimal 3 baris di HP agar tidak luber */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Kelompok Tombol */
        .hero-btns {
            gap: 8px !important; /* Merapatkan jarak antar tombol */
        }

        .btn-primary, .btn-outline {
            padding: 6px 14px !important; /* Memperkecil ukuran tombol */
            font-size: 10px !important;
            border-radius: 20px !important;
            gap: 5px !important;
        }

        /* AREA GAMBAR (SISI KANAN - MEMENUHI BG HIJAU) */
        .hero-image {
            flex: 0.9 !important; /* Porsi ruang gambar di kanan */
            height: 100% !important;
            min-height: auto !important;
            display: block !important;
        }

        .hero-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important; /* Tetap full memenuhi area hijau */
            object-position: center left !important;
            max-height: none !important;

            /* Efek Gradasi Lembut Masking Transparan Asli Anda Tetap Terkunci Sempurna */
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
            margin-top: -20px !important; /* Kurangi margin minus agar tidak terlalu memotong hero mobile */
            padding: 0 4% !important; /* Jarak aman tepi layar HP */
        }

        .feature-container {
            /* KUNCI: Mengubah dari 4 kolom menjadi susunan kotak rapi 2x2 di HP */
            grid-template-columns: repeat(2, 1fr) !important; 
            overflow: visible !important; /* Diperlukan agar efek bayangan timbul tidak terpotong */
            background: transparent !important; /* Izinkan latar belakang dikelola oleh masing-masing box */
            box-shadow: none !important; /* Hapus shadow bawaan container */
        }

        .feature-box {
            background: white !important;
            padding: 20px 15px !important; /* Perkecil padding dalam kotak agar efisien */
            display: flex !important;
            flex-direction: column !important; /* Paksa ikon di atas, teks di bawahnya agar rapi */
            align-items: center !important; /* Semua konten rata tengah */
            text-align: center !important;
            gap: 12px !important;
            
            /* Set ulang border agar membentuk grid silang (tengah) yang rapi */
            border-right: 1px solid #eee !important;
            border-bottom: 1px solid #eee !important;
            box-sizing: border-box !important;
            
            /* Persiapan animasi transisi saat disentuh */
            transition: all 0.25s ease-in-out !important;
            position: relative !important;
            z-index: 1 !important;
        }

        /* Merapikan garis border grid agar tidak ganda di tepi luar */
        .feature-box:nth-child(2n) {
            border-right: none !important; /* Hilangkan border kanan untuk kolom kedua */
        }
        
        .feature-box:nth-child(3), 
        .feature-box:nth-child(4) {
            border-bottom: none !important; /* Hilangkan border bawah untuk baris terakhir */
        }

        /* Mengatur kelengkungan sudut (border-radius) box secara individual karena kontainer luar dipecah */
        .feature-box:nth-child(1) { border-top-left-radius: 20px !important; }
        .feature-box:nth-child(2) { border-top-right-radius: 20px !important; }
        .feature-box:nth-child(3) { border-bottom-left-radius: 20px !important; }
        .feature-box:nth-child(4) { border-bottom-right-radius: 20px !important; }

        /* Ukuran Komponen Ikon di HP */
        .feature-icon {
            min-width: 45px !important;
            height: 45px !important;
            font-size: 18px !important;
        }

        /* Ukuran Judul Fitur */
        .feature-box h4 {
            font-size: 14px !important;
            margin-bottom: 4px !important;
            font-weight: 700 !important;
        }

        /* Teks Deskripsi Fitur */
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
            z-index: 5 !important; /* Angkat box ke atas elemen lain agar shadow tidak tertutup */
            background: #fafdfb !important; /* Efek highlight warna hijau super tipis */
            
            /* Merubah border abu-abu kasar menjadi hijau khas sekolah saat ditekan */
            border-color: #0f6b3b !important; 
            
            /* Memberikan kelengkungan penuh pada box yang sedang aktif */
            border-radius: 15px !important; 
            
            /* Efek timbul (elevation shadow) yang lembut dan nyata */
            box-shadow: 0 10px 25px rgba(15, 107, 59, 0.15) !important;
            
            /* Efek pop-up sedikit membal ke atas */
            transform: translateY(-4px) scale(1.02) !important; 
        }
    }

    /* ---------- PROFILE SECTION ---------- */
    .profile {
        padding: 80px 7%;
    }

    .profile-container {
        display: grid;
        grid-template-columns: 1fr 1fr 350px;
        gap: 30px;
        align-items: start;
    }

    .profile-text h2 {
        font-size: 45px;
        color: #0f6b3b;
        margin-bottom: 20px;
    }

    .profile-line {
        width: 120px;
        height: 5px;
        background: #facc15;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    .profile-text p {
        line-height: 2;
        color: #666;
        margin-bottom: 30px;
    }

    .profile-btn {
        background: #0f6b3b;
        color: white;
        padding: 15px 30px;
        border-radius: 40px;
        display: inline-block;
        transition: 0.2s;
    }

    .profile-btn:hover {
        background: #0a532e;
        transform: translateX(5px);
    }

    .profile-image img {
        width: 100%;
        border-radius: 25px;
        height: 100%;
        object-fit: cover;
        background: #b9ad8a;
        min-height: 280px;
    }

    /* ==========================================================================
   KODE UNTUK LAPTOP & DESKTOP (TIDAK BERUBAH - BIARKAN DI ATAS)
   ========================================================================== */
    /* ... (Pertahankan semua kode .profile, .profile-container, dsb asli Anda) ... */


    /* ==========================================================================
    PERBAIKAN RESPONSIF KHUSUS SMARTPHONE (max-width: 768px)
    ========================================================================== */
    @media (max-width: 768px) {
        .profile {
            padding: 30px 4% !important; /* Memperkecil padding luar agar muat di layar HP */
        }

        .profile-container {
            /* KUNCI UTAMA: Mengubah grid 3 kolom menjadi flex baris lurus kesamping */
            display: flex !important;
            flex-direction: row !important; 
            align-items: center !important; /* Menyeimbangkan posisi teks dan gambar agar sejajar vertikal */
            justify-content: space-between !important;
            flex-wrap: nowrap !important; /* Melarang keras gambar jatuh atau patah ke bawah */
            gap: 15px !important; /* Mempersempit sela jarak antar elemen */
            width: 100% !important;
        }

        /* SISI KIRI: AREA KONTEN TEKS PROFIL */
        .profile-text {
            flex: 1.4 !important; /* Memberikan porsi ruang lebih dominan untuk teks */
            text-align: left !important; /* Memastikan tulisan rata kiri penuh */
        }

        .profile-text h2 {
            font-size: 20px !important; /* Menurunkan font h2 dari 45px agar pas di layar HP */
            margin-bottom: 8px !important;
            line-height: 1.2 !important;
        }

        /* Garis dekorasi kuning di bawah judul */
        .profile-line {
            width: 60px !important; /* Memperpendek garis hiasan agar serasi dengan judul kecil */
            height: 3px !important;
            margin-bottom: 12px !important;
        }

        .profile-text p {
            font-size: 11px !important; /* Mengecilkan ukuran paragraf agar rapi */
            line-height: 1.5 !important; /* Menyesuaikan tinggi spasi teks di mobile */
            margin-bottom: 15px !important;
            color: #555 !important;
            
            /* Opsional: Membatasi agar teks deskripsi tidak terlalu panjang ke bawah di HP */
            display: -webkit-box;
            -webkit-line-clamp: 5; 
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Tombol Selengkapnya */
        .profile-btn {
            padding: 8px 18px !important; /* Memperkecil ukuran tombol di mobile */
            font-size: 11px !important;
            border-radius: 20px !important;
        }

        /* SISI KANAN: AREA GAMBAR PROFIL */
        .profile-image {
            flex: 0.9 !important; /* Porsi ruang gambar di sebelah kanan */
            display: flex !important;
            justify-content: flex-end !important;
            height: 100% !important;
        }

        .profile-image img {
            width: 110px !important; /* KUNCI UTAMA: Memaksa ukuran gambar mengecil statis agar pas bersanding */
            max-width: 100% !important;
            height: 140px !important; /* Memberikan tinggi statis yang seimbang dengan teks di kirinya */
            min-height: auto !important; /* Menghapus aturan min-height 280px bawaan laptop */
            border-radius: 15px !important; /* Menyesuaikan radius lengkungan dengan skala gambar baru */
            object-fit: cover !important; /* Gambar tetap dipotong rapi tanpa merusak rasionya */
            flex-shrink: 0 !important; /* Mencegah gambar ringsek atau gepeng akibat tekanan teks */
            box-shadow: 0 6px 15px rgba(0,0,0,0.06) !important;
        }
    }

    /* ==========================================================================
    CSS FOOTER UTAMA (DEFAULT LAPTOP / DESKTOP)
    ========================================================================== */
    footer {
        background: #054e2d; 
        color: #f1f5f9;
        padding: 60px 7% 25px;
        font-size: 14px;
        border-top: 5px solid #facc15;
    }

    .footer-container {
        display: grid;
        /* Membagi rata menjadi 3 kolom layout profesional di laptop */
        grid-template-columns: 1.2fr 0.8fr 1fr;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-column h3 {
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    /* Garis dekoratif kecil di bawah setiap judul kolom */
    .footer-line {
        width: 40px;
        height: 3px;
        background: #facc15;
        border-radius: 2px;
        margin-bottom: 20px;
    }

    /* Kolom 1: Profil */
    .brand-desc {
        line-height: 1.6;
        color: #cbd5e1;
        margin-bottom: 25px;
    }

    /* Penataan Grup Media Sosial */
    .footer-socials {
        display: flex;
        gap: 12px;
    }

    .f-social-icon {
        width: 38px;
        height: 38px;
        background: rgba(255, 255, 255, 0.08);
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .f-social-icon:hover {
        transform: translateY(-4px);
        color: white;
    }
    .f-social-icon.fb:hover { background: #1877F2; box-shadow: 0 4px 15px rgba(24, 119, 242, 0.4); }
    .f-social-icon.ig:hover { background: #E1306C; box-shadow: 0 4px 15px rgba(225, 48, 108, 0.4); }
    .f-social-icon.yt:hover { background: #FF0000; box-shadow: 0 4px 15px rgba(255, 0, 0, 0.4); }

    /* Kolom 2: Tautan Cepat */
    .quick-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .quick-links li {
        margin-bottom: 12px;
    }

    .quick-links a {
        color: #cbd5e1;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .quick-links a i {
        font-size: 10px;
        color: #facc15;
        transition: transform 0.2s;
    }

    .quick-links a:hover {
        color: #ffffff;
    }

    .quick-links a:hover i {
        transform: translateX(4px); /* Efek panah bergeser saat link disorot */
    }

    /* Kolom 3: Kontak */
    .footer-info {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .footer-link {
        color: #cbd5e1;
        text-decoration: none;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        transition: color 0.2s ease;
        line-height: 1.4;
    }

    .icon-wrapper {
        font-size: 16px;
        flex-shrink: 0;
    }

    .footer-link:hover {
        color: #facc15;
    }

    /* Area Bawah: Copyright */
    .footer-divider {
        grid-column: span 3; /* Memaksa garis melintang memotong penuh 3 kolom */
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        margin: 20px 0 5px 0;
    }

    .footer-copyright {
        grid-column: span 3;
        text-align: center;
        font-size: 12px;
        color: #94a3b8;
    }

    /* ==========================================================================
    OPTIMASI FOOTER KHUSUS SMARTPHONE (max-width: 768px)
    Kunci: Berjejer ke Samping Menjadi 3 Kolom Mikro
    ========================================================================== */
    @media (max-width: 768px) {
        footer {
            padding: 25px 3% 15px !important; /* Padding sangat tipis agar ruang horizontal maksimal */
        }

        .footer-container {
            /* KUNCI UTAMA: Memaksa grid membagi layar HP menjadi 3 kolom ke samping */
            display: grid !important;
            grid-template-columns: 1.1fr 0.9fr 1fr !important; 
            gap: 10px !important; /* Jarak antar kolom dibuat sekecil mungkin agar tidak luber */
            text-align: left !important; /* Kembalikan text-align ke kiri */
            align-items: start !important;
        }

        .footer-column {
            display: block !important; /* Kembalikan ke block layout */
            text-align: left !important;
        }

        .footer-column h3 {
            font-size: 11px !important; /* Font judul kolom dibuat sangat kecil */
            margin-bottom: 6px !important;
        }

        .footer-line {
            width: 20px !important; /* Memperpendek garis dekorasi */
            height: 2px !important;
            margin-bottom: 10px !important;
        }

        /* --- KOLOM 1: TITLE & SOSMED (KIRI) --- */
        .brand-desc {
            font-size: 9px !important; /* Font deskripsi dibuat mikro */
            line-height: 1.3 !important;
            margin-bottom: 10px !important;
            max-width: 100% !important;
        }

        .footer-socials {
            gap: 6px !important; /* Merapatkan jarak antar icon sosmed */
        }

        .f-social-icon {
            width: 24px !important; /* Memperkecil ukuran lingkaran sosmed agar muat */
            height: 24px !important;
            font-size: 11px !important;
        }

        /* --- KOLOM 2: TAUTAN CEPAT (TENGAH) --- */
        .quick-links {
            width: 100% !important;
        }
        
        .quick-links li {
            margin-bottom: 6px !important; /* Merapatkan jarak antar baris link */
        }
        
        .quick-links a {
            font-size: 9px !important; /* Font link tengah dibuat mikro */
            padding: 0 !important;
            justify-content: flex-start !important; /* Tetap rata kiri */
            gap: 4px !important;
        }
        
        .quick-links a i {
            font-size: 7px !important; /* Memperkecil icon panah */
        }

        /* --- KOLOM 3: HUBUNGI KAMI (KANAN) --- */
        .footer-info {
            align-items: flex-start !important; /* Rata kiri penuh */
            width: 100% !important;
            gap: 8px !important; /* Jarak antar informasi rapat */
        }

        .footer-link {
            font-size: 9px !important; /* Font informasi kanan dibuat mikro */
            flex-direction: row !important; /* KUNCI: Paksa emoji dan teks tetap sejajar kesamping */
            align-items: flex-start !important;
            text-align: left !important;
            gap: 6px !important;
            width: 100% !important;
        }

        .icon-wrapper {
            font-size: 10px !important; /* Ukuran emoji kontak mengecil */
        }

        /* --- AREA BAWAH: COPYRIGHT & DIVIDER --- */
        .footer-divider {
            grid-column: span 3 !important; /* Memaksa garis melintang memotong penuh 3 kolom mikro */
            margin: 15px 0 5px 0 !important;
        }

        .footer-copyright {
            grid-column: span 3 !important; /* Memaksa teks hak cipta memenuhi dasar footer */
            font-size: 9px !important;
            text-align: center !important;
        }
    }
    </style>
</head>
<body>

<!-- TOPBAR: informasi kontak & PPDB -->
<div class="topbar">
    <div class="top-left">
        <a href="#" class="ppdb-btn">PPDB 2024/2025</a>
    </div>
    <div class="top-right">
        <a href="https://www.facebook.com/MIAL-KAROMAH" target="_blank" class="social-icon">
            <i class="fab fa-facebook-f"></i>
        </a>
        
        <a href="https://www.instagram.com/frhan_069" target="_blank" class="social-icon">
            <i class="fab fa-instagram"></i>
        </a>
        
        <a href="https://www.youtube.com/@nama_channel_anda" target="_blank" class="social-icon">
            <i class="fab fa-youtube"></i>
        </a>
    </div>
</div>

<!-- HEADER & NAVIGASI -->
<header>
    <div class="navbar">
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
            <div class="logo-text">
                <h1>MI AL KAROMAH</h1>
                <p>Berilmu, Berakhlak, Berprestasi</p>
            </div>
        </div>

        <div class="nav-utilities">
            
            <input type="checkbox" id="menu-toggle" class="menu-toggle" style="display:none;">
            <label for="menu-toggle" class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </label>
            
             <nav>
                <a href="index.php">Beranda</a>
                <a href="profil.php">Profil</a>
                <a href="akademik.php">Akademik</a>
                <a href="kegiatan.php">Kegiatan</a>
                <a href="berita.php">Berita</a>
                <a href="guru.php">Guru</a>
                <a href="galeri.php">Galeri</a>
                <a href="kontak.php">Kontak</a>
            </nav>
        </div>
    </div>
</header>

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-label">Selamat Datang di</div>
            <h2>MI AL KAROMAH</h2>
            <h3>Madrasah Hebat, Bermartabat</h3>
            <p>Kami berkomitmen membentuk generasi yang cerdas intelektual, kuat spiritual, dan berakhlak mulia berlandaskan nilai-nilai Islam.</p>
            <div class="hero-btns">
                <a href="#" class="btn-primary">PPDB 2024/2025</a>
                <a href="profil.php" class="btn-outline">Profil Sekolah</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="img/hero1.jpg" alt="Suasana Madrasah">
        </div>
    </div>
</section>

<!-- KEUNGGULAN (4 fitur) -->
<section class="feature-wrapper">
    <div class="feature-container">
        <div class="feature-box">
            <div class="feature-icon">📖</div>
            <div>
                <h4>Pendidikan Berkualitas</h4>
                <p>Mengintegrasikan ilmu pengetahuan dan nilai keislaman.</p>
            </div>
        </div>
        <div class="feature-box">
            <div class="feature-icon">👤</div>
            <div>
                <h4>Akhlak Mulia</h4>
                <p>Membentuk karakter islami yang santun dan disiplin.</p>
            </div>
        </div>
        <div class="feature-box">
            <div class="feature-icon">🏆</div>
            <div>
                <h4>Berprestasi</h4>
                <p>Mendorong siswa aktif dan berprestasi akademik.</p>
            </div>
        </div>
        <div class="feature-box">
            <div class="feature-icon">🕌</div>
            <div>
                <h4>Lingkungan Islami</h4>
                <p>Lingkungan belajar nyaman dan bernuansa islami.</p>
            </div>
        </div>
    </div>
</section>

<!-- PROFIL & INFORMASI TERBARU -->
<section class="profile">
    <div class="profile-container">
        <div class="profile-text">
            <h2>Profil MI Al Karomah</h2>
            <div class="profile-line"></div>
            <p>
                MI Al Karomah adalah lembaga pendidikan dasar Islam yang berkomitmen
                mencetak generasi beriman, berilmu dan berakhlak mulia serta siap menghadapi tantangan masa depan.
            </p>
            <a href="profil.php" class="profile-btn">Selengkapnya →</a>
        </div>
        <div class="profile-image">
            <img src="img/sekolah.png" alt="Gedung MI Al Karomah">
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-container">
        
        <div class="footer-column brand-column">
            <h3>MI AL KAROMAH</h3>
            <div class="footer-line"></div>
            <p class="brand-desc">Madrasah Ibtidaiyah Al Karomah berkomitmen mencetak generasi yang unggul dalam prestasi, berwawasan IPTEK, dan kokoh dalam IMTAQ berlandaskan akhlakul karimah.</p>
            
            <div class="footer-socials">
                <a href="fb://facewebmodal/fpage?id=YOUR_FB_PAGE_ID" data-desktop="https://facebook.com/YOUR_FB_PAGE" target="_blank" class="f-social-icon fb" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="instagram://user?username=mialkaromah" data-desktop="https://instagram.com/mialkaromah" target="_blank" class="f-social-icon ig" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="vnd.youtube://www.youtube.com/user/YOUR_CHANNEL" data-desktop="https://youtube.com/c/YOUR_CHANNEL" target="_blank" class="f-social-icon yt" title="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>

        <div class="footer-column links-column">
            <h3>Tautan Cepat</h3>
            <div class="footer-line"></div>
            <ul class="quick-links">
                <li><a href="#beranda"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                <li><a href="#profil"><i class="fas fa-chevron-right"></i> Profil Madrasah</a></li>
                <li><a href="#akademik"><i class="fas fa-chevron-right"></i> Informasi Akademik</a></li>
                <li><a href="#ppdb"><i class="fas fa-chevron-right"></i> Pendaftaran PPDB</a></li>
                <li><a href="#kontak"><i class="fas fa-chevron-right"></i> Kontak Form</a></li>
            </ul>
        </div>

        <div class="footer-column contact-column">
            <h3>Hubungi Kami</h3>
            <div class="footer-line"></div>
            <div class="footer-info">
                <a href="https://maps.google.com/?q=MI+Al+Karomah" target="_blank" class="footer-link">
                    <span class="icon-wrapper">📍</span> 
                    <span class="text-wrapper">Jl Al Karomah No 01, Desa Karomah</span>
                </a>
                <a href="tel:025112345678" class="footer-link">
                    <span class="icon-wrapper">📞</span> 
                    <span class="text-wrapper">(0251) 1234 5678</span>
                </a>
                <a href="mailto:info@mialkaromah.sch.id" class="footer-link">
                    <span class="icon-wrapper">✉</span> 
                    <span class="text-wrapper">info@mialkaromah.sch.id</span>
                </a>
            </div>
        </div>

        <div class="footer-divider"></div>
        <div class="footer-copyright">
            © 2024 MI Al Karomah. All Rights Reserved.
        </div>
    </div>
</footer>

<script>
document.querySelectorAll('.footer-socials a').forEach(function(elem) {
    elem.addEventListener('click', function(e) {
        if (!/Android|iPhone|iPad/i.test(navigator.userAgent)) {
            // Jika diakses lewat Laptop/Desktop, paksa pakai link desktop
            e.preventDefault();
            window.open(this.getAttribute('data-desktop'), '_blank');
        }
    });
});
</script>

</body>
</html>
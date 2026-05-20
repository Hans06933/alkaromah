<?php
// header.php - Bagian header untuk semua halaman
// Wajib set $activePage dan $pageTitle sebelum include
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'MI Al Karomah'; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset & Global */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: #f9faf8;
            color: #1e2a2e;
            line-height: 1.5;
        }
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
    </style>
</head>
<body>

<!-- TOPBAR -->
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

                <a href="admin/login.php" class="btn-login">
                    <i class="fas fa-user"></i>
                    Login
                </a>
            </nav>
        </div>
    </div>
</header>

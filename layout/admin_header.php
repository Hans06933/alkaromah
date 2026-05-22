<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - MI Al Karomah</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- RESET & VARIABLE STYLE --- */
        :root {
            --primary-green: #0B5E34;
            /* Update gradasi hijau terang menyala khusus menu aktif sesuai mockup */
            --active-gradient: linear-gradient(135deg, #22c55e, #16a34a); 
            --bg-light: #f4f6f9;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-dark);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ==========================================
           1. SIDEBAR STYLE (Pojok Kiri)
        ========================================== */
        .sidebar {
            width: 260px;
            background-color: var(--primary-green);
            color: var(--white);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 4px 0 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .brand-logo-img {
            width: 38px;
            height: 38px;
            object-fit: cover; 
            border-radius: 8px; 
            display: block;
            background-color: #ffffff;
        }

        .brand-title h1 {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .brand-title p {
            font-size: 11px;
            color: #a7f3d0;
            margin: 0;
        }

        .sidebar-menu {
            padding: 20px 14px;
            flex-grow: 1;
        }

        .menu-title {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #a7f3d0;
            font-weight: 700;
            margin: 20px 0 8px 10px;
            opacity: 0.6;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: #e2e8f0;
            text-decoration: none;
            font-size: 13px;
            border-radius: 10px;
            margin-bottom: 4px;
            transition: all 0.2s ease;
        }

        .menu-item i {
            width: 20px;
            text-align: center;
            font-size: 14px;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.08);
            color: var(--white);
        }

        /* Update: Warna berbeda gradient hijau menyala HANYA untuk elemen aktif */
        .menu-item.active {
            background: var(--active-gradient) !important;
            color: var(--white) !important;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
        }

        .sidebar-footer-bg {
            padding: 20px;
            opacity: 0.08;
            text-align: center;
            font-size: 55px;
            line-height: 1;
            color: var(--white);
        }

        /* ==========================================
           2. MAIN CONTENT & TOPBAR HEADER (Kanan)
        ========================================== */
        .main-wrapper {
            flex: 1;
            margin-left: 260px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: calc(100% - 260px);
            transition: all 0.3s ease;
        }

        .topbar {
            height: 70px;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            border-bottom: 1px solid #eef2f5;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* TOMBOL HAMBURGER (Disembunyikan secara default di Laptop/Desktop) */
        .hamburger-menu {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            color: var(--text-dark);
            cursor: pointer;
            padding: 5px;
            border-radius: 6px;
            transition: 0.2s;
        }
        
        .hamburger-menu:hover {
            background-color: #f1f5f9;
        }

        .welcome-text {
            font-size: 14px;
            color: var(--text-muted);
        }

        .welcome-text b {
            color: var(--text-dark);
            font-weight: 600;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification {
            position: relative;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification i {
            font-size: 19px;
            color: var(--text-muted);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #22c55e;
            color: var(--white);
            font-size: 9px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border: 2px solid var(--white);
        }

        .admin-profile-box {
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 1px solid #e2e8f0;
            padding-left: 20px;
            cursor: pointer;
        }

        .admin-profile-box img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .admin-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .admin-name i {
            font-size: 10px;
            color: var(--text-muted);
        }

        /* OVERLAY BACKGROUND SAAT MENU DI HP DIKLIK */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 999;
            backdrop-filter: blur(2px);
        }

        /* ==========================================
           3. RESPONSIVE MEDIA SYSTEM (Hanya Kerja di HP/Tablet)
        ========================================== */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%); /* Sembunyikan sidebar ke kiri luar layar */
            }

            /* Saat kelas .active dipasang lewat JavaScript, sidebar muncul */
            .sidebar.show {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0; /* Reset margin laptop */
                width: 100%;
            }

            .hamburger-menu {
                display: block; /* Munculkan tombol hamburger di HP */
            }

            .sidebar-overlay.show {
                display: block; /* Munculkan overlay gelap saat sidebar aktif di HP */
            }
            
            .topbar {
                padding: 0 20px;
            }
            
            .admin-name span {
                display: none; /* Sembunyikan tulisan 'Administrator' di HP biar ringkas */
            }
            
            .admin-profile-box {
                padding-left: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="sidebar" id="sidebarContainer">
        <div>
            <div class="sidebar-brand">
                <img src="../assets/logo/logo.png" alt="Logo MI" class="brand-logo-img">
                <div class="brand-title">
                    <h1>MI AL KAROMAH</h1>
                    <p>Dashboard Admin</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <a href="dashboard.php" class="menu-item active">
                    <i class="fas fa-th-large"></i> 
                    <span>Dashboard</span>
                </a>

                <div class="menu-title">Menu Utama</div>
                <a href="berita.php" class="menu-item">
                    <i class="fas fa-file-alt"></i> 
                    <span>Berita / Artikel</span>
                </a>
                <a href="guru.php" class="menu-item">
                    <i class="fas fa-users"></i> 
                    <span>Guru & Staf</span>
                </a>
                <a href="fasilitas.php" class="menu-item">
                    <i class="fas fa-building"></i> 
                    <span>Fasilitas Sekolah</span>
                </a>
                <a href="galeri.php" class="menu-item">
                    <i class="fas fa-camera"></i> 
                    <span>Kelola Galeri</span>
                </a>
                <a href="kegiatan.php" class="menu-item">
                    <i class="fas fa-calendar-alt"></i> 
                    <span>Agenda / Kegiatan</span>
                </a>

                <div class="menu-title">Akun</div>
                <a href="../index.php" class="menu-item">
                    <i class="fas fa-globe"></i> 
                    <span>Lihat Website</span>
                </a>
                <a href="logout.php" class="menu-item" style="color: #fca5a5;">
                    <i class="fas fa-sign-out-alt"></i> 
                    <span>Logout</span>
                </a>
            </div>
        </div>
        <div class="sidebar-footer-bg"><i class="fas fa-mosque"></i></div>
    </div>

    <div class="main-wrapper">
        
        <header class="topbar">
            <div class="topbar-left">
                <button class="hamburger-menu" id="hamburgerBtn" title="Buka Menu">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="welcome-text">Selamat datang, <b>Admin 👋</b></div>
            </div>
            <div class="topbar-right">
                <div class="admin-profile-box">
                    <img src="https://i.pravatar.cc/100" alt="Admin">
                    <div class="admin-name">
                        <span>Administrator</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </header>

    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebarContainer = document.getElementById('sidebarContainer');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        // Fungsi Buka / Tutup Sidebar
        function toggleSidebar() {
            sidebarContainer.classList.toggle('show');
            sidebarOverlay.classList.toggle('show');
        }

        hamburgerBtn.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);
    </script>
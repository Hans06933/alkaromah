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
            --active-gradient: linear-gradient(135deg, #52A028, #0B5E34);
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

        .menu-item.active {
            background: var(--active-gradient);
            color: var(--white);
            font-weight: 500;
        }

        /* Gambar siluet masjid di bagian bawah sidebar */
        .sidebar-footer-bg {
            padding: 20px;
            opacity: 0.08;
            text-align: center;
            font-size: 55px;
            line-height: 1;
        }

        /* ==========================================
           2. MAIN CONTENT & TOPBAR HEADER (Kanan)
        ========================================== */
        .main-wrapper {
            flex: 1;
            margin-left: 260px; /* Mengisi ruang kosong kiri */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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

        /* ==========================================
           3. WORKSPACE CONTAINER CONTENT
        ========================================== */
        .content-body {
            padding: 30px;
            flex: 1;
        }

        /* Jumbotron Banner */
        .banner-jumbotron {
            background: linear-gradient(to right, #0B5E34, #1B7343);
            border-radius: 16px;
            padding: 30px;
            color: var(--white);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(11, 94, 52, 0.05);
        }

        .banner-text h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .banner-text h4 {
            font-size: 14px;
            font-weight: 400;
            color: #a7f3d0;
            margin-bottom: 8px;
        }

        .banner-text p {
            font-size: 13px;
            opacity: 0.85;
        }

        .banner-img-placeholder {
            width: 260px;
            height: 120px;
            background: rgba(255,255,255,0.1) url('assets/images/gedung.jpg') center/cover no-repeat;
            border-radius: 12px;
            border: 2px solid rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>

    <div class="sidebar">
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
                    <i class="fas fa-th-large"></i> Dashboard
                </a>

                <div class="menu-title">Menu Utama</div>
                <a href="hero.php" class="menu-item"><i class="fas fa-image"></i> Slider Beranda</a>
                <a href="berita.php" class="menu-item"><i class="fas fa-file-alt"></i> Berita / Artikel</a>
                <a href="guru.php" class="menu-item"><i class="fas fa-users"></i> Guru & Staf</a>
                <a href="galeri.php" class="menu-item"><i class="fas fa-camera"></i> Kelola Galeri</a>
                <a href="kegiatan.php" class="menu-item"><i class="fas fa-calendar-alt"></i> Agenda / Kegiatan</a>

                <div class="menu-title">Akun</div>
                <a href="#" class="menu-item"><i class="fas fa-user"></i> Profil Admin</a>
                <a href="logout.php" class="menu-item" style="color: #fca5a5;"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        <div class="sidebar-footer-bg"><i class="fas fa-mosque"></i></div>
    </div>


    <div class="main-wrapper">
        
        <header class="topbar">
            <div class="topbar-left">
                <div class="welcome-text">Selamat datang, <b>Admin 👋</b></div>
            </div>
            <div class="topbar-right">
                <div class="notification">
                    <i class="far fa-bell"></i>
                    <div class="notification-badge">3</div>
                </div>
                <div class="admin-profile-box">
                    <img src="https://i.pravatar.cc/100" alt="Admin">
                    <div class="admin-name">
                        Administrator
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </header>

</body>
</html>
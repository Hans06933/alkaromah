<?php
include '../layout/admin_header.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - MI Al Karomah</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* --- RESET & GLOBAL STYLE --- */
        :root {
            --primary-green: #0B5E34;
            --active-gradient: linear-gradient(135deg, #22c55e, #0B5E34);
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
           2. MAIN CONTENT WRAPPER & TOPBAR OFFSET
        ========================================== */
        .main-wrapper {
            flex: 1;
            margin-left: 260px; /* Offset agar konten tidak tertutup sidebar */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Topbar Header */
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

        .menu-toggle {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: var(--text-muted);
        }

        .welcome-text {
            font-size: 14px;
            color: var(--text-muted);
        }

        .welcome-text span {
            font-weight: 600;
            color: var(--text-dark);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification {
            position: relative;
            cursor: pointer;
        }

        .notification i {
            font-size: 18px;
            color: var(--text-muted);
        }

        .notification-badge {
            position: absolute;
            top: -6px;
            right: -6px;
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
           3. AREA WORKSPACE CONTENT
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
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .banner-text h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .banner-text h4 {
            font-size: 15px;
            font-weight: 500;
            color: #a7f3d0;
            margin-bottom: 8px;
        }

        .banner-text p {
            font-size: 13px;
            opacity: 0.85;
        }

        .banner-img-placeholder {
            width: 280px;
            height: 130px;
            background: rgba(255,255,255,0.1) url('assets/images/gedung.jpg') center/cover no-repeat;
            border-radius: 12px;
            border: 2px solid rgba(255,255,255,0.2);
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: var(--white);
            padding: 20px;
            border-radius: 16px;
            border: 1px solid #eef2f5;
            box-shadow: 0 2px 4px rgba(0,0,0,0.01);
        }

        /* Custom layout split detail berita & widget bisa ditambahkan di bawah jika diperlukan */

    </style>
</head>
<body>

    <div class="main-wrapper">
        
        <main class="content-body">
            
            <div class="banner-jumbotron">
                <div class="banner-text">
                    <h2>Dashboard Admin</h2>
                    <h4>MI Al Karomah</h4>
                    <p>Kelola semua konten website dengan mudah dan cepat.</p>
                </div>
                <div class="banner-img-placeholder"></div>
            </div>

            <div class="stats-grid">
                <div class="stat-card"><h4>Total Berita</h4><h2>24</h2></div>
                <div class="stat-card"><h4>Total Guru</h4><h2>18</h2></div>
                <div class="stat-card"><h4>Total Galeri</h4><h2>56</h2></div>
                <div class="stat-card"><h4>Total Agenda</h4><h2>12</h2></div>
            </div>

            </main>
    </div>

</body>
</html>
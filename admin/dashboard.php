<?php
session_start();

// Ganti sesuai dengan logic check session login project kamu
if(!isset($_SESSION['login'])){
    // header("Location: login.php");
    // exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

// Mengambil data count dinamis dari Database untuk Stats Card
$total_berita = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM berita"));
$total_guru   = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM guru")); 
$total_galeri = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM galeri")); 
$total_kegiatan = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM kegiatan")); 

// Mengambil 5 data terbaru untuk masing-masing bagian
$berita_terbaru = mysqli_query($conn, "SELECT * FROM berita ORDER BY created_at DESC LIMIT 5");

// Mengambil 5 guru terbaru
$guru_terbaru   = mysqli_query($conn, "SELECT * FROM guru ORDER BY id DESC LIMIT 5");

// Mengambil 5 galeri terbaru
$galeri_terbaru = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <style>
        /* Reset & Base */
        * {
            box-sizing: border-box;
        }
        
        body {
            overflow-x: hidden;
            width: 100%;
            position: relative;
        }
        
        /* Prevent zoom on input focus for iOS */
        @media screen and (max-width: 768px) {
            input, select, textarea, button {
                font-size: 16px !important;
            }
            
            body {
                overflow-x: hidden;
            }
        }
        
        /* ==========================================
            WORKSPACE CONTENT
        ========================================== */
        .content-body {
            padding: 15px;
            flex: 1;
            background: #f4f6f9;
            width: 100%;
            overflow-x: hidden;
        }

        /* =========================
            HERO BANNER
        ========================= */
        .hero-banner {
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, rgba(0,80,35,0.93), rgba(0,80,35,0.83)), url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            padding: 20px;
            margin-bottom: 20px;
        }

        .hero-content h1 {
            font-size: 24px;
            color: white;
            font-weight: 700;
            margin: 0 0 4px 0;
        }

        .hero-content h3 {
            font-size: 16px;
            color: #d1fae5;
            font-weight: 500;
            margin: 0 0 6px 0;
        }

        .hero-content p {
            color: #e5e7eb;
            font-size: 12px;
            margin: 0;
        }

        /* =========================
            CARD STATS
        ========================= */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border: 1px solid #eef2f6;
        }

        .stats-top {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
        }

        .stats-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
        }

        .stats-info h3 {
            font-size: 11px;
            color: #6b7280;
            font-weight: 500;
            margin: 0 0 2px 0;
        }

        .stats-info h1 {
            font-size: 22px;
            color: #111827;
            font-weight: 700;
            margin: 0;
        }

        .stats-footer {
            border-top: 1px solid #f3f4f6;
            padding-top: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stats-footer a {
            text-decoration: none;
            color: #4b5563;
            font-size: 11px;
            font-weight: 600;
        }

        /* =========================
            CONTENT LAYOUT
        ========================= */
        .main-layout {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .left-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }

        /* =========================
            CARD STYLE
        ========================= */
        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #eef2f6;
            width: 100%;
        }

        .card-header {
            padding: 15px;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .card-header h2 {
            font-size: 14px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .btn-add {
            background: linear-gradient(135deg, #16a34a, #15803d);
            padding: 0 12px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-size: 11px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            height: 32px;
        }

        /* =========================
            RESPONSIVE TABLE (CARD LAYOUT DI HP)
        ========================= */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        /* Mobile: Ubah tabel jadi card layout */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            
            thead {
                display: none;
            }
            
            tbody tr {
                margin-bottom: 15px;
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                padding: 12px;
                background: white;
            }
            
            tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 8px 0;
                border: none;
                border-bottom: 1px solid #f3f4f6;
                font-size: 12px;
            }
            
            tbody td:last-child {
                border-bottom: none;
            }
            
            tbody td:before {
                content: attr(data-label);
                font-weight: 600;
                color: #6b7280;
                font-size: 11px;
                margin-right: 10px;
            }
        }
        
        /* Desktop table style */
        @media (min-width: 769px) {
            table {
                width: 100%;
                border-collapse: collapse;
            }
            
            table th {
                background: #f9fafb;
                padding: 12px;
                font-size: 12px;
                font-weight: 600;
                color: #4b5563;
                text-align: left;
                border-bottom: 1px solid #e5e7eb;
            }
            
            table td {
                padding: 12px;
                font-size: 12px;
                color: #374151;
                border-bottom: 1px solid #f3f4f6;
                vertical-align: middle;
            }
        }

        /* Flex cells untuk thumbnail */
        .flex-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        @media (max-width: 768px) {
            .flex-cell {
                flex: 1;
            }
        }

        .thumb-rect {
            width: 40px;
            height: 30px;
            object-fit: cover;
            border-radius: 6px;
            background: #e5e7eb;
        }

        .thumb-circle {
            width: 35px;
            height: 35px;
            object-fit: cover;
            border-radius: 50%;
            background: #e5e7eb;
        }

        .cell-info h4 {
            font-size: 12px;
            font-weight: 600;
            color: #111827;
            margin: 0 0 2px 0;
        }
        
        .cell-info small {
            font-size: 10px;
            color: #6b7280;
        }

        /* Badges */
        .badge {
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-green { background: #dcfce7; color: #166534; }
        .badge-blue { background: #dbeafe; color: #1d4ed8; }
        .badge-purple { background: #f3e8ff; color: #6b21a8; }
        .badge-gray { background: #f3f4f6; color: #374151; }

        .action-group-btn {
            display: flex;
            gap: 8px;
        }
        
        @media (max-width: 768px) {
            .action-group-btn {
                gap: 12px;
            }
            
            .action-group-btn a {
                width: auto;
                padding: 5px 12px;
                border-radius: 6px;
            }
        }

        .action-group-btn a {
            width: 30px;
            height: 30px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 11px;
            transition: 0.2s;
        }

        .view { background: #f0fdf4; color: #16a34a; }
        .edit { background: #f0f6ff; color: #2563eb; }
        .delete { background: #fdf2f2; color: #dc2626; }

        /* =========================
            SIDEBAR RIGHT
        ========================= */
        .side-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #eef2f6;
        }

        .side-card:last-child { margin-bottom: 0; }

        .side-card h3 {
            font-size: 14px;
            font-weight: 700;
            margin: 0 0 15px 0;
            color: #111827;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .activity-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #f3f4f6;
        }

        .activity-left {
            display: flex;
            gap: 10px;
            flex: 1;
        }

        .activity-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #f0fdf4;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #16a34a;
            font-size: 12px;
        }

        .activity-text h4 {
            font-size: 12px;
            font-weight: 600;
            margin: 0 0 2px 0;
        }

        .activity-text p {
            font-size: 10px;
            color: #6b7280;
            margin: 0;
        }

        .activity-time {
            font-size: 9px;
            color: #9ca3af;
            white-space: nowrap;
        }

        /* =========================
            CALENDAR STYLE - FIXED UNTUK HP
        ========================= */
        .calendar-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        .calendar-grid-container {
            min-width: 280px;
        }
        
        .calendar-header-realtime {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .calendar-header-realtime h4 {
            font-size: 14px;
            font-weight: 700;
            color: #1f2937;
            margin: 0;
        }

        .calendar-nav-buttons {
            display: flex;
            gap: 6px;
        }

        .calendar-nav-btn {
            background: #f3f4f6;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            color: #4b5563;
            transition: 0.2s;
        }

        .calendar-days-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            text-align: center;
        }

        .day-name {
            font-size: 10px;
            font-weight: 600;
            color: #9ca3af;
            padding-bottom: 8px;
        }

        .day-number {
            font-size: 11px;
            font-weight: 500;
            color: #4b5563;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: 0.2s;
            cursor: pointer;
        }

        .day-number.current-day {
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: white !important;
            font-weight: 700;
        }

        /* Storage */
        .storage-info p {
            font-size: 12px;
            margin: 0 0 8px 0;
        }
        
        .storage-bar {
            width: 100%;
            height: 6px;
            background: #e5e7eb;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .storage-fill {
            width: 24.5%;
            height: 100%;
            background: linear-gradient(135deg, #16a34a, #15803d);
            border-radius: 10px;
        }

        /* Desktop layout */
        @media (min-width: 992px) {
            .content-body {
                padding: 25px;
            }
            
            .main-layout {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 20px;
                flex-direction: row;
            }
            
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 20px;
            }
            
            .hero-banner {
                height: 160px;
                padding: 0 35px;
            }
            
            .hero-content h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

<div class="content-body">

    <div class="hero-banner">
        <div class="hero-content">
            <h1>Dashboard Admin</h1>
            <h3>MI Al Karomah</h3>
            <p>Kelola semua konten website dengan mudah</p>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stats-card">
            <div class="stats-top">
                <div class="stats-icon"><i class="fas fa-newspaper"></i></div>
                <div class="stats-info">
                    <h3>Total Berita</h3>
                    <h1><?= $total_berita; ?></h1>
                </div>
            </div>
            <div class="stats-footer">
                <a href="berita.php">Lihat semua</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-top">
                <div class="stats-icon"><i class="fas fa-users"></i></div>
                <div class="stats-info">
                    <h3>Total Guru</h3>
                    <h1><?= $total_guru; ?></h1>
                </div>
            </div>
            <div class="stats-footer">
                <a href="guru.php">Lihat semua</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-top">
                <div class="stats-icon"><i class="fas fa-image"></i></div>
                <div class="stats-info">
                    <h3>Total Galeri</h3>
                    <h1><?= $total_galeri; ?></h1>
                </div>
            </div>
            <div class="stats-footer">
                <a href="galeri.php">Lihat semua</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-top">
                <div class="stats-icon"><i class="fas fa-calendar"></i></div>
                <div class="stats-info">
                    <h3>Total Kegiatan</h3>
                    <h1><?= $total_kegiatan; ?></h1>
                </div>
            </div>
            <div class="stats-footer">
                <a href="kegiatan.php">Lihat semua</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
    </div>

    <div class="main-layout">
        
        <div class="left-column">
            
            <!-- Tabel Berita -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-history" style="margin-right: 5px; color: #16a34a;"></i> Berita Terbaru</h2>
                    <a href="tambah_berita.php" class="btn-add">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Berita</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            if(mysqli_num_rows($berita_terbaru) > 0):
                                while($b = mysqli_fetch_assoc($berita_terbaru)): 
                                    $thumb_src = (!empty($b['thumbnail'])) ? '../assets/berita/' . $b['thumbnail'] : 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=150';
                            ?>
                            <tr>
                                <td data-label="No"><?= $no++; ?></td>
                                <td data-label="Berita">
                                    <div class="flex-cell">
                                        <img src="<?= $thumb_src; ?>" class="thumb-rect" alt="thumbnail">
                                        <div class="cell-info">
                                            <h4><?= htmlspecialchars(substr($b['judul'], 0, 30)) . (strlen($b['judul']) > 30 ? '...' : ''); ?></h4>
                                            <small>Penulis: <?= htmlspecialchars($b['penulis'] ?? 'Admin'); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Kategori"><span class="badge badge-blue"><?= htmlspecialchars($b['kategori']); ?></span></td>
                                <td data-label="Tanggal"><?= date('d/m/Y', strtotime($b['created_at'])); ?></td>
                                <td data-label="Status">
                                    <?php if(strtolower($b['status']) == 'publish'): ?>
                                        <span class="badge badge-green">Publik</span>
                                    <?php else: ?>
                                        <span class="badge badge-gray">Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Aksi">
                                    <div class="action-group-btn">
                                        <a href="detail_berita.php?id=<?= $b['id']; ?>" class="view" title="Lihat"><i class="fas fa-eye"></i></a>
                                        <a href="edit_berita.php?id=<?= $b['id']; ?>" class="edit" title="Ubah"><i class="fas fa-pen"></i></a>
                                        <a href="hapus_berita.php?id=<?= $b['id']; ?>" onclick="return confirm('Yakin ingin menghapus berita ini?')" class="delete" title="Hapus"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                endwhile;
                            else:
                            ?>
                            <tr><td colspan="6" style="text-align: center; padding: 20px;">Belum ada data berita.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tabel Guru -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-users" style="margin-right: 5px; color: #16a34a;"></i> Guru & Staf Terbaru</h2>
                    <a href="tambah_guru.php" class="btn-add">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Guru</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no_g = 1;
                            if(mysqli_num_rows($guru_terbaru) > 0):
                                while($g = mysqli_fetch_assoc($guru_terbaru)): 
                                    $foto_src = (!empty($g['foto'])) ? '../assets/guru/' . $g['foto'] : 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=150';
                            ?>
                            <tr>
                                <td data-label="No"><?= $no_g++; ?></td>
                                <td data-label="Nama Guru">
                                    <div class="flex-cell">
                                        <img src="<?= $foto_src; ?>" class="thumb-circle" alt="foto guru">
                                        <div class="cell-info">
                                            <h4><?= htmlspecialchars($g['nama']); ?></h4>
                                            <small><?= htmlspecialchars($g['status_kepegawaian'] ?? 'Guru Tetap'); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="NIP"><?= htmlspecialchars($g['nip'] ?? '-'); ?></td>
                                <td data-label="Jabatan"><span class="badge badge-purple"><?= htmlspecialchars($g['jabatan'] ?? 'Pengajar'); ?></span></td>
                                <td data-label="Aksi">
                                    <div class="action-group-btn">
                                        <a href="edit_guru.php?id=<?= $g['id']; ?>" class="edit" title="Ubah"><i class="fas fa-pen"></i></a>
                                        <a href="hapus_guru.php?id=<?= $g['id']; ?>" onclick="return confirm('Yakin menghapus data guru ini?')" class="delete" title="Hapus"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                endwhile;
                            else:
                            ?>
                            <tr><td colspan="5" style="text-align: center; padding: 20px;">Belum ada data guru.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tabel Galeri -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-image" style="margin-right: 5px; color: #16a34a;"></i> Dokumentasi Galeri</h2>
                    <a href="tambah_galeri.php" class="btn-add">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Kegiatan</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no_gal = 1;
                            if(mysqli_num_rows($galeri_terbaru) > 0):
                                while($gl = mysqli_fetch_assoc($galeri_terbaru)): 
                                    $gal_src = (!empty($gl['foto'])) ? '../assets/galeri/' . $gl['foto'] : 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=150';
                            ?>
                            <tr>
                                <td data-label="No"><?= $no_gal++; ?></td>
                                <td data-label="Judul">
                                    <div class="flex-cell">
                                        <img src="<?= $gal_src; ?>" class="thumb-rect" alt="galeri">
                                        <div class="cell-info">
                                            <h4><?= htmlspecialchars(substr($gl['judul'] ?? $gl['nama_kegiatan'], 0, 30)); ?></h4>
                                            <small><?= isset($gl['created_at']) ? date('d/m/Y', strtotime($gl['created_at'])) : '-'; ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Kategori"><span class="badge badge-green"><?= htmlspecialchars($gl['kategori'] ?? 'Kegiatan'); ?></span></td>
                                <td data-label="Aksi">
                                    <div class="action-group-btn">
                                        <a href="edit_galeri.php?id=<?= $gl['id']; ?>" class="edit" title="Ubah"><i class="fas fa-pen"></i></a>
                                        <a href="hapus_galeri.php?id=<?= $gl['id']; ?>" onclick="return confirm('Yakin menghapus dokumentasi ini?')" class="delete" title="Hapus"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                endwhile;
                            else:
                            ?>
                            <tr><td colspan="4" style="text-align: center; padding: 20px;">Belum ada data galeri.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> 
        
        <!-- Sidebar Right -->
        <div>
            <div class="side-card">
                <h3><i class="fas fa-bolt"></i> Aktivitas Terbaru</h3>
                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon"><i class="fas fa-newspaper"></i></div>
                        <div class="activity-text">
                            <h4>Perubahan data berita</h4>
                            <p>Sinkronisasi konten</p>
                        </div>
                    </div>
                    <div class="activity-time">Baru saja</div>
                </div>
                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon"><i class="fas fa-user-edit"></i></div>
                        <div class="activity-text">
                            <h4>Kelola data guru</h4>
                            <p>Update direktori</p>
                        </div>
                    </div>
                    <div class="activity-time">35 menit lalu</div>
                </div>
                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon"><i class="fas fa-image"></i></div>
                        <div class="activity-text">
                            <h4>Upload galeri</h4>
                            <p>Foto kegiatan</p>
                        </div>
                    </div>
                    <div class="activity-time">1 jam lalu</div>
                </div>
            </div>

            <!-- Calendar dengan wrapper scroll -->
            <div class="side-card">
                <h3><i class="fas fa-calendar-alt"></i> Kalender Kerja</h3>
                <div class="calendar-wrapper">
                    <div class="calendar-grid-container">
                        <div class="calendar-header-realtime">
                            <h4 id="calendar-month-year">Mei 2026</h4>
                            <div class="calendar-nav-buttons">
                                <button class="calendar-nav-btn" id="prev-month">‹</button>
                                <button class="calendar-nav-btn" id="next-month">›</button>
                                <button class="calendar-nav-btn" id="current-month">Today</button>
                            </div>
                        </div>
                        <div class="calendar-days-grid" id="calendar-grid">
                            <div class="day-name">M</div>
                            <div class="day-name">S</div>
                            <div class="day-name">S</div>
                            <div class="day-name">R</div>
                            <div class="day-name">K</div>
                            <div class="day-name">J</div>
                            <div class="day-name">S</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="side-card">
                <h3><i class="fas fa-database"></i> Penyimpanan Hosting</h3>
                <div class="storage-info">
                    <p><strong>2.45 GB</strong> / 10 GB digunakan</p>
                </div>
                <div class="storage-bar">
                    <div class="storage-fill"></div>
                </div>
                <div style="margin-top: 10px;">
                    <small style="color: #6b7280;">Sisa: 7.55 GB</small>
                </div>
            </div>
        </div>

    </div> 
</div>

<script>
class DynamicCalendar {
    constructor() {
        this.currentDate = new Date();
        this.currentYear = this.currentDate.getFullYear();
        this.currentMonth = this.currentDate.getMonth();
        this.today = new Date();
        
        this.monthsArr = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        
        this.init();
    }
    
    init() {
        this.monthYearText = document.getElementById("calendar-month-year");
        this.calendarGrid = document.getElementById("calendar-grid");
        
        // Store initial day names
        this.dayNames = [];
        const dayNameElements = this.calendarGrid.querySelectorAll('.day-name');
        dayNameElements.forEach(el => this.dayNames.push(el));
        
        this.renderCalendar();
        this.attachEvents();
    }
    
    renderCalendar() {
        // Clear all day numbers but keep day names
        const dayNumbers = this.calendarGrid.querySelectorAll('.day-number');
        dayNumbers.forEach(el => el.remove());
        
        // Get first day of month
        let firstDayIndex = new Date(this.currentYear, this.currentMonth, 1).getDay();
        // Adjust to Monday first (0 = Sunday, 1 = Monday)
        firstDayIndex = firstDayIndex === 0 ? 6 : firstDayIndex - 1;
        
        const totalDays = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
        
        // Update month/year text
        this.monthYearText.innerText = this.monthsArr[this.currentMonth] + " " + this.currentYear;
        
        // Add empty cells before first day
        for (let i = 0; i < firstDayIndex; i++) {
            const emptyDiv = document.createElement("div");
            emptyDiv.classList.add("day-number", "empty");
            emptyDiv.innerText = "";
            this.calendarGrid.appendChild(emptyDiv);
        }
        
        // Add actual days
        for (let day = 1; day <= totalDays; day++) {
            const dayDiv = document.createElement("div");
            dayDiv.classList.add("day-number");
            dayDiv.innerText = day;
            
            // Check if this is today
            if (day === this.today.getDate() && 
                this.currentMonth === this.today.getMonth() && 
                this.currentYear === this.today.getFullYear()) {
                dayDiv.classList.add("current-day");
            }
            
            // Add click event
            dayDiv.addEventListener('click', () => {
                this.onDateClick(day);
            });
            
            this.calendarGrid.appendChild(dayDiv);
        }
    }
    
    onDateClick(day) {
        const selectedDate = new Date(this.currentYear, this.currentMonth, day);
        const formattedDate = selectedDate.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        alert(`Tanggal dipilih: ${formattedDate}`);
    }
    
    previousMonth() {
        if (this.currentMonth === 0) {
            this.currentMonth = 11;
            this.currentYear--;
        } else {
            this.currentMonth--;
        }
        this.renderCalendar();
    }
    
    nextMonth() {
        if (this.currentMonth === 11) {
            this.currentMonth = 0;
            this.currentYear++;
        } else {
            this.currentMonth++;
        }
        this.renderCalendar();
    }
    
    goToCurrentMonth() {
        this.currentYear = this.today.getFullYear();
        this.currentMonth = this.today.getMonth();
        this.renderCalendar();
    }
    
    attachEvents() {
        document.getElementById("prev-month").addEventListener("click", () => this.previousMonth());
        document.getElementById("next-month").addEventListener("click", () => this.nextMonth());
        document.getElementById("current-month").addEventListener("click", () => this.goToCurrentMonth());
    }
}

// Initialize calendar when DOM is ready
document.addEventListener("DOMContentLoaded", function () {
    new DynamicCalendar();
});
</script>

</body>
</html>
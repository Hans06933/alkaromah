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

// Mengambil 5 guru terbaru (jika tidak ada created_at di tabel guru, silakan ganti menjadi ORDER BY id DESC)
$guru_terbaru   = mysqli_query($conn, "SELECT * FROM guru ORDER BY id DESC LIMIT 5");

// Mengambil 5 galeri terbaru (jika tidak ada created_at di tabel galeri, silakan ganti menjadi ORDER BY id DESC)
$galeri_terbaru = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC LIMIT 5");
?>

<style>
/* ==========================================
   WORKSPACE CONTENT (MENEMPEL PAS DI BAWAH TOPBAR)
========================================== */
.content-body {
    padding: 30px;
    flex: 1;
    background: #f4f6f9;
}

/* =========================
   HERO BANNER
========================= */
.hero-banner {
    width: 100%;
    height: 160px;
    border-radius: 16px;
    overflow: hidden;
    position: relative;
    background: linear-gradient(135deg, rgba(0,80,35,0.93), rgba(0,80,35,0.83)), url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200&auto=format&fit=crop');
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    padding: 0 35px;
    margin-bottom: 25px;
}

.hero-content h1 {
    font-size: 32px;
    color: white;
    font-weight: 700;
    margin: 0 0 4px 0;
}

.hero-content h3 {
    font-size: 20px;
    color: #d1fae5;
    font-weight: 500;
    margin: 0 0 6px 0;
}

.hero-content p {
    color: #e5e7eb;
    font-size: 13px;
    margin: 0;
}

/* =========================
   CARD STATS
========================= */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 25px;
}

.stats-card {
    background: white;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
    transition: 0.3s;
    border: 1px solid #eef2f6;
}

.stats-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.04);
}

.stats-top {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.stats-icon {
    width: 54px;
    height: 54px;
    border-radius: 12px;
    background: linear-gradient(135deg, #16a34a, #15803d);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    color: white;
}

.stats-info h3 {
    font-size: 13px;
    color: #6b7280;
    font-weight: 500;
    margin: 0 0 2px 0;
}

.stats-info h1 {
    font-size: 28px;
    color: #111827;
    font-weight: 700;
    margin: 0;
}

.stats-footer {
    border-top: 1px solid #f3f4f6;
    padding-top: 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stats-footer a {
    text-decoration: none;
    color: #4b5563;
    font-size: 12px;
    font-weight: 600;
}

.stats-footer a:hover { color: #16a34a; }
.stats-footer i { color: #16a34a; font-size: 11px; }

/* =========================
   CONTENT LAYOUT (GRID)
========================= */
.main-layout {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 25px;
}

.left-column {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

/* =========================
   TABLE CARD
========================= */
.card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01);
    overflow: hidden;
    border: 1px solid #eef2f6;
}

.card-header {
    padding: 18px 22px;
    border-bottom: 1px solid #f3f4f6;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
}

.card-header h2 {
    font-size: 16px;
    font-weight: 700;
    color: #111827;
    margin: 0;
}

.btn-add {
    background: linear-gradient(135deg, #16a34a, #15803d);
    padding: 0 16px;
    border-radius: 8px;
    text-decoration: none;
    color: white;
    font-size: 12px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    height: 36px;
    transition: 0.2s;
}

.btn-add:hover {
    opacity: 0.95;
    color: white;
}

.table-responsive {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th {
    background: #f9fafb;
    padding: 14px 16px;
    font-size: 12px;
    font-weight: 600;
    color: #4b5563;
    text-align: left;
    border-bottom: 1px solid #e5e7eb;
}

table td {
    padding: 14px 16px;
    font-size: 13px;
    color: #374151;
    border-bottom: 1px solid #f3f4f6;
    vertical-align: middle;
}

/* Flex cells untuk thumbnail */
.flex-cell {
    display: flex;
    align-items: center;
    gap: 12px;
}

.thumb-rect {
    width: 50px;
    height: 35px;
    object-fit: cover;
    border-radius: 6px;
    background: #e5e7eb;
    border: 1px solid #eef2f6;
}

.thumb-circle {
    width: 38px;
    height: 38px;
    object-fit: cover;
    border-radius: 50%;
    background: #e5e7eb;
    border: 1px solid #eef2f6;
}

.cell-info h4 {
    font-size: 13px;
    font-weight: 600;
    color: #111827;
    margin: 0 0 2px 0;
}
.cell-info small {
    font-size: 11px;
    color: #6b7280;
}

/* Badges */
.badge {
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    display: inline-block;
    text-transform: capitalize;
}

.badge-green { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
.badge-blue { background: #dbeafe; color: #1d4ed8; border: 1px solid #bfdbfe; }
.badge-purple { background: #f3e8ff; color: #6b21a8; border: 1px solid #e9d5ff; }
.badge-gray { background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb; }

.action-group-btn {
    display: flex;
    gap: 6px;
}

.action-group-btn a {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 12px;
    transition: 0.2s;
}

.view { background: #f0fdf4; color: #16a34a; }
.edit { background: #f0f6ff; color: #2563eb; }
.delete { background: #fdf2f2; color: #dc2626; }
.action-group-btn a:hover { opacity: 0.85; }

/* =========================
   SIDEBAR RIGHT
========================= */
.side-card {
    background: white;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01);
    margin-bottom: 20px;
    border: 1px solid #eef2f6;
}

.side-card:last-child { margin-bottom: 0; }

.side-card h3 {
    font-size: 15px;
    font-weight: 700;
    margin: 0 0 18px 0;
    color: #111827;
    display: flex;
    align-items: center;
    gap: 8px;
}

.side-card h3 i { color: #16a34a; font-size: 16px; }

.activity-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 1px dashed #f3f4f6;
}

.activity-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.activity-left {
    display: flex;
    gap: 12px;
    flex: 1;
}

.activity-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: #f0fdf4;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #16a34a;
    font-size: 14px;
}

.activity-text h4 {
    font-size: 13px;
    font-weight: 600;
    margin: 0 0 2px 0;
    color: #111827;
}

.activity-text p {
    font-size: 12px;
    color: #6b7280;
    margin: 0;
}

.activity-time {
    font-size: 11px;
    color: #9ca3af;
    white-space: nowrap;
}

/* STORAGE STYLE */
.storage-info { margin-bottom: 10px; }
.storage-info p { font-size: 13px; color: #374151; margin: 0; }
.storage-info p strong { color: #16a34a; font-weight: 700; }
.storage-bar { width: 100%; height: 7px; background: #e5e7eb; border-radius: 10px; overflow: hidden; }
.storage-fill { width: 24.5%; height: 100%; background: linear-gradient(135deg, #16a34a, #15803d); border-radius: 10px; }

/* =========================
   RESPONSIVE MEDIA SYSTEM
========================= */
@media (max-width: 1200px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; }
    .main-layout { grid-template-columns: 1fr; gap: 20px; }
}

@media (max-width: 768px) {
    .content-body { padding: 20px; }
    .hero-banner { height: auto; padding: 25px 20px; }
    .hero-content h1 { font-size: 24px; }
    .hero-content h3 { font-size: 16px; }
    .stats-grid { grid-template-columns: 1fr; gap: 12px; }
    .card-header { flex-direction: column; align-items: flex-start; }
    .table-responsive { min-width: 600px; }
}
</style>

<div class="content-body">

    <div class="hero-banner">
        <div class="hero-content">
            <h1>Dashboard Admin</h1>
            <h3>MI Al Karomah</h3>
            <p>Kelola semua konten website dengan mudah, cepat, dan terstruktur.</p>
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
                <a href="berita.php">Lihat semua berita</a>
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
                <a href="guru.php">Lihat semua guru</a>
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
                <a href="galeri.php">Lihat semua galeri</a>
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
                <a href="kegiatan.php">Lihat semua agenda</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
    </div>

    <div class="main-layout">
        
        <div class="left-column">
            
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-history" style="margin-right: 8px; color: #16a34a;"></i> Berita Terbaru</h2>
                    <a href="tambah_berita.php" class="btn-add">
                        <i class="fas fa-plus"></i> Tambah Berita
                    </a>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
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
                                <td><?= $no++; ?></td>
                                <td>
                                    <div class="flex-cell">
                                        <img src="<?= $thumb_src; ?>" class="thumb-rect" alt="thumbnail">
                                        <div class="cell-info">
                                            <h4><?= htmlspecialchars($b['judul']); ?></h4>
                                            <small>Penulis: <?= htmlspecialchars($b['penulis'] ?? 'Admin'); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-blue"><?= htmlspecialchars($b['kategori']); ?></span></td>
                                <td><?= date('d M Y', strtotime($b['created_at'])); ?></td>
                                <td>
                                    <?php if(strtolower($b['status']) == 'publish'): ?>
                                        <span class="badge badge-green">Publik</span>
                                    <?php else: ?>
                                        <span class="badge badge-gray">Draft</span>
                                    <?php endif; ?>
                                </td>
                                <td>
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
                            <tr><td colspan="6" style="text-align: center; color: #9ca3af; padding: 30px;">Belum ada data berita.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-users" style="margin-right: 8px; color: #16a34a;"></i> Guru & Staf Terbaru</h2>
                    <a href="tambah_guru.php" class="btn-add">
                        <i class="fas fa-plus"></i> Tambah Guru
                    </a>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama Guru</th>
                                <th>NIP / NUPTK</th>
                                <th>Jabatan / Mapel</th>
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
                                <td><?= $no_g++; ?></td>
                                <td>
                                    <div class="flex-cell">
                                        <img src="<?= $foto_src; ?>" class="thumb-circle" alt="foto guru">
                                        <div class="cell-info">
                                            <h4><?= htmlspecialchars($g['nama']); ?></h4>
                                            <small><?= htmlspecialchars($g['status_kepegawaian'] ?? 'Guru Tetap'); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($g['nip'] ?? '-'); ?></td>
                                <td><span class="badge badge-purple"><?= htmlspecialchars($g['jabatan'] ?? 'Pengajar'); ?></span></td>
                                <td>
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
                            <tr><td colspan="5" style="text-align: center; color: #9ca3af; padding: 30px;">Belum ada data guru.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-image" style="margin-right: 8px; color: #16a34a;"></i> Dokumentasi Galeri Terbaru</h2>
                    <a href="tambah_galeri.php" class="btn-add">
                        <i class="fas fa-plus"></i> Tambah Foto
                    </a>
                </div>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Judul Kegiatan / Album</th>
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
                                <td><?= $no_gal++; ?></td>
                                <td>
                                    <div class="flex-cell">
                                        <img src="<?= $gal_src; ?>" class="thumb-rect" alt="galeri">
                                        <div class="cell-info">
                                            <h4><?= htmlspecialchars($gl['judul'] ?? $gl['nama_kegiatan']); ?></h4>
                                            <small>Uploaded pada: <?= isset($gl['created_at']) ? date('d M Y', strtotime($gl['created_at'])) : '-'; ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-green"><?= htmlspecialchars($gl['kategori'] ?? 'Kegiatan'); ?></span></td>
                                <td>
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
                            <tr><td colspan="4" style="text-align: center; color: #9ca3af; padding: 30px;">Belum ada data galeri foto.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <div>
            <div class="side-card">
                <h3><i class="fas fa-bolt"></i> Aktivitas Terbaru</h3>
                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon"><i class="fas fa-newspaper"></i></div>
                        <div class="activity-text">
                            <h4>Perubahan data berita</h4>
                            <p>Sinkronisasi sistem konten website</p>
                        </div>
                    </div>
                    <div class="activity-time">Baru saja</div>
                </div>
                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon"><i class="fas fa-user-edit"></i></div>
                        <div class="activity-text">
                            <h4>Kelola data guru</h4>
                            <p>Pembaruan direktori pengajar MI</p>
                        </div>
                    </div>
                    <div class="activity-time">35 mnt lalu</div>
                </div>
                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon"><i class="fas fa-image"></i></div>
                        <div class="activity-text">
                            <h4>Dokumentasi galeri</h4>
                            <p>Upload file album foto kegiatan</p>
                        </div>
                    </div>
                    <div class="activity-time">1 jam lalu</div>
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
                <div style="margin-top: 12px;">
                    <small style="color: #6b7280;"><i class="fas fa-info-circle"></i> Sisa penyimpanan: 7.55 GB</small>
                </div>
            </div>
        </div>

    </div> </div> ```


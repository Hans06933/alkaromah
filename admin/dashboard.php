<?php
include '../layout/admin_header.php';
?>

<style>

/* =========================
   MAIN CONTENT - RAPAT DENGAN HEADER
========================= */

.main-content {
    margin-left: 2900px;
    padding: 20px 25px 30px 25px;
    background: #f4f6f9;
    min-height: 100vh;
}

/* =========================
   HERO BANNER
========================= */

.hero-banner {
    width: 100%;
    height: 180px;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    background: linear-gradient(135deg, rgba(0,80,35,0.95), rgba(0,80,35,0.85)), url('https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200&auto=format&fit=crop');
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    padding: 0 40px;
    margin-bottom: 25px;
}

.hero-content h1 {
    font-size: 38px;
    color: white;
    font-weight: 700;
    margin-bottom: 5px;
}

.hero-content h3 {
    font-size: 24px;
    color: #d1fae5;
    font-weight: 500;
    margin-bottom: 8px;
}

.hero-content p {
    color: #e5e7eb;
    font-size: 14px;
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
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    transition: 0.3s;
    border: 1px solid #eef2f6;
}

.stats-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

.stats-top {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
}

.stats-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    background: linear-gradient(135deg, #16a34a, #15803d);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    color: white;
}

.stats-info h3 {
    font-size: 13px;
    color: #6b7280;
    font-weight: 500;
    margin-bottom: 5px;
}

.stats-info h1 {
    font-size: 32px;
    color: #14532d;
    font-weight: 700;
    margin: 0;
}

.stats-footer {
    border-top: 1px solid #f0f0f0;
    padding-top: 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stats-footer a {
    text-decoration: none;
    color: #4b5563;
    font-size: 13px;
    font-weight: 500;
}

.stats-footer a:hover {
    color: #16a34a;
}

.stats-footer i {
    color: #16a34a;
    font-size: 12px;
}

/* =========================
   CONTENT GRID
========================= */

.content-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 25px;
}

/* =========================
   TABLE CARD
========================= */

.card {
    background: white;
    border-radius: 18px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    overflow: hidden;
    border: 1px solid #eef2f6;
}

.card-header {
    padding: 18px 22px;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
}

.card-header h2 {
    font-size: 18px;
    font-weight: 600;
    color: #111827;
    margin: 0;
}

.btn-add {
    background: linear-gradient(135deg, #16a34a, #15803d);
    padding: 8px 16px;
    border-radius: 10px;
    text-decoration: none;
    color: white;
    font-size: 13px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: 0.3s;
}

.btn-add:hover {
    transform: translateY(-1px);
    background: linear-gradient(135deg, #15803d, #166534);
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
    font-size: 13px;
    font-weight: 600;
    color: #4b5563;
    text-align: left;
    border-bottom: 1px solid #e5e7eb;
}

table td {
    padding: 14px 16px;
    font-size: 13px;
    color: #374151;
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
}

.badge {
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    display: inline-block;
}

.badge-green {
    background: #dcfce7;
    color: #166534;
}

.badge-blue {
    background: #dbeafe;
    color: #1d4ed8;
}

.action-btn {
    display: flex;
    gap: 8px;
}

.action-btn a {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 13px;
    transition: 0.2s;
}

.view {
    background: #ecfdf5;
    color: #16a34a;
}

.view:hover {
    background: #16a34a;
    color: white;
}

.edit {
    background: #eff6ff;
    color: #2563eb;
}

.edit:hover {
    background: #2563eb;
    color: white;
}

.delete {
    background: #fef2f2;
    color: #dc2626;
}

.delete:hover {
    background: #dc2626;
    color: white;
}

/* =========================
   SIDEBAR RIGHT
========================= */

.side-card {
    background: white;
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    margin-bottom: 20px;
    border: 1px solid #eef2f6;
}

.side-card:last-child {
    margin-bottom: 0;
}

.side-card h3 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #111827;
    display: flex;
    align-items: center;
    gap: 8px;
}

.side-card h3 i {
    color: #16a34a;
    font-size: 18px;
}

.activity-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f0f0f0;
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
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: #ecfdf5;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #16a34a;
    font-size: 16px;
}

.activity-text h4 {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 4px;
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

/* STORAGE */
.storage-info {
    margin-bottom: 12px;
}

.storage-info p {
    font-size: 13px;
    color: #374151;
    margin: 0;
}

.storage-info p strong {
    color: #16a34a;
    font-weight: 700;
}

.storage-bar {
    width: 100%;
    height: 8px;
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

/* =========================
   RESPONSIVE
========================= */

@media (max-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .content-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}

@media (max-width: 991px) {
    .main-content {
        margin-left: 0;
        padding: 80px 20px 20px;
    }
}

@media (max-width: 768px) {
    .main-content {
        padding: 70px 15px 20px;
    }
    
    .hero-banner {
        height: auto;
        padding: 30px 25px;
    }
    
    .hero-content h1 {
        font-size: 24px;
    }
    
    .hero-content h3 {
        font-size: 18px;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    
    .card-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .table-responsive {
        min-width: 650px;
    }
    
    .stats-icon {
        width: 50px;
        height: 50px;
        font-size: 22px;
    }
    
    .stats-info h1 {
        font-size: 28px;
    }
}

@media (min-width: 1400px) {
    .main-content {
        max-width: 1400px;
        margin: 0 auto;
        margin-left: 260px;
    }
}
</style>

<div class="main-content">

    <!-- HERO BANNER -->
    <div class="hero-banner">
        <div class="hero-content">
            <h1>Dashboard Admin</h1>
            <h3>MI Al Karomah</h3>
            <p>Kelola semua konten website dengan mudah dan cepat.</p>
        </div>
    </div>

    <!-- STATS CARD -->
    <div class="stats-grid">
        <div class="stats-card">
            <div class="stats-top">
                <div class="stats-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="stats-info">
                    <h3>Total Berita</h3>
                    <h1>24</h1>
                </div>
            </div>
            <div class="stats-footer">
                <a href="#">Lihat semua berita</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-top">
                <div class="stats-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stats-info">
                    <h3>Total Guru</h3>
                    <h1>18</h1>
                </div>
            </div>
            <div class="stats-footer">
                <a href="#">Lihat semua guru</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-top">
                <div class="stats-icon">
                    <i class="fas fa-image"></i>
                </div>
                <div class="stats-info">
                    <h3>Total Galeri</h3>
                    <h1>56</h1>
                </div>
            </div>
            <div class="stats-footer">
                <a href="#">Lihat semua galeri</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-top">
                <div class="stats-icon">
                    <i class="fas fa-calendar"></i>
                </div>
                <div class="stats-info">
                    <h3>Total Agenda</h3>
                    <h1>12</h1>
                </div>
            </div>
            <div class="stats-footer">
                <a href="#">Lihat semua agenda</a>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
    </div>

    <!-- CONTENT GRID -->
    <div class="content-grid">
        <!-- LEFT: Berita Terbaru -->
        <div class="card">
            <div class="card-header">
                <h2><i class="fas fa-clock" style="margin-right: 8px; color: #16a34a;"></i> Berita Terbaru</h2>
                <a href="#" class="btn-add">
                    <i class="fas fa-plus"></i> Tambah Berita
                </a>
            </div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><strong>Kegiatan Upacara Hari Senin</strong><br><small style="color:#6b7280;">Upacara bendera rutin hari Senin</small></td>
                            <td><span class="badge badge-green">Kegiatan</span></td>
                            <td>20 Mei 2024</td>
                            <td><span class="badge badge-green">Publik</span></td>
                            <td>
                                <div class="action-btn">
                                    <a href="#" class="view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="edit"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>Lomba Tahfidz Tingkat Kecamatan</strong><br><small style="color:#6b7280;">Siswa MI Al Karomah meraih juara</small></td>
                            <td><span class="badge badge-blue">Prestasi</span></td>
                            <td>18 Mei 2024</td>
                            <td><span class="badge badge-green">Publik</span></td>
                            <td>
                                <div class="action-btn">
                                    <a href="#" class="view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="edit"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>Kunjungan Edukasi ke Perpustakaan</strong><br><small style="color:#6b7280;">Siswa belajar mengenal buku lebih dekat</small></td>
                            <td><span class="badge badge-green">Kegiatan</span></td>
                            <td>15 Mei 2024</td>
                            <td><span class="badge badge-green">Publik</span></td>
                            <td>
                                <div class="action-btn">
                                    <a href="#" class="view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="edit"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong>Pesantren Kilat Ramadhan</strong><br><small style="color:#6b7280;">Kegiatan pesantren kilat Ramadhan</small></td>
                            <td><span class="badge badge-green">Kegiatan</span></td>
                            <td>10 Mei 2024</td>
                            <td><span class="badge badge-green">Publik</span></td>
                            <td>
                                <div class="action-btn">
                                    <a href="#" class="view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="edit"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><strong>Selamat Hari Pendidikan Nasional</strong><br><small style="color:#6b7280;">MI Al Karomah ucapkan Hardiknas</small></td>
                            <td><span class="badge badge-blue">Pengumuman</span></td>
                            <td>2 Mei 2024</td>
                            <td><span class="badge badge-green">Publik</span></td>
                            <td>
                                <div class="action-btn">
                                    <a href="#" class="view"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="edit"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- RIGHT: Aktivitas & Penyimpanan -->
        <div>
            <div class="side-card">
                <h3><i class="fas fa-history"></i> Aktivitas Terbaru</h3>

                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="activity-text">
                            <h4>Admin menambah berita baru</h4>
                            <p>Kegiatan Upacara Hari Senin</p>
                        </div>
                    </div>
                    <div class="activity-time">10 menit lalu</div>
                </div>

                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div class="activity-text">
                            <h4>Admin mengubah data guru</h4>
                            <p>Ust. Ahmad Fauzi, S.Pd.I</p>
                        </div>
                    </div>
                    <div class="activity-time">35 menit lalu</div>
                </div>

                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon">
                            <i class="fas fa-image"></i>
                        </div>
                        <div class="activity-text">
                            <h4>Admin menambah foto galeri</h4>
                            <p>Kegiatan Lomba Tahfidz</p>
                        </div>
                    </div>
                    <div class="activity-time">1 jam lalu</div>
                </div>

                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        <div class="activity-text">
                            <h4>Admin menghapus berita</h4>
                            <p>Pengumuman Libur Sekolah</p>
                        </div>
                    </div>
                    <div class="activity-time">3 jam lalu</div>
                </div>

                <div class="activity-item">
                    <div class="activity-left">
                        <div class="activity-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <div class="activity-text">
                            <h4>Admin login ke sistem</h4>
                            <p>IP 192.168.1.1</p>
                        </div>
                    </div>
                    <div class="activity-time">5 jam lalu</div>
                </div>
            </div>

            <!-- STORAGE -->
            <div class="side-card">
                <h3><i class="fas fa-database"></i> Penyimpanan</h3>
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
    </div>

</div>

<?php
// Footer sudah termasuk di admin_footer
?>
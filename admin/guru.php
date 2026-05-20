<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

// Fitur Pencarian Data Guru
$keyword = "";
if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['cari']);
    // Cari berdasarkan nama, nip, jabatan, atau mapel
    $query_str = "SELECT * FROM guru WHERE 
                  nama LIKE '%$keyword%' OR 
                  nip LIKE '%$keyword%' OR 
                  jabatan LIKE '%$keyword%' OR 
                  mapel LIKE '%$keyword%' 
                  ORDER BY id DESC";
} else {
    $query_str = "SELECT * FROM guru ORDER BY id DESC";
}

$data = mysqli_query($conn, $query_str);
?>

<style>
/* ==========================================
   WORKSPACE CONTENT (MENEMPEL PAS DI BAWAH TOPBAR)
========================================== */
.content-body {
    padding: 30px;
    flex: 1;
    background: #f4f6f9;
    min-width: 0; /* Mencegah konten meluber keluar wrapper flex */
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 16px;
}

.page-title h1 {
    font-size: 24px;
    font-weight: 700;
    color: #111827;
    margin: 0 0 4px 0;
    letter-spacing: -0.5px;
}

.page-title p {
    color: #6b7280;
    font-size: 13px;
    margin: 0;
}

/* Kumpulan Tombol & Search Bar */
.header-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

/* Desain Kolom Cari */
.search-form {
    display: flex;
    align-items: center;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 0 14px;
    height: 42px;
    width: 280px;
    box-shadow: 0 1px 2px rgba(0,0,0,0.02);
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.search-form:focus-within {
    border-color: #16a34a;
    box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
}

.search-form i {
    color: #9ca3af;
    font-size: 14px;
    margin-right: 10px;
}

.search-form input {
    border: none;
    outline: none;
    width: 100%;
    font-size: 13px;
    color: #111827;
    background: transparent;
}

.btn-search-clear {
    color: #9ca3af;
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
}
.btn-search-clear:hover { color: #ef4444; }

.btn-add {
    background: linear-gradient(135deg, #16a34a, #15803d);
    padding: 0 18px;
    border-radius: 10px;
    text-decoration: none;
    color: white;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    height: 42px;
    transition: all 0.2s ease;
    box-shadow: 0 2px 4px rgba(22, 163, 74, 0.15);
}

.btn-add:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(22, 163, 74, 0.25);
    opacity: 0.95;
}

/* ==========================================
   GRID & CARD DATA STYLE (RAPI & SIMETRIS)
========================================== */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.gallery-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
    border: 1px solid #eef2f5;
    transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
    height: 100%; /* Memastikan tinggi seluruh card dalam satu baris selalu sama rata */
}

.gallery-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 20px -3px rgba(0, 0, 0, 0.06);
}

/* Kunci ukuran gambar foto profil guru */
.gallery-image {
    width: 100%;
    height: 210px; /* Disesuaikan agar proporsi foto profil vertikal/setengah badan terlihat bagus */
    overflow: hidden;
    background-color: #f3f4f6;
    position: relative;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Foto terpotong rapi di tengah tanpa penyok */
    transition: transform 0.5s ease;
}

.gallery-card:hover .gallery-image img {
    transform: scale(1.04);
}

.gallery-content {
    padding: 18px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.gallery-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.badge {
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
}

/* Hijau untuk Status Aktif */
.badge-green {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #bbf7d0;
}

/* Merah untuk Status Nonaktif */
.badge-red {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #fecaca;
}

.guru-nip-text {
    font-size: 12px;
    color: #9ca3af;
    font-weight: 500;
}

/* Nama Guru */
.gallery-content h3 {
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 8px;
    color: #111827;
    line-height: 1.3;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Meta Data Informasi Guru */
.guru-meta-info {
    font-size: 13px;
    color: #4b5563;
    line-height: 1.6;
    margin: 0 0 18px 0;
}

.guru-meta-info div {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 4px;
}

.guru-meta-info i {
    color: #166534; /* Warna ikon diselaraskan dengan MI Al Karomah */
    width: 16px;
    font-size: 12px;
}

/* Group Tombol Aksi */
.action-group {
    display: flex;
    gap: 8px;
    margin-top: auto; /* Memaksa tombol aksi selalu menempel tepat di dasar card */
}

.action-btn {
    flex: 1;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: background-color 0.2s, opacity 0.2s;
    font-size: 12px;
    font-weight: 500;
}

.view-btn { background: #f0fdf4; color: #16a34a; }
.view-btn:hover { background: #dcfce7; }

.edit-btn { background: #f0f6ff; color: #2563eb; }
.edit-btn:hover { background: #dbeafe; }

.delete-btn { background: #fdf2f2; color: #dc2626; }
.delete-btn:hover { background: #fee2e2; }

.empty-state {
    grid-column: span 3;
    background: white;
    padding: 60px 40px;
    text-align: center;
    border-radius: 16px;
    color: #9ca3af;
    border: 1px solid #eef2f5;
}

/* ==========================================
   RESPONSIVE BREAKPOINTS (LEBIH HALUS & MATANG)
========================================== */
@media(max-width: 1200px) {
    .gallery-grid { 
        grid-template-columns: repeat(2, 1fr); 
        gap: 20px;
    }
    .empty-state { grid-column: span 2; }
}

@media(max-width: 768px) {
    .content-body { 
        padding: 20px; 
    }
    .page-header {
        flex-direction: column;
        align-items: stretch;
    }
    .header-actions {
        flex-direction: column;
        align-items: stretch;
    }
    .search-form {
        width: 100%;
    }
    .btn-add {
        justify-content: center;
    }

    .gallery-grid { 
        display: grid; 
        grid-template-columns: repeat(2, 1fr); 
        gap: 12px; 
    }

    .empty-state { 
        grid-column: span 2; 
    }

    .gallery-image {
        height: 160px; 
    }

   .guru-meta-info {
        display: none !important;
    }
</style>

<div class="content-body">

    <div class="page-header">
        <div class="page-title">
            <h1>Data Guru & Staf</h1>
            <p>Kelola data guru dan staff pengajar MI Al Karomah</p>
        </div>

        <div class="header-actions">
            <form action="" method="GET" class="search-form">
                <i class="fas fa-search"></i>
                <input type="text" name="cari" placeholder="Cari nama, jabatan, atau mapel..." value="<?= htmlspecialchars($keyword); ?>">
                <?php if(!empty($keyword)): ?>
                    <a href="guru.php" class="btn-search-clear"><i class="fas fa-times-circle"></i></a>
                <?php endif; ?>
            </form>

            <a href="tambah_guru.php" class="btn-add">
                <i class="fas fa-plus"></i> Tambah Guru
            </a>
        </div>
    </div>

    <div class="gallery-grid">

        <?php 
        if(mysqli_num_rows($data) > 0):
            while($d = mysqli_fetch_assoc($data)) : 
        ?>
        <div class="gallery-card">

            <div class="gallery-image">
                <img src="../assets/guru/<?= !empty($d['foto']) ? $d['foto'] : 'default-guru.jpg'; ?>" onerror="this.src='../assets/guru/default-guru.jpg'" alt="Foto Profil">
            </div>

            <div class="gallery-content">

                <div class="gallery-top">
                    <?php if($d['status'] == 'aktif') : ?>
                        <span class="badge badge-green">Aktif</span>
                    <?php else : ?>
                        <span class="badge badge-red">Nonaktif</span>
                    <?php endif; ?>
                    
                    <div class="guru-nip-text">
                        <i class="far fa-id-card"></i> NIP: <?= $d['nip'] ? htmlspecialchars($d['nip']) : '-'; ?>
                    </div>
                </div>

                <h3><?= htmlspecialchars($d['nama']); ?></h3>

                <div class="guru-meta-info">
                    <div>
                        <i class="fas fa-briefcase"></i> 
                        <span><strong>Jabatan:</strong> <?= htmlspecialchars($d['jabatan']); ?></span>
                    </div>
                    <div>
                        <i class="fas fa-book"></i> 
                        <span><strong>Mapel:</strong> <?= $d['mapel'] ? htmlspecialchars($d['mapel']) : '-'; ?></span>
                    </div>
                    <div>
                        <i class="fas fa-graduation-cap"></i> 
                        <span><strong>Pendidikan:</strong> <?= $d['pendidikan'] ? htmlspecialchars($d['pendidikan']) : '-'; ?></span>
                    </div>
                </div>

                <div class="action-group">
                    <a href="../assets/guru/<?= $d['foto']; ?>" target="_blank" class="action-btn view-btn" title="Lihat Foto Full">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="edit_guru.php?id=<?= $d['id']; ?>" class="action-btn edit-btn" title="Ubah Data">
                        <i class="fas fa-pen"></i>
                    </a>

                    <a href="hapus_guru.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus data guru ini?')" class="action-btn delete-btn" title="Hapus Data">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>

            </div>

        </div>
        <?php 
            endwhile; 
        else: 
        ?>
            <div class="empty-state">
                <i class="fas fa-user-slash" style="font-size: 32px; display: block; margin-bottom: 12px; color: #9ca3af;"></i>
                Tidak ada data guru yang cocok dengan pencarian Anda.
            </div>
        <?php endif; ?>

    </div>

</div>
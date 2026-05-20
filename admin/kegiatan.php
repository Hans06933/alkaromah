<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

$keyword = '';

if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['cari']);

    // Pencarian data berdasarkan judul atau kategori kegiatan
    $query = mysqli_query($conn, "SELECT * FROM kegiatan
        WHERE judul LIKE '%$keyword%'
        OR kategori LIKE '%$keyword%'
        ORDER BY id DESC");
} else {
    $query = mysqli_query($conn, "SELECT * FROM kegiatan ORDER BY id DESC");
}
?>

<style>
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

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 25px;
    }

    .gallery-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        transition: 0.3s;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
    }

    .gallery-image {
        height: 240px;
        overflow: hidden;
    }

    .gallery-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery-content {
        padding: 20px;
    }

    .gallery-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
        background: #dcfce7;
        color: #166534;
    }

    .gallery-date {
        font-size: 12px;
        color: #6b7280;
    }

    .gallery-content h3 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #111827;
    }

    .gallery-content p {
        font-size: 14px;
        color: #6b7280;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .action-group {
        display: flex;
        gap: 10px;
    }

    .action-btn {
        flex: 1;
        height: 42px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 14px;
    }

    .view-btn {
        background: #ecfdf5;
        color: #16a34a;
    }

    .edit-btn {
        background: #eff6ff;
        color: #2563eb;
    }

    .delete-btn {
        background: #fef2f2;
        color: #dc2626;
    }

    .empty-state {
        background: white;
        padding: 60px 30px;
        border-radius: 24px;
        text-align: center;
        color: #6b7280;
        grid-column: 1/-1;
    }

    @media(max-width: 991px) {
        .content-body {
            margin-left: 0;
            width: 100%;
            /* Penyesuaian layout responsive agar tetap presisi tanpa gap besar */
            padding: 20px;
        }
    }

    @media(max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-actions {
            width: 100%;
            flex-direction: column;
        }

        .search-form {
            width: 100%;
        }

        .btn-add {
            width: 100%;
            justify-content: center;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="content-body">

    <div class="page-header">
        <div class="page-title">
            <h1>Data Kegiatan</h1>
            <p>Kelola semua kegiatan sekolah MI Al Karomah</p>
        </div>

        <div class="header-actions">
            <form method="GET" class="search-form">
                <i class="fas fa-search"></i>
                <input type="text" 
                       name="cari" 
                       placeholder="Cari kegiatan..." 
                       value="<?= htmlspecialchars($keyword); ?>">
            </form>

            <a href="tambah_kegiatan.php" class="btn-add">
                <i class="fas fa-plus"></i> Tambah Kegiatan
            </a>
        </div>
    </div>

    <div class="gallery-grid">
        <?php 
        // Validasi proteksi eksekusi query data kegiatan sebelum rendering komponen card
        if ($query): 
            if (mysqli_num_rows($query) > 0): 
                while ($d = mysqli_fetch_assoc($query)): 
        ?>
                    <div class="gallery-card">
                        <div class="gallery-image">
                            <img src="../assets/kegiatan/<?= $d['gambar']; ?>"
                                 onerror="this.src='../assets/default.jpg'">
                        </div>

                        <div class="gallery-content">
                            <div class="gallery-top">
                                <span class="badge">
                                    <?= htmlspecialchars($d['kategori']); ?>
                                </span>
                                <div class="gallery-date">
                                    <?= date('d M Y', strtotime($d['tanggal'])); ?>
                                </div>
                            </div>

                            <h3><?= htmlspecialchars($d['judul']); ?></h3>
                            <p><?= htmlspecialchars(substr($d['deskripsi'], 0, 100)); ?>...</p>

                            <div class="action-group">
                                <a href="../kegiatan_detail.php?slug=<?= $d['slug']; ?>" 
                                   target="_blank" 
                                   class="action-btn view-btn">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="edit_kegiatan.php?id=<?= $d['id']; ?>" 
                                   class="action-btn edit-btn">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <a href="hapus_kegiatan.php?id=<?= $d['id']; ?>" 
                                   onclick="return confirm('Yakin ingin menghapus kegiatan ini?')" 
                                   class="action-btn delete-btn">
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
                    <i class="fas fa-folder-open" style="font-size:40px; margin-bottom:15px;"></i>
                    <h3>Belum Ada Data Kegiatan</h3>
                </div>
            <?php 
            endif; 
        else: 
            ?>
            <div class="empty-state" style="border: 2px dashed #ef4444; background: #fef2f2;">
                <i class="fas fa-exclamation-triangle" style="font-size:40px; color:#dc2626; margin-bottom:15px;"></i>
                <h3 style="color:#dc2626;">Gagal Mengambil Data Database</h3>
                <p style="margin-top: 10px; font-family: monospace; background: #fff; padding: 10px; border-radius: 8px; display: inline-block;">
                    Error: <?= mysqli_error($conn); ?>
                </p>
            </div>
        <?php 
        endif; 
        ?>
    </div>

</div>
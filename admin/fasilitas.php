<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM fasilitas ORDER BY id DESC");
?>

<style>
    .content-body {
        margin-left: 260px;
        padding: 95px 25px 25px;
        background: #f4f6f9;
        min-height: 100vh;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 20px;
        flex-wrap: wrap;
    }

    .page-title h1 {
        font-size: 30px;
        margin-bottom: 5px;
        color: #111827;
    }

    .page-title p {
        font-size: 14px;
        color: #6b7280;
    }

    .btn-add {
        height: 48px;
        padding: 0 20px;
        border-radius: 14px;
        background: #16a34a;
        display: flex;
        align-items: center;
        gap: 10px;
        color: white;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .grid-fasilitas {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .card-fasilitas {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        transition: 0.3s;
    }

    .card-fasilitas:hover {
        transform: translateY(-5px);
    }

    .card-image {
        height: 220px;
        overflow: hidden;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-body {
        padding: 20px;
    }

    .meta-tags {
        display: flex;
        gap: 8px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    .icon-box {
        width: 55px;
        height: 55px;
        border-radius: 16px;
        background: #dcfce7;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        font-size: 22px;
        color: #16a34a;
    }

    .card-body h3 {
        font-size: 22px;
        margin-bottom: 10px;
        color: #111827;
    }

    .card-body p {
        font-size: 14px;
        line-height: 1.7;
        color: #6b7280;
        margin-bottom: 20px;
    }

    .badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-kategori {
        background: #eff6ff;
        color: #2563eb;
    }

    .badge-aktif {
        background: #dcfce7;
        color: #166534;
    }

    .badge-nonaktif {
        background: #fef2f2;
        color: #991b1b;
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

    .edit-btn {
        background: #eff6ff;
        color: #2563eb;
    }

    .delete-btn {
        background: #fef2f2;
        color: #dc2626;
    }

    @media (max-width: 991px) {
        .content-body {
            margin-left: 0;
            padding: 90px 20px 20px;
        }
    }
</style>

<div class="content-body">
    <div class="page-header">
        <div class="page-title">
            <h1>Fasilitas Sekolah</h1>
            <p>Kelola seluruh fasilitas MI Al Karomah</p>
        </div>
        <a href="tambah_fasilitas.php" class="btn-add">
            <i class="fas fa-plus"></i> Tambah Fasilitas
        </a>
    </div>

    <div class="grid-fasilitas">
        <?php while ($d = mysqli_fetch_assoc($query)) : ?>
            <div class="card-fasilitas">
                
                <div class="card-image">
                    <img src="../assets/fasilitas/<?= $d['gambar']; ?>" onerror="this.src='../upload/default.jpg'" alt="<?= htmlspecialchars($d['nama']); ?>">
                </div>

                <div class="card-body">
                    <div class="icon-box">
                        <i class="<?= htmlspecialchars($d['icon']); ?>"></i>
                    </div>

                    <div class="meta-tags">
                        <!-- Badge Kategori -->
                        <span class="badge badge-kategori">
                            <?= htmlspecialchars($d['kategori']); ?>
                        </span>
                        
                        <!-- Badge Status Dinamis -->
                        <?php if ($d['status'] == 'aktif') : ?>
                            <span class="badge badge-aktif">Aktif</span>
                        <?php else : ?>
                            <span class="badge badge-nonaktif">Nonaktif</span>
                        <?php endif; ?>
                    </div>

                    <h3><?= htmlspecialchars($d['nama']); ?></h3>
                    
                    <p><?= htmlspecialchars(substr($d['deskripsi'], 0, 120)); ?>...</p>

                    <div class="action-group">
                        <a href="edit_fasilitas.php?id=<?= $d['id']; ?>" class="action-btn edit-btn" title="Edit">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="hapus_fasilitas.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus fasilitas ini?')" class="action-btn delete-btn" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>

            </div>
        <?php endwhile; ?>
    </div>
</div>
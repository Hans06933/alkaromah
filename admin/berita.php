<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

// Fitur Pencarian Berita
$keyword = "";
if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['cari']);
    $query_str = "SELECT * FROM berita WHERE judul LIKE '%$keyword%' OR kategori LIKE '%$keyword%' OR penulis LIKE '%$keyword%' ORDER BY id DESC";
} else {
    $query_str = "SELECT * FROM berita ORDER BY id DESC";
}

$data = mysqli_query($conn, $query_str);
?>

<style>
    .content-body {
        padding: 30px;
        flex: 1;
        background: #f4f6f9;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .page-title h1 {
        font-size: 26px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 4px 0;
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
        gap: 15px;
        flex-wrap: wrap;
    }

    /* Desain Kolom Cari */
    .search-form {
        display: flex;
        align-items: center;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 0 15px;
        height: 42px;
        width: 280px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
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
    }

    .btn-search-clear {
        color: #9ca3af;
        text-decoration: none;
        font-size: 13px;
    }
    .btn-search-clear:hover { color: #ef4444; }

    .btn-add {
        background: linear-gradient(135deg, #16a34a, #15803d);
        padding: 0 20px;
        border-radius: 10px;
        text-decoration: none;
        color: white;
        font-size: 13px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        height: 42px;
        transition: 0.2s;
    }

    .btn-add:hover {
        transform: translateY(-1px);
        opacity: 0.95;
    }

    /* ==========================================
    TABLE SYSTEM STYLE
    ========================================== */
    .table-responsive {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.02);
        border: 1px solid #eef2f5;
    }

    .news-table {
        width: 100%;
        border-collapse: collapse;
    }

    .news-table th {
        background: #166534;
        color: white;
        padding: 14px 18px;
        font-size: 13px;
        font-weight: 600;
        text-align: left;
    }

    .news-table td {
        padding: 14px 18px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        font-size: 13px;
    }

    .news-item {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .news-thumb {
        width: 80px;
        height: 55px;
        object-fit: cover;
        border-radius: 8px;
        background: #f3f4f6;
    }

    .news-title {
        font-size: 14px;
        font-weight: 600;
        color: #111827;
        margin-bottom: 3px;
    }

    .news-desc {
        font-size: 12px;
        color: #6b7280;
    }

    .badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
    }

    .badge-publish { background: #dcfce7; color: #166534; }
    .badge-draft { background: #fef3c7; color: #92400e; }

    .action-group {
        display: flex;
        gap: 8px;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: 0.2s;
        font-size: 13px;
    }

    .view-btn { background: #f0fdf4; color: #16a34a; }
    .edit-btn { background: #f0f6ff; color: #2563eb; }
    .delete-btn { background: #fdf2f2; color: #dc2626; }

    .action-btn:hover { transform: translateY(-1px); }

    .empty-state {
        padding: 40px;
        text-align: center;
        color: #6b7280;
    }

    @media(max-width: 991px) {
        .table-responsive { overflow-x: auto; }
        .news-table { min-width: 850px; }
    }
</style>

<div class="content-body">

    <div class="page-header">
        <div class="page-title">
            <h1>Kelola Berita</h1>
            <p>Kelola berita dan publikasi artikel website MI Al Karomah</p>
        </div>

        <div class="header-actions">
            <form action="" method="GET" class="search-form">
                <i class="fas fa-search"></i>
                <input type="text" name="cari" placeholder="Cari berita..." value="<?= htmlspecialchars($keyword); ?>">
                <?php if(!empty($keyword)): ?>
                    <a href="berita.php" class="btn-search-clear"><i class="fas fa-times-circle"></i></a>
                <?php endif; ?>
            </form>

            <a href="tambah_berita.php" class="btn-add">
                <i class="fas fa-plus"></i> Tambah Berita
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="news-table">
            <thead>
                <tr>
                    <th style="width: 50px; text-align: center;">No</th>
                    <th>Berita</th>
                    <th style="width: 150px;">Kategori</th>
                    <th style="width: 120px;">Penulis</th>
                    <th style="width: 100px;">Status</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(mysqli_num_rows($data) > 0):
                $no = 1;
                while($d = mysqli_fetch_assoc($data)) :
            ?>
                <tr>
                    <td style="text-align: center; font-weight: 600; color: #6b7280;"><?= $no++; ?></td>
                    <td>
                        <div class="news-item">
                            <img src="../assets/berita/<?= !empty($d['thumbnail']) ? $d['thumbnail'] : 'default.jpg'; ?>" class="news-thumb" onerror="this.src='../assets/berita/default.jpg'">
                            <div>
                                <div class="news-title"><?= htmlspecialchars($d['judul']); ?></div>
                                <div class="news-desc">
                                    <?= substr(strip_tags($d['isi']),0,70); ?>...
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><span style="font-weight: 500;"><?= htmlspecialchars($d['kategori']); ?></span></td>
                    <td><?= htmlspecialchars($d['penulis']); ?></td>
                    <td>
                        <?php if($d['status'] == 'publish') : ?>
                            <span class="badge badge-publish">Publish</span>
                        <?php else : ?>
                            <span class="badge badge-draft">Draft</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="action-group">
                            <a href="edit_berita.php?id=<?= $d['id']; ?>" class="action-btn edit-btn"><i class="fas fa-pen"></i></a>
                            <a href="hapus_berita.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus berita ini?')" class="action-btn delete-btn"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
            <?php 
                endwhile;
            else: 
            ?>
                <tr>
                    <td colspan="6" class="empty-state">
                        <i class="fas fa-search" style="font-size: 20px; display:block; margin-bottom:8px; color:#9ca3af;"></i>
                        Data berita tidak ditemukan.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div> </div> </body>
</html>
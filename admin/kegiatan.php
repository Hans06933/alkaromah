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
    $query = mysqli_query($conn, "SELECT * FROM kegiatan
        WHERE judul LIKE '%$keyword%'
        OR kategori LIKE '%$keyword%'
        ORDER BY id DESC");
} else {
    $query = mysqli_query($conn, "SELECT * FROM kegiatan ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .content-body {
            padding: 20px;
            background: #f4f6f9;
            min-height: 100vh;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .page-title h1 {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 5px 0;
        }

        .page-title p {
            color: #6b7280;
            font-size: 13px;
            margin: 0;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .search-form {
            display: flex;
            align-items: center;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 0 14px;
            height: 42px;
            width: 280px;
        }

        .search-form:focus-within {
            border-color: #16a34a;
            background: white;
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
            font-size: 14px;
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
            transition: all 0.2s;
        }

        .btn-add:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(22, 163, 74, 0.2);
        }

        .table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        thead {
            background: #f9fafb;
            border-bottom: 2px solid #e5e7eb;
        }

        th {
            padding: 16px;
            text-align: left;
            font-size: 13px;
            font-weight: 700;
            color: #374151;
        }

        td {
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f3f4f6;
        }

        tr:hover {
            background: #f9fafb;
        }

        .media-preview {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .media-preview:hover {
            transform: scale(1.05);
        }

        .media-placeholder {
            width: 70px;
            height: 70px;
            background: #f3f4f6;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
        }

        .judul-kegiatan {
            font-weight: 700;
            color: #111827;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .deskripsi-kegiatan {
            font-size: 12px;
            color: #6b7280;
            line-height: 1.5;
        }

        .badge {
            display: inline-block;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-upacara {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-pertemuan {
            background: #dcfce7;
            color: #166534;
        }

        .badge-lomba {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-seminar {
            background: #f3e8ff;
            color: #6b21a8;
        }

        .badge-default {
            background: #e5e7eb;
            color: #374151;
        }

        .tanggal-kegiatan {
            font-size: 12px;
            color: #6b7280;
            white-space: nowrap;
        }

        .action-group {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.2s;
        }

        .view-btn { background: #f0fdf4; color: #16a34a; }
        .view-btn:hover { background: #dcfce7; transform: scale(1.05); }

        .edit-btn { background: #f0f6ff; color: #2563eb; }
        .edit-btn:hover { background: #dbeafe; transform: scale(1.05); }

        .delete-btn { background: #fdf2f2; color: #dc2626; }
        .delete-btn:hover { background: #fee2e2; transform: scale(1.05); }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 48px;
            color: #d1d5db;
            margin-bottom: 15px;
        }

        .empty-state p {
            color: #6b7280;
            font-size: 14px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            align-items: center;
            justify-content: center;
        }

        .modal.open {
            display: flex;
        }

        .modal-content {
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .modal-close:hover {
            color: #ef4444;
        }

        @media (max-width: 768px) {
            .content-body {
                padding: 15px;
            }
            
            .page-header {
                padding: 15px;
            }
            
            .page-title h1 {
                font-size: 18px;
            }
            
            .page-title p {
                font-size: 11px;
            }
            
            .search-form {
                width: 100%;
            }
            
            .btn-add {
                width: 100%;
                justify-content: center;
            }
            
            .header-actions {
                width: 100%;
            }
            
            th, td {
                padding: 12px;
            }
            
            .media-preview {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>

<div class="content-body">
    <div class="page-header">
        <div class="page-title">
            <h1><i class="fas fa-calendar-alt" style="color: #16a34a; margin-right: 8px;"></i> Data Kegiatan</h1>
            <p>Kelola semua kegiatan sekolah MI Al Karomah</p>
        </div>

        <div class="header-actions">
            <form method="GET" class="search-form">
                <i class="fas fa-search"></i>
                <input type="text" name="cari" placeholder="Cari kegiatan..." value="<?= htmlspecialchars($keyword); ?>">
                <?php if(!empty($keyword)): ?>
                    <a href="kegiatan.php" class="btn-search-clear"><i class="fas fa-times-circle"></i></a>
                <?php endif; ?>
            </form>

            <a href="tambah_kegiatan.php" class="btn-add">
                <i class="fas fa-plus"></i> Tambah Kegiatan
            </a>
        </div>
    </div>

    <div class="table-container">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 100px;">Gambar</th>
                        <th>Informasi Kegiatan</th>
                        <th style="width: 130px;">Kategori</th>
                        <th style="width: 120px;">Tanggal</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($query && mysqli_num_rows($query) > 0): 
                        while($d = mysqli_fetch_assoc($query)):
                            $path_file = "../assets/kegiatan/" . $d['gambar'];
                            $file_exists = !empty($d['gambar']) && file_exists($path_file);
                            
                            $badge_class = 'badge-default';
                            if($d['kategori'] == 'Upacara') $badge_class = 'badge-upacara';
                            if($d['kategori'] == 'Pertemuan') $badge_class = 'badge-pertemuan';
                            if($d['kategori'] == 'Lomba') $badge_class = 'badge-lomba';
                            if($d['kategori'] == 'Seminar') $badge_class = 'badge-seminar';
                    ?>
                    <tr>
                        <td>
                            <?php if($file_exists): ?>
                                <img src="<?= $path_file; ?>" 
                                     alt="<?= htmlspecialchars($d['judul']); ?>" 
                                     class="media-preview trigger-modal"
                                     data-media-src="<?= $path_file; ?>">
                            <?php else: ?>
                                <div class="media-placeholder">
                                    <i class="fas fa-image fa-2x"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="judul-kegiatan"><?= htmlspecialchars($d['judul']); ?></div>
                            <div class="deskripsi-kegiatan">
                                <?= htmlspecialchars(substr($d['deskripsi'], 0, 120)); ?>
                                <?= strlen($d['deskripsi']) > 120 ? '...' : ''; ?>
                            </div>
                        </td>
                        <td>
                            <span class="badge <?= $badge_class; ?>">
                                <?= htmlspecialchars($d['kategori']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="tanggal-kegiatan">
                                <i class="far fa-calendar-alt" style="margin-right: 6px;"></i>
                                <?= date('d/m/Y', strtotime($d['tanggal'])); ?>
                            </div>
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="detail_kegiatan.php?id=<?= $d['id']; ?>" class="action-btn view-btn" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="edit_kegiatan.php?id=<?= $d['id']; ?>" class="action-btn edit-btn" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="hapus_kegiatan.php?id=<?= $d['id']; ?>" 
                                   onclick="return confirm('Yakin ingin menghapus kegiatan ini?')" 
                                   class="action-btn delete-btn" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                        endwhile;
                    else: 
                    ?>
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="fas fa-folder-open"></i>
                                <p>Belum ada data kegiatan yang ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="imageModal" class="modal">
    <span class="modal-close">&times;</span>
    <img class="modal-content" id="modalImage">
</div>

<script>
const modal = document.getElementById("imageModal");
const modalImg = document.getElementById("modalImage");
const closeBtn = document.querySelector(".modal-close");

document.querySelectorAll('.trigger-modal').forEach(img => {
    img.addEventListener('click', function() {
        modal.classList.add("open");
        modalImg.src = this.dataset.mediaSrc;
    });
});

function closeModal() {
    modal.classList.remove("open");
    modalImg.src = "";
}

closeBtn.addEventListener('click', closeModal);

modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        closeModal();
    }
});

document.addEventListener('keydown', (e) => {
    if (e.key === "Escape" && modal.classList.contains("open")) {
        closeModal();
    }
});
</script>

</body>
</html>
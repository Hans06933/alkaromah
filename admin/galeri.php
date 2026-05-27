<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

$keyword = "";
if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['cari']);
    $query_str = "SELECT * FROM galeri WHERE 
                  judul LIKE '%$keyword%' OR 
                  kategori LIKE '%$keyword%' OR 
                  deskripsi LIKE '%$keyword%' 
                  ORDER BY id DESC";
} else {
    $query_str = "SELECT * FROM galeri ORDER BY id DESC";
}

$data = mysqli_query($conn, $query_str);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f6f9;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
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

        .gallery-table-container {
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
            min-width: 800px;
        }

        thead {
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            padding: 16px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #4b5563;
        }

        td {
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f3f4f6;
        }

        .media-preview {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .media-preview:hover {
            transform: scale(1.05);
        }

        .media-placeholder {
            width: 60px;
            height: 60px;
            background: #fee2e2;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #dc2626;
            font-size: 11px;
            text-align: center;
            padding: 5px;
        }

        .judul-galeri {
            font-weight: 600;
            color: #111827;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .deskripsi-galeri {
            font-size: 12px;
            color: #6b7280;
            line-height: 1.4;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-green {
            background: #dcfce7;
            color: #166534;
        }

        .badge-blue {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-purple {
            background: #f3e8ff;
            color: #6b21a8;
        }

        .badge-orange {
            background: #ffedd5;
            color: #9a3412;
        }

        .tanggal-galeri {
            font-size: 12px;
            color: #6b7280;
            white-space: nowrap;
        }

        .action-group {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 34px;
            height: 34px;
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
            background: white;
            border-radius: 12px;
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

        .media-modal {
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

        .media-modal.open {
            display: flex;
        }

        .modal-content {
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .close-modal:hover {
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
            <h1><i class="fas fa-images" style="color: #16a34a; margin-right: 8px;"></i> Galeri Sekolah</h1>
            <p>Kelola dokumentasi foto dan video kegiatan MI Al Karomah</p>
        </div>

        <div class="header-actions">
            <form action="" method="GET" class="search-form">
                <i class="fas fa-search"></i>
                <input type="text" name="cari" placeholder="Cari galeri..." value="<?= htmlspecialchars($keyword); ?>">
                <?php if(!empty($keyword)): ?>
                    <a href="galeri.php" class="btn-search-clear"><i class="fas fa-times-circle"></i></a>
                <?php endif; ?>
            </form>

            <a href="tambah_galeri.php" class="btn-add">
                <i class="fas fa-plus"></i> Tambah Galeri
            </a>
        </div>
    </div>

    <div class="gallery-table-container">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 80px;">Media</th>
                        <th>Informasi Galeri</th>
                        <th style="width: 120px;">Kategori</th>
                        <th style="width: 110px;">Tanggal</th>
                        <th style="width: 100px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($data) > 0):
                        while($d = mysqli_fetch_assoc($data)):
                            $file_nama = $d['gambar'];
                            $ekstensi = strtolower(pathinfo($file_nama, PATHINFO_EXTENSION));
                            $ekstensi_video = ['mp4', 'webm', 'ogg', 'mov', 'avi', 'mkv'];
                            $path_file = "../assets/galeri/" . $file_nama;
                            $is_video = in_array($ekstensi, $ekstensi_video);
                            $file_exists = !empty($file_nama) && file_exists($path_file);
                            
                            $badge_color = 'badge-green';
                            if($d['kategori'] == 'Upacara') $badge_color = 'badge-blue';
                            if($d['kategori'] == 'Pertemuan') $badge_color = 'badge-purple';
                            if($d['kategori'] == 'Lomba') $badge_color = 'badge-orange';
                    ?>
                    <tr>
                        <td>
                            <?php if($file_exists): ?>
                                <?php if($is_video): ?>
                                    <video class="media-preview trigger-modal" data-media-type="video" data-media-src="<?= $path_file; ?>" muted preload="metadata">
                                        <source src="<?= $path_file; ?>">
                                    </video>
                                <?php else: ?>
                                    <img src="<?= $path_file; ?>" alt="<?= htmlspecialchars($d['judul']); ?>" class="media-preview trigger-modal" data-media-type="image" data-media-src="<?= $path_file; ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="media-placeholder">
                                    <i class="fas fa-image"></i>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="judul-galeri"><?= htmlspecialchars($d['judul']); ?></div>
                            <div class="deskripsi-galeri"><?= htmlspecialchars(substr($d['deskripsi'], 0, 100)); ?><?= strlen($d['deskripsi']) > 100 ? '...' : ''; ?></div>
                        </td>
                        <td>
                            <span class="badge <?= $badge_color; ?>">
                                <?= htmlspecialchars($d['kategori']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="tanggal-galeri">
                                <i class="far fa-calendar-alt" style="margin-right: 5px;"></i>
                                <?= date('d/m/Y', strtotime($d['tanggal'])); ?>
                            </div>
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="edit_galeri.php?id=<?= $d['id']; ?>" class="action-btn edit-btn" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="hapus_galeri.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus galeri ini?')" class="action-btn delete-btn" title="Hapus">
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
                                <i class="fas fa-images"></i>
                                <p>Tidak ada dokumentasi galeri yang ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="mediaModal" class="media-modal">
    <span class="close-modal">&times;</span>
    <div id="modalContentWrapper"></div>
</div>

<script>
const modal = document.getElementById("mediaModal");
const closeBtn = document.querySelector(".close-modal");
const wrapper = document.getElementById("modalContentWrapper");

function openModal(mediaType, mediaSrc) {
    wrapper.innerHTML = "";
    
    if (mediaType === 'video') {
        const videoElement = document.createElement('video');
        videoElement.src = mediaSrc;
        videoElement.className = "modal-content";
        videoElement.controls = true;
        videoElement.autoplay = true;
        videoElement.style.maxWidth = "90%";
        videoElement.style.maxHeight = "90%";
        wrapper.appendChild(videoElement);
    } else {
        const imgElement = document.createElement('img');
        imgElement.src = mediaSrc;
        imgElement.className = "modal-content";
        imgElement.style.maxWidth = "90%";
        imgElement.style.maxHeight = "90%";
        wrapper.appendChild(imgElement);
    }
    
    modal.classList.add("open");
}

function closeModal() {
    const video = wrapper.querySelector('video');
    if (video) {
        video.pause();
    }
    modal.classList.remove("open");
    wrapper.innerHTML = "";
}

document.querySelectorAll('.trigger-modal').forEach(element => {
    element.addEventListener('click', function(e) {
        e.stopPropagation();
        const mediaType = this.dataset.mediaType;
        const mediaSrc = this.dataset.mediaSrc;
        
        if (this.tagName === 'VIDEO') {
            const videoSrc = this.querySelector('source')?.src || this.src;
            if (videoSrc) {
                openModal('video', videoSrc);
            }
        } else {
            openModal(mediaType, mediaSrc);
        }
    });
});

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
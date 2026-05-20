<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

// Fitur Pencarian Data Galeri
$keyword = "";
if (isset($_GET['cari'])) {
    $keyword = mysqli_real_escape_string($conn, $_GET['cari']);
    // Cari berdasarkan judul, kategori, atau deskripsi
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

/* kumpulan Tombol & Search Bar */
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

/* Kunci ukuran media agar tidak merusak layout */
.gallery-image {
    width: 100%;
    height: 190px; 
    overflow: hidden;
    background-color: #000000; /* Diubah ke hitam agar video terlihat sinematik */
    position: relative;
}

.gallery-image img, .gallery-image video {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Terpotong rapi tanpa merusak aspek rasio */
    transition: transform 0.5s ease;
}

.gallery-card:hover .gallery-image img {
    transform: scale(1.04); /* Efek zoom tipis khusus gambar */
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
    margin-bottom: 10px;
}

.badge {
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: capitalize;
}

.badge-green {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #bbf7d0;
}

.gallery-date {
    font-size: 12px;
    color: #9ca3af;
}

/* Pembatasan baris teks */
.gallery-content h3 {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 8px;
    color: #111827;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2; 
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.gallery-content p {
    font-size: 13px;
    color: #6b7280;
    line-height: 1.5;
    margin: 0 0 18px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2; 
    -webkit-box-orient: vertical;
    overflow: hidden;
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
    cursor: pointer;
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
   PERBAIKAN: STYLING LIGHTBOX / MODAL PEMBESAR MEDIA
========================================== */
.media-modal {
    display: none; /* Sembunyikan Modal saat halaman pertama dimuat */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.9);
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.media-modal.open {
    display: flex;
    opacity: 1;
}

.media-modal .modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 90%;
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    animation: zoomIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.media-modal video.modal-content {
    background: #000;
}

/* Tombol Tutup (X) */
.media-modal .close-modal {
    position: absolute;
    top: 25px;
    right: 30px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    transition: transform 0.2s, color 0.2s;
    z-index: 1001;
}

.media-modal .close-modal:hover {
    color: #ef4444;
    transform: scale(1.1);
}

@keyframes zoomIn {
    from {transform:scale(0.8); opacity: 0;}
    to {transform:scale(1); opacity: 1;}
}

/* ==========================================
   RESPONSIVE BREAKPOINTS
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
        grid-template-columns: 1fr;
        gap: 16px;
    }
    .empty-state { grid-column: span 1; }
    .gallery-image {
        height: 200px;
    }
}
</style>

<div class="content-body">

    <div class="page-header">
        <div class="page-title">
            <h1>Galeri Sekolah</h1>
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

    <div class="gallery-grid">

        <?php 
        if(mysqli_num_rows($data) > 0):
            while($d = mysqli_fetch_assoc($data)) : 
                
                // --- PROSES SKRIP PENYELEKSI MEDIA (GAMBAR ATAU VIDEO) ---
                $file_nama = $d['gambar'];
                $ekstensi = strtolower(pathinfo($file_nama, PATHINFO_EXTENSION));
                
                $ekstensi_video = ['mp4', 'webm', 'ogg', 'mov'];
                $path_file = "../assets/galeri/" . $file_nama;
                $is_video = in_array($ekstensi, $ekstensi_video);
        ?>
        <div class="gallery-card">

            <div class="gallery-image">
                <?php if(!empty($file_nama) && file_exists($path_file)): ?>
                    
                    <?php if($is_video): ?>
                        <video preload="metadata">
                            <source src="<?= $path_file; ?>" type="video/<?= $ekstensi == 'mov' ? 'mp4' : $ekstensi; ?>">
                        </video>
                    <?php else: ?>
                        <img src="<?= $path_file; ?>" alt="<?= htmlspecialchars($d['judul']); ?>">
                    <?php endif; ?>

                <?php else: ?>
                    <div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #ef4444; font-size: 12px; background: #fee2e2; text-align: center; padding: 10px;">
                        File Rusak / Tidak Ditemukan
                    </div>
                <?php endif; ?>
            </div>

            <div class="gallery-content">

                <div class="gallery-top">
                    <span class="badge badge-green">
                        <?= htmlspecialchars($d['kategori']); ?>
                    </span>
                    <div class="gallery-date">
                        <i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($d['tanggal'])); ?>
                    </div>
                </div>

                <h3><?= htmlspecialchars($d['judul']); ?></h3>

                <p>
                    <?= htmlspecialchars(substr($d['deskripsi'], 0, 80)); ?>...
                </p>

                <div class="action-group">
                    <button type="button" 
                            class="action-btn view-btn trigger-modal" 
                            title="Perbesar Media"
                            data-media-type="<?= $is_video ? 'video' : 'gambar'; ?>"
                            data-media-src="<?= $path_file; ?>">
                        <i class="fas fa-eye"></i>
                    </button>

                    <a href="edit_galeri.php?id=<?= $d['id']; ?>" class="action-btn edit-btn" title="Ubah Data">
                        <i class="fas fa-pen"></i>
                    </a>

                    <a href="hapus_galeri.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus galeri ini?')" class="action-btn delete-btn" title="Hapus Data">
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
                <i class="fas fa-images" style="font-size: 32px; display: block; margin-bottom: 12px; color: #9ca3af;"></i>
                Tidak ada dokumentasi galeri yang cocok dengan pencarian Anda.
            </div>
        <?php endif; ?>

    </div>

</div>

<div id="mediaModal" class="media-modal">
    <span class="close-modal">&times;</span>
    <div id="modalContentWrapper"></div>
</div>

<script>
// Validasi ukuran berkas di sisi browser user sebelum diunggah
document.getElementById('file-galeri').addEventListener('change', function() {
    const max_size = 20 * 1024 * 1024; 
    
    if (this.files && this.files[0]) {
        const file_size = this.files[0].size;
        
        if (file_size > max_size) {
            alert('Ukuran file terlalu besar! Silakan pilih video/gambar yang berukuran kurang dari 20MB.');
            this.value = ''; 
        }
    }
});

/* ==========================================
   PERBAIKAN: JAVASCRIPT UNTUK MENANGANI LIGHTBOX / MODAL
========================================== */
const modal = document.getElementById("mediaModal");
const closeBtn = document.getElementsByClassName("close-modal")[0];
const wrapper = document.getElementById("modalContentWrapper");
const mediaButtons = document.querySelectorAll('.trigger-modal');

// Fungsi untuk membuka Modal dan memutar video jika ada
function openModal(btn) {
    const mediaType = btn.dataset.mediaType;
    const mediaSrc = btn.dataset.mediaSrc;

    // Bersihkan konten modal sebelumnya
    wrapper.innerHTML = "";

    if (mediaType === 'video') {
        // Buat tag Video HTML5 dengan kontrol penuh dan autoplay
        const videoElement = document.createElement('video');
        videoElement.src = mediaSrc;
        videoElement.className = "modal-content";
        videoElement.controls = true;
        videoElement.autoplay = true; 
        videoElement.style.objectFit = "contain";
        videoElement.id = "activeModalMedia";
        wrapper.appendChild(videoElement);
    } else {
        // Buat tag Gambar biasa
        const imgElement = document.createElement('img');
        imgElement.src = mediaSrc;
        imgElement.className = "modal-content";
        imgElement.id = "activeModalMedia";
        wrapper.appendChild(imgElement);
    }

    modal.classList.add("open");
}

// Fungsi menutup Modal dan Menghentikan Video agar suara mati
function closeModal() {
    const activeMedia = document.getElementById("activeModalMedia");
    if (activeMedia && activeMedia.tagName === 'VIDEO') {
        activeMedia.pause(); // Hentikan pemutaran video
        activeMedia.src = ""; // Bersihkan sumber agar tidak terus loading
    }
    modal.classList.remove("open");
}

// Tambahkan event listener ke semua tombol "Perbesar Media"
mediaButtons.forEach(btn => {
    btn.addEventListener('click', () => openModal(btn));
});

// Tutup modal saat tombol (X) diklik
closeBtn.addEventListener('click', closeModal);

// Tutup modal saat user klik di luar kotak media (area hitam)
modal.addEventListener('click', (event) => {
    if (event.target === modal) {
        closeModal();
    }
});

// Tutup modal saat user menekan tombol ESC di keyboard
document.addEventListener('keydown', (event) => {
    if (event.key === "Escape" && modal.classList.contains("open")) {
        closeModal();
    }
});
</script>
</body>
</html>
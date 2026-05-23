<?php
session_start();

// Proteksi halaman admin (pastikan user sudah login)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM fasilitas ORDER BY id DESC");
?>

<style>
/* Kontainer bagian dalam isi konten - Menempel pas di bawah topbar */
.content-body {
    padding: 30px 40px;
    background: #f4f6f9;
    box-sizing: border-box;
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
    font-size: 32px;
    color: #111827;
    margin: 0 0 5px 0;
    font-weight: 700;
}

.page-title p {
    font-size: 14px;
    color: #6b7280;
    margin: 0;
}

.btn-add {
    height: 48px;
    padding: 0 22px;
    border-radius: 14px;
    background: linear-gradient(135deg, #16a34a, #15803d);
    display: flex;
    align-items: center;
    gap: 10px;
    color: white;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
}

.grid-fasilitas {
    display: grid;
    /* Membuat grid fleksibel memenuhi 100% ruang kosong di kanan */
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 25px;
    width: 100%;
}

.card-fasilitas {
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    transition: 0.3s;
    display: flex;
    flex-direction: column;
}

.card-fasilitas:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
}

.card-image {
    height: 220px;
    overflow: hidden;
    background: #e5e7eb;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.icon-box {
    width: 55px;
    height: 55px;
    border-radius: 16px;
    background: #dcfce7;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 18px;
    font-size: 22px;
    color: #16a34a;
}

.meta-tags {
    display: flex;
    gap: 8px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.card-body h3 {
    font-size: 22px;
    margin: 0 0 10px 0;
    color: #111827;
    font-weight: 700;
}

.card-body p {
    font-size: 14px;
    line-height: 1.7;
    color: #64748b;
    margin: 0 0 20px 0;
    flex-grow: 1; /* Mendorong tombol aksi agar sejajar di paling bawah */
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
    margin-top: auto;
}

.action-btn {
    flex: 1;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 14px;
    transition: 0.2s;
}

.edit-btn {
    background: #eff6ff;
    color: #2563eb;
}

.edit-btn:hover {
    background: #dbeafe;
}

.delete-btn {
    background: #fef2f2;
    color: #dc2626;
}

.delete-btn:hover {
    background: #fee2e2;
}

/* --- RESPONSIVE MOBILE VIEW --- */
@media (max-width: 992px) {
    .content-body {
        padding: 20px 15px;
    }
    
    .page-title h1 {
        font-size: 26px;
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
                        <span class="badge badge-kategori">
                            <?= htmlspecialchars($d['kategori']); ?>
                        </span>
                        
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

</div> 
</body>
</html>
<?php
include '../layout/admin_header.php';
include '../config/koneksi.php';

$data = mysqli_query($conn,"SELECT * FROM hero_slider ORDER BY id DESC");
?>

<style>
/* =========================
   GLOBAL STYLES - FIX POSITION
========================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Hapus duplikasi main-content yang bentrok */
.main-content {
    margin-left: 0;
    padding: 20px 30px 30px 30px;
    background: #f4f6f9;
    min-height: 100vh;
    width: 100%;
}

/* =========================
   PAGE HEADER - FULL WIDTH MENTOK
========================= */

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 30px;
    flex-wrap: wrap;
    background: white;
    padding: 20px 25px;
    border-radius: 16px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    width: 100%;
}

.page-title h1 {
    font-size: 24px;
    font-weight: 700;
    background: linear-gradient(135deg, #16a34a, #15803d);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 5px;
}

.page-title p {
    font-size: 13px;
    color: #6b7280;
}

.btn-add {
    background: linear-gradient(135deg, #16a34a, #15803d);
    padding: 10px 22px;
    border-radius: 10px;
    text-decoration: none;
    color: white;
    font-size: 13px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s;
    box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
    border: none;
    cursor: pointer;
}

.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(22, 163, 74, 0.3);
}

/* =========================
   HERO GRID
========================= */

.hero-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
    gap: 25px;
    width: 100%;
}

/* =========================
   HERO CARD
========================= */

.hero-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    border: 1px solid #eef2f6;
}

.hero-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.hero-image {
    position: relative;
    height: 200px;
    overflow: hidden;
    background: #f0fdf4;
}

.hero-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.hero-card:hover .hero-image img {
    transform: scale(1.03);
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2), transparent);
    display: flex;
    align-items: flex-end;
    padding: 20px;
}

.hero-overlay h2 {
    color: white;
    font-size: 18px;
    font-weight: 700;
    line-height: 1.3;
    text-shadow: 0 1px 3px rgba(0,0,0,0.3);
    margin: 0;
}

/* =========================
   BADGE
========================= */

.badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 15px;
}

.badge i {
    font-size: 10px;
}

.badge-active {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #86efac;
}

.badge-draft {
    background: #fef3c7;
    color: #92400e;
    border: 1px solid #fcd34d;
}

/* =========================
   HERO CONTENT
========================= */

.hero-content {
    padding: 20px;
}

/* =========================
   INFO BOX
========================= */

.hero-info {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    margin-bottom: 20px;
}

.info-box {
    background: #f8fafc;
    padding: 10px 12px;
    border-radius: 12px;
    border: 1px solid #eef2f6;
    transition: all 0.2s;
}

.info-box:hover {
    background: white;
    border-color: #cbd5e1;
}

.info-box h4 {
    font-size: 10px;
    color: #6b7280;
    margin-bottom: 5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.info-box h4 i {
    font-size: 9px;
}

.info-box p {
    font-size: 13px;
    font-weight: 500;
    color: #111827;
    margin: 0;
    line-height: 1.4;
    word-break: break-word;
}

/* =========================
   ACTION BUTTON
========================= */

.action-group {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.action-btn {
    flex: 1;
    height: 38px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    transition: all 0.2s;
    border: none;
    cursor: pointer;
}

.edit-btn {
    background: #eff6ff;
    color: #2563eb;
    border: 1px solid #bfdbfe;
}

.edit-btn:hover {
    background: #dbeafe;
    transform: translateY(-1px);
}

.delete-btn {
    background: #fef2f2;
    color: #dc2626;
    border: 1px solid #fecaca;
}

.delete-btn:hover {
    background: #fee2e2;
    transform: translateY(-1px);
}

/* =========================
   EMPTY DATA (CENTERED PERFECT)
========================= */

.empty-data {
    background: white;
    padding: 60px 40px;
    border-radius: 24px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    max-width: 500px;
    margin: 40px auto;
    border: 1px solid #eef2f6;
}

.empty-data i {
    font-size: 60px;
    background: linear-gradient(135deg, #16a34a, #15803d);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 15px;
    display: inline-block;
}

.empty-data h2 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #111827;
    font-weight: 700;
}

.empty-data p {
    font-size: 13px;
    color: #6b7280;
    margin-bottom: 25px;
    line-height: 1.5;
}

.empty-data .btn-add {
    justify-content: center;
    max-width: 180px;
    margin: 0 auto;
    display: inline-flex;
}

/* =========================
   RESPONSIVE
========================= */

@media (max-width: 1200px) {
    .main-content {
        padding: 20px 20px 30px 20px;
    }
    
    .hero-grid {
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .main-content {
        padding: 15px;
    }
    
    .page-header {
        flex-direction: column;
        align-items: stretch;
        gap: 15px;
        padding: 15px 20px;
    }
    
    .page-title h1 {
        font-size: 20px;
    }
    
    .page-title p {
        font-size: 12px;
    }
    
    .btn-add {
        justify-content: center;
    }
    
    .hero-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .hero-image {
        height: 180px;
    }
    
    .hero-overlay h2 {
        font-size: 16px;
    }
    
    .hero-info {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .action-group {
        flex-direction: column;
    }
    
    .action-btn {
        width: 100%;
    }
    
    .empty-data {
        padding: 40px 25px;
        margin: 20px;
    }
    
    .empty-data i {
        font-size: 50px;
    }
    
    .empty-data h2 {
        font-size: 18px;
    }
}

@media (min-width: 1400px) {
    .main-content {
        max-width: 1400px;
        margin: 0 auto;
        width: 100%;
    }
    
    .hero-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.hero-card {
    animation: fadeInUp 0.4s ease-out;
    animation-fill-mode: both;
}

.hero-card:nth-child(1) { animation-delay: 0.05s; }
.hero-card:nth-child(2) { animation-delay: 0.1s; }
.hero-card:nth-child(3) { animation-delay: 0.15s; }
.hero-card:nth-child(4) { animation-delay: 0.2s; }
</style>

<div class="main-content">

    <div class="page-header">
        <div class="page-title">
            <h1>Slider Beranda</h1>
            <p>Kelola gambar dan informasi hero banner utama website.</p>
        </div>
        <a href="tambah_hero.php" class="btn-add">
            <i class="fas fa-plus"></i> Tambah Slider
        </a>
    </div>

    <?php if(mysqli_num_rows($data) > 0) : ?>

    <div class="hero-grid">

        <?php while($d = mysqli_fetch_assoc($data)) : ?>

        <div class="hero-card">

            <div class="hero-image">
                <img src="../assets/hero/<?= $d['gambar']; ?>" alt="<?= $d['judul']; ?>">
                <div class="hero-overlay">
                    <h2><?= htmlspecialchars($d['judul']); ?></h2>
                </div>
            </div>

            <div class="hero-content">

                <?php if($d['status'] == 'aktif') : ?>
                    <span class="badge badge-active">
                        <i class="fas fa-check-circle"></i> Aktif
                    </span>
                <?php else : ?>
                    <span class="badge badge-draft">
                        <i class="fas fa-clock"></i> Draft
                    </span>
                <?php endif; ?>

                <div class="action-group">
                    <a href="edit_hero.php?id=<?= $d['id']; ?>" 
                       class="action-btn edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="hapus_hero.php?id=<?= $d['id']; ?>" 
                       onclick="return confirm('Yakin ingin menghapus hero ini?')"
                       class="action-btn delete-btn">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </a>
                </div>

            </div>

        </div>

        <?php endwhile; ?>

    </div>

    <?php else : ?>

    <div class="empty-data">
        <i class="fas fa-images"></i>
        <h2>Belum Ada Hero Slider</h2>
        <p>Silahkan tambahkan hero slider pertama untuk website MI Al Karomah.</p>
        <a href="tambah_hero.php" class="btn-add">
            <i class="fas fa-plus"></i> Tambah Hero
        </a>
    </div>

    <?php endif; ?>

</div>

<?php
// Tidak perlu tutup body dan html karena sudah ada di admin_footer
?>
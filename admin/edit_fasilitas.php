<?php
session_start();

// Proteksi halaman admin (pastikan user sudah login)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

// Ambil ID dari URL dan amankan
$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = mysqli_query($conn, "SELECT * FROM fasilitas WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan, kembalikan ke halaman utama
if (!$data) {
    echo "
    <script>
        alert('Data fasilitas tidak ditemukan');
        window.location='fasilitas.php';
    </script>
    ";
    exit;
}

if (isset($_POST['submit'])) {
    $nama      = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori  = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $icon      = mysqli_real_escape_string($conn, $_POST['icon']);
    $status    = mysqli_real_escape_string($conn, $_POST['status']);

    // Membuat ulang slug jika nama fasilitas diubah
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nama)));

    if ($_FILES['gambar']['name'] != '') {
        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "../upload/fasilitas/" . $gambar);

        // Opsional: Hapus gambar lama jika ada
        if (!empty($data['gambar']) && file_exists("../upload/fasilitas/" . $data['gambar'])) {
            unlink("../upload/fasilitas/" . $data['gambar']);
        }

        mysqli_query($conn, "UPDATE fasilitas SET
            nama='$nama',
            slug='$slug',
            kategori='$kategori',
            deskripsi='$deskripsi',
            gambar='$gambar',
            icon='$icon',
            status='$status'
            WHERE id='$id'
        ");
    } else {
        mysqli_query($conn, "UPDATE fasilitas SET
            nama='$nama',
            slug='$slug',
            kategori='$kategori',
            deskripsi='$deskripsi',
            icon='$icon',
            status='$status'
            WHERE id='$id'
        ");
    }

    echo "
    <script>
        alert('Fasilitas berhasil diupdate');
        window.location='fasilitas.php';
    </script>
    ";
}
?>

<style>
/* Kontainer bagian dalam isi konten - Menempel pas di bawah topbar */
.content-body {
    padding: 30px 40px;
    background: #f4f6f9;
    box-sizing: border-box;
}

.page-title {
    margin-bottom: 25px;
}

.page-title h1 {
    font-size: 32px;
    font-weight: 700;
    color: #111827;
    margin: 0 0 5px 0;
}

.page-title p {
    font-size: 14px;
    color: #6b7280;
    margin: 0;
}

.form-card {
    background: white;
    padding: 35px;
    border-radius: 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    /* FIX: Mengisi area kanan secara penuh */
    width: 100%;
    box-sizing: border-box;
}

.form-group {
    margin-bottom: 22px;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    font-size: 14px;
    color: #111827;
}

.form-control {
    width: 100%;
    height: 55px;
    border: 1px solid #d1d5db;
    border-radius: 14px;
    padding: 0 18px;
    font-size: 14px;
    outline: none;
    transition: 0.3s;
    box-sizing: border-box;
}

.form-control:focus {
    border-color: #16a34a;
    box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.1);
}

select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><polyline points='6 9 12 15 18 9'></polyline></svg>");
    background-repeat: no-repeat;
    background-position: right 18px center;
    background-size: 16px;
}

textarea.form-control {
    height: 180px;
    padding: 18px;
    resize: vertical;
}

input[type="file"].form-control {
    padding-top: 14px;
}

.img-preview-container {
    margin-top: 12px;
}

.img-preview {
    max-width: 220px;
    height: 140px;
    object-fit: cover;
    border-radius: 12px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.btn-group-action {
    display: flex;
    gap: 12px;
    margin-top: 30px;
}

.btn-submit {
    height: 55px;
    padding: 0 35px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(135deg, #16a34a, #15803d);
    color: white;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
}

.btn-cancel {
    height: 55px;
    padding: 0 25px;
    border: 1px solid #d1d5db;
    border-radius: 14px;
    background: white;
    color: #4b5563;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
}

.btn-cancel:hover {
    background: #f9fafb;
    color: #111827;
}

/* --- RESPONSIVE MOBILE VIEW --- */
@media (max-width: 992px) {
    .content-body {
        padding: 20px 15px;
    }

    .form-card {
        padding: 20px;
        border-radius: 16px;
    }

    .form-control {
        height: 50px;
        border-radius: 10px;
    }
}
</style>

<div class="content-body">
    <div class="form-card">
        
        <div class="page-title">
            <h1>Edit Fasilitas</h1>
            <p>Perbarui rincian data fasilitas MI Al Karomah</p>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Nama Fasilitas</label>
                <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']); ?>" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?= htmlspecialchars($data['kategori']); ?>" required>
            </div>

            <div class="form-group">
                <label>Icon Fontawesome</label>
                <input type="text" name="icon" placeholder="contoh: fas fa-school" class="form-control" value="<?= htmlspecialchars($data['icon']); ?>">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"><?= htmlspecialchars($data['deskripsi']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Upload Gambar Baru (Biarkan kosong jika tidak diganti)</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <?php if (!empty($data['gambar'])): ?>
                    <div class="img-preview-container">
                        <small style="color: #64748b; display: block; margin-bottom: 5px;">Gambar saat ini:</small>
                        <img src="../upload/fasilitas/<?= $data['gambar']; ?>" class="img-preview" alt="Gambar Lama">
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif" <?= $data['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                    <option value="nonaktif" <?= $data['status'] == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                </select>
            </div>

            <div class="btn-group-action">
                <button type="submit" name="submit" class="btn-submit">
                    <i class="fas fa-save" style="margin-right: 8px;"></i> Update Fasilitas
                </button>
                <a href="fasilitas.php" class="btn-cancel">Batal</a>
            </div>

        </form>
    </div>
</div>

</div> 
</body>
</html>
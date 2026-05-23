<?php
session_start();

// Proteksi halaman admin (pastikan user sudah login)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

// Validasi parameter ID dari URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: kegiatan.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

// Ambil data kegiatan lama untuk ditampilkan di form dan pengecekan gambar lama
$query = mysqli_query($conn, "SELECT * FROM kegiatan WHERE id = '$id'");
$data  = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan di database, kembalikan ke halaman utama
if (!$data) {
    header("Location: kegiatan.php");
    exit;
}

if (isset($_POST['submit'])) {

    $judul     = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori  = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $isi       = mysqli_real_escape_string($conn, $_POST['isi']);
    $tanggal   = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $status    = mysqli_real_escape_string($conn, $_POST['status']);

    // Membuat Slug otomatis dari Judul baru
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // Jika admin mengunggah gambar baru
    if ($_FILES['gambar']['name'] != '') {

        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];
        
        // Generate nama file unik agar tidak menimpa file lain
        $ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);
        $nama_gambar_baru = time() . '_' . uniqid() . '.' . $ekstensi;

        // Upload gambar baru ke folder
        move_uploaded_file($tmp, "../assets/kegiatan/" . $nama_gambar_baru);

        // Hapus file gambar lama secara fisik dari server jika filenya ada
        if (!empty($data['gambar']) && file_exists("../upload/kegiatan/" . $data['gambar'])) {
            unlink("../assets/kegiatan/" . $data['gambar']);
        }

        // Query update beserta perubahan gambar
        $sql_update = "UPDATE kegiatan SET 
                        judul     = '$judul',
                        slug      = '$slug',
                        kategori  = '$kategori',
                        deskripsi = '$deskripsi',
                        isi       = '$isi',
                        gambar    = '$nama_gambar_baru',
                        tanggal   = '$tanggal',
                        status    = '$status'
                       WHERE id = '$id'";

    } else {
        // Query update tanpa mengubah gambar lama
        $sql_update = "UPDATE kegiatan SET 
                        judul     = '$judul',
                        slug      = '$slug',
                        kategori  = '$kategori',
                        deskripsi = '$deskripsi',
                        isi       = '$isi',
                        tanggal   = '$tanggal',
                        status    = '$status'
                       WHERE id = '$id'";
    }

    $update = mysqli_query($conn, $sql_update);

    if ($update) {
        echo "
        <script>
            alert('Kegiatan berhasil diupdate');
            window.location='kegiatan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Gagal mengupdate kegiatan: " . mysqli_error($conn) . "');
        </script>
        ";
    }
}
?>

<style>
/* Kontainer utama konten - Presisi & Menempel Pas di Bawah Topbar */
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
    /* FIX: Mengisi area kosong sebelah kanan secara penuh */
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
    color: #374151;
}

.form-control {
    width: 100%;
    height: 55px;
    border: 1px solid #d1d5db;
    border-radius: 14px;
    padding: 0 18px;
    outline: none;
    font-size: 14px;
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
    height: 120px;
    padding: 18px;
    resize: vertical;
}

input[type="file"].form-control {
    padding-top: 14px;
}

.preview-container {
    margin-top: 12px;
}

.preview-label {
    font-size: 12px;
    color: #6b7280;
    display: block;
    margin-bottom: 5px;
}

.preview {
    max-width: 280px;
    height: 160px;
    border-radius: 14px;
    border: 1px solid #e5e7eb;
    object-fit: cover;
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
    font-weight: 600;
    font-size: 15px;
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
@media(max-width: 992px) {
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
            <h1>Edit Data Kegiatan</h1>
            <p>Perbarui detail informasi atau artikel kegiatan MI Al Karomah</p>
        </div>

        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="judul">Judul Kegiatan</label>
                <input type="text" id="judul" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']); ?>" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="form-control" value="<?= htmlspecialchars($data['kategori']); ?>" required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal Pelaksanaan</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $data['tanggal']; ?>" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Singkat (Ringkasan)</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" required><?= htmlspecialchars($data['deskripsi']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="isi">Isi Lengkap Kegiatan</label>
                <textarea id="isi" name="isi" class="form-control" style="height: 250px;" required><?= htmlspecialchars($data['isi']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Upload Gambar Sampul Baru (Biarkan kosong jika tidak diubah)</label>
                <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
                
                <?php if(!empty($data['gambar'])): ?>
                    <div class="preview-container">
                        <span class="preview-label">Gambar Aktif Saat Ini:</span>
                        <img src="../assets/kegiatan/<?= $data['gambar']; ?>" class="preview" onerror="this.src='../upload/default.jpg'">
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="status">Status Penerbitan</label>
                <select id="status" name="status" class="form-control">
                    <option value="publish" <?= $data['status'] == 'publish' ? 'selected' : ''; ?>>Publish (Tampilkan)</option>
                    <option value="draft" <?= $data['status'] == 'draft' ? 'selected' : ''; ?>>Draft (Simpan Internal)</option>
                </select>
            </div>

            <div class="btn-group-action">
                <button type="submit" name="submit" class="btn-submit">
                    <i class="fas fa-sync-alt" style="margin-right: 8px;"></i> Update Kegiatan
                </button>
                <a href="kegiatan.php" class="btn-cancel">Batal</a>
            </div>

        </form>
    </div>
</div>

</div> 
</body>
</html>
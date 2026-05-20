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
        move_uploaded_file($tmp, "../upload/kegiatan/" . $nama_gambar_baru);

        // Hapus file gambar lama secara fisik dari server jika filenya ada
        if (!empty($data['gambar']) && file_exists("../upload/kegiatan/" . $data['gambar'])) {
            unlink("../upload/kegiatan/" . $data['gambar']);
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
    * {
        box-sizing: border-box;
    }

    .content-body {
        margin-left: 260px;
        padding: 95px 25px 25px;
        background: #f4f6f9;
        min-height: 100vh;
    }

    .form-card {
        background: white;
        padding: 30px;
        border-radius: 24px;
        max-width: 1000px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .form-group {
        margin-bottom: 20px;
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
        height: 52px;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 0 18px;
        outline: none;
        font-size: 14px;
        transition: border-color 0.2s;
    }

    .form-control:focus {
        border-color: #16a34a;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><polyline points='6 9 12 15 18 9'></polyline></svg>");
        background-repeat: no-repeat;
        background-position: right 18px center;
        background-size: 16px;
    }

    textarea.form-control {
        height: 140px;
        padding: 18px;
        resize: vertical;
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
        width: 250px;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        object-fit: cover;
    }

    .btn-submit {
        height: 52px;
        padding: 0 32px;
        border: none;
        border-radius: 14px;
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: white;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: opacity 0.2s;
    }

    .btn-submit:hover {
        opacity: 0.9;
    }

    @media(max-width: 991px) {
        .content-body {
            margin-left: 0;
            padding: 90px 20px 20px;
        }
    }
</style>

<div class="content-body">
    <div class="form-card">
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']); ?>" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="form-control" value="<?= htmlspecialchars($data['kategori']); ?>" required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $data['tanggal']; ?>" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Singkat</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" required><?= htmlspecialchars($data['deskripsi']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="isi">Isi Kegiatan</label>
                <textarea id="isi" name="isi" class="form-control" style="height: 250px;" required><?= htmlspecialchars($data['isi']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Upload Gambar Baru (Kosongkan jika tidak ingin diubah)</label>
                <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*" style="padding-top: 13px;">
                
                <?php if(!empty($data['gambar'])): ?>
                    <div class="preview-container">
                        <span class="preview-label">Gambar Saat Ini:</span>
                        <img src="../upload/kegiatan/<?= $data['gambar']; ?>" class="preview" onerror="this.src='../upload/default.jpg'">
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="publish" <?= $data['status'] == 'publish' ? 'selected' : ''; ?>>Publish</option>
                    <option value="draft" <?= $data['status'] == 'draft' ? 'selected' : ''; ?>>Draft</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn-submit">
                <i class="fas fa-sync-alt" style="margin-right: 8px;"></i> Update Kegiatan
            </button>

        </form>
    </div>
</div>
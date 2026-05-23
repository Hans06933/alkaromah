<?php
session_start();

// Proteksi halaman admin (pastikan user sudah login)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

// Pastikan ada ID yang dilempar di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: berita.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

// Ambil data lama berita untuk ditampilkan di form
$query_berita = mysqli_query($conn, "SELECT * FROM berita WHERE id = '$id'");
$b = mysqli_fetch_assoc($query_berita);

// Jika data tidak ditemukan, kembalikan ke halaman utama
if (!$b) {
    header("Location: berita.php");
    exit;
}

// Proses form sewaktu tombol update ditekan
if (isset($_POST['update'])) {
    $judul     = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori  = mysqli_real_escape_string($conn, $_POST['kategori']);
    $penulis   = mysqli_real_escape_string($conn, $_POST['penulis']);
    $isi       = mysqli_real_escape_string($conn, $_POST['isi']);
    $status    = mysqli_real_escape_string($conn, $_POST['status']);

    // Regenerate slug baru seandainya judul berita diubah
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    $thumbnail = $_FILES['thumbnail']['name'];
    $tmp       = $_FILES['thumbnail']['tmp_name'];
    $error     = $_FILES['thumbnail']['error'];

    // Jika user mengunggah thumbnail baru
    if ($error === 0) {
        $ekstensi = pathinfo($thumbnail, PATHINFO_EXTENSION);
        $nama_thumbnail_baru = time() . '_' . uniqid() . '.' . $ekstensi;

        // Pindahkan file baru ke server
        if (move_uploaded_file($tmp, "../assets/berita/" . $nama_thumbnail_baru)) {
            // Hapus berkas lama dari server jika bukan gambar default
            if (!empty($b['thumbnail']) && $b['thumbnail'] != 'default.jpg' && file_exists("../assets/berita/" . $b['thumbnail'])) {
                unlink("../assets/berita/" . $b['thumbnail']);
            }
            $thumbnail_query_part = ", thumbnail = '$nama_thumbnail_baru'";
        } else {
            $thumbnail_query_part = "";
        }
    } else {
        // Jika tidak upload gambar baru, tetap gunakan nama file yang lama
        $thumbnail_query_part = "";
    }

    // Jalankan query update data berita
    $query_update = "UPDATE berita SET 
                     judul = '$judul', 
                     slug = '$slug', 
                     kategori = '$kategori', 
                     penulis = '$penulis', 
                     isi = '$isi', 
                     status = '$status' 
                     $thumbnail_query_part 
                     WHERE id = '$id'";

    $eksekusi = mysqli_query($conn, $query_update);

    if ($eksekusi) {
        echo "
        <script>
            alert('Berita berhasil diperbarui!');
            window.location='berita.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Gagal memperbarui berita: " . mysqli_error($conn) . "');
        </script>
        ";
    }
}
?>

<style>
/* Kontainer bagian dalam isi konten - Menempel pas di bawah topbar tanpa bentrok */
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
    color: #111827;
    margin: 0 0 5px 0;
    font-weight: 700;
}

.page-title p {
    color: #6b7280;
    font-size: 14px;
    margin: 0;
}

.form-card {
    background: white;
    padding: 35px;
    border-radius: 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    /* Mengisi area kanan secara penuh */
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
    height: 250px;
    padding: 18px;
    resize: vertical;
}

.old-thumb-preview {
    margin-top: 10px;
    display: block;
}

.old-thumb-preview img {
    width: 160px;
    height: 100px;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
}

.btn-group-action {
    display: flex;
    gap: 12px;
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

    <div class="page-title">
        <h1>Edit Berita</h1>
        <p>Ubah dan perbarui artikel atau publikasi informasi MI Al Karomah</p>
    </div>

    <div class="form-card">
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" id="judul" name="judul" class="form-control" value="<?= htmlspecialchars($b['judul']); ?>" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="form-control" value="<?= htmlspecialchars($b['kategori']); ?>" required>
            </div>

            <div class="form-group">
                <label for="penulis">Penulis / Kontributor</label>
                <input type="text" id="penulis" name="penulis" class="form-control" value="<?= htmlspecialchars($b['penulis']); ?>" required>
            </div>

            <div class="form-group">
                <label for="isi">Isi Berita Lengkap</label>
                <textarea id="isi" name="isi" class="form-control" required><?= htmlspecialchars($b['isi']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="thumbnail">Ganti Berkas Gambar Thumbnail (Format: JPG, PNG)</label>
                <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*" style="padding-top: 13px;">
                
                <div class="old-thumb-preview">
                    <small style="color: #64748b; display:block; margin-bottom: 5px;">Thumbnail saat ini:</small>
                    <img src="../assets/berita/<?= !empty($b['thumbnail']) ? $b['thumbnail'] : 'default.jpg'; ?>" onerror="this.src='../assets/berita/default.jpg'" alt="Lama">
                </div>
            </div>

            <div class="form-group">
                <label for="status">Status Publikasi</label>
                <select id="status" name="status" class="form-control">
                    <option value="publish" <?= ($b['status'] == 'publish') ? 'selected' : ''; ?>>Publish (Tampilkan di Web)</option>
                    <option value="draft" <?= ($b['status'] == 'draft') ? 'selected' : ''; ?>>Draft (Simpan di Arsip)</option>
                </select>
            </div>

            <div class="btn-group-action">
                <button type="submit" name="update" class="btn-submit">
                    <i class="fas fa-save" style="margin-right: 8px;"></i> Perbarui Berita
                </button>
                <a href="berita.php" class="btn-cancel">Batal</a>
            </div>

        </form>
    </div>
</div>

</div> 
</body>
</html>
<?php
session_start();

// Proteksi halaman admin (pastikan user sudah login)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

// Pastikan ada ID yang dikirim melalui URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: galeri.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

// Ambil data lama galeri berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM galeri WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan di database
if (!$data) {
    echo "
    <script>
        alert('Data galeri tidak ditemukan');
        window.location='galeri.php';
    </script>
    ";
    exit;
}

// Proses ketika tombol submit/update ditekan
if (isset($_POST['submit'])) {
    $judul      = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori   = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $status     = mysqli_real_escape_string($conn, $_POST['status']);

    // Jika user mengunggah foto/gambar baru
    if ($_FILES['foto']['name'] != '') {
        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];

        // Menghindari duplikasi nama file dengan timestamp
        $ekstensi = pathinfo($foto, PATHINFO_EXTENSION);
        $nama_foto_baru = time() . '_' . uniqid() . '.' . $ekstensi;

        // Pindahkan file ke folder assets atau upload galeri (sesuaikan path folder Anda)
        move_uploaded_file($tmp, "../assets/galeri/" . $nama_foto_baru);

        // Hapus file foto lama dari server jika filenya ada
        if (!empty($data['foto']) && file_exists("../assets/galeri/" . $data['foto'])) {
            unlink("../assets/galeri/" . $data['foto']);
        }

        // Query update dengan foto baru
        mysqli_query($conn, "UPDATE galeri SET
            judul='$judul',
            kategori='$kategori',
            deskripsi='$deskripsi',
            foto='$nama_foto_baru',
            status='$status'
            WHERE id='$id'
        ");
    } else {
        // Query update tanpa mengganti foto lama
        mysqli_query($conn, "UPDATE galeri SET
            judul='$judul',
            kategori='$kategori',
            deskripsi='$deskripsi',
            status='$status'
            WHERE id='$id'
        ");
    }

    echo "
    <script>
        alert('Data galeri berhasil diperbarui!');
        window.location='galeri.php';
    </script>
    ";
}
?>

<style>
/* Kontainer utama bagian dalam konten - Presisi & Menempel Pas */
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
    /* Mengisi area kosong sebelah kanan secara penuh */
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
    height: 140px;
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
    max-width: 250px;
    height: 160px;
    object-fit: cover;
    border-radius: 14px;
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

/* --- RESPONSIVE UNTUK SMARTPHONE --- */
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
            <h1>Edit Foto Galeri</h1>
            <p>Perbarui dokumentasi kegiatan, dokumentasi foto, atau album MI Al Karomah</p>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="judul">Judul / Nama Kegiatan</label>
                <input type="text" id="judul" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']); ?>" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori Kegiatan</label>
                <select id="kategori" name="kategori" class="form-control" required>
                    <option value="Kegiatan Sekolah" <?= $data['kategori'] == 'Kegiatan Sekolah' ? 'selected' : ''; ?>>Kegiatan Sekolah</option>
                    <option value="Fasilitas" <?= $data['kategori'] == 'Fasilitas' ? 'selected' : ''; ?>>Fasilitas / Lingkungan</option>
                    <option value="Prestasi" <?= $data['kategori'] == 'Prestasi' ? 'selected' : ''; ?>>Prestasi Siswa / Guru</option>
                    <option value="Keagamaan" <?= $data['kategori'] == 'Keagamaan' ? 'selected' : ''; ?>>Kegiatan Keagamaan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi">Keterangan / Deskripsi Singkat Foto</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Tulis rincian singkat mengenai foto ini..."><?= htmlspecialchars($data['deskripsi']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Ganti Berkas Foto Kegiatan (Biarkan kosong jika tidak diganti)</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
                <?php if (!empty($data['foto'])): ?>
                    <div class="img-preview-container">
                        <small style="color: #64748b; display: block; margin-bottom: 5px;">Foto aktif saat ini:</small>
                        <img src="../assets/galeri/<?= $data['foto']; ?>" class="img-preview" onerror="this.src='../assets/galeri/default.jpg'" alt="Foto Galeri Lama">
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="status">Status Tampilan</label>
                <select id="status" name="status" class="form-control">
                    <option value="aktif" <?= $data['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif (Tampilkan di Galeri)</option>
                    <option value="nonaktif" <?= $data['status'] == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif (Sembunyikan)</option>
                </select>
            </div>

            <div class="btn-group-action">
                <button type="submit" name="submit" class="btn-submit">
                    <i class="fas fa-save" style="margin-right: 8px;"></i> Perbarui Galeri
                </button>
                <a href="galeri.php" class="btn-cancel">Batal</a>
            </div>

        </form>
    </div>
</div>

</div> 
</body>
</html>
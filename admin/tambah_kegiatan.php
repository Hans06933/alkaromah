<?php
session_start();

// Proteksi halaman admin (pastikan user sudah login)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

if (isset($_POST['submit'])) {

    $judul     = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori  = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $isi       = mysqli_real_escape_string($conn, $_POST['isi']);
    $tanggal   = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $status    = mysqli_real_escape_string($conn, $_POST['status']);

    // Membuat Slug otomatis dari Judul
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));

    // Pengelolaan File Gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];
    $error  = $_FILES['gambar']['error'];

    $nama_gambar_baru = '';

    if ($error === 0) {
        // Ambil ekstensi asli file gambar
        $ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);
        
        // Generate nama file acak baru untuk menghindari file tertimpa di server
        $nama_gambar_baru = time() . '_' . uniqid() . '.' . $ekstensi;
        
        // Pindahkan file ke folder tujuan
        move_uploaded_file($tmp, "../assets/kegiatan/" . $nama_gambar_baru);
    }

    // Eksekusi Query menggunakan Nama Gambar yang Baru / Acak
    $query = "INSERT INTO kegiatan (id, judul, slug, kategori, deskripsi, isi, gambar, tanggal, status, created_at) 
              VALUES (NULL, '$judul', '$slug', '$kategori', '$deskripsi', '$isi', '$nama_gambar_baru', '$tanggal', '$status', NOW())";
              
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        echo "
        <script>
            alert('Kegiatan berhasil ditambahkan');
            window.location='kegiatan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Gagal menambahkan kegiatan: " . mysqli_error($conn) . "');
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
    /* FIX: Mengisi area kosong dengan width 100% */
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
    height: 140px;
    padding: 18px;
    resize: vertical;
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
        <h1>Tambah Agenda / Kegiatan</h1>
        <p>Tambahkan agenda kegiatan sekolah terbaru MI Al Karomah</p>
    </div>

    <div class="form-card">
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="judul">Judul Kegiatan</label>
                <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukkan judul kegiatan..." required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Contoh: Akademik, Pramuka, Keagamaan..." required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal Pelaksanaan</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Singkat (Untuk Preview di Card Front-End)</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Tulis rangkuman singkat kegiatan..." required></textarea>
            </div>

            <div class="form-group">
                <label for="isi">Isi Lengkap Kegiatan</label>
                <textarea id="isi" name="isi" class="form-control" style="height: 250px;" placeholder="Tulis berita lengkap detail jalannya kegiatan..." required></textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Upload Gambar Utama</label>
                <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*" style="padding-top: 13px;" required>
            </div>

            <div class="form-group">
                <label for="status">Status Publikasi</label>
                <select id="status" name="status" class="form-control">
                    <option value="publish">Publish (Langsung Tampil di Web)</option>
                    <option value="draft">Draft (Simpan sebagai Arsip Luar)</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn-submit">
                <i class="fas fa-save" style="margin-right: 8px;"></i> Simpan Kegiatan
            </button>

        </form>
    </div>
</div>

</div> 
</body>
</html>
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
    // Mengamankan input teks dari SQL Injection
    $nama      = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori  = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $icon      = mysqli_real_escape_string($conn, $_POST['icon']);
    $status    = mysqli_real_escape_string($conn, $_POST['status']);

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nama)));

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "../assets/fasilitas/" . $gambar);

    mysqli_query($conn, "INSERT INTO fasilitas VALUES(
        NULL,
        '$nama',
        '$slug',
        '$kategori',
        '$deskripsi',
        '$gambar',
        '$icon',
        '$status',
        NOW()
    )");

    echo "
    <script>
        alert('Fasilitas berhasil ditambahkan');
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
    height: 160px;
    padding: 18px;
    resize: none;
}

input[type="file"].form-control {
    padding-top: 14px;
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
        <h1>Tambah Fasilitas</h1>
        <p>Tambahkan data sarana dan prasarana penunjang belajar MI Al Karomah</p>
    </div>

    <div class="form-card">
        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Nama Fasilitas</label>
                <input type="text" name="nama" class="form-control" placeholder="Contoh: Laboratorium Komputer, Perpustakaan..." required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" placeholder="Contoh: Ruang Belajar, Sarana Olahraga..." required>
            </div>

            <div class="form-group">
                <label>Icon Fontawesome</label>
                <input type="text" name="icon" placeholder="contoh: fas fa-school" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" placeholder="Tuliskan penjelasan detail mengenai fasilitas ini..." required></textarea>
            </div>

            <div class="form-group">
                <label>Upload Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn-submit">
                Simpan Fasilitas
            </button>

        </form>
    </div>
</div>

</div> 
</body>
</html>
<?php
session_start();

include '../layout/admin_header.php';
include '../config/koneksi.php';

if (isset($_POST['submit'])) {
    $nama      = $_POST['nama'];
    $kategori  = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $icon      = $_POST['icon'];
    $status    = $_POST['status'];

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
        max-width: 900px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        height: 52px;
        border: 1px solid #ddd;
        border-radius: 14px;
        padding: 0 18px;
    }

    textarea.form-control {
        height: 180px;
        padding: 18px;
        resize: none;
    }

    .btn-submit {
        height: 52px;
        padding: 0 30px;
        border: none;
        border-radius: 14px;
        background: #16a34a;
        color: white;
        font-weight: 600;
        cursor: pointer;
    }
</style>

<div class="content-body">
    <div class="form-card">
        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Nama Fasilitas</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Icon Fontawesome</label>
                <input type="text" name="icon" placeholder="contoh: fas fa-school" class="form-control">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Upload Gambar</label>
                <input type="file" name="gambar" class="form-control">
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
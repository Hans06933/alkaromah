<?php
session_start();

include '../layout/admin_header.php';
include '../config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM fasilitas WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
    $nama      = $_POST['nama'];
    $kategori  = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $icon      = $_POST['icon'];
    $status    = $_POST['status'];

    // Membuat ulang slug jika nama fasilitas diubah
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nama)));

    if ($_FILES['gambar']['name'] != '') {
        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "../upload/fasilitas/" . $gambar);

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

    .img-preview {
        max-width: 200px;
        border-radius: 8px;
        margin-top: 10px;
        display: block;
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
                <input type="file" name="gambar" class="form-control">
                <?php if (!empty($data['gambar'])): ?>
                    <img src="../upload/fasilitas/<?= $data['gambar']; ?>" class="img-preview" alt="Gambar Lama">
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif" <?= $data['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                    <option value="nonaktif" <?= $data['status'] == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn-submit">
                Update Fasilitas
            </button>

        </form>
    </div>
</div>
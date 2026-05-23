<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = mysqli_query($conn, "SELECT * FROM guru WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "
    <script>
        alert('Data guru tidak ditemukan');
        window.location='guru.php';
    </script>
    ";
    exit;
}

if(isset($_POST['submit'])){

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nip = mysqli_real_escape_string($conn, $_POST['nip']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
    $mapel = mysqli_real_escape_string($conn, $_POST['mapel']);
    $pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan']);

    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);

    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // FOTO BARU
    if($_FILES['foto']['name'] != ''){

        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, "../assets/guru/".$foto);

        // HAPUS FOTO LAMA (Sudah diperbaiki folder path-nya ke assets/guru/)
        if($data['foto'] != '' && file_exists("../assets/guru/".$data['foto'])){
            unlink("../assets/guru/".$data['foto']);
        }

        mysqli_query($conn, "UPDATE guru SET
            nama='$nama',
            nip='$nip',
            jabatan='$jabatan',
            mapel='$mapel',
            pendidikan='$pendidikan',
            foto='$foto',
            facebook='$facebook',
            instagram='$instagram',
            whatsapp='$whatsapp',
            status='$status'
            WHERE id='$id'
        ");

    }else{

        mysqli_query($conn, "UPDATE guru SET
            nama='$nama',
            nip='$nip',
            jabatan='$jabatan',
            mapel='$mapel',
            pendidikan='$pendidikan',
            facebook='$facebook',
            instagram='$instagram',
            whatsapp='$whatsapp',
            status='$status'
            WHERE id='$id'
        ");

    }

    echo "
    <script>
        alert('Data guru berhasil diupdate');
        window.location='guru.php';
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

.form-card {
    background: white;
    padding: 35px;
    border-radius: 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    /* FIX: Mengisi area kosong secara penuh */
    width: 100%;
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

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 22px;
}

.form-group {
    margin-bottom: 5px;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    font-size: 14px;
    font-weight: 600;
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

input[type="file"].form-control {
    padding-top: 14px;
}

.preview-container {
    margin-top: 12px;
}

.preview-image {
    width: 140px;
    height: 175px;
    border-radius: 14px;
    object-fit: cover;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.btn-group-action {
    margin-top: 30px;
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
@media(max-width: 992px) {
    .content-body {
        padding: 20px 15px;
    }

    .form-card {
        padding: 20px;
        border-radius: 16px;
    }

    .form-grid {
        grid-template-columns: 1fr;
        gap: 15px;
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
            <h1>Edit Data Guru</h1>
            <p>Perbarui informasi guru dan staff pengajar</p>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-grid">

                <div class="form-group">
                    <label>Nama Guru</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']); ?>" required>
                </div>

                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" value="<?= htmlspecialchars($data['nip']); ?>">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="<?= htmlspecialchars($data['jabatan']); ?>" required>
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control" value="<?= htmlspecialchars($data['mapel']); ?>">
                </div>

                <div class="form-group">
                    <label>Pendidikan</label>
                    <input type="text" name="pendidikan" class="form-control" value="<?= htmlspecialchars($data['pendidikan']); ?>">
                </div>

                <div class="form-group">
                    <label>Status Keaktifan</label>
                    <select name="status" class="form-control">
                        <option value="aktif" <?= $data['status']=='aktif' ? 'selected' : ''; ?>>Aktif</option>
                        <option value="nonaktif" <?= $data['status']=='nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="<?= htmlspecialchars($data['facebook']); ?>" placeholder="Username / Link Profil">
                </div>

                <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="<?= htmlspecialchars($data['instagram']); ?>" placeholder="@username">
                </div>

                <div class="form-group">
                    <label>Whatsapp</label>
                    <input type="text" name="whatsapp" class="form-control" value="<?= htmlspecialchars($data['whatsapp']); ?>" placeholder="Contoh: 08123xxxx">
                </div>

                <div class="form-group">
                    <label>Foto Guru</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <div class="preview-container">
                        <small style="color: #64748b; display: block; margin-bottom: 5px;">Foto saat ini:</small>
                        <img src="../assets/guru/<?= $data['foto']; ?>" class="preview-image" onerror="this.src='../assets/guru/default.jpg'">
                    </div>
                </div>

            </div>

            <div class="btn-group-action">
                <button type="submit" name="submit" class="btn-submit">
                    <i class="fas fa-save" style="margin-right: 8px;"></i> Update Data Guru
                </button>
                <a href="guru.php" class="btn-cancel">Batal</a>
            </div>
        </form>

    </div>
</div>

</div> 
</body>
</html>
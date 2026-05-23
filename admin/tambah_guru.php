<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

if(isset($_POST['submit'])){

    // Menambahkan pengaman SQL Injection
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nip = mysqli_real_escape_string($conn, $_POST['nip']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);
    $mapel = mysqli_real_escape_string($conn, $_POST['mapel']);
    $pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan']);

    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);
    $instagram = mysqli_real_escape_string($conn, $_POST['instagram']);
    $whatsapp = mysqli_real_escape_string($conn, $_POST['whatsapp']);

    $status = $_POST['status'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, "../assets/guru/".$foto);

    mysqli_query($conn, "INSERT INTO guru VALUES(
        NULL,
        '$nama',
        '$nip',
        '$jabatan',
        '$mapel',
        '$pendidikan',
        '$foto',
        '$facebook',
        '$instagram',
        '$whatsapp',
        '$status',
        NOW()
    )");

    echo "
    <script>
        alert('Data guru berhasil ditambahkan');
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
    box-shadow: 0 4px 20px rgba(0,0,0,0.03);
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

@media(max-width: 992px){
    .content-body {
        padding: 20px 15px;
    }
}
</style>

<div class="content-body">

    <div class="page-title">
        <h1>Tambah Guru & Staf</h1>
        <p>Tambahkan data guru dan staf baru MI Al Karomah</p>
    </div>

    <div class="form-card">
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" placeholder="Isi - jika tidak ada">
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control" placeholder="Isi - jika tidak mengajar" required>
            </div>

            <div class="form-group">
                <label>Pendidikan</label>
                <input type="text" name="pendidikan" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Foto Guru</label>
                <input type="file" name="foto" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control" placeholder="https://facebook.com/username">
            </div>

            <div class="form-group">
                <label>Instagram</label>
                <input type="text" name="instagram" class="form-control" placeholder="https://instagram.com/username">
            </div>

            <div class="form-group">
                <label>Whatsapp</label>
                <input type="text" name="whatsapp" class="form-control" placeholder="Contoh: 08xxxxxxxxxx">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn-submit">
                Simpan Guru
            </button>

        </form>
    </div>

</div>

</div> 
</body>
</html>
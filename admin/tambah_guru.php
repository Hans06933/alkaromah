<?php

session_start();

include '../layout/admin_header.php';
include '../config/koneksi.php';

if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];
    $mapel = $_POST['mapel'];
    $pendidikan = $_POST['pendidikan'];

    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $whatsapp = $_POST['whatsapp'];

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

.main-content{
margin-left:260px;
padding:110px 25px 30px;
background:#f4f6f9;
min-height:100vh;
}

.form-card{
background:white;
padding:30px;
border-radius:24px;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
max-width:1000px;
}

.form-group{
margin-bottom:20px;
}

.form-group label{
display:block;
margin-bottom:10px;
font-weight:600;
}

.form-control{
width:100%;
height:55px;
border:1px solid #ddd;
border-radius:14px;
padding:0 18px;
font-size:14px;
outline:none;
}

.btn-submit{
height:55px;
padding:0 30px;
border:none;
border-radius:14px;
background:#16a34a;
color:white;
font-weight:600;
cursor:pointer;
}

</style>

<div class="main-content">

    <div class="form-card">

        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control">
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control">
            </div>

            <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control">
            </div>

            <div class="form-group">
                <label>Pendidikan</label>
                <input type="text" name="pendidikan" class="form-control">
            </div>

            <div class="form-group">
                <label>Foto Guru</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <div class="form-group">
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control">
            </div>

            <div class="form-group">
                <label>Instagram</label>
                <input type="text" name="instagram" class="form-control">
            </div>

            <div class="form-group">
                <label>Whatsapp</label>
                <input type="text" name="whatsapp" class="form-control">
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="aktif">Aktif</option>

                    <option value="nonaktif">Nonaktif</option>

                </select>

            </div>

            <button type="submit"
                    name="submit"
                    class="btn-submit">

                Simpan Guru

            </button>

        </form>

    </div>

</div>
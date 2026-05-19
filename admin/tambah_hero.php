<?php
include __DIR__ . '/../layout/admin_header.php';
include __DIR__ . '/../config/koneksi.php';

if(isset($_POST['submit'])){

    $judul = $_POST['judul'];
    $status = $_POST['status'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "../assets/hero/".$gambar);

    mysqli_query($conn,"INSERT INTO hero_slider VALUES(
        NULL,
        '$judul',
        '$subjudul',
        '$tombol_text',
        '$tombol_link',
        '$gambar',
        '$status',
        NOW()
    )");

    echo "
    <script>
        alert('Hero berhasil ditambahkan');
        window.location='hero.php';
    </script>
    ";

}
?>

<style>

body{
background:#f4f6f9;
font-family:Poppins;
}

.form-container{
max-width:800px;
margin:120px auto 30px;
background:white;
padding:30px;
border-radius:25px;
}

.form-group{
margin-bottom:20px;
}

.form-group label{
display:block;
margin-bottom:8px;
font-weight:500;
}

.form-control{
width:100%;
height:55px;
border:1px solid #ddd;
border-radius:12px;
padding:15px;
outline:none;
}

textarea.form-control{
height:120px;
resize:none;
}

.btn-submit{
background:#15803d;
color:white;
border:none;
height:55px;
padding:0 30px;
border-radius:12px;
cursor:pointer;
font-size:15px;
}

</style>

<div class="form-container">

<h2>Tambah Hero Slider</h2>

<br>

<form method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Status</label>

        <select name="status" class="form-control">

            <option value="aktif">Aktif</option>
            <option value="draft">Draft</option>

        </select>

    </div>

    <button type="submit" name="submit" class="btn-submit">
        Simpan Hero
    </button>

</form>

</div>
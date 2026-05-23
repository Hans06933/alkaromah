<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

if(isset($_POST['submit'])){

    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $slug = strtolower(str_replace(' ','-',$judul));
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $penulis = mysqli_real_escape_string($conn, $_POST['penulis']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $status = $_POST['status'];

    $thumbnail = $_FILES['thumbnail']['name'];
    $tmp = $_FILES['thumbnail']['tmp_name'];

    move_uploaded_file($tmp, "../assets/berita/".$thumbnail);

    mysqli_query($conn, "INSERT INTO berita VALUES(
        NULL,
        '$judul',
        '$slug',
        '$kategori',
        '$penulis',
        '$thumbnail',
        '$isi',
        '$status',
        NOW()
    )");

    echo "
    <script>
        alert('Berita berhasil ditambahkan');
        window.location='berita.php';
    </script>
    ";
}
?>

<style>
/* Kontainer bagian dalam isi konten */
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

textarea.form-control {
    height: 180px;
    padding: 18px;
    resize: none;
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
    background: linear-gradient(135deg,#16a34a,#15803d);
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
        <h1>Tambah Berita</h1>
        <p>Tambahkan berita terbaru website MI Al Karomah</p>
    </div>

    <div class="form-card">
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Judul Berita</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Thumbnail</label>
                <input type="file" name="thumbnail" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Isi Berita</label>
                <textarea name="isi" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn-submit">
                Simpan Berita
            </button>

        </form>
    </div>

</div>

</div> 
</body>
</html>
<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

$id = $_GET['id'];

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

    $status = $_POST['status'];

    // FOTO BARU
    if($_FILES['foto']['name'] != ''){

        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, "../assets/guru/".$foto);

        // HAPUS FOTO LAMA
        if($data['foto'] != '' && file_exists("../upload/guru/".$data['foto'])){
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

*{
box-sizing:border-box;
}

.content-body{
margin-left:260px;
padding:95px 25px 25px;
background:#f4f6f9;
min-height:100vh;
width:calc(100% - 260px);
}

.form-card{
background:white;
padding:30px;
border-radius:24px;
max-width:950px;
box-shadow:0 3px 10px rgba(0,0,0,0.05);
}

.page-title{
margin-bottom:25px;
}

.page-title h1{
font-size:30px;
font-weight:700;
color:#111827;
margin-bottom:5px;
}

.page-title p{
font-size:14px;
color:#6b7280;
}

.form-group{
margin-bottom:20px;
}

.form-group label{
display:block;
margin-bottom:10px;
font-size:14px;
font-weight:600;
color:#111827;
}

.form-control{
width:100%;
height:52px;
border:1px solid #e5e7eb;
border-radius:14px;
padding:0 18px;
font-size:14px;
outline:none;
transition:0.3s;
}

.form-control:focus{
border-color:#16a34a;
}

.preview-image{
width:160px;
height:200px;
border-radius:18px;
object-fit:cover;
margin-top:10px;
border:3px solid #f3f4f6;
}

.btn-submit{
height:52px;
padding:0 30px;
border:none;
border-radius:14px;
background:linear-gradient(135deg,#16a34a,#15803d);
color:white;
font-size:14px;
font-weight:600;
cursor:pointer;
transition:0.3s;
}

.btn-submit:hover{
transform:translateY(-2px);
}

.form-grid{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:20px;
}

@media(max-width:991px){

.content-body{
margin-left:0;
width:100%;
padding:90px 20px 20px;
}

.form-grid{
grid-template-columns:1fr;
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

                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="<?= htmlspecialchars($data['nama']); ?>">
                </div>

                <div class="form-group">
                    <label>NIP</label>

                    <input type="text"
                           name="nip"
                           class="form-control"
                           value="<?= htmlspecialchars($data['nip']); ?>">
                </div>

                <div class="form-group">
                    <label>Jabatan</label>

                    <input type="text"
                           name="jabatan"
                           class="form-control"
                           value="<?= htmlspecialchars($data['jabatan']); ?>">
                </div>

                <div class="form-group">
                    <label>Mata Pelajaran</label>

                    <input type="text"
                           name="mapel"
                           class="form-control"
                           value="<?= htmlspecialchars($data['mapel']); ?>">
                </div>

                <div class="form-group">
                    <label>Pendidikan</label>

                    <input type="text"
                           name="pendidikan"
                           class="form-control"
                           value="<?= htmlspecialchars($data['pendidikan']); ?>">
                </div>

                <div class="form-group">
                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="aktif" <?= $data['status']=='aktif' ? 'selected' : ''; ?>>
                            Aktif
                        </option>

                        <option value="nonaktif" <?= $data['status']=='nonaktif' ? 'selected' : ''; ?>>
                            Nonaktif
                        </option>

                    </select>

                </div>

                <div class="form-group">
                    <label>Facebook</label>

                    <input type="text"
                           name="facebook"
                           class="form-control"
                           value="<?= htmlspecialchars($data['facebook']); ?>">
                </div>

                <div class="form-group">
                    <label>Instagram</label>

                    <input type="text"
                           name="instagram"
                           class="form-control"
                           value="<?= htmlspecialchars($data['instagram']); ?>">
                </div>

                <div class="form-group">
                    <label>Whatsapp</label>

                    <input type="text"
                           name="whatsapp"
                           class="form-control"
                           value="<?= htmlspecialchars($data['whatsapp']); ?>">
                </div>

                <div class="form-group">
                    <label>Foto Guru</label>

                    <input type="file"
                           name="foto"
                           class="form-control">

                    <img src="../assets/guru/<?= $data['foto']; ?>"
                         class="preview-image"
                         onerror="this.src='../assets/guru/default.jpg'">

                </div>

            </div>

            <button type="submit"
                    name="submit"
                    class="btn-submit">

                Update Data Guru

            </button>

        </form>

    </div>

</div>
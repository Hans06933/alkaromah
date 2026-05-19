<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM hero_slider WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){

    $judul = $_POST['judul'];
    $subjudul = $_POST['subjudul'];
    $tombol_text = $_POST['tombol_text'];
    $tombol_link = $_POST['tombol_link'];
    $status = $_POST['status'];

    if($_FILES['gambar']['name'] != ''){

        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp, "upload/hero/".$gambar);

        mysqli_query($conn,"UPDATE hero_slider SET
            judul='$judul',
            subjudul='$subjudul',
            tombol_text='$tombol_text',
            tombol_link='$tombol_link',
            gambar='$gambar',
            status='$status'
            WHERE id='$id'
        ");

    }else{

        mysqli_query($conn,"UPDATE hero_slider SET
            judul='$judul',
            subjudul='$subjudul',
            tombol_text='$tombol_text',
            tombol_link='$tombol_link',
            status='$status'
            WHERE id='$id'
        ");

    }

    echo "
    <script>
        alert('Hero berhasil diupdate');
        window.location='hero.php';
    </script>
    ";

}
?>
<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM hero_slider WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

unlink("../assets/hero/".$d['gambar']);

mysqli_query($conn,"DELETE FROM hero_slider WHERE id='$id'");

echo "
<script>
    alert('Hero berhasil dihapus');
    window.location='hero.php';
</script>
";
?>
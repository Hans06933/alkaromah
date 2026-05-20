<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM galeri WHERE id='$id'");

$d = mysqli_fetch_assoc($data);

unlink("../upload/galeri/".$d['gambar']);

mysqli_query($conn, "DELETE FROM galeri WHERE id='$id'");

echo "
<script>
alert('Galeri berhasil dihapus');
window.location='galeri.php';
</script>
";
?>
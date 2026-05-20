<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM berita WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

unlink("../upload/berita/".$d['thumbnail']);

mysqli_query($conn, "DELETE FROM berita WHERE id='$id'");

echo "
<script>
    alert('Berita berhasil dihapus');
    window.location='berita.php';
</script>
";
?>
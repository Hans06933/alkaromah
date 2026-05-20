<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM guru WHERE id='$id'");

$d = mysqli_fetch_assoc($data);

unlink("../upload/guru/".$d['foto']);

mysqli_query($conn, "DELETE FROM guru WHERE id='$id'");

echo "
<script>
    alert('Data guru berhasil dihapus');
    window.location='guru.php';
</script>
";
?>
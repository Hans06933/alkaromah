<?php
include '../config/koneksi.php';

$id = $_GET['id'];

// Ambil data fasilitas terlebih dahulu
$query = mysqli_query($conn, "SELECT * FROM fasilitas WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);

// Pastikan data ditemukan sebelum menghapus gambar dan baris database
if ($data) {
    // Jika ada file gambar lama dan filenya benar-benar ada di folder, hapus file tersebut
    if ($data['gambar'] != '' && file_exists("../upload/fasilitas/" . $data['gambar'])) {
        unlink("../upload/fasilitas/" . $data['gambar']);
    }

    // Hapus data dari database
    mysqli_query($conn, "DELETE FROM fasilitas WHERE id='$id'");
}

echo "
<script>
    alert('Fasilitas berhasil dihapus');
    window.location='fasilitas.php';
</script>
";
?>
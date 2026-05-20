<?php
session_start();

// Proteksi halaman admin (pastikan user sudah login)
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include '../config/koneksi.php';

// Validasi jika parameter ID tersedia di URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // Amankan input ID dari SQL Injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // 1. Ambil data kegiatan terlebih dahulu untuk mengecek file gambarnya
    $query = mysqli_query($conn, "SELECT gambar FROM kegiatan WHERE id = '$id'");
    
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $nama_gambar = $data['gambar'];

        // 2. Hapus file gambar secara fisik dari folder jika ada
        if (!empty($nama_gambar) && file_exists("../upload/kegiatan/" . $nama_gambar)) {
            unlink("../upload/kegiatan/" . $nama_gambar);
        }

        // 3. Hapus data kegiatan dari database
        mysqli_query($conn, "DELETE FROM kegiatan WHERE id = '$id'");

        echo "
        <script>
            alert('Kegiatan berhasil dihapus');
            window.location = 'kegiatan.php';
        </script>
        ";
        exit;
    }
}

// Jika ID tidak valid atau data tidak ditemukan, tendang kembali ke halaman utama kegiatan
header("Location: kegiatan.php");
exit;
?>
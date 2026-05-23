<?php
session_start();

// Set zona waktu agar pencatatan jam pendaftaran akurat
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['daftar_ppdb'])) {
    
    // 1. Ambil data teks dari Form PPDB
    $nama_lengkap   = strip_tags(trim($_POST['nama_lengkap']));
    $nik            = strip_tags(trim($_POST['nik']));
    $jk             = $_POST['jk'] == 'L' ? 'Laki-laki' : 'Perempuan';
    $tempat_lahir   = strip_tags(trim($_POST['tempat_lahir']));
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $alamat         = strip_tags(trim($_POST['alamat']));
    $nama_ayah      = strip_tags(trim($_POST['nama_ayah']));
    $nama_ibu       = strip_tags(trim($_POST['nama_ibu']));
    $pekerjaan      = strip_tags(trim($_POST['pekerjaan']));
    $no_wa          = strip_tags(trim($_POST['no_wa']));
    $tanggal_daftar = date("Y-m-d H:i:s");

    // 2. Tentukan Folder Penyimpanan File Berkas (KK & Akta)
    $folder_upload = "assets/ppdb/";
    if (!is_dir($folder_upload)) {
        mkdir($folder_upload, 0755, true);
    }

    // Ambil detail berkas KK
    $kk_name = $_FILES['file_kk']['name'];
    $kk_tmp  = $_FILES['file_kk']['tmp_name'];
    $kk_ext  = strtolower(pathinfo($kk_name, PATHINFO_EXTENSION));

    // Ambil detail berkas Akta
    $akta_name = $_FILES['file_akta']['name'];
    $akta_tmp  = $_FILES['file_akta']['tmp_name'];
    $akta_ext  = strtolower(pathinfo($akta_name, PATHINFO_EXTENSION));

    // Validasi ekstensi file yang diperbolehkan
    $allowed_ext = ['jpg', 'jpeg', 'png', 'pdf'];
    if (!in_array($kk_ext, $allowed_ext) || !in_array($akta_ext, $allowed_ext)) {
        $_SESSION['status_ppdb'] = "gagal_format";
        header("Location: ppdb.php");
        exit();
    }

    // Buat nama file unik baru menggunakan kombinasi NIK dan Waktu
    $nama_file_kk   = "KK_" . $nik . "_" . time() . "." . $kk_ext;
    $nama_file_akta = "AKTA_" . $nik . "_" . time() . "." . $akta_ext;

    // Jalur lengkap penyimpanan file di server
    $target_kk   = $folder_upload . $nama_file_kk;
    $target_akta = $folder_upload . $nama_file_akta;

    // 3. Proses Upload File Fisik ke Folder Server
    if (move_uploaded_file($kk_tmp, $target_kk) && move_uploaded_file($akta_tmp, $target_akta)) {
        
        // Buat Link URL Berkas otomatis mendeteksi domain/localhost
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
        $base_url  = $protocol . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['REQUEST_URI']), '/') . "/";
        $link_kk   = $base_url . $target_kk;
        $link_akta = $base_url . $target_akta;

        // 4. PROSES PENYIMPANAN KE FILE EXCEL LOKAL (.CSV)
        $nama_file_excel = "data_pendaftar_ppdb.csv";
        $file_baru       = !file_exists($nama_file_excel);

        $buka_excel = fopen($nama_file_excel, 'a');

        // Jika file ini baru pertama kali dibuat, tulis Header kolom
        if ($file_baru) {
            // Menambahkan BOM UTF-8 untuk kompatibilitas karakter Excel
            fwrite($buka_excel, "\xEF\xBB\xBF");
            
            $header = [
                'Tanggal Daftar',
                'Nama Lengkap',
                'NIK',
                'Jenis Kelamin',
                'Tempat Lahir',
                'Tanggal Lahir',
                'Alamat',
                'Nama Ayah',
                'Nama Ibu',
                'Pekerjaan Orang Tua',
                'No WhatsApp',
                'Link Berkas KK',
                'Link Berkas Akta'
            ];
            fputcsv($buka_excel, $header, ';');
        }

        // Tulis baris data pendaftar baru (dengan format NIK dan No WA sebagai teks)
        $data = [
            $tanggal_daftar,
            $nama_lengkap,
            "'" . $nik,        // Tambah petik satu agar Excel membaca sebagai teks
            $jk,
            $tempat_lahir,
            $tanggal_lahir,
            $alamat,
            $nama_ayah,
            $nama_ibu,
            $pekerjaan,
            "'" . $no_wa,      // Tambah petik satu agar angka 0 di depan tidak hilang
            $link_kk,
            $link_akta
        ];
        fputcsv($buka_excel, $data, ';');

        fclose($buka_excel);

        $_SESSION['status_ppdb'] = "sukses";
        header("Location: ppdb.php");
        exit();

    } else {
        $_SESSION['status_ppdb'] = "gagal_upload";
        header("Location: ppdb.php");
        exit();
    }
} else {
    header("Location: ppdb.php");
    exit();
}
?>
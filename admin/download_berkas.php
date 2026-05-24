<?php

session_start();

// CEK LOGIN ADMIN
if (!isset($_SESSION['admin_login'])) {
    die("Akses ditolak");
}

if (!isset($_GET['file'])) {
    die("File tidak ditemukan");
}

$filename = basename($_GET['file']);

$filepath =
    dirname(__DIR__) .
    '/private_ppdb/uploads/' .
    $filename;

if (!file_exists($filepath)) {
    die("File tidak ada");
}

// MIME TYPE
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime  = finfo_file($finfo, $filepath);
finfo_close($finfo);

// HEADER
header('Content-Description: File Transfer');
header('Content-Type: ' . $mime);
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Length: ' . filesize($filepath));

readfile($filepath);
exit;
?>
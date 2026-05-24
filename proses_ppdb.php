<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('Asia/Jakarta');

// ==========================================================================
// VALIDASI REQUEST
// ==========================================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ppdb.php");
    exit();
}

if (!isset($_POST['daftar_ppdb'])) {
    header("Location: ppdb.php");
    exit();
}

// ==========================================================================
// VALIDASI CSRF
// ==========================================================================

if (
    !isset($_POST['csrf_token']) ||
    !isset($_SESSION['csrf_token']) ||
    $_POST['csrf_token'] !== $_SESSION['csrf_token']
) {
    die("CSRF TOKEN TIDAK VALID");
}

// HAPUS TOKEN SETELAH DIGUNAKAN
unset($_SESSION['csrf_token']);

// ==========================================================================
// RATE LIMIT
// ==========================================================================

if (
    isset($_SESSION['last_submit']) &&
    (time() - $_SESSION['last_submit']) < 10
) {
    die("Terlalu cepat melakukan pengiriman.");
}

$_SESSION['last_submit'] = time();

// ==========================================================================
// SANITIZE INPUT
// ==========================================================================

function clean($data)
{
    return htmlspecialchars(
        strip_tags(trim($data)),
        ENT_QUOTES,
        'UTF-8'
    );
}

$nama_lengkap = clean($_POST['nama_lengkap']);
$nik          = preg_replace('/[^0-9]/', '', $_POST['nik']);
$jk           = ($_POST['jk'] === 'L') ? 'Laki-laki' : 'Perempuan';

$tempat_lahir = clean($_POST['tempat_lahir']);
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat       = clean($_POST['alamat']);

$nama_ayah    = clean($_POST['nama_ayah']);
$nama_ibu     = clean($_POST['nama_ibu']);
$pekerjaan    = clean($_POST['pekerjaan']);

$no_wa        = preg_replace('/[^0-9]/', '', $_POST['no_wa']);

$tanggal_daftar = date('Y-m-d H:i:s');

// ==========================================================================
// VALIDASI DATA
// ==========================================================================

if (
    empty($nama_lengkap) ||
    strlen($nik) !== 16 ||
    empty($no_wa)
) {

    $_SESSION['status_ppdb'] = "gagal_validasi";

    header("Location: ppdb.php");
    exit();
}

// VALIDASI TANGGAL

$date = DateTime::createFromFormat('Y-m-d', $tanggal_lahir);

if (!$date || $date->format('Y-m-d') !== $tanggal_lahir) {
    die("Tanggal lahir tidak valid.");
}

// ==========================================================================
// PATH FOLDER
// ==========================================================================

$private_dir   = __DIR__ . '/private_ppdb/';
$upload_dir    = $private_dir . 'uploads/';

// ==========================================================================
// BUAT FOLDER
// ==========================================================================

if (!is_dir($private_dir)) {
    mkdir($private_dir, 0755, true);
}

if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

// ==========================================================================
// SECURITY FILE
// ==========================================================================

if (!file_exists($private_dir . 'index.php')) {

    file_put_contents(
        $private_dir . 'index.php',
        '<?php http_response_code(403); exit; ?>'
    );
}

if (!file_exists($upload_dir . 'index.php')) {

    file_put_contents(
        $upload_dir . 'index.php',
        '<?php http_response_code(403); exit; ?>'
    );
}

if (!file_exists($upload_dir . '.htaccess')) {

    $htaccess = <<<HTACCESS
Options -Indexes

<FilesMatch "\.(php|php3|php4|php5|phtml|pl|py|jsp|asp|sh|cgi)$">
Deny from all
</FilesMatch>
HTACCESS;

    file_put_contents(
        $upload_dir . '.htaccess',
        $htaccess
    );
}

// ==========================================================================
// VALIDASI FILE
// ==========================================================================

$max_size = 3 * 1024 * 1024;

$allowed_mime = [

    'jpg'  => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png'  => 'image/png',
    'pdf'  => 'application/pdf'
];

$files = [

    'file_kk' => [
        'prefix' => 'KK_'
    ],

    'file_akta' => [
        'prefix' => 'AKTA_'
    ]
];

$uploaded_files = [];

// ==========================================================================
// LOOP FILE
// ==========================================================================

foreach ($files as $input_name => $config) {

    if (!isset($_FILES[$input_name])) {

        $_SESSION['status_ppdb'] = "gagal_upload";

        header("Location: ppdb.php");
        exit();
    }

    $file = $_FILES[$input_name];

    // ERROR

    if ($file['error'] !== UPLOAD_ERR_OK) {

        $_SESSION['status_ppdb'] = "gagal_upload";

        header("Location: ppdb.php");
        exit();
    }

    // SIZE

    if ($file['size'] > $max_size) {

        $_SESSION['status_ppdb'] = "gagal_ukuran";

        header("Location: ppdb.php");
        exit();
    }

    // EXTENSION

    $extension = strtolower(
        pathinfo($file['name'], PATHINFO_EXTENSION)
    );

    // MIME

    $finfo = new finfo(FILEINFO_MIME_TYPE);

    $real_mime = $finfo->file($file['tmp_name']);

    if (
        !isset($allowed_mime[$extension]) ||
        $allowed_mime[$extension] !== $real_mime
    ) {

        $_SESSION['status_ppdb'] = "gagal_format";

        header("Location: ppdb.php");
        exit();
    }

    // VALIDASI IMAGE

    if ($extension !== 'pdf') {

        if (@getimagesize($file['tmp_name']) === false) {

            $_SESSION['status_ppdb'] = "gagal_format";

            header("Location: ppdb.php");
            exit();
        }
    }

    // RANDOM FILE NAME

    $random_name =
        $config['prefix'] .
        bin2hex(random_bytes(16)) .
        "_" .
        time() .
        "." .
        $extension;

    $destination = $upload_dir . $random_name;

    // MOVE FILE

    if (!move_uploaded_file($file['tmp_name'], $destination)) {

        $_SESSION['status_ppdb'] = "gagal_upload";

        header("Location: ppdb.php");
        exit();
    }

    $uploaded_files[$input_name] = $random_name;
}

// ==========================================================================
// FILE CSV
// ==========================================================================

$csv_file = $private_dir . 'data_ppdb.csv';

// BUAT FILE CSV JIKA BELUM ADA

if (!file_exists($csv_file)) {

    $create = fopen($csv_file, 'w');

    if ($create) {

        fwrite($create, "\xEF\xBB\xBF");

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
            'Pekerjaan',
            'No WhatsApp',
            'File KK',
            'File Akta'
        ];

        fputcsv($create, $header, ';');

        fclose($create);
    }
}

// ==========================================================================
// SIMPAN CSV
// ==========================================================================

$handle = fopen($csv_file, 'a');

if (!$handle) {
    die("Gagal membuka file CSV.");
}

flock($handle, LOCK_EX);

$data = [

    $tanggal_daftar,
    $nama_lengkap,
    $nik,
    $jk,
    $tempat_lahir,
    $tanggal_lahir,
    $alamat,
    $nama_ayah,
    $nama_ibu,
    $pekerjaan,
    $no_wa,
    $uploaded_files['file_kk'],
    $uploaded_files['file_akta']
];

fputcsv($handle, $data, ';');

fflush($handle);

flock($handle, LOCK_UN);

fclose($handle);

// ==========================================================================
// SUCCESS
// ==========================================================================

$_SESSION['status_ppdb'] = "sukses";

header("Location: ppdb.php");
exit();

?>
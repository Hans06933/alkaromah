<?php

session_start();
include_once '../layout/admin_header.php';

// ==========================================================================
// LOKASI FILE CSV
// ==========================================================================

// Folder:
// htdocs/alkaromah/private_ppdb/data_ppdb.csv

$file_excel = "../private_ppdb/data_ppdb.csv";

// ==========================================================================
// PERSIAPAN DATA
// ==========================================================================

$data_pendaftar   = [];
$total_pendaftar  = 0;
$total_laki       = 0;
$total_perempuan  = 0;

// ==========================================================================
// CEK FILE CSV
// ==========================================================================

if (file_exists($file_excel)) {

    if (($buka_file = fopen($file_excel, "r")) !== FALSE) {

        // LEWATI HEADER CSV
        fgetcsv($buka_file, 0, ";");

        // LOOP DATA
        while (($row = fgetcsv($buka_file, 0, ";")) !== FALSE) {

            if (!empty($row[0])) {

                $data_pendaftar[] = $row;

                $total_pendaftar++;

                // HITUNG GENDER
                if ($row[3] === 'Laki-laki') {

                    $total_laki++;

                } elseif ($row[3] === 'Perempuan') {

                    $total_perempuan++;
                }
            }
        }

        fclose($buka_file);

        // DATA TERBARU PALING ATAS
        $data_pendaftar = array_reverse($data_pendaftar);
    }
}

// ==========================================================================
// FOLDER FILE UPLOAD
// ==========================================================================

$folder_berkas = "../private_ppdb/uploads/";

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>

.admin-ppdb-workspace{
    padding:30px;
    background:#f8fafc;
    min-height:100vh;
    font-family:'Poppins',sans-serif;
}

.admin-ppdb-container{
    max-width:1300px;
    margin:auto;
}

/* HEADER */

.admin-header-box{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:30px;
}

.admin-header-box h1{
    color:#0f6b3b;
    font-size:30px;
    margin:0;
}

.admin-header-box p{
    color:#64748b;
    margin-top:5px;
}

/* BUTTON */

.btn-download-excel{
    background:linear-gradient(135deg,#0f6b3b,#16a34a);
    color:white;
    text-decoration:none;
    padding:14px 24px;
    border-radius:12px;
    display:flex;
    align-items:center;
    gap:10px;
    font-weight:600;
    transition:.3s;
}

.btn-download-excel:hover{
    transform:translateY(-3px);
}

/* STATISTIK */

.stat-grid-layout{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-bottom:30px;
}

.stat-card-item{
    background:white;
    padding:25px;
    border-radius:20px;
    display:flex;
    align-items:center;
    gap:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.stat-icon-circle{
    width:60px;
    height:60px;
    border-radius:15px;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:24px;
}

.total{
    background:#dcfce7;
    color:#166534;
}

.cowo{
    background:#dbeafe;
    color:#2563eb;
}

.cewe{
    background:#fae8ff;
    color:#c026d3;
}

.stat-info-text h3{
    font-size:30px;
    margin-bottom:5px;
}

.stat-info-text p{
    color:#64748b;
}

/* TABLE */

.table-data-card{
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.05);
}

.table-card-header{
    padding:25px;
    border-bottom:1px solid #eee;
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:20px;
}

.table-card-header h2{
    color:#0f172a;
    font-size:20px;
    margin:0;
}

/* SEARCH */

.search-wrapper-box{
    position:relative;
    width:320px;
}

.search-wrapper-box i{
    position:absolute;
    left:15px;
    top:50%;
    transform:translateY(-50%);
    color:#94a3b8;
}

.input-search-ppdb{
    width:100%;
    padding:13px 15px 13px 42px;
    border:1px solid #dbe2ea;
    border-radius:12px;
    outline:none;
    font-size:14px;
}

.input-search-ppdb:focus{
    border-color:#16a34a;
}

/* TABLE */

.table-responsive-wrapper{
    overflow:auto;
}

.admin-table-ppdb{
    width:100%;
    border-collapse:collapse;
}

.admin-table-ppdb th{
    background:#f8fafc;
    padding:18px;
    text-align:left;
    color:#475569;
    font-size:14px;
    white-space:nowrap;
}

.admin-table-ppdb td{
    padding:18px;
    border-top:1px solid #f1f5f9;
    font-size:14px;
    white-space:nowrap;
}

.admin-table-ppdb tr:hover{
    background:#f8fafc;
}

/* BUTTON */

.btn-table-action{
    background:#f0fdf4;
    color:#166534;
    text-decoration:none;
    padding:8px 14px;
    border-radius:10px;
    font-size:13px;
    display:inline-flex;
    align-items:center;
    gap:6px;
    transition:.3s;
}

.btn-table-action:hover{
    background:#16a34a;
    color:white;
}

/* EMPTY */

.empty-state-box{
    padding:50px;
    text-align:center;
    color:#94a3b8;
}

/* MOBILE */

@media(max-width:768px){

    .admin-ppdb-workspace{
        padding:20px;
    }

    .search-wrapper-box{
        width:100%;
    }

}

</style>

<div class="admin-ppdb-workspace">

<div class="admin-ppdb-container">

    <!-- HEADER -->
    <div class="admin-header-box">

        <div>
            <h1>
                <i class="fas fa-user-shield"></i>
                Panel Kendali PPDB
            </h1>

            <p>
                Manajemen data pendaftaran siswa baru MI Al Karomah
            </p>
        </div>

        <?php if ($total_pendaftar > 0): ?>

        <a href="../private_ppdb/data_ppdb.csv" class="btn-download-excel" download>

            <i class="fas fa-file-excel"></i>

            Download Data CSV

        </a>

        <?php endif; ?>

    </div>

    <!-- STATISTIK -->
    <div class="stat-grid-layout">

        <div class="stat-card-item">

            <div class="stat-icon-circle total">
                <i class="fas fa-users"></i>
            </div>

            <div class="stat-info-text">
                <h3><?= $total_pendaftar; ?></h3>
                <p>Total Pendaftar</p>
            </div>

        </div>

        <div class="stat-card-item">

            <div class="stat-icon-circle cowo">
                <i class="fas fa-mars"></i>
            </div>

            <div class="stat-info-text">
                <h3><?= $total_laki; ?></h3>
                <p>Laki-Laki</p>
            </div>

        </div>

        <div class="stat-card-item">

            <div class="stat-icon-circle cewe">
                <i class="fas fa-venus"></i>
            </div>

            <div class="stat-info-text">
                <h3><?= $total_perempuan; ?></h3>
                <p>Perempuan</p>
            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div class="table-data-card">

        <div class="table-card-header">

            <h2>
                <i class="fas fa-table"></i>
                Data Pendaftar Terbaru
            </h2>

            <?php if ($total_pendaftar > 0): ?>

            <div class="search-wrapper-box">

                <i class="fas fa-search"></i>

                <input
                type="text"
                id="cari_ppdb"
                class="input-search-ppdb"
                placeholder="Cari nama atau NIK...">

            </div>

            <?php endif; ?>

        </div>

        <div class="table-responsive-wrapper">

        <?php if ($total_pendaftar > 0): ?>

        <table class="admin-table-ppdb" id="tabel_pendaftar">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>L/P</th>
                    <th>No WA</th>
                    <th>KK</th>
                    <th>Akta</th>

                </tr>

            </thead>

            <tbody>

            <?php
            $no = 1;

            foreach($data_pendaftar as $pendaftar):

                $file_kk =
                    "download_berkas.php?file=" .
                    urlencode($pendaftar[11]);

                $file_akta =
                    "download_berkas.php?file=" .
                    urlencode($pendaftar[12]);
            ?>

            <tr class="data-row">

                <td><b><?= $no++; ?></b></td>

                <td><?= htmlspecialchars($pendaftar[0]); ?></td>

                <td class="search-nama">
                    <b><?= htmlspecialchars($pendaftar[1]); ?></b>
                </td>

                <td class="search-nik">
                    <?= htmlspecialchars($pendaftar[2]); ?>
                </td>

                <td><?= htmlspecialchars($pendaftar[3]); ?></td>

                <td><?= htmlspecialchars($pendaftar[10]); ?></td>

                <td>

                    <?php if(file_exists($folder_berkas . $pendaftar[11])): ?>

                    <a
                    href="<?= $file_kk; ?>"
                    target="_blank"
                    class="btn-table-action">

                        <i class="fas fa-eye"></i>
                        Lihat KK

                    </a>

                    <?php else: ?>

                    File Tidak Ada

                    <?php endif; ?>

                </td>

                <td>

                    <?php if(file_exists($folder_berkas . $pendaftar[12])): ?>

                    <a
                    href="<?= $file_akta; ?>"
                    target="_blank"
                    class="btn-table-action">

                        <i class="fas fa-eye"></i>
                        Lihat Akta

                    </a>

                    <?php else: ?>

                    File Tidak Ada

                    <?php endif; ?>

                </td>

            </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

        <?php else: ?>

        <div class="empty-state-box">

            <i
            class="fas fa-folder-open"
            style="font-size:50px;margin-bottom:15px;">
            </i>

            <p>Belum ada data PPDB masuk.</p>

        </div>

        <?php endif; ?>

        </div>

    </div>

</div>

</div>

<script>

const inputSearch =
document.getElementById('cari_ppdb');

if(inputSearch){

inputSearch.addEventListener('keyup',function(){

    let keyword =
    this.value.toLowerCase();

    let rows =
    document.querySelectorAll('.data-row');

    rows.forEach(function(row){

        let nama =
        row.querySelector('.search-nama')
        .textContent
        .toLowerCase();

        let nik =
        row.querySelector('.search-nik')
        .textContent
        .toLowerCase();

        if(
            nama.includes(keyword) ||
            nik.includes(keyword)
        ){
            row.style.display='';
        }else{
            row.style.display='none';
        }

    });

});

}

</script>
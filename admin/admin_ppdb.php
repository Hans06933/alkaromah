<?php

session_start();
include_once '../layout/admin_header.php';
include '../config/koneksi.php';

// 1. PENGATURAN LOGIKA UTAMA (MEMBACA DATA EXCEL LOKAL)
$file_excel = "../data_pendaftar_ppdb.csv"; // Jalur ke file CSV PPDB Anda
$data_pendaftar = [];
$total_pendaftar = 0;
$total_laki = 0;
$total_perempuan = 0;

// Baca file CSV jika ada untuk menghitung statistik & menampilkan tabel preview
if (file_exists($file_excel)) {
    if (($buka_file = fopen($file_excel, "r")) !== FALSE) {
        // Lewati baris pertama (BOM / Header kolom)
        fgetcsv($buka_file, 0, ";");
        
        // Looping baris demi baris data
        while (($row = fgetcsv($buka_file, 0, ";")) !== FALSE) {
            // Pastikan baris tidak kosong
            if (!empty($row[0])) {
                $data_pendaftar[] = $row;
                $total_pendaftar++;
                
                // Hitung statistik Gender berdasarkan kolom ke-4 (indeks 3)
                if ($row[3] == 'Laki-laki') {
                    $total_laki++;
                } else if ($row[3] == 'Perempuan') {
                    $total_perempuan++;
                }
            }
        }
        fclose($buka_file);
        
        // Balik urutan data agar pendaftar terbaru muncul di paling atas tabel
        $data_pendaftar = array_reverse($data_pendaftar);
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
/* ==========================================================================
   WORKSPACE STYLING DASHBOARD ADMIN PPDB
   ========================================================================== */
.admin-ppdb-workspace {
    font-family: 'Inter', sans-serif;
    background-color: #f8fafc;
    padding: 30px;
    min-height: 100vh;
    color: #1e293b;
}

.admin-ppdb-container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Header Halaman */
.admin-header-box {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;
}

.admin-header-box h1 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #0f6b3b;
    margin: 0;
}

.admin-header-box p {
    font-size: 0.85rem;
    color: #64748b;
    margin: 5px 0 0 0;
}

/* ==========================================================================
   STYLE TOMBOL DOWNLOAD EXCEL PREMIUM
   ========================================================================== */
.btn-download-excel {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #107c41 0%, #0b592e 100%);
    color: #ffffff !important;
    text-decoration: none !important;
    padding: 12px 22px;
    font-size: 0.85rem;
    font-weight: 600;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(16, 124, 65, 0.2);
    transition: transform 0.2s, box-shadow 0.2s;
    border: none;
    cursor: pointer;
}

.btn-download-excel:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(16, 124, 65, 0.3);
}

/* Grid Kartu Statistik Ringkas */
.stat-grid-layout {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card-item {
    background: #ffffff;
    border-radius: 12px;
    padding: 20px;
    border: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
}

.stat-icon-circle {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.stat-icon-circle.total { background: #e6f7ec; color: #0f6b3b; }
.stat-icon-circle.cowo { background: #e0f2fe; color: #0284c7; }
.stat-icon-circle.cewe { background: #fae8ff; color: #c026d3; }

.stat-info-text h3 {
    font-size: 1.4rem;
    font-weight: 700;
    margin: 0;
    color: #1e293b;
}

.stat-info-text p {
    font-size: 0.8rem;
    color: #64748b;
    margin: 2px 0 0 0;
    font-weight: 500;
}

/* ==========================================================================
   FITUR SEARCH BAR PPDB
   ========================================================================== */
.search-wrapper-box {
    position: relative;
    max-width: 380px;
}

.search-wrapper-box i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 0.95rem;
}

.input-search-ppdb {
    width: 100%;
    padding: 10px 15px 10px 38px;
    font-size: 0.85rem;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    background: #ffffff;
    color: #1e293b;
    transition: all 0.2s;
}

.input-search-ppdb:focus {
    outline: none;
    border-color: #0f6b3b;
    box-shadow: 0 0 0 3px rgba(15, 107, 59, 0.1);
}

/* ==========================================================================
   PREVIEW TABEL DATA
   ========================================================================== */
.table-data-card {
    background: #ffffff;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
    overflow: hidden;
}

.table-card-header {
    padding: 20px;
    border-bottom: 1px solid #e2e8f0;
    background: #f8fafc;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.table-card-header h2 {
    font-size: 0.95rem;
    font-weight: 700;
    margin: 0;
    color: #334155;
}

.table-responsive-wrapper {
    overflow-x: auto;
    width: 100%;
}

.admin-table-ppdb {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    font-size: 0.85rem;
}

.admin-table-ppdb th {
    background-color: #f1f5f9;
    color: #475569;
    font-weight: 600;
    padding: 14px 16px;
    border-bottom: 1px solid #e2e8f0;
    white-space: nowrap;
}

.admin-table-ppdb td {
    padding: 14px 16px;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
    white-space: nowrap;
}

.admin-table-ppdb tr:hover td {
    background-color: #f8fafc;
}

/* Badge Tautan Download Berkas */
.btn-table-action {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 5px 10px;
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: 6px;
    text-decoration: none;
    background: #f1f5f9;
    color: #334155;
    border: 1px solid #cbd5e1;
    transition: all 0.2s;
}

.btn-table-action:hover {
    background: #e6f7ec;
    color: #0f6b3b;
    border-color: #0f6b3b;
}

.empty-state-box {
    padding: 40px;
    text-align: center;
    color: #94a3b8;
    font-size: 0.9rem;
}

@media screen and (max-width: 768px) {
    .stat-grid-layout { grid-template-columns: 1fr; }
    .admin-header-box { flex-direction: column; align-items: flex-start; }
    .btn-download-excel { width: 100%; justify-content: center; }
    .table-card-header { flex-direction: column; align-items: flex-start; }
    .search-wrapper-box { width: 100%; max-width: 100%; }
}
</style>

<div class="admin-ppdb-workspace">
    <div class="admin-ppdb-container">
        
        <div class="admin-header-box">
            <div>
                <h1><i class="fas fa-user-shield" style="margin-right: 6px;"></i> Panel Kendali PPDB</h1>
                <p>Manajemen data pendaftaran santri baru MI Al Karomah</p>
            </div>
            
            <?php if ($total_pendaftar > 0): ?>
                <a href="../data_pendaftar_ppdb.csv" class="btn-download-excel" download>
                    <i class="fas fa-file-excel" style="font-size: 1.1rem;"></i> Download Data PPDB (Excel)
                </a>
            <?php endif; ?>
        </div>

        <div class="stat-grid-layout">
            <div class="stat-card-item">
                <div class="stat-icon-circle total"><i class="fas fa-users"></i></div>
                <div class="stat-info-text">
                    <h3><?= $total_pendaftar; ?></h3>
                    <p>Total Pendaftar</p>
                </div>
            </div>
            <div class="stat-card-item">
                <div class="stat-icon-circle cowo"><i class="fas fa-mars"></i></div>
                <div class="stat-info-text">
                    <h3><?= $total_laki; ?></h3>
                    <p>Laki-Laki</p>
                </div>
            </div>
            <div class="stat-card-item">
                <div class="stat-icon-circle cewe"><i class="fas fa-venus"></i></div>
                <div class="stat-info-text">
                    <h3><?= $total_perempuan; ?></h3>
                    <p>Perempuan</p>
                </div>
            </div>
        </div>

        <div class="table-data-card">
            <div class="table-card-header">
                <h2><i class="fas fa-table" style="margin-right: 6px; color: #64748b;"></i> Preview Data Pendaftar Terbaru</h2>
                
                <?php if ($total_pendaftar > 0): ?>
                    <div class="search-wrapper-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="cari_ppdb" class="input-search-ppdb" placeholder="Cari berdasarkan Nama atau NIK...">
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="table-responsive-wrapper">
                <?php if ($total_pendaftar > 0): ?>
                    <table class="admin-table-ppdb" id="tabel_pendaftar">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Daftar</th>
                                <th>Nama Lengkap</th>
                                <th>NIK</th>
                                <th>L/P</th>
                                <th>No. WhatsApp</th>
                                <th>Dokumen KK</th>
                                <th>Dokumen Akta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($data_pendaftar as $pendaftar): 
                            ?>
                                <tr class="data-row">
                                    <td><b><?= $no++; ?></b></td>
                                    <td><?= $pendaftar[0]; ?></td> 
                                    <td class="search-nama"><b><?= $pendaftar[1]; ?></b></td> 
                                    <td class="search-nik">`<?= $pendaftar[2]; ?></td> 
                                    <td><?= $pendaftar[3]; ?></td> 
                                    <td><?= $pendaftar[10]; ?></td> 
                                    <td>
                                        <a href="<?= $pendaftar[11]; ?>" target="_blank" class="btn-table-action">
                                            <i class="fas fa-eye"></i> Lihat KK
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= $pendaftar[12]; ?>" target="_blank" class="btn-table-action">
                                            <i class="fas fa-eye"></i> Lihat Akta
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
                            <tr id="no_match_row" style="display: none;">
                                <td colspan="8" class="empty-state-box">
                                    <i class="fas fa-search-minus" style="font-size: 2rem; display:block; margin-bottom:10px; color:#cbd5e1;"></i>
                                    Data santri yang Anda cari tidak ditemukan.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-state-box">
                        <i class="fas fa-folder-open" style="font-size: 2.5rem; display:block; margin-bottom:10px; color:#cbd5e1;"></i>
                        Belum ada data pendaftar PPDB yang masuk ke server lokal.
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const inputSearch = document.getElementById("cari_ppdb");
    
    // Pastikan input pencarian ada di halaman sebelum menjalankan fungsi
    if (inputSearch) {
        inputSearch.addEventListener("keyup", function () {
            const keyword = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll("#tabel_pendaftar tbody .data-row");
            const noMatchRow = document.getElementById("no_match_row");
            let dataDitemukan = false;

            rows.forEach(function (row) {
                const nama = row.querySelector(".search-nama").textContent.toLowerCase();
                const nik = row.querySelector(".search-nik").textContent.toLowerCase();

                // Cek apakah kata kunci ada di teks nama atau NIK
                if (nama.includes(keyword) || nik.includes(keyword)) {
                    row.style.display = ""; // Tampilkan baris jika cocok
                    dataDitemukan = true;
                } else {
                    row.style.display = "none"; // Sembunyikan jika tidak cocok
                }
            });

            // Tampilkan pesan error jika tidak ada baris data yang cocok
            if (dataDitemukan) {
                noMatchRow.style.display = "none";
            } else {
                noMatchRow.style.display = "table-row";
            }
        });
    }
});
</script>
 
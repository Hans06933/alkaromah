<?php
session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include 'layout/header.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.ppdb-workspace {
    padding: 40px 20px;
    background: #f8fafc;
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
}

.ppdb-container {
    max-width: 1200px;
    margin: 0 auto;
}

.alert-box {
    padding: 18px 22px;
    border-radius: 12px;
    margin-bottom: 25px;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 12px;
}

.alert-success {
    background: #dcfce7;
    color: #166534;
    border: 1px solid #86efac;
}

.alert-error {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #fca5a5;
}

.ppdb-hero {
    background: linear-gradient(rgba(15, 107, 59, 0.85), rgba(15, 107, 59, 0.85)), url('assets/img/ppdb-banner.jpg');
    background-size: cover;
    background-position: center;
    border-radius: 20px;
    padding: 45px;
    color: white;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.ppdb-hero::before {
    content: '';
    position: absolute;
    width: 250px;
    height: 250px;
    background: rgba(255, 255, 255, 0.06);
    border-radius: 50%;
    top: -120px;
    right: -80px;
}

.ppdb-hero h1 {
    font-size: 38px;
    margin-bottom: 15px;
    position: relative;
    z-index: 2;
}

.ppdb-hero p {
    max-width: 700px;
    line-height: 1.8;
    color: #e2e8f0;
    position: relative;
    z-index: 2;
}

.ppdb-grid-layout {
    display: grid;
    grid-template-columns: 7fr 4fr;
    gap: 30px;
}

.ppdb-form-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
}

.ppdb-form-header {
    background: #f1f5f9;
    padding: 22px 25px;
    border-bottom: 1px solid #e2e8f0;
}

.ppdb-form-header h2 {
    font-size: 20px;
    color: #0f172a;
}

.ppdb-form-body {
    padding: 25px;
}

.form-section-divider {
    margin: 30px 0 18px;
    font-size: 14px;
    font-weight: 700;
    color: #0f6b3b;
    border-bottom: 2px solid #dcfce7;
    padding-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-section-divider:first-child {
    margin-top: 0;
}

.input-grid-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}

.input-group-block {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.input-group-block.full-width {
    grid-column: span 2;
}

.input-group-block label {
    font-size: 14px;
    font-weight: 600;
    color: #334155;
}

.input-group-block input,
.input-group-block textarea,
.input-group-block select {
    padding: 13px 15px;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    font-size: 14px;
    transition: 0.2s;
    background: white;
}

.input-group-block input:focus,
.input-group-block textarea:focus,
.input-group-block select:focus {
    border-color: #0f6b3b;
    box-shadow: 0 0 0 4px rgba(15, 107, 59, 0.08);
    outline: none;
}

.btn-submit-ppdb {
    width: 100%;
    border: none;
    background: linear-gradient(135deg, #0f6b3b, #14532d);
    color: white;
    padding: 15px;
    border-radius: 12px;
    margin-top: 30px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.btn-submit-ppdb:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(15, 107, 59, 0.15);
}

.ppdb-sidebar-panel {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.sidebar-widget {
    background: white;
    border-radius: 20px;
    padding: 25px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03);
}

.sidebar-widget h3 {
    font-size: 18px;
    margin-bottom: 18px;
    color: #0f172a;
}

.timeline-flow {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.timeline-step {
    display: flex;
    gap: 14px;
}

.step-number {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #dcfce7;
    color: #0f6b3b;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 700;
    flex-shrink: 0;
}

.step-text h4 {
    font-size: 14px;
    margin-bottom: 5px;
}

.step-text p {
    font-size: 13px;
    color: #64748b;
    line-height: 1.5;
}

.rules-list {
    padding-left: 18px;
}

.rules-list li {
    margin-bottom: 10px;
    line-height: 1.7;
    font-size: 14px;
    color: #475569;
}

.btn-wa-help {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    background: #25d366;
    color: white;
    text-decoration: none;
    padding: 14px;
    border-radius: 12px;
    font-weight: 600;
    transition: 0.2s;
}

.btn-wa-help:hover {
    background: #1fb85a;
}

@media (max-width: 992px) {
    .ppdb-grid-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .ppdb-hero {
        padding: 30px 22px;
    }
    
    .ppdb-hero h1 {
        font-size: 28px;
    }
    
    .input-grid-row {
        grid-template-columns: 1fr;
    }
    
    .input-group-block.full-width {
        grid-column: span 1;
    }
}

</style>

<div class="ppdb-workspace">
    <div class="ppdb-container">

        <?php
        if (isset($_SESSION['status_ppdb'])) {
            if ($_SESSION['status_ppdb'] == "sukses") {
                echo '
                <div class="alert-box alert-success">
                    <i class="fas fa-circle-check"></i>
                    Pendaftaran berhasil dikirim. Panitia akan segera memverifikasi data Anda.
                </div>';
            } elseif ($_SESSION['status_ppdb'] == "gagal_validasi") {
                echo '
                <div class="alert-box alert-error">
                    <i class="fas fa-circle-exclamation"></i>
                    Data tidak valid. Pastikan semua form terisi dengan benar.
                </div>';
            } elseif ($_SESSION['status_ppdb'] == "gagal_upload") {
                echo '
                <div class="alert-box alert-error">
                    <i class="fas fa-circle-exclamation"></i>
                    Upload file gagal. Silakan coba kembali.
                </div>';
            } elseif ($_SESSION['status_ppdb'] == "gagal_format") {
                echo '
                <div class="alert-box alert-error">
                    <i class="fas fa-circle-exclamation"></i>
                    Format file tidak didukung. Gunakan JPG, PNG atau PDF.
                </div>';
            } elseif ($_SESSION['status_ppdb'] == "gagal_ukuran") {
                echo '
                <div class="alert-box alert-error">
                    <i class="fas fa-circle-exclamation"></i>
                    Ukuran file terlalu besar. Maksimal 3MB.
                </div>';
            }
            unset($_SESSION['status_ppdb']);
        }
        ?>

        <div class="ppdb-hero">
            <h1>PPDB Online MI Al Karomah 2026/2027</h1>
            <p>
                Selamat datang di portal resmi Penerimaan Peserta Didik Baru MI Al Karomah.
                Silakan isi formulir pendaftaran dengan data yang benar sesuai dokumen resmi.
            </p>
        </div>

        <div class="ppdb-grid-layout">

            <div class="ppdb-main-form-column">
                <div class="ppdb-form-card">
                    <div class="ppdb-form-header">
                        <h2>
                            <i class="fas fa-user-graduate" style="color: #0f6b3b;"></i>
                            Formulir Pendaftaran
                        </h2>
                    </div>

                    <form action="proses_ppdb.php" method="POST" enctype="multipart/form-data" class="ppdb-form-body">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                        <div class="form-section-divider">1. Data Calon Siswa</div>

                        <div class="input-grid-row">
                            <div class="input-group-block full-width">
                                <label>Nama Lengkap *</label>
                                <input type="text" name="nama_lengkap" required>
                            </div>

                            <div class="input-group-block">
                                <label>NIK *</label>
                                <input type="text" name="nik" maxlength="16" required>
                            </div>

                            <div class="input-group-block">
                                <label>Jenis Kelamin *</label>
                                <select name="jk" required>
                                    <option value="">Pilih</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="input-group-block">
                                <label>Tempat Lahir *</label>
                                <input type="text" name="tempat_lahir" required>
                            </div>

                            <div class="input-group-block">
                                <label>Tanggal Lahir *</label>
                                <input type="date" name="tanggal_lahir" required>
                            </div>

                            <div class="input-group-block full-width">
                                <label>Alamat *</label>
                                <textarea name="alamat" rows="4" required></textarea>
                            </div>
                        </div>

                        <div class="form-section-divider">2. Data Orang Tua</div>

                        <div class="input-grid-row">
                            <div class="input-group-block">
                                <label>Nama Ayah *</label>
                                <input type="text" name="nama_ayah" required>
                            </div>

                            <div class="input-group-block">
                                <label>Nama Ibu *</label>
                                <input type="text" name="nama_ibu" required>
                            </div>

                            <div class="input-group-block">
                                <label>Pekerjaan *</label>
                                <input type="text" name="pekerjaan" required>
                            </div>

                            <div class="input-group-block">
                                <label>No WhatsApp *</label>
                                <input type="text" name="no_wa" required>
                            </div>
                        </div>

                        <div class="form-section-divider">3. Upload Berkas</div>

                        <div class="input-grid-row">
                            <div class="input-group-block">
                                <label>Upload KK *</label>
                                <input type="file" name="file_kk" accept=".jpg,.jpeg,.png,.pdf" required>
                            </div>

                            <div class="input-group-block">
                                <label>Upload Akta *</label>
                                <input type="file" name="file_akta" accept=".jpg,.jpeg,.png,.pdf" required>
                            </div>
                        </div>

                        <button type="submit" name="daftar_ppdb" class="btn-submit-ppdb">
                            <i class="fas fa-paper-plane"></i>
                            Kirim Pendaftaran
                        </button>
                    </form>
                </div>
            </div>

            <div class="ppdb-sidebar-panel">
                <div class="sidebar-widget">
                    <h3>Alur Pendaftaran</h3>
                    <div class="timeline-flow">
                        <div class="timeline-step">
                            <div class="step-number">1</div>
                            <div class="step-text">
                                <h4>Isi Form</h4>
                                <p>Lengkapi seluruh data calon siswa.</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="step-number">2</div>
                            <div class="step-text">
                                <h4>Upload Berkas</h4>
                                <p>Unggah KK dan Akta Kelahiran.</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="step-number">3</div>
                            <div class="step-text">
                                <h4>Verifikasi</h4>
                                <p>Panitia akan memeriksa data pendaftaran.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3>Syarat Pendaftaran</h3>
                    <ul class="rules-list">
                        <li>Usia minimal 6 tahun.</li>
                        <li>Data harus sesuai KK.</li>
                        <li>File upload maksimal 3MB.</li>
                        <li>Format file JPG, PNG, PDF.</li>
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3>Bantuan PPDB</h3>
                    <a href="https://wa.me/628123456789" target="_blank" class="btn-wa-help">
                        <i class="fab fa-whatsapp"></i>
                        Hubungi Panitia
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
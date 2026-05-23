<?php
// Mulai session jika diperlukan untuk flash message status pendaftaran
session_start();

 include 'layout/header.php'; 
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
/* ==========================================================================
   WORKSPACE SYSTEM & LAYOUT UTAMA PPDB
   ========================================================================== */
.ppdb-workspace {
    padding: 40px 20px;
    background-color: #f8fafc;
    font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    min-height: 100vh;
}

.ppdb-container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Hero Banner Selamat Datang */
.ppdb-hero {
    background: linear-gradient(135deg, #0f6b3b 0%, #1b4d32 100%);
    border-radius: 18px;
    padding: 35px;
    color: #ffffff;
    margin-bottom: 30px;
    box-shadow: 0 4px 15px rgba(15, 107, 59, 0.1);
}

.ppdb-hero h1 {
    font-size: 1.8rem;
    font-weight: 700;
    margin: 0 0 10px 0;
}

.ppdb-hero p {
    font-size: 0.9rem;
    line-height: 1.6;
    margin: 0;
    color: #cbd5e1;
}

/* Susunan Grid 2 Kolom (Form Kiri - Info Kanan) */
.ppdb-grid-layout {
    display: grid;
    grid-template-columns: 7fr 4fr;
    gap: 30px;
}

/* ==========================================================================
   SISI KIRI: DESAIN FORMULIR PENDAFTARAN
   ========================================================================== */
.ppdb-form-card {
    background: #ffffff;
    border-radius: 18px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 10px rgba(0,0,0,0.02);
    overflow: hidden;
}

.ppdb-form-header {
    background: #f1f5f9;
    padding: 20px 25px;
    border-bottom: 1px solid #e2e8f0;
}

.ppdb-form-header h2 {
    font-size: 1.15rem;
    color: #1e293b;
    margin: 0;
    font-weight: 700;
}

.ppdb-form-body {
    padding: 25px;
}

/* Pembagi Seksi di Dalam Form */
.form-section-divider {
    font-size: 0.85rem;
    font-weight: 700;
    color: #0f6b3b;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 30px 0 15px 0;
    padding-bottom: 6px;
    border-bottom: 2px solid #e2e8f0;
}

.form-section-divider:first-of-type {
    margin-top: 0;
}

/* Kontrol Grid Input */
.input-grid-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
}

.input-group-block {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.input-group-block.full-width {
    grid-column: span 2;
}

.input-group-block label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #475569;
}

.input-group-block input,
.input-group-block select,
.input-group-block textarea {
    padding: 10px 14px;
    font-size: 0.85rem;
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    background: #ffffff;
    color: #1e293b;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.input-group-block input:focus,
.input-group-block select:focus,
.input-group-block textarea:focus {
    border-color: #0f6b3b;
    outline: none;
    box-shadow: 0 0 0 3px rgba(15, 107, 59, 0.1);
}

/* Tombol Submit */
.btn-submit-ppdb {
    background: linear-gradient(135deg, #0f6b3b 0%, #1b4d32 100%);
    color: white;
    border: none;
    padding: 14px 20px;
    font-size: 0.9rem;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    margin-top: 25px;
    transition: opacity 0.2s;
}

.btn-submit-ppdb:hover {
    opacity: 0.95;
}

/* ==========================================================================
   SISI KANAN: PANEL INFORMASI & WIDGET
   ========================================================================== */
.ppdb-sidebar-panel {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.sidebar-widget {
    background: #ffffff;
    border-radius: 18px;
    padding: 22px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 10px rgba(0,0,0,0.02);
}

.sidebar-widget h3 {
    font-size: 1rem;
    font-weight: 700;
    color: #1e293b;
    margin: 0 0 15px 0;
    border-left: 4px solid #facc15;
    padding-left: 10px;
}

/* Alur List Pendaftaran */
.timeline-flow {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.timeline-step {
    display: flex;
    gap: 12px;
}

.step-number {
    flex: 0 0 26px;
    height: 26px;
    background: #e6f7ec;
    color: #0f6b3b;
    border-radius: 50%;
    font-weight: 700;
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.step-text h4 {
    margin: 0 0 3px 0;
    font-size: 0.85rem;
    color: #1e293b;
}

.step-text p {
    margin: 0;
    font-size: 0.75rem;
    color: #64748b;
    line-height: 1.4;
}

/* Persyaratan List */
.rules-list {
    padding-left: 18px;
    margin: 0;
}

.rules-list li {
    font-size: 0.8rem;
    color: #475569;
    margin-bottom: 8px;
    line-height: 1.5;
}

/* Tombol Bantuan WhatsApp */
.btn-wa-help {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: #25d366;
    color: white;
    text-decoration: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 600;
    text-align: center;
    transition: background 0.2s;
}

.btn-wa-help:hover {
    background: #1ebd54;
}

/* ==========================================================================
   RESPONSIVE CONTROL (MOBILE OPTIMIZATION)
   ========================================================================== */
@media screen and (max-width: 992px) {
    .ppdb-grid-layout {
        grid-template-columns: 1fr;
    }
}

@media screen and (max-width: 600px) {
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
        
        <div class="ppdb-hero">
            <h1>Penerimaan Peserta Didik Baru (PPDB) Online</h1>
            <p>Selamat datang di portal pendaftaran online MI Al Karomah. Silakan isi seluruh data formulir di bawah ini dengan lengkap, jujur, dan valid sesuai berkas resmi Kartu Keluarga (KK).</p>
        </div>

        <div class="ppdb-grid-layout">
            
            <div class="ppdb-main-form-column">
                <div class="ppdb-form-card">
                    <div class="ppdb-form-header">
                        <h2><i class="fas fa-wpforms" style="color: #0f6b3b; margin-right: 6px;"></i> Form Pendaftaran Santri Baru</h2>
                    </div>
                    
                    <form action="proses_ppdb.php" method="POST" enctype="multipart/form-data" class="ppdb-form-body">
                        
                        <div class="form-section-divider">1. Data Calon Siswa</div>
                        <div class="input-grid-row">
                            <div class="input-group-block full-width">
                                <label for="nama_lengkap">Nama Lengkap Siswa *</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Contoh: Ahmad Fauzi" required>
                            </div>
                            
                            <div class="input-group-block">
                                <label for="nik">NIK Siswa (Cek di KK) *</label>
                                <input type="number" id="nik" name="nik" placeholder="16 digit NIK" required>
                            </div>

                            <div class="input-group-block">
                                <label for="jk">Jenis Kelamin *</label>
                                <select id="jk" name="jk" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="input-group-block">
                                <label for="tempat_lahir">Tempat Lahir *</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Contoh: Tasikmalaya" required>
                            </div>

                            <div class="input-group-block">
                                <label for="tanggal_lahir">Tanggal Lahir *</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>

                            <div class="input-group-block full-width">
                                <label for="alamat">Alamat Domisili Lengkap *</label>
                                <textarea id="alamat" name="alamat" rows="3" placeholder="Nama Jalan, Kampung/Dusun, RT/RW, Desa, Kecamatan" required></textarea>
                            </div>
                        </div>

                        <div class="form-section-divider">2. Data Orang Tua / Wali</div>
                        <div class="input-grid-row">
                            <div class="input-group-block">
                                <label for="nama_ayah">Nama Ayah Kandung *</label>
                                <input type="text" id="nama_ayah" name="nama_ayah" required>
                            </div>

                            <div class="input-group-block">
                                <label for="nama_ibu">Nama Ibu Kandung *</label>
                                <input type="text" id="nama_ibu" name="nama_ibu" required>
                            </div>

                            <div class="input-group-block">
                                <label for="pekerjaan">Pekerjaan Utama Orang Tua *</label>
                                <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Misal: Wiraswasta, PNS, Buruh" required>
                            </div>

                            <div class="input-group-block">
                                <label for="no_wa">No. HP / WhatsApp Aktif *</label>
                                <input type="tel" id="no_wa" name="no_wa" placeholder="Contoh: 081234567890" required>
                            </div>
                        </div>

                        <div class="form-section-divider">3. Upload Berkas Pendukung (Format: JPG/PNG/PDF)</div>
                        <div class="input-grid-row">
                            <div class="input-group-block">
                                <label for="file_kk">Scan Kartu Keluarga (KK) *</label>
                                <input type="file" id="file_kk" name="file_kk" accept="image/*,application/pdf" required>
                            </div>

                            <div class="input-group-block">
                                <label for="file_akta">Scan Akta Kelahiran *</label>
                                <input type="file" id="file_akta" name="file_akta" accept="image/*,application/pdf" required>
                            </div>
                        </div>

                        <button type="submit" name="daftar_ppdb" class="btn-submit-ppdb">
                            <i class="fas fa-paper-plane" style="margin-right: 6px;"></i> Kirim Data Pendaftaran
                        </button>
                    </form>
                </div>
            </div>

            <div class="ppdb-sidebar-panel">
                
                <div class="sidebar-widget">
                    <h3><i class="fas fa-route" style="color: #0f6b3b; margin-right: 4px;"></i> Alur Pendaftaran</h3>
                    <div class="timeline-flow">
                        <div class="timeline-step">
                            <div class="step-number">1</div>
                            <div class="step-text">
                                <h4>Isi Formulir Online</h4>
                                <p>Lengkapi formulir di samping dengan data KK asli.</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="step-number">2</div>
                            <div class="step-text">
                                <h4>Verifikasi Berkas</h4>
                                <p>Panitia mengecek berkas file upload dalam waktu 2-3 hari kerja.</p>
                            </div>
                        </div>
                        <div class="timeline-step">
                            <div class="step-number">3</div>
                            <div class="step-text">
                                <h4>Pengumuman SK</h4>
                                <p>Status penerimaan dikirim langsung melalui nomor WhatsApp aktif.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3><i class="fas fa-clipboard-list" style="color: #0f6b3b; margin-right: 4px;"></i> Syarat Pendaftaran</h3>
                    <ul class="rules-list">
                        <li>Calon siswa minimal berusia 6 tahun pada Juli 2026.</li>
                        <li>Mengunggah foto/scan KK asli (tidak buram).</li>
                        <li>Mengunggah foto/scan Akta Kelahiran asli.</li>
                        <li>Menyerahkan pas foto fisik 3x4 (2 lembar) saat daftar ulang secara offline.</li>
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3><i class="fas fa-headset" style="color: #0f6b3b; margin-right: 4px;"></i> Layanan Bantuan</h3>
                    <p style="font-size: 0.8rem; line-height: 1.5; color: #64748b; margin: 0 0 15px 0;">
                        Ada kendala atau pertanyaan seputar PPDB MI Al Karomah? Hubungi panitia via WhatsApp resmi kami:
                    </p>
                    <a href="https://wa.me/628123456789" target="_blank" class="btn-wa-help">
                        <i class="fab fa-whatsapp" style="font-size: 1.1rem;"></i> Chat Panitia PPDB
                    </a>
                </div>

            </div>

        </div> </div>
</div>

<?php
 include 'layout/footer.php'; 
?>
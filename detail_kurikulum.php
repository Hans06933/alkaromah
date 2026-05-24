<?php include 'layout/header.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.kurikulum-detail-wrapper {
    padding: 80px 20px;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    font-family: 'Poppins', 'Segoe UI', sans-serif;
    min-height: 100vh;
}

.kurikulum-detail-container {
    max-width: 1200px;
    margin: 0 auto;
}

.kurikulum-hero {
    background: linear-gradient(145deg, #0a5c33 0%, #0f6b3b 50%, #14532d 100%);
    border-radius: 32px;
    padding: 60px 70px;
    color: white;
    position: relative;
    overflow: hidden;
    margin-bottom: 50px;
    box-shadow: 0 20px 40px rgba(15, 107, 59, 0.25);
}

.kurikulum-hero::before {
    content: '';
    position: absolute;
    right: -60px;
    top: -60px;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.06);
    border-radius: 50%;
}

.kurikulum-hero::after {
    content: '';
    position: absolute;
    left: -40px;
    bottom: -40px;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.04);
    border-radius: 50%;
}

.kurikulum-tag {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(250, 204, 21, 0.2);
    backdrop-filter: blur(4px);
    padding: 8px 20px;
    border-radius: 100px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 25px;
    border: 1px solid rgba(250, 204, 21, 0.3);
}

.kurikulum-tag::before {
    content: '📜';
    font-size: 12px;
}

.kurikulum-hero h1 {
    font-size: 52px;
    margin-bottom: 20px;
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: -0.5px;
}

.kurikulum-hero p {
    font-size: 17px;
    line-height: 1.8;
    color: #e2e8f0;
    max-width: 750px;
}

.kurikulum-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 35px;
}

.detail-card {
    background: white;
    border-radius: 28px;
    padding: 40px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
    margin-bottom: 30px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid rgba(226, 232, 240, 0.6);
}

.detail-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 40px rgba(15, 107, 59, 0.08);
}

.detail-card h2 {
    font-size: 28px;
    color: #0f172a;
    margin-bottom: 20px;
    font-weight: 700;
    position: relative;
    padding-bottom: 12px;
}

.detail-card h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #facc15, #0f6b3b);
    border-radius: 3px;
}

.detail-card p {
    color: #475569;
    line-height: 1.9;
    margin-bottom: 18px;
    font-size: 15px;
}

.regulasi-card {
    background: linear-gradient(135deg, #fefce8, #fef9c3);
    border-left: 6px solid #facc15;
}

.regulasi-card h2::after {
    background: linear-gradient(90deg, #facc15, #eab308);
}

.regulasi-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #facc15;
    color: #0f172a;
    padding: 6px 14px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 20px;
}

.regulasi-list {
    list-style: none;
    padding: 0;
    margin: 15px 0 0 0;
}

.regulasi-list li {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #e2e8f0;
    font-size: 14px;
    color: #334155;
}

.regulasi-list li:last-child {
    border-bottom: none;
}

.regulasi-list li i {
    color: #0f6b3b;
    font-size: 16px;
    margin-top: 2px;
    flex-shrink: 0;
}

.regulasi-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #0f6b3b;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
    margin-left: 28px;
    margin-top: 6px;
    transition: all 0.3s ease;
}

.regulasi-link:hover {
    gap: 10px;
    text-decoration: underline;
    color: #14532d;
}

.regulasi-link i {
    font-size: 11px;
    color: #facc15;
}

.kurikulum-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-top: 10px;
}

.kurikulum-list-item {
    display: flex;
    align-items: flex-start;
    gap: 18px;
    background: #f8fafc;
    padding: 20px 22px;
    border-radius: 20px;
    transition: all 0.3s ease;
    border: 1px solid #e2e8f0;
}

.kurikulum-list-item:hover {
    background: #ffffff;
    border-color: #cbd5e1;
    transform: translateX(6px);
}

.kurikulum-list-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #dcfce7, #bbf7d0);
    color: #0f6b3b;
    border-radius: 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    flex-shrink: 0;
}

.kurikulum-list-text h4 {
    margin: 0 0 8px 0;
    color: #0f172a;
    font-size: 17px;
    font-weight: 700;
}

.kurikulum-list-text p {
    margin: 0;
    font-size: 14px;
    color: #64748b;
    line-height: 1.6;
}

.sidebar-card {
    background: white;
    border-radius: 28px;
    padding: 35px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
    margin-bottom: 30px;
    border: 1px solid rgba(226, 232, 240, 0.6);
    transition: transform 0.3s ease;
}

.sidebar-card:hover {
    transform: translateY(-4px);
}

.sidebar-card h3 {
    margin-bottom: 20px;
    color: #0f172a;
    font-size: 22px;
    font-weight: 700;
    position: relative;
    padding-bottom: 10px;
}

.sidebar-card h3::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 40px;
    height: 3px;
    background: #facc15;
    border-radius: 3px;
}

.info-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info-list li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 0;
    border-bottom: 1px solid #f1f5f9;
    font-size: 15px;
}

.info-list li:last-child {
    border-bottom: none;
}

.info-list li span {
    color: #64748b;
    font-weight: 500;
}

.info-list li b {
    color: #0f172a;
    font-weight: 700;
    background: #f1f5f9;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 13px;
}

.btn-kembali {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, #0f6b3b, #14532d);
    color: white;
    text-decoration: none;
    padding: 14px 28px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
    width: 100%;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(15, 107, 59, 0.2);
}

.btn-kembali:hover {
    transform: translateY(-3px);
    background: linear-gradient(135deg, #14532d, #0f6b3b);
    box-shadow: 0 8px 20px rgba(15, 107, 59, 0.3);
}

@media (max-width: 992px) {
    .kurikulum-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .kurikulum-hero {
        padding: 40px 35px;
    }
    
    .kurikulum-hero h1 {
        font-size: 38px;
    }
}

@media (max-width: 768px) {
    .kurikulum-detail-wrapper {
        padding: 50px 16px;
    }
    
    .kurikulum-hero {
        padding: 30px 25px;
        border-radius: 24px;
    }
    
    .kurikulum-hero h1 {
        font-size: 28px;
    }
    
    .kurikulum-hero p {
        font-size: 14px;
    }
    
    .detail-card,
    .sidebar-card {
        padding: 25px 20px;
        border-radius: 20px;
    }
    
    .detail-card h2 {
        font-size: 22px;
    }
    
    .kurikulum-list-item {
        padding: 15px;
    }
    
    .kurikulum-list-icon {
        width: 40px;
        height: 40px;
        font-size: 16px;
        border-radius: 12px;
    }
    
    .kurikulum-list-text h4 {
        font-size: 15px;
    }
    
    .sidebar-card h3 {
        font-size: 18px;
    }
    
    .info-list li {
        padding: 12px 0;
        font-size: 13px;
    }
    
    .btn-kembali {
        padding: 12px 20px;
        font-size: 14px;
    }
    
    .regulasi-list li {
        font-size: 12px;
        padding: 10px 0;
    }
    
    .regulasi-link {
        font-size: 10px;
        margin-left: 24px;
    }
}

[data-aos] {
    opacity: 0;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

[data-aos].aos-animate {
    opacity: 1;
}
</style>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
        easing: 'ease-out-cubic'
    });
</script>

<div class="kurikulum-detail-wrapper">
    <div class="kurikulum-detail-container">

        <div class="kurikulum-hero" data-aos="fade-up" data-aos-duration="800">
            <span class="kurikulum-tag">Kurikulum MI Al Karomah</span>
            <h1>Kurikulum Merdeka</h1>
            <p>
                MI Al Karomah menerapkan Kurikulum Merdeka sebagai upaya membangun generasi yang berkarakter, 
                mandiri, kreatif, dan memiliki kemampuan akademik serta spiritual yang seimbang.
            </p>
        </div>

        <div class="kurikulum-grid">
            <div>
                <div class="detail-card" data-aos="fade-up" data-aos-delay="0">
                    <h2>Konsep Pembelajaran</h2>
                    <p>
                        Kurikulum Merdeka memberikan keleluasaan kepada guru untuk menciptakan pembelajaran 
                        yang menyenangkan, fleksibel, dan sesuai kebutuhan siswa.
                    </p>
                    <p>
                        Pembelajaran tidak hanya fokus pada akademik, tetapi juga penguatan karakter, 
                        keterampilan sosial, kreativitas, dan kemampuan berpikir kritis.
                    </p>
                </div>

                <div class="detail-card regulasi-card" data-aos="fade-up" data-aos-delay="50">
                    <div class="regulasi-badge">
                        <i class="fas fa-gavel"></i> Landasan Hukum & Regulasi
                    </div>
                    <h2>Dasar Hukum Kurikulum Merdeka</h2>
                    <p>
                        Kurikulum Merdeka diterapkan berdasarkan regulasi resmi dari Kementerian Pendidikan, 
                        Kebudayaan, Riset, dan Teknologi (Kemendikbudristek) Republik Indonesia.
                    </p>
                    
                    <ul class="regulasi-list">
                        <li>
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <strong>Kepmendikbudristek No. 56/M/2022</strong> - Pedoman Penerapan Kurikulum dalam rangka Pemulihan Pembelajaran
                                <a href="https://lmsspada.kemdiktisaintek.go.id/pluginfile.php/711611/mod_resource/content/1/Kebijakan_Kurikulum_Merdeka.pdf" target="_blank" class="regulasi-link">
                                    <i class="fas fa-external-link-alt"></i> Lihat Dokumen
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-file-alt"></i>
                            <div>
                                <strong>Kepmendikbudristek No. 262/M/2022</strong> - Perubahan atas Kepmendikbudristek No. 56/M/2022
                                <a href="https://lmsspada.kemdiktisaintek.go.id/pluginfile.php/711611/mod_resource/content/1/Kebijakan_Kurikulum_Merdeka.pdf" target="_blank" class="regulasi-link">
                                    <i class="fas fa-external-link-alt"></i> Lihat Dokumen
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-scroll"></i>
                            <div>
                                <strong>Permendikbudristek No. 7 Tahun 2022</strong> - Standar Isi pada PAUD, Pendidikan Dasar, dan Pendidikan Menengah
                                <a href="https://jdih.kemdikbud.go.id/dokumen/salinan/Permendikbudristek%20Nomor%207%20Tahun%202022%20JDIH.pdf" target="_blank" class="regulasi-link">
                                    <i class="fas fa-external-link-alt"></i> Lihat Dokumen
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-chalkboard-user"></i>
                            <div>
                                <strong>SK Dirjen Pendis No. 3211 Tahun 2022</strong> - Capaian Pembelajaran PAI dan Bahasa Arab Kurikulum Merdeka pada Madrasah
                                <a href="https://pendis.kemenag.go.id/pai/dokumen/SK-Dirjen-Pendis-3211-2022.pdf" target="_blank" class="regulasi-link">
                                    <i class="fas fa-external-link-alt"></i> Lihat Dokumen
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="detail-card" data-aos="fade-up" data-aos-delay="100">
                    <h2>Program Unggulan Kurikulum</h2>
                    <div class="kurikulum-list">
                        <div class="kurikulum-list-item" data-aos="fade-right" data-aos-delay="150">
                            <div class="kurikulum-list-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="kurikulum-list-text">
                                <h4>Pembelajaran Berdiferensiasi</h4>
                                <p>Guru menyesuaikan metode belajar sesuai kemampuan dan karakter siswa.</p>
                            </div>
                        </div>
                        <div class="kurikulum-list-item" data-aos="fade-right" data-aos-delay="250">
                            <div class="kurikulum-list-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="kurikulum-list-text">
                                <h4>Projek P5</h4>
                                <p>Penguatan Profil Pelajar Pancasila melalui kegiatan kreatif dan kolaboratif.</p>
                            </div>
                        </div>
                        <div class="kurikulum-list-item" data-aos="fade-right" data-aos-delay="350">
                            <div class="kurikulum-list-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="kurikulum-list-text">
                                <h4>Asesmen Berkelanjutan</h4>
                                <p>Evaluasi dilakukan secara bertahap untuk memantau perkembangan siswa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="sidebar-card" data-aos="fade-left" data-aos-delay="0">
                    <h3>Informasi Kurikulum</h3>
                    <ul class="info-list">
                        <li><span>Kurikulum</span><b>Merdeka</b></li>
                        <li><span>Jenjang</span><b>Madrasah Ibtidaiyah</b></li>
                        <li><span>Fokus</span><b>Karakter & Akademik</b></li>
                        <li><span>Metode</span><b>Interaktif</b></li>
                        <li><span>Tahun Ajaran</span><b>2024/2025</b></li>
                        <li><span>Status</span><b>Berlaku</b></li>
                    </ul>
                </div>

                <div class="sidebar-card" data-aos="fade-left" data-aos-delay="50">
                    <h3>Prinsip Kurikulum Merdeka</h3>
                    <ul class="regulasi-list" style="margin-top: 0;">
                        <li><i class="fas fa-check-circle" style="color:#0f6b3b;"></i> Berpusat pada peserta didik</li>
                        <li><i class="fas fa-check-circle" style="color:#0f6b3b;"></i> Pembelajaran kontekstual dan bermakna</li>
                        <li><i class="fas fa-check-circle" style="color:#0f6b3b;"></i> Fleksibilitas bagi guru dan sekolah</li>
                        <li><i class="fas fa-check-circle" style="color:#0f6b3b;"></i> Penguatan karakter Profil Pelajar Pancasila</li>
                        <li><i class="fas fa-check-circle" style="color:#0f6b3b;"></i> Asesmen autentik dan berkelanjutan</li>
                    </ul>
                </div>

                <div class="sidebar-card" data-aos="fade-left" data-aos-delay="100">
                    <h3>Sumber Daya & Panduan</h3>
                    <ul class="regulasi-list" style="margin-top: 0;">
                        <li>
                            <i class="fas fa-globe"></i>
                            <div>
                                <strong>Portal Resmi Kurikulum Merdeka</strong>
                                <a href="https://kurikulum.kemdikbud.go.id/" target="_blank" class="regulasi-link">
                                    <i class="fas fa-external-link-alt"></i> Kunjungi Portal
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-download"></i>
                            <div>
                                <strong>Platform Merdeka Mengajar (PMM)</strong>
                                <a href="https://guru.kemdikbud.go.id/" target="_blank" class="regulasi-link">
                                    <i class="fas fa-external-link-alt"></i> Kunjungi Platform
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-download"></i>
                            <div>
                                <strong>Buku Panduan & Perangkat Ajar</strong>
                                <a href="https://buku.kemdikbud.go.id/" target="_blank" class="regulasi-link">
                                    <i class="fas fa-external-link-alt"></i> Akses Buku
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-card" data-aos="fade-left" data-aos-delay="150">
                    <h3>Kembali</h3>
                    <a href="index.php" class="btn-kembali">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
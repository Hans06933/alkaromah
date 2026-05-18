<?php
?>
<footer>
    <div class="footer-container">
        
        <div class="footer-column brand-column">
            <div class="footer-brand-wrapper">
                <div class="footer-logo-container">
                    <div class="footer-logo-img">
                        <img src="img/logo.png" alt="Logo" width="40" height="40">
                    </div>
                    <div class="footer-logo-text">
                        <h3>MI AL KAROMAH</h3>
                        <span class="tagline-text">اهلا ؤ سهلا</span>
                    </div>
                </div>
                
                <div class="footer-line"></div>
                <p class="brand-desc">Madrasah Ibtidaiyah Al Karomah berkomitmen mencetak generasi yang unggul dalam prestasi, berwawasan IPTEK, dan kokoh dalam IMTAQ berlandaskan akhlakul karimah.</p>
            </div>
            <div class="footer-socials">
                <a href="fb://facewebmodal/fpage?id=YOUR_FB_PAGE_ID" data-desktop="https://facebook.com/YOUR_FB_PAGE" target="_blank" class="f-social-icon fb" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="instagram://user?username=mialkaromah" data-desktop="https://instagram.com/mialkaromah" target="_blank" class="f-social-icon ig" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="vnd.youtube://www.youtube.com/user/YOUR_CHANNEL" data-desktop="https://youtube.com/c/YOUR_CHANNEL" target="_blank" class="f-social-icon yt" title="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>

        <div class="footer-column links-column">
            <h3>Tautan Cepat</h3>
            <div class="footer-line"></div>
            <ul class="quick-links">
                <li><a href="#beranda"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                <li><a href="#profil"><i class="fas fa-chevron-right"></i> Profil Madrasah</a></li>
                <li><a href="#akademik"><i class="fas fa-chevron-right"></i> Akademik</a></li>
                <li><a href="#ppdb"><i class="fas fa-chevron-right"></i> PPDB</a></li>
                <li><a href="#kontak"><i class="fas fa-chevron-right"></i> Kontak Form</a></li>
            </ul>
        </div>

        <div class="footer-column contact-column">
            <h3>Hubungi Kami</h3>
            <div class="footer-line"></div>
            <div class="footer-info">
                <a href="https://maps.google.com/?q=MI+Al+Karomah" target="_blank" class="footer-link">
                    <span class="icon-wrapper">📍</span> 
                    <span class="text-wrapper">Jl Al Karomah No 01, Desa Karomah</span>
                </a>
                <a href="tel:025112345678" class="footer-link">
                    <span class="icon-wrapper">📞</span> 
                    <span class="text-wrapper">(0251) 1234 5678</span>
                </a>
                <a href="mailto:info@mialkaromah.sch.id" class="footer-link">
                    <span class="icon-wrapper">✉</span> 
                    <span class="text-wrapper">info@mialkaromah.sch.id</span>
                </a>
            </div>
        </div>

        <div class="footer-divider"></div>
        <div class="footer-copyright">
            © 2024 MI Al Karomah. All Rights Reserved.
        </div>
    </div>
</footer>

    <style>
        /* Gaya untuk footer (jika belum ada di file terpisah) */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }
        footer {
        background: #054e2d; 
        color: #f1f5f9;
        padding: 60px 7% 25px;
        font-size: 14px;
        border-top: 5px solid #facc15;
    }

    .footer-container {
        display: grid;
        /* Membagi rata menjadi 3 kolom layout profesional di laptop */
        grid-template-columns: 1.2fr 0.8fr 1fr;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-column h3 {
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }

    /* Garis dekoratif kecil di bawah setiap judul kolom */
    .footer-line {
        width: 40px;
        height: 3px;
        background: #facc15;
        border-radius: 2px;
        margin-bottom: 20px;
    }

    /* Kolom 1: Profil */
    /* ==========================================================================
   STYLE BRAND FOOTER (MENGIKUTI LOGO DAN TAGLINE BARU)
   ========================================================================== */
    .footer-brand-wrapper {
        max-width: 400px; /* Batasi lebar agar deskripsi footer proporsional */
    }

    /* Kontainer Utama Logo + Teks Bersanding Horizontal */
    .footer-logo-container {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 15px;
    }

    /* Kotak Penahan Logo Kemenag */
    .footer-logo-img {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .footer-logo-img img {
        width: 30px;
        height: 30px;
        object-fit: contain;
    }

    /* Susunan Teks Vertikal di Sebelah Kiri */
    .footer-logo-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .footer-logo-text .sub-top-title {
        font-size: 0.75rem;
        font-weight: 700;
        color: #ffffff;
        letter-spacing: 0.5px;
        line-height: 1;
        margin-bottom: 2px;
    }

    .footer-logo-text h3 {
        font-size: 1.5rem;
        font-weight: 800;
        color: #ffffff;
        margin: 0 !important;
        line-height: 1.1;
        letter-spacing: 0.5px;
    }

    /* Slogan Berilmu, Berakhlak, Berprestasi Sesuai Gambar */
    .footer-logo-text .tagline-text {
        font-size: 0.85rem;
        font-weight: 500;
        color: #facc15; /* Kuning/Emas cerah sesuai gambar */
        margin-top: 4px;
        letter-spacing: 0.2px;
    }

    /* Garis Pembatas Halus */
    .footer-line {
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        margin: 15px 0;
        width: 100%;
    }

    /* Deskripsi Singkat */
    .brand-desc {
        font-size: 0.9rem;
        line-height: 1.6;
        color: #cbd5e1;
        margin: 0 0 25px 0;
    }

    /* ==========================================================================
   OPTIMASI RESPONSIVE SMARTPHONE (max-width: 768px)
   ========================================================================== */
@media screen and (max-width: 768px) {
    /* 1. Mengatur kontainer logo agar hemat ruang & tidak meluber di layout 3 kolom */
    .footer-logo-container {
        justify-content: flex-start !important;
        gap: 8px !important; /* Jarak antara logo dan teks dipersempit */
        margin-bottom: 0 !important; /* Hilangkan margin bawah karena deskripsi dihapus */
    }

    /* 2. Memperkecil ukuran SVG logo agar pas dengan kolom sempit HP */
    .footer-logo-img svg {
        width: 28px !important;
        height: 28px !important;
    }

    /* 3. Menyesuaikan skala teks agar rapi dan tidak patah berantakan */
    .footer-logo-text .sub-top-title {
        font-size: 0.6rem !important; /* Dikecilkan agar tetap satu baris */
        letter-spacing: 0.2px !important;
    }

    .footer-logo-text h3 {
        font-size: 1rem !important; /* Ukuran kompak untuk nama sekolah */
        font-weight: 700 !important;
    }

    .footer-logo-text .tagline-text {
        font-size: 0.65rem !important; /* Ukuran teks slogan yang pas di ruang kecil */
        margin-top: 2px !important;
    }

    /* 4. MENGHILANGKAN GARIS DAN DESKRIPSI TOTAL DI HP */
    .footer-line,
    .brand-desc {
        display: none !important; /* Menyembunyikan elemen sesuai permintaan */
    }
}

    /* Penataan Grup Media Sosial */
    .footer-socials {
        display: flex;
        gap: 12px;
    }

    .f-social-icon {
        width: 38px;
        height: 38px;
        background: rgba(255, 255, 255, 0.08);
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .f-social-icon:hover {
        transform: translateY(-4px);
        color: white;
    }
    .f-social-icon.fb:hover { background: #1877F2; box-shadow: 0 4px 15px rgba(24, 119, 242, 0.4); }
    .f-social-icon.ig:hover { background: #E1306C; box-shadow: 0 4px 15px rgba(225, 48, 108, 0.4); }
    .f-social-icon.yt:hover { background: #FF0000; box-shadow: 0 4px 15px rgba(255, 0, 0, 0.4); }

    /* Kolom 2: Tautan Cepat */
    .quick-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .quick-links li {
        margin-bottom: 12px;
    }

    .quick-links a {
        color: #cbd5e1;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .quick-links a i {
        font-size: 10px;
        color: #facc15;
        transition: transform 0.2s;
    }

    .quick-links a:hover {
        color: #ffffff;
    }

    .quick-links a:hover i {
        transform: translateX(4px); /* Efek panah bergeser saat link disorot */
    }

    /* Kolom 3: Kontak */
    .footer-info {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .footer-link {
        color: #cbd5e1;
        text-decoration: none;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        transition: color 0.2s ease;
        line-height: 1.4;
    }

    .icon-wrapper {
        font-size: 16px;
        flex-shrink: 0;
    }

    .footer-link:hover {
        color: #facc15;
    }

    /* Area Bawah: Copyright */
    .footer-divider {
        grid-column: span 3; /* Memaksa garis melintang memotong penuh 3 kolom */
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        margin: 20px 0 5px 0;
    }

    .footer-copyright {
        grid-column: span 3;
        text-align: center;
        font-size: 12px;
        color: #94a3b8;
    }

    /* ==========================================================================
    OPTIMASI FOOTER KHUSUS SMARTPHONE (max-width: 768px)
    Kunci: Berjejer ke Samping Menjadi 3 Kolom Mikro
    ========================================================================== */
    @media (max-width: 768px) {
        footer {
            padding: 25px 3% 15px !important; /* Padding sangat tipis agar ruang horizontal maksimal */
        }

        .footer-container {
            /* KUNCI UTAMA: Memaksa grid membagi layar HP menjadi 3 kolom ke samping */
            display: grid !important;
            grid-template-columns: 1.1fr 0.9fr 1fr !important; 
            gap: 10px !important; /* Jarak antar kolom dibuat sekecil mungkin agar tidak luber */
            text-align: left !important; /* Kembalikan text-align ke kiri */
            align-items: start !important;
        }

        .footer-column {
            display: block !important; /* Kembalikan ke block layout */
            text-align: left !important;
        }

        .footer-column h3 {
            font-size: 11px !important; /* Font judul kolom dibuat sangat kecil */
            margin-bottom: 6px !important;
        }

        .footer-line {
            width: 20px !important; /* Memperpendek garis dekorasi */
            height: 2px !important;
            margin-bottom: 10px !important;
        }

        /* --- KOLOM 1: TITLE & SOSMED (KIRI) --- */
        .brand-desc {
            font-size: 9px !important; /* Font deskripsi dibuat mikro */
            line-height: 1.3 !important;
            margin-bottom: 10px !important;
            max-width: 100% !important;
        }

        .footer-socials {
            gap: 6px !important; /* Merapatkan jarak antar icon sosmed */
        }

        .f-social-icon {
            width: 24px !important; /* Memperkecil ukuran lingkaran sosmed agar muat */
            height: 24px !important;
            font-size: 11px !important;
        }

        /* --- KOLOM 2: TAUTAN CEPAT (TENGAH) --- */
        .quick-links {
            width: 100% !important;
        }
        
        .quick-links li {
            margin-bottom: 6px !important; /* Merapatkan jarak antar baris link */
        }
        
        .quick-links a {
            font-size: 9px !important; /* Font link tengah dibuat mikro */
            padding: 0 !important;
            justify-content: flex-start !important; /* Tetap rata kiri */
            gap: 4px !important;
        }
        
        .quick-links a i {
            font-size: 7px !important; /* Memperkecil icon panah */
        }

        /* --- KOLOM 3: HUBUNGI KAMI (KANAN) --- */
        .footer-info {
            align-items: flex-start !important; /* Rata kiri penuh */
            width: 100% !important;
            gap: 8px !important; /* Jarak antar informasi rapat */
        }

        .footer-link {
            font-size: 9px !important; /* Font informasi kanan dibuat mikro */
            flex-direction: row !important; /* KUNCI: Paksa emoji dan teks tetap sejajar kesamping */
            align-items: flex-start !important;
            text-align: left !important;
            gap: 6px !important;
            width: 100% !important;
        }

        .icon-wrapper {
            font-size: 10px !important; /* Ukuran emoji kontak mengecil */
        }

        /* --- AREA BAWAH: COPYRIGHT & DIVIDER --- */
        .footer-divider {
            grid-column: span 3 !important; /* Memaksa garis melintang memotong penuh 3 kolom mikro */
            margin: 15px 0 5px 0 !important;
        }

        .footer-copyright {
            grid-column: span 3 !important; /* Memaksa teks hak cipta memenuhi dasar footer */
            font-size: 9px !important;
            text-align: center !important;
        }
    }
    </style>
</body>
</html>
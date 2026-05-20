<?php
include 'layout/header.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>MI Al Karomah - Madrasah Hebat Bermartabat</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        /* ---------- RESET & GLOBAL ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f8f7f2;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        /* ---------- HERO SECTION (Final) ---------- */
        .hero {
            padding: 40px 7% 20px;
            position: relative;
        }

        .hero-container {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr; /* proporsi teks : gambar */
            align-items: center;
            background: #fdfcf7;
            border-radius: 35px;
            overflow: hidden;
            position: relative;
            min-height: 500px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        /* Background Hijau Lengkung di sisi kanan */
        .hero-container::before {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 55%;
            height: 100%;
            background: linear-gradient(135deg, #0f6b3b, #1ea35b);
            clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 0% 100%);
            z-index: 1;
        }

        /* Ornamen kotak/berlian di bawah tengah perbatasan */
        .hero-container::after {
            content: '';
            position: absolute;
            left: 45%;
            bottom: -15px;
            width: 55px;
            height: 55px;
            background: #e8d8a6;
            transform: translateX(-50%) rotate(45deg);
            border: 5px solid #fdfcf7;
            z-index: 4;
            border-radius: 8px;
        }

        /* Area konten teks */
        .hero-content {
            padding: 60px;
            position: relative;
            z-index: 3;
        }

        .hero-label {
            display: inline-block;
            background: #fff3d0;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            color: #856404;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .hero-content h2 {
            font-size: 64px;
            line-height: 1.1;
            font-weight: 800;
            color: #0b6b3d;
            margin-bottom: 10px;
            letter-spacing: -1px;
        }

        .hero-content h3 {
            font-size: 32px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #333;
        }

        .hero-content p {
            line-height: 1.6;
            color: #444;
            margin-bottom: 35px;
            font-size: 15px;
            max-width: 500px;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: #0b532e;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-outline {
            border: 1.5px solid #0b532e;
            color: #0b532e;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            background: transparent;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-primary:hover, .btn-outline:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 12px rgba(0,0,0,0.1);
        }

        /* Area gambar – FULL menutupi area hijau */
        .hero-image {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
            min-height: 480px;
            overflow: hidden; /* agar masking tidak kelebihan */
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;      /* MEMENUHI seluruh area tanpa ruang kosong */
            object-position: center left; /* fokus ke sisi kiri gambar (penting agar gradasi kiri bagus) */
            
            /* Efek gradasi dari kiri ke kanan (transparan -> solid) */
            -webkit-mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0.2) 15%, 
                rgba(0,0,0,1) 45%
            );
            mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0.2) 15%, 
                rgba(0,0,0,1) 45%
            );
            
            /* Opsional: sedikit kecerahan agar menyatu */
            filter: brightness(0.97) contrast(1.03);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero-container {
                grid-template-columns: 1fr;
            }
            .hero-container::before {
                width: 100%;
                clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%);
                opacity: 0.1;
            }
            .hero-image img {
                max-height: 350px;
                object-fit: contain;
                margin: 0 auto;
            }
            .hero-container::after {
                left: 50%;
            }
        }

        @media (max-width: 768px) {
        .hero {
            padding: 15px 4% 15px; /* Memperkecil padding luar area hero di HP */
        }

        .hero-container {
            /* Mengubah sistem grid menjadi baris lurus ke samping tanpa patah ke bawah */
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important;
            justify-content: space-between !important;
            flex-wrap: nowrap !important; /* KUNCI UTAMA: Gambar dilarang keras turun ke bawah */
            min-height: auto !important; /* Menghapus tinggi statis 500px agar proporsional */
            height: 260px !important; /* Mengunci tinggi wadah agar seragam di HP */
            border-radius: 20px !important; /* Menyesuaikan lengkungan box di layar kecil */
        }

        /* Background Hijau Kanan Tetap Dipertahankan & Disesuaikan Skalanya */
        .hero-container::before {
            width: 45% !important; /* Menyesuaikan porsi area hijau di HP */
            clip-path: polygon(15% 0%, 100% 0%, 100% 100%, 0% 100%) !important;
            opacity: 1 !important; /* Menjaga warna hijau solid, bukan transparan */
        }

        /* Ornamen Berlian Tengah Bawah */
        .hero-container::after {
            left: 55% !important; /* Menggeser posisi berlian mengikuti batas lekukan baru */
            width: 35px !important;
            height: 35px !important;
            bottom: -10px !important;
            border: 3px solid #fdfcf7 !important;
        }

        /* AREA KONTEN TEKS (SISI KIRI) */
        .hero-content {
            padding: 15px 0 15px 20px !important; /* Merapikan padding teks bagian dalam */
            flex: 1.3 !important; /* Memberikan porsi ruang lebih dominan untuk teks */
            z-index: 3 !important;
        }

        .hero-label {
            font-size: 9px !important; /* Mengecilkan badge label sekolah */
            padding: 4px 10px !important;
            margin-bottom: 8px !important;
            border-radius: 5px !important;
        }

        /* Ukuran Judul Utama Dipaksa Lebih Kecil & Rapi */
        .hero-content h2 {
            font-size: 20px !important; /* Diturunkan ekstrem dari 64px agar pas di layar HP */
            line-height: 1.1 !important;
            margin-bottom: 4px !important;
            letter-spacing: 0px !important;
        }

        /* Sub-judul */
        .hero-content h3 {
            font-size: 13px !important; /* Diturunkan dari 32px */
            line-height: 1.2 !important;
            margin-bottom: 8px !important;
        }

        /* Paragraf Deskripsi */
        .hero-content p {
            font-size: 10px !important; /* Ukuran teks deskripsi dibuat presisi dan rapi */
            line-height: 1.4 !important;
            margin-bottom: 12px !important;
            max-width: 100% !important;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Membatasi teks maksimal 3 baris di HP agar tidak luber */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Kelompok Tombol */
        .hero-btns {
            gap: 8px !important; /* Merapatkan jarak antar tombol */
        }

        .btn-primary, .btn-outline {
            padding: 6px 14px !important; /* Memperkecil ukuran tombol */
            font-size: 10px !important;
            border-radius: 20px !important;
            gap: 5px !important;
        }

        /* AREA GAMBAR (SISI KANAN - MEMENUHI BG HIJAU) */
        .hero-image {
            flex: 0.9 !important; /* Porsi ruang gambar di kanan */
            height: 100% !important;
            min-height: auto !important;
            display: block !important;
        }

        .hero-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important; /* Tetap full memenuhi area hijau */
            object-position: center left !important;
            max-height: none !important;

            /* Efek Gradasi Lembut Masking Transparan Asli Anda Tetap Terkunci Sempurna */
            -webkit-mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0.2) 15%, 
                rgba(0,0,0,1) 45%
            ) !important;
            mask-image: linear-gradient(to right, 
                transparent 0%, 
                rgba(0,0,0,0.2) 15%, 
                rgba(0,0,0,1) 45%
            ) !important;
        }
    }

    /* ---------- FEATURE / KEUNGGULAN ---------- */
    .feature-wrapper {
        margin-top: -40px;
        padding: 0 7%;
        position: relative;
        z-index: 10;
    }

    .feature-container {
        background: white;
        border-radius: 25px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        overflow: hidden;
    }

    .feature-box {
        padding: 35px 25px;
        display: flex;
        gap: 18px;
        align-items: flex-start;
        border-right: 1px solid #eee;
    }

    .feature-box:last-child {
        border: none;
    }

    .feature-icon {
        min-width: 60px;
        height: 60px;
        border-radius: 50%;
        background: #0f6b3b;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        font-weight: 700;
    }

    .feature-box h4 {
        margin-bottom: 10px;
        color: #0f6b3b;
        font-size: 18px;
    }

    .feature-box p {
        font-size: 14px;
        line-height: 1.8;
        color: #666;
    }

    @media (max-width: 768px) {
        .feature-wrapper {
            margin-top: -20px !important; /* Kurangi margin minus agar tidak terlalu memotong hero mobile */
            padding: 0 4% !important; /* Jarak aman tepi layar HP */
        }

        .feature-container {
            /* KUNCI: Mengubah dari 4 kolom menjadi susunan kotak rapi 2x2 di HP */
            grid-template-columns: repeat(2, 1fr) !important; 
            overflow: visible !important; /* Diperlukan agar efek bayangan timbul tidak terpotong */
            background: transparent !important; /* Izinkan latar belakang dikelola oleh masing-masing box */
            box-shadow: none !important; /* Hapus shadow bawaan container */
        }

        .feature-box {
            background: white !important;
            padding: 20px 15px !important; /* Perkecil padding dalam kotak agar efisien */
            display: flex !important;
            flex-direction: column !important; /* Paksa ikon di atas, teks di bawahnya agar rapi */
            align-items: center !important; /* Semua konten rata tengah */
            text-align: center !important;
            gap: 12px !important;
            
            /* Set ulang border agar membentuk grid silang (tengah) yang rapi */
            border-right: 1px solid #eee !important;
            border-bottom: 1px solid #eee !important;
            box-sizing: border-box !important;
            
            /* Persiapan animasi transisi saat disentuh */
            transition: all 0.25s ease-in-out !important;
            position: relative !important;
            z-index: 1 !important;
        }

        /* Merapikan garis border grid agar tidak ganda di tepi luar */
        .feature-box:nth-child(2n) {
            border-right: none !important; /* Hilangkan border kanan untuk kolom kedua */
        }
        
        .feature-box:nth-child(3), 
        .feature-box:nth-child(4) {
            border-bottom: none !important; /* Hilangkan border bawah untuk baris terakhir */
        }

        /* Mengatur kelengkungan sudut (border-radius) box secara individual karena kontainer luar dipecah */
        .feature-box:nth-child(1) { border-top-left-radius: 20px !important; }
        .feature-box:nth-child(2) { border-top-right-radius: 20px !important; }
        .feature-box:nth-child(3) { border-bottom-left-radius: 20px !important; }
        .feature-box:nth-child(4) { border-bottom-right-radius: 20px !important; }

        /* Ukuran Komponen Ikon di HP */
        .feature-icon {
            min-width: 45px !important;
            height: 45px !important;
            font-size: 18px !important;
        }

        /* Ukuran Judul Fitur */
        .feature-box h4 {
            font-size: 14px !important;
            margin-bottom: 4px !important;
            font-weight: 700 !important;
        }

        /* Teks Deskripsi Fitur */
        .feature-box p {
            font-size: 11px !important;
            line-height: 1.5 !important;
            margin: 0 !important;
        }

        /* ==========================================================================
        EFEK TIMBUL & PERUBAHAN BORDER SAAT DISENTUH (TAP / ACTIVE / HOVER)
        ========================================================================== */
        .feature-box:active,
        .feature-box:hover {
            z-index: 5 !important; /* Angkat box ke atas elemen lain agar shadow tidak tertutup */
            background: #fafdfb !important; /* Efek highlight warna hijau super tipis */
            
            /* Merubah border abu-abu kasar menjadi hijau khas sekolah saat ditekan */
            border-color: #0f6b3b !important; 
            
            /* Memberikan kelengkungan penuh pada box yang sedang aktif */
            border-radius: 15px !important; 
            
            /* Efek timbul (elevation shadow) yang lembut dan nyata */
            box-shadow: 0 10px 25px rgba(15, 107, 59, 0.15) !important;
            
            /* Efek pop-up sedikit membal ke atas */
            transform: translateY(-4px) scale(1.02) !important; 
        }
    }

    /* ---------- PROFILE SECTION ---------- */
    .profile {
        padding: 80px 7%;
    }

    .profile-container {
        display: grid;
        grid-template-columns: 1fr 1fr 350px;
        gap: 30px;
        align-items: start;
    }

    .profile-text h2 {
        font-size: 45px;
        color: #0f6b3b;
        margin-bottom: 20px;
    }

    .profile-line {
        width: 120px;
        height: 5px;
        background: #facc15;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    .profile-text p {
        line-height: 2;
        color: #666;
        margin-bottom: 30px;
    }

    .profile-btn {
        background: #0f6b3b;
        color: white;
        padding: 15px 30px;
        border-radius: 40px;
        display: inline-block;
        transition: 0.2s;
    }

    .profile-btn:hover {
        background: #0a532e;
        transform: translateX(5px);
    }

    .profile-image img {
        width: 100%;
        border-radius: 25px;
        height: 100%;
        object-fit: cover;
        background: #b9ad8a;
        min-height: 280px;
    }

    /* ==========================================================================
   KODE UNTUK LAPTOP & DESKTOP (TIDAK BERUBAH - BIARKAN DI ATAS)
   ========================================================================== */
    /* ... (Pertahankan semua kode .profile, .profile-container, dsb asli Anda) ... */


    /* ==========================================================================
    PERBAIKAN RESPONSIF KHUSUS SMARTPHONE (max-width: 768px)
    ========================================================================== */
    @media (max-width: 768px) {
        .profile {
            padding: 30px 4% !important; /* Memperkecil padding luar agar muat di layar HP */
        }

        .profile-container {
            /* KUNCI UTAMA: Mengubah grid 3 kolom menjadi flex baris lurus kesamping */
            display: flex !important;
            flex-direction: row !important; 
            align-items: center !important; /* Menyeimbangkan posisi teks dan gambar agar sejajar vertikal */
            justify-content: space-between !important;
            flex-wrap: nowrap !important; /* Melarang keras gambar jatuh atau patah ke bawah */
            gap: 15px !important; /* Mempersempit sela jarak antar elemen */
            width: 100% !important;
        }

        /* SISI KIRI: AREA KONTEN TEKS PROFIL */
        .profile-text {
            flex: 1.4 !important; /* Memberikan porsi ruang lebih dominan untuk teks */
            text-align: left !important; /* Memastikan tulisan rata kiri penuh */
        }

        .profile-text h2 {
            font-size: 20px !important; /* Menurunkan font h2 dari 45px agar pas di layar HP */
            margin-bottom: 8px !important;
            line-height: 1.2 !important;
        }

        /* Garis dekorasi kuning di bawah judul */
        .profile-line {
            width: 60px !important; /* Memperpendek garis hiasan agar serasi dengan judul kecil */
            height: 3px !important;
            margin-bottom: 12px !important;
        }

        .profile-text p {
            font-size: 11px !important; /* Mengecilkan ukuran paragraf agar rapi */
            line-height: 1.5 !important; /* Menyesuaikan tinggi spasi teks di mobile */
            margin-bottom: 15px !important;
            color: #555 !important;
            
            /* Opsional: Membatasi agar teks deskripsi tidak terlalu panjang ke bawah di HP */
            display: -webkit-box;
            -webkit-line-clamp: 5; 
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Tombol Selengkapnya */
        .profile-btn {
            padding: 8px 18px !important; /* Memperkecil ukuran tombol di mobile */
            font-size: 11px !important;
            border-radius: 20px !important;
        }

        /* SISI KANAN: AREA GAMBAR PROFIL */
        .profile-image {
            flex: 0.9 !important; /* Porsi ruang gambar di sebelah kanan */
            display: flex !important;
            justify-content: flex-end !important;
            height: 100% !important;
        }

        .profile-image img {
            width: 110px !important; /* KUNCI UTAMA: Memaksa ukuran gambar mengecil statis agar pas bersanding */
            max-width: 100% !important;
            height: 140px !important; /* Memberikan tinggi statis yang seimbang dengan teks di kirinya */
            min-height: auto !important; /* Menghapus aturan min-height 280px bawaan laptop */
            border-radius: 15px !important; /* Menyesuaikan radius lengkungan dengan skala gambar baru */
            object-fit: cover !important; /* Gambar tetap dipotong rapi tanpa merusak rasionya */
            flex-shrink: 0 !important; /* Mencegah gambar ringsek atau gepeng akibat tekanan teks */
            box-shadow: 0 6px 15px rgba(0,0,0,0.06) !important;
        }
    }
    </style>
</head>
<body>

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-label">Selamat Datang di</div>
            <h2>MI AL KAROMAH</h2>
            <h3>Madrasah Hebat, Bermartabat</h3>
            <p>Kami berkomitmen membentuk generasi yang cerdas intelektual, kuat spiritual, dan berakhlak mulia berlandaskan nilai-nilai Islam.</p>
            <div class="hero-btns">
                <a href="#" class="btn-primary">PPDB 2024/2025</a>
                <a href="profil.php" class="btn-outline">Profil Sekolah</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="img/hero1.jpg" alt="Suasana Madrasah">
        </div>
    </div>
</section>

<!-- KEUNGGULAN (4 fitur) -->
<section class="feature-wrapper">
    <div class="feature-container">
        <div class="feature-box">
            <div class="feature-icon">📖</div>
            <div>
                <h4>Pendidikan Berkualitas</h4>
                <p>Mengintegrasikan ilmu pengetahuan dan nilai keislaman.</p>
            </div>
        </div>
        <div class="feature-box">
            <div class="feature-icon">👤</div>
            <div>
                <h4>Akhlak Mulia</h4>
                <p>Membentuk karakter islami yang santun dan disiplin.</p>
            </div>
        </div>
        <div class="feature-box">
            <div class="feature-icon">🏆</div>
            <div>
                <h4>Berprestasi</h4>
                <p>Mendorong siswa aktif dan berprestasi akademik.</p>
            </div>
        </div>
        <div class="feature-box">
            <div class="feature-icon">🕌</div>
            <div>
                <h4>Lingkungan Islami</h4>
                <p>Lingkungan belajar nyaman dan bernuansa islami.</p>
            </div>
        </div>
    </div>
</section>

<!-- PROFIL & INFORMASI TERBARU -->
<section class="profile">
    <div class="profile-container">
        <div class="profile-text">
            <h2>Profil MI Al Karomah</h2>
            <div class="profile-line"></div>
            <p>
                MI Al Karomah adalah lembaga pendidikan dasar Islam yang berkomitmen
                mencetak generasi beriman, berilmu dan berakhlak mulia serta siap menghadapi tantangan masa depan.
            </p>
            <a href="profil.php" class="profile-btn">Selengkapnya →</a>
        </div>
        <div class="profile-image">
            <img src="img/sekolah.png" alt="Gedung MI Al Karomah">
        </div>
    </div>
</section>

<script>
document.querySelectorAll('.footer-socials a').forEach(function(elem) {
    elem.addEventListener('click', function(e) {
        if (!/Android|iPhone|iPad/i.test(navigator.userAgent)) {
            e.preventDefault();
            window.open(this.getAttribute('data-desktop'), '_blank');
        }
    });
});
</script>
<?php
include 'layout/footer.php';
?>

</body>
</html>
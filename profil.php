<?php
include 'layout/header.php';
include 'config/koneksi.php';

$queryFasilitas = mysqli_query($conn, "
SELECT * FROM fasilitas
WHERE status='aktif'
ORDER BY id DESC
LIMIT 8
");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Profil MI Al Karomah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f9faf8; color: #1e2a2e; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
        
        /* ==========================================================================
        CSS PROFIL HEADER UTAMA (LAPTOP / DESKTOP - FIX SATU BARIS)
        ========================================================================== */
        .profil-header {
            background: #fdfbf7; 
            margin-top: 0;
            padding: 80px 0 80px 7% !important; 
            overflow: hidden;
            position: relative;
        }

        .profil-header-wrapper {
            display: grid;
            /* UBAHAN 1: Kita sesuaikan proporsi kolomnya menjadi 1.2fr dan 45vw 
            agar area teks kiri punya ruang lebih lega untuk tulisan satu baris */
            grid-template-columns: 1.2fr 45vw; 
            align-items: center;
            max-width: 100%;
            margin: 0;
            gap: 20px; 
        }

        /* AREA TEKS (SISI KIRI) */
        .profil-header-text {
            padding: 20px 0; 
            box-sizing: border-box;
            z-index: 2;
        }

        .profil-badge {
            font-size: 0.95rem;
            letter-spacing: 1px;
            color: #1b7349; 
            font-weight: 700;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .profil-header-text h1 {
            font-size: 3.5rem; 
            color: #064e28;    
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.15;
            
            /* UBAHAN 2: KUNCI UTAMA AGAR TULISAN TETAP SATU BARIS */
            white-space: nowrap; /* Memaksa teks tidak akan pernah lari ke bawah */
        }

        .breadcrumb-profil {
            font-size: 0.95rem;
            color: #888888;
            margin-bottom: 35px;
        }

        .breadcrumb-profil a {
            color: #1b7349;
            text-decoration: none;
            font-weight: 600;
        }

        .profil-desc {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #445247;
            max-width: 520px; 
        }

        /* AREA GAMBAR (SISI KANAN - TETAP MENTOK UJUNG) */
        .profil-header-image {
            /* Menyesuaikan dengan ubahan wrapper (45vw) */
            width: 45vw; 
            height: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .profil-header-image img {
            width: 100% !important;
            height: auto !important; 
            max-height: 550px; 
            object-fit: contain !important; 
            border-radius: 60px 0 0 60px !important; 
            box-shadow: -15px 20px 40px rgba(0, 0, 0, 0.08); 
            background: transparent;
        }


        /* ==========================================================================
        OPTIMASI KHUSUS SMARTPHONE (max-width: 768px)
        ========================================================================== */
        @media (max-width: 768px) {
            .profil-header {
                padding: 0 !important; 
            }

            .profil-header-wrapper {
                grid-template-columns: 1fr !important; 
                gap: 0 !important;
            }

            .profil-header-image {
                width: 100% !important;
                height: auto !important;
                order: 1 !important;
            }

            .profil-header-image img {
                width: 100% !important;
                height: 240px !important;
                max-height: 240px !important;
                object-fit: cover !important; 
                border-radius: 0px !important; 
                box-shadow: none !important;
            }

            .profil-header-text {
                width: 100% !important;
                padding: 40px 6% !important; 
                text-align: left !important;
                order: 2 !important;
            }

            .profil-badge {
                font-size: 0.85rem !important;
                margin-bottom: 8px !important;
            }

            .profil-header-text h1 {
                /* Di HP, biarkan white-space kembali normal (normal) agar jika layar HP 
                terlalu kecil, tulisannya tidak terpotong keluar layar */
                white-space: normal !important; 
                font-size: 2.2rem !important;
                margin-bottom: 15px !important;
            }

            .breadcrumb-profil {
                font-size: 0.85rem !important;
                margin-bottom: 20px !important;
            }

            .profil-desc {
                font-size: 0.95rem !important;
                line-height: 1.6 !important;
            }
        } 
        /* ==========================================================================
        STATISTIK
        ========================================================================== */

        .stats {
            padding: 50px 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            text-align: center;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            border-bottom: 4px solid #facc15;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: #0f6b3b;
        }

        /* ==========================================================================
        RESPONSIVE STATISTIK - SMARTPHONE
        ========================================================================== */
        @media screen and (max-width: 768px) {
            /* Panggil dengan selektor lengkap agar mengalahkan CSS laptop */
            .stats .stats-grid { 
                display: grid !important;
                grid-template-columns: repeat(2, 1fr) !important; /* Paksa 2 kolom kesamping */
                gap: 12px !important; /* Jarak rapat yang ideal untuk HP */
            }

            .stats-grid .stat-card {
                padding: 20px 10px !important; /* Padding kanan-kiri diperkecil agar teks tidak turun */
                border-radius: 16px !important;
            }

            .stat-card .stat-number {
                font-size: 1.8rem !important; /* Dikecilkan sedikit lagi ke 1.8rem agar angka ribuan aman */
                font-weight: 800;
                line-height: 1.2;
            }

            .stat-card p {
                font-size: 0.8rem !important;
                margin: 5px 0 0 0 !important;
            }
        }
        
        /* ==========================================================================
        STYLE SEJARAH & VISI MISI SESUAI REFERENSI GAMBAR
        ========================================================================== */

        /* Sejarah + Gambar */
        .history-section { padding: 50px 0; background: white; }
        .history-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; }
        .history-text h2 { color: #0f6b3b; font-size: 1.8rem; border-left: 5px solid #facc15; padding-left: 15px; margin-bottom: 20px; font-weight: 700; }
        .history-text p { color: #333; line-height: 1.7; margin-bottom: 15px; font-size: 0.95rem; }
        .history-img img { width: 100%; border-radius: 24px; height: 300px; object-fit: cover; }

        /* Visi Misi General Layout */
        .visi-misi-section { padding: 50px 0; background: white; }
        .visi-misi-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }

        /* Wrapper Judul + Ikon */
        .card-title-wrapper { display: flex; align-items: center; gap: 15px; margin-bottom: 20px; }
        .card-title-wrapper h3 { font-size: 1.6rem; font-weight: 700; margin: 0; }

        /* Desain Komponen Ikon Lingkaran */
        .icon-circle { display: flex; align-items: center; justify-content: center; width: 42px; height: 42px; border-radius: 50%; }
        .icon-yellow { background: #facc15; } /* Latar belakang kuning ikon visi */
        .icon-green { background: #0f6b3b; }  /* Latar belakang hijau ikon misi */

        /* Kustomisasi Khusus Kartu Visi (Hijau Tua) */
        .card-visi { background: #0f6b3b; padding: 35px; border-radius: 24px; color: white; position: relative; }
        .card-visi h3 { color: white; }
        .card-visi .quote-text { font-size: 1rem; line-height: 1.7; font-weight: 500; margin-top: 15px; position: relative; padding-left: 15px; }
        /* Variasi tanda kutip dekoratif pembuka */
        .card-visi .quote-text::before { content: "“"; position: absolute; left: 0; top: 0; font-size: 2rem; font-family: serif; line-height: 1; color: #facc15; }

        /* Kustomisasi Khusus Kartu Misi (Krem Terang) */
        .card-misi { background: #fefcf5; padding: 35px; border-radius: 24px; color: #333; }
        .card-misi h3 { color: #0f6b3b; }

        /* Kustomisasi List Poin Misi dengan Centang Hijau */
        .misi-list { list-style: none; padding: 0; margin: 0; }
        .misi-list li { position: relative; padding-left: 28px; margin-bottom: 12px; font-size: 0.95rem; line-height: 1.6; color: #222; }
        /* Membuat ikon centang kustom via CSS */
        .misi-list li::before {
            content: "";
            position: absolute;
            left: 4px;
            top: 6px;
            width: 6px;
            height: 11px;
            border: solid #0f6b3b;
            border-width: 0 2.5px 2.5px 0;
            transform: rotate(45deg);
        }

        /* ==========================================================================
        OPTIMASI RESPONSIVE SMARTPHONE (max-width: 768px)
        ========================================================================== */
        @media screen and (max-width: 768px) {
            /* --- SEJARAH SECTION (Urutan Sesuai Gambar) --- */
            .history-section {
                padding: 30px 0 !important;
            }

            .history-grid { 
                display: flex !important; /* Ubah ke flex agar bisa mengatur urutan elemen bebas */
                flex-direction: column !important; /* Susun memanjang ke bawah */
                gap: 15px !important; 
            }

            /* Bongkar text wrapper menjadi flex untuk menyisipkan gambar di tengah */
            .history-text {
                display: flex !important;
                flex-direction: column !important;
            }

            /* Urutan 1: Judul Sejarah Singkat berada paling atas */
            .history-text h2 {
                order: 1 !important;
                font-size: 1.4rem !important;
                margin-bottom: 15px !important;
            }

            /* Urutan 2: Gambar disisipkan tepat di bawah Judul */
            .history-img {
                order: 2 !important;
                width: 100% !important;
                margin-bottom: 5px !important;
            }
            
            .history-img img {
                height: 190px !important; /* Tinggi gambar proporsional di layar HP */
                border-radius: 16px !important; /* Menyesuaikan kebulatan di layar kecil */
            }

            /* Urutan 3: Teks paragraf berada di bawah gambar */
            .history-text p {
                order: 3 !important;
                font-size: 0.88rem !important;
                line-height: 1.5 !important;
                margin-bottom: 12px !important;
            }


            /* --- VISI MISI SECTION --- */
            .visi-misi-section {
                padding: 10px 0 30px 0 !important;
                background: white !important; /* Samakan background putih bersih sesuai contoh gambar */
            }

            .visi-misi-grid { 
                grid-template-columns: 1fr !important; /* Menumpuk kartu Visi lalu Misi ke bawah */
                gap: 16px !important; 
            }

            .card-visi, 
            .card-misi { 
                padding: 24px 20px !important; 
                border-radius: 20px !important; 
            }

            /* Sisi judul di dalam kartu */
            .card-title-wrapper {
                margin-bottom: 15px !important;
                gap: 12px !important;
            }

            .card-title-wrapper h3 {
                font-size: 1.25rem !important;
            }

            .icon-circle {
                width: 36px !important;
                height: 36px !important;
            }
            
            .icon-circle svg {
                width: 16px !important;
                height: 16px !important;
            }

            /* Isi teks Visi */
            .card-visi .quote-text {
                font-size: 0.88rem !important;
                line-height: 1.5 !important;
                padding-left: 12px !important;
            }
            .card-visi .quote-text::before {
                font-size: 1.6rem !important;
            }

            /* Isi Poin-Poin Misi */
            .misi-list li {
                font-size: 0.88rem !important;
                line-height: 1.5 !important;
                padding-left: 24px !important;
                margin-bottom: 10px !important;
            }
            .misi-list li::before {
                left: 2px !important;
                top: 4px !important;
                width: 5px !important;
                height: 9px !important;
                border-width: 0 2px 2px 0 !important;
            }
        }        
        
        /* Nilai-nilai */
        .values { padding: 60px 0; background: #f1f5e9; }
        .values-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 30px; margin-top: 40px; }
        .value-item { background: white; padding: 25px; border-radius: 20px; text-align: center; }
        .value-item h3 { color: #0f6b3b; margin-bottom: 12px; }
        /* ==========================================================================
        OPTIMASI RESPONSIVE SMARTPHONE: NILAI-NILAI KAMI (max-width: 768px)
        ========================================================================== */
        @media screen and (max-width: 768px) {
            .values {
                padding: 30px 0 !important;
            }

            /* Judul Utama "Nilai-Nilai Kami" */
            .values h2 {
                font-size: 1.4rem !important;
                margin-bottom: 20px !important;
                text-align: center !important; /* Judul utama section tetap di tengah */
            }

            /* Paksa Grid Menjadi 1 Kolom ke Bawah */
            .values .values-grid {
                display: grid !important;
                grid-template-columns: 1fr !important; 
                gap: 20px !important; 
                margin-top: 20px !important;
            }

            /* KUNCI LAYOUT: Ikon di kiri, teks di kanan */
            .values-grid .value-item {
                display: flex !important;
                flex-direction: row !important; 
                align-items: flex-start !important; /* Rata atas agar ikon sejajar baris pertama teks */
                justify-content: flex-start !important; 
                gap: 16px !important; 
                padding: 0 !important;
                background: transparent !important;
                border: none !important;
            }

            /* KUNCI IKON: Membuat lingkaran hijau stabil tidak gepeng */
            .value-item .value-icon { 
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                width: 40px !important; 
                height: 40px !important;
                min-width: 40px !important; /* Mengunci lingkaran agar tidak lonjong saat teks panjang */
                background: #0f6b3b !important; 
                border-radius: 50% !important;
                margin: 0 !important;
            }

            .value-item .value-icon svg {
                width: 18px !important;
                height: 18px !important;
                stroke: white !important;
            }

            /* KUNCI PENYELARASAN: Pembungkus teks dipaksa rata kiri total */
            .value-item .value-text-wrapper {
                display: flex !important;
                flex-direction: column !important;
                align-items: flex-start !important; /* Mengunci batas kiri box teks */
                justify-content: flex-start !important;
                text-align: left !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            /* Judul Nilai (Kompetensi, Dakwah, dll) */
            .value-item h3 {
                font-size: 1rem !important; 
                color: #0f6b3b !important; 
                font-weight: 700 !important;
                text-align: left !important; 
                align-self: flex-start !important; /* Huruf pertama mengunci di paling kiri */
                margin: 0 0 4px 0 !important; 
                line-height: 1.2 !important;
            }

            /* Teks Deskripsi Nilai */
            .value-item p {
                font-size: 0.85rem !important; 
                color: #555 !important; 
                line-height: 1.5 !important;
                text-align: left !important; /* KUNCI UTAMA: Rata kiri, lurus mutlak di bawah h3 */
                align-self: flex-start !important; /* Memotong paksa align center bawaan */
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
        }    
             
        /* =========================
        FASILITAS SEKOLAH
        ========================= */

       /* ==========================================================================
   FASILITAS SEKOLAH
   ========================================================================== */

.facilities {
    padding: 90px 0;
    background: #f8fafc;
}

.section-title {
    text-align: center;
    margin-bottom: 50px;
}

.section-title h2 {
    font-size: 38px;
    color: #166534;
    margin-bottom: 12px;
    font-weight: 700;
}

.section-title p {
    font-size: 15px;
    color: #6b7280;
    max-width: 650px;
    margin: auto;
    line-height: 1.8;
}

/* GRID SYSTEM */
.facilities-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

/* CARD DESIGN */
.facility-card {
    background: white;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
    transition: 0.35s;
    position: relative;
}

.facility-card:hover {
    transform: translateY(-8px);
}

/* IMAGE LIGHTBOX LINK */
.facility-link {
    display: block;
    width: 100%;
    cursor: zoom-in;
    position: relative;
    overflow: hidden;
}

.facility-image {
    height: 220px;
    position: relative;
    overflow: hidden;
}

.facility-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.4s;
}

/* EFFECT HOVER DESKTOP */
.facility-card:hover img {
    transform: scale(1.08);
}

.facility-overlay {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 55px;
    height: 55px;
    border-radius: 18px;
    background: rgba(22, 163, 74, 0.92);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
    backdrop-filter: blur(5px);
    transition: 0.3s ease;
}

/* Mengubah ikon overlay menjadi kaca pembesar saat kartu di-hover */
.facility-card:hover .facility-overlay i {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f00e"; /* Kode unicode untuk fa-search-plus */
}
.facility-card:hover .facility-overlay {
    background: rgba(16, 185, 129, 0.95);
}

/* CARD DETAILS */
.facility-content {
    padding: 24px;
}

.facility-category {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 30px;
    background: #dcfce7;
    color: #166534;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 14px;
}

.facility-content h3 {
    font-size: 24px;
    color: #111827;
    margin-bottom: 12px;
    font-weight: 700;
}

.facility-content p {
    font-size: 14px;
    color: #6b7280;
    line-height: 1.8;
}

/* EMPTY STATE */
.empty-facility-wrapper {
    grid-column: 1 / -1;
    text-align: center;
    width: 100%;
}

.empty-facility {
    background: white;
    padding: 70px 30px;
    border-radius: 24px;
    text-align: center;
}

.empty-facility i {
    font-size: 48px;
    color: #cbd5e1;
    margin-bottom: 15px;
    display: inline-block;
}

.empty-facility h3 {
    font-size: 28px;
    margin-bottom: 10px;
    color: #111827;
}

.empty-facility p {
    color: #6b7280;
}

/* RESPONSIVE DESIGN (TABLET & SMARTPHONE 2 KOLOM) */
@media (max-width: 768px) {
    .facilities {
        padding: 70px 0;
    }

    .section-title h2 {
        font-size: 30px;
    }

    .facilities-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .facility-image {
        height: 140px; 
    }

    .facility-content {
        padding: 12px;
    }

    .facility-category {
        padding: 4px 10px;
        font-size: 10px;
        margin-bottom: 8px;
    }

    .facility-content h3 {
        font-size: 15px;
        margin-bottom: 6px;
    }

    .facility-content p {
        font-size: 11px;
        line-height: 1.5;
    }
    
    .facility-overlay {
        width: 35px;
        height: 35px;
        border-radius: 10px;
        font-size: 16px;
        top: 10px;
        right: 10px;
    }

    .empty-facility {
        padding: 50px 20px;
    }
    
    .empty-facility h3 {
        font-size: 24px;
    }
}

    </style>
</head>
<body>

<!-- HEADER HALAMAN PROFIL (dengan gambar di samping) -->
<section class="profil-header">
    <div class="container">
        <div class="profil-header-wrapper">
            <div class="profil-header-text">
                <div class="profil-badge">MADRASAH IBTIDAIYAH</div>
                <h1>Profil Sekolah</h1>
                <div class="breadcrumb-profil">
                    <a href="index.php">Beranda</a> &gt; <a href="profil.php">Profil</a> &gt; Profil Sekolah
                </div>
                <p class="profil-desc">
                    MI Al Karomah adalah lembaga pendidikan dasar Islam yang berkomitmen mencetak generasi yang berilmu, berakhlak mulia, dan siap menghadapi tantangan masa depan.
                </p>
            </div>
            <div class="profil-header-image">
                <img src="img/profil.png" alt="Profil MI Al Karomah">
            </div>
        </div>
    </div>
</section>

<!-- STATISTIK -->
<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card"><div class="stat-number">1998</div><div>Tahun Berdiri</div></div>
            <div class="stat-card"><div class="stat-number">256</div><div>Sisa AHP</div></div>
            <div class="stat-card"><div class="stat-number">18</div><div>Guru & Tenaga Pendidik</div></div>
            <div class="stat-card"><div class="stat-number">12</div><div>Ruang Kelas</div></div>
        </div>
    </div>
</section>

<section class="history-section">
    <div class="container">
        <div class="history-grid">
            <div class="history-img">
                <img src="https://picsum.photos/id/20/600/400" alt="Sejarah Madrasah">
            </div>
            <div class="history-text">
                <h2>Sejarah Singkat</h2>
                <p>MI Al Karomah berdiri pada tahun 1998 atas dasar kepedulian masyarakat dalam menyediakan pendidikan dasar Islam yang berkualitas bagi anak-anak di lingkungan sekitar.</p>
                <p>Sejak berdiri hingga saat ini, MI Al Karomah terus berkomitmen memberikan pendidikan terbaik dengan mengedepankan nilai-nilai Islam, kedisiplinan, kreativitas, dan prestasi.</p>
            </div>
        </div>
    </div>
</section>

<section class="visi-misi-section">
    <div class="container">
        <div class="visi-misi-grid">
            <div class="card-visi">
                <div class="card-title-wrapper">
                    <span class="icon-circle icon-yellow">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#0f6b3b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </span>
                    <h3>Visi</h3>
                </div>
                <p class="quote-text">"Terwujudnya peserta didik yang berilmu, berakhlak mulia, berprestasi, dan berwawasan global berlandaskan nilai-nilai Islam."</p>
            </div>

            <div class="card-misi">
                <div class="card-title-wrapper">
                    <span class="icon-circle icon-green">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                    </span>
                    <h3>Misi</h3>
                </div>
                <ul class="misi-list">
                    <li>Menyelenggarakan pendidikan berkualitas berbasis nilai-nilai Islam.</li>
                    <li>Membentuk karakter peserta didik yang berakhlak mulia dan berdisiplin.</li>
                    <li>Mengembangkan potensi dan kreativitas peserta didik.</li>
                    <li>Menumbuhkan semangat berprestasi di bidang akademik dan non akademik.</li>
                    <li>Membangun lingkungan sekolah yang aman, nyaman, dan islami.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- NILAI-NILAI -->
<section class="values">
    <div class="container">
        <h2 style="text-align:center; color:#0f6b3b;">Nilai-Nilai Kami</h2>
        <div class="values-grid">
            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <div class="value-text-wrapper">
                    <h3>Kompetensi</h3>
                    <p>Menghadapi tantangan global dengan kemampuan bekerja secara kolaboratif dan bertanggung jawab.</p>
                </div>
            </div>

            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                </div>
                <div class="value-text-wrapper">
                    <h3>Dakwah</h3>
                    <p>Membangun komunitas yang sehat dan berdaya saing.</p>
                </div>
            </div>

            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                </div>
                <div class="value-text-wrapper">
                    <h3>Kemajuan</h3>
                    <p>Mengembangkan potensi individu dan tim secara berkelanjutan.</p>
                </div>
            </div>

            <div class="value-item">
                <div class="value-icon">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                </div>
                <div class="value-text-wrapper">
                    <h3>Loyalitas</h3>
                    <p>Memiliki hubungan baik dengan sesama dan lingkungan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FASILITAS SEKOLAH -->
<section class="facilities">
    <!-- Pustaka CSS Lightbox2 (Aman ditaruh di sini jika tidak ingin repot membuka header.php) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhERhyyv24M3nBqVRQQc7pT3x768LMlscteBXG8GqmG5JWixQ0lfCIn699SB4DWteQXw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="container">

        <div class="section-title">
            <h2>Fasilitas Sekolah</h2>
            <p>Sarana dan prasarana terbaik untuk mendukung kegiatan belajar siswa.</p>
        </div>

        <div class="facilities-grid">
            <?php if (mysqli_num_rows($queryFasilitas) > 0) : ?>

                <?php while ($f = mysqli_fetch_assoc($queryFasilitas)) : ?>
                    <div class="facility-card">

                        <!-- UPDATE: Dibungkus dengan tag anchor menuju file gambar asli -->
                        <!-- data-lightbox="gallery-fasilitas" membuat gambar bisa di-next/prev saat di-zoom -->
                        <a href="assets/fasilitas/<?= $f['gambar']; ?>" class="facility-link" data-lightbox="gallery-fasilitas" data-title="<?= htmlspecialchars($f['nama']); ?>">
                            <div class="facility-image">
                                <img src="assets/fasilitas/<?= $f['gambar']; ?>" 
                                     alt="<?= htmlspecialchars($f['nama']); ?>" 
                                     onerror="this.src='assets/default.jpg'">
                                
                                <div class="facility-overlay">
                                    <i class="<?= htmlspecialchars($f['icon']); ?>"></i>
                                </div>
                            </div>
                        </a>

                        <div class="facility-content">
                            <span class="facility-category">
                                <?= htmlspecialchars($f['kategori']); ?>
                            </span>
                            <h3>
                                <?= htmlspecialchars($f['nama']); ?>
                            </h3>
                            <p>
                                <?= htmlspecialchars(substr($f['deskripsi'], 0, 90)); ?>...
                            </p>
                        </div>

                    </div>
                <?php endwhile; ?>

            <?php else : ?>

                <div class="empty-facility-wrapper">
                    <div class="empty-facility">
                        <i class="fas fa-school"></i>
                        <h3>Belum Ada Fasilitas</h3>
                        <p>Data fasilitas sekolah belum tersedia saat ini.</p>
                    </div>
                </div>

            <?php endif; ?>
        </div>

    </div>

    <!-- Pustaka JavaScript Lightbox2 & Dependensi jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw6sBOUR9Y/Sl5eyM4Q37iNJYw9Vfb87mI0MxgJKIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Konfigurasi opsi Lightbox (Opsional)
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true, // Mengulang dari awal jika gambar habis digeser
            'albumLabel': "Gambar %1 dari %2" // Label penunjuk jumlah gambar
        })
    </script>
</section>

<?php include_once 'layout/footer.php'; ?>
</body>
</html>
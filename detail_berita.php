<?php
include 'config/koneksi.php';

// 1. Validasi parameter ID untuk mencegah error & SQL Injection
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = mysqli_query($conn, "SELECT * FROM berita WHERE id='$id'");
    
    // Jika data berita ditemukan di database
    if (mysqli_num_rows($query) > 0) {
        $berita = mysqli_fetch_assoc($query);
    } else {
        echo "<script>alert('Berita tidak ditemukan!'); window.location='berita.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID Berita tidak valid!'); window.location='berita.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($berita['judul']); ?></title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f5fff8;
        }

        /* ========== HERO AREA ========== */
        .hero-detail {
            width: 100%;
            height: 450px;
            position: relative;
            overflow: hidden;
        }

        .hero-detail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(11, 93, 57, 0.9) 0%, rgba(0, 0, 0, 0.4) 100%);
        }

        .hero-content {
            position: absolute;
            bottom: 100px;
            left: 7.5%;
            right: 7.5%;
            color: white;
            z-index: 2;
            max-width: 850px;
        }

        .hero-content h1 {
            font-size: 2.8rem;
            margin-bottom: 15px;
            line-height: 1.3;
            font-weight: 700;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .hero-content p {
            font-size: 1rem;
            opacity: 0.9;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 500;
            color: #facc15; /* Aksen warna kuning khas Al Karomah */
        }

        /* ========== KONTEN UTAMA ========== */
        .detail-container {
            width: 85%;
            max-width: 1100px;
            margin: auto;
            background: white;
            margin-top: -60px;
            position: relative;
            z-index: 5;
            border-radius: 32px;
            padding: 50px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            margin-bottom: 60px;
        }

        .tanggal {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #dcfce7;
            color: #166534;
            padding: 8px 18px;
            border-radius: 30px;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .isi {
            line-height: 2;
            color: #334155;
            font-size: 1.1rem;
            text-align: justify;
        }

        /* ========== TOMBOL KEMBALI ========== */
        .back-wrapper {
            margin-top: 40px;
            border-top: 1px solid #e2e8f0;
            padding-top: 30px;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #0b5d39;
            color: white;
            padding: 12px 28px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(11, 93, 57, 0.2);
        }

        .back-btn:hover {
            background: #15803d;
            transform: translateX(-5px);
            box-shadow: 0 6px 20px rgba(11, 93, 57, 0.3);
        }

        /* ========== RESPONSIVE (HP & TABLET) ========== */
        @media (max-width: 992px) {
            .detail-container {
                width: 90%;
                padding: 40px 30px;
            }
            .hero-content h1 {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-detail {
                height: 350px;
            }

            .hero-content {
                bottom: 80px;
            }

            .hero-content h1 {
                font-size: 1.8rem;
            }

            .detail-container {
                width: 92%;
                padding: 30px 20px;
                margin-top: -50px;
                border-radius: 24px;
            }

            .isi {
                font-size: 1rem;
                line-height: 1.8;
            }
            
            .back-btn {
                width: 100%;
                justify-content: center; 
            }
        }
    </style>
</head>
<body>

    <section class="hero-detail">
        <?php 
            // Samakan logikanya dengan berita.php, panggil kolom 'thumbnail'
            $foto_detail = !empty($berita['thumbnail']) ? $berita['thumbnail'] : 'default-berita.jpg'; 
        ?>
        
        <img src="assets/berita/<?php echo $foto_detail; ?>" alt="<?php echo htmlspecialchars($berita['judul']); ?>">
        
        <div class="overlay"></div>
        <div class="hero-content">
            <p><i class="fas fa-graduation-cap"></i> Berita & Informasi MI Al Karomah</p>
            <h1><?php echo htmlspecialchars($berita['judul']); ?></h1>
        </div>
    </section>

    <main class="detail-container">
        <div class="tanggal">
            <i class="far fa-calendar-alt"></i> 
            <?php echo date('d F Y', strtotime($berita['created_at'])); ?>
        </div>

        <article class="isi">
            <?php echo nl2br(htmlspecialchars($berita['isi'])); ?>
        </article>

        <div class="back-wrapper">
            <a href="berita.php" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali ke Berita
            </a>
        </div>
    </main>

</body>
</html>
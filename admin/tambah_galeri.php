<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include '../layout/admin_header.php';
include '../config/koneksi.php';

if(isset($_POST['submit'])){

    // Mengamankan input teks dari karakter aneh / tanda petik tunggal (')
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $ukuran_file = $_FILES['gambar']['size']; 

    // Batasan ukuran file (20 Megabyte)
    $maksimal_ukuran = 20 * 1024 * 1024; 

    if ($ukuran_file > $maksimal_ukuran) {
        echo "<script>
            alert('Gagal! Ukuran file terlalu besar. Maksimal ukuran file adalah 20MB.');
            window.history.back();
        </script>";
        exit; 
    }

    $ekstensi = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
    $ekstensi_gambar = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ekstensi_video = ['mp4', 'webm', 'ogg', 'mov'];

    if(in_array($ekstensi, $ekstensi_gambar)){
        $tipe_file = 'gambar';
    } elseif(in_array($ekstensi, $ekstensi_video)){
        $tipe_file = 'video';
    } else {
        echo "<script>
            alert('Format file tidak didukung! Gunakan JPG, PNG, atau MP4.');
            window.history.back();
        </script>";
        exit;
    }

    // Proses pemindahan file ke folder tujuan
    if(move_uploaded_file($tmp, "../assets/galeri/".$gambar)) {
        
        // KODE DISESUAIKAN: created_at dihapus dari query karena sudah diisi otomatis oleh database Anda
        $query = "INSERT INTO galeri (judul, kategori, deskripsi, gambar, tanggal, status) 
                  VALUES ('$judul', '$kategori', '$deskripsi', '$gambar', '$tanggal', '$status')";
                  
        $eksekusi = mysqli_query($conn, $query);

        if($eksekusi) {
            echo "<script>
                alert('Galeri berhasil ditambahkan');
                window.location='galeri.php';
            </script>";
        } else {
            echo "Gagal menyimpan ke database karena: " . mysqli_error($conn);
            exit;
        }
    } else {
        echo "<script>
            alert('Gagal mengunggah file ke folder assets. Pastikan folder tersebut ada.');
            window.history.back();
        </script>";
        exit;
    }
}
?>

<style>
/* Kontainer bagian dalam isi konten - Menempel pas di bawah topbar */
.content-body {
    padding: 30px 40px;
    background: #f4f6f9;
    box-sizing: border-box;
}

.page-title {
    margin-bottom: 25px;
}

.page-title h1 {
    font-size: 32px;
    color: #111827;
    margin: 0 0 5px 0;
    font-weight: 700;
}

.page-title p {
    color: #6b7280;
    font-size: 14px;
    margin: 0;
}

.form-card {
    background: white;
    padding: 35px;
    border-radius: 24px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    /* FIX: Mengisi ruang kosong dengan width 100% */
    width: 100%;
    box-sizing: border-box; 
}

.form-group {
    margin-bottom: 22px;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    color: #111827;
}

.form-control {
    width: 100%;
    height: 55px;
    border: 1px solid #d1d5db;
    border-radius: 14px;
    padding: 0 18px;
    font-size: 14px;
    outline: none;
    transition: 0.3s;
    box-sizing: border-box; 
}

.form-control:focus {
    border-color: #16a34a;
    box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.1);
}

textarea.form-control {
    height: 150px;
    padding: 18px;
    resize: none;
}

input[type="file"].form-control {
    padding-top: 14px;
}

.btn-submit {
    width: 100%; 
    max-width: 220px;
    height: 55px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(135deg, #16a34a, #15803d);
    color: white;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
}

.file-hint {
    display: block;
    margin-top: 5px;
    font-size: 12px;
    color: #64748b;
}

/* --- RESPONSIVE MOBILE VIEW --- */
@media screen and (max-width: 992px) {
    .content-body {
        padding: 20px 15px; 
    }

    .form-card {
        padding: 20px;
        border-radius: 16px;
    }

    .form-control {
        height: 50px; 
        border-radius: 10px;
    }

    textarea.form-control {
        height: 120px; 
    }

    input[type="file"].form-control {
        padding-top: 12px;
    }

    .btn-submit {
        max-width: 100%; 
        height: 50px;
        border-radius: 10px;
    }
}
</style>

<div class="content-body">

    <div class="page-title">
        <h1>Tambah Galeri</h1>
        <p>Tambahkan file dokumentasi foto atau video kegiatan MI Al Karomah</p>
    </div>

    <div class="form-card">
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Judul Galeri</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>File Gambar / Video</label>
                <input type="file" name="gambar" id="file-galeri" class="form-control" accept="image/*,video/*" required>
                <small class="file-hint">Format didukung: JPG, PNG, WEBP, MP4, WEBM</small>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn-submit">
                Simpan Galeri
            </button>

        </form>
    </div>
</div>

<script>
// Validasi ukuran berkas di sisi browser user sebelum diunggah
document.getElementById('file-galeri').addEventListener('change', function() {
    const max_size = 20 * 1024 * 1024; 
    
    if (this.files && this.files[0]) {
        const file_size = this.files[0].size;
        
        if (file_size > max_size) {
            alert('Ukuran file terlalu besar! Silakan pilih video/gambar yang berukuran kurang dari 20MB.');
            this.value = ''; 
        }
    }
});
</script>

</div> 
</body>
</html>
<?php
include '../layout/admin_header.php';
?>

<style>

/* =========================
   MAIN CONTENT
========================= */

.main-content{
margin-left:260px;
padding:110px 25px 30px;
background:#f4f6f9;
min-height:100vh;
}

/* =========================
   PAGE HEADER
========================= */

.page-header{
display:flex;
justify-content:space-between;
align-items:center;
gap:20px;
margin-bottom:25px;
flex-wrap:wrap;
}

.page-title h1{
font-size:34px;
color:#111827;
margin-bottom:5px;
}

.page-title p{
font-size:15px;
color:#6b7280;
}

.btn-add{
background:linear-gradient(135deg,#16a34a,#15803d);
padding:14px 22px;
border-radius:14px;
text-decoration:none;
color:white;
font-size:14px;
font-weight:500;
display:flex;
align-items:center;
gap:10px;
transition:0.3s;
box-shadow:0 5px 15px rgba(22,163,74,0.2);
}

.btn-add:hover{
transform:translateY(-3px);
}

/* =========================
   HERO CARD
========================= */

.hero-grid{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:25px;
}

.hero-card{
background:white;
border-radius:24px;
overflow:hidden;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
transition:0.3s;
}

.hero-card:hover{
transform:translateY(-5px);
}

.hero-image{
position:relative;
height:250px;
overflow:hidden;
}

.hero-image img{
width:100%;
height:100%;
object-fit:cover;
}

.hero-overlay{
position:absolute;
inset:0;
background:linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0.1));
display:flex;
align-items:flex-end;
padding:25px;
}

.hero-overlay h2{
color:white;
font-size:28px;
font-weight:700;
line-height:1.3;
}

.hero-content{
padding:25px;
}

.hero-info{
display:grid;
grid-template-columns:repeat(2,1fr);
gap:15px;
margin-bottom:20px;
}

.info-box{
background:#f9fafb;
padding:15px;
border-radius:14px;
}

.info-box h4{
font-size:13px;
color:#6b7280;
margin-bottom:8px;
font-weight:500;
}

.info-box p{
font-size:15px;
font-weight:600;
color:#111827;
line-height:1.5;
}

/* =========================
   BADGE
========================= */

.badge{
display:inline-block;
padding:8px 15px;
border-radius:30px;
font-size:12px;
font-weight:600;
margin-bottom:20px;
}

.badge-active{
background:#dcfce7;
color:#166534;
}

.badge-draft{
background:#fef3c7;
color:#92400e;
}

/* =========================
   ACTION BUTTON
========================= */

.action-group{
display:flex;
gap:12px;
flex-wrap:wrap;
}

.action-btn{
flex:1;
height:48px;
border-radius:14px;
display:flex;
align-items:center;
justify-content:center;
gap:10px;
text-decoration:none;
font-size:14px;
font-weight:500;
transition:0.3s;
min-width:120px;
}

.view-btn{
background:#ecfdf5;
color:#16a34a;
}

.edit-btn{
background:#eff6ff;
color:#2563eb;
}

.delete-btn{
background:#fef2f2;
color:#dc2626;
}

.action-btn:hover{
transform:translateY(-2px);
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:1200px){

.hero-grid{
grid-template-columns:1fr;
}

}

@media(max-width:991px){

.main-content{
margin-left:0;
padding:100px 20px 20px;
}

}

@media(max-width:768px){

.page-header{
flex-direction:column;
align-items:flex-start;
}

.page-title h1{
font-size:28px;
}

.hero-image{
height:220px;
}

.hero-overlay h2{
font-size:22px;
}

.hero-info{
grid-template-columns:1fr;
}

.action-group{
flex-direction:column;
}

}

</style>

<div class="main-content">

    <!-- PAGE HEADER -->
    <div class="page-header">

        <div class="page-title">
            <h1>Hero Section</h1>
            <p>Kelola tampilan banner hero pada halaman utama website.</p>
        </div>

        <a href="#" class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Hero
        </a>

    </div>

    <!-- HERO GRID -->
    <div class="hero-grid">

        <!-- HERO ITEM -->
        <div class="hero-card">

            <div class="hero-image">

                <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?q=80&w=1200&auto=format&fit=crop">

                <div class="hero-overlay">
                    <h2>Selamat Datang di MI Al Karomah</h2>
                </div>

            </div>

            <div class="hero-content">

                <span class="badge badge-active">
                    Aktif
                </span>

                <div class="hero-info">

                    <div class="info-box">
                        <h4>Sub Judul</h4>
                        <p>Sekolah Islami Modern & Berprestasi</p>
                    </div>

                    <div class="info-box">
                        <h4>Tombol CTA</h4>
                        <p>Daftar Sekarang</p>
                    </div>

                </div>

                <div class="action-group">

                    <a href="#" class="action-btn view-btn">
                        <i class="fas fa-eye"></i>
                        Preview
                    </a>

                    <a href="#" class="action-btn edit-btn">
                        <i class="fas fa-pen"></i>
                        Edit
                    </a>

                    <a href="#" class="action-btn delete-btn">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </a>

                </div>

            </div>

        </div>

        <!-- HERO ITEM -->
        <div class="hero-card">

            <div class="hero-image">

                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200&auto=format&fit=crop">

                <div class="hero-overlay">
                    <h2>Membentuk Generasi Qurani</h2>
                </div>

            </div>

            <div class="hero-content">

                <span class="badge badge-draft">
                    Draft
                </span>

                <div class="hero-info">

                    <div class="info-box">
                        <h4>Sub Judul</h4>
                        <p>Pendidikan Berkualitas Berbasis Islam</p>
                    </div>

                    <div class="info-box">
                        <h4>Tombol CTA</h4>
                        <p>Lihat Profil</p>
                    </div>

                </div>

                <div class="action-group">

                    <a href="#" class="action-btn view-btn">
                        <i class="fas fa-eye"></i>
                        Preview
                    </a>

                    <a href="#" class="action-btn edit-btn">
                        <i class="fas fa-pen"></i>
                        Edit
                    </a>

                    <a href="#" class="action-btn delete-btn">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
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
   FILTER
========================= */

.filter-box{
background:white;
padding:20px;
border-radius:22px;
display:flex;
gap:15px;
flex-wrap:wrap;
margin-bottom:25px;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.filter-box input,
.filter-box select{
height:50px;
border:1px solid #e5e7eb;
border-radius:12px;
padding:0 15px;
font-size:14px;
outline:none;
flex:1;
min-width:220px;
}

.filter-btn{
height:50px;
padding:0 25px;
border:none;
border-radius:12px;
background:#166534;
color:white;
font-size:14px;
font-weight:500;
cursor:pointer;
}

/* =========================
   GALLERY GRID
========================= */

.gallery-grid{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:25px;
}

/* =========================
   GALLERY CARD
========================= */

.gallery-card{
background:white;
border-radius:24px;
overflow:hidden;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
transition:0.3s;
}

.gallery-card:hover{
transform:translateY(-5px);
}

.gallery-image{
position:relative;
height:240px;
overflow:hidden;
}

.gallery-image img{
width:100%;
height:100%;
object-fit:cover;
transition:0.4s;
}

.gallery-card:hover .gallery-image img{
transform:scale(1.05);
}

/* OVERLAY */

.gallery-overlay{
position:absolute;
inset:0;
background:linear-gradient(to top, rgba(0,0,0,0.75), rgba(0,0,0,0.1));
display:flex;
flex-direction:column;
justify-content:flex-end;
padding:20px;
opacity:0;
transition:0.3s;
}

.gallery-card:hover .gallery-overlay{
opacity:1;
}

.gallery-overlay h3{
color:white;
font-size:20px;
margin-bottom:8px;
}

.gallery-overlay p{
color:#e5e7eb;
font-size:13px;
line-height:1.5;
}

/* CONTENT */

.gallery-content{
padding:22px;
}

.gallery-top{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:18px;
gap:15px;
}

.badge{
padding:7px 14px;
border-radius:30px;
font-size:12px;
font-weight:600;
display:inline-block;
}

.badge-green{
background:#dcfce7;
color:#166534;
}

.badge-blue{
background:#dbeafe;
color:#1d4ed8;
}

.gallery-date{
font-size:13px;
color:#6b7280;
}

/* ACTION BUTTON */

.action-group{
display:flex;
gap:10px;
}

.action-btn{
flex:1;
height:45px;
border-radius:12px;
display:flex;
align-items:center;
justify-content:center;
text-decoration:none;
font-size:14px;
transition:0.3s;
font-weight:500;
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
   PAGINATION
========================= */

.pagination{
margin-top:35px;
display:flex;
justify-content:center;
gap:10px;
flex-wrap:wrap;
}

.pagination a{
width:42px;
height:42px;
border-radius:12px;
background:#f3f4f6;
display:flex;
align-items:center;
justify-content:center;
text-decoration:none;
color:#111827;
font-weight:500;
transition:0.3s;
}

.pagination a.active{
background:#15803d;
color:white;
}

.pagination a:hover{
background:#15803d;
color:white;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:1200px){

.gallery-grid{
grid-template-columns:repeat(2,1fr);
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

.gallery-grid{
grid-template-columns:1fr;
}

.gallery-image{
height:220px;
}

}

</style>

<div class="main-content">

    <!-- PAGE HEADER -->
    <div class="page-header">

        <div class="page-title">
            <h1>Galeri Sekolah</h1>
            <p>Kelola semua foto dan dokumentasi kegiatan MI Al Karomah.</p>
        </div>

        <a href="#" class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Galeri
        </a>

    </div>

    <!-- FILTER -->
    <div class="filter-box">

        <input type="text" placeholder="Cari galeri...">

        <select>
            <option>Semua Kategori</option>
            <option>Kegiatan</option>
            <option>Prestasi</option>
            <option>Keagamaan</option>
            <option>Sekolah</option>
        </select>

        <button class="filter-btn">
            <i class="fas fa-search"></i>
            Filter
        </button>

    </div>

    <!-- GALLERY GRID -->
    <div class="gallery-grid">

        <!-- ITEM -->
        <div class="gallery-card">

            <div class="gallery-image">

                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200&auto=format&fit=crop">

                <div class="gallery-overlay">
                    <h3>Upacara Hari Senin</h3>
                    <p>Kegiatan rutin siswa dan guru setiap hari senin.</p>
                </div>

            </div>

            <div class="gallery-content">

                <div class="gallery-top">

                    <span class="badge badge-green">
                        Kegiatan
                    </span>

                    <div class="gallery-date">
                        20 Mei 2024
                    </div>

                </div>

                <div class="action-group">

                    <a href="#" class="action-btn view-btn">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="#" class="action-btn edit-btn">
                        <i class="fas fa-pen"></i>
                    </a>

                    <a href="#" class="action-btn delete-btn">
                        <i class="fas fa-trash"></i>
                    </a>

                </div>

            </div>

        </div>

        <!-- ITEM -->
        <div class="gallery-card">

            <div class="gallery-image">

                <img src="https://images.unsplash.com/photo-1513258496099-48168024aec0?q=80&w=1200&auto=format&fit=crop">

                <div class="gallery-overlay">
                    <h3>Lomba Tahfidz</h3>
                    <p>Dokumentasi lomba tahfidz tingkat kecamatan.</p>
                </div>

            </div>

            <div class="gallery-content">

                <div class="gallery-top">

                    <span class="badge badge-blue">
                        Prestasi
                    </span>

                    <div class="gallery-date">
                        18 Mei 2024
                    </div>

                </div>

                <div class="action-group">

                    <a href="#" class="action-btn view-btn">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="#" class="action-btn edit-btn">
                        <i class="fas fa-pen"></i>
                    </a>

                    <a href="#" class="action-btn delete-btn">
                        <i class="fas fa-trash"></i>
                    </a>

                </div>

            </div>

        </div>

        <!-- ITEM -->
        <div class="gallery-card">

            <div class="gallery-image">

                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop">

                <div class="gallery-overlay">
                    <h3>Pesantren Kilat</h3>
                    <p>Kegiatan islami selama bulan ramadhan di sekolah.</p>
                </div>

            </div>

            <div class="gallery-content">

                <div class="gallery-top">

                    <span class="badge badge-green">
                        Keagamaan
                    </span>

                    <div class="gallery-date">
                        10 Mei 2024
                    </div>

                </div>

                <div class="action-group">

                    <a href="#" class="action-btn view-btn">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="#" class="action-btn edit-btn">
                        <i class="fas fa-pen"></i>
                    </a>

                    <a href="#" class="action-btn delete-btn">
                        <i class="fas fa-trash"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- PAGINATION -->
    <div class="pagination">

        <a href="#">
            <i class="fas fa-angle-left"></i>
        </a>

        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>

        <a href="#">
            <i class="fas fa-angle-right"></i>
        </a>

    </div>

</div>

</body>
</html>
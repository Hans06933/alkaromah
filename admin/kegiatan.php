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
}

/* =========================
   PAGE HEADER
========================= */

.page-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
gap:20px;
flex-wrap:wrap;
}

.page-title h1{
font-size:34px;
color:#111;
margin-bottom:5px;
}

.page-title p{
color:#666;
font-size:15px;
}

.btn-add{
background:linear-gradient(135deg,#16a34a,#15803d);
padding:14px 22px;
border-radius:12px;
text-decoration:none;
color:white;
font-size:14px;
font-weight:500;
display:flex;
align-items:center;
gap:10px;
transition:0.3s;
}

.btn-add:hover{
transform:translateY(-2px);
}

/* =========================
   FILTER
========================= */

.filter-box{
background:white;
padding:20px;
border-radius:20px;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
margin-bottom:25px;
display:flex;
gap:15px;
flex-wrap:wrap;
}

.filter-box input,
.filter-box select{
height:50px;
border:1px solid #ddd;
border-radius:12px;
padding:0 15px;
font-size:14px;
outline:none;
flex:1;
min-width:200px;
}

.filter-btn{
height:50px;
padding:0 25px;
border:none;
border-radius:12px;
background:#166534;
color:white;
font-weight:500;
cursor:pointer;
}

/* =========================
   TABLE CARD
========================= */

.card{
background:white;
border-radius:22px;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
overflow:hidden;
}

.card-header{
padding:22px 25px;
border-bottom:1px solid #eee;
display:flex;
justify-content:space-between;
align-items:center;
}

.card-header h2{
font-size:22px;
color:#111;
}

/* =========================
   TABLE
========================= */

.table-responsive{
overflow:auto;
}

table{
width:100%;
border-collapse:collapse;
}

table th{
background:#f9fafb;
padding:16px;
font-size:14px;
color:#444;
text-align:left;
white-space:nowrap;
}

table td{
padding:16px;
font-size:14px;
border-bottom:1px solid #eee;
vertical-align:middle;
white-space:nowrap;
}

.activity-info{
display:flex;
align-items:center;
gap:15px;
min-width:250px;
}

.activity-info img{
width:70px;
height:55px;
object-fit:cover;
border-radius:12px;
}

.activity-text h4{
font-size:15px;
margin-bottom:5px;
color:#111;
}

.activity-text p{
font-size:13px;
color:#666;
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

.badge-orange{
background:#ffedd5;
color:#ea580c;
}

/* =========================
   ACTION BUTTON
========================= */

.action-btn{
display:flex;
gap:10px;
}

.action-btn a{
width:38px;
height:38px;
border-radius:10px;
display:flex;
align-items:center;
justify-content:center;
text-decoration:none;
font-size:14px;
transition:0.3s;
}

.view{
background:#ecfdf5;
color:#16a34a;
}

.edit{
background:#eff6ff;
color:#2563eb;
}

.delete{
background:#fef2f2;
color:#dc2626;
}

.action-btn a:hover{
transform:scale(1.08);
}

/* =========================
   PAGINATION
========================= */

.pagination{
display:flex;
justify-content:center;
gap:10px;
padding:25px;
flex-wrap:wrap;
}

.pagination a{
width:42px;
height:42px;
border-radius:12px;
display:flex;
align-items:center;
justify-content:center;
text-decoration:none;
background:#f3f4f6;
color:#111;
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

.table-responsive{
overflow:auto;
}

table{
min-width:1100px;
}

.page-title h1{
font-size:28px;
}

}

</style>

<div class="main-content">

    <!-- PAGE HEADER -->
    <div class="page-header">

        <div class="page-title">
            <h1>Agenda / Kegiatan</h1>
            <p>Kelola semua agenda dan kegiatan sekolah MI Al Karomah.</p>
        </div>

        <a href="#" class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Kegiatan
        </a>

    </div>

    <!-- FILTER -->
    <div class="filter-box">

        <input type="text" placeholder="Cari kegiatan...">

        <select>
            <option>Semua Kategori</option>
            <option>Kegiatan</option>
            <option>Prestasi</option>
            <option>Keagamaan</option>
        </select>

        <select>
            <option>Semua Status</option>
            <option>Publik</option>
            <option>Draft</option>
        </select>

        <button class="filter-btn">
            <i class="fas fa-search"></i>
            Filter
        </button>

    </div>

    <!-- TABLE -->
    <div class="card">

        <div class="card-header">
            <h2>Daftar Kegiatan</h2>
        </div>

        <div class="table-responsive">

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>1</td>

                        <td>
                            <div class="activity-info">

                                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=500&auto=format&fit=crop">

                                <div class="activity-text">
                                    <h4>Upacara Hari Senin</h4>
                                    <p>Kegiatan rutin setiap hari senin</p>
                                </div>

                            </div>
                        </td>

                        <td>
                            <span class="badge badge-green">
                                Kegiatan
                            </span>
                        </td>

                        <td>20 Mei 2024</td>

                        <td>Lapangan Sekolah</td>

                        <td>
                            <span class="badge badge-blue">
                                Publik
                            </span>
                        </td>

                        <td>

                            <div class="action-btn">

                                <a href="#" class="view">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="#" class="edit">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <a href="#" class="delete">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </div>

                        </td>

                    </tr>

                    <tr>

                        <td>2</td>

                        <td>
                            <div class="activity-info">

                                <img src="https://images.unsplash.com/photo-1513258496099-48168024aec0?q=80&w=500&auto=format&fit=crop">

                                <div class="activity-text">
                                    <h4>Lomba Tahfidz Kecamatan</h4>
                                    <p>Kompetisi hafalan Al-Quran tingkat kecamatan</p>
                                </div>

                            </div>
                        </td>

                        <td>
                            <span class="badge badge-orange">
                                Prestasi
                            </span>
                        </td>

                        <td>18 Mei 2024</td>

                        <td>Aula Kecamatan</td>

                        <td>
                            <span class="badge badge-blue">
                                Publik
                            </span>
                        </td>

                        <td>

                            <div class="action-btn">

                                <a href="#" class="view">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="#" class="edit">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <a href="#" class="delete">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </div>

                        </td>

                    </tr>

                    <tr>

                        <td>3</td>

                        <td>
                            <div class="activity-info">

                                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=500&auto=format&fit=crop">

                                <div class="activity-text">
                                    <h4>Pesantren Kilat Ramadhan</h4>
                                    <p>Kegiatan islami selama bulan ramadhan</p>
                                </div>

                            </div>
                        </td>

                        <td>
                            <span class="badge badge-green">
                                Keagamaan
                            </span>
                        </td>

                        <td>10 Mei 2024</td>

                        <td>Masjid Sekolah</td>

                        <td>
                            <span class="badge badge-blue">
                                Publik
                            </span>
                        </td>

                        <td>

                            <div class="action-btn">

                                <a href="#" class="view">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="#" class="edit">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <a href="#" class="delete">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

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

</div>

</body>
</html>
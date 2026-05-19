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
flex-wrap:wrap;
margin-bottom:25px;
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
color:white;
text-decoration:none;
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
   FILTER BOX
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
transition:0.3s;
}

.filter-box input:focus,
.filter-box select:focus{
border-color:#16a34a;
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
transition:0.3s;
}

.filter-btn:hover{
background:#14532d;
}

/* =========================
   TABLE CARD
========================= */

.card{
background:white;
border-radius:22px;
overflow:hidden;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
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
color:#111827;
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
padding:18px;
font-size:14px;
color:#4b5563;
text-align:left;
white-space:nowrap;
}

table td{
padding:18px;
border-bottom:1px solid #f1f5f9;
font-size:14px;
vertical-align:middle;
white-space:nowrap;
}

/* =========================
   GURU INFO
========================= */

.guru-info{
display:flex;
align-items:center;
gap:15px;
min-width:260px;
}

.guru-info img{
width:65px;
height:65px;
border-radius:18px;
object-fit:cover;
}

.guru-text h4{
font-size:15px;
font-weight:600;
color:#111827;
margin-bottom:5px;
}

.guru-text p{
font-size:13px;
color:#6b7280;
}

/* =========================
   BADGE
========================= */

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
border-radius:12px;
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
padding:25px;
display:flex;
justify-content:center;
gap:10px;
flex-wrap:wrap;
}

.pagination a{
width:42px;
height:42px;
background:#f3f4f6;
border-radius:12px;
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

table{
min-width:1200px;
}

}

</style>

<div class="main-content">

    <!-- PAGE HEADER -->
    <div class="page-header">

        <div class="page-title">
            <h1>Guru & Staff</h1>
            <p>Kelola data guru dan staff MI Al Karomah.</p>
        </div>

        <a href="#" class="btn-add">
            <i class="fas fa-plus"></i>
            Tambah Guru
        </a>

    </div>

    <!-- FILTER -->
    <div class="filter-box">

        <input type="text" placeholder="Cari nama guru...">

        <select>
            <option>Semua Jabatan</option>
            <option>Kepala Sekolah</option>
            <option>Guru Kelas</option>
            <option>Guru Agama</option>
            <option>Staff TU</option>
        </select>

        <select>
            <option>Semua Status</option>
            <option>Aktif</option>
            <option>Nonaktif</option>
        </select>

        <button class="filter-btn">
            <i class="fas fa-search"></i>
            Filter
        </button>

    </div>

    <!-- TABLE -->
    <div class="card">

        <div class="card-header">
            <h2>Daftar Guru & Staff</h2>
        </div>

        <div class="table-responsive">

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Guru</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Pendidikan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>1</td>

                        <td>

                            <div class="guru-info">

                                <img src="https://randomuser.me/api/portraits/men/32.jpg">

                                <div class="guru-text">
                                    <h4>Ahmad Fauzi, S.Pd.I</h4>
                                    <p>Guru Pendidikan Agama Islam</p>
                                </div>

                            </div>

                        </td>

                        <td>1987654321</td>

                        <td>
                            <span class="badge badge-green">
                                Guru Agama
                            </span>
                        </td>

                        <td>S1 Pendidikan Islam</td>

                        <td>
                            <span class="badge badge-blue">
                                Aktif
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

                            <div class="guru-info">

                                <img src="https://randomuser.me/api/portraits/women/44.jpg">

                                <div class="guru-text">
                                    <h4>Siti Aminah, S.Pd</h4>
                                    <p>Wali Kelas 5A</p>
                                </div>

                            </div>

                        </td>

                        <td>1987654322</td>

                        <td>
                            <span class="badge badge-orange">
                                Guru Kelas
                            </span>
                        </td>

                        <td>S1 PGSD</td>

                        <td>
                            <span class="badge badge-blue">
                                Aktif
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

                            <div class="guru-info">

                                <img src="https://randomuser.me/api/portraits/men/65.jpg">

                                <div class="guru-text">
                                    <h4>Muhammad Ridwan, M.Pd</h4>
                                    <p>Kepala Sekolah</p>
                                </div>

                            </div>

                        </td>

                        <td>1987654323</td>

                        <td>
                            <span class="badge badge-green">
                                Kepala Sekolah
                            </span>
                        </td>

                        <td>S2 Manajemen Pendidikan</td>

                        <td>
                            <span class="badge badge-blue">
                                Aktif
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
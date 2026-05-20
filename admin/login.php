<?php
session_start();

include '../config/koneksi.php';

if(isset($_SESSION['login'])){
    header("Location: dashboard.php");
    exit;
}

$error = '';

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        if(password_verify($password, $data['password'])){

            $_SESSION['login'] = true;
            $_SESSION['id_admin'] = $data['id'];
            $_SESSION['nama_admin'] = $data['nama'];
            $_SESSION['role'] = $data['role'];

            header("Location: dashboard.php");
            exit;

        }else{
            $error = "Password salah!";
        }

    }else{
        $error = "Username tidak ditemukan!";
    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Admin</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f4f6f9;
display:flex;
align-items:center;
justify-content:center;
min-height:100vh;
padding:20px;
}

/* =========================
   LOGIN BOX
========================= */

.login-box{
width:100%;
max-width:430px;
background:white;
padding:40px;
border-radius:30px;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
position:relative;
}

/* =========================
   BACK BUTTON
========================= */

.back-btn{
position:absolute;
top:20px;
left:20px;
width:42px;
height:42px;
border-radius:12px;
background:#f3f4f6;
display:flex;
align-items:center;
justify-content:center;
text-decoration:none;
color:#166534;
transition:0.3s;
}

.back-btn:hover{
background:#16a34a;
color:white;
}

/* =========================
   LOGO
========================= */

.logo{
text-align:center;
margin-bottom:30px;
}

.logo h1{
font-size:32px;
color:#166534;
margin-bottom:10px;
}

.logo p{
color:#666;
font-size:14px;
}

/* =========================
   FORM
========================= */

.input-group{
margin-bottom:20px;
}

.input-group label{
display:block;
margin-bottom:8px;
font-weight:500;
color:#333;
}

.input-box{
position:relative;
}

.input-box i{
position:absolute;
left:18px;
top:50%;
transform:translateY(-50%);
color:#999;
}

.input-box input{
width:100%;
height:55px;
border:1px solid #ddd;
border-radius:14px;
padding:0 20px 0 50px;
font-size:14px;
outline:none;
transition:0.3s;
}

.input-box input:focus{
border-color:#16a34a;
}

/* =========================
   BUTTON
========================= */

.btn-login{
width:100%;
height:55px;
border:none;
border-radius:14px;
background:linear-gradient(135deg,#16a34a,#15803d);
color:white;
font-size:15px;
font-weight:600;
cursor:pointer;
transition:0.3s;
margin-top:10px;
}

.btn-login:hover{
transform:translateY(-2px);
}

/* =========================
   ERROR
========================= */

.error{
background:#fef2f2;
color:#dc2626;
padding:15px;
border-radius:12px;
margin-bottom:20px;
font-size:14px;
}

</style>

</head>
<body>

<div class="login-box">

    <!-- BACK TO WEBSITE -->
    <a href="../index.php" class="back-btn">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="logo">
        <h1>MI Al Karomah</h1>
        <p>Login Dashboard Administrator</p>
    </div>

    <?php if($error != '') : ?>

        <div class="error">
            <?= $error; ?>
        </div>

    <?php endif; ?>

    <form method="POST">

        <div class="input-group">

            <label>Username</label>

            <div class="input-box">

                <i class="fas fa-user"></i>

                <input type="text"
                       name="username"
                       placeholder="Masukkan username"
                       required>

            </div>

        </div>

        <div class="input-group">

            <label>Password</label>

            <div class="input-box">

                <i class="fas fa-lock"></i>

                <input type="password"
                       name="password"
                       placeholder="Masukkan password"
                       required>

            </div>

        </div>

        <button type="submit" name="login" class="btn-login">
            Login Sekarang
        </button>

    </form>

</div>

</body>
</html>
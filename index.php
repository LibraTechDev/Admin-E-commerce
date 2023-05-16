<?php
session_start();
include "koneksi.php";

// apabila tombol login ditekan
if(isset($_POST["masuk"])){

  $get_username = $_POST["username"];
  $get_password = $_POST["password"];
  $query_table = mysqli_query($koneksi_db, "SELECT * FROM user WHERE username = '$get_username' AND password = '$get_password'");
  $bedah_kolom = mysqli_fetch_assoc($query_table);

  // apabila username atau password tidak ditemukan
  if(!$bedah_kolom){
    $not_found = true;
  } else {
    // jika ditemukan maka session diisi dan disetting
    $_SESSION["login"] = $bedah_kolom["username"];
    header("Location: dashbord.php");
  }


}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="img/Favicon.png">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>LoginSite</title>
    <style>
    .center{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 650px;
    }
    .item{
      border-radius: 67px;
      background: #2863c3;
      box-shadow:  21px 21px 43px #1f4c96,
             -21px -21px 43px #317af0;
      width: 60%;
      padding: 20px;
      
    }
    body{
      background-image: url(img/bg2.png);
    }
    p{
      color:white;
    }
    </style>
  </head>
  <body>
  <nav class="nav nav-pills flex-sm-row bg-primary ">
    <a class="navbar-brand fw-bold fs-3 mx-5 " href="#">
        <span class="text-white">Login</span>Site
    </a>
    </nav>
    <div class="container">
      <div class="center">
        <div class="item" data-aos="zoom-in">
          <h2 class="text-center fw-bold text-white">Login Administrator</h2>
<form method="post" action="">
  <center>
    <img src="img/avataranimation.gif" alt="Avatar" class="avatar" style="width:300px; border-radius:50px; background-color:blue; ">
  </center>
    <div class="mb-3">
      <label for="username" class="form-label fw-bold text-white">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="username">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label fw-bold text-white">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="password">
    </div>
    <br>
        <?php if(isset($not_found)){ ?>
        <b><p>Username Atau Password Tidak Ditemukan</p></b>
        <br>  
        <?php } ?>
        <button name="masuk" type="submit" class="btn btn-info">Login</button>

</form>
   
      </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
  </body>
</html>
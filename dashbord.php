<?php
session_start();
// jika belum login maka akan kembali ke index
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
}

include "koneksi.php";

// ambil data user lewat $_SESSION
$get_username = $_SESSION["login"];
$query_user = mysqli_query($koneksi_db, "SELECT * FROM user WHERE username = '$get_username'");
$bedah_kolom = mysqli_fetch_assoc($query_user);



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/Favicon.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            background-image: url(img/bg2.png);
        }
        .card{
            border:3px solid black;
        }
        .log:hover{
            background-color:white;
            scale:1.1;
        }
        .user-foto{
            margin-left: 55px;
            width: 50px;
            height:auto;
            border-radius:30px;
        }
    </style>
  </head>
  <body>
    <nav class="nav nav-pills flex-sm-row bg-primary bg-gradient">
    <a class="navbar-brand fw-bold fs-3 mx-5 " href="#">
        <span class="text-white">Dash</span>Board
    </a>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <button class="btn btn-success dropdown-toggle my-2" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a><img class="user-foto" src="pp-user/<?php echo $bedah_kolom["foto"]; ?>" alt=""></a></li>
            <li><a class="nav-link text-light fw-bold fs-5 mx-3" >User : <?= $get_username ; ?></a></li>
          </ul>
        </li>
      </ul>
    <a href="logout.php" class="text-sm-end" style="margin-left:500px;"><img src="img/logout.png" alt="" width="10%" class="log"></a>
    </nav>
    <div class="container p-5">
        <div class="row row-cols-2">
            <div class="col">
                <div class="card text-center" data-aos="fade-right">
                    <div class="card-body">
                        <a href="listUser.php">
                            <img src="img/user.jpg" alt="gambaruser" class="rounded mx-auto d-block" style="150px; width: 180px;">
                        </a>
                    </div>
                    <div class="card-footer text-dark fw-bold" style="border:2px solid black;">
                        User
                    </div>
                </div>
            </div>
            <div class="col" >
                <div class="card text-center shadow" data-aos="fade-left">
                    <div class="card-body">
                        <a href="listbarang.php">
                            <img src="img/brg.png" alt="gambarbarang" class="rounded mx-auto d-block" style="150px; width: 180px;">
                        </a>
                    </div>
                    <div class="card-footer text-dark fw-bold" style="border:2px solid black;">
                        Barang
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center" data-aos="fade-right">
                    <div class="card-body">
                        <a href="listorder.php">
                            <img src="img/order.png" alt="gambarorder" class="rounded mx-auto d-block" style="150px; width: 180px;">
                        </a>
                    </div>
                    <div class="card-footer text-dark fw-bold" style="border:2px solid black;">
                        Order
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center" data-aos="fade-left">
                    <div class="card-body">
                        <a href="kategori.php">
                            <img src="img/kategori.jpg" alt="gambaruser" class="rounded mx-auto d-block" style="height: 180px;">
                        </a>
                    </div>
                    <div class="card-footer text-dark fw-bold" style="border:2px solid black;">
                        Kategori
                    </div>
                </div>
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
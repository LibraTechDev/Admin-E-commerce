<?php
session_start();

include "koneksi.php";
include "function.php";


// apabila user belum login maka akan kembali ke index
if(!isset($_SESSION["login"])){
    header("Location: index.php");
}

// dapatkan username dari variabel $_SESSION
$get_username = $_SESSION["login"];

$query_user = mysqli_query($koneksi_db, "SELECT * FROM user WHERE username = '$get_username'");
$bedah_kolom = mysqli_fetch_assoc($query_user);

// diurutkan berdasarkan paling terbaru ter input sebagai user
$query_all_user = mysqli_query($koneksi_db, "SELECT * FROM user ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP REQUIREMENTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="32x32" href="img/Favicon.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>List User</title>
    <style>
    .pp-user{
            width: 50px;
            height: auto;
            border-radius: 30px;
        }
      body{
        background-image: url(img/bg2.png);
        overflow-x: hidden;
      }
      td{
        color:white;
        font-weight:bold;
      }
      table{
        border: 3px solid;
      }
      tr {
        color:white;
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
    <a class="navbar-brand fw-bold fs-3 mx-5 text-dark  " href="dashbord.php">
        <span class="text-white">Dash</span>Board
    </a>
    <span class="nav-link text-dark fw-bold fs-5 mx-5">List User</span>
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
    <a href="logout.php" class="text-sm-end" style="margin-left: 266px; "><img src="img/logout.png" alt="" width="10%" class="log"></a>
  </nav>
  <div class="container" data-aos="zoom-in">
    
      <a href="addUser.php"><button class="btn btn-info mt-3 mb-3">Tambah Data</button></a>
    <table class="table">
      <tr>
        <th>NO.</th>
        <th>Username</th>
        <th>Password</th>
        <th>Photo</th>
        <th>Action</th>
      </tr>
    <?php 
    $nomor_ke = 1;
    foreach($query_all_user as $get_users ){ ?>
      <tr>
        <td><?php echo $nomor_ke++; ?></td>
        <td><?php echo $get_users["username"]; ?></td>
        <td><?php echo $get_users["password"]; ?></td>
        <td><img class="pp-user" src="pp-user/<?php echo $get_users["foto"]; ?>"></td>
        <td><a href="edituser.php?id=<?php echo $get_users["id"]?>"><button class="btn btn-primary">Edit</button> | <a href="deluser.php?id=<?php echo $get_users["id"]; ?>" 
        onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus?')"><button class="btn btn-danger">Delete</button></a></td>
      </tr>
    <?php } ?>
    </table>
  </div>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init();
</script>
</body>
</html>
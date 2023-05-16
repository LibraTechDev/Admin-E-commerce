<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: index.php");
}

include "koneksi.php";
include "function.php";

if(!isset($_GET["id"]) AND $_GET["id"] == ""){
    header("Location: listUser.php");
}

$get_id = $_GET["id"];

$query_user = mysqli_query($koneksi_db, "SELECT * FROM user WHERE id = '$get_id'");
$array_user = mysqli_fetch_assoc($query_user);

if(isset($_POST["update_user"])){
    if(updateuser($_POST) > 0){
        echo "<script>alert('Berhasil Update User!');window.location.href='listUser.php';</script>";
    } else {
        echo "<script>alert('Gagal Update User!');window.location.href='listUser.php';</script>";
    }
}


?>

<!doctype html>
<html lang="en">    
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/Favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
    .center{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 650px;
    }
    .card{
      width:70%;
      height:auto;
      border-radius: 75px;
      background: linear-gradient(145deg, #759cda, #8bb9ff);
      box-shadow:  34px 34px 70px #5a77a7,
             -34px -34px 70px #aae3ff;
    }
    body{
      background-image: url("img/bg2.png");
    }
    </style>
</head>
  <body>
  <nav class="nav nav-pills flex-sm-row bg-primary bg-gradient">
    <a class="navbar-brand fw-bold fs-3 mx-5 " href="#">
        <span class="text-white">EditUser</span>Site
    </a>
    </nav>
<div class="container">
  <div class="center">
     <div class="card">
        <div class="row justify-content-center">
            <div class="col-10">
                <h1>Form Edit User</h1>
                <a href="listUser.php"><button class="btn btn-info">Kembali</button></a>
              <form action="" method="post" enctype="multipart/form-data">
                <input value="<?php echo $array_user['id']; ?>" type="hidden" name="id">
                <div class="form-group mb-2">
                  <label for="username" class="fw-bold fs-5">Username</label>
                  <input value="<?php echo $array_user["username"]; ?>" name="username" type="text" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group mb-2">
                  <label for="harga" class="fw-bold fs-5">Password</label>
                  <input value="<?php echo $array_user["password"]; ?>" name="password" type="text" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group mb-2">
                <label for="foto" class="fw-bold fs-5">Gambar</label><br>
                <input type="file" class="form-control" name="foto" id="keterangan">
                <img src="pp-user/<?php echo $array_user["foto"]; ?>" style="width: 100px;" class="mt-3 mb-3">
                <input type="hidden" name="id" value="<?php echo $array_user["id"]; ?>">
                <input type="checkbox" name="ubah_foto" value="true">Checklist jika ingin merubah gambar <br>
                <button type="submit" name="update_user" class="btn btn-primary mt-3">Update</button>
                </div>
              </form>
            </div>
        </div>
     </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
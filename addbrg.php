<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: index.php");
}

include "koneksi.php";
include "function.php";

if(isset($_POST["kirim_barang"])){
if(uploadBarang($_POST) > 0){
  echo "<script>alert('Berhasil upload!');window.location.href='listBarang.php';</script>";
} else {
  echo "<script>alert('Gagal upload!');window.location.href='listBarang.php';</script>";
}
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Barang</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/Favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
    .center{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 600px;
    }
    .card{
      width: 70%;
      border-radius: 75px;
background: linear-gradient(145deg, #759cda, #8bb9ff);
box-shadow:  34px 34px 70px #5a77a7,
             -34px -34px 70px #aae3ff;
    }
    body{
      background-image:url("img/bg2.png");
    }
    </style>
</head>
  <body>
  <nav class="nav nav-pills flex-sm-row bg-primary bg-gradient">
    <a class="navbar-brand fw-bold fs-3 mx-5 " href="#">
        <span class="text-white">AddBarang</span>Site
    </a>
  </nav>
<div class="container">
   <div class="center">
     <div class="card">
        <div class="row justify-content-center">
            <div class="col-10">
                <h1>Form Entry Barang</h1>
                <a href="listbarang.php"><button class="btn btn-info">Kembali</button></a> 
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                      <label  for="nama" class="fw-bold fs-5">Nama</label>
                      <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama barang">
                    </div>
                    <div class="form-group mb-2">
                      <label  for="harga" class="fw-bold fs-5">Harga</label>
                      <input name="harga" type="number" class="form-control" id="harga" placeholder="Harga barang">
                    </div>
                    <div class="form-group mb-2">
                      <label  for="jumlah" class="fw-bold fs-5">Jumlah</label>
                      <input name="jumlah" type="number" class="form-control" id="jumlah" placeholder="Jumlah barang">
                    </div>
                    <div class="form-group mb-2">
                      <label  for="keterangan" class="fw-bold fs-5">Keterangan</label>
                      <input name="keterangan" type="text" class="form-control" id="keterangan" placeholder="Keterangan barang">
                    </div>
                    <div class="custom-file">
                      <input name="foto" type="file" class="custom-file-input" accept="image/png, image/jpeg, image/jpg" id="validatedCustomFile" required>
                      <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                    <button type="submit" name="kirim_barang" class="btn btn-primary mt-3">Kirim</button>
                </form>
            </div>
        </div>
     </div> 
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
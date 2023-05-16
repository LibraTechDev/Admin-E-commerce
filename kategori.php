<?php
session_start();
if (!isset($_SESSION["login"])){

  header("location:index.php");
}
include "koneksi.php";


// ambil data user lewat $_SESSION
$get_username = $_SESSION["login"];
$query_user = mysqli_query($koneksi_db, "SELECT * FROM user WHERE username = '$get_username'");
$bedah_kolom = mysqli_fetch_assoc($query_user);


$query_kategori = mysqli_query($koneksi_db, "SELECT * FROM kategori ORDER BY id ASC");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kategori</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/Favicon.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
      body{
        background-image: url(img/bg2.png);
        overflow-x: hidden;
      }
      td{
        color:white;
        font-weight:bold;
      }
      table{
        border: 3px solid black;
      }
      tr {
        color:white;
      }
      .log:hover{
            background-color:white;
            scale:1.2;
      }
      .pp-user{
        margin-left: 55px;
        width: 50px;
        height:auto;
        border-radius:30px;
      }
      .kategori{
        width: 50px;
        height: auto;
        border-radius: 30px;
      }
      html::-webkit-scrollbar {
	    width: 1rem;
      }   

      html::-webkit-scrollbar-track {
	    background: white;
      }

      html::-webkit-scrollbar-thumb {
	    background: skyblue;
      }
    </style>
  </head>
  <body>
  <nav class="nav nav-pills flex-sm-row bg-primary bg-gradient">
    <a class="navbar-brand fw-bold fs-3 mx-5  " href="dashbord.php">
        <span class="text-white">Dash</span>Board
    </a>
    <span class="nav-link text-dark fw-bold fs-5 mx-5"> List Kategori</span>
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <button class="btn btn-success dropdown-toggle my-2" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a><img class="pp-user" src="pp-user/<?php echo $bedah_kolom["foto"]; ?>" alt=""></a></li>
            <li><a class="nav-link text-light fw-bold fs-5 mx-3" >User : <?= $get_username ; ?></a></li>
          </ul>
        </li>
      </ul>
    <a href="logout.php" class="text-sm-end" style="margin-left: 255px; "><img src="img/logout.png" alt="" width="10%" class="log"></a>
  </nav>

    <div class="container" data-aos="zoom-in">
      <a href="addkategori.php"><button class="btn btn-info mt-3 mb-3">Tambah Data</button></a>
        <table class="table">
        <tr>
          <th>No.</th>
          <th>Nama Member</th>
          <th>Keterangan</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
        <?php
          $nomor_ke = 1;
      foreach($query_kategori as $key){ ?>
          <tr>
        <td scope="row 1"><?php echo $nomor_ke++; ?></td>
        <td><?php echo $key["nama"]; ?></td>
        <td><?php echo $key["keterangan"]; ?></td>
        <td><img class="kategori" src="kategori/<?php echo $key["foto"]; ?>"></td>
        <td><a href="editkategori.php?id=<?php echo $key["id"]?>"><button class="btn btn-primary">Edit</button> | <a href="delkategori.php?id=<?php echo $key["id"]; ?>" onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus?')"><button class="btn btn-danger">Delete</button></a></td>
          </tr>
<?php } ?>

</table>

    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
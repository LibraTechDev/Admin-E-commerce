<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: index.php");
}

if(!isset($_GET["id"]) AND $_GET["id"] == ""){
    header("Location: index.php");
}

include "koneksi.php";

$get_id = $_GET["id"];

$query_user = mysqli_query($koneksi_db, "DELETE FROM user WHERE id = '$get_id'");
if($query_user){
    echo "<script>alert('Berhasil Menghapus');window.location.href='listUser.php'</script>";
}
header("Location: listUser.php");

?>
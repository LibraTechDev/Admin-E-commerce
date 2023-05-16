<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: index.php");
}

if(!isset($_GET["id"]) AND $_GET["id"] == ""){
    header("Location: listmember.php");
}

include "koneksi.php";

$get_id_kategori = $_GET["id"];

$query_kategori = mysqli_query($koneksi_db, "SELECT * FROM kategori WHERE idkategori = '$get_id_kategori'");
$array_kategori = mysqli_fetch_assoc($query_kategori);

unlink('kategori/' . $array_kategori["foto"]);
mysqli_query($koneksi_db, "DELETE FROM kategori WHERE idkategori = '$get_id_kategori'");

if($query_kategori){
    echo "<script>alert('Berhasil Menghapus');window.location.href='kategori.php'</script>";
}
?>
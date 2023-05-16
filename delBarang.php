<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: index.php");
}

if(!isset($_GET["id_barang"]) AND $_GET["id_barang"] == ""){
    header("Location: index.php");
}

include "koneksi.php";

$get_id_barang = $_GET["id_barang"];

$query_table = mysqli_query($koneksi_db, "SELECT * FROM barang WHERE id = '$get_id_barang'");
$array_table = mysqli_fetch_assoc($query_table);

// hapus gambar
unlink('img-barang/' . $array_table["foto"]);

$query_table = mysqli_query($koneksi_db, "DELETE FROM barang WHERE id = '$get_id_barang'");
header("Location: listBarang.php");

?>
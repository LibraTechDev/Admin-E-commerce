<?php
include "koneksi.php";

function uploadBarang($data){
    global $koneksi_db;

    $nama_barang = htmlspecialchars($data["nama"]);
    $jumlah_barang = htmlspecialchars($data["jumlah"]);
    $harga_barang = htmlspecialchars($data["harga"]);
    $keterangan_barang = htmlspecialchars($data["keterangan"]);



    $namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah yang diupload gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('Yang Anda Upload Bukan Gambar!');
		</script>";
		return false;
	}

	// cek jika ukuran terlalu besar
	$ekstensiFile = ['> 5000000'];
	if(in_array($ukuranFile, $ekstensiFile)) {
		echo "<script>
				alert('Ukuran file harus dibawah 5MB!');
		</script>";
		return false;
	}
	
	// ===== Lolos pengecekan =====


	// Generate nama baru
	$namaFileBaru = "barang_" . uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img-barang/' . $namaFileBaru);

	mysqli_query($koneksi_db, "INSERT INTO barang (nama, harga, jumlah, keterangan, foto) 
	VALUES ('$nama_barang', '$harga_barang', '$jumlah_barang', '$keterangan_barang', '$namaFileBaru')");
	
	return mysqli_affected_rows($koneksi_db);
}

function uploadUser($data){
    global $koneksi_db;

    $nama_user = htmlspecialchars($data["username"]);
    $pass_user = htmlspecialchars($data["password"]);

    $namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah yang diupload gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('Yang Anda Upload Bukan Gambar!');
		</script>";
		return false;
	}

	// cek jika ukuran terlalu besar
	$ekstensiFile = ['> 5000000'];
	if(in_array($ukuranFile, $ekstensiFile)) {
		echo "<script>
				alert('Ukuran file harus dibawah 5MB!');
		</script>";
		return false;
	}
	
	// ===== Lolos pengecekan =====


	// Generate nama baru
	$namaFileBaru = "user_" . uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'pp-user/' . $namaFileBaru);

	mysqli_query($koneksi_db, "INSERT INTO user (username, password, foto) VALUES ('$nama_user', '$pass_user', '$namaFileBaru')");

	return mysqli_affected_rows($koneksi_db);

}

function uploadkategori($data){
    global $koneksi_db;

    $nama_kategori = htmlspecialchars($data["nama_kategori"]);
    $keteranganktg = htmlspecialchars($data["keterangan"]);
    

    $namaFile = $_FILES['foto']['name'];
	$ukuranFile = $_FILES['foto']['size'];
	$tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah yang diupload gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('Yang Anda Upload Bukan Gambar!');
		</script>";
		return false;
	}

	// cek jika ukuran terlalu besar
	$ekstensiFile = ['> 5000000'];
	if(in_array($ukuranFile, $ekstensiFile)) {
		echo "<script>
				alert('Ukuran file harus dibawah 5MB!');
		</script>";
		return false;
	}
	
	// ===== Lolos pengecekan =====


	// Generate nama baru
	$namaFileBaru = "kategori_" . uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'kategori/' . $namaFileBaru);

	mysqli_query($koneksi_db, "INSERT INTO kategori (nama_kategori, keterangan, foto) 
	VALUES ('$nama_kategori', '$keteranganktg', '$namaFileBaru')");

	return mysqli_affected_rows($koneksi_db);

}


function updateBarang($data){

    global $koneksi_db;

    $nama_barang = htmlspecialchars($data["nama"]);
    $stok_barang = htmlspecialchars($data["jumlah"]);
    $harga_barang = htmlspecialchars($data["harga"]);
    $keterangan_barang = htmlspecialchars($data["keterangan"]);
    $get_id_barang = htmlspecialchars($data["id"]);
	if (isset($_POST["ubah_foto"])){
		$namaFile = $_FILES['foto']['name'];
		$ukuranFile = $_FILES['foto']['size'];
		$tmpName = $_FILES['foto']['tmp_name'];
	
	
		// cek apakah yang diupload gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
			echo "<script>
					alert('Yang Anda Upload Bukan Gambar!');
			</script>";
			return false;
		}
	
		// cek jika ukuran terlalu besar
		$ekstensiFile = ['> 5000000'];
		if(in_array($ukuranFile, $ekstensiFile)) {
			echo "<script>
					alert('Ukuran file harus dibawah 5MB!');
			</script>";
			return false;
		}
	
		// ===== Lolos pengecekan =====
	
		// Generate nama baru
		$namaFileBaru = "barang_" . uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
	
		$query_file_lama = mysqli_query($koneksi_db, "SELECT * FROM barang WHERE id = '$get_id_barang'");
		$array_file_lama = mysqli_fetch_assoc($query_file_lama);
	
		if(file_exists('img-barang/'.$array_file_lama["foto"])){
			// hapus gambar lama
			unlink('img-barang/' . $array_file_lama["foto"]);
	
			// insert gambar baru
			move_uploaded_file($tmpName, 'img-barang/' . $namaFileBaru);
		}
		
	
		mysqli_query($koneksi_db, "UPDATE barang SET nama = '$nama_barang',harga = '$harga_barang',jumlah = '$stok_barang', keterangan = '$keterangan_barang', foto = '$namaFileBaru' WHERE id = '$get_id_barang'");
	
	}else{
		mysqli_query($koneksi_db, "UPDATE barang SET nama = '$nama_barang',harga = '$harga_barang',jumlah = '$stok_barang', keterangan = '$keterangan_barang' WHERE id = '$get_id_barang'");
	}

	return mysqli_affected_rows($koneksi_db);

}
function updateuser($data){

    global $koneksi_db;

    $username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);
	$get_id_user = htmlspecialchars($data["id"]);
	

	if(isset($_POST["ubah_foto"])){
		$namaFile = $_FILES['foto']['name'];
		$ukuranFile = $_FILES['foto']['size'];
		$tmpName = $_FILES['foto']['tmp_name'];
	
	
		// cek apakah yang diupload gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
			echo "<script>
					alert('Yang Anda Upload Bukan Gambar!');
			</script>";
			return false;
		}
	
		// cek jika ukuran terlalu besar
		$ekstensiFile = ['> 5000000'];
		if(in_array($ukuranFile, $ekstensiFile)) {
			echo "<script>
					alert('Ukuran file harus dibawah 5MB!');
			</script>";
			return false;
		}
	
		// ===== Lolos pengecekan =====
	
		// Generate nama baru
		$namaFileBaru = "user_" . uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
		$query_file_lama = mysqli_query($koneksi_db, "SELECT * FROM user WHERE id = '$get_id_user'");
		$array_file_lama = mysqli_fetch_assoc($query_file_lama);
	
		if(file_exists('pp-user/'.$array_file_lama["foto"])){
			// hapus gambar lama
			unlink('pp-user/' . $array_file_lama["foto"]);
	
			// insert gambar baru
			move_uploaded_file($tmpName, 'pp-user/' . $namaFileBaru);
		}

    mysqli_query($koneksi_db, "UPDATE user SET username = '$username', password = '$password', foto = '$namaFileBaru' WHERE id = '$get_id_user'");
	}
    else{
	mysqli_query($koneksi_db, "UPDATE user SET username = '$username', password = '$password' WHERE id = '$get_id_user'");
	}

	return mysqli_affected_rows($koneksi_db);

}

function updatekategori($data){

    global $koneksi_db;

    $namakategori = htmlspecialchars($data["nama"]);
    $keterangan_kategori = htmlspecialchars($data["keterangan"]);
    $get_id_kategori = htmlspecialchars($data["id"]);
	if (isset($_POST["ubah_foto"])){
		$namaFile = $_FILES['foto']['name'];
		$ukuranFile = $_FILES['foto']['size'];
		$tmpName = $_FILES['foto']['tmp_name'];
	
	
		// cek apakah yang diupload gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
			echo "<script>
					alert('Yang Anda Upload Bukan Gambar!');
			</script>";
			return false;
		}
	
		// cek jika ukuran terlalu besar
		$ekstensiFile = ['> 5000000'];
		if(in_array($ukuranFile, $ekstensiFile)) {
			echo "<script>
					alert('Ukuran file harus dibawah 5MB!');
			</script>";
			return false;
		}
	
		// ===== Lolos pengecekan =====
	
		// Generate nama baru
		$namaFileBaru = "kategori_" . uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;
	
		$query_file_lama = mysqli_query($koneksi_db, "SELECT * FROM kategori WHERE id = '$get_id_kategori'");
		$array_file_lama = mysqli_fetch_assoc($query_file_lama);
	
		if(file_exists('kategori/'.$array_file_lama["foto"])){
			// hapus gambar lama
			unlink('kategori/' . $array_file_lama["foto"]);
	
			// insert gambar baru
			move_uploaded_file($tmpName, 'kategori/' . $namaFileBaru);
		}
		
	
		mysqli_query($koneksi_db, "UPDATE kategori SET nama = '$namakategori', keterangan = '$keterangan_kategori', foto = '$namaFileBaru' WHERE id = '$get_id_kategori'");
	
	}else{
		mysqli_query($koneksi_db, "UPDATE kategori SET nama = '$namakategori', keterangan = '$keterangan_kategori' WHERE id = '$get_id_kategori'");
	}

	return mysqli_affected_rows($koneksi_db);

}




?>
<form method="post">
	Nim:<input type="text" name="nim"><br>
	Nama:<input type="text" name="nama"><br>
	<input type="submit" name="kirim" value="Login">
</form>

<?php 
include 'koneksi.php';
if (isset($_POST['kirim'])) {
	session_start();
	if (str_word_count($_POST['nama'])<=35) {
			$nama = $_POST['nama'];
		}else{echo "Nama terlalu panjang <br>";}

		if (!is_numeric($_POST['nim'])&&str_word_count($_POST['nim']>10)) {
			echo "NIM harus angka dan max 10 karakter <br>";
		}else{$nim = $_POST['nim'];}
		$_SESSION['nama'] = $nama;
		$_SESSION['nim'] = $nim;
		if (isset($nama)&&isset($nim)) {
			$que = mysqli_query($conn,"SELECT * FROM `datadiri` WHERE nim='$nim'");
			$arr = mysqli_fetch_array($que);
			if ($nama ==$arr['nama']&&$nim ==$arr['nim']) {
				echo "Berhasil";
				header("Location:view.php");
			}
		}
}
 ?>
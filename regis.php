<form method="post">
	Nim:<input type="text" name="nim"><br>
	Nama:<input type="text" name="nama"><br>
	Kelas:<input type="radio" name="rad" value="D3MI-41-01">D3MI-41-01
		<input type="radio" name="rad" value="D3MI-41-02">D3MI-41-02
		<input type="radio" name="rad" value="D3MI-41-03">D3MI-41-03 <br>
	Jeniskelamin:<input type="radio" name="jk" value="laki-laki">Laki-laki<input type="radio" name="jk" value="Perempuan">Perempuan <br>
	Hobi:<input type="checkbox" name="hb[]" value="Bola">Bola
		<input type="checkbox" name="hb[]" value="Musik">Musik
		<input type="checkbox" name="hb[]" value="Catur">Catur <br>
	Faklutas: <select name="ck1">
		<option>---Pilih---</option>
		<option value="FIT">FIT</option>
		<option value="FIK">FIK</option>
		<option value="FTE">FTE</option>
	</select>	<br>
	Alamat: <textarea name="alamat"></textarea><br>
	<input type="submit" name="send" value="submit"><br>
	<a href="login.php">Masuk</a>
</form>

<?php 
	include 'koneksi.php';
	if (isset($_POST['send'])) {
		if (str_word_count($_POST['nama'])<=35) {
			$nama = $_POST['nama'];
		}else{echo "Nama terlalu panjang <br>";}

		if (!is_numeric($_POST['nim'])&&str_word_count($_POST['nim']>10)) {
			echo "NIM harus angka dan max 10 karakter <br>";
		}else{$nim = $_POST['nim'];}

		$kelas = $_POST['rad'];
		$jenisk = $_POST['jk'];

		$jelas = $_POST['hb'];
		$hobi = implode(",",$jelas);
		$fakultas = $_POST['ck1'];
		$Alamat = $_POST['alamat'];
		if (isset($nama)&&isset($nim)&&isset($kelas)&&isset($jenisk)&&isset($hobi)&&isset($fakultas)&&isset($Alamat)) {
		$query = mysqli_query($conn,"INSERT INTO datadiri(nim, nama, kelas, jeniskelamin, Hobi, Fakultas, Alamat) VALUES ('$nim','$nama','$kelas','$jenisk','$hobi','$fakultas','$Alamat')");

		if (isset($query)) {
			header("Location:login.php");
		}
		}else{echo "Data masih kosong";}
		
	}
 ?>
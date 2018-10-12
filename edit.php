<?php 
include 'koneksi.php';
	session_start();
	$nim = $_SESSION['nim'];
	$query = mysqli_query($conn,"SELECT * FROM `datadiri` WHERE nim='$nim'");
	$act = mysqli_fetch_array($query);
	$array = explode(",", $act['Hobi']);
	// print_r($array);
 ?>

 <form method="post">
	
	Nama:<?php echo "<input type='text' name='nama' value='".$act['nama']."''>"; ?><br>
	<!-- <?php 
		// if ($act['kelas']=="D3MI-41-01") {
		// 	echo "string";
		// }
	 ?> -->
	Kelas:<input type="radio" name="rad" value="D3MI-41-01" <?php echo ($act['kelas']=='D3MI-41-01')?'checked':'' ?>> D3MI-41-01
		<input type="radio" name="rad" value="D3MI-41-02" <?php echo ($act['kelas']=='D3MI-41-02')?'checked':'' ?>>D3MI-41-02
		<input type="radio" name="rad" value="D3MI-41-03" <?php echo ($act['kelas']=='D3MI-41-03')?'checked':'' ?>>D3MI-41-03 <br>
	Jeniskelamin:<input type="radio" name="jk" value="laki-laki" <?php echo ($act['jeniskelamin']=='laki-laki')?'checked':'' ?>>Laki-laki<input type="radio" name="jk" value="Perempuan" <?php echo ($act['jeniskelamin']=='Perempuan')?'checked':'' ?>>Perempuan <br>
	Hobi:<input type="checkbox" name="hb[]" value="Bola" <?php if(in_array('Bola', $array)){echo "checked=checked";}?>>Bola
		<input type="checkbox" name="hb[]" value="Musik" <?php if(in_array('Musik', $array)){echo "checked=checked";}?>>Musik
		<input type="checkbox" name="hb[]" value="Catur"<?php if(in_array('Catur', $array)){echo "checked=checked";}?>>Catur <br>
	Faklutas: <select name="ck1">
		<option>---Pilih---</option>
		<option value="FIT">FIT</option> 
		<option value="FIK">FIK</option>
		<option value="FTE">FTE</option>
	</select>	<br>
	Alamat:<?php echo "<textarea name='alamat'".">".$act['Alamat']."</textarea>"; ?> <br>
	<input type="submit" name="send" value="submit"><br>
	<a href="view.php">kembali</a>
	
</form>

<?php 
if (isset($_POST['send'])) {
		if (str_word_count($_POST['nama'])<=35) {
			$nama = $_POST['nama'];
		}else{echo "Nama terlalu panjang <br>";}

		// if (!is_numeric($_POST['nim'])&&str_word_count($_POST['nim']>10)) {
		// 	echo "NIM harus angka dan max 10 karakter <br>";
		// }else{$nim = $_POST['nim'];}

		$kelas = $_POST['rad'];
		$jenisk = $_POST['jk'];

		$jelas = $_POST['hb'];
		$hobi = implode(",",$jelas);
		$fakultas = $_POST['ck1'];
		$Alamat = $_POST['alamat'];

		$upd = mysqli_query($conn,"UPDATE datadiri SET nama='$nama',kelas='$kelas',jeniskelamin='$jenisk',Hobi='$hobi',Fakultas='$fakultas',Alamat='$Alamat' WHERE nim='$nim'");
		if (isset($upd)) {
			echo "berhasil";
			header("Location:edit.php");
		}
		}
// if (isset($_POST['send']){
// 	$upd = mysqli_query($conn,"UPDATE `datadiri` SET `nama`='$_POST['nama']',`kelas`='$_POST['rad']',`jeniskelamin`='$_POST['jk']',`Hobi`='$_POST['hb']',`Fakultas`='$_POST['ck1']',`Alamat`='$_POST['alamat']' WHERE nim='$nim'");
// }
 ?>
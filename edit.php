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
	Hobi:<input type="checkbox" name="hb[]" value="Bola" >Bola
		<input type="checkbox" name="hb[]" value="Musik">Musik
		<input type="checkbox" name="hb[]" value="Catur">Catur <br>
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
// if (isset($_POST['send']){
// 	$upd = mysqli_query($conn,"UPDATE `datadiri` SET `nama`='$_POST['nama']',`kelas`='$_POST['rad']',`jeniskelamin`='$_POST['jk']',`Hobi`='$_POST['hb']',`Fakultas`='$_POST['ck1']',`Alamat`='$_POST['alamat']' WHERE nim='$nim'");
// }
 ?>
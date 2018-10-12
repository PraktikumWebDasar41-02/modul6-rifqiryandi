<?php 
	include 'koneksi.php';
	session_start();
	$nim = $_SESSION['nim'];
	$query = mysqli_query($conn,"SELECT * FROM `datadiri` WHERE nim='$nim'");
	$act = mysqli_fetch_array($query);

 ?>

 <table>
 	<tr>
 		<td>Nim:</td>
 		<td><?php echo $act['nim']; ?></td>
 	</tr>

 	<tr>
 		<td>Nama:</td>
 		<td><?php echo $act['nama']; ?></td>
 	</tr>

 	<tr>
 		<td>kelas:</td>
 		<td><?php echo $act['kelas']; ?></td>
 	</tr>

 	<tr>
 		<td>jenis kelamin:</td>
 		<td><?php echo $act['jeniskelamin']; ?></td>
 	</tr>

 	<tr>
 		<td>Hobi:</td>
 		<td><?php echo $act['Hobi']; ?></td>
 	</tr>

 	<tr>
 		<td>fakultas:</td>
 		<td><?php echo $act['Fakultas']; ?></td>
 	</tr>

 	<tr>
 		<td>Alamat:</td>
 		<td><?php echo $act['Alamat']; ?></td>
 	</tr>
 	<tr>
 		<td colspan="2"><?php echo "<a href='edit.php'?nim=".$act['nim'].">EDIT</a>";  ?></td>
 	</tr>
 </table>
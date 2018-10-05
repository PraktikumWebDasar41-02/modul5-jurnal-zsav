<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<table>
		<tr>
			<td>NIM</td>
			<td><input type="text" name="nim"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" placeholder="xxxx@gmail.com"></td>
		</tr>
		<tr>
			<td><input type="submit" name="kirim" value="submit"></td>
		</tr>
		</table>
	</form>

</body>
</html>
<?php
include "1.php";
if (isset($_POST['kirim'])) {
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$email=$POST['email'];


	if (empty(['nim'])==10 && $_POST['nim']!="") {
		$nim = $_POST['nim'];
	}else{
		echo "masukkan 10 angka";
	}
	if (strlen($_POST['nama'])==20 && $_POST['nama']=="") {
		echo "Masukkan nama anda";
	}else{
		$nama=$_POST['nama'];
	}
	if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)&& $_POST['email']!=""){
		echo "email anda kurang";
	}else{
		$email =$_POST['email'];
	}
	if (isset($nim) && isset($nama) && isset($email)) {
		session_start();
		$_SESSION['nimm']=$nim;
		$que = mysqli_query($conn,"INSERT INTO t_jurnal1(NIM,Nama,Email) VALUES($nim,'$nama','$email')");
		if (isset($que)) {
			echo "data tidak valid";
			header("location:komentar.php");
			
		}else{
			echo "data tidak tersimpan";
		}
	}
}
?>
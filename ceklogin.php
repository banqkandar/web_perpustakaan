<?php 
include"koneksi.php"; 
$username=mysqli_real_escape_string($koneksi,$_POST['username']);
$password=mysqli_real_escape_string($koneksi,$_POST['password']);
 
$cekloginpet=mysqli_query($koneksi,"Select * from petugas where username='$username' AND password='$password'"); 
$cekpet = mysqli_num_rows($cekloginpet);

$cekloginadmin=mysqli_query($koneksi,"Select * from admin where username='$username' AND password='$password'"); 
$cekadmin = mysqli_num_rows($cekloginadmin);


 if ($cekadmin > 0) {
 	session_start();
	$r=$cekloginpet->fetch_array();
	$_SESSION['pasword']=$password;
	$_SESSION['username']=$username;  
	echo"<script>alert('Anda Berhasil Login'); window.location = 'admin/index.php?page=kosong&aksi=kosong'</script>";
 }elseif ($cekpet > 0){  
	session_start();
	$r=$cekloginpet->fetch_array();
	$_SESSION['pasword']=$password;
	$_SESSION['username']=$username;  
	echo"<script>alert('Anda Berhasil Login'); window.location = 'petugas/index.php?page=kosong&aksi=kosong'</script>";  
}else{
	echo"<script type='text/javascript'> alert ('Username atau Password yang anda masukkan salah');</script>";
	echo "<script>alert('Silahkan Coba Lagi'); window.history.back();</script>";
}
?>
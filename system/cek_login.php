<?php 
session_start();
require "proses.php";

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = $db->get("*","petugas","WHERE username='$username' AND password='$password'");
	$row = $result->rowCount();
	$data = $result->fetch();
	if( $row > 0){
		$_SESSION['login_png'] = true;
		$_SESSION['kode_ptg'] = $data['kode_petugas'];
		$_SESSION['nama_ptg'] = $data['username'];
		$_SESSION['level_ptg'] = $data['status'];
		echo "<script>document.location.href='../index.php'</script>";
	}else{
		echo "<script>alert('Username atau Password Salah')</script>";
		echo "<script>document.location.href='../login.php'</script>";
	}
}
?>

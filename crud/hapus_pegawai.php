<?php 
	

	
	include "../system/proses.php";
	$id = $_GET['id'];
	$hapus = $db->delete("pegawai","nip='$id'");
	if( $hapus ){
		echo "<script>alert('Data Berhasil Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=pegawai'</script>";
	}else{
		echo "<script>alert('Data Gagal Dihapus')</script>";
		echo "<script>document.location.href='../index.php?p=pegawai'</script>";
	}
 ?>
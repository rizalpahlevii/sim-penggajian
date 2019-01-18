<?php 
	include "../system/proses.php";
	if($_POST['statuss']=="Belum Menikah"){
		$anak = 0;
	}else{
		$anak = $_POST['anak'];
	}

	if( isset($_POST['submit']) ){
		$simpan=$db->insert("pegawai","'$_POST[nip]',
									'$_POST[nama]',
									'$_POST[tempat_lahir]',
									'$_POST[tanggal_lahir]',
									'$_POST[jabatan]',
									'$_POST[golongan]',
									'$_POST[statuss]',
									'$anak'");
		if( $simpan ){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=pegawai'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=pegawai'</script>";
		}
	}else{
		$edit=$db->update("pegawai","nip='$_POST[nip]',
									nama='$_POST[nama]',
									tempat_lahir='$_POST[tempat_lahir]',
									tanggal_lahir='$_POST[tanggal_lahir]',
									kode_jabatan='$_POST[jabatan]',
									kode_golongan='$_POST[golongan]',
									status='$_POST[statuss]',
									jumlah_anak='$anak'","nip='$_POST[nip]'");
		if( $edit ){
			echo "<script>alert('Data Berhasil Di Update')</script>";
			echo "<script>document.location.href='../index.php?p=pegawai'</script>";
		}else{
			echo "<script>alert('Data Gagal Di Update')</script>";
			echo "<script>document.location.href='../index.php?p=pegawai'</script>";
		}
	}


 ?>
<?php 
error_reporting(0);
session_start();
include "../system/proses.php";

$ambiltanggal = $db->get("tanggal","gaji","WHERE nip='$_POST[nip]' ORDER BY tanggal DESC LIMIT 1")->fetch();
$pecah = explode('-', $ambiltanggal['tanggal']);
$tahundb = $pecah[0];
$bulandb = $pecah[1];
$now = date('Y-m-d');
$pecahnow = explode('-', $now);
$tahunnow = $pecahnow[0];
$bulannow = $pecahnow[1];
if($bulandb!=$bulannow AND $tahundb!=$tahunnow ){
	if( isset($_POST['submit']) ){
		$simpan = $db->insert("gaji","'$_POST[no_slip]',
			'$_POST[tanggal]',
			'$_POST[pendapatan_kotor]',
			'$_POST[ppn]',
			'$_POST[gaji_bersih]',
			'$_POST[nip]',
			'$_POST[kode_petugas]'");
		if( $simpan ){
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>window.open('../slip/slip.php?id=$_POST[no_slip]')</script>";
			echo "<script>document.location.href='../index.php?p=penggajian'</script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan')</script>";
			echo "<script>document.location.href='../index.php?p=penggajian'</script>";
		}
	}
	
}else{
	echo "<script>alert('Gaji Bulan Ini Sudah Diambil')</script>";
	echo "<script>document.location.href='../index.php?p=penggajian'</script>";
}




?>
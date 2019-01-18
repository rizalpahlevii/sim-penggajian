<?php 
session_start();
$id = $_GET['id'];
include '../system/proses.php';
$data1=$db->get("gaji.no_slip, gaji.tanggal,pegawai.nama, jabatan.nama_jabatan,jabatan.gaji_pokok,jabatan.tj_jabatan, gaji.pendapatan, gaji.potongan,gaji.gaji_bersih","pegawai","INNER JOIN jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan INNER JOIN gaji on gaji.nip=pegawai.nip WHERE gaji.no_slip='$id'")->fetch();
$data2=$db->get("golongan.tj_suami_istri,golongan.tj_anak,pegawai.status,pegawai.jumlah_anak","golongan ","INNER JOIN pegawai on pegawai.kode_golongan=golongan.kode_golongan INNER JOIN gaji on gaji.nip=pegawai.nip WHERE gaji.nip='$id'")->fetch();
if($data2['status']=="Menikah"){
	$tj_anak = $data2['tj_anak'];
	$jumlah_anak = $data2['jumlah_anak'];
	$hasil_anak = $tj_anak*$jumlah_anak;
	$tj_istri = $data2['tj_suami_istri'];
}else{
	$tj_anak = 0;
	$jumlah_anak = 0;
	$hasil_anak = $tj_anak*$jumlah_anak;
	$tj_istri = 0;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>STRUK</title>
	<style type="text/css">
	
	.kotak-struk{
		float: left;
		width: 450px;
		height: auto;
		margin-left: -20px;
		margin-top: -15px;
		font-size: 15px;
		font-family: 'tahoma';
		border: 2px solid black;
	}
	.kotak-struk .head p {
		text-align: center;
		font-size: 17px;
	}
	.kotak-struk .logo{
		font-weight: bold;
	}
	.kotak-struk .logo,.almt,.notelp{
		font-family: 'tahoma';
		line-height: 15px;
	}
	.kotak-struk .tabel1{
		margin: 0px 30px;
	}
	.kotak-struk .tabel1 tr td{
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .tabel2{
		margin: 0px 30px;
	}
	.kotak-struk .tabel2 tr td{
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .tabel3{
		float: right;
		margin: 0px 30px;
	}
	.kotak-struk .tabel3 tr td{
		text-align: left;
		font-family: 'tahoma';
		line-height: 25px;
	}
	.kotak-struk .tabel4{
		float: right;
		margin: 0px 30px;
	}
	.kotak-struk .tabel4 tr td{
		text-align: right;
		font-family: 'tahoma';
	}
	.kotak-struk .foot{
		float: left;
		text-align: center;
		line-height: 10px;
		margin: 0px 40px;
		margin-top: 10px;
		font-family: 'tahoma';
	}
	.box{
		border: 1px solid #eee;
		height: auto;
	}


</style>
</head>
<body>
	<div class="kotak-struk">
		<div class="box">
			<div class="head">

				<p class="logo">Slip Gaji</p>
				<p class="almt">Pt. Wikrama Techno</p>
				
			</div>
			<hr>
			<div class="isi">
				<table class="tabel1">
					<tr>
						<td><label>No Slip</label></td>
						<td>:</td>
						<td><label><?php echo $data1['no_slip'] ?></label></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><label>Periode</label></td>
						<td>:</td>
						<td><label><?= $data1['tanggal'] ?></label></td>
					</tr>
					<tr>
						<td><label>Nama</label></td>
						<td>:</td>
						<td><label><?php echo $data1['nama'] ?></label></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><label>Jabatan</label></td>
						<td>:</td>
						<td><label><?php echo $data1['nama_jabatan'] ?></label></td>
					</tr>
				</table>
				<hr>
				<table class="tabel1">
					<tr>
						<td><label>Sistem Pembayaran Transfer</label></td>
					</tr>
				</table>
				
				<table class="tabel3">
					<tr>
						<td><label>Gaji Pokok</label></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</td>
						<td><label><?php echo $data1['gaji_pokok'] ?></label></td>
					</tr>
					<tr>
						<td><label>Tunjangan Jabatan</label></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</td>
						<td><label><?php echo $data1['tj_jabatan'] ?></label></td>
					</tr>
					<tr>
						<td><label>Tunjangan Istri</label></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</td>
						<td><label><?php echo $tj_anak; ?></label></td>
					</tr>
					<tr>
						<td><label>Tunjangan Anak</label></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</td>
						<td><label><?php echo $tj_istri ?></label></td>
					</tr>
					<tr>
						<td><label>Gaji Kotor</label></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</td>
						<td><label><?php echo $data1['pendapatan'] ?></label></td>
					</tr>
					<tr>
						<td><label>Potongan</label></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</td>
						<td><label><?php echo $data1['potongan'] ?></label></td>
						
					</tr>
				</table>
				<hr style="margin-top: 180px;width: 260px;margin-left: 180px;">
				<table class="tabel3">
					<tr>
						<td><label style="font-weight: bold;">Gaji Bersih</label></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</td>
						<td><label><?php echo $data1['gaji_bersih'] ?></label></td>
					</tr>
				</table>
				<div class="foot">
					<hr style="width: 400px">
					<p style="margin-left: 250px;"><?php echo date('Y-m-d') ?></p>
					<table>
						<tr>
							<td><label>Disetujui Oleh</label></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><label>Diterima Oleh</label></td>
						</tr>
						<br><br>

					</table>
					<br><br><br><br><br>
					<table>
						<tr>
							<td><label><?php echo $_SESSION['nama_ptg'] ?></label>
								<br><hr><label><?php echo $_SESSION['level_ptg'] ?></label></td>
							
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td><td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><label><?php echo $data1['nama'] ?></label></td>
						</tr>
					</table>
					<br><br><br>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
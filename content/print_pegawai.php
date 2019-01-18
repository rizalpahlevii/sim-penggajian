<?php 
include '../system/proses.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="shortcut icon" href="assets/images/favicon.ico"><!-- Alertify css -->
	<link href="../assets/plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free/css/all.css">
</head>
<body class="bg-light">
	<div class="container">
		
		<h3 class="text-center">Laporan Daftar Pegawai</h3>
		<h4 class="text-center">PT. Wikrama Techno</h4>
		
		<hr>
		<br>
		<table class="table table-hover table-bordered">
			<tr>
				<tr>
					<th>NIP</th>
					<th>Nama</th>
					<th>Tempat Lahir</th>
					<th>Tanggal Lahir</th>
					<th>Kode Jabatan</th>
					<th>Kode Golongan</th>
					<th>Status</th>
					<th>Jumlah Anak</th>
				</tr>
			</tr>
			<?php
			if(empty($_GET['key'])){
				$qr = $db->get("pegawai.nip,pegawai.nama,pegawai.tempat_lahir,pegawai.tanggal_lahir,jabatan.nama_jabatan,golongan.golongan,pegawai.status,pegawai.jumlah_anak","pegawai","INNER JOIN jabatan on pegawai.kode_jabatan=jabatan.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan ORDER BY pegawai.nip ASC");
			}else{
				$nama = $_GET['key'];
				$qr = $db->get("pegawai.nip,pegawai.nama,pegawai.tempat_lahir,pegawai.tanggal_lahir,jabatan.nama_jabatan,golongan.golongan,pegawai.status,pegawai.jumlah_anak","pegawai","INNER JOIN jabatan on pegawai.kode_jabatan=jabatan.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan WHERE pegawai.nama LIKE '%$nama%' OR
					pegawai.nip LIKE '%$nama%' OR
					pegawai.tempat_lahir LIKE '%$nama%' OR
					pegawai.tanggal_lahir LIKE '%$nama%' OR
					jabatan.nama_jabatan LIKE '%$nama%' OR
					pegawai.kode_golongan LIKE '%$nama%' OR
					pegawai.status LIKE '%$nama%' ORDER BY pegawai.nip ASC");
			}

			

			?>
			<?php 

			foreach($qr as $tampil):

				?>
				<tr>
					<td><?php echo $tampil['nip'] ?></td>
					<td><?php echo $tampil['nama'] ?></td>
					<td><?php echo $tampil['tempat_lahir'] ?></td>
					<td><?php echo $tampil['tanggal_lahir'] ?></td>
					<td><?php echo $tampil['nama_jabatan'] ?></td>
					<td><?php echo $tampil['golongan'] ?></td>
					<td><?php echo $tampil['status'] ?></td>
					<td><?php echo $tampil['jumlah_anak'] ?></td>

				</tr>
			<?php endforeach; ?>


		</table>
		<br><br><br><br><br></b>
		<div class="row text-right">
			<p style="float: right; margin-left: 970px;"><?php echo date('d-M-Y') ?></p>
		</div>
		<p style="float: left; margin-left: 60px; font-size: 20px;">Disetujui Oleh</p>
		<p style="float: right; margin-right: 60px;font-size: 20px;">Dibuat Oleh</p>
		<br><br><br><br><br>
		<p style="float: left; margin-left: 60px;">Joko Agung Sayuto</p>
		<p style="float: right; margin-right: 70px;"><?php echo $_SESSION['nama_ptg'] ?></p>

	</div>	
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/js/modernizr.min.js"></script>
	
</body>
</html>
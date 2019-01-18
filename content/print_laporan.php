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
		
		<h3 class="text-center">Laporan GajiKaryawan</h3>
		<h4 class="text-center">PT. Wikrama Techno</h4>
		<p class="text-center">Bulan  :  <?php echo $_GET['bulan']; ?>/<?php echo $_GET['tahun'] ?></p>
		<hr>
		<br>
		<table class="table table-hover table-bordered">
			<tr>
				<th>No</th>
				<th>No Slip</th>
				<th>Nama</th>
				<th>Jabatan</th>
				<th>Tunjangan Jabatan</th>
				<th>Tunjangan Anak</th>
				<th>Tunjangan Istri</th>
				<th>Gaji Kotor</th>
				<th>potongan</th>
				<th>Gaji Bersih</th>
			</tr>
			<?php 

			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$qr = $db->get("gaji.no_slip,pegawai.nama,jabatan.nama_jabatan,jabatan.tj_jabatan,golongan.tj_anak,golongan.tj_suami_istri,gaji.pendapatan,gaji.potongan,gaji.gaji_bersih","gaji","INNER JOIN pegawai ON gaji.nip=pegawai.nip INNER JOIN jabatan ON jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on pegawai.kode_golongan=golongan.kode_golongan WHERE month(gaji.tanggal) = '$bulan' AND year(gaji.tanggal)='$tahun'");

			?>
			<?php 
			$no=1;
			foreach($qr as $tampil):
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $tampil['no_slip'] ?></td>
					<td><?php echo $tampil['nama'] ?></td>
					<td><?php echo $tampil['nama_jabatan'] ?></td>
					<td><?php echo $tampil['tj_jabatan'] ?></td>
					<td><?php echo $tampil['tj_anak'] ?></td>
					<td><?php echo $tampil['tj_suami_istri'] ?></td>
					<td><?php echo $tampil['pendapatan'] ?></td>
					<td><?php echo $tampil['potongan'] ?></td>
					<td><?php echo $tampil['gaji_bersih'] ?></td>
				</tr>

				<?php
				$no++; 
			endforeach;
			?>
			<tr>
				<?php 
				$gajiSemua = $db->ambil("SUM(pendapatan) AS gj_kotor, SUM(potongan) AS ppn, SUM(gaji_bersih) AS gj_bersih","gaji")->fetch();
				?>


				<td colspan="7">
					<center>
						<label style="font-weight: bold;">Total</label>
					</center>
				</td>
				<td><label style="font-weight: bold;"><?= $gajiSemua['gj_kotor'] ?></label></td>
				<td><label style="font-weight: bold;"><?= $gajiSemua['ppn'] ?></label></td>
				<td><label style="font-weight: bold;"><?= $gajiSemua['gj_bersih'] ?></label></td>
			</tr>

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
	<script src="../assets/js/detect.js"></script>
	<script src="../assets/js/fastclick.js"></script>
	<script src="../assets/js/jquery.slimscroll.js"></script>
	<script src="../assets/js/jquery.blockUI.js"></script>
	<script src="../assets/js/waves.js"></script><!-- Alertify js -->
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

	<script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
	<script src="../assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
	<!-- Datatable init js -->
	<script src="assets/pages/datatables.init.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/pegawai.js"></script>

	<script type="text/javascript" src="assets/js/modal.js"></script>
	<script type="text/javascript" src="assets/js/penggajian.js"></script>
</body>
</html>
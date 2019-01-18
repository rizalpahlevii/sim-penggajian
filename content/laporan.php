<?php 
error_reporting(0);
include 'system/proses.php';
?>
<div class="container-fluid"><!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<div class="btn-group float-right">
					<ol class="breadcrumb hide-phone p-0 m-0">
						<li class="breadcrumb-item">
							<a href="#">Drixo</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Master</a>
						</li>
						<li class="breadcrumb-item active">
							<a href="#">Laporan</a>
						</li>

					</ol>
				</div>
				<h4 class="page-title">Laporan</h4>
			</div>
		</div>
	</div><!-- end page title end breadcrumb -->
	<div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-body">
					<h4 class="mt-0 header-title">Data Laporan</h4>

					<div class="col-sm-9">
						<div class="form-inline">
							<form action="" method="POST">
								<select name="bulan" id="bulan" class="form-control">
									<option disabled selected>Pilih Bulan</option>
									<option <?php if($_POST['bulan']=="01"){echo "selected";} ?> value="01">Januari</option>
									<option <?php if($_POST['bulan']=="02"){echo "selected";} ?> value="02" >Februari</option>
									<option <?php if($_POST['bulan']=="03"){echo "selected";} ?>  value="03" >Maret</option>
									<option <?php if($_POST['bulan']=="04"){echo "selected";} ?> value="04" >April</option>
									<option <?php if($_POST['bulan']=="05"){echo "selected";} ?> value="05" >Mei</option>
									<option <?php if($_POST['bulan']=="06"){echo "selected";} ?> value="06" >Juni</option>
									<option <?php if($_POST['bulan']=="07"){echo "selected";} ?> value="07" >Juli</option>
									<option <?php if($_POST['bulan']=="08"){echo "selected";} ?> value="08" >Agustus</option>
									<option <?php if($_POST['bulan']=="09"){echo "selected";} ?> value="09" >September</option>
									<option <?php if($_POST['bulan']=="10"){echo "selected";} ?> value="10" >Oktober</option>
									<option <?php if($_POST['bulan']=="11"){echo "selected";} ?> value="11" >November</option>
									<option <?php if($_POST['bulan']=="12"){echo "selected";} ?> value="12" >Desember</option>
								</select>

								
								<select name="tahun" id="tahun" class="form-control" style="width: 200px;">
									<option disabled selected>Pilih Tahun</option>
									<?php 
									$qr = $db->get("tanggal","gaji"," GROUP BY DATE_FORMAT(tanggal, '%Y')");
									while($d=$qr->fetch()) :
										$data = explode('-', $d['tanggal']);
										$tahun = $data[0];
										?>

										<option value="<?php echo $tahun; ?>"> <?php if($_POST['tahun']=="2019"){echo "selected";} ?><?php echo $tahun; ?></option>
									<?php endwhile; ?>
								</select>
								&nbsp;
								<button type="submit" name="cari" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;Cari</button>
								&nbsp;
								<input type="reset" name="reset" class="btn btn-danger" value="Reset">
								<button type="button" onclick="cetak()" class="btn btn-warning">Cetak</button>
							</form>
							
						</div>
					</div>


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
						
						if(isset($_POST['cari'])){
							$bulan = $_POST['bulan'];
							$tahun = $_POST['tahun'];
							$qr = $db->get("gaji.no_slip,pegawai.nama,jabatan.nama_jabatan,jabatan.tj_jabatan,golongan.tj_anak,golongan.tj_suami_istri,gaji.pendapatan,gaji.potongan,gaji.gaji_bersih","gaji","INNER JOIN pegawai ON gaji.nip=pegawai.nip INNER JOIN jabatan ON jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on pegawai.kode_golongan=golongan.kode_golongan WHERE month(gaji.tanggal) = '$bulan' AND year(gaji.tanggal)='$tahun'");
						}else{
							$qr = $db->get("gaji.no_slip,pegawai.nama,jabatan.nama_jabatan,jabatan.tj_jabatan,golongan.tj_anak,golongan.tj_suami_istri,gaji.pendapatan,gaji.potongan,gaji.gaji_bersih","gaji","INNER JOIN pegawai ON gaji.nip=pegawai.nip INNER JOIN jabatan ON jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on pegawai.kode_golongan=golongan.kode_golongan");
						}
						
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
					<br>


				</div>
			</div>
		</div><!-- end col -->
	</div><!-- end row -->

</div><!-- end container -->
<script type="text/javascript">
	function cetak(){
		bulan = $('#bulan').val();
		tahun = $('#tahun').val();

		window.open("content/print_laporan.php?bulan="+bulan+"&"+"tahun="+tahun);
	}
</script>
<?php 
include 'system/proses.php';
$connect = mysqli_connect("localhost", "root", "", "db_penggajian");
$query = "SELECT max(no_slip) as maxKode FROM gaji";
$hasil = mysqli_query($connect, $query);
$data = mysqli_fetch_array($hasil);
$kodebarang = $data['maxKode'];
$nourut = (int) substr($kodebarang, 3, 3);
$nourut++;
$char = "SLB";
$nomot = $char . sprintf("%03s", $nourut);
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
							<a href="#">Penggajian Pegawai</a>
						</li>

					</ol>
				</div>
				<h4 class="page-title">Penggajian Pegawai</h4>
			</div>
		</div>
	</div><!-- end page title end breadcrumb -->
	<div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-body">
					<h4 class="mt-0 header-title">Penggajian Pegawai</h4>
					<form action="crud/simpan_gaji.php" method="POST">
						<input type="hidden" name="kode_petugas" value="<?php echo $_SESSION['kode_ptg'] ?>">
						<div class="row">
							<div class="col-sm-auto">
								<div class="form-inline">
									<!-- No slip -->
									<label for="no_slip" style="font-weight: normal;">No Slip&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" id="no_slip" name="no_slip" class="form-control" value="<?php echo $nomot ?>" readonly style="cursor: no-drop;">
									&nbsp;
									<!-- Tgl -->
									<label for="tanggal" style="margin-left: 40px; font-weight: normal;">Tanggal&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="date" id="tanggal" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly style="cursor: no-drop;">

								</div>

							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-auto">
								<div class="form-inline">
									<!-- No slip -->
									<label for="nip" style="font-weight: normal;">NIP&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" id="nip" name="nip" class="form-control" onkeyup="cari_slip()">
									&nbsp;
									<!-- Tgl -->
									<label for="nama" style="margin-left: 40px; font-weight: normal;">Nama&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" id="nama" name="nama" class="form-control" readonly style="cursor: no-drop;">

									&nbsp;
									<!-- Tgl -->
									<label for="status" style="margin-left: 40px; font-weight: normal;">status&nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" id="statuss" name="status" class="form-control" readonly style="cursor: no-drop;">

								</div>

							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="nama_jabatan" style="font-weight: normal;">nama_jabatan</label></center>
									<input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" autocomplete="off" readonly style="cursor: no-drop;">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="gaji_pokok" id="lbidp" style="font-weight: normal;">Gaji Pokok</label></center>
									<input type="text" name="gaji_pokok" id="gaji_pokok" class="form-control" autocomplete="off" readonly style="cursor: no-drop;">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="tunj_jabatan" id="lbnmp" style="font-weight: normal;">Tunjangan Jabatan</label></center>
									<input type="text" name="tunj_jabatan" id="tunj_jabatan" class="form-control" readonly style="cursor: no-drop;">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="nama_golongan" style="font-weight: normal;">nama_golongan</label></center>
									<input type="text" name="nama_golongan" id="nama_golongan" class="form-control" autocomplete="off" readonly style="cursor: no-drop;">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="tunj_istri" id="lbidp" style="font-weight: normal;">Tunjungan Istri</label></center>
									<input type="text" name="tunj_istri" id="tunj_istri" class="form-control" autocomplete="off" readonly style="cursor: no-drop;">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="tunj_anak" id="lbnmp" style="font-weight: normal;">Tunjangan Anak</label></center>
									<input type="text" name="tunj_anak" id="tunj_anak" class="form-control" readonly style="cursor: no-drop;">
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="jumlah_anak" style="font-weight: normal;">jumlah_anak</label></center>
									<input type="text" name="jumlah_anak" id="jumlah_anak" class="form-control" autocomplete="off" readonly style="cursor: no-drop;">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="pendapatan_kotor" style="font-weight: normal;">pendapatan_kotor</label></center>
									<input type="text" name="pendapatan_kotor" id="pendapatan_kotor" class="form-control" autocomplete="off" readonly style="cursor: no-drop;">
								</div>
							</div>
							
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="ppn" style="font-weight: normal;">Potongan PPN 10%</label></center>
									<input type="text" name="ppn" id="ppn" class="form-control" autocomplete="off" readonly style="cursor: no-drop;">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<center><label for="gaji_bersih" style="font-weight: normal;">Gaji Bersih</label></center>
									<input type="text" name="gaji_bersih" id="gaji_bersih" class="form-control" autocomplete="off" readonly style="cursor: no-drop;">
								</div>
							</div>
							<div class="col-sm-3">
								<button type="submit" name="submit" class="btn btn-primary" style="margin-top: 30px;">Simpan</button>
							</div>
							
						</div>
					</form>


				</div>
			</div>
		</div><!-- end col -->
	</div><!-- end row -->

</div><!-- end container -->



<!-- Modal Edit -->


`<?php 
include 'system/proses.php';
$connect = mysqli_connect("localhost", "root", "", "db_penggajian");
$query = "SELECT max(nip) as maxKode FROM pegawai";
$hasil = mysqli_query($connect, $query);
$data = mysqli_fetch_array($hasil);
$kodebarang = $data['maxKode'];
$nourut = (int) substr($kodebarang, 5, 5);
$nourut++;
$char = "186";
$nomot = $char . sprintf("%05s", $nourut);
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
							<a href="#">Pegawai</a>
						</li>
						
					</ol>
				</div>
				<h4 class="page-title">Pegawai</h4>
			</div>
		</div>
	</div><!-- end page title end breadcrumb -->
	<div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-body">
					<h4 class="mt-0 header-title">Data Pegawai</h4>
					<div class="col-sm-5">
						<form action="crud/simpan_pegawai.php" method="POST" id="form-pegawai">
							<div class="form-group">
								<label for="nip" class="col-form-label" style="font-weight: normal;">NIP</label>
								<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $nomot; ?>" readonly style="cursor: no-drop;">
							</div>

							<div class="form-group">
								<label for="nama" class="col-form-label" style="font-weight: normal;">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" required="" autocomplete="off">
							</div>

							<div class="form-group">
								<label for="tempat_lahir" class="col-form-label" style="font-weight: normal;">Tempat Lahir</label>
								<input type="text" class="form-control" id="tempat_lahira" name="tempat_lahir" required="" autocomplete="off">
							</div>

							<div class="form-group">
								<label for="tanggal_lahir" class="col-form-label" style="font-weight: normal;">Tanggal Lahir</label>
								<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required="" autocomplete="off">
							</div>

							<div class="form-group">
								<label for="jabatan" class="col-form-label" style="font-weight: normal;">Jabatan</label>
								<select class="form-control" name="jabatan" id="jabatan">
									<?php 
									$qr = $db->get("*","jabatan","ORDER BY kode_jabatan ASC");
									foreach($qr as $data):
										?>
										<option value="<?php echo $data['kode_jabatan'] ?>"><?php echo $data['nama_jabatan'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="golongan" class="col-form-label" style="font-weight: normal;">Golongan</label>
								<select class="form-control" name="golongan" id="golongan">
									<?php 
									$qr = $db->get("*","golongan","ORDER BY kode_golongan ASC");
									foreach($qr as $data):
										?>
										<option value="<?php echo $data['kode_golongan'] ?>"><?php echo $data['golongan'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							
							<div class="row">
								<div class="col-sm-7">
									<div class="form-group">
										<label for="status" class="col-form-label" style="font-weight: normal;">Status</label>
										<select class="form-control" name="statuss" id="statuss" onchange="pilih_status()">
											<option disabled selected>Pilih</option>
											<option value="Menikah">Menikah</option>
											<option value="Belum Menikah">Belum Menikah</option>


										</select>

									</div>

								</div>


								<div class="col-sm-5">
									<div class="form-group">
										<label for="anak" class="col-form-label" style="font-weight: normal;" id="lb_anak">Jumlah Anak</label>
										<select class="form-control" name="anak" id="anak">
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>


										</select>

									</div>
									
								</div>
							</div>


							<input type="submit" name="submit" class="btn btn-primary" value="Simpan">

						</form>
					</div>
					<br>
					
					
				</div>
			</div>
		</div><!-- end col -->
	</div><!-- end row -->
	
</div><!-- end container -->



<!-- Modal Edit -->


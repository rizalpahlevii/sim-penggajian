<?php 
include '../../system/proses.php';

$id = $_POST['rowid'];
$tampil = $db->get("*","pegawai","WHERE nip='$id'")->fetch();




?>
<form action="crud/simpan_pegawai.php" method="POST" id="form-pegawai">
	<div class="form-group">
		<label for="nip" class="col-form-label" style="font-weight: normal;">NIP</label>
		<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $tampil['nip']; ?>" readonly>
	</div>

	<div class="form-group">
		<label for="nama" class="col-form-label" style="font-weight: normal;">Nama</label>
		<input type="text" class="form-control" id="nama" name="nama" required="" autocomplete="off" value="<?php echo $tampil['nama']; ?>">
	</div>

	<div class="form-group">
		<label for="tempat_lahir" class="col-form-label" style="font-weight: normal;">Tempat Lahir</label>
		<input type="text" class="form-control" id="tempat_lahira" name="tempat_lahir" required="" autocomplete="off" value="<?php echo $tampil['tempat_lahir']; ?>">
	</div>

	<div class="form-group">
		<label for="tanggal_lahir" class="col-form-label" style="font-weight: normal;">Tanggal Lahir</label>
		<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required="" autocomplete="off" value="<?php echo $tampil['tanggal_lahir']; ?>">
	</div>

	<div class="form-group">
		<label for="jabatan" class="col-form-label" style="font-weight: normal;">Jabatan</label>
		<select class="form-control" name="jabatan" id="jabatan">
			<?php 
			$qr = $db->get("*","jabatan","ORDER BY kode_jabatan ASC");
			foreach($qr as $data):
				?>
				<option value="<?php echo $data['kode_jabatan'] ?>" <?php if($tampil['kode_jabatan']==$data['kode_jabatan']){echo "selected";} ?>><?php echo $data['nama_jabatan'] ?></option>
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
				<option value="<?php echo $data['kode_golongan'] ?>"<?php if($tampil['kode_golongan']==$data['kode_golongan']){echo "selected";} ?>><?php echo $data['golongan'] ?></option>
			<?php endforeach; ?>
		</select>
	</div>


	<div class="row">
		<div class="col-sm-7">
			<div class="form-group">
				<label for="status" class="col-form-label" style="font-weight: normal;">Status</label>
				<select class="form-control" name="statuss" id="statuss" onchange="pilih_status()">
					<option disabled selected>Pilih</option>
					<option value="Menikah" <?php if($tampil['status']="Menikah"){echo "selected";} ?>>Menikah</option>
					<option value="Belum Menikah" <?php if($tampil['status']="Belum Menikah"){echo "selected";} ?>>Belum Menikah</option>


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


	<input type="submit" name="edit" class="btn btn-primary" value="Simpan">

</form>
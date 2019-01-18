<?php 
include "../system/proses.php";
$query = $db->get("pegawai.nip,pegawai.nama,pegawai.status,jabatan.nama_jabatan,jabatan.gaji_pokok,jabatan.tj_jabatan,golongan.golongan,golongan.tj_suami_istri,golongan.tj_anak,pegawai.jumlah_anak","pegawai","INNER JOIN jabatan ON jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan ON golongan.kode_golongan=pegawai.kode_golongan WHERE pegawai.nip='$_POST[nip]'");
$tampil = $query->fetch();
$hasilnya = array('nama'=>$tampil['nama'],
				'status'=>$tampil['status'],
				'nama_jabatan'=>$tampil['nama_jabatan'],
				'gaji_pokok'=>$tampil['gaji_pokok'],
				'tj_jabatan'=>$tampil['tj_jabatan'],
				'golongan'=>$tampil['golongan'],
				'tj_suami_istri'=>$tampil['tj_suami_istri'],
				'tj_anak'=>$tampil['tj_anak'],
				'jumlah_anak'=>$tampil['jumlah_anak'],
			);
echo json_encode($hasilnya);
?>
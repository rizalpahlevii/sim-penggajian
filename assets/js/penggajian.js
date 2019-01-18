function cari_slip(){

	$.ajax({
		url:"content/cari_slip.php",
		type:"POST",
		dataType:"json",
		data:{
			nip:$('#nip').val()
		},
		success:function(hasil){

			$('#nama').val(hasil.nama);
			$('#statuss').val(hasil.status);
			$('#nama_jabatan').val(hasil.nama_jabatan);
			$('#gaji_pokok').val(hasil.gaji_pokok);
			$('#tunj_jabatan').val(hasil.tj_jabatan);
			$('#nama_golongan').val(hasil.golongan);
			tjn =$('#statuss').val();
			if (tjn=="Menikah") {
				
				tsi = $('#tunj_istri').val(hasil.tj_suami_istri);
				ja = $('#jumlah_anak').val(hasil.jumlah_anak);
				
				 $('#tunj_anak').val(hasil.tj_anak);
				$('#tunj_istri').val(hasil.tj_suami_istri);
			}else{
				$('#tunj_istri').val(0);
				$('#tunj_anak').val(0);
			}
			$('#jumlah_anak').val(hasil.jumlah_anak);
			p_kotor();
			



			

			
		}

	});
}
function p_kotor(){
	var gaji = $('#gaji_pokok').val();
	var t_jb = $('#tunj_jabatan').val();
	var t_is = $('#tunj_istri').val();
	var t_anak = $('#tunj_anak').val();
	var anak = $('#jumlah_anak').val();
	var g_anak = anak*t_anak;
	var total = parseInt(gaji)+parseInt(t_jb)+parseInt(parseInt(t_is)+parseInt(g_anak));
	$('#pendapatan_kotor').val(total);
	ppn();
	
}


function ppn(){
	var ppn = $('#pendapatan_kotor').val();
	hasil = ppn*0.1;
	$('#ppn').val(hasil);
	gaji_bersih();
}

function gaji_bersih(){
	var pnn = $('#ppn').val();
	var gk = $('#pendapatan_kotor').val();
	var result = gk-pnn;
	$('#gaji_bersih').val(result);
}
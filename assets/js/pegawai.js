function pilih_status(){
	plh = $('#statuss').val();
	if(plh=="Menikah"){
		$('#lb_anak').show("slow");
		$('#anak').show("slow");
		
	}else{
		$('#lb_anak').hide("slow");
		$('#anak').hide("slow");
	}
}
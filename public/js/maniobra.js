var bandera = 0;
function mostrarNuevaManiobra(){
	if(bandera == 1){
		$('#maniobraAdd').hide("fast");
		bandera = 0;
	}else{
		$('#maniobraAdd').show("fast");
		bandera = 1;
	}
}

function eliminarManiobra(identificador){
	alert("eliminar "+identificador);
}

function editarManiobra(identificador){
	alert("editar "+identificador);
}

function TransferenciaPDF(){
	var guia = $("#guia").val();
	$(location).attr("href", '../transferenciaPDF/'+guia);
}
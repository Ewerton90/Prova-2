function validar (){
	var descricao = document.getElementById("descricao").value;
	
	if(descricao == ""){
		alert("Descricao é Obrigatório");
		return false;
	}
		return true;
}
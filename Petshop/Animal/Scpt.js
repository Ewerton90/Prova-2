function validar(){

	var nome = document.getElementById("nome").value;
	if(nome == ""){
		alert("Nome é Obrigatório");
		return false;
	}
	
	var dono = document.getElementById("dono").value;
	if(dono == ""){
		alert("Dono é Obrigatório");
		return false;
	}
	
	var especie = document.getElementById("especie").value;
	if(especie == ""){
		alert("Especie é Obrigatório");
		return false;
	}
	
	var raca = document.getElementById("raca").value;
	if(raca == ""){
		alert("Raça é Obrigatório");
		return false;
	}
	
	var nascimento = document.getElementById("nascimento").value;
	if(nascimento == ""){
		alert("Nascimento é Obrigatório");
		return false;
	}
	
		return true;
}
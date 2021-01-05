<?php
	
	$id = $_POST["id"];
	$descricao = $_POST["descricao"];
	
	$conexao = new mysqli ("localhost", "root", "vertrigo", "especie");
	
	if($id == 0){
		$sql = $conexao->prepare("INSERT INTO cadastro (id, descricao) VALUES (?,?)");
		
		$sql->bind_param("ss", $id, $descricao);
		
	}else {
		
		$sql = $conexao->prepare("UPDATE cadastro SET id = ?, descricao = ? WHERE id = ?");
		
		$sql->bind_param("ssi", $id, $descricao, $id);
	}
	$sql->execute();
	
	mysqli_close($conexao);
	
	header("location: index.php");
?>
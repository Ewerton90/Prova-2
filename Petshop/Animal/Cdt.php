<?php
	$id = $_POST["id"];
	$nome = $_POST["nome"];
	$dono = $_POST["dono"];
	$especie = $_POST["especie"];
	$raca = $_POST["raca"];
	$nascimento = $_POST["nascimento"];
	
	$conexao = new mysqli("localhost", "root", "vertrigo", "animal");

	if($id == 0){
		$sql = $conexao->prepare("INSERT INTO cadastro (nome, dono, especie, raca, nascimento) VALUES (?,?,?,?,?)");
		
		$sql->bind_param("sssss", $nome, $dono, $especie, $raca, $nascimento);
		
	}else{
		$sql = $conexao->prepare("UPDATE cadastro SET nome = ?, dono = ?, especie = ?, raca = ?, nascimento = ? WHERE id = ?");
		
		$sql->bind_param("sssssi", $nome, $dono, $especie, $raca, $nascimento, $id);
	}
	$sql->execute();
	
	mysqli_close($conexao);
	
	header("location: index.php");
?>
<?php
	$id = $_GET["id"];
	
	$conexao = new mysqli("localhost", "root", "vertrigo", "animal");
	
	$sql = $conexao->prepare("DELETE FROM cadastro WHERE id = ?");
	
	$sql->bind_param("i", $id);
	
	$sql->execute();
	
	mysqli_close($conexao);
	
	header("location: index.php");
?>
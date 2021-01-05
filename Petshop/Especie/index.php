<!DOCTYPE html>
<html>
	<head>
		<title>Petshop</title>
		<link rel="stylesheet" href="Css/bootstrap.css"/>
		<link rel="stylesheet" href="Css/Custon.css"/>
		<script src="Js/jquery.js"></script>
		<script src="script.js"></script>
	</head>
	<?php
		$conexao = new mysqli ("localhost", "root", "vertrigo", "especie");
		
		if(isset($_GET["id"])){
			// Editar
			
			$id = $_GET["id"];
			
			$dados = $conexao->query("SELECT * FROM cadastro WHERE id = " .$id);
			$linha = $dados->fetch_assoc();
			
			$id = $linha["id"];
			$descricao = $linha["descricao"];
			
		}else{
			//Novo

			$id = 0;
			$descricao = "";	
		}
	?>
	<body>
		<div class="container">
			<h1>Cadastro de Espécie</h1>
			<form class="row" action="Cadastro.php" method="POST">
				<div class="col-8 form-group">
					<label for="descricao">Descricao:</label>
					<input type="text" id="descricao" name="descricao" value="<?=$descricao;?>" class="form-control"/>
				</div>
				<div class="col-2 form-group">
					<input type="hidden" id="id" name="id" value="<?=$id;?>" class="form-control"/>
					<button type="reset" class="btn btn-success botao">Limpar</button>
					<button type="submit" class="btn btn-primary botao" onclick="return validar();">Salvar</button>
				</div>
				<div class="col-2 form-group botao">
					<a href="index.php">Cadastrar Animal</a>
				</div>
			</form>
			
			<br/>
			
			<h1>Listagem</h1>
			
			<input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar"
			onkeyup="buscar($(this).val());"/>
			
			<table class="table table-striped">
				<thead>
					<tr>
					<th>Id</th>
					<th>Descricao</th>
					<th>Editar</th>
					<th>Excluir</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$tabela = $conexao->query("SELECT * FROM cadastro");
						
						while($linha = $tabela->fetch_assoc()){
					?>	
						
						<tr>
							<td class="buscar"><?=$linha["id"];?></td>
							<td class="buscar"><?=$linha["descricao"];?></td>
							<td><a href="index.php?id=<?=$linha["id"];?>" class="btn btn-warning">Editar</a></td>
							<td><a href="excluir.php?id=<?=$linha["id"];?>" class="btn btn-danger" onclick="return confirm('Tem Certeza?');">Excluir</a></td>
						</tr>
					<?php
					
						}
						mysqli_close($conexao);
					?>
				</tbody>
			</table>
			<script>
				function buscar(texto){
					$("table tbody tr").each (function (){
						
						var mostrar = false;
						
						$(this).find("td.buscar").each(function (){
							if($(this).html().toLowerCase().includes(texto.toLowerCase()))
							{
								mostrar = true;
							}
						});
						if(mostrar) $(this).show();
						else $(this).hide();
					});
				}
			</script>
		</div>
	</body>
</html>

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
		$conexao = new mysqli("localhost", "root", "vertrigo", "animal");
		
		if(isset($_GET["id"])){
			//Editar
			
			$id = $_GET["id"];
			
			$dados = $conexao->query("SELECT * FROM cadastro WHERE id = " .$id);
			$linha = $dados->fetch_assoc();
			
			$nome = $linha["nome"];
			$dono = $linha["dono"];
			$especie = $linha["especie"];
			$raca = $linha["raca"];
			$nascimento = $linha["nascimento"];
			
		}else{
			//Novo
			$id = 0;
			$nome = "";
			$dono = "";
			$especie = "";
			$raca = "";
			$nascimento = "";
		}
	?>
	<body>
		<div class="container">
			<h1>Cadastrar Animal</h1>
			<form class="row" action="Cdt.php" method="POST">
				<div class="col-2 form-group">
					<label for="nome">Nome do Animal:</label>
					<input type="text" id="nome" name="nome" value="<?=$nome;?>" class="form-control"/>
				</div>
				<div class="col-2 form-group">
					<label for="dono">Nome Dono(a):</label>
					<input type="text" id="dono" name="dono" value="<?=$dono;?>" class="form-control"/>
				</div>
				<div class="col-1 form-group">
					<label for="especie">Espécie:</label>
					<select id="especie" name="especie" class="form-control">
						<option value=""></option>
						<option value="Gato(a)">Gato(a)</option>
						<option value="Cachorro(a)">Cachorro(a)</option>
						<option value="Coelho(a)">Coelho(a)</option>
					</select>
				</div>
				<div class="col-1 form-group">
					<label for="raca">Raça:</label>
					<input type="text" id="raca" name="raca" value="<?=$raca;?>" class="form-control"/>
				</div>
				<div class="col-2 form-group">
					<label for="nascimento">Data de Nascimento:</label>
					<input type="date" id="nascimento" name="nascimento" value="<?=$nascimento;?>" class="form-control"/>
				</div>
				<div class="col-2 form-group">
					<input type="hidden" id="id" name="id" value="<?=$id;?>" class="form-control"/>
					<button type="reset" class="btn btn-success botao">Limpar</button>
					<button type="submit" class="btn btn-primary botao" onclick="return validar();">Salvar</button>
				</div>
				<div class="col-2 form-group botao">
					<a href="index.php">Pagina Inicial</a>
				</div>
			</form>
			
			<br/>
			
			<h1>Listagem</h1>
			
			<input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar"
			onkeyup="buscar($(this).val());"/>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Nome do Animal</th>
						<th>Nome do dono</th>
						<th>Espécie</th>
						<th>Raça</th>
						<th>Data Nascimento</th>
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
						<td class="buscar"><?=$linha["nome"];?></td>
						<td class="buscar"><?=$linha["dono"];?></td>
						<td class="buscar"><?=$linha["especie"];?></td>
						<td class="buscar"><?=$linha["raca"];?></td>
						<td class="buscar"><?=$linha["nascimento"]?></td>
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
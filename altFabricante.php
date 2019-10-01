<!--- Esse AltFabricante vai servir para as outras telas de Alterações -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="script/style.css" >
    <title>Alteração De Fabricante</title>
</head>
<body>
<div class="content">
	<div class="col4">
		<img src="imagens/logo3.png" width="100%">
	</div>

	<div class="col2">
		<span class="logo-titulo"> Good Games </span>
	<br /> 
		<span class="logo-desc"> Jogos - Consoles - Acessórios - Dicas </span>
	</div>

	<div class="col4">
			<a href="#" onclick="showModal('nletter')">
			<img src="imagens/newsletter.png" width="100%">
			</a>
	</div>

	<div class="col1">
		<nav class="menu">
			<ul>
				<li><a href="index.html"> Home </a></li>
				<li><a href="quemSomos.html"> Quem somos </a></li>
				<li><a href="produtos.html"> Produtos </a></li>
				<li><a href="curiosidades.html"> Curiosidades </a></li>
				<li><a href="contato.html"> Contato </a></li>
			</ul>
        </nav>
            
    <div class="formulario">
	<!-------------------------------------------- INICIO PHP --------------------------------------------------->
		<?php
			//Preenchar dados softhouse
			require_once('script/condb.php');

			//Capturar o codigo do Fabricante
			$codigo = $_GET["cod"];

			try {
				//Consulta qual softhouse vai ser Editada
				$edita = $conexao->prepare(
					"SELECT * FROM tb_softhouse WHERE idsh = " .$codigo
				);

				//Executa a Consulta ao SQL do SOfthouse
					$edita->execute();

					//Percorrer linhas e pegar o Resultado
					foreach ($edita as $linhas) {
						//Variavel
						$descSF = $linhas[1];
						}
					} catch (Exception $e) {
						echo "Erro: " .$e;
					}
		?>
		<!-------------------------------------------- FIM PHP ------------------------------------------------------>

		<form method="POST" action="script/altDesenv.php">
			<input type="hidden" name="id" id="id" value="<?php echo $codigo ?>">

            <label for="titulo" class="lblTitulo">Código: </label>
            <span class="lblTitulo"><?php echo $codigo; ?></span> <br />
			<br />
			<label for="titulo" class="lblTitulo">Alteração Do Fabricante</label>
			<input type="text" id="titulo" name="titulo"  value="<?php echo $descSF; ?>" required/> <br />
			<br />
            <input type="submit" class="btnEnviar" id="enviar" name="enviar" value="Alterar" class="bt-enviar" />
            <input type="reset" class="btnCancelar" id="limpar" name="limpar" value="Limpar Campos" class="bt-cancelar" />
        </form>
	</div>
	
	</div>
	
</div>
</body>
</html> 	
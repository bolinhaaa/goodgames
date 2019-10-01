<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="script/style.css" >
    <title>Alteração Console</title>
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
            <form method="POST" action="script/altConso.php">        
            <!-------------------------------------------- INICIO PHP --------------------------------------------------->
            <?php
                //Preenchar dados do jogo para Edição
                require_once('script/condb.php');

                //Capturar o codigo do console
                $codigo = $_GET["cod"];

                    try {
                        //Consulta qual Jogo vai ser Editada
                        $edita = $conexao->prepare(
                                "SELECT * FROM tb_console WHERE idconsole = " .$codigo
                        );

                        //Executa a Consulta ao SQL do SOfthouse
                        $edita->execute();

                        //Percorrer linhas e pegar o Resultado
                        foreach ($edita as $linhas) {
                            //Variavel
                            $titulo = $linhas[1];
                            $tipomidia = $linhas[2];
                            $fabricante = $linhas[3];

                        }
                        } catch (Exception $e) {
                            echo "Erro: " .$e;
                        }
                        ?>
            <!-------------------------------------------- FIM PHP ------------------------------------------------------>
           
                <label for="titulo" class="lblTitulo">Lista De Consoles > Alteração Console</label> <br />
                <br />
                <input type="hidden" name="cod" id="cod" value="<?php echo $codigo ?>">
                <label for="id" class="lblTitulo">Codígo:</label>
                <span class="lblTitulo"> <?php echo $codigo; ?></span> <br />
                <br />
                <label for="titulo" class="lblTitulo">Título Do Console</label>
                <input type="text" name="titulo" id="titulo" value="<?php echo $titulo;  ?>"> <br />
                <br />
                <label for="tipomidia" class="lblTitulo">Tipo de Midia </label>
                <input type="text" name="tipomidia" id="tipomidia" value="<?php echo $tipomidia; ?>"> <br />
                <br />
                <label for="fabricante" class="lblTitulo">Fabricante</label>
                <input type="text" name="fabricante" id="fabricante" value="<?php echo $fabricante; ?>"> <br />
                
                <br /><input type="submit" class="btnEnviar" id="enviar" name="enviar" value="Alterar" class="bt-enviar" />
                <input type="reset" class="btnCancelar" id="limpar" name="limpar" value="Limpar Campos" class="bt-cancelar" />
                        
            </form>
            </div>
    </div>
        
</body>
</html>
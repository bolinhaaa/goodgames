<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="script/style.css" >
    <title>Alteração de Jogo</title>
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
					<li><a href="curiosidades   .html"> Curiosidades </a></li>
					<li><a href="contato.html"> Contato </a></li>
				</ul>
            </nav>
            
            <div class="formulario">
                <form method="POST" action="script/altJogo.php">
                    <!-------------------------------------------- INICIO PHP --------------------------------------------------->
		            <?php
                        //Preenchar dados do jogo para Edição
                        require_once('script/condb.php');

                        //Capturar o codigo do jogo
                        $codigo = $_GET["cod"];

                        try {
                            //Consulta qual Jogo vai ser Editada
                            $edita = $conexao->prepare(
                                "SELECT * FROM tb_jogo WHERE idjogo = " .$codigo
                            );

                            //Executa a Consulta ao SQL do SOfthouse
                            $edita->execute();

                            //Percorrer linhas e pegar o Resultado
                            foreach ($edita as $linhas) {
                                //Variavel
                                $titulo = $linhas[1];
                                $resumo = $linhas[2];
                                $valor = $linhas[3];
                                $sf = $linhas[4];
                                $cs = $linhas[5];
                                }
                            } catch (Exception $e) {
                                    echo "Erro: " .$e;
                            }
                    ?>
		<!-------------------------------------------- FIM PHP ------------------------------------------------------>

                    <label for="titulo" class="lblTitulo">Edição de Jogos</label> <br />
                    <br />
                    <input type="hidden" name="cod" id="cod" value="<?php echo $codigo ?>">       
                    <label for="titulo" class="lblTitulo">Código: </label>
                    <span class="lblTitulo"><?php echo $codigo; ?></span> <br />
                    <br />
                    <label for="titulo" class="lblTitulo">Título Do Jogo</label>
                    <input type="text"  id="titulo" name="titulo" value="<?php echo $titulo; ?>" require /> <br />
                    <br>
                    <label for="resumo" class="lblTitulo">Resumo Do Jogo</label>
                    <input type="text" id="resumo" name="resumo" value="<?php echo $resumo; ?>" require/> <br />
                    <br>
                    <label for="valor" class="lblTitulo">Valor do Jogo</label>
                    <input type="text" id="valor" name="valor" value="<?php echo $valor; ?>" require/> <br />
                    <br>
                    <label for="console" class="lblTitulo">Console</label> <br />

                    <!-- Combo Box pega o Nome do Video Game -->
                    <select class="slc" name="console" id="console">
                        <?php
                            require_once('script/condb.php');
                           try {
                               // Variavel
                               $console = $conexao->prepare('SELECT * FROM tb_console ORDER BY fabriconsole, descconsole');
                               
                               $console->execute();

                               foreach($console as $linha){
                                   if ($cs == $linha[0]) {
                                       echo "<option value=" . $linha[0] . " selected>" . $linha[3] . " - " . $linha[1] . "</option>";
                                   }
                                   else {
                                       echo "<option value=" . $linha[0] . " > " .$linha[3] . " - " . $linha[1] . "</option>";
                                   } 
                               }
                           }
                           catch(Exception $e){
                                echo $e;
                           }
                        ?>
                    </select>
                    <br>

                    <!-- Combo Box pega o Nome do Desenvolvedor -->
                    <br /><label for="dev" class="lblTitulo">Desenvolvedor</label> <br />
                    <select name="desenv" id="desenv">
                        <?php
                            try{
                                $desenv = $conexao->prepare('
                                SELECT * FROM tb_softhouse ORDER BY descsh
                                ');

                                $desenv->execute();
                                foreach ($desenv as $linha) {
                                    if($sf == $linha[0]) { 
                                        echo "<option value= " .$linha[0]. " selected> " .$linha[1]. "</option>";
                                    }
                                    else {
                                        echo "<option value= " .$linha[0]. " > " .$linha[1]. "</option>";
                                    }
                                }
                            }
                            catch(Exception $e) {
                                echo $e;
                            }
                        ?>
                    </select>
                    <br>
                    <br /><input type="submit" class="btnEnviar" id="enviar" name="enviar" value="Alterar" class="bt-enviar" />
                    <input type="reset" class="btnCancelar" id="limpar" name="limpar" value="Limpar Campos" class="bt-cancelar" />
                    
                </form>
                </div>
        </div>
        
</body>
</html>
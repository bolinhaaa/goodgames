<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="script/style.css" >
    <title>Cadastro de Jogos</title>
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
                <form name="" method="POST" action="script/cadJogo.php">
                    <label for="titulo" class="lblTitulo">Título Do Jogo</label>
                    <input type="text"  id="titulo" name="titulo" maxlength="30" placeholder="Digite o Nome do Jogo" require /> <br />
                    <br>
                    <label for="resumo" class="lblTitulo">Resumo Do Jogo</label>
                    <input type="text" id="resumo" name="resumo" maxlength="30" placeholder="Digite o Resumo do Jogo" require/> <br />
                    <br>
                    <label for="valor" class="lblTitulo">Valor do Jogo</label>
                    <input type="text" id="valor" name="valor" maxlength="30" placeholder="Digite o Valor do Jogo" require/> <br />
                    <br>
                    <label for="console" class="lblTitulo">Console</label> <br />
                    <select class="slc" name="console" id="console">
                        <?php
                            require_once('script/condb.php');
                           try {
                               // Variavel
                               $console = $conexao->prepare('SELECT * FROM tb_console ORDER BY fabriconsole, descconsole');
                               
                               $console->execute();

                               foreach($console as $linha){
                                echo "<option value=".$linha[0].
                                ">".$linha[3        ] . " - " . $linha[1]."</option>"; 
                               }
                           }
                           catch(Exception $e){
                                echo $e;
                           }
                        ?>
                    </select>
                    <br>
                    <br /><label for="dev" class="lblTitulo">Desenvolvedor</label> <br />
                    <select name="desenv" id="desenv">
                        <?php
                            try{
                                $desenv = $conexao->prepare('
                                SELECT * FROM tb_softhouse ORDER BY descsh
                                ');

                                $desenv->execute();
                                foreach ($desenv as $linha) {
                                    echo "<option value=".$linha[0].">".$linha[1]."</option>";
                                }
                            }
                            catch(Exception $e) {
                                echo $e;
                            }
                        ?>
                    </select>
                    <br>
                    <br /><input type="submit" class="btnEnviar" id="enviar" name="enviar" value="Cadastrar" class="bt-enviar" />
                    <input type="reset" class="btnCancelar" id="limpar" name="limpar" value="Limpar Campos" class="bt-cancelar" />
                    
                </form>
                </div>
        </div>
        
</body>
</html>
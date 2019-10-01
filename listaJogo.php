<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="script/style.css" >
    <title>Lista de Jogos</title>
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
                <form name="" method="POST" action="#">
                    <label for="titulo" class="lblTitulo">Lista De Jogos</label>
                    <table width="100%" border="1px">
                        <tr>
                            <td class="lblTitulo"> Código </td>
                            <td class="lblTitulo"> Título do Jogo </td>
                            <td class="lblTitulo"> Resumo </td>
                            <td class="lblTitulo"> Preço R$</td>
                            <td class="lblTitulo"> Desenvolvedora </td>
                            <td class="lblTitulo"> Console </td>
                            <td class="lblTitulo"> Editar </td>
                            <td class="lblTitulo"> Excluir </td>
                        </tr>

                    <!-------------------------------------------- INICIO PHP --------------------------------------------------->
                    <?php
                        require_once('script/condb.php');

                        try {
                            //Criar Sql de Consulta
                            $lista = $conexao->prepare("SELECT j.idjogo, j.titulojogo, j.resumojogo,
                                j.valorjogo,
                                s.descsh, c.descconsole FROM tb_jogo j, tb_console c, tb_softhouse s
                                WHERE
                                j.fk_softhouse = s.idsh AND
                                j.fk_console = c.idconsole
                                ORDER BY j.titulojogo    
                            ");

                            //Executa a Consulta
                            $lista->execute();

                            //Ler as linhas da lista e criar a tabela
                            foreach ($lista as $linhas) {
                                echo "<tr>
                                        <td class='lblTitulo'> " . $linhas[0] . " </td>
                                        <td class='lblTitulo'> " . $linhas[1] . " </td>
                                        <td class='lblTitulo'> " . $linhas[2] . " </td>
                                        <td class='lblTitulo'> " . $linhas[3] . " </td>
                                        <td class='lblTitulo'> " . $linhas[4] . " </td>
                                        <td class='lblTitulo'> " . $linhas[5] . " </td>
                                        <td class='lblTitulo'> <a href='altJogo.php?cod=". $linhas[0]."'> Editar </a> </td>
                                        <td class='lblTitulo'> Excluir </td>
                                     </tr>";
                            }   
                            
                        } catch (Exception $e) {
                            echo "Erro: " .$e;
                        }
                    ?>
                    <!-------------------------------------------- FIM PHP ------------------------------------------------------>
                        </table>
                </form>
                </div>
        </div>
        
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="script/style.css" >
    <title>Lista Fabricante</title>

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
                <form method="POST" action="#">
                    <label for="titulo" class="lblTitulo">Lista Desenvolvedora</label>
                    <table width="100%" border="1px">
                        <tr>
                            <td class="lblTitulo"> Código </td>
                            <td class="lblTitulo"> Descrição </td>
                            <td class="lblTitulo"> Editar </td>
                            <td class="lblTitulo"> Excluir </td>
                        </tr>
                        <!-------------------------------------------- INICIO PHP --------------------------------------------------->
                            <?php
                                require_once('script/condb.php');

                                try {
                                    //Criar SQL de Consulta
                                    $lista = $conexao->prepare(
                                        " SELECT * FROM tb_softhouse"
                                    );

                                    //Executar Consulta
                                    $lista->execute();

                                    //Ler linhas da lista e criar tabela
                                    foreach($lista as $linhas) {
                                        echo "<tr>
                                                <td class='lblTitulo'> " . $linhas[0] . " </td>
                                                <td class='lblTitulo'> " . $linhas[1] . " </td>
                                                <td class='lblTitulo'> <a href='altFabricante.php?cod=" . $linhas[0] . "'>Editar </a> </td>
                                                <td class='lblTitulo'> <a href='delFabricante.php?cod=" . $linhas[0] . "'> Excluir </a> </td>
                                             </tr>";
                                    }

                                }
                                catch(Exception $e) {
                                    echo "Erro: ".$e;
                                }
                            ?>
                        <!-------------------------------------------- FIM PHP --------------------------------------------------->  
                    </table>
                    <br />
                                        
                </form>
                </div>
        </div>
        
</body>
</html>
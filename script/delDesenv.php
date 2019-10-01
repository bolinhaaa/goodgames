<?php

// Script para  alteração de desenvolvedor de jogos
// Data Criação: 13/08/2019
// Data alteração: 27/08/2019
// Alteração / Correção


// Usa Script de Conexão Com o Banco
    require_once("condb.php");

// Váriaveis
    $codigo = $_POST["id"];

//  Debug
    // echo $descricao;

    try {
        // Variáveis
        // $salvar = $conexao->prepare("INSERT INTO tb_softhouse (descsh) VALUES (\"" . $descricao . "\") ");
        $salvar = $conexao->prepare("DELETE FROM tb_softhouse WHERE idsh = :idsh");

        $salvar->execute(
            array(":idsh" => $codigo)
        );
            if($salvar->rowCount() >0) {
                echo "<script>
                    alert('Desenvolvedor Excluido com Sucesso!');
                    window.location.href = 'http://localhost/goodgames/listaDesenv.php';
                </script>";
            }
            else {
                echo "Erro ao excluir dos Dados!";
            }
    }
    catch(Exception $e) {
        echo "Erro ao salvar Informações --> " . $e;
    }


?>
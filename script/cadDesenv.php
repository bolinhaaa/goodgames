<?php

// Script para  o cadastro de desenvolvedor de jogos
// Data Criação: 13/08/2019
// Data alteração:
// Alteração / Correção


// Usa Script de Conexão Com o Banco
    require_once("condb.php");

// Váriaveis
    $descricao = $_POST["titulo"];

//  Debug
    // echo $descricao;

    try {
        // Variáveis
        $salvar = $conexao->prepare("INSERT INTO tb_softhouse (descsh) VALUES (\"" . $descricao . "\") ");

        $salvar->execute();
            if($salvar->rowCount() >0) {
                echo " Dados salvos com Sucesso.";
            }
            else {
                echo "Erro ao salvar Dados!";
            }
    }
    catch(Exception $e) {
        echo "Erro ao salvar Informações --> " . $e;
    }


?>
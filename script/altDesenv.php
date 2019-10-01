<?php

// Script para  alteração de desenvolvedor de jogos
// Data Criação: 13/08/2019
// Data alteração: 27/08/2019
// Alteração / Correção


// Usa Script de Conexão Com o Banco
    require_once("condb.php");

// Váriaveis
    $descricao = $_POST["titulo"];
    $codigo = $_POST["id"];

//  Debug
    // echo $descricao;

    try {
        // Variáveis
        // $salvar = $conexao->prepare("INSERT INTO tb_softhouse (descsh) VALUES (\"" . $descricao . "\") ");
        $salvar = $conexao->prepare("UPDATE tb_softhouse SET descsh = :softhouse WHERE idsh = :idsh");

        $salvar->execute(
            array(":softhouse" => $descricao,
                ":idsh" => $codigo)
        );
            if($salvar->rowCount() >0) {
                echo " Alteração efetuada com Sucesso.";
            }
            else {
                echo "Erro ao tentar a Alteração dos Dados!";
            }
    }
    catch(Exception $e) {
        echo "Erro ao salvar Informações --> " . $e;
    }


?>
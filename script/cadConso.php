<?php 

// Script para o cadastro de Desenvolvedor de jogos
// Data Criação: 13/08/2019
// Data Alteração: 
// Alteração / Correção


// Usa Script da Conexão com o Banco
    require_once("condb.php");

// Váriaveis
    $titulo = $_POST["titulo"];
    $tipomidia = $_POST["tipo"];
    $fabricante = $_POST["fabricante"];

    try {
        // Váriavies
        $salvar = $conexao->prepare("INSERT INTO tb_console (descconsole, tipomidia, fabriconsole) VALUES (:descconsole, :tipomidia, :fabriconsole)");

        $salvar->execute(
            array (":descconsole" => $titulo, ":tipomidia"  => $tipomidia, ":fabriconsole" => $fabricante)      
        );

        if($salvar->rowCount() >0) {
            echo "<script>
                    alert('Dados Salvos com Sucesso!');
                    window.location.href = 'http://localhost/goodgames/cadastroconsole.html';
                </script>";
        }
    }
    catch(Exception $e) {
        echo "<script>
                alert('Erro ao salvar Dados!');
                window.location.href = 'http://localhost/goodgames/cadastroconsole.html';
            </script>";
    }
?>


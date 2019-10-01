<?php 

// Script para o cadastro de Desenvolvedor de jogos
// Data Criação: 13/08/2019
// Data Alteração: 27/08/2019
// Alteração / Correção


// Usa Script da Conexão com o Banco
    require_once("condb.php");

// Váriaveis
    $codigo = $_POST["cod"];
    $titulo = $_POST["titulo"];
    $tipomidia = $_POST["tipomidia"];
    $fabricante = $_POST["fabricante"];
    

    try {
        // Váriavies
        $salvar = $conexao->prepare("UPDATE tb_console SET descconsole = :descconsole, tipomidia = :tipomidia, fabriconsole = :fabriconsole WHERE idconsole = :idconsole ");

        $salvar->execute(
            array (
            ":idconsole" => $codigo ,
            ":descconsole" => $titulo,
            ":tipomidia"  => $tipomidia,
            ":fabriconsole" => $fabricante)      
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


<?php
require_once('condb.php');
    //código do jogo
    $codigo = $_POST["cod"];
    $titulo = $_POST["titulo"];
    $resumo = $_POST["resumo"];
    $valor = $_POST["valor"];
    $console = $_POST["console"];
    $desenv = $_POST["desenv"];

// Debug
// echo $titulo . "<br />" .
//      $resumo . "<br />" .
//      $valor . "<br />" .
//      $console . "<br />" .
//      $desenv . "<br />";

    try{
        // $salvar = $conexao->prepare('UPDATE tb_jogo (titulojogo, resumojogo, valorjogo, fk_softhouse, fk_console) VALUES (:titulojogo, :resumojogo, :valorjogo, :fk_softhouse, :fk_console)');

        $salvar = $conexao->prepare("UPDATE tb_jogo SET titulojogo = :titulojogo, resumojogo = :resumojogo, valorjogo = :valorjogo, fk_softhouse = :fk_softhouse, fk_console = :fk_console WHERE idjogo = :idjogo");

        $salvar->execute(
            array(
                ":idjogo" => $codigo,
                ":titulojogo"=>$titulo,
                ":resumojogo"=>$resumo , 
                ":valorjogo"=>$valor, 
                ":fk_console"=>$console,
                ":fk_softhouse"=>$desenv
            )
        );
        // Testar se os dados foram salvos no banco
        if ($salvar->rowCount() >0 ) {
        echo "
            <script>
                alert('Dados Salvos Com Sucesso!');
                window.location.href = 'http://localhost/goodgames/cadastrojogo.php';
            </script>
        ";
        }
        else {
            echo "
            <script> 
                alert('Erro ao Salvar!');
            </script>";
            print_r($salvar->errorInfo());
        }
    }
    catch(Exception $e) {
        echo "
            <script>
                alert('Erro ao Salvar\n'".$e.");
                window.location.href = 'http://localhost/goodgames/cadastrojogo.php';
            </script>
        ";
    }
?>
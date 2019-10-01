<?php
require_once('condb.php');

    $titulo = $_POST['titulo'];
    $resumo = $_POST['resumo'];
    $valor = $_POST['valor'];
    $console = $_POST['console'];
    $desenv = $_POST['desenv'];

// Debug
// echo $titulo . "<br />" .
//      $resumo . "<br />" .
//      $valor . "<br />" .
//      $console . "<br />" .
//      $desenv . "<br />";

    try{
        $salvar = $conexao->prepare('
            INSERT INTO tb_jogo (titulojogo, resumojogo, valorjogo, fk_softhouse, fk_console) 
            VALUES
            (:titulojogo, :resumojogo, :valorjogo, :fk_softhouse, :fk_console)
        ');

        $salvar->execute(
            array(
                ':titulojogo'=>$titulo,
                ':resumojogo'=>$resumo , 
                ':valorjogo'=>$valor, 
                ':fk_console'=>$console,
                ':fk_softhouse'=>$desenv
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
<?php
// Script de Conexão com o Banco
// Data de Criação: 09/08/2019
// Data de Alteração: 13/08/2019
// Alteração: Removido instrução select do Script, acrescentado instrução try / cath testado conexão e erro de conexão
    try {
        $conexao = new PDO(
        // Conexão com banco de dados com qualquer banco de dados
        
        'mysql:dbname=goodgames; host=localhost',
        'root',
        ''); 
        if ($conexao) {
            //echo "Conexão Com o Banco de Dados. ";
        }
    }
    catch(Exception $e) {
            echo "Erro ao Conectar -> " . $e;
        }   
?>
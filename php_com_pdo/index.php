<?php

    $dsn = "mysql:host=localhost; dbname=xphp_com_pdo";
    $usuario = "root";
    $senha = "";

    try{
        $conexao = new PDO($dsn, $usuario, $senha);
        
    }catch(PDOException $e){
        
        echo "Erro: ".$e->getCode(). " Mensagem: ".$e->getMessage();
    }

?>
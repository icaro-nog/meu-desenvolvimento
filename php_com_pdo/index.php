<?php

    $dsn = "mysql:host=localhost; dbname=php_com_pdo";
    $usuario = "root";
    $senha = "";

    try{
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = "
            select * from tb_usuarios
        ";

        $stmt = $conexao->query($query);
        /* fetch(): Retorna uma unica row da consulta, ideal para poder utilizar em consultas como login, que retorna somente um resultado.
        fetchAll(): Retorna um array com todas as linhas da consulta, ideal para uma busca por nome ou por endereço. */
        $lista = $stmt->fetchAll();

        echo "<pre>";
        print_r($lista[0]["nome"]);
        echo "</pre>";
        // Retornando índices do array de fetchAll
        echo $lista[2][2];

    }catch(PDOException $e){
        
        echo "Erro: ".$e->getCode(). " Mensagem: ".$e->getMessage();
    }

?>
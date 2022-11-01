<?php

    $dsn = "mysql:host=localhost; dbname=php_com_pdo";
    $usuario = "root";
    $senha = "";

    try{
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = "
            select * from tb_usuarios
        ";

        //$stmt = $conexao->query($query);
        /* fetch(): Retorna uma unica row da consulta, ideal para poder utilizar em consultas como login, que retorna somente um resultado.
        fetchAll(): Retorna um array com todas as linhas da consulta, ideal para uma busca por nome ou por endereço. */
        // PDO::FETCH_NUM - Retorna apenas índices númericos do array
        // PDO::FETCH_ASSOC - Retorna apenas índices associativos do array
        // PDO::FETCH_BOTH - Retorna ambos
        // PDO::FETCH_OBJ - Retorna o array em formato de objeto, sendo necessário acessá-lo com ->
        //$lista_usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        /*
        echo "<pre>";
        print_r($lista_usuarios);
        echo "</pre>";
        */

        // Retornando índices do array de fetchAll
        //echo $lista[6]->nome;

        // Listar registros com foreach
        foreach($conexao->query($query) as $key => $value){

            //Value para acessar o valor de cada key de array
            print_r($value[3]);
            echo "<hr>";
        }

        /*
        foreach($lista_usuarios as $key => $value){

            echo $value["nome"];
            echo "<hr>";
        }
        */

    }catch(PDOException $e){
        
        echo "Erro: ".$e->getCode(). " Mensagem: ".$e->getMessage();
    }

?>
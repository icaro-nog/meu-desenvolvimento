<?php

    session_start();

    // Substituindo # por -
    /*
    $titulo = str_replace("#", "-", $_POST["titulo"]);
    $categoria = str_replace("#", "-", $_POST["categoria"]);
    $descricao = str_replace("#", "-", $_POST["descricao"]);
    */
    
    // Sugestão de desafio -> implode("#", $_POST); -> feito
    // implode("#", $_POST) para colocar "#" entre os índices do array $_POST
    // PHP_EOL -> quebra de linha de acordo com o sistema operacional
    $texto = $_SESSION["id"] . "#" . implode("#", $_POST) . PHP_EOL;
    
    // Criando um arquivo
    $arquivo = fopen("registro_chamado.hd", "a");

    // Escrevendo o $texto no arquivo
    fwrite($arquivo, $texto);

    // Fechando o arquivo
    fclose($arquivo);

    // Redirecionar para abrir_chamado.php
    header("Location: abrir_chamado.php");
?>
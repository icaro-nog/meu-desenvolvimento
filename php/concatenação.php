<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Concatenação PHP </title>
</head>

    <body>
        
        <?php

            $nome = "Igor". " Bariloche";
            $cor = "amarelo";
            $idade = 600;
            $jogo = "Uno";

            // Operador .
            echo "Olá ". $nome.", vi que sua cor preferida é ". $cor.", estou vendo também que você possui ". $idade." anos e que gosta de jogar ". $jogo.".";

            echo "<br/>";

            // Aspas duplas
            echo "Olá $nome, vi que sua cor preferida é $cor, estou vendo também que você possui $idade anos e que gosta de jogar $jogo";
        ?>
        
        
    </body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Funções Matemáticas PHP </title>
</head>

    <body>

        <?php

            $num = 8.4;

            // Arredonda para cima
            echo ceil($num). "<br>";

            // Arredonda para baixo
            echo floor($num). "<br>";

            // Arredonda com base na fração (.0 a .4 arredonda para baixo /// .5 para cima)
            echo round($num). "<br>";

            // Gerar um valor aleatório de 0 até randmax
            echo rand(0, 5). "<br>";
            echo getrandmax(). "<br>";

            // Raiz quadrada
            echo sqrt(9). "<br>";

        ?>

    </body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Funções Strings PHP </title>
</head>

    <body>

        <?php

            $texto = "Curso Completo de PHP";

            // String to Lower
            echo "$texto <br>";
            echo strtolower($texto) . "<hr>";

            // String to Upper
            echo $texto . "<br>";
            echo strtoupper($texto) . "<hr>";

            // Upper Case First
            echo $texto . "<br>";
            echo ucfirst($texto) . "<hr>";

            // String Length -> Conta a quantidade de caracteres e espaços da String
            echo $texto . "<br>";
            echo strlen($texto) . "<hr>";

            // String Replace
            echo $texto . "<br>";
            echo str_replace("PHP", "JavaScript", $texto) . "<hr>";

            // String Replace
            echo $texto . "<br>";
            // "Curso Completo de PHP"
            // 0, 1, 2, 3, 4... 20
            echo substr($texto, 0, 14) . "...";

        ?>

    </body>

</html>
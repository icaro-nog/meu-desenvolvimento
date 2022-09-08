<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Variáveis PHP </title>
</head>

    <body>
        
        <?php

            // String
            $nome = "Jorge Sant Ana";

            // Int
            $idade = 29;

            // Float
            $peso = 82.5;

            // Boolean
            $fumante_sn = false;// (True = 1) ou (false = vazio)
            $fumante_sn2 = true;// (True = 1) ou (false = vazio)

            //*** Lógica ***//
            $idade = "300";// Variável alterada posteriormente a primeira definição

        ?>

        <h1>Ficha cadastral</h1>
        <br>
        <p>Nome: <?= $nome?> </p>
        <p>Idade: <?= $idade?> </p>
        <p>Peso: <?= $peso?> </p>
        <p>Fumante: <?= $fumante_sn?> </p>
        <p>Fumante: <?= $fumante_sn2?> </p>

        <!-- Pode ser utilizado dessa forma também -->
        <!-- <p>Nome: <?php echo $var?> </p>-- >     
    </body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Atividade fixação PHP </title>
</head>

    <body>
        
        <?php

            $idade = 70;
            $peso = 50;

            if(($idade >= 16 && $idade <= 69) && ($peso >= 50)){
                $requisitos = "Sim";
            }else{
                $requisitos = "Não";
            }
        ?>

        <h2>Requisitos: </h2>
        <p>
            Idade:
            <?php
                echo $idade;
            ?>
        </p>
        <p>
            Peso:
            <?php
                echo $peso;
            ?>
        </p>
        <h2>Atende aos requisitos?</h2>
        <p>
            <?php
                echo $requisitos;
            ?>
        </p>
    </body>

</html>
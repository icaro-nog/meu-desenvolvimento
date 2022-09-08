<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Array Multidimensional PHP </title>
</head>

    <body>
        
        <?php
            
            $lista_coisas = [];

            // Array de Frutas
            $lista_coisas["frutas"] = array(1 => "Banana", 2 => "Maçã", 3 => "Morango", 4 => "Uva");
            // Array de Pessoas
            $lista_coisas["pessoas"] = array("José", "Márcio", "Marcos","Gustavo");

            echo "<pre>";

            print_r($lista_coisas["pessoas"]);
            echo "<hr>";
            print_r($lista_coisas["pessoas"][3]);

            echo "</pre>";


        ?>

    </body>

</html>
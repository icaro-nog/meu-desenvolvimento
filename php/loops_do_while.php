<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Loops Do While PHP </title>
</head>

    <body>
        
        <?php

            $x = 1;

            echo "Entrou no While <br>";
            do{
                echo "X = $x <br>";

                $x++; // Critério de parada

            } while($x < 10);

            
            $y = 1;
            
            echo "<hr>";
            echo "Entrou no Do While <br>";
            while($y < 10){
                echo "Y = $y <br>";

                $y++; // Critério de parada
            }
            
        ?>

    </body>

</html>
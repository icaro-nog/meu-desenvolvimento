<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mega Sena PHP </title>
</head>

    <body>
        
        <?php

            $numeros_aleatorios = [];

            //$numero_aleatorio = rand(1, 60);
            for($i = 1; $i < 7; $i++){
				
                echo "O número $i do sorteio da mega-sena é: " . $numeros_aleatorios[$i] = rand(1, 60) . "<br>";
            }
			
            
        ?>

    </body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Loops While PHP </title>
</head>

    <body>
        
        <?php
            $num = 1;
            // Operadores de comparação / lógicos
            echo "Início do loop <br>";
            while($num < 10){
                
                $num++;

                // Pula o 1 e o 8
                if($num == 1 || $num == 8){
                    continue;
                }

                echo "$num <br>";
                /*
                if($num > 100){
                    break;
                }
                */
            }
            echo "Fim do loop";
        ?>

    </body>

</html>
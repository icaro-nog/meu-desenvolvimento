<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Atividade fixação 2 PHP </title>
</head>

    <body>
        
        <?php
            
            function calcularImpostoRenda($salarioBc){
                $imposto = 0;
                if($salarioBc <= 1903.98){
                    $imposto;
                }else if($salarioBc >= 1903.99 && $salarioBc <= 2826.65){
                    $imposto = ($salarioBc * 7.5)/100;
                }else if($salarioBc >= 2826.66 && $salarioBc <= 3751.05){
                    $imposto = ($salarioBc * 15)/100;
                }else if($salarioBc >= 3751.06 && $salarioBc <= 4664.68){
                    $imposto = ($salarioBc * 22.5)/100;
                }else{
                    $imposto = ($salarioBc * 27.5)/100;
                }

                return $imposto;
            }

            echo calcularImpostoRenda(0000);

        ?>

    </body>
</html>
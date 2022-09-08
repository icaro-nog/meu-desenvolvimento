<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> funções PHP </title>
</head>

    <body>
        
        <?php

            // Void (sem retorno) - usa echo ao invés de Return
            function exibirBoasVindas(){
                echo "Seja bem-vindo ao curso de PHP! <br>";
            }

            exibirBoasVindas();

            // Return (com retorno)
            function calcularAreaTerreno($largura, $comprimento){
                $area = $largura * $comprimento;

                return $area;
            }

            
            $resultado = calcularAreaTerreno(30, 50);;
            echo $resultado;
            
        ?>

    </body>
</html>
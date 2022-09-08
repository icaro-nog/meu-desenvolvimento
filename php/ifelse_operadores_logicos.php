<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Operadores Lógicos PHP </title>
</head>

    <body>
        
        <?php

            // && ou AND -> Retorna verdadeiro se todos os resultados das expressões forem verdadeiros
            // || ou OR -> Retorna verdadeiro se pelo menos um dos resultados das expressões forem verdadeiros
            // XOR -> Retorna verdadeiro se uma das expressões for falsa e a outra verdadeira
            // ! -> Inverte o resultado retornado pela expressão

            if((22 == 22 && 3 == 3) XOR 5 != 5){
                echo "Verdadeiro";
            }else{
                echo "Falso";
            }

        ?>
        
        
    </body>

</html>
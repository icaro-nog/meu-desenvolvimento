<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Operadores de Incremento e Decremento PHP </title>
</head>

    <body>
    <!-- Soma -->
    <h3>Pós-incremento</h3>
    <?php
        
        $a = 7;

        echo "O valor contido em a é: $a <br>";
        echo "O valor contido em a após o incremento é: ". $a++. " <br>";
        echo "O valor atualizado é: ". $a. " <br>";

    ?>
    <h3>Pré-incremento</h3>
    <?php
        
        $a = 7;

        echo "O valor contido em a é: $a <br>";
        echo "O valor contido em a pré o incremento é: ". ++$a. " <br>";
        echo "O valor atualizado é: ". $a. " <br>";

    ?>

    <!-- Subtração -->
    <h3>Pós-incremento</h3>
    <?php
        
        $a = 7;

        echo "O valor contido em a é: $a <br>";
        echo "O valor contido em a após o incremento é: ". $a--. " <br>";
        echo "O valor atualizado é: ". $a. " <br>";

    ?>
    <h3>Pré-decremento</h3>
    <?php
        
        $a = 7;

        echo "O valor contido em a é: $a <br>";
        echo "O valor contido em a pré o decremento é: ". --$a. " <br>";
        echo "O valor atualizado é: ". $a. " <br>";

    ?>   

    </body>

</html>
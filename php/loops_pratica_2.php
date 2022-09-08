<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Loops Prática 2 PHP </title>
</head>

    <body>
        
        <?php
            $funcionarios = [
                ["nome" => "João", "salario" => 2500, "data_nascimento" => "15/13/2050"], 
                ["nome" => "Maria", "salario" => 3000], 
                ["nome" => "Júlia", "salario" => 2200]
            ];

            echo "<pre>";
            print_r($funcionarios);
            echo "</pre>";

            
            foreach($funcionarios as $indice => $funcionario){

                foreach($funcionario as $indice2 => $dados){
                    echo "$indice2 - $dados <br>";
                }
                echo "<hr>";
            }
            
        ?>

    </body>

</html>
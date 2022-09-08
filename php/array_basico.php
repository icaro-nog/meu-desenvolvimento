<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Array Básico PHP </title>
</head>

    <body>
        <!-- Link para consulta var_dump(): https://www.w3schools.com/php/func_var_var_dump.asp -->
        <!-- Link para consulta print_r(): https://www.w3schools.com/php/func_var_print_r.asp -->
        <?php
            // Arrays Sequenciais (numéricos)
            /*
            $lista_frutas = ["Banana", "Maçã", "Morango", "Uva", "Abacate"];
            $lista_frutas[] = "Abacaxi";
            */
            /*
            echo "<pre>";

            var_dump($lista_frutas);
            echo "<hr>";
            print_r($lista_frutas);

            echo "</pre>";
            */
            /*
            echo $lista_frutas[2];
            */
            
            // Arrays Associativos
            $lista_frutas = [
                "a" => "Banana", 
                "b" => "Maçã", 
                "x" => "Morango", 
                "z" => "Tico", 
                "2" => "Abacate"
            ];

            echo "<pre>";
            var_dump([$lista_frutas]);
            echo "</pre>";

            echo "<hr>";
            
            $lista_frutas["w"] = "Abacaxi";
            echo $lista_frutas["w"];

        ?>

    </body>

</html>
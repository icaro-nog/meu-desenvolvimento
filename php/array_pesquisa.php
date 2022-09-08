<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Array Pesquisa PHP </title>
</head>

    <body>
        <!-- Link para consulta in_array(): https://www.w3schools.com/php/func_array_in_array.asp -->
        <!-- Link para consulta in_search(): https://www.w3schools.com/php/func_array_search.asp -->
        <?php
            
            $lista_frutas = ["Banana", "Maçã", "Morango", "Uva"];
            /*
            echo "<pre>";
                print_r($lista_frutas);
            echo "</pre>";
            */
            //$existe = in_array("Morango", $lista_frutas);
            // True -> texto = 1
            // False -> texto = (vazio)

            /*
            if($existe){ // True / false
                echo "Sim, o valor pesquisado existe no array";
            }else{
                echo "Não, o valor pesquisado não existe no array";
            }
            */

            /*
            $existe = array_search("Abacate", $lista_frutas);
            // Retorna o ÍNDICE do array
            // Se não existir, o retorno é null
            
            if($existe != null){
                echo "Sim, o valor pesquisado existe no array";
            }else{
                echo "Não, o valor pesquisado não existe no array";
            }
            */

            $lista_coisas = [
                "frutas" => $lista_frutas,
                "pessoas" => ["João", "Maria"],
            ];

            echo "<pre>";
                print_r($lista_coisas);
            echo "</pre>";

            echo in_array("Maria", $lista_coisas["pessoas"]);
            
        ?>

    </body>

</html>
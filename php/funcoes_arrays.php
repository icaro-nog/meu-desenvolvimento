<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Funções Nativas Arrays PHP </title>
</head>

    <body>
        <!-- Funções nativas PHP -->
        <!-- Link para consulta is_array(): https://www.w3schools.com/php/func_var_is_array.asp -->
        <!-- Link para consulta print_r(): https://www.w3schools.com/php/func_var_print_r.asp -->
        <!-- Link para consulta sort(): https://www.w3schools.com/jsref/jsref_sort.asp -->
        <!-- Link para consulta asort(): https://devcom.w3schools.com/php/func_array_asort.asp -->
        <!-- Link para consulta count(): https://www.w3schools.com/php/func_array_count.asp -->
        <!-- Link para consulta array_merge(): https://www.w3schools.com/php/func_array_merge.asp -->
        <!-- Link para consulta explode(): https://www.w3schools.com/php/func_string_explode.asp -->
        <!-- Link para consulta implode(): https://www.w3schools.com/php/func_string_implode.asp -->
        
        <?php
            /*
           $array = [];
           $retorno = is_array($array);

           if($retorno){
            echo "Sim, é um array";
           }else{
            echo "Não, não é um array";
           }
           */
           /*
           $array = [1 => "a", 7 => "b", 18 => "c"];
           echo "<pre>";
                print_r($array);
           echo "</pre>";
           
           $chaves_array = array_keys($array);
           echo "<pre>";
                print_r($chaves_array);
           echo "</pre>";
           */
           /*
           $array = ["teclado", "mouse", "notebook", "fonte atx", "gabinete"];
           echo "<pre>";
                print_r($array);
           echo "</pre>";

           sort($array);
           echo "<pre>";
                print_r($array);
           echo "</pre>";
           */
            /*
            $array = ["teclado", "mouse", "notebook", "fonte atx", "gabinete"];
            echo "<pre>";
                print_r($array);
            echo "</pre>";

            asort($array);
            echo "<pre>";
                print_r($array);
            echo "</pre>";
            */
            /*
            $array = ["teclado", "mouse", "notebook", "fonte atx", "gabinete"];
            echo "<pre>";
                print_r($array);
                echo count($array);
            echo "</pre>";
            */
            /*
            $array1 = ["osx", "windows"];
            $array2 = ["linux"];
            $array3 = ["solaris"];

            $novo_array = array_merge($array1, $array2, $array3);
            echo "<pre>";
                print_r($novo_array);
            echo "</pre>";
            */
            /*
            $string = "26/04/2018";
            $array_retorno = explode("/", $string);
            echo "<pre>";
                print_r($string);
                print_r($array_retorno);
                echo $array_retorno[2] . "/" . $array_retorno[1] . "/" . $array_retorno[0];
            echo "</pre>";
            */
            
            $array = ["a", "b", "c", "d"];
            $string_retorno = implode(", ", $array);
            echo $string_retorno;


        ?>

    </body>

</html>
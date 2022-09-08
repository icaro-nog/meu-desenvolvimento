<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> False Null Empty PHP </title>
</head>

    <body>
        
        <?php
            
           // False (true/false) - Tipo de variável boolean
           // Null e empty - Valores especiais

           $funcionario1 = null; 
           $funcionario2 = "";
           $funcionario3 = false;

           // Valores null is_null() -> Exclusivamente null
           if(is_null($funcionario1)){
            echo "Sim, a variável é null";
           }else{
            echo "Não, a variável não é null";
           }
           
           echo "<br>";
           if(is_null($funcionario2)){
            echo "Sim, a variável é null";
           }else{
            echo "Não, a variável não é null";
           }

           echo "<br>";
           if(is_null($funcionario3)){
            echo "Sim, a variável é null";
           }else{
            echo "Não, a variável não é null";
           }

           echo "<hr>";
           // Valores vazios
           if(empty($funcionario1)){
            echo "Sim, a variável está vazia";
           }else{
            echo "Não, a variável não está vazia";
           }
           
           echo "<br>";
           if(empty($funcionario2)){
            echo "Sim, a variável está vazia";
           }else{
            echo "Não, a variável não está vazia";
           }

           echo "<br>";
           if(empty($funcionario3)){
            echo "Sim, a variável está vazia";
           }else{
            echo "Não, a variável não está vazia";
           }
            
        ?>

    </body>

</html>
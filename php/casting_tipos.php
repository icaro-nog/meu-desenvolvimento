<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Casting de tipos PHP </title>
</head>

    <body>
        
    <?php
        
        // gettype() -> Retorna o tipo da variável

        $valor = true;
        // $valor2 = (float) $valor; //Float, Double
        // $valor2 = (string) $valor;

        // $valor2 = (int) $valor; // Int ou Integer
        // $valor2 = (boolean) $valor; // Bool, boolean (true -> 1 e false é "")

        $valor2 = (string) $valor; // Int ou Integer

        echo $valor. " ". gettype($valor);
        echo "<br>";
        echo $valor2. " ".  gettype($valor2);

    ?>    

    </body>

</html>
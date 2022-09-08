<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Switch PHP </title>
</head>

    <body>
        
    <?php
        $parametro = "abc";

        switch ($parametro){
            case 1:
                echo "Entrou no case 1";
                break;
            case "abc":
                echo "Entrou no case abc";
                break;
            case false:
                echo "Entrou no case false";
                break;

            default:
                echo "Não entrou em nenhum case";
                break;
        }
    ?>    

    </body>

</html>
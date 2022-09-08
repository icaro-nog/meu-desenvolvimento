<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Loops ForEach PHP </title>
</head>

    <body>
        
        <?php
            $itens = ["Sofá", "Mesa", "Cadeira", "Fogão", "Geladeira"];

            echo "<pre>";
            print_r($itens);
            echo "</pre>";

            foreach($itens as $item){
                echo "Item: $item";

                if($item == "Mesa"){
                    echo "(* Compre uma mesa e ganhe 25% de desconto na compra de 4 cadeiras *)";
                }

                echo "<br>";
            }
        ?>

    </body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Loops Prática PHP </title>
</head>

    <body>
        
        <?php

            $registros = [
                ["titulo" => "Título notícia 1", "conteudo" => "Conteúdo notícia 1"], 
                ["titulo" => "Título notícia 2", "conteudo" => "Conteúdo notícia 2"], 
                ["titulo" => "Título notícia 3", "conteudo" => "Conteúdo notícia 3"],
                ["titulo" => "Título notícia 4", "conteudo" => "Conteúdo notícia 4"]
            ];

            echo "<pre>";
            print_r($registros);
            echo "</pre>";

            echo "<br><br><br><br>";

            $indice = 0;
            echo "O array possui: " . count($registros) . " registros";
            echo "<br>";
            /*
            while($indice < count($registros)){
                echo "<h3>" . $registros[$indice]["titulo"] . "</h3>";
                echo "<p>" . $registros[$indice]["conteudo"] . "</p>";
                echo "<hr>";

                $indice++;
            }
            */
            /*
            do{
                echo "<h3>" . $registros[$indice]["titulo"] . "</h3>";
                echo "<p>" . $registros[$indice]["conteudo"] . "</p>";
                echo "<hr>";

                $indice++;
            }while($indice < count($registros));
            */
            
            for($indice; $indice < count($registros); $indice++){
                echo "<h3>" . $registros[$indice]["titulo"] . "</h3>";
                echo "<p>" . $registros[$indice]["conteudo"] . "</p>";
                
                echo "<hr>";
            }
            
            
        ?>

    </body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Variáveis Constantes PHP </title>
</head>

    <body>
        
        <?php

            /*
            Ao contrário das variáveis, as constantes são definidas como valores imutáveis, ou seja, uma vez definida, uma constante não pode mudar de valor. Constantes podem ser acessadas de qualquer lugar do script, ou seja, são globais, entretanto só podem conter valores escalares.
            */
            define("BD_URL", "endereco_bd_dev");
            define("BD_USUARIO", "usuario_dev");
            define("BD_SENHA", "senha_dev");

            // Variáveis constantes não podem ser sobrescritas
            define("BD_URL", "endereco_bd_teste");
            

            echo BD_URL . "<br>";
            echo BD_USUARIO . "<br>";
            echo BD_SENHA . "<br>";
        ?>
        
        
    </body>

</html>
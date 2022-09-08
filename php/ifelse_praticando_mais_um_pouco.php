<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Praticando mais um pouco PHP </title>
</head>

    <body>
        
        <?php

            $usuario_possui_cartao_loja = true;
            $valor_compra = 99;

            $valor_frete = 50;
            $recebeu_desconto_frete = true;

            if($usuario_possui_cartao_loja && $valor_compra >= 400){
                $valor_frete = 0;

            }else if($usuario_possui_cartao_loja && $valor_compra >= 300){
                $valor_frete = 10;

            }else if($usuario_possui_cartao_loja && $valor_compra >= 100){
                $valor_frete = 25;

            }else{
                $recebeu_desconto_frete = false;

            }

        ?>

        <h2>Detalhes do pedido:</h2>
        <p>
            Possui cartão da loja?
            <?php
                // <condição> ? true : false

                // Forma mais enxuta utilizando operadores ternários
                echo $usuario_possui_cartao_loja ? "SIM" : "NÃO";

                /*
                if($usuario_possui_cartao_loja){
                    echo "SIM";
                }else{
                    echo "NÃO";
                }
                */
            ?>
        </p>
        <p>
            Valor da compra:
            <?php
                echo $valor_compra;
            ?>
        </p>
        <p>
            Recebeu desconto no frete?
            <?php
                // Forma mais enxuta utilizando operadores ternários
                echo $recebeu_desconto_frete ? "SIM" : "NÃO";

                /*
                if($recebeu_desconto_frete){
                    echo "SIM";
                }else{
                    echo "NÃO";
                }
                */
            ?>
        </p>
        <p>
            Valor do frete atualizado: 
            <?php
                echo $valor_frete;
            ?>
        </p>
        
    </body>

</html>
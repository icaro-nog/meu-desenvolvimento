<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Funções Datas PHP </title>
</head>

    <body>
        <!-- Link para consultas: https://www.w3schools.com/php/func_date_date.asp -->
        <!-- Link para consultas de timezones: https://www.php.net/manual/en/timezones.america.php -->
        <?php
            /*
            // Recuperação da data atual/ data corrente
            echo date("d/m/Y H:i"). "<br>";

            echo date_default_timezone_get(). "<br>";
            date_default_timezone_set("America/Sao_Paulo"). "<br>";
            echo date_default_timezone_get(). "<br>";
            */

            // Colocar no formato EUA, pois isso segue o padrão computacional
            $data_inicial = "2018-04-24";
            $data_final = "2018-05-15";

            // Timestamp
            // 01/01/1970(data em que a era UNIX surgiu) -- 2018-04-24

            $time_inicial = strtotime($data_inicial);// Transforma uma data string em segundos
            $time_final = strtotime($data_final);// Transforma uma data string em segundos
            echo $data_inicial . " - " . $time_inicial . " em segundos";
            echo "<br>";
            echo $data_final . " - " . $time_final . " em segundos";

            $diferenca_times = $time_final - $time_inicial;

            echo "<br>";
            echo "A diferença de segundos entre a data inicial e final é: " . $diferenca_times;

            $segundos_existem_dia = 24 * 60 * 60;

            echo "<br>";
            echo "Um dia possui " . $segundos_existem_dia . " segundos";

            $diferenca_de_dias_entre_as_datas = $diferenca_times / $segundos_existem_dia;

            echo "<br>";
            echo "A diferença de dias entre as datas é: " .  $diferenca_de_dias_entre_as_datas;
        ?>

    </body>

</html>
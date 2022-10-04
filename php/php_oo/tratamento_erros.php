<?php

    // Tenha uma lógica
    try{

        // Tenha uma lógica onde possa ocorrer um potencial erro (exceção)
        echo "<h3> **** Try **** </h3>";

        // $sql = "Select * from clientes";
        // mysql_query($sql); // Erro

        // !file_exists("...") se o arquivo NÃO existir
        if(!file_exists("require_arquivo_a.php")){
            // Throw para lançar o Exception para a aplicação saindo do if e sendo executado em qualquer outro Catch
            // Instância da classe Exception com o parâmetro do erro "..."
            throw new Exception("O arquivo em questão deveria estar disponível as " . date("d/m/Y H:i:s") . " mas não estava. Vamos seguir mesmo assim!");

        }

    }catch(Error $e){

        echo "<h3> *** Catch *** </h3>";
        echo "<p style='color: red;'>" . $e . "</p>"; // Exibição do erro também possibilitando o armazenamento do erro em banco de dados para posterior análise pela equipe

    }catch(Exception $e){

        echo "<h3> *** Catch Exception *** </h3>";
        echo "<p style='color: red;'>" . $e . "</p>"; // Exibição do erro também possibilitando o armazenamento do erro em banco de dados para posterior análise pela equipe

    }finally{ // Finally é OPCIONAL caso haja o Catch

        echo "<h3> **** Finally **** </h3>";
    }

    /*
    // Tenha uma lógica
    try{

        // Tenha uma lógica onde possa ocorrer um potencial erro (exceção)

    }
    */

?>
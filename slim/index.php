<?php 

    // Exija o autoloader do Composer em seu script PHP e você estará pronto para começar a usar o Slim
    require 'vendor/autoload.php';

    $app = new \Slim\App;

    $app->get("/postagens2", function(){

        echo 'Listagem de postagens';
    });

    /* Atributo obrigatório dentro de chaves */
    $app->get("/teste/{id}", function($request, $response){

        $id = $request->getAttribute('id');

        // Verificar se ID é válido e existe no BD
        echo 'Listagem de usuários ou ID ' . $id;
    });

    /* Atributo opcional, passado dentro de colchetes */
    $app->get("/usuarios[/{id}]", function($request, $response){

        $id = $request->getAttribute('id');

        // Verificar se ID é válido e existe no BD
        echo 'Listagem de usuários ou ID ' . $id;
    });

    /* Mais de um atributo passado de forma opcional na url dentro de colchetes */
    $app->get("/postagens[/{ano}[/{mes}]]", function($request, $response){

        $ano = $request->getAttribute('ano');
        $mes = $request->getAttribute('mes');

        echo 'Listagem de postagens ano: ' . $ano ." mês: ". $mes;
    });

    /* .* -> para receber qualquer tipo e quantidade de atributos ex.:  teste/55/nome/85 */
    $app->get("/lista/{itens:.*}", function($request, $response){

        $itens = $request->getAttribute('itens');

        echo $itens . "<br><br><br><br><br><br>";
        echo "<pre>";
        print_r(explode("/", $itens));
        echo "</pre>";
        
    });

    /* Nomear rotas */
    $app->get("/blog/postagens/{id}", function($request, $response){

        echo "Listar postagem para um ID";
        
    })->setName("blog");

    $app->get("/meusite", function($request, $response){

        /* Direcionamento de rota para setName("blog") */
        $retorno = $this->get("router")->pathFor("blog", ["id" => "10"]);

        echo $retorno;        
    });

    /* Agrupar rotas */
    $app->group("/v1", function(){

        $this->get("/postagens", function(){

            echo 'Listagem de postagens';
        });

        $this->get("/usuarios", function(){

            echo 'Listagem de usuarios';
        });

    });


    $app->run();

?>
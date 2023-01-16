<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    // Exija o autoloader do Composer em seu script PHP e você estará pronto para começar a usar o Slim
    require 'vendor/autoload.php';

    $app = new \Slim\App([
        "settings" => [
            "displayErrorDetails" => true
        ]
    ]);

    /* Container dependency injection 
    class Servico {

    }
    $app->get("/servico", function(Request $request, Response $response){

        $servico = $this->get("servico");
        var_dump($servico);

    });
    */

    /* Container Pimple */
    $container = $app->getContainer();
    $container["Home"] = function(){

        return new MyApp\controllers\Home(new MyApp\View);
    };


    /* Controllers como serviço */
    $app->get("/usuario", "Home:index");

    $app->run();
    

    /* Padrão PSR7 
    $app->get("/postagens", function(Request $request, Response $response){

        /* Escrever no corpo da resposta utilizando o padrão PSR7 
        $response->getBody()->write("Listagem de postagens");

        return $response;
    });
    */
    /* 
    Tipos de requisição ou Verbos HTTP

    get -> Recuperar recursos do servidor (Select)
    post -> Criar dado no servidor (Insert)
    put -> Atualizar dados no servidor (Update)
    delete -> Deletar dados do servidor (Delete)

    Todos testados no Postman****

    */

    // Teste feito no Postman
    /*
    $app->post("/usuarios/adiciona", function(Request $request, Response $response){

        // Recuperar Post ($_POST);
        $post = $request->getParsedBody();
        $nome = $post["nome"];
        $email = $post["email"];

        /* 
        Salvar no banco de dados com INSERT INTO...
        ....
        

        return $response->getBody()->write("Sucesso");
    });
    */
    // Teste feito no Postman
    /*
    $app->put("/usuarios/atualiza", function(Request $request, Response $response){

        // Recuperar Post ($_POST);
        $post = $request->getParsedBody();
        $id = $post["id"];
        $nome = $post["nome"];
        $email = $post["email"];

        /* 
        Atualizar dados no banco com UPDATE...
        ....
        

        return $response->getBody()->write("Sucesso ao atualizar: " . $id);
    });
    */

    // Teste feito no Postman
    /*
    $app->delete("/usuarios/remove/{id}", function(Request $request, Response $response){

        $id = $request->getAttribute('id');

        /* 
        Remover dados no banco com DELETE...
        ....
        

        return $response->getBody()->write("Sucesso ao deletar: " . $id);
    });
    */


    /*
    $app->get("/postagens2", function(){

        echo 'Listagem de postagens';
    });
    */

    /* Atributo obrigatório dentro de chaves 
    $app->get("/teste/{id}", function($request, $response){

        $id = $request->getAttribute('id');

        // Verificar se ID é válido e existe no BD
        echo 'Listagem de usuários ou ID ' . $id;
    });
    */
    /* Atributo opcional, passado dentro de colchetes 
    $app->get("/usuarios[/{id}]", function($request, $response){

        $id = $request->getAttribute('id');

        // Verificar se ID é válido e existe no BD
        echo 'Listagem de usuários ou ID ' . $id;
    });
    */
    /* Mais de um atributo passado de forma opcional na url dentro de colchetes 
    $app->get("/postagens[/{ano}[/{mes}]]", function($request, $response){

        $ano = $request->getAttribute('ano');
        $mes = $request->getAttribute('mes');

        echo 'Listagem de postagens ano: ' . $ano ." mês: ". $mes;
    });
    */
    /* .* -> para receber qualquer tipo e quantidade de atributos ex.:  teste/55/nome/85 
    $app->get("/lista/{itens:.*}", function($request, $response){

        $itens = $request->getAttribute('itens');

        echo $itens . "<br><br><br><br><br><br>";
        echo "<pre>";
        print_r(explode("/", $itens));
        echo "</pre>";
        
    });
    */
    /* Nomear rotas 
    $app->get("/blog/postagens/{id}", function($request, $response){

        echo "Listar postagem para um ID";
        
    })->setName("blog");

    $app->get("/meusite", function($request, $response){

        /* Direcionamento de rota para setName("blog") 
        $retorno = $this->get("router")->pathFor("blog", ["id" => "10"]);

        echo $retorno;        
    });
    */

    /* Agrupar rotas 
    $app->group("/v1", function(){

        $this->get("/postagens", function(){

            echo 'Listagem de postagens';
        });

        $this->get("/usuarios", function(){

            echo 'Listagem de usuarios';
        });

    });
    */

?>
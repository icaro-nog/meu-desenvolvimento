<?php 

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    use Illuminate\Database\Capsule\Manager as Capsule;

    // Exija o autoloader do Composer em seu script PHP e você estará pronto para começar a usar o Slim
    require 'vendor/autoload.php';

    $app = new \Slim\App([
        "settings" => [
            "displayErrorDetails" => true
        ]
    ]);

    $container = $app->getContainer();
    $container["db"] = function(){

        /* Instância de classe */
        $capsule = new Capsule;

        /* Conexão com o banco de dados */
        $capsule->addConnection([
            'driver' => 'mysql',// Pode-se utilizar outros bancos de dados (Postgres, SQL Server, and SQLite)
            'host' => 'localhost',
            'database' => 'slim',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;

    };

    /* Criação de tabela usuarios */
    $app->get("/usuarios", function(Request $request, Response $response){

        $db = $this->get("db");
        /* 
        $db->schema()->dropIfExists("usuarios");
        $db->schema()->create("usuarios", function($table){

            $table->increments("id");
            $table->string("nome");
            $table->string("email");
            $table->timestamps();


        });
        */

        /* Inserir registros na tabela */
        /*
        $db->table("usuarios")->insert([
            "nome" => "Márcio",
            "email" => "gabriel@outlook.com"
        ]);
        */        

        /* Atualizar registros na tabela */
        /*
        $db->table("usuarios")->where("id", 1)->update([
            "nome" => "Heisenberg",
        ]);
        */

        /* Deletar registros da tabela */
        /*
        $db->table("usuarios")->where("id", 1)->delete();
        */

        /* Listar registros da tabela */
        /*
        $usuarios = $db->table("usuarios")->get();
        foreach($usuarios as $usuario){

            echo $usuario->nome . "<br>";
        }
        */        

    });

    $app->run();

    /* 
    Tipos de respostas
    Cabeçalho, texto, Json, XML
    */

    /* Retornar informações de cabeçalho 
    $app->get("/header", function(Request $request, Response $response){

        $response->write("Esse é um retorno header");
        return $response->withHeader("Allow", "PUT")
                        ->withAddedHeader("Content-Length", 10);

    });
    */
    /* Retornar informações em formato Json 
    $app->get("/json", function(Request $request, Response $response){

        return $response->withJson([
            "nome" => "icaro Nogueira",
            "endereco" => "Endereco tal.....",
        ]);

    });
    */
    /* Retornar informações em formato XML 
    $app->get("/xml", function(Request $request, Response $response){

        $xml = file_get_contents("arquivo");
        $response->write($xml);

        return $response->withHeader("Content-Type", "application/xml");

    });
    */    

    /* Middleware 

    $app->add( function($request, $response, $next){

        $response->write("Início camada 1 + ");
        //return $next($request, $response);
        $response = $next($request, $response);// Avançando para execução das rotas /usuarios ou /postagens

        $response->write(" + Fim da camada 1 ");
        return $response;

        /* Validação aqui... 
    });

    $app->add( function($request, $response, $next){

        $response->write("Início camada 2 + ");
        //return $next($request, $response);
        $response = $next($request, $response);// Avançando para execução das rotas /usuarios ou /postagens

        $response->write(" + Fim da camada 2 ");
        return $response;

        /* Validação aqui... 
    });

    */

    /*
    $app->add( function($request, $response, $next){

        $response->write("Início camada 2 + ");
        return $next($request, $response);

        /* Validação aqui... 
    });
    

    $app->get("/usuarios", function(Request $request, Response $response){

        $response->write("Ação principal usuários");

    });

    $app->get("/postagens", function(Request $request, Response $response){

        $response->write("Ação principal postagens");

    });
    */

    /* Container dependency injection 
    class Servico {

    }
    $app->get("/servico", function(Request $request, Response $response){

        $servico = $this->get("servico");
        var_dump($servico);

    });
    */

    /* Container Pimple 
    $container = $app->getContainer();
    $container["Home"] = function(){

        return new MyApp\controllers\Home(new MyApp\View);
    };
    */


    /* Controllers como serviço 
    $app->get("/usuario", "Home:index");
    */    

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
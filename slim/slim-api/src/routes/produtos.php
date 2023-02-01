<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto; // -> $produtos = Produto::get();

// Rotas para produtos
/*
ORM -> Object Relational Mapper (Mapeador de objeto relacional)
Illuminate -> É o moto da base de dados do Laravel sem o Laravel
*/
$app->group("/api/v1", function(){

    // Lista produtos
    $this->get("/produtos/lista", function($request, $response){
        
        $produtos = Produto::get();
        return $response->withJson( $produtos );
    });


    // Adiciona um produto
    $this->post("/produtos/adiciona", function($request, $response){
        
        $dados = $request->getParsedBody();

        // Executar possível validação aqui
        // ...

        $produto = Produto::create( $dados );

        return $response->withJson( $produto );
    });

    // Recupera produto de acordo com ID
    $this->get("/produtos/lista/{id}", function($request, $response, $args){
        /*
        echo "<pre>";
        print_r($args);
        echo "</pre>";
        // Valor passado pela url e pode ser recuperado em $args
        */
        
        $produto = Produto::findOrFail( $args["id"] );
        return $response->withJson( $produto );
        
    });

    // Atualiza produto de acordo com ID
    $this->put("/produtos/atualiza/{id}", function($request, $response, $args){
        /*
        echo "<pre>";
        print_r($args);
        echo "</pre>";
        // Valor passado pela url e pode ser recuperado em $args
        */
        
        $dados = $request->getParsedBody();

        $produto = Produto::findOrFail( $args["id"] );
        $produto->update( $dados );
        return $response->withJson( $produto );
        
    });

    // Remove produto de acordo com ID
    $this->get("/produtos/remove/{id}", function($request, $response, $args){
        /*
        echo "<pre>";
        print_r($args);
        echo "</pre>";
        // Valor passado pela url e pode ser recuperado em $args
        */

        $produto = Produto::findOrFail( $args["id"] );
        $produto->delete();
        return $response->withJson( $produto );
        
    });

});


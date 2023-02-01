<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Produto;
use App\Models\Usuario; // -> $secretKey = $this->get("settings")["secretKey"];
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Rotas para geração de token
$app->post("/api/token", function($request, $response){

    $dados = $request->getParsedBody();

    $email = $dados["email"];
    $senha = $dados["senha"];

    $usuario = Usuario::where("email", $email)->first();

    if(!is_null($usuario) && (md5($senha) === $usuario->senha)){

        // Geração de token
        $secretKey = $this->get("settings")["secretKey"]; // Pegando secretKey de settings.php
        $chaveAcesso = JWT::encode($usuario, $secretKey, 'HS256');

        return $response->withJson([
            "chave" => $chaveAcesso
        ]);
    }

    return $response->withJson([
        "status" => "erro"
    ]);
});
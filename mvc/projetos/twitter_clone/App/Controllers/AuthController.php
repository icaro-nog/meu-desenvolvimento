<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {

    public function autenticar() {

        /*
        echo "Chegamos até aqui!";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        */

        // Instanciar modelo de usuário e conexão com o banco de dados
		$usuario = Container::getModel("Usuario");

        // Receber dados do formulário e setá-los em Usuario.php
		$usuario->__set("email", $_POST["email"]);
		$usuario->__set("senha", md5($_POST["senha"])); // md5 para transformar a senha em um hash de 32 caracteres e comparar com o hash existente no banco de dados

        $retorno = $usuario->autenticarUsuario();

        // Se o return $this de Usuario.php retornar id e nome, o usuário está autenticado
        if($usuario->__get("id") != "" && $usuario->__get("nome") != ""){
            /*
            echo "Autenticado";
            echo "<pre>";
            print_r($usuario);
            echo "</pre>";
            */

            session_start();

            $_SESSION["id"] = $usuario->__get("id");
            $_SESSION["nome"] = $usuario->__get("nome");

            header("location: /timeline");

        }else{
            header("location: /?login=erro");
        }
        
    }

    public function sair() {
        // É necessário inserir o session_start() para ser possível destruí-la
        session_start();

        session_destroy();
        header("location: /");
    }
}

?>
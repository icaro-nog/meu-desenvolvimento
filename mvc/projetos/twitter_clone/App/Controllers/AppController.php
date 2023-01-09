<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

    // Carregamento dos tweets
    public function timeline() {

        // Só irá executar o restante do código se o usuário for válido
        $this->validaAutenticacao();

        // Instanciar modelo de Tweet e conexão com o banco de dados
        $tweet = Container::getModel("Tweet");

        // Setando o id_usuario em getTweets()
        $tweet->__set("id_usuario", $_SESSION["id"]);

        $tweets = $tweet->getTweets();

        $this->view->tweets = $tweets;

        $this->contagemTweets();

        $this->render("timeline");
        /*
        echo "Chegamos a timeline";
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        */

    }

    public function tweet() {

        // Só irá executar o restante do código se o usuário for válido
        $this->validaAutenticacao();

        /*
        echo "<pre>";
        print_r($_POST);
        print_r($_SESSION);
        echo "</pre>";
        */            

        // Instanciar modelo de Tweet e conexão com o banco de dados
        $tweet = Container::getModel("Tweet");

        // Receber dados do formulário e setá-los em Models/Tweet.php
        $tweet->__set("tweet", $_POST["tweet"]);
        $tweet->__set("id_usuario", $_SESSION["id"]);

        $tweet->salvar();

        header("location: /timeline");

    }

    public function quemSeguir() {

        // Só irá executar o restante do código se o usuário for válido
        $this->validaAutenticacao();

        $pesquisarPor = isset($_GET["pesquisarPor"]) ? $_GET["pesquisarPor"] : "";

        //echo  "Pesquisando por: ". $pesquisarPor;

        $usuarios  = array();

        if($pesquisarPor != ""){

            $usuario = Container::getModel("Usuario");
            $usuario->__set("nome", $pesquisarPor);
            $usuario->__set("id", $_SESSION["id"]);

            $usuarios = $usuario->getUsuarios();

            /*
            echo "<pre>";
            print_r($usuarios);
            echo "</pre>";
            */
        }

        $this->view->usuarios = $usuarios;

        $this->contagemTweets();

        $this->render("quemSeguir");
    }

    // Contar tweets por usuario
    public function contagemTweets() {

        // Instanciar modelo de Tweet e conexão com o banco de dados
        $tweet = Container::getModel("Tweet");

        // Setando o id_usuario em getTweets()
        $tweet->__set("id_usuario", $_SESSION["id"]);
        
        $tweet->getTweets();

        // Contar tweets
        $contagemTweets = count($tweet->getTweets());
        $this->view->contagemTweets = $contagemTweets;

    }

    // Seguir ou deixar de seguir usuário, métodos feitos em Models/Usuario.php
    public function acao() {

        // Só irá executar o restante do código se o usuário for válido
        $this->validaAutenticacao();

        $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
        $id_usuario_seguindo = isset($_GET["id"]) ? $_GET["id"] : "";

        $usuario = Container::getModel("Usuario");
        $usuario->__set("id", $_SESSION["id"]);

        if($acao == "seguir"){
            $usuario->seguirUsuario($id_usuario_seguindo);

        }else if($acao == "deixar_de_seguir"){
            $usuario->deixarSeguir($id_usuario_seguindo);

        }

        header("location: /quem_seguir");

    }
    
    // Remover tweet 
    public function removerTweet() {

        // Só irá executar o restante do código se o usuário for válido
        $this->validaAutenticacao();

        // Instanciar modelo de Tweet e conexão com o banco de dados
        $tweet = Container::getModel("Tweet");

        // Setando o id_usuario em getTweets()
        $tweet->__set("id", $_GET["id"]);
        
        $tweet->remover();

        header("location: /timeline");

    }

    // Validar autenticação do usuário 
    public function validaAutenticacao() {

        session_start();

        if(!isset($_SESSION["id"]) || $_SESSION["id"] == "" || !isset($_SESSION["nome"]) || $_SESSION["nome"] == ""){
            header("Location: /?login=erro");
        }

    }
    
    
}

?>
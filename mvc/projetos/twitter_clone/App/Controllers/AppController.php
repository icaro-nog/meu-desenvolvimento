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

        // Contar tweets
        $contagemTweets = count($tweet->getTweets());
        $this->view->contagemTweets = $contagemTweets;

        /*
        echo "<pre>";
        print_r($this->view->tweets);
        echo "</pre>";
        */

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

            $usuarios = $usuario->getUsuarios();

            /*
            echo "<pre>";
            print_r($usuarios);
            echo "</pre>";
            */
        }

        $this->view->usuarios = $usuarios;

        $this->render("quemSeguir");
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
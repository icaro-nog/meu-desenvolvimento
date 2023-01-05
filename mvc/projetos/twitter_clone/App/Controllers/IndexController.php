<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {

		// Se o parâmetro login passado pela url em AuthController.php estiver setado, escrever o valor dele no atributo login
		$this->view->login = isset($_GET["login"]) ? $_GET["login"] : "";
		$this->render('index');
	}

	public function inscreverse() {

		// Setando como 0 para não exibir nenhum erro
		$this->view->erroCadastro = 0;
		// Para não ocorrer erro de array indefinido ao carregar inscreverse
		$this->view->usuario = array(
			"nome" => "",
			"email" => "",
			"senha" => "",

		);
		$this->render('inscreverse');		
	}

	public function registrar() {

		// Instanciar modelo de usuário e conexão com o banco de dados
		$usuario = Container::getModel("Usuario");

		// Receber dados do formulário e setá-los em Usuario.php
		$usuario->__set("nome", $_POST["nome"]);
		$usuario->__set("email", $_POST["email"]);
		$usuario->__set("senha", md5($_POST["senha"])); // md5 para transformar a senha em um hash de 32 caracteres

		if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0){// Se cada input do formulário tiver mais que 2 caracteres e email não estiver cadastrado no banco de dados
			$usuario->salvar();
			echo '<script type="text/javascript">';
			echo 'alert("Cadastro realizado com sucesso!");'; 
			echo '</script>';
			$this->render("cadastro");

		}else if(count($usuario->getUsuarioPorEmail()) > 0){// Se a contagem de e-mail de usuário for maior que 0 no banco de dados

			// Manter os dados no formulário após erro
			$this->view->usuario = array(
				"nome" => $_POST["nome"],
				"email" => $_POST["email"],
				"senha" => $_POST["senha"],

			);

			// Email já está sendo utilizado
			$this->view->erroCadastro = 1;

			// Recarregar página de inscreverse
			$this->render("inscreverse");

		}else{// Se algum input do formulário tiver menos que 3 caracteres

			// Manter os dados no formulário após erro
			$this->view->usuario = array(
				"nome" => $_POST["nome"],
				"email" => $_POST["email"],
				"senha" => $_POST["senha"],

			);

			/*
			echo "<pre>";
			print_r($this->view->usuario);
			echo "</pre>";
			*/

			// Preenchimento incorreto do formulário
			$this->view->erroCadastro = 2;

			// Recarregar página de inscreverse
			$this->render("inscreverse");
		}

		

	}

}


?>
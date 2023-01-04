<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {

		$this->render('index');
	}

	public function inscreverse() {

		$this->render('inscreverse');
	}

	public function registrar() {

		// Receber dados do formulário e salvá-los
		$usuario = Container::getModel("Usuario");

		$usuario->__set("nome", $_POST["nome"]);
		$usuario->__set("email", $_POST["email"]);
		$usuario->__set("senha", $_POST["senha"]);

		if($usuario->validarCadastro()){
			if(count($usuario->getUsuarioPorEmail()) == 0){
				$usuario->salvar();
				/*
				echo '<script type="text/javascript">';
				echo 'alert("Cadastro realizado com sucesso!");';  //not showing an alert box.
				echo 'location.href="/";';
				echo '</script>';
				*/

				$this->render("cadastro");
			}

			echo '<script type="text/javascript">';
			echo 'alert("E-mail já cadastrado!");';  //not showing an alert box.
			echo 'location.href="/";';
			echo '</script>';	

		}else{
			echo '<script type="text/javascript">';
			echo 'alert("Cadastro não realizado!");';  //not showing an alert box.
			echo 'location.href="/";';
			echo '</script>';
		}
		

		// Sucesso 

		// Erro


	}

}


?>
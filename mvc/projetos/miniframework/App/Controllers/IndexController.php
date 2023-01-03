<?php

    namespace App\Controllers;

    // Recursos do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;

    // Models do miniframework
    use App\Models\Produto;
    use App\Models\Info;

    

    // Extendendo a classe Action.php
    class IndexController extends Action {

        public function index() {

            // $this->view->dados vem da extensão da classe Action
            //$this->view->dados = array("Sofá", "Cadeira", "Cama");

            // Método getModel vindo de use MF\Model\Container
            $produto = Container::getModel("Produto");

            $produtos = $produto->getProdutos();

            $this->view->dados = $produtos;

            // Renderizando conteúdo da página e layout dela
            $this->render("index", "layout1");
        }

        public function sobreNos() {

            //$this->view->dados = array("Notebook", "Smartphone");

            // Método getModel vindo de use MF\Model\Container
            $info = Container::getModel("Info");

            $informacoes = $info->getInfo();

            $this->view->dados = $informacoes;

            // Renderizando conteúdo da página e layout dela
            $this->render("sobreNos", "layout2");
        }


    }

?>
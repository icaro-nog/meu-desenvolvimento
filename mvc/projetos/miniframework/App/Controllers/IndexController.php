<?php

    namespace App\Controllers;

    use MF\Controller\Action;
    use App\Connection;
    use App\Models\Produto;
    use App\Models\Info;

    // Extendendo a classe Action.php
    class IndexController extends Action {

        public function index() {

            // $this->view->dados vem da extensão da classe Action
            //$this->view->dados = array("Sofá", "Cadeira", "Cama");

            // Instância de conexão do PDO
            $conn = Connection::getDb();

            // Instância de modelo
            $produto = new Produto($conn);

            $produtos = $produto->getProdutos();

            $this->view->dados = $produtos;

            // Renderizando conteúdo da página e layout dela
            $this->render("index", "layout1");
        }

        public function sobreNos() {

            //$this->view->dados = array("Notebook", "Smartphone");

            // Instância de conexão do PDO
            $conn = Connection::getDb();

            // Instância de modelo
            $info = new Info($conn);

            $informacoes = $info->getInfo();

            $this->view->dados = $informacoes;

            // Renderizando conteúdo da página e layout dela
            $this->render("sobreNos", "layout2");
        }


    }

?>
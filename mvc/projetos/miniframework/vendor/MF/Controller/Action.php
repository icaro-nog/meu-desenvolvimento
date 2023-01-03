<?php

    namespace MF\Controller;

    abstract class Action {

        protected $view;

        public function __construct() {
            // stdClass para tornar essa $view em uma classe padrão de objetos do PHP
            $this->view = new \stdClass();
        }

        // parâmetros $view e $layout de render estão vindo de IndexController.php 
        protected function render($view, $layout) {

            // Ajustar o contexto do parâmetro $view
            $this->view->page = $view;

            // Se o arquivo solicitado existir, exibir ele na página, senão, exibir apenas o conteúdo que já está carregado nela
            if(file_exists("../App/Views/".$layout.".phtml")){
                require_once "../App/Views/".$layout.".phtml";
            }else{
                $this->content();
            }

            
        }

        protected function content() {

            $classAtual = get_class($this);

            $classAtual = str_replace("App\\Controllers\\", "", $classAtual);

            $classAtual = strToLower(str_replace("Controller", "", $classAtual));

            //echo $classAtual;

            require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";
        }

    }

?>
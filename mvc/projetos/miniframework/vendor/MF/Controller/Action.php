<?php

    namespace MF\Controller;

    abstract class Action {

        protected $view;

        public function __construct() {
            $this->view = new \stdClass();
        }

        protected function render($view) {

            $classAtual = get_class($this);

            $classAtual = str_replace("App\\Controllers\\", "", $classAtual);

            $classAtual = strToLower(str_replace("Controller", "", $classAtual));

            echo $classAtual;

            require_once "../App/Views/".$classAtual."/".$view.".phtml";
        }

    }

?>
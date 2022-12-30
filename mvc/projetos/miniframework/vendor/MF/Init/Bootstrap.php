<?php

    // Namespace para não haver conflito entre criação de classes em Route.php está sendo usado como use MF/Init/Bootstrap;
    namespace MF\Init;

    abstract class Bootstrap {

        private $routes;

        abstract protected function initRoutes();

        public function __construct() {
            // Startando rotas
            $this->initRoutes();

            // Função run para startar o envio da url ao back-end da aplicação
            $this->run($this->getUrl());
        }

        public function getRoutes() {

            return $this->routes;
        }

        public function setRoutes(array $routes) {
            
            $this->routes = $routes;
        }

        protected function run($url) {
            //echo "**********************" . $url . "********************************";

            // Percorrendo o array de routes setados
            foreach($this->getRoutes() as $key => $route){
                /*
                echo "<pre>";
                print_r($route);
                echo "<pre>";
                echo "<br><br><br><br>";
                Todo
                */

                // Se a url for igual a algum indice de route
                if($url == $route["route"]){
                    // Instância da classe controller - $route["controller"] para pegar o índice da classe e posteriormente obter a $route["action"] da mesma
                    $class = "App\\Controllers\\".ucfirst($route["controller"]);

                    // new App\Controllers\IndexController;
                    $controller = new $class;

                    $action = $route["action"];

                    $controller->$action();
                }
            }
        }

        // Função para retornar o path da url (path seria a última parte da url, do local onde ela está armazenada)
        protected function getUrl() {
            return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        }

    }

?>
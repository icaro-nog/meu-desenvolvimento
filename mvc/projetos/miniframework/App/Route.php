<?php

    namespace App;

    class Route{

        private $routes;

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

        public function initRoutes() {

            $routes["home"] = array(
                "route" => "/",
                "controller" => "indexController",
                "action" => "index"
            );

            $routes["sobre_nos"] = array(
                "route" => "/sobre_nos",
                "controller" => "indexController",
                "action" => "sobreNos"
            );

            // Setando routes
            $this->setRoutes($routes);
        }

        public function run($url) {
            //echo "**********************" . $url . "********************************";

            // Percorrendo o array de routes setados
            foreach($this->getRoutes() as $key => $route){
                //print_r($route);

                // Se a url for igual a algum indice de route
                if($url == $route["route"]){
                    // Instância da classe controller - $route["controller"] para pegar o índice da classe e posteriormente onter a $route["action"] da mesma
                    $class = "App\\Controllers\\".ucfirst($route["controller"]);

                    $controller = new $class;

                    $action = $route["action"];

                    $controller->$action();
                }
            }
        }

        // Função para retornar o path da url (path seria a última parte da url, do local onde ela está armazenada)
        public function getUrl() {
            return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        }
    }

?>
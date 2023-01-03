<?php

    // Namespace para não haver conflito entre criação de classes, no index.php a chamada da classe está assim: $route = new \App\Route;
    namespace App;

    use MF\Init\Bootstrap;

    // Definição de rotas para posterior tratamento em MF\Init\Bootstrap
    class Route extends Bootstrap{

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

    }

?>
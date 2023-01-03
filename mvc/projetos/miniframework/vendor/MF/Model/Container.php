<?php

    namespace MF\Model;

    use App\Connection;

    // Classe utilizada para retornar o modelo Info ou Produto, está sendo usada por IndexController.php
    class Container {

        public static function getModel($model) {

            // Caminho de vendor/App/Models
            $class = "\\App\\Models\\".ucfirst($model);

            // Instância de conexão do PDO
            $conn = Connection::getDb();

            return new $class($conn);
        }
    }

?>
<?php
    // Modelo de tarefa para ser inserido no banco de dados
    class Tarefa{
        private $id;
        private $id_status;
        private $tarefa;
        private $data_cadastro;

        public function __get($atributo){
            return $this->$atributo;
        }

        // Setado por meio do form app_lista_tarefas_public/nova_tarefa.php e app_lista_tarefas_public/todas_tarefas.php
        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }

?>
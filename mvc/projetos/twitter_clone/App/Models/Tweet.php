<?php

    namespace App\Models;

    use MF\Model\Model;

    class Tweet extends Model{

        // Colunas do registro no banco de dados
        private $id;
        private $id_usuario;
        private $tweet;
        private $data;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Método para salvar tweet

        // Método para recuperar tweet

    }

?>
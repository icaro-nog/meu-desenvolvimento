<?php
    // Classe para realizar a conexão com o banco de dados ou exibir erro se não funcionar
    class Conexao{
        // Atributos necessários para conexão com o banco de dados
        private $host = "localhost";
        private $dbname = "php_com_pdo";
        private $user = "root";
        private $pass = "";

        public function conectar(){
            try{

                // Conexão com o banco de dados utilizando o PDO de forma nativa no PHP
                $conexao = new PDO(
                    "mysql:host=$this->host; dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                return $conexao;

            }catch(PDOException $e){
                // Recuperando mensagem de erro por meio do getMessage()
                echo "<p>".$e->getMessage()."</p>";
            }
        }

    }

?>
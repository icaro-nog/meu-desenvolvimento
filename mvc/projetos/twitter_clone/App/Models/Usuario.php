<?php

    namespace App\Models;

    use MF\Model\Model;

    class Usuario extends Model{

        // Colunas do registro no banco de dados
        private $id;
        private $nome;
        private $email;
        private $senha;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        // Query para salvar dados
        public function salvar(){

            $query = "insert into usuarios(nome, email, senha) values(:nome, :email, :senha)";
            // $this->db está vindo da extensão da classe Model
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":nome", $this->__get("nome"));
            $stmt->bindValue(":email", $this->__get("email"));
            $stmt->bindValue(":senha", $this->__get("senha")); //md5() para criptografar senha e torná-la em um hash de 32 caracteres
            $stmt->execute();

            // Para retornar o próprio objeto
            return $this;
        }

        // Validar se um cadastro pode ser feito
        // Inserir mais validações posteriormente
        public function validarCadastro(){
            $valido = true;

            if(strlen($this->__get("nome")) < 3){
                $valido = false;
            }

            if(strlen($this->__get("email")) < 3){
                $valido = false;
            }

            if(strlen($this->__get("senha")) < 3){
                $valido = false;
            }

            return $valido;
        }

        // Recuperar um usuário por e-mail
        public function getUsuarioPorEmail(){

            $query = "select nome, email from usuarios where email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":email", $this->__get("email"));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    }

?>
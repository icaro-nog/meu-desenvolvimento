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
        
        public function autenticarUsuario(){

            // Veriricação no banco de dados se e-mail e senha forem válidos
            $query = "select id, nome, email from usuarios where email = :email and senha = :senha";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":email", $this->__get("email"));
            $stmt->bindValue(":senha", $this->__get("senha"));
            $stmt->execute();

            // fetch(): Retorna uma unica linha do banco de dados, ideal para consultas de login
            $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

            // Setar id e nome se o e-mail e senha forem validos
            if($usuario["id"] != "" && $usuario["nome"] != ""){

                $this->__set("id", $usuario["id"]);
                $this->__set("nome", $usuario["nome"]);

            }

            // Retornar o próprio objeto -> $usuario
            return $this;
            
        }

        public function getUsuarios() {
            // Like para a pesquisa ser baseada em qualquer conjunto de caracteres retornados, inclusive próximos ao conjunto pesquisado
            $query = "select id, nome, email from usuarios where nome like :nome";

            $stmt = $this->db->prepare($query);
            // % para funcionar corretamente a pesquisa com o like
            $stmt->bindValue(":nome", "%".$this->__get("nome")."%");
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
                         
        }
        

    }

?>
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

            $query = "INSERT INTO usuarios(nome, email, senha) VALUES(:nome, :email, :senha)";
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

            $query = "SELECT nome, email FROM usuarios WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":email", $this->__get("email"));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        
        public function autenticarUsuario(){

            // Verificação no banco de dados se e-mail e senha forem válidos
            $query = "SELECT id, nome, email FROM usuarios WHERE email = :email AND senha = :senha";
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
            // (select count(*) from usuarios_seguidores as us where us.id_usuario = :id_usuario and us.id_usuario_seguindo = u.id) para contar se usuario listado na pesquisa está sendo seguido pelo id do usuário da sessão, se sim seguindo_sn = 1
            // É uma subconsulta
            $query = "SELECT u.id, u.nome, u.email, (SELECT COUNT(*) FROM usuarios_seguidores AS us WHERE us.id_usuario = :id_usuario AND us.id_usuario_seguindo = u.id) AS seguindo_sn FROM usuarios AS u WHERE u.nome LIKE :nome AND u.id != :id_usuario"; // and id != :id_usuario para o usuário não poder seguir ele mesmo

            $stmt = $this->db->prepare($query);
            // % para funcionar corretamente a pesquisa com o like
            $stmt->bindValue(":nome", "%".$this->__get("nome")."%");
            $stmt->bindValue(":id_usuario", $this->__get("id"));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
                         
        }


        public function seguirUsuario($id_usuario_seguindo){

            $query = "INSERT INTO usuarios_seguidores(id_usuario, id_usuario_seguindo) VALUES(:id_usuario, :id_usuario_seguindo)";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id_usuario", $this->__get("id"));
            $stmt->bindValue(":id_usuario_seguindo", $_GET["id"]);
            $stmt->execute();

            // Retorno true para inserção ser feita no banco de dados
            return true;
        }
        
        public function deixarSeguir($id_usuario_seguindo){

            $query = "DELETE FROM usuarios_seguidores WHERE id_usuario = :id_usuario AND id_usuario_seguindo = :id_usuario_seguindo";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id_usuario", $this->__get("id"));
            $stmt->bindValue(":id_usuario_seguindo", $_GET["id"]);
            $stmt->execute();

            // Retorno true para inserção ser feita no banco de dados
            return true;
        }

        // Total de usuários que estamos seguindo
        public function contarSeguindo(){
            // Contagem de acordo com o id da sessão
            $query = "SELECT COUNT(*) AS total_seguindo FROM usuarios_seguidores WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id_usuario", $this->__get("id_usuario"));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        // Total de usuários que estão me seguindo
        public function contarSeguidores(){
            // Contagem de acordo com o id da sessão
            $query = "SELECT COUNT(*) AS total_seguidores FROM usuarios_seguidores WHERE id_usuario_seguindo = :id_usuario";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id_usuario", $this->__get("id_usuario"));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

    }

?>
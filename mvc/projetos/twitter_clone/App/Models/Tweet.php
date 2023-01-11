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
        public function salvar(){

            $query = "INSERT INTO tweets(id_usuario, tweet) VALUES(:id_usuario, :tweet)";
            // $this->db está vindo da extensão da classe Model
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id_usuario", $this->__get("id_usuario"));
            $stmt->bindValue(":tweet", $this->__get("tweet"));
            //$stmt->bindValue(":data", $this->__get("data")); // Não é necessário setar a data, pois está como current_timestamp()	no banco de dados
            $stmt->execute();

            // Para retornar o próprio objeto
            return $this;
        }
        

        // Método para recuperar tweet
        public function getTweets(){

            // DATE_FORMAT(t.data, '%d/%m/%Y %H:%i') método mysql para formatar data
            // or
            // t.id_usuario in (select id_usuario_seguindo from usuarios_seguidores where id_usuario = :id_usuario;) para listagem de tweets de outros usuários
            $query = "SELECT 
                t.id, 
                t.id_usuario, 
                u.nome, 
                t.tweet, 
                DATE_FORMAT(t.data, '%d/%m/%Y %H:%i') AS data 
             FROM 
                tweets AS t
                LEFT JOIN usuarios AS u ON (t.id_usuario = u.id)
            WHERE 
                t.id_usuario = :id_usuario
                OR
                t.id_usuario IN (SELECT id_usuario_seguindo FROM usuarios_seguidores WHERE id_usuario = :id_usuario) 
            ORDER BY 
                t.data DESC";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id_usuario", $this->__get("id_usuario"));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        // Método para contar tweets
        public function contarTweets(){
            // Contagem de acordo com o id da sessão
            $query = "SELECT COUNT(*) AS TweetsUsuario FROM tweets WHERE id_usuario = :id_usuario";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id_usuario", $this->__get("id_usuario"));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        // Método para remover tweet
        public function remover(){

            $query = "DELETE FROM tweets WHERE id = :id";
            // $this->db está vindo da extensão da classe Model
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(":id", $this->__get("id"));
            $stmt->execute();

            // Retorno true para remoção ser feita no banco de dados
            return true;
            
        }

    }

?>
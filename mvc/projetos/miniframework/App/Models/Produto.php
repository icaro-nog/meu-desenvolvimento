<?php

    namespace App\Models;

    // PHP não estava utilizando classes nativas, uses foram inseridos para corrigir este erro
    use PDO;

    class Produto {

        protected $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getProdutos() {
            
            $query = "select id, descricao, preco from tb_produtos";
            return $this->db->query($query)->fetchAll();
        }

    }

?>
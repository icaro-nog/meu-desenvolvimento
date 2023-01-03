<?php

    namespace App\Models;

    // PHP não estava utilizando classes nativas, uses foram inseridos para corrigir este erro
    use PDO;

    class Info {

        protected $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getInfo() {
            
            $query = "select titulo, descricao from tb_info";
            return $this->db->query($query)->fetchAll();
        }

    }

?>
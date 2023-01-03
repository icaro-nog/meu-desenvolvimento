<?php

    namespace App\Models;

    // Classe de conexão ao banco de dados
    use MF\Model\Model;

    // Classe de modelo de query
    class Info extends Model {

        public function getInfo() {
            
            $query = "select titulo, descricao from tb_info";
            return $this->db->query($query)->fetchAll();
        }

    }

?>
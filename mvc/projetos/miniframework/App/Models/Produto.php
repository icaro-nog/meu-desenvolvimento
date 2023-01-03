<?php

    namespace App\Models;

    // Classe de conexão ao banco de dados
    use MF\Model\Model;

    // Classe de modelo de query
    class Produto extends Model {

        public function getProdutos() {
            
            $query = "select id, descricao, preco from tb_produtos";
            return $this->db->query($query)->fetchAll();
        }

    }

?>
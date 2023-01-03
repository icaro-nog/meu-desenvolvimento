<?php

    namespace MF\Model;

    // PHP não estava utilizando classes nativas, uses foram inseridos para corrigir este erro
    use PDO;

    // Classe comum para conexão ao banco de dados para Produto.php e Info.php
    abstract class Model {

        protected $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

    }


?>
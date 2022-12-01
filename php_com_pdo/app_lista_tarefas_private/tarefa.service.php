<?php
    // Classe para realizar o CRUD, fazendo a interação entre banco de dados e usuário
    class TarefaService{
        // Atributos para serem persisitidos e manipulados pelo CRUD
        private $conexao;
        private $tarefa;

        // Construtor onde são recebidos os parâmetros setados de $conexao e $tarefa
        // Conexao $conexao, Tarefa $tarefa tipando os parâmetros de acordo com as classes em conexao.php e tarefa.model.php
        public function __construct(Conexao $conexao, Tarefa $tarefa){

            // Execução/ chamada do método conectar() para conectar ao MySQL
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }

        public function inserir(){ // Create
            // :tarefa apenas para evitar sql injection, forma de escrever
            $query = "insert into tb_tarefas(tarefa)values(:tarefa)";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":tarefa", $this->tarefa->__get("tarefa"));
            $stmt->execute();
        }

        public function recuperar(){ // Read
            // Relação entre $tarefa.id_status e tb_status.id para podermos imprimir o status da tarefa na tela
            $query = "select t.id, s.status, t.tarefa from tb_tarefas as t left join tb_status as s on (t.id_status = s.id)";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function atualizar(){ // Update

            $query = "update tb_tarefas set tarefa = :tarefa where id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":tarefa", $this->tarefa->__get("tarefa"));
            $stmt->bindValue(":id", $this->tarefa->__get("id"));
            return $stmt->execute();
        }

        public function remover(){ // Delete
            
            $query = "delete from tb_tarefas where id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":id", $this->tarefa->__get("id"));
            $stmt->execute();
        }

        public function marcarRealizada(){ // Update

            $query = "update tb_tarefas set id_status = :id_status where id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":id_status", $this->tarefa->__get("id_status"));
            $stmt->bindValue(":id", $this->tarefa->__get("id"));
            return $stmt->execute();
        }

        public function pendentes(){ // Read
            // Relação entre $tarefa.id_status e tb_status.id para podermos imprimir o status da tarefa na tela
            //$query = "select t.id, s.status, t.tarefa from tb_tarefas as t left join tb_status as s on (t.id_status = s.id)";

            $query = "select t.tarefa, t.id from tb_tarefas as t where id_status = 1";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }
    }

?>
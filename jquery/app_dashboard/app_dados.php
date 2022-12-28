<?php

// Classe dashboard
class Dashboard {

    public $clientesAtivos;
    public $clientesInativos;
    public $totalReclamacoes;
    public $totalElogios;
    public $totalSugestoes;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
        return $this;
    }

}

// Classe de conexão ao bd
class Conexao {
    private $host = "localhost";
    private $dbname = "dashboard";
    private $user = "root";
    private $pass = "";

    public function conectar(){
        try{

            $conexao = new PDO(
                "mysql:host=$this->host; dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            // Setando a coleção de caracteres em UTF-8 no banco de dados
            $conexao->exec("set charset utf8");

            return $conexao;

        }catch(PDOException $e){
            echo "<p>".$e->getMessage()."</p>";
        }
    }
}

// Classe model
class Bd {
	private $conexao;
	private $dashboard;

	public function __construct(Conexao $conexao, Dashboard $dashboard) {
		$this->conexao = $conexao->conectar();
		$this->dashboard = $dashboard;
	}

    // Query para obter clientesAtivos
    public function getClientesAtivos() {
		$query = 'select count(*) as clientes_ativos from tb_clientes where cliente_ativo > 0';

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->clientes_ativos;
	}

    // Query para obter clientesInativos
    public function getClientesInativos() {
		$query = 'select count(*) as clientes_inativos from tb_clientes where cliente_ativo <= 0';

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->clientes_inativos;
	}

    // Query para obter totalReclamacoes
    public function getTotalReclamacoes() {
		$query = 'select count(*) as total_reclamacoes from tb_contatos where tipo_contato = 1';

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_reclamacoes;
	}

    // Query para obter totalElogios
    public function getTotalElogios() {
		$query = 'select count(*) as total_elogios from tb_contatos where tipo_contato = 2';

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_elogios;
	}

    // Query para obter totalSugestoes
    public function getTotalSugestoes() {
		$query = 'select count(*) as total_sugestoes from tb_contatos where tipo_contato = 3';

		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_sugestoes;
	}


}

// Lógica do Script
$dashboard = new Dashboard();

$conexao = new Conexao();

$bd = new Bd($conexao, $dashboard);

$dashboard->__set("clientesAtivos", $bd->getClientesAtivos());
$dashboard->__set("clientesInativos", $bd->getClientesInativos());
$dashboard->__set("totalReclamacoes", $bd->getTotalReclamacoes());
$dashboard->__set("totalElogios", $bd->getTotalElogios());
$dashboard->__set("totalSugestoes", $bd->getTotalSugestoes());

// Envio de $dashboard em json para o front-end da aplicação
echo json_encode($dashboard);

//print_r($ano."/".$mes."/".$dias_do_mes);

?>
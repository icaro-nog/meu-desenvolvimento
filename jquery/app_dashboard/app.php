<?php

// Classe dashboard
class Dashboard {

    public $data_inicio;
    public $data_fim;
    public $numeroVendas;
    public $totalVendas;

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

	public function getNumeroVendas() {
		$query = 'select count(*) as numero_vendas from tb_vendas where data_venda between :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get("data_inicio"));
		$stmt->bindValue(':data_fim', $this->dashboard->__get("data_fim"));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
	}

    public function getTotalVendas() {
		$query = 'select SUM(total) as total_vendas from tb_vendas where data_venda between :data_inicio and :data_fim';

		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_inicio', $this->dashboard->__get("data_inicio"));
        $stmt->bindValue(':data_fim', $this->dashboard->__get("data_fim"));
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
	}
}

// Lógica do Script
$dashboard = new Dashboard();

$conexao = new Conexao();

$bd = new Bd($conexao, $dashboard);

// $_GET["competencia"] setado no select do front-end id="competencia"
// explode() para remoção de caractere - e separação de ano e mes
$competencia = explode("-", $_GET["competencia"]);
$ano = $competencia[0];
$mes = $competencia[1];

// Função para verificar quantos dias há no mes e ano setados
$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

$dashboard->__set("data_inicio", $ano."-".$mes."-01");
$dashboard->__set("data_fim", $ano."-".$mes."-".$dias_do_mes);

$dashboard->__set("numeroVendas", $bd->getNumeroVendas());
$dashboard->__set("totalVendas", $bd->getTotalVendas());

// Envio de $dashboard em json para o front-end da aplicação
echo json_encode($dashboard);

//print_r($ano."/".$mes."/".$dias_do_mes);

?>
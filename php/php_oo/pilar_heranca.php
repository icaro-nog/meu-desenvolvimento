<?php
    
    class Carro extends Veiculo{

        public $teto_solar = true;

        function __construct($placa, $cor){
            $this->placa = $placa;
            $this->cor = $cor;

        }

        function abrirTetoSolar(){
            echo "Abrir teto solar";
        }

        function alterarPosicaoVolante(){
            echo "Alterar posição volante";
        }


    }

    class Moto extends Veiculo{

        public $contraPesoGuidao = true;

        function __construct($placa, $cor){
            $this->placa = $placa;
            $this->cor = $cor;

        }

        function empinar(){
            echo "Empinar";
        }
    }

    class Veiculo{

        public $placa = null;
        public $cor = null;

        function acelerar(){
            echo "Acelerar";
        }

        function frear(){
            echo "Frear";
        }
    }


    $carro = new Carro("ABC123", "Rosa");
    $moto = new Moto("DEF456", "Amarelo");

    echo "<pre>";
    print_r($carro);

    echo "<br>";

    print_r($moto);
    echo "</pre>";

    echo "<hr>";

    $carro->abrirTetoSolar();
    echo "<br>";
    // Métodos herdado da class Veiculo
    $carro->acelerar();
    echo "<br>";
    $carro->frear();

    
    echo "<hr>";

    $moto->empinar();
    echo "<br>";
    // Métodos herdado da class Veiculo
    $moto->acelerar();
    echo "<br>";
    $moto->frear();



?>
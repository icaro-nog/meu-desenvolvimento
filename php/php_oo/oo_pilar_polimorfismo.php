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

        // Método sobreescrito da clas Veiculo
        function trocarMarcha(){
            echo "Desengatar embreagem com a mão e engatar marcha com o pé";

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

        function trocarMarcha(){
            echo "Desengatar embreagem com o pé e engatar marcha com a mão";

        }
    }

    class Caminhao extends Veiculo{

        function __construct($placa, $cor){
            $this->placa = $placa;
            $this->cor = $cor;

        }
        
    }

    $carro = new Carro("ABC123", "Rosa");
    $moto = new Moto("DEF456", "Amarelo");
    $caminhao = new Caminhao("GHI789", "Azul");

    $carro->trocarMarcha();
    echo "<hr>";

    // Método sobreescrito na própria classe do objeto
    $moto->trocarMarcha();
    echo "<hr>";
    
    $caminhao->trocarMarcha();
    echo "<br>";
    echo $caminhao->cor;


?>
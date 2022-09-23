<?php
    // Modelo de classe
    class Funcionario{

        // Atributos
        public $nome = "José";
        public $telefone = "51 99999-8888";
        public $numFilhos = 2;


        // Métodos
        function resumirCadFunc(){
            // Este método tem return, pois ele mostra ao usuário alguma informação
            return "$this->nome possui $this->numFilhos filhos(s)";
        }

        function modificarNumFilhos($numFilhos){
            // Este método não precisa de retorno, pois apenas modifica um dos atributos e não tem retorno VISUAL ao usuário
            $this->numFilhos = $numFilhos;

        }

    }

    $y = new Funcionario();
    echo $y->resumirCadFunc();
    echo "<br>";
    $y->modificarNumFilhos(3);
    echo $y->resumirCadFunc();

    echo "<hr>";

    $x = new Funcionario();
    echo $x->resumirCadFunc();
    echo "<br>";
    $x->modificarNumFilhos(8);
    echo $x->resumirCadFunc();



?>
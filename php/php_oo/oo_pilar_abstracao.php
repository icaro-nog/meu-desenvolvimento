<?php
    // Modelo de classe
    class Funcionario{

        // Atributos
        public $nome = null;
        public $telefone = null;
        public $numFilhos = null;
        public $cargo = null;
        public $salario = null;

        // Overloading / Sobrecarregar
        function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        function __get($atributo){
            return $this->$atributo;
        }

        // Métodos Getters e Setters
        /*
        function setNome($nome){
            $this->nome = $nome;
        }
        function setNumFilhos($numFilhos){
            $this->numFilhos = $numFilhos;
        }
        function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        function getNome(){
            return $this->nome;
        }
        function getNumfilhos(){
            return $this->numFilhos;
        }
        function getTelefone(){
            return $this->telefone;
        }
        */

        // Métodos
        function resumirCadFunc(){
            // Este método tem return, pois ele mostra ao usuário alguma informação
            return $this->__get("nome") . " possui " . $this->__get("numFilhos") . " filhos(s)." . " Telefone: " . $this->__get("telefone") . " e Salário: " . $this->__get("salario");
        }

        function modificarNumFilhos($numFilhos){
            // Este método não precisa de retorno, pois apenas modifica um dos atributos e não tem retorno VISUAL ao usuário
            $this->numFilhos = $numFilhos;

        }

    }

    $y = new Funcionario();
    $y->__set("nome", "José");
    $y->__set("telefone", "51 99999 8888");
    $y->__set("numFilhos", 8);
    $y->__set("cargo", "Marinheiro");
    $y->__set("salario", 0.3);
    echo $y->__get("nome") . " possui " . $y->__get("numFilhos") . " filhos(s)." . " Telefone: " . $y->__get("telefone") . " e Salário: " . $y->__get("salario");

    echo "<hr>";

    $x = new Funcionario();
    $x->__set("nome", "Maria");
    $x->__set("telefone", "51 99999 7777");
    $x->__set("numFilhos", 20);
    $x->__set("cargo", "Programador");
    $x->__set("salario", 999999);
    // Pode ser feito desta forma também
    echo $x->resumirCadFunc();


?>
<?php

    namespace A;
    // \B\ Referenciando qual interface(implements) será usada na class
    class Cliente implements \B\CadastroInterface{

        public $nome = "Ícaro";

        public function __construct(){

            echo "<pre>";
            print_r(get_class_methods($this));
            echo "</pre>";
        }

        public function __get($attr){

            return $this->$attr;
        }
        public function salvar(){

            echo "Salvar";
        }
        public function remover(){

            echo "Remover";
        }
    }

    interface CadastroInterface{

        public function salvar();
    }

    namespace B;
    // \A\ Referenciando qual interface(implements) será usada na class
    class Cliente implements \A\CadastroInterface{

        public $nome = "Gabriel";

        public function __construct(){

            echo "<pre>";
            print_r(get_class_methods($this));
            echo "</pre>";
        }

        public function __get($attr){
            
            return $this->$attr;
        }
        public function remover(){

            echo "Remover";
        }
        public function salvar(){

            echo "Salvar";
        }
    }

    interface CadastroInterface{

        public function remover();
    }

    // \...\ Para referenciar o Namespace, assim indicando de qual namespace será instanciado o objeto, nesse caso A ou B
    $c = new \B\Cliente();
    print_r($c);
    echo "<br>";
    echo $c->__get("nome");

?>
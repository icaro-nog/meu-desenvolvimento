<?php
    
    class Pessoa{

        public $nome = null;

        function __construct($nome){

            echo "objeto iniciado";
            $this->nome = $nome;
        }

        function __destruct(){
            echo "Objeto removido!";
        }

        function __get($atributo){

            return $this->$atributo;
        }

        function correr(){
            return $this->nome . " está correndo";
        }
    }

    $pessoa = new Pessoa("Ícaro");
    echo "<br> Nome: " . $pessoa->__get("nome");
    echo "<br>" . $pessoa->correr();

    echo "<br>";
    // O comando unset apaga uma variável especifica, limpando assim a informação da memória
    // Mesmo que unset seja comentado, o método __destruct() será executado ao final do ciclo do objeto, apagando o mesmo da memória
    unset($pessoa);

    // Objeto já removido da memória da aplicação
    echo "<br> Nome: " . $pessoa->__get("nome"); 

?>
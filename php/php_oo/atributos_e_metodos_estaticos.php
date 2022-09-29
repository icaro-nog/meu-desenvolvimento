<?php

    class Exemplo{

        public static $atributo1 = "Eu sou um atributo estático";
        public static $atributo2 = "Eu sou um atributo normal";

        public static function metodo1(){
            echo "Eu sou um método estático";
        }

        public function metodo2(){
            echo "Eu sou um método normal";
        }



    }

    // Para métodos e atributos estáticos, não há necessidade de se instanciar uma classe para poder acessá-los
    // $x = new Exemplo();

    // :: Operador de Resolução de Escopo para acessar atributos e métodos estáticos
    // Não é possível acessar com $this ou ->
    echo Exemplo::$atributo1;
    echo "<br>";
    Exemplo::metodo1();

?>
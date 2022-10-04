<?php

    class MinhaExceptionCustomizada extends Exception{

        private $erro = "";

        public function __construct($erro){

            $this->erro = $erro;
        }

        public function exibirMensagemErroCustomizada(){

            echo "<div style='border: 1px solid black; padding: 15px; color: white; background-color: red;'>";
                echo $this->erro;
            echo "</div>";
        }
    }

    try{

        // Lançando MinhaExceptionCustomizada para o Catch poder exibir
        throw new MinhaExceptionCustomizada("Esse é um erro de teste");


        // Error -> Utilizado mais para testes, não em aplicações reais
        // Exception -> Utilizado em aplicações reais, por programadores
        // Customizadas -> Utilizado em aplicações reais, por programadores, caso seja necessário customizar algum erro

    }catch(MinhaExceptionCustomizada $e){
        // o método exibirMensagemErroCustomizada pode ser acessado, por conta do extends que há na class MinhaExceptionCustomizada
        $e->exibirMensagemErroCustomizada();
    }

?>
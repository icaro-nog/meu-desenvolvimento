<?php

    //print_r($_POST["assunto"]);

    class Mensagem{

        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __get($atributo){
,
            return $this->$atributo;
        }

        public function __set($atributo, $valor){

            $this->$atributo = $valor;
        }

        public function mensagemValida(){
            
            // Empty para verificar se a variável está vazia null
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){

                return false;
            }

            return true;
        }
    }

    $mensagem = new Mensagem();

    $mensagem->__set("para", $_POST["para"]);
    $mensagem->__set("assunto", $_POST["assunto"]);
    $mensagem->__set("mensagem", $_POST["mensagem"]);

    /*
    echo "<pre>";
    print_r($mensagem);
    echo "</pre>";
    */

    if($mensagem->mensagemValida()){

        echo "Mensagem é válida";
    }else{

        echo "Mensagem não é válida";
    }

?>
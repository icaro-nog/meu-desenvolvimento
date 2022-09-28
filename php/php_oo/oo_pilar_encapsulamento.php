<?php
    
    class Pai{
        
        private $nome = "Ícaro";
        protected $sobrenome = "Nogueira";
        public $humor = "Alegre";

        public function __get($attr) {
            return $this->$attr;
        }

        public function __set($attr, $value){
            $this->$attr = $value;

        }

        private function executarMania(){
            echo "Assoviar";
        }

        protected function responder(){
            echo "Oi";
        }

        public function executarAcao(){
            $x = rand(1, 10);

            if($x >= 1 && $x <= 5){
                // Acessando método private
                $this->executarMania();
            }else{
                // Acessando método protected
                $this->responder();
            }
        }
    }

    class Filho extends Pai{

        public function __construct(){
            
            // Exibir os métodos do objeto
            echo "<pre>";
            print_r(get_class_methods($this));
            echo "</pre>";

        }

        // Método desconsiderado, pois o prevalecente no contexto é o do Pai
        private function executarMania(){
            echo "Cantar";
        }

        // Está sendo herdado e ao mesmo tempo sobreescrito no método executarAcao()
        protected function responder(){
            echo "Olá";
        }

        // Assim ele será executado
        public function x(){
            $this->executarMania();
        }
    }

    $pai = new Pai();

    // Com o método public, é possível acessar outros métodos privados e protegidos
    // echo $pai->executarAcao();

    //echo $pai->sobrenome;

    // $pai->__set("sobrenome", "Lemos");
    // Utilizando o método mágico __get o PHP já entende que não é necessário fazer $pai->__get($attr) para exibir o atributo
    // echo $pai->sobrenome;

    $filho = new Filho();
    echo "<pre>";
    print_r($filho);
    echo "</pre>";
   
    // Acessando métodos protected private
    echo $filho->executarAcao();
    echo "<br>";

    echo $filho->x();
    
    // Após o get_class_methods a class Filho tem acesso aos dados protected e private do objeto Pai
    /*
    echo $filho->__get("nome");
    echo "<br>";
    $filho->__set("nome", "Maicon");
    echo $filho->__get("nome");
    */


?>
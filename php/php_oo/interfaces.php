<?php

    /* Uma interface é uma estrutura que define uma lista de métodos que devem existir em uma classe. As interfaces são uma boa maneira de permitir que muitas classes diferentes sejam usadas da mesma maneira */
    // Para grandes equipes de desenvolvimento, é importante o uso, pois padroniza os nomes que serão utilizados em métodos
    interface EquipamentoEletronicoInterface{

        public function ligar();
        public function desligar();
    }

    // -------------------------------------

    class Geladeira implements EquipamentoEletronicoInterface{

        public function abrirPorta(){
            echo "Abrir porta";
        }

        public function ligar(){
            echo "Ligar";
        }

        public function desligar(){
            echo "Desligar";
        }

    }

    class TV implements EquipamentoEletronicoInterface{
        
        public function trocarCanal(){
            echo "Trocar canal";
        }

        public function ligar(){
            echo "Ligar";
        }

        public function desligar(){
            echo "Desligar";
        }

    }

    $x = new Geladeira();
    $y = new TV();

    // -------------------------

    interface MamiferoInterface{
        
        public function respirar();
    }
    interface TerresteInterface{
        
        public function andar();
    }
    interface AquaticoInterface{
        
        public function nadar();
    }

    class Humano implements MamiferoInterface, TerresteInterface{

        public function andar(){
            echo "Andar";
        }

        public function respirar(){
            echo "Respirar";
        }

        public function conversar(){
            echo "Conversar";
        }

    }

    class Baleia implements MamiferoInterface, AquaticoInterface{

        public function respirar(){
            echo "Respirar";
        }

        public function nadar(){
            echo "Nadar";
        }

        protected function esguichar(){
            echo "Esguichar";
        }

    }

    // -----------------------------------------------------------

    interface AnimalInterface{
        
        public function comer();
    }

    interface AveInterface extends AnimalInterface{
        
        public function voar();
    }

    class Papagaio implements AveInterface{

        public function voar(){
            echo "Voar";
        }
        public function comer(){
            echo "Comer";
        }

    }
?>
<?php

    namespace App;

    // PHP não estava utilizando classes nativas, uses foram inseridos para corrigir este erro
    use PDO;
    use PDOException;

    class Connection {

        // Pela função estar com o atributo static, conseguimos chamar ela dessa forma na instância - Connection::getDb()
        public static function getDb(){
            try{
                $conn = new PDO(
                    "mysql:host=localhost;dbname=mvc;charset=utf8",
                    "root",
                    ""
                );

                return $conn;

            }catch (PDOException $e){
                // Recuperando mensagem de erro por meio do getMessage()
                echo "<p>".$e->getMessage()."</p>";
            }
        }
    }

?>
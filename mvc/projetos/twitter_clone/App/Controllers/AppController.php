<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

    public function timeline() {

        session_start();

        if($_SESSION["id"] != "" && $_SESSION["nome"] != ""){

            $this->render("timeline");
            /*
            echo "Chegamos a timeline";
            echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";
            */

        }else{

            header("Location: /?login=erro");
        }

    }
}

?>
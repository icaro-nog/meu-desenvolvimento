<?php

    session_start();

    // Variável que verifica se a autenticação foi realizada
    $usuario_autenticado = false;

    // Usuários do sistema
    $usuarios_app = [
        ["email" => "adm@teste.com.br", "senha" => "123456"],
        ["email" => "user1@teste.com.br", "senha" => "abcd"],

    ];

    /*
    echo "<pre>";
    print_r($usuarios_app);
    echo "</pre>";
    */

    foreach($usuarios_app as $user){
       /* Printando os arrays de $usuarios_app - cada $user será um array */
       /* print_r($user); */

       /* Autenticando usuário */
       if($user["email"] == $_POST["email"] && $user["senha"] == $_POST["senha"]){
            $usuario_autenticado = true;
       }
    }

    if($usuario_autenticado){
        echo "Usuário autenticado";
        $_SESSION["autenticado"] = "SIM";
    }else{
        header("Location: index.php?login=erro");
        $_SESSION["autenticado"] = "NAO";
    }

    /*
    print_r($_GET);

    echo "<br>";

    echo $_GET["email"];
    echo "<br>";
    echo $_GET["senha"];
    */

    
    /* Dados vindos do formulário na Index */ 
    /*
    print_r($_POST);

    echo "<br>";

    echo $_POST["email"];
    echo "<br>";
    echo $_POST["senha"];
    */
    /* Fim Dados vindos do formulário na Index */ 
?>
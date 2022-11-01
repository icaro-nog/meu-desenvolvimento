<?php

    if(!empty($_POST["usuario"]) && !empty($_POST["senha"])){

        $dsn = "mysql:host=localhost; dbname=php_com_pdo";
        $usuario = "root";
        $senha = "";

        try{
            $conexao = new PDO($dsn, $usuario, $senha);

            $query = "select * from tb_usuarios where";
            // {} para passagem de bloco de código PHP em query SQL
            // .= para concatenar a varíavel 
            $query .= " email = '{$_POST['usuario']}' ";
            $query .= " AND senha = '{$_POST["senha"]}' ";

            echo $query;

            $stmt = $conexao->query($query);
            $usuario = $stmt->fetch();
            echo "<hr>";
            
            echo "<pre>";
            print_r($usuario);
            echo "</pre>";

        }catch(PDOException $e){
            
            echo "Erro: ".$e->getCode(). " Mensagem: ".$e->getMessage();
        }

    }

?>

<html>

    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>

    <body>

    <form method="post" action="index.php">
        <input type="text" placeholder="Usuário" name="usuario">
        <br>
        <input type="password" placeholder="Senha" name="senha">
        <br>

        <button type="submit"> Entrar </button>
    </form>

    </body>
</html>
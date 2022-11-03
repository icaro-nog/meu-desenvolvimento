<?php

    if(!empty($_POST["usuario"]) && !empty($_POST["senha"])){

        $dsn = "mysql:host=localhost; dbname=php_com_pdo";
        $usuario = "root";
        $senha = "";

        try{
            $conexao = new PDO($dsn, $usuario, $senha);

            $query = "select * from tb_usuarios where ";
            // Variável de forma indireta
            $query .= " email = :usuario ";
            $query .= " AND senha = :senha ";

            $stmt = $conexao->prepare($query);

            // Declaração de variável de forma indireta para não ocorreer SQL Injection
            $stmt->bindValue(':usuario', $_POST['usuario']);
            $stmt->bindValue(':senha', $_POST['senha']);

            $stmt->execute();

            $usuario = $stmt->fetch();

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
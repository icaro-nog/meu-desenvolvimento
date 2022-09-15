<?php

    session_start();

    /*
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    
    // Remover índices do array de sessão
    // unset()

    unset($_SESSION["x"]); // Remove o índice apenas se ele existir

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    // Destruir a variação de sesssão
    // session_destroy()

    session_destroy(); // A Sessão será destruída, porém, apenas após a página ser recarregada. Por isso é necessário forçar um redirecionamento após a session_destroy()


    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    */

    session_destroy(); // Sessão destruída
    header("Location: index.php"); // Redirecionamento
?>
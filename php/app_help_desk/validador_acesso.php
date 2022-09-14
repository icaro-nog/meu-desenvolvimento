<?php
  /* Função para não permitir que usuário acesse páginas home.php, abrir_chamado.php e consultar_chamado.php */

  session_start();

  /* ! para verificar se NÃO existe a $_SESSION["autenticado"] */
  /* Função nativa IS SET, verificar se está setado */
  if(!isset($_SESSION["autenticado"]) || $_SESSION["autenticado"] != "SIM"){
    header("Location: index.php?login=erro2");
  }
?>
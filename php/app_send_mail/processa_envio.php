<?php

    /* E-mail utilizado para testes: webcompleto50@gmail.com - !@#$1234 */

    // Require de bibliotecas PHPMailer que foram transferidas para fora do diretório público
    require "../../../../app_send_mail/bibliotecas/PHPMailer/Exception.php";
    require "../../../../app_send_mail/bibliotecas/PHPMailer/SMTP.php";
    require "../../../../app_send_mail/bibliotecas/PHPMailer/PHPMailer.php";
    require "../../../../app_send_mail/bibliotecas/PHPMailer/OAuth.php";
    require "../../../../app_send_mail/bibliotecas/PHPMailer/POP3.php";

    // Script para proteger o index.php -> Caminho feito C:\xampp\htdocs\app_send_mail para se chegar ao arquivo processa_envio.php
    // Pasta app_send_mail/valida_login.php foi transferida para fora do diretório htdocs por questões de segurança
    require "../../../../app_send_mail/processa_envio.php"

?>
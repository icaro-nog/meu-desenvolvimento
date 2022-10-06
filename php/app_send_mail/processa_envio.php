<?php

    /* E-mail utilizado para testes: webcompleto50@gmail.com - !@#$1234 */

    require "./bibliotecas/PHPMailer/Exception.php";
    require "./bibliotecas/PHPMailer/SMTP.php";
    require "./bibliotecas/PHPMailer/PHPMailer.php";
    require "./bibliotecas/PHPMailer/OAuth.php";
    require "./bibliotecas/PHPMailer/POP3.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //print_r($_POST["assunto"]);

    class Mensagem{

        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __get($atributo){

            return $this->$atributo;
        }

        public function __set($atributo, $valor){

            $this->$atributo = $valor;
        }

        public function mensagemValida(){
            
            // Empty para verificar se a variável está vazia -> null
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){

                return false;
            }

            return true;
        }
    }

    $mensagem = new Mensagem();

    $mensagem->__set("para", $_POST["para"]);
    $mensagem->__set("assunto", $_POST["assunto"]);
    $mensagem->__set("mensagem", $_POST["mensagem"]);

    /*
    echo "<pre>";
    print_r($mensagem);
    echo "</pre>";
    */

    // Caso a função mensagemValida() retorne false, o ! inverte e torna true e vice-versa fazendo com que seja exibido o echo abaixo ou não
    if(!$mensagem->mensagemValida()){

        echo "Mensagem não é válida";
        die();// Encerra o processamento do Script após o echo
    }

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Link copiado de https://support.google.com/a/answer/176600?hl=pt#zippy=%2Cusar-o-servidor-smtp-do-gmail
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'webcompleto50@gmail.com';                     //SMTP username
        $mail->Password   = 'zzoqrtzuobopbcbz';                               //SMTP password
        $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('webcompleto50@gmail.com', 'Web Completo Remetente'); // Remetente
        $mail->addAddress('webcompleto50@gmail.com', 'Web Completo Destinatário');     // Adicionar destinatário
        // $mail->addAddress('ellen@example.com');               // Adicionar mais destinatários se for necessário
        // $mail->addReplyTo('info@example.com', 'Information'); // Adicionar destinatário para receber repostas do addAddress destinatário
        // $mail->addCC('cc@example.com');          // Adicionar destinatários de cópia
        // $mail->addBCC('bcc@example.com');        // Adicionar destinatários de cópia oculta

        // Adicionar anexos ao e-mail enviado
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Oi, eu sou o assunto deste e-mail!';
        $mail->Body    = 'Oi, eu sou o conteúdo do <strong>e-mail</strong>!';
        $mail->AltBody = 'Oi, eu sou o conteúdo do e-mail!';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Não foi possível enviar este e-mail. Tente novamente mais tarde! Detalhes do erro: {$mail->ErrorInfo}";
    }

?>
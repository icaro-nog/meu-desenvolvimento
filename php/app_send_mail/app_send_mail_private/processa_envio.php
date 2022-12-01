<?php

    session_start();

    /* E-mail utilizado para testes: webcompleto50@gmail.com - !@#$1234 */

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //print_r($_POST["assunto"]);

    class Mensagem{

        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = ["codigo_status" => null, "descricao_status" => ""];

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
        header("Location: index.php?acesso_indevido=erro");
        // die();// Encerra o processamento do Script após o echo
    }

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Link copiado de https://support.google.com/a/answer/176600?hl=pt#zippy=%2Cusar-o-servidor-smtp-do-gmail
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'webcompleto50@gmail.com';                     //SMTP username
        $mail->Password   = 'zzoqrtzuobopbcbz';                               //SMTP password
        $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('webcompleto50@gmail.com', 'Web Completo Remetente'); // Remetente
        $mail->addAddress($mensagem->__get("para"));     // Adicionar destinatário
        // $mail->addAddress('ellen@example.com');               // Adicionar mais destinatários se for necessário
        // $mail->addReplyTo('info@example.com', 'Information'); // Adicionar destinatário para receber repostas do addAddress destinatário
        // $mail->addCC('cc@example.com');          // Adicionar destinatários de cópia
        // $mail->addBCC('bcc@example.com');        // Adicionar destinatários de cópia oculta

        // Adicionar anexos ao e-mail enviado
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mensagem->__get("assunto");
        $mail->Body    = $mensagem->__get("mensagem");
        // o AltBody é um body alternativo, caso o Body não seja suportado pelo client de e-mail do destinatário
        $mail->AltBody = 'É necesssário utilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem!';

        $mail->send();

        $mensagem->status["codigo_status"] = 1;
        $mensagem->status["descricao_status"] = "E-mail enviado com sucesso!";

    } catch (Exception $e) {

        $mensagem->status["codigo_status"] = 2;
        $mensagem->status["descricao_status"] = "Não foi possível enviar este e-mail. Tente novamente mais tarde! Detalhes do erro: {$mail->ErrorInfo}";
    }
    
    // Se quiser, pode ser feita alguma lógica que armazene o erro para posterior análise pelo programador
?>

<!-- Forma de apresentar ao usuário final algum feedback de sucesso ou de erro no envio do e-mail -->
<html>
    <head>
        <meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <div class="col-12">

            <div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>
            
                <?php
                    // Se o envio deu certo, irá exibir essas tags HTML
                    if(($mensagem->status["codigo_status"] == 1)){
                        echo "<div class='container'>
                                <h1 class='display-4 text-success'> Sucesso </h1>
                                <p> {$mensagem->status['descricao_status']} </p>
                                <a href='index.php' class='btn btn-success btn-lg mb-5 text-white'> Voltar </a>
                            </div>";
                    }
                    
                    // Se o envio deu errado, irá exibir essas tags HTML
                    if($mensagem->status["codigo_status"] == 2){
                        echo "<div class='container'>
                                <h1 class='display-4 text-danger'> Ops... </h1>
                                <p> {$mensagem->status['descricao_status']} </p>
                                <a href='index.php' class='btn btn-success btn-lg mb-5 text-white'> Voltar </a>
                            </div>";
                    }
                ?>
            
            </div>
        </div>

    </body>
</html>
<!-- Fim /Forma de apresentar ao usuário final algum feedback de sucesso ou de erro no envio do e-mail -->
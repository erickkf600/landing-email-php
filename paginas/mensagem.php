<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "assets/vendor/autoload.php";
$link = 'http://localhost:8080/#contato';
session_start();
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$nome = $post['nome'];
$email = $post['email'];
$motivo = $post['motivo'];
$mensagem = $post['mensagem'];

    //VALIDADOR DE CAMPOS
if (empty($nome)) {
	$_SESSION['nome_vazio'] = "Preencha o campo nome*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}
if (empty($email)) {
	$_SESSION['email_vazio'] = "Preencha o campo email*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}
if (empty($email)) {
	$_SESSION['telefone_vazio'] = "Preencha o campo telefone*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}
if (empty($motivo)) {
	$_SESSION['motivo_vazio'] = "Digite o motivo do contato*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}
if (empty($mensagem)) {
	$_SESSION['mensagem_vazio'] = "Digite sua mensagem*";
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
}

	//ENVIAR A MENSAGEM
if (isset($post)) {
  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
    $mail->SMTPDebug = 2;     
    $mail->Debugoutput = 'html';                            // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'erickkf600@gmail.com';                 // SMTP username
    $mail->Password = '27638177';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $motivo);
    $mail->addAddress('erickkf600@gmail.com', $nome);     // Add a recipient           // Name is optional

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $motivo;
    $mail->Body    = 
    "<p>$nome entrou em contato com você pelo site</p>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Email:</strong> $email</p>  
    <p><strong>MENSAGEM:</strong></p>
    <p>$mensagem</p>";
    $mail->AltBody = $mensagem;

    $mail->send();
    $_SESSION['email_enviado'] = "Sua Mensagem foi enviado com sucesso.";
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
	} catch (Exception $e) {
	$_SESSION['email_erro'] = "Ocorreu um Erro no envio.". $mail->ErrorInfo;
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=$link'>";
	}

}

?>
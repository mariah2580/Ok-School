<?php

header('Content-Type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'] ?? 'Não informado';
    $mensagem = $_POST['mensagem'];

    $mail = new PHPMailer(true);
    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'mariah.santos2580@gmail.com'; 
        $mail->Password = 'xbfa cvzo shfa phxh'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('mariah.santos2580@gmail.com', 'Nome do Seu Site');
        $mail->addAddress('okschoolplataformadigital@gmail.com'); 


        $mail->isHTML(true);
        $mail->Subject = "Contato do site - $nome";
        $mail->Body = "Nome: $nome<br>Email: $email<br>Telefone: $telefone<br><br>Mensagem:<br>$mensagem";

        $mail->send();
        echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => "Falha no envio da mensagem: {$mail->ErrorInfo}"]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de envio inválido.']);
}
?>

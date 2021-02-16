<?php
use PHPMailer\PHPMailer\PHPMailer;
function enviarCorreu($correu,$text)
{

    require 'vendor/autoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();

    //Configuració del servidor de Correu
    //Modificar a 0 per eliminar msg error
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    //Credencials del compte GMAIL
	// dades de correus
    $mail->Username = '';
    $mail->Password = '';

    //Dades del correu electrònic
    $mail->SetFrom('imagines@activationCode.com', 'Test');
    $mail->Subject = 'Benvingut a Imaginest';
    $mail->MsgHTML($text);
    //$mail->addAttachment("fitxer.pdf");

    //Destinatari
    $address = $correu;
    $mail->AddAddress($address, 'Benvingut a Imaginest3');

    //Enviament
    $mail->Send();
    header('Location: index.php');
}

<?php $mail='contacto@byctel.cl'; 

$name = $_POST['name'];
$apel = $_POST['apel'];
$email = $_POST['email'];
$comentario = $_POST['comentario']; 

$thank = "index.html";
$asunto="CONSULTA";  

//cuerpo del mensaje
$mensaje = "Nombre y apellido: " . $name . " " . $apel . " \r\n";
$mensaje .= "Su e-mail es: " . $email . " \r\n";
$mensaje .= "Detalle del comentario: " . $comentario. " \r\n";
$mensaje .= "Este mensaje fue enviado el " . date('d/m/Y', time());

$para = 'contacto@byctel.cl';
$asunto = 'Consulta o comentario';
$headers .= "From: " . $email . "\r\nReply-To: " . $email . "\r\nReturn-Path: " . $email . "\r\n";


if (mail($para, $asunto, utf8_decode($mensaje), $header))  Header ("Location: $thank");
 ?> 
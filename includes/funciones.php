<?php 


define("mailremitente", "in_fo_bit@hotmail.com");
define("maildestinatarioconsultas", "in_fo_bit@hotmail.com");
define("rutalocal", "");

//***************************************************
//***************************************************
//***************************************************
//***************************************************

$tablerow_count=0;

function tablerowswitch() {
	global $tablerow_count;
	$tablerow_count++;
	if ($tablerow_count % 2) {
	return "trFila1";
	}
	else {
	return "trFila2";
	}
}

function EnvioCorreoHTML($remitente, $destinatario, $contenido, $asunto)
{

	$mensaje = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><img src="http://www.webdecolegios.com/images/logo.png" /></td>
  </tr>
  <tr>
    <td><p>Estimado Cliente:</p>
    <p>';
	$mensaje.= $contenido;
	$mensaje.='</p></td>
  </tr>
  <tr>
    <td>Muchas gracias, puede contactarnos a través de nuestro correo electrónico:<br />      <a href="mailto:jorvidu@gmail.com">jorvidu@gmail.com</a></td>
  </tr>
</table>
</body>
</html>';

	// Para enviar correo HTML, la cabecera Content-type debe definirse
	
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\n";
	// Cabeceras adicionales
	$cabeceras .= 'From: '.$remitente.'\n';
	//$cabeceras .= 'Bcc: info@tiendazapatos.com' . "\n";
	
	// Enviarlo
	//mail($destinatario, $asunto, $mensaje, $cabeceras);
	//echo $mensaje;
	
/*	include("includes/class.phpmailer.php");
	include("includes/class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
///////$mail->SMTPSecure = "ssl";

$mail->Host = "ayzweb.com";
$mail->Port = 25;
$mail->Username = "noresponder@ayzweb.com";
$mail->Password = "wedfkh2487jh2eg";

$mail->From = "noresponder@ayzweb.com";
$mail->FromName = "Tienda Zapatos 2";
$mail->Subject = $asunto;
$mail->AltBody = "Informacion de tiendazapatos";
$mail->MsgHTML($mensaje);

$mail->AddAddress($destinatario, "Destinatario");
$mail->IsHTML(true);


if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Mensaje enviado.";
}*/
	
}

function DateToQuotedMySQLDate($Fecha) 
{ 
$Parte1 = substr($Fecha, 0, 10);
$Parte2 = substr($Fecha, 10, 18);

if ($Parte1<>""){ 
   $trozos=explode("/",$Parte1,3); 
   return $trozos[2]."-".$trozos[1]."-".$trozos[0].$Parte2; } 
else 
   {return "NULL";} 
} 

function MySQLDateToDateHORA($MySQLFecha) 
{ 
if (($MySQLFecha == "") or ($MySQLFecha == "0000-00-00") ) 
    {return "";} 
else 
    {return date("H:i",strtotime($MySQLFecha));} 
} 

function MySQLDateToDateDIA($MySQLFecha) 
{ 
if (($MySQLFecha == "") or ($MySQLFecha == "0000-00-00") ) 
    {return "";} 
else 
    {return date("d/m/Y",strtotime($MySQLFecha));} 
	}
//FUNCION BASE DE SELECCION PARA EL ARCHIVO FUNCIONES:
function ObtenerNombreZona($identificador)
{

	global $database_conexion, $conexion;
	mysql_select_db($database_conexion, $conexion);
	$query_ConsultaFuncion = sprintf("SELECT Zona FROM zona WHERE idZona = %s", $identificador);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexion) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['Zona']; 
	mysql_free_result($ConsultaFuncion);
}
//OBTENER EL NOMBRE DEL CURSO DEL ALUMNO
function ObtenerCursoUsuario($identificador)
{
if($identificador==0)
return "Aviso para todos";
else{
	global $database_conexiontutorial, $conexiontutorial;
	mysql_select_db($database_conexiontutorial, $conexiontutorial);
	$query_ConsultaFuncion = sprintf("SELECT strCurso FROM tblcurso WHERE inContador = %s", $identificador);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexiontutorial) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['strCurso']; 
	mysql_free_result($ConsultaFuncion);
}
}
//Obtener ID Usuario
function ObtenerIdCursoUsuario($identificador)
{
	global $database_conexiontutorial, $conexiontutorial;
	mysql_select_db($database_conexiontutorial, $conexiontutorial);
	$query_ConsultaFuncion = sprintf("SELECT relCurso FROM tblusuario WHERE idContador= %s",$identificador);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexiontutorial) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['relCurso']; 
	mysql_free_result($ConsultaFuncion);
}


//FUNCION BASE DE SELECCION PARA VER EL NIVEL DEL USUARIO:
function ObtenerNivelUsuario($nivel)
{

	switch ($nivel) {
    case 1:
        return  "Superusuario";
        break;
    case 5:
        return "Profesor";
        break;
    case 10:
        return "Alumno";
        break;
}
}
/**********************************************************************************************************************************************************************************/
function MostrarAvisos()
{
	$cadenadeconsulta="";
	if (isset($_SESSION['Colegio_UserId']))
	{
		$idcursoactual = ObtenerIdCursoUsuario($_SESSION['Colegio_UserId']);
		$cadenadeconsulta = " OR (intCurso = ".$idcursoactual.") ";
	}

	global $database_conexiontutorial, $conexiontutorial;
	mysql_select_db($database_conexiontutorial, $conexiontutorial);
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblavisoprincipal WHERE (intEstado = 1) AND (intCurso=0  %s) ", $cadenadeconsulta);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexiontutorial) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	if ($totalRows_ConsultaFuncion>0)
	{
		do {
	echo '<div class="capaavisos">'.$row_ConsultaFuncion['strTitulo'].'</div>';
	
	}while ($row_ConsultaFuncion= mysql_fetch_assoc ($ConsultaFuncion));
	}
	mysql_free_result($ConsultaFuncion);
	}	
?>
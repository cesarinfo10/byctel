<?php require_once('../Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
/* if($_POST["formid"]==1){
  $insertSQL = sprintf("INSERT INTO tblfrecuentes (strTexto, fchFecha) VALUES (%s, NOW())",
                       GetSQLValueString(utf8_decode ($_POST['strTexto']), "text"));

  mysql_select_db($database_conexiontutorial, $conexiontutorial);
  $Result1 = mysql_query($insertSQL, $conexiontutorial) or die(mysql_error());
 echo"1";
 }*/
//************************************************************************************************************************************************************** 
 if($_POST["formid"]==2){
  $insertSQL = sprintf("INSERT INTO ordenvisita (Nombre, Telefono, Celular, Email, Codigo, Propiedad, datepicker, Horario, Mensaje) VALUES (%s,%s, %s,%s,%s, %s,%s,%s, %s)",
                       GetSQLValueString(utf8_decode ($_POST['Nombre']), "text"),					                       			                       GetSQLValueString($_POST['Telefono'], "text"),
					   GetSQLValueString($_POST['Celular'], "text"),
					   GetSQLValueString($_POST['Email'], "text"),
					   GetSQLValueString($_POST['Codigo'], "int"),
					   GetSQLValueString($_POST['Propiedad'], "text"),
					   GetSQLValueString($_POST['datepicker']), "text",
					   GetSQLValueString($_POST['Horario'], "text"),
					   GetSQLValueString(utf8_decode ($_POST['Mensaje']), "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
 
 /* $contenido='Nombre: '.utf8_decode($_POST['strNombre']).'<br>
  Nombre:' .utf8_decode($_POST['strEmail']).'<br>
  Nombre:' .utf8_decode($_POST['strConsulta']).'<br>';
  $asunto ='Consulta de la web tutoriales';
  
  EnvioCorreoHTML(utf8_decode($_POST['strEmail']), maildestinatarioconsultas, $contenido, $asunto);*/
  
 echo"1";
 }
 
 //************************************************************************************************************************************************************** 
 if($_POST["formid"]==3){
 mysql_select_db($database_conexiontutorial, $conexiontutorial);
$query_DatosFrecuentes = "SELECT * FROM tblusuario WHERE strEmail='".utf8_decode($_POST['strEmail'])."'";
$DatosFrecuentes = mysql_query($query_DatosFrecuentes, $conexiontutorial) or die(mysql_error());
$row_DatosFrecuentes = mysql_fetch_assoc($DatosFrecuentes);
$totalRows_DatosFrecuentes = mysql_num_rows($DatosFrecuentes);
if ($totalRows_DatosFrecuentes>0) echo"0";
else echo"1";
 }
?>
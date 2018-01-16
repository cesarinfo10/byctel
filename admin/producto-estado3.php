<?php require_once('../Connections/conexion.php');?>
<?php   
  if (isset($_GET['act'])) {
  $updateSQL = "UPDATE producto SET  Activo='$_GET[Activo]' WHERE idProducto='$_GET[varProp]'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
 echo ("<script type='text/javascript'> window.location.href='producto-lista.php'</script>");
}?>
<?php
ob_start();
  if (isset($_GET['ser'])) {
  $updateSQL = "UPDATE servicios SET  Activo='$_GET[Activo]' WHERE idServicios='$_GET[varSer]'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  $updateGoTo = "servicios-lista.php";
  header(sprintf("Location: %s", $updateGoTo));
  echo ("<script type='text/javascript'> window.location.href='producto-lista.php'</script>");
}?>
<?php
if ($_POST['Eliminar']) 
{foreach($_POST["IdsServicios"] as $IdsServicios)
 {
  $deleteSQL = sprintf("DELETE FROM servicios WHERE idServicios=".$IdsServicios);
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($deleteSQL, $conexion) or die(mysql_error());
  echo ("<script type='text/javascript'> window.location.href='servicios-lista.php'</script>");
}
}?>
<?php
  if (isset($_GET['port'])) {
  $updateSQL = "UPDATE producto SET  EnPortada='$_GET[EnPortada]' WHERE idPropiedades='$_GET[varPor]'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
   echo ("<script type='text/javascript'> window.location.href='propiedades-lista.php'</script>");
}
?>
<?php
  if (isset($_GET['portFoto'])) {
  $updateSQL = "DELETE  FROM fotos  WHERE IdFoto='$_GET[varFoto]'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  $m=$_GET['varLink'];
  echo ("<script type='text/javascript'> 
    window.location.href='lista_fotos.php?varFoto=".$m."'</script>");
}?>
<?php
  if (isset($_GET['servFoto'])) {
  $updateSQL = "DELETE  FROM fotosser  WHERE IdFoto='$_GET[varFoto]'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  $m=$_GET['varLink'];
  $updateGoTo = "lista_fotos_serv.php?varFoto=".$m;
  @header(sprintf("Location: %s", $updateGoTo));
}
?>
<?php
if ($_POST['BtnEliminar']) 
{foreach($_POST["IdsPropiedades"] as $IdsPropiedades)
 {
  $deleteSQL = sprintf("DELETE FROM producto WHERE idProducto=".$IdsPropiedades);
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($deleteSQL, $conexion) or die(mysql_error());
  $deleteGoTo = "producto-lista.php";
  header(sprintf("Location: %s", $deleteGoTo));}
}?>
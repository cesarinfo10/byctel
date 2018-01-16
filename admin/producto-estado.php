<?php require_once('../Connections/conexion.php');?>
<?php
  /*Activar Propiedad*/
if (isset($_GET['act'])) {
$updateSQL = "UPDATE producto SET  Activo='$_GET[Activo]' WHERE idProducto='$_GET[varProp]'";
mysql_select_db($database_conexion, $conexion);
$Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
$updateGoTo = "producto-lista.php";
header(sprintf("Location: %s", $updateGoTo));
}
/**********************************************/
  /*Activar Slider*/
if (isset($_GET['silder'])) {
$updateSQL = "UPDATE slider SET  Activo='$_GET[Activo]' WHERE idSlider='$_GET[varSlider]'";
mysql_select_db($database_conexion, $conexion);
$Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
$updateGoTo = "publicidad-lista.php";
header(sprintf("Location: %s", $updateGoTo));
}
/**********************************************/
/*Activar Servicios*/
  if (isset($_GET['ser'])) {
  $updateSQL = "UPDATE servicios SET  Activo='$_GET[Activo]' WHERE idServicios='$_GET[varSer]'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  $updateGoTo = "servicios-lista.php";
  header(sprintf("Location: %s", $updateGoTo));
}
/**********************************************/
/*Activar En Portada*/
  if (isset($_GET['EnPor'])) {
  $updateSQL = "UPDATE producto SET EnPortada='$_GET[EnPortada]' WHERE idProducto='$_GET[varPortada]'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  $updateGoTo = "producto-lista.php";
  header(sprintf("Location: %s", $updateGoTo));
}
/**********************************************/
/*Eleminar Sevicios*/
if ($_POST['Eliminar']) 
{foreach($_POST["IdsServicios"] as $IdsServicios)
 {
  $deleteSQL = sprintf("DELETE FROM servicios WHERE idServicios=".$IdsServicios);
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($deleteSQL, $conexion) or die(mysql_error());
  $deleteGoTo = "servicios-lista.php";
  header(sprintf("Location: %s", $deleteGoTo));
}
}
/**********************************************/
/*Eliminar Fotos de Producto*/
  if (isset($_GET['portFoto'])) {
  $updateSQL = "DELETE  FROM fotos  WHERE IdFoto='$_GET[varFoto]'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  $m=$_GET['varLink'];
  $updateGoTo = "lista_fotos.php?varFoto=".$m;
  header(sprintf("Location: %s", $updateGoTo));
}
/**********************************************/
/*Eliminar Fotos de servicios*/
  if (isset($_GET['servFoto'])) {
  $updateSQL = "DELETE  FROM fotosser  WHERE IdFoto='$_GET[varFoto]'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  $m=$_GET['varLink'];
  $updateGoTo = "lista_fotos_serv.php?varFoto=".$m;
  header(sprintf("Location: %s", $updateGoTo));
}
/**********************************************/
/*Eleminar producto*/
if ($_POST['BtnEliminar']) 
{foreach($_POST["IdsPropiedades"] as $IdsPropiedades)
 {
  $deleteSQL = sprintf("DELETE FROM producto WHERE idProducto=".$IdsPropiedades);
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($deleteSQL, $conexion) or die(mysql_error());
  $deleteGoTo = "producto-lista.php";
  header(sprintf("Location: %s", $deleteGoTo));}
}
?>
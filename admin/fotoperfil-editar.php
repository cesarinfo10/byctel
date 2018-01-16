<?php require_once('../Connections/conexion.php');?>
<?php
$VarFoper = "0";
if (isset($_GET["VarFoper"])) {
  $VarFoper = $_GET["VarFoper"];
}
mysql_select_db($database_conexion, $conexion);
$query_EditFoto = "SELECT * FROM fotos WHERE IdFoto='$VarFoper'";
$EditFoto = mysql_query($query_EditFoto, $conexion) or die(mysql_error());
$row_EditFoto = mysql_fetch_assoc($EditFoto);
$totalRows_EditFoto = mysql_num_rows($EditFoto);
?>
<?php
$i=$_GET['Varprop'];
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if (isset($_POST['editar'])) {
  $updateSQL = "UPDATE producto SET FotoPerfil='$_POST[Foto]' WHERE idProducto='$i'";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());  
  $m=$_GET['varLink'];
  $updateGoTo = "producto-lista.php";
  header(sprintf("Location: %s", $updateGoTo));
}
?>

<!doctype html>
<html><!-- InstanceBegin template="/Templates/adminplanilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Foto Perfil</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="../css/principaladmin.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">
  <div class="header"><!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li></li>
    </ul>
    <?php include("../includes/includeadmin.php");
?>
    <!-- end .sidebar1 --></div>
  <div class="content">
    <h1><!-- InstanceBeginEditable name="Titulo" -->
    Editar Foto de Perfil
<!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
 <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
   <table align="center">
     <tr valign="baseline">
       <td nowrap="nowrap" align="right"><strong>Foto:</strong></td>
       <td><input type="text" id="Foto" class="campo" name="Foto" value="<?php echo $row_EditFoto['Foto']; ?>" size="30" />
         </td>
     </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">&nbsp;</td>
       <td><input type="submit" class="boton" name="editar" value="Actualizar Foto Perfil" /></td>
     </tr>
   </table>
 </form>
 <p>&nbsp;</p>
 <!-- InstanceEndEditable --><!-- end .content --></div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($EditFoto);
?>

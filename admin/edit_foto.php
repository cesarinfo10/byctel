<?php require_once('../Connections/conexion.php'); ?>
<?php
$VarFo = "0";
if (isset($_GET["VarFo"])) {
  $VarFo = $_GET["VarFo"];
}
mysql_select_db($database_conexion, $conexion);
$query_EditFoto = "SELECT * FROM fotos WHERE IdFoto='$VarFo'";
$EditFoto = mysql_query($query_EditFoto, $conexion) or die(mysql_error());
$row_EditFoto = mysql_fetch_assoc($EditFoto);
$totalRows_EditFoto = mysql_num_rows($EditFoto);
?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_POST['editar'])) {
  $updateSQL = "UPDATE fotos SET Foto='$_POST[Foto]' WHERE idFoto='$VarFo'";

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  
  $m=$_GET['varLink'];
  $updateGoTo = "lista_fotos.php?varFoto=".$m;
  header(sprintf("Location: %s", $updateGoTo));
}
?>

<!doctype html>
<html><!-- InstanceBegin template="/Templates/adminplanilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Editar Foto</title>
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
    Bienvenidos a la administración del sitio
	 <script>
function subirimagen(nombrecampo)
{
	self.name = 'opener';
	remote = open('gestionimagen1.php?campo='+nombrecampo, 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}

</script><!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
 <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
   <table align="center">
     <tr valign="baseline">
       <td nowrap="nowrap" align="right"><strong>Foto:</strong></td>
       <td><input type="text" id="Foto" name="Foto" value="<?php echo $row_EditFoto['Foto']; ?>" size="15" />
         <input name="button2" type="button" class="botonimagen" id="button2" onclick="javascript:subirimagen('Foto');" value="Subir Imagen"/></td>
     </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">&nbsp;</td>
       <td><input type="submit" class="boton" name="editar" value="Actualizar Foto" /></td>
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

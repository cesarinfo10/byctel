<?php require_once('../Connections/conexion.php');?>
<?php
$varLogo_ObtengoLogo = "0";
if (isset($_GET["recordID"])) {
  $varLogo_ObtengoLogo = $_GET["recordID"];
}
mysql_select_db($database_conexion, $conexion);
$query_ObtengoLogo = "SELECT * FROM inicioproducto WHERE idProduc= '$varLogo_ObtengoLogo'";
$ObtengoLogo = mysql_query($query_ObtengoLogo, $conexion) or die(mysql_error());
$row_ObtengoLogo = mysql_fetch_assoc($ObtengoLogo);
$totalRows_ObtengoLogo = mysql_num_rows($ObtengoLogo);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_POST['actualizar'])) {
  $updateSQL = "UPDATE inicioproducto SET Foto='$_POST[Foto]', Titulo='$_POST[Titulo]', Texto='$_POST[Texto]' WHERE idProduc='$varLogo_ObtengoLogo'";

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "fotopro-lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/adminplanilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="iso-8859-1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>inicio de Productos</title>
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
    <h1><!-- InstanceBeginEditable name="Titulo" -->inicio de Productos
    <!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
  <script>
function subirimagen(nombrecampo)
{
	self.name = 'opener';
	remote = open('gestionimagen1.php?campo='+nombrecampo, 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}

</script>
 <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
   <table align="center">
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Foto :</td>
       <td><input name="Foto" type="text" value="<?php echo htmlentities($row_ObtengoLogo['Foto'], ENT_COMPAT, 'iso-8859-1'); ?>" size="15" />
         <input name="button2" type="button" class="botonimagen" id="button2" onclick="javascript:subirimagen('Foto');" value="Subir Imagen"/></td>
     </tr>
        <tr valign="baseline">
       <td nowrap="nowrap" align="right">Titulo :</td>
       <td><input name="Titulo" type="text" value="<?php echo $row_ObtengoLogo['Titulo']; ?>" size="15" /></td>
     </tr>
          <tr valign="baseline">
       <td nowrap="nowrap" align="right">Texto:</td>
       <td><textarea name="Texto" cols="50" onkeyup="Delimitar(this.form)" rows="5"><?php echo htmlentities($row_ObtengoLogo['Texto'], ENT_COMPAT, 'iso-8859-1'); ?></textarea>
<br/>
           Le quedan: <input type="text" name="quedan" value="200" maxlength="3">
       </td>
       </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">&nbsp;</td>
       <td><input type="submit" class="boton" name="actualizar" value="Actualizar registro" /></td>
     </tr>
   </table>

 </form>
       <script>
     function Delimitar(formulario)
    {
        var maximo = 200;
        if (formulario.Texto.value.length >= maximo) //si es mayor a 200
        {
            formulario.Texto.value = formulario.Texto.value.substring(0, maximo); //recorto Hasta 200
        }
        else //si es menor a 200
        {
            formulario.quedan.value = maximo - formulario.Texto.value.length; // el maximo menos los que ya use
        }
    }
  </script>
      
    <!------------------------------------------------------------>
 <p>&nbsp;</p>
 <!-- InstanceEndEditable --><!-- end .content --></div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($ObtengoLogo);
?>

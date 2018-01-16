<?php require_once('../Connections/conexion.php'); ?>
<?php
$varProp = "0";
if (isset($_GET["varProp"])) {
  $varProp = $_GET["varProp"];
}
mysql_select_db($database_conexion, $conexion);
$sql = "SELECT * FROM producto WHERE idProducto='$varProp'";
$query = mysql_query($sql, $conexion) or die(mysql_error());
$row = mysql_fetch_assoc($query);
$totalRows = mysql_num_rows($query);

?>
<?php
$Action = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $Action .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_POST['editar'])) {
  $updateSQL = "UPDATE producto SET Titulo='$_POST[Titulo]', DescripcionCorta='$_POST[DescripcionCorta]', Precio='$_POST[Precio]', Activo='$_POST[Activo]' WHERE idProducto='$varProp'";

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "producto-lista.php";
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
<title>Ediar Producto</title>
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
    <h1><!-- InstanceBeginEditable name="Titulo" -->Editar Producto<!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
<form action="<?php echo $Action; ?>" method="post" name="form1" id="form1">
   <table align="center">
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Titulo:</td>
       <td><input name="Titulo" type="text" class="campo" value="<?php echo $row['Titulo']; ?>" size="32" /></td>
     </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Descripcion Corta:</td>
       <td><textarea name="DescripcionCorta" cols="50" onkeyup="Delimitar(this.form)" rows="5"><?php echo htmlentities($row['DescripcionCorta'], ENT_COMPAT, 'iso-8859-1'); ?></textarea>
<br/>
           Le quedan: <input type="text" name="quedan" value="200" maxlength="3">
       </td>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Precio:</td>
       <td><input name="Precio" type="text" class="campo" value="<?php echo $row['Precio'];?>" size="32" /></td>
     </tr>
     <tr valign="baseline">
        <tr valign="baseline">
      <td nowrap="nowrap" align="right">Activar Publicaion</td>
       <td><select name="Activo" class="campo">
 <option value="1" <?php if (!(strcmp(1, htmlentities($row['Activo'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Activo</option>
 <option value="0" <?php if (!(strcmp(0, htmlentities($row['Activo'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Inactivo</option>        
       </select>
       <tr> 
       <td nowrap="nowrap" align="right">&nbsp;</td>
       <td><input type="submit" name="editar" class="boton" value="Actualizar registro" /></td>
     </tr>
   </table>
 </form>
 <p>&nbsp;</p>
      <script>
     function Delimitar(formulario)
    {
        var maximo = 200;
        if (formulario.DescripcionCorta.value.length >= maximo) //si es mayor a 200
        {
            formulario.DescripcionCorta.value = formulario.DescripcionCorta.value.substring(0, maximo); //recorto Hasta 200
        }
        else //si es menor a 200
        {
            formulario.quedan.value = maximo - formulario.DescripcionCorta.value.length; // el maximo menos los que ya use
        }
    }
  </script>
      
    <!------------------------------------------------------------>
 <!-- InstanceEndEditable --><!-- end .content --></div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>


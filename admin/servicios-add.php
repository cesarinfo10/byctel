<?php require_once('../Connections/conexion.php');?>
<?php
$Action = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $Action .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if (isset($_POST["agregar"])) {
  $insertSQL ="INSERT INTO servicios (Titulo, DescripcionCorta, Descripcion, Activo) VALUES ('$_POST[Titulo]', '$_POST[DescripcionCorta]', '$_POST[Descripcion]', '$_POST[Activo]')";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  $insertGoTo = "add_fotos-servicios.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>

<!doctype html>
<html><!-- InstanceBegin template="/Templates/adminplanilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="iso-8859-1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Agregar Producto</title>
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
    <h1><!-- InstanceBeginEditable name="Titulo" -->Agregar Servicio<!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
 <form action="<?php echo $Action; ?>" method="post" name="form1" id="form1">
   <table align="center">
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Titulo:</td>
       <td><input name="Titulo" type="text" class="campo" value="" size="32" /></td>
         <tr valign="baseline">
       <td nowrap="nowrap" align="right">Descripcion Corta:</td>
       <td><textarea name="DescripcionCorta" cols="50" rows="5" onkeyup="Delimitar(this.form)"></textarea>
<br/>
           Le quedan: <input type="text" name="quedan" value="320" maxlength="3">
       </td> 
     </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">Descripcion:</td>
       <td><textarea name="Descripcion" cols="50" rows="5"></textarea></td>       

     <tr valign="baseline">
        <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo de publicaion</td>
       <td><select name="Activo" class="campo">
 <option value="1">Activo</option>
 <option value="0">Inactivo</option> 
 <tr valign="baseline">
       <td nowrap="nowrap" align="right">&nbsp;</td>
       <td><input type="submit" name="agregar" class="boton" value="Insertar Producto" /></td>
     </tr>       
       </select> 
      </td>
     </tr>
   </table>

 </form>

      <script>
     function Delimitar(formulario)
    {
        var maximo = 320;
        if (formulario.DescripcionCorta.value.length >= maximo) //si es mayor a 320
        {
            formulario.DescripcionCorta.value = formulario.DescripcionCorta.value.substring(0, maximo); //recorto Hasta 200
        }
        else //si es menor a 320
        {
            formulario.quedan.value = maximo - formulario.DescripcionCorta.value.length; // el maximo menos los que ya use
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

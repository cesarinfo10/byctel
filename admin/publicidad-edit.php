<?php require_once('../Connections/conexion.php'); ?>
<?php
$publi = "0";
if (isset($_GET["publi"])) {
  $publi = $_GET["publi"];
}
mysql_select_db($database_conexion, $conexion);
$query_editarPubl = "SELECT * FROM slider WHERE idSlider='$publi'";
$editarPubl = mysql_query($query_editarPubl, $conexion) or die(mysql_error());
$row_editarPubl = mysql_fetch_assoc($editarPubl);
$totalRows_editarPubl = mysql_num_rows($editarPubl);

$Action = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $Action .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_POST["editar"])) {
  $updateSQL = "UPDATE slider SET Foto='$_POST[Foto]', Titulo='$_POST[Titulo]', Subtitulo='$_POST[Subtitulo]', Menu='$_POST[Menu]', Precio='$_POST[Precio]', Activo='$_POST[Activo]' , Orden='$_POST[Orden]', Link='$_POST[Link]' WHERE idSlider='$publi'";

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());

  $updateGoTo = "publicidad-lista.php";
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
<title>Editar</title>

<script>
function subirimagen(nombrecampo)
{
	self.name = 'opener';
	remote = open('gestionimagen.php?campo='+nombrecampo, 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}

</script>
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
    <h1><!-- InstanceBeginEditable name="Titulo" --><em>Editar...</em><!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->

      <form action="<?php echo $Action; ?>" method="post" name="form1" id="form1">
        <table width="360" height="61" align="center">
            <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Foto:</strong></td>
              <td width="300" align="left"><input type="text" name="Foto" value="<?php echo $row_editarPubl["Foto"]; ?>" size="20" />
              <input name="button2" type="button" class="botonimagen" id="button2" onclick="javascript:subirimagen('Foto');" value="Subir Imagen"/></td>
            </tr>
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Titulo:</strong></td>
              <td width="300" align="left"><input type="text" name="Titulo" value="<?php echo $row_editarPubl["Titulo"]; ?>" class="campo" size="20" /></td>
            </tr>
              </tr>
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Subtitulo:</strong></td>
                     <td><textarea name="Subtitulo" cols="50" onkeyup="Delimitar(this.form)" rows="1"><?php echo htmlentities($row_editarPubl['Subtitulo'], ENT_COMPAT, 'iso-8859-1'); ?></textarea>
<br/>
           Le quedan: <input type="text" name="quedan" value="48" maxlength="3">
       </td>
            </tr>
         
                <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Titulo Chico:</strong></td>
              <td width="300" align="left"><input type="text" name="Menu" value="<?php echo $row_editarPubl["Menu"]; ?>" class="campo" size="20" /></td>
            </tr>
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Precio:</strong></td>
              <td width="300" align="left"><input type="text" name="Precio" value="<?php echo $row_editarPubl["Precio"]; ?>" class="campo" size="20" /></td>
            </tr>
                   </tr>
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Activo:</strong></td>
              <td><select name="Activo" class="campo">
               <option value="1" <?php if (!(strcmp(1, htmlentities($row_editarPubl['Activo'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Activo</option>
               <option value="0" <?php if (!(strcmp(0, htmlentities($row_editarPubl['Activo'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Inactivo</option>        
                     </select> 
                    </td>
                      </tr>
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Orden:</strong></td>
              <td width="300" align="left"><input type="text" name="Orden" value="<?php echo $row_editarPubl["Orden"]; ?>" class="campo" size="20" /></td>
            </tr>
                         </tr>
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Link:</strong></td>
              <td width="300" align="left"><input type="text" name="Link" value="<?php echo $row_editarPubl["Link"]; ?>" class="campo" size="20" /></td>
            </tr>
            <tr valign="baseline">
              <td height="26" align="right" nowrap="nowrap">&nbsp;</td>
              <td><input type="submit" class="boton" name="editar" value="Actualizar registro" /></td>
            </tr>
          </table>
    </form>
             <script>
     function Delimitar(formulario)
    {
        var maximo = 48;
        if (formulario.Subtitulo.value.length >= maximo) //si es mayor a 48
        {
            formulario.Subtitulo.value = formulario.Subtitulo.value.substring(0, maximo); //recorto Hasta 48
        }
        else //si es menor a 48
        {
            formulario.quedan.value = maximo - formulario.Subtitulo.value.length; // el maximo menos los que ya use
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
mysql_free_result($editarPubl);
?>

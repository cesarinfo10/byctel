<?php require_once('../Connections/conexion.php'); ?>
<?php


$Action = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $Action .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (isset($_POST['agregar'])) {
  $insertSQL = "INSERT INTO slider (Foto, Titulo, Subtitulo, Menu, Precio, Activo, Orden, Link) VALUES ('$_POST[Foto]', '$_POST[Titulo]', '$_POST[Subtitulo]', '$_POST[Menu]', '$_POST[Precio]', '$_POST[Activo]' , '$_POST[Orden]', '$_POST[Link]')";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());

  $insertGoTo = "publicidad-lista.php";
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
<title>Documento sin título</title>
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
    <h1><!-- InstanceBeginEditable name="Titulo" --><em>Insertar Publicidad</em><!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->

      <form action="<?php echo $Action; ?>" method="post" name="form1" id="form1">
        <table width="360" height="61" align="center">
            <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Foto:</strong></td>
              <td width="300" align="left"><input type="text" name="Foto" value="" size="20" />
              <input name="button2" type="button" class="botonimagen" id="button2" onclick="javascript:subirimagen('Foto');" value="Subir Imagen"/></td>
            </tr>
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Titulo:</strong></td>
              <td width="300" align="left"><input type="text" name="Titulo" value="" class="campo" size="20" /></td>
            </tr>
             
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Subtitulo:</strong></td>
                   <td><textarea name="Subtitulo" cols="50" rows="1" onkeyup="Delimitar(this.form)"></textarea>
<br/>
           Le quedan: <input type="text" name="quedan" value="48" maxlength="3">
       </td>  
            </tr>
                      <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Titulo chico::</strong></td>
              <td width="300" align="left"><input type="text" name="Menu" value="" class="campo" size="20" /></td>
            </tr>
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Precio:</strong></td>
              <td width="300" align="left"><input type="text" name="Precio" value="" class="campo" size="20" /></td>
            </tr>
                   </tr>
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Activo:</strong></td>
              <td><select name="Activo" class="campo">
               <option value="1">Activo</option>
               <option value="0">Inactivo</option>        
                     </select> 
                    </td>
            </tr>
                      
              <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Orden:</strong></td>
              <td width="300" align="left"><input type="text" name="Orden" value="" class="campo" size="20" /></td>
            </tr>
                     <tr valign="baseline">
              <td width="81" height="27" align="right" nowrap="nowrap"><strong>Link:</strong></td>
              <td width="300" align="left"><input type="text" name="Link" value="" class="campo" size="20" /></td>
            </tr>
            <tr valign="baseline">
              <td height="26" align="right" nowrap="nowrap">&nbsp;</td>
              <td><input type="submit" class="boton" name="agregar" value="Insertar registro" /></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1" />
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
    <!-- InstanceEndEditable --><!-- end .content --></div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>

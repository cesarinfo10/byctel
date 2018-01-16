<?php require_once('../Connections/conexion.php');?>
<?php
mysql_select_db($database_conexion, $conexion);
$sql="SELECT idProducto FROM producto ORDER BY idProducto DESC";
$query=mysql_query($sql, $conexion) or die(mysql_error());
$row=mysql_fetch_assoc($query);
$totalRow=mysql_num_rows($query);
$n=  $row["idProducto"];
mysql_select_db($database_conexion, $conexion);
$query_agregarfoto = "SELECT * FROM fotos WHERE idProducto='$n'";
$agregarfoto = mysql_query($query_agregarfoto, $conexion) or die(mysql_error());
$row_agregarfoto = mysql_fetch_assoc($agregarfoto);
$totalRows_agregarfoto = mysql_num_rows($agregarfoto);
?>
<?php
$Action = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $Action .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if(isset($_POST['guardar'])) {
$insertSQL="INSERT INTO fotos (idProducto, Foto) VALUES ('$_POST[idProducto]', '$_POST[Foto]')";
mysql_select_db($database_conexion, $conexion);
$Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  $insertGoTo = "add_fotos.php";
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
<title>Agregar Fotos</title>
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
    <h1><!-- InstanceBeginEditable name="Titulo" -->Agregar fotos<!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
<script type="text/javascript">
function validarForm(formulario) {
  if(form1.idProducto.onclick=true) { //comprueba que no esté vacío
    form1.Foto.focus();   
    alert('Este campo es solo informacion, no puede cambiar el registro o generará un ERROR'); 
 window.location = 'add_fotos.php';
}
 
}
</script>

<script type="text/javascript">
function validarForm2(formulario) {
  if(form1.Foto.value.length==0) {
  alert('No se puede guardar si no Agrega una Foto');
  return false;
 window.location = 'add_fotos.php';
}
 
}
</script>

 <script>
function subirimagen(nombrecampo)
{
	self.name = 'opener';
	remote = open('gestionimagen1.php?campo='+nombrecampo, 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
 	remote.focus();
	}

</script>
 <form action="<?php echo $Action;?>" method="post" name="form1" onsubmit="return validarForm2(this);" id="form1">
   <table align="center">
   <tr valign="baseline">
<td align="right">Nº Producto</td>
<td align="rigth"><input type="text" id="idProducto" onclick="javascript:validarForm()" name="idProducto" value="<?php echo $row['idProducto']; ?>"> </td>
   </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right"><strong>Foto:</strong></td>
       <td><input type="text" id="Foto" name="Foto" value="" size="15" />
         <input name="button2" type="button" class="botonimagen" id="button2" onclick="javascript:subirimagen('Foto');" value="Subir Imagen"/></td>
     </tr>
     <tr valign="baseline">
       <td nowrap="nowrap" align="right">&nbsp;</td>
       <td><br/>
       <input type="submit" class="botonverde" name="guardar" value="Insertar registro" />
       <input type="button" class="botonrojo" name="dalir" onclick="window.location = 'producto-lista.php';" value="salir" /></td>
     </tr>
   </table>
 </form>
 <?php
do { ?>
    <div class="fotos1">
    <img src="../images/<?php echo $row_agregarfoto['Foto']; ?>" alt="" width="175" height="106" />
    </div>
<?php } while ($row_agregarfoto=mysql_fetch_assoc($agregarfoto)); ?>
 <p>&nbsp;</p>
 <!-- InstanceEndEditable --><!-- end .content --></div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>

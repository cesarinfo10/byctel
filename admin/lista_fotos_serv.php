<?php require_once('../Connections/conexion.php');?>
<?php
$varFoto=0;
if(isset($_GET["varFoto"])){
  $varFoto=$_GET["varFoto"];
}
mysql_select_db($database_conexion, $conexion);
$query_agregarfoto = "SELECT * FROM fotosser WHERE idServicios='$varFoto'";
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
$insertSQL="INSERT INTO fotosser (idServicios, Foto) VALUES ('$_POST[idServicios]', '$_POST[Foto]')";
  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  $m=$_GET['varFoto'];
  $updateGoTo = "lista_fotos.php?varFoto=".$m;
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/adminplanilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Fotos</title>
<script type="text/javascript">
function validarForm(formulario) {
  if(form1.idServicios.onclick=true) { //comprueba que no esté vacío
    form1.Foto.focus();   
    alert('Este campo es solo informacion, no puede cambiar el registro o generará un ERROR'); 
 window.location.reload();
}
 
}
</script>

<script type="text/javascript">
function validarForm2(formulario) {
  if(form1.Foto.value.length==0) {
  alert('No se puede guardar si no Agrega una Foto');
  return false;
 window.location.reload();
}
 
}
</script>
<script type="text/javascript">
  function actualizar() {
    window.location.reload();
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
    <h1><!-- InstanceBeginEditable name="Titulo" -->Lista de Fotos<!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
  <script>
function subirimagen(nombrecampo)
{
  self.name = 'opener';
  remote = open('gestionimagen1.php?campo='+nombrecampo, 'remote', 'width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no, status=yes');
  remote.focus();
  }

</script>
<?php if ($varFoto<>"") { ?> 
<?php $n= "Nº de Producto" ?>
<form action="<?php echo $Action;?>" method="post" name="form1" onsubmit="return validarForm2(this);" id="form1">
   <table align="center">
   <tr valign="baseline">
<td align="right"><?php echo $n ?></td>
<td align="rigth"><input type="text" id="idServicios" onclick="javascript:validarForm()" name="idServicios" value="<?php echo $varFoto ?>"> </td>
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
       <input type="button" class="botonrojo" name="dalir" onclick="window.location = 'servicios-lista.php';" value="salir" /></td>
     </tr>
   </table>
 </form>

<?php
do { ?>
    <div class="fotos1">
    <img src="../images/<?php echo $row_agregarfoto['Foto']; ?>" alt="" width="175" height="106" />
    <a href="edit_foto-servicios.php?VarFo=<?php echo $row_agregarfoto['IdFoto']; ?>&varLink=<?php echo $varFoto ?>"><img src="../images/iconos/editar.png" alt="" width="27" height="27" /></a>
    <a href="producto-estado.php?varFoto=<?php echo $row_agregarfoto['IdFoto']; ?>&servFoto=servFoto&varLink=<?php echo $varFoto ?>"><img src="../images/iconos/borrar.png" alt="" width="27" height="27" /></a>
    <div class="radio">
<a href="fotoperfil-editar-serv.php?VarFoper=<?php echo $row_agregarfoto['IdFoto']; ?>&Varprop=<?php echo $row_agregarfoto['idServicios']; ?>"><img src="../images/iconos/perfil.png"></a>
    </div>

    </div>
<?php } while ($row_agregarfoto=mysql_fetch_assoc($agregarfoto)); ?>
<?php } else {
  echo "No hay registros para mostrar";
} ?>
 <!-- InstanceEndEditable --><!-- end .content --></div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>

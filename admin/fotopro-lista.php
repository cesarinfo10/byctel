<?php require_once('../Connections/conexion.php');?>
<?php
mysql_select_db($database_conexion, $conexion);
$query_ObtengoLogo = "SELECT * FROM inicioproducto";
$ObtengoLogo = mysql_query($query_ObtengoLogo, $conexion) or die(mysql_error());
$row_ObtengoLogo = mysql_fetch_assoc($ObtengoLogo);
$totalRows_ObtengoLogo = mysql_num_rows($ObtengoLogo);
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
    <h1><!-- InstanceBeginEditable name="Titulo" -->Foto inicio de Productos<!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
 <table width="98%" border="0">
   <tr class="fondotitulo">
     <td><strong>Foto</strong></td>
     <td><strong>Titulo</strong></td>
     <td><strong>Texto</strong></td>
     <td><strong>Editar</strong></td>
     </tr>
   <tr>
     <td align="center"><img src="../images/<?php echo $row_ObtengoLogo['Foto']; ?>" alt="" width="103" height="65" /></td>
     <td align="center"><?php echo $row_ObtengoLogo['Titulo']; ?></td>
     <td align="center"><?php echo $row_ObtengoLogo['Texto']; ?></td>
     <td align="center"><a href="fotopro-edit.php?recordID=<?php echo $row_ObtengoLogo['idProduc']; ?>"><img src="../images/iconos/editar.png" alt="" width="27" height="27" /></a></td>
     </tr>
 </table>
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

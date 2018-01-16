<?php require_once('../Connections/conexion.php'); ?>
<?php
mysql_select_db($database_conexion, $conexion);
$sql = "SELECT * FROM slider ORDER BY Orden ASC";
$query = mysql_query($sql, $conexion) or die(mysql_error());
$row = mysql_fetch_assoc($query);
$totalRows = mysql_num_rows($query);
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/adminplanilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="iso-8859-1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Lista Principal</title>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.load("jquery", "1");
            google.setOnLoadCallback(function(){
                $("#chk_all").click(function(){
                    var chks=$("input:checkbox[name^='IdsSlider']");
                    chks.attr("checked",$(this).is(":checked"))
                })
                $("input[name^='IdsSlider']").click(function(){
                    var todos=$("input:checkbox[name^='IdsSlider']")
                    var activos=$("input:checked[name^='IdsSlider']")
                    $("#chk_all").attr("checked",todos.length==activos.length)
                })
            })
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
    <h1><!-- InstanceBeginEditable name="Titulo" --><em>Lista Principal<br />
  </em><!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
 <table width="43%" border="0">
   <tr>
     <td><form action="" method="post">
     </form></td>
   </tr>
 </table>

<table width="98%" border="0">
   <tr class= "fondotitulo">
    <td width="23%" rowspan="2" align="center" valign="middle"><strong>FOTOS</strong></td>
    <td width="23%" rowspan="2" align="center" valign="middle"><strong>Titulo</strong></td>
    <td width="14%" rowspan="2" align="center" valign="middle"><strong>Activo</strong></td>
    <td width="14%" rowspan="2" align="center" valign="middle"><strong>Orden</strong></td>
    <td width="23%" rowspan="2" align="center" valign="middle"><strong>Editar</strong></td>
    </tr>
  <tr class="fondotitulo">
  </tr>
  <?php do { ?>
      <?php $valorestiloactual=tablerowswitch()?>
  
 <tr class="<?php echo $valorestiloactual; ?>" onmouseover="this.className='trBrillo'" onmouseout="this.className='<?php echo $valorestiloactual; ?>'">
      <td align="center"><img src="../images/<?php echo $row['Foto']; ?>" alt="" width="175" height="106" /></td>
      <td align="center"><?php echo $row['Titulo']; ?></td>
   <td align="center"><?php if ($row['Activo']==1) {?>
        <a href="producto-estado.php?varSlider=<?php echo $row['idSlider']; ?>&Activo=0&silder=silder"><img src="../images/iconos/check.png" width="27" height="27" alt="Activo"></a>
      <?php   }else{?>
      <a href="producto-estado.php?varSlider=<?php echo $row['idSlider']; ?>&Activo=1&silder=silder">
        <img src="../images/iconos/cancel.png" width="27" height="27" alt="Inactivo"></a>
        </td>
        <?php  }?>
      <td align="center"><?php echo $row['Orden']; ?></td>
      <td align="center"><a href="publicidad-edit.php?publi=<?php echo $row['idSlider']; ?>"><img src="../images/iconos/editar.png" width="27" height="27" /></a></a></td>
      </tr>
    <?php } while ($row = mysql_fetch_assoc($query)); ?>
</table>
 
    <!-- InstanceEndEditable --><!-- end .content --></div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>


<?php require_once('../Connections/conexion.php'); ?>
<?php
mysql_select_db($database_conexion, $conexion);
$sql = "SELECT * FROM servicios ORDER BY idServicios DESC";
$query = mysql_query($sql, $conexion) or die(mysql_error());
$row = mysql_fetch_assoc($query);
$totalRows= mysql_num_rows($query);
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/adminplanilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="iso-8859-1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Lista Servicio</title>
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
    <h1><!-- InstanceBeginEditable name="Titulo" -->Lista de Sevicios<!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
            google.load("jquery", "1");
            google.setOnLoadCallback(function(){
                $("#chk_all").click(function(){
                    var chks=$("input:checkbox[name^='IdsServicios']");
                    chks.attr("checked",$(this).is(":checked"))
                })
                $("input[name^='IdsServicios']").click(function(){
                    var todos=$("input:checkbox[name^='IdsServicios']")
                    var activos=$("input:checked[name^='IdsServicios']")
                    $("#chk_all").attr("checked",todos.length==activos.length)
                })
            })
        </script>
    <a href="servicios-add.php"><img src="../images/iconos/add.png">Agregar Sevicios</a>
    <form action="producto-estado.php" method="post">
<table width="100%" border="0">
  <tr class="fondotitulo">
  <td align="center"><strong>Foto Perfil</strong></td>
     <td align="center"><strong>Titulo</strong></td>    
     <td align="center"><strong>Ver Fotos</strong></td>
     <td align="center"><strong>Activo</strong>
     <td align="center"> <strong>Editar</strong></td>
     <td align="center"><input name="Eliminar" type="submit" class="botondelete" value="Eliminar"/>
       <input id="chk_all" type="checkbox"/></td>
   </tr>
   <?php do { ?>
     <?php $valorestiloactual=tablerowswitch()?>
  
 <tr class="<?php echo $valorestiloactual; ?>" onmouseover="this.className='trBrillo'" onmouseout="this.className='<?php echo $valorestiloactual; ?>'">
     <td align="center"><img src="../images/<?php echo $row['FotoPerfil']; ?>" alt="" width="145" height="75" /></td>
     <td align="center"><?php echo $row['Titulo']; ?></td>
     <td align="center"><a href="lista_fotos_serv.php?varFoto=<?php echo $row['idServicios']; ?>&varPoirdaes=<?php echo $row['idServicios']; ?>">IR</a></td>
      <td align="center"><?php if ($row['Activo']==1) {?>
        <a href="producto-estado.php?varSer=<?php echo $row['idServicios']; ?>&Activo=0&ser=ser"><img src="../images/iconos/check.png" width="27" height="27" alt="Activo"></a>
      <?php   }else{?>
      <a href="producto-estado.php?varSer=<?php echo $row['idServicios']; ?>&Activo=1&ser=ser">
        <img src="../images/iconos/cancel.png" width="27" height="27" alt="Inactivo"></a>
        </td>
       <?php  }?>
     <td align="center"><a href="servicios-edit.php?varProp=<?php echo $row['idServicios']; ?>"><img src="../images/iconos/editar.png" alt="" width="27" height="27" /></a></td>
     <td align="center"><input  type="checkbox" name="IdsServicios[]" value="<?php echo $row['idServicios']; ?>" /></td>
        <?php } while ($row = mysql_fetch_assoc($query)); ?>
   </tr>
 </table>
 </form>

 <!-- InstanceEndEditable --><!-- end .content --></div>
  <div class="footer">
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>


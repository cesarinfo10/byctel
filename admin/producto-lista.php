<?php require_once('../Connections/conexion.php');?>
<?php
mysql_select_db($database_conexion, $conexion);
$sql = "SELECT * FROM producto ORDER BY idProducto DESC";
$query = mysql_query($sql, $conexion) or die(mysql_error());
$row = mysql_fetch_assoc($query);
$totalRows= mysql_num_rows($query);
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/adminplanilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="iso-8859-1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Lista Productos</title>
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
    <h1><!-- InstanceBeginEditable name="Titulo" -->Lista de Productos<!-- InstanceEndEditable --></h1>
    
 <!-- InstanceBeginEditable name="acciones" -->
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
            google.load("jquery", "1");
            google.setOnLoadCallback(function(){
                $("#chk_all").click(function(){
                    var chks=$("input:checkbox[name^='IdsPropiedades']");
                    chks.attr("checked",$(this).is(":checked"))
                })
                $("input[name^='IdsPropiedades']").click(function(){
                    var todos=$("input:checkbox[name^='IdsPropiedades']")
                    var activos=$("input:checked[name^='IdsPropiedades']")
                    $("#chk_all").attr("checked",todos.length==activos.length)
                })
            })
        </script>
    <a href="producto-add.php"><img src="../images/iconos/add.png">Agregar Producto</a>
    <form action="producto-estado.php" method="post">
<table width="100%" border="0">
  <tr class="fondotitulo">
  <td align="center"><strong>Foto Perfil</strong></td>
     <td align="center"><strong>Titulo</strong></td>
     <td align="center"><strong>Precio</strong></td>    
     <td align="center"><strong>Ver Fotos</strong></td>
     <td align="center"><strong>En Portada</strong></td>
     <td align="center"><strong>Activo</strong>
     <td align="center"> <strong>Editar</strong></td>
     <td align="center"><input name="BtnEliminar" type="submit" class="botondelete" value="Eliminar"/>
       <input id="chk_all" type="checkbox"/></td>
   </tr>
   <?php do { ?>
     <?php $valorestiloactual=tablerowswitch()?>
  
 <tr class="<?php echo $valorestiloactual; ?>" onmouseover="this.className='trBrillo'" onmouseout="this.className='<?php echo $valorestiloactual; ?>'">
     <td align="center"><img src="../images/<?php echo $row['FotoPerfil'];?>" alt="" width="145" height="75" /></td>
     <td align="center"><?php echo $row['Titulo']; ?></td>
     <td align="center"><?php echo $row['Precio']; ?></td>
     <td align="center"><a href="lista_fotos.php?varFoto=<?php echo $row['idProducto'];?>&varPoirdaes=<?php echo $row['idProducto']; ?>">IR</a></td>
        <td align="center"><?php if ($row['EnPortada']==1) {?>
        <a href="producto-estado.php?varPortada=<?php echo $row['idProducto'];?>&EnPortada=0&EnPor=EnPor"><img src="../images/iconos/check.png" width="27" height="27" alt="Activo"></a>
      <?php   }else{?>
        <a href="producto-estado.php?varPortada=<?php echo $row['idProducto'];?>&EnPortada=1&EnPor=EnPor">
        <img src="../images/iconos/cancel.png" width="27" height="27" alt="Inactivo"></a>
        </td>
       <?php  }?>
      <td align="center"><?php if ($row['Activo']==1) {?>
        <a href="producto-estado.php?varProp=<?php echo $row['idProducto'];?>&Activo=0&act=act"><img src="../images/iconos/check.png" width="27" height="27" alt="Activo"></a>
      <?php   }else{?>
      <a href="producto-estado.php?varProp=<?php echo $row['idProducto'];?>&Activo=1&act=act">
        <img src="../images/iconos/cancel.png" width="27" height="27" alt="Inactivo"></a>
        </td>
       <?php  }?>
     <td align="center"><a href="producto-edit.php?varProp=<?php echo $row['idProducto']; ?>"><img src="../images/iconos/editar.png" alt="" width="27" height="27" /></a></td>
     <td align="center"><input  type="checkbox" name="IdsPropiedades[]" value="<?php echo $row['idProducto']; ?>" /></td>
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


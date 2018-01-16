<?php require_once('Connections/conexion.php'); ?>
<?php
mysql_select_db($database_conexion, $conexion);
$sql = "SELECT * FROM producto WHERE Activo='1' ORDER BY idProducto DESC";
$query = mysql_query($sql, $conexion) or die(mysql_error());
$row = mysql_fetch_assoc($query);
$totalRows= mysql_num_rows($query);
?>
<?php
mysql_select_db($database_conexion, $conexion);
$query_ObtengoLogo = "SELECT * FROM inicioproducto";
$ObtengoLogo = mysql_query($query_ObtengoLogo, $conexion) or die(mysql_error());
$row_ObtengoLogo = mysql_fetch_assoc($ObtengoLogo);
$totalRows_ObtengoLogo = mysql_num_rows($ObtengoLogo);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1>" />
<title>Byctel.cl - Productos</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<div class="fonos"> Fono: 02 - 27360216. Celu: +56 -9 - 66509227</div>
</head>

<body>


<div id="wrapper">



		<!-- TOP -->

  <div id="header"><img src="img/logo.jpg" width="950" height="157" /></div>
    	
        
        <div id="menu">
        
        	<ul>
            
            	<li><a href="index.php">Inicio</a></li>
                <li><a href="nosotros.html">Nosotros</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="byctel.html">Byctel Constructor</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            
            </ul>
        
        </div>
        
        
        
        <!-- FIN TOP -->
        
        	<div id="principal">
            
           	  <div class="box_principal">
                
                	<div class="texto_principal">
                	  <div class="titulo_principal">
               	      <h1><?php echo $row_ObtengoLogo['Titulo']; ?></h1></div>
                      <p><?php echo $row_ObtengoLogo['Texto']; ?></p>
                	</div>
                    
                    
                    <div class="foto_principal"><img src="images/<?php echo $row_ObtengoLogo['Foto']; ?>" width="604" height="293" /></div>
               </div>
            
            
            </div>
            
                    <div id="main">
                    <?php do { ?>
                    
                        <div class="col1">
                        
                        	<div class="base">
                         <div class="titulo"><strong><?php echo $row["Titulo"]; ?></strong> </div>
                            	<div class="foto_col"><div class="precio"><strong> $ <?php echo $row["Precio"] ;?></strong></div><img src="images/<?php echo $row["FotoPerfil"] ;?>" width="230" height="171" /></div>
                                <div class="info_col"><?php echo $row["DescripcionCorta"] ;?><a href="ver-producto.php?varProd=<?php echo $row["idProducto"]; ?>" ><div class="linkcolor"><em><strong><?php echo utf8_decode("Ver Más");?></strong></em></div></a></div>
                       	  </div>
                        
                        
                        </div>
                        <?php } while ($row = mysql_fetch_assoc($query)); ?>
                        
                        

                    
                    </div><!--Fin Main-->
                    
                    
                    <div id="footer">
                    
                    	<div class="box_footer">
                        
                        		<?php include('footer.php');?>
                             
                    	</div>
                    
                    
                    </div>
                    
                    
                 
</div>


</body>
</html>

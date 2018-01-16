<?php require_once('Connections/conexion.php'); ?>
<?php
mysql_select_db($database_conexion, $conexion);
$sql = "SELECT * FROM servicios WHERE Activo='1' ORDER BY idServicios DESC";
$query = mysql_query($sql, $conexion) or die(mysql_error());
$row = mysql_fetch_assoc($query);
$totalRows= mysql_num_rows($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1>" />
<title>Byctel.cl - Servicios</title>
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
                
                	<div class="texto_nosotros">
                	  <div class="titulo_principal">
               	      <h1>Servicios</h1></div>
                      <p><?php echo utf8_decode("Byctel Ltda, es una nueva empresa en el mercado de las telecomunicaciones y el acondicionamiento de edificios, si bien llevamos aproximadamente 3 meses trabajando desde la creación de nuestra empresa, hay que recercar que nuestro equipo de trabajo al igual que nuestra empresa, fue creada producto de una migración de una antigua empresa, contando así con aproximadamente 6 años de experiencia en el mercado.- Nuestro equipo es formado por técnicos especializados en cada una de las áreas desarrolladas por nuestra empresa, por lo que se garantiza 100% un buen trabajo a realizar a nuestros clientes, además de eso, es a entender que nos encontramos en un proceso de captación de nuevos clientes, por lo que nuestra idea es satisfacer plenamente sus necesidades y dar a conocer nuestra mejor cara de acuerdo a servicios sea.");?></p>
                	</div>
                    
                    
               </div>            
            </div>
            
                    <div id="main">
                    <?php do { ?>
                        <div class="col1_s">                        
                        	<div class="base_s">
                            <h2><strong><?php echo $row["Titulo"]; ?></strong></h2>
                            	<div class="foto_col_s"><img src="images/<?php echo $row["FotoPerfil"] ;?>" width="410" height="273" /></div>
                                <div class="info_col_s"><?php echo $row["DescripcionCorta"] ;?>.<a href="ver-servicio.php?varSer=<?php echo $row["idServicios"]; ?>" ><div class="linkcolor"><em><strong><?php echo utf8_decode("Ver Más");?></strong></em></div></a></div>
                       	  </div>
                        
                        
                        </div>
                        <?php } while ($row=mysql_fetch_assoc($query)); ?>
                        </div>
                        
                        
                        
                        
                    
                    
                    <div id="footer">
                    
                    	<div class="box_footer">
                        
                        		<?php include ('footer.php');?>
                                
                    	</div>
                    
                    
                    </div>
                    
                    
                 
</div>


</body>
</html>

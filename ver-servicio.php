<?php require_once('Connections/conexion.php');?>
 <?php 
 $VarPro="0";
 if(isset($_GET["varSer"])) {
  $varSer=$_GET["varSer"];
 } 
 mysql_select_db($database_conexion,$conexion);
 $sql="SELECT * FROM servicios WHERE idServicios='$varSer' ";
 $query=mysql_query($sql, $conexion) or die(mysql_error());
 $row=mysql_fetch_assoc($query);
 $TotalRow=mysql_num_rows($query);
?>
<?php
mysql_select_db($database_conexion, $conexion);
$sqlFoto="SELECT * FROM fotosser WHERE idServicios='$varSer'";
$queryFoto=mysql_query($sqlFoto, $conexion) or die(mysql_error());
$rowFoto=mysql_fetch_assoc($queryFoto);
$TotalRowFoto=mysql_num_rows($queryFoto);
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1>" />
<title>Byctel.cl</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
    <script src="album/jquery-1.4.4.min.js" type="text/javascript"></script>

    <link href="album/smart-gallery.css" rel="stylesheet" type="text/css" />

    <script src="album/smart-gallery.min.js" type="text/javascript"></script>
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
                	  <div class="titulo_principal"><h1><?php echo $row['Titulo']; ?></h1>
                	  </div>
                      <p><?php echo $row['Descripcion']; ?>.</p>
                	</div>
                    
                    <div class="foto_nosotros">   

                     <script type="text/javascript">
        $(document).ready(function() {
        $('#smart-gallery').gallery({ stickthumbnails: true, random: true});
        });
    </script>



    <div id="smart-gallery">
    <?php do { ?>
        <a href="images/<?php echo $rowFoto["Foto"];?>" >
            <img src="images/<?php echo $rowFoto["Foto"];?>" /></a> 
<?php } while ($rowFoto=mysql_fetch_assoc($queryFoto)); ?>

    </div>    </div>

                    
                    
               </div>            
            </div>
            
                    
                    
                    
                    <div id="footer">
                    
                    	<div class="box_footer">
                        
                    		<?php include ('footer.php'); ?>
                            
                    	</div>
                    
                    
                    </div>
                    
                    
                 
</div>


</body>
</html>

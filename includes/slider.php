<?php require_once('Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_DatosSlider = 4;
$pageNum_DatosSlider = 0;
if (isset($_GET['pageNum_DatosSlider'])) {
  $pageNum_DatosSlider = $_GET['pageNum_DatosSlider'];
}
$startRow_DatosSlider = $pageNum_DatosSlider * $maxRows_DatosSlider;

mysql_select_db($database_conexion, $conexion);
$query_DatosSlider = "SELECT * FROM slider WHERE Activo=1 ORDER BY Orden ASC";
$query_limit_DatosSlider = sprintf("%s LIMIT %d, %d", $query_DatosSlider, $startRow_DatosSlider, $maxRows_DatosSlider);
$DatosSlider = mysql_query($query_limit_DatosSlider, $conexion) or die(mysql_error());
$row_DatosSlider = mysql_fetch_assoc($DatosSlider);

if (isset($_GET['totalRows_DatosSlider'])) {
  $totalRows_DatosSlider = $_GET['totalRows_DatosSlider'];
} else {
  $all_DatosSlider = mysql_query($query_DatosSlider);
  $totalRows_DatosSlider = mysql_num_rows($all_DatosSlider);
}
$totalPages_DatosSlider = ceil($totalRows_DatosSlider/$maxRows_DatosSlider)-1;
?>
<link rel="stylesheet" type="text/css" href="css/estiloslider.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 7000, true);
	});
</script>

<div id="featured" >
		  <ul class="ui-tabs-nav">
          <?php $contador=1; ?>
	        <?php do { ?>
            <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php echo $contador;?>"><a href="#fragment-<?php echo $contador;?>"><img src="images/<?php echo $row_DatosSlider['Foto']; ?>" alt="" width="80" height="65" /><span><?php echo $row_DatosSlider['Menu']; ?></span></a></li>
            <?php 
			  $contador++;
			  } while ($row_DatosSlider = mysql_fetch_assoc($DatosSlider)); ?>
	      </ul>
<?php
 mysql_data_seek($DatosSlider, 0); 
 $row_DatosSlider = mysql_fetch_assoc($DatosSlider);?>
	    <!-- First Content -->
        <?php $contador=1; ?>
	    <?php do { ?>
	      <div id="fragment-<?php echo $contador;?>" class="ui-tabs-panel" style="">
	        <img src="images/<?php echo $row_DatosSlider['Foto']; ?>" alt="" width="600" height="300" />
	        <div class="info" >
	         <a href="<?php echo $row_DatosSlider['Link']; ?>" ><strong><?php echo $row_DatosSlider['Titulo']; ?></strong></a>
	          <p><?php echo $row_DatosSlider['Subtitulo']; ?> <strong>Precio: <?php echo $row_DatosSlider['Precio']; ?></strong></p>
	          </div>
	        </div>
        <?php 
		  $contador++;
		  } while ($row_DatosSlider = mysql_fetch_assoc($DatosSlider)); ?>
		</div>
<?php
mysql_free_result($DatosSlider);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subir Imagen</title>

<style type="text/css">
.boton {
	background-color: #0066FF;
	border: 1px solid #6D0306;
	color: #fff;
	text-align: center;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	padding: 8px;
	min-width: 110px;
}
.boton:hover {
	background-color: #000066;
	color: #fff;
	cursor: pointer;
}
body{
	background:#E6E6FA;
}
</style>
</head>

<body>
<?php if ((isset($_POST["enviado"])) && ($_POST["enviado"] == "form1")) {
	$nombre_archivo = $_FILES['userfile']['name']; 
	move_uploaded_file($_FILES['userfile']['tmp_name'], "../images/".$nombre_archivo);
	
  //Ruta de la original
$rtOriginal="../images/".$nombre_archivo;
     
//Crear variable de imagen a partir de la original
$original = imagecreatefromjpeg($rtOriginal);
     
//Definir tamaño máximo y mínimo
$ancho_final = 747;
$alto_final = 497;
 
//Recoger ancho y alto de la original
list($ancho,$alto)=getimagesize($rtOriginal);
 
$lienzo=imagecreatetruecolor($ancho_final,$alto_final);
 
//Copiar $original sobre la imagen que acabamos de crear en blanco ($tmp)
imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
 
//Limpiar memoria
imagedestroy($original);
 
//Definimos la calidad de la imagen final
$cal=90;

//Se crea la imagen final en el directorio indicado
imagejpeg($lienzo,"../images/".$nombre_archivo,$cal);
	?>

    <script>
    opener.document.form1.<?php echo $_POST["nombrecampo"]; ?>.value="<?php echo $nombre_archivo; ?>";
    self.close();
  </script>
    <?php
}
else
{?>
<form action="gestionimagen1.php" method="post" enctype="multipart/form-data" id="form1" name="form1" class="margensuperior">

  <p>
    <input name="userfile" type="file" />
  </p>
  <p>
    <input type="submit" name="button" id="button" class="boton" value="Subir Imagen" />
   </p><input name="nombrecampo" type="hidden" value="<?php echo $_GET["campo"]; ?>" />
  <input type="hidden" name="enviado" value="form1" />
</form>
<?php }?>
</body>
</html>

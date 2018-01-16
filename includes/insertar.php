
<?php require_once('../Connections/conexion.php'); ?>

<?php
$nombre= $_POST["nom"];
$tele=$_POST["tel"];
$celu= $_POST["cel"];
$mail= $_POST["mail"];
$codigo=$_POST["cod"];
$propie= $_POST["pro"];
$dia= $_POST["date"];
$hora=$_POST["hora"];
$msj= $_POST["men"];

mysql_select_db($database_conexion, $conexion)or die(mysql_error());
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) { 
$sql="INSERT INTO tblvisita (Nombre, Telefono, Celular, Email, Codigo, Tipo_Propiedad, Dia, Horario, Mensaje)VALUES
('$nombre','$tele', $celu', '$mail',  '$codigo','$propie', '$dia','$hora', '$msj')";
$query = mysql_query($sql, $conexion) or die(mysql_error());

 echo"1";
 }

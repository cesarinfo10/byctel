<?php if (!isset($_SESSION['Colegio_UserId']))
{
	 ?>
<a href="usuario-alta.php">Registrate</a>
<br />
<a href="#" onclick="crearBoira(); cargar('espaiFlotant'); carregaPag('espaiFlotant','includes/flotantelogin.php','selD=1');">Acceder</a>
<?php }
else{
	echo ObtenerNombreUsuario($_SESSION['Colegio_UserId']);
	?><br/>
   Nivel: <?php echo ObtenerNivelUsuario($_SESSION['Colegio_Nivel']);?><br/>
<a href="usuario-cerrar.php">Cerrar Sesión</a>
<?php }?>
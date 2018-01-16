<nav>
	<ul>
		<li><a href="index.php">Inicio</a></li>
              <?php if ((isset ($_SESSION['Colegio_Nivel']))&& ($_SESSION['Colegio_Nivel']<5)){
		//ADMINISTRACION
		 ?>
        <li><a href="#">Gestión Interna</a>
			<ul>
				<li><a href="usuarios-lista.php">Gestión Usuarios</a></li>
				<li><a href="avisos-lista.php">Gestión Avisos</a></li>
					</ul>
				</li>
        <?php }?>
		<li><a href="#">Pendiente</a>
			<ul>
				<li><a href="#">Photoshop</a></li>
				<li><a href="#">Illustrator</a></li>
				<li><a href="#">Web Design</a>
					<ul>
						<li><a href="#">HTML</a></li>
						<li><a href="#">CSS</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href="#">Articles</a>
			<ul>
				<li><a href="#">Web Design</a></li>
				<li><a href="#">User Experience</a></li>
			</ul>
		</li>
		<li><a href="frecuentes.php">FAQ</a></li>
        <li><a href="contacto.php">Contactar</a></li>
	</ul>
</nav>
<?php if ((isset($activaravisos)) && ($activaravisos==1)) 
	MostrarAvisos();?>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion = "localhost";
$database_conexion = "byctel";
$username_conexion = "root";
$password_conexion = "";
$conexion = mysql_connect($hostname_conexion, $username_conexion, $password_conexion) or trigger_error(mysql_error(),E_USER_ERROR); 

if (is_file("includes/funciones.php")){
	include("includes/funciones.php");
}
else
{
	include("../includes/funciones.php");
	}
?>
<script src="js/jquery-1.10.2.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Titillium+Web|Prosto+One' rel='stylesheet' type='text/css'>

<script type="text/javascript">
function cargar(dID){
	 $('#'+dID).html('<img src="images/loading.gif" alt="cargando" /> Cargando ...');
}
function ampliar(iden) {
	document.getElementById(iden).style.display = document.getElementById(iden).style.display == "block" ? "none" : "block";
}
function carregaPag(divID,ruta,parame3) {
	$('#'+divID).load(ruta, parame3);
}
function crearBoira(es) {
	ampliar('boira');
	ampliar('espaiFlotant');
}

</script>

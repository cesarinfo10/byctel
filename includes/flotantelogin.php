<?php require_once('../Connections/conexiontutorial.php'); ?>
  <script>
  function valEmail(valor){ 
    re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
    if(!re.exec(valor))    {
        return false;
    }else{
        return true;
    }
}
function validateformacceso()
{
    valid = true;
	$("#aviso1").hide("slow");
	$("#aviso2").hide("slow");
	document.formacceso.strEmail.style.border='1px solid #EEEEEE';
	document.formacceso.strPassword.style.border='1px solid #EEEEEE';
	//COLORES
	if (document.formacceso.strEmail.value == ""){
		$("#aviso1").show("slow");
		document.formacceso.strEmail.style.border='1px solid red';
	    valid = false;
	}
	if (document.formacceso.strPassword.value == ""){
		$("#aviso2").show("slow");
		document.formacceso.strPassword.style.border='1px solid red';
	    valid = false;
	}
	if (!valEmail(document.formacceso.strEmail.value)){
		$("#aviso1").show("slow");
		document.formacceso.strEmail.style.border='1px solid red';
	    valid = false;
	}

	return valid;
}
</script>
<h1>Acceder al Sistema </h1>
<form id="formacceso" name="formacceso" method="POST" action="acceso.php" onsubmit="javascript: return validateformacceso();">
  <table width="100%" border="0" cellpadding="5">
    <tr>
      <td width="27%" align="left">E-mail:</td>
      <td width="73%"><label for="strEmail" ></label>
      <input type="text" name="strEmail" class="campo" id="strEmail" />
      <div class="capaerrores" id="aviso1">Debes escribir un e-mail.</div></td>
      <td width="73%" rowspan="3"><img src="images/llave.png" width="115" height="115" /></td>
    </tr>
    <tr>
      <td align="left">Contraseña:</td>
      <td><input type="password" name="strPassword" class="campo" id="strPassword" />
      <div class="capaerrores" id="aviso2">Debes escribir una contraseña.</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><input type="submit" name="button" id="button" value="Enviar" class="boton" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><a href="recordar-password.php">Recordar contraseña</a></td>
      <td align="right">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><a href="usuario-alta.php">Registrarme</a></td>
      <td align="right">&nbsp;</td>
    </tr>
  </table>
</form>

<?php require_once('Connections/conexiontutorial.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "prohibido.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<h1>¿Estas seguro de eliminar el registro?</h1>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr align="center">
    <td height="38" colspan="2"><p>Atención la eliminación de este registro será irrecuperable.</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr align="center">
    <td><p>
      <input type="button" name="button" id="button" value="SI" class="boton botonverde" onclick="location.href='preguntas-eliminar.php?pregunta=<?php echo $_GET["pregunta"]; ?>&estado=<?php echo $_GET['estado']?>'" />
    </p>
    </td>
    <td><input type="button" name="button2" id="button2" value="NO" class="boton botonrojo" onclick="location.href='preguntas-lista.php?estado=<?php echo $_GET['estado']?>'" /></td>
  </tr>
</table>
</p>


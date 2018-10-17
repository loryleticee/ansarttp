<?php 
session_start();
require_once ("../../include/class.pdoansart.inc.php");
require_once ("../../include/fct.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
if (isset($_POST["chant"]) && $_POST["chant"]!='0') {
	$_SESSION["numFicheAsc"] = $_POST["chant"];
}
else{
	 echo "<div class='erreur'><center>Veuillez selectionner un chantier <center></div>";
}
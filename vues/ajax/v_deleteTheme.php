<?php
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
//var_dump($_POST);
if(isset($_POST["id"])){
	$id = $_POST["id"];
	$delete=$pdo->supTheme($id);
	if($delete){
		echo "<div class ='erreur'>Supression echoué</center></div>"; 
	}
	else{
		echo "<div class ='erreur'>Supression reussit</center></div>"; 
		 
	}
}
else{
	echo "<div class ='erreur'>Probleme de post</center></div>"; 
}
?>
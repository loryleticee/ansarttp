<?php
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
if(isset($_POST["id"])){
	$id= $_POST["id"];
	$deleteT=$pdo->supTAS($id,$date);
	$deleteD=$pdo->supDAS($id,$date);
	$deleteA=$pdo->supAS($id,$date);
	if($delete){
		echo "<div class ='erreur'><center>Suppression erroné</center></div>";
	}
	else{
		echo "<div class ='erreur'><center>Supprimé avec succès</center></div>"; 
		 
	}
}
else{
	echo "<div class ='erreur'><center>Probleme de post contactez loryleticee@gmail.com</center></div>"; 
}
?>
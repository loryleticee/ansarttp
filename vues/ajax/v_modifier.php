<?php
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
if(isset($_POST["id"])){
	$var = explode('.', $_POST['id']);
	$id = $var[0];
	$nom = $var[1];
	$prenom = $var[2];
	$tauxHoraire = $var[3];
	$modifier = $pdo->alterSal($id,$nom,$prenom,$tauxHoraire);
	if($modifier){
		echo "ModificatiON erroné";
	}
	else{
		echo "Modificatino reussie";
	}
}
else{
	echo"Pas de post";
}
?>
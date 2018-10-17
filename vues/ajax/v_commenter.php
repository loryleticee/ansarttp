<?php
session_start();
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
$day = getDay(date("Y/m/d"));
$time= getTime(date("H/i/s"));
$heure=$day.$time;
$idUser = $_SESSION['idVisiteur'] ;
if(isset($_POST["com"])){
	$com = addslashes($_POST["com"]);
	$idFicheUser = $pdo->getIdFicheUser($day,$idUser);
	$fiche = $idFicheUser["id"];	
	$addCom = $pdo->Addcoment($com,$fiche);
	if(!$addCom){
		echo "Votre commentaire a bien été ajouté";
	}
	else{
		echo "Votre commentaire n'a pas été ajouté ,contactez votre webmaster 0666519081 loryleticee@gmail.com";
	}

}
?>
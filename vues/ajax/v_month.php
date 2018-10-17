<?php
session_start();
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
//var_dump($_POST);
if (isset($_POST['idF'])) {
    $idFiche = $_POST['idF'];
   // var_dump($idFiche);
    $idVisiteur = $_SESSION['idVisiteur'];
    if($_SESSION["statut"]=="Conducteur de travaux"){
    	$LesDates = $pdo->getAllLesDatesAccueil($idFiche);
    }else{
		$LesDates = $pdo->getLesDatesAccueil($idFiche,$idVisiteur);
	}
	//var_dump($LesDates);
	if (!empty($LesDates)) {?>
	     <center> <h3>Date à sélectionner : </h3>
 		<label for="listDate" accesskey="n">Date : </label>
		<select id="listDate" style="width:220px;" name="listDate" onchange="showNum();">
			<option value="0" selected>Selectionner un mois</option><?php
		//var_dump($LesMois);
		foreach ($LesDates as $uneDate) {
			$date=$uneDate["jour"];
			//var_dump($mois);
			//$leMois=substr($mois,5,2);
			//var_dump($annee.$mois);
			echo "<option value='$idFiche.$date'>$date</option>";
		}?>	</select></center><div id="listFiche"></div><?php
	}else{
		echo "<div class='erreur'><center>Aucune fiche Accueil crée pour ce chantier <center></div>";
	}
}?>
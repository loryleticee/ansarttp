<?php session_start();
require_once ("../../include/class.pdoansart.inc.php");
require_once ("../../include/fct.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
$idVisiteur=$_SESSION["idVisiteur"];
if (isset($_POST['mois'])) {
    $lePost = explode('.', $_POST['mois']); 
    $idFiche = $lePost[0];
    if (!isset($lePost[1])) {
    	$date = date("Y-m-d");
    }else{
    	$date = $lePost[1];
	}
	if($_SESSION["statut"]=="Conducteur de travaux"){
    	$LesFiche = $pdo->getAllLesFicheAccueil($idFiche,$date);
    }else{
		$LesFiche = $pdo->getLesFicheAccueil($idFiche,$idVisiteur,$date);
	}
	//var_dump($LesFiche);
	if (!empty($LesFiche)) {?>
	     <center> <h3>Numéro de fiche à sélectionner : </h3>
 		<label for="listNum" accesskey="n">Numéro : </label>
		<select id="listNum" style="width:220px;" name="listNum" onchange="showFiche();">
			<option value="0" selected>Selectionner un numéro</option><?php
		//var_dump($LesMois);
		foreach ($LesFiche as $uneFiche) {
			$num=$uneFiche["numero"];
			echo "<option value='$idFiche.$date.$num'>Fiche $num</option>";
		}?>	</select></center><div id="listShowFiche"></div><?php
	}else{
		echo "<div class='erreur'><center>Aucune fiche Accueil crée pour ce chantier <center></div>";
	}
}
else{
	echo "<br><div class='erreur'><center>Aucune observation pour cette fiche</center></div>";
}?><br><br>